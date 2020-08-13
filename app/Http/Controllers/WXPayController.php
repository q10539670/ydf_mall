<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;
use EasyWeChat\Kernel\Exceptions\InvalidConfigException;
use EasyWeChat\Kernel\Exceptions\RuntimeException;
use EasyWeChat\Kernel\Support\Collection;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use EasyWeChat\Factory;
use App\Helpers\WechatHelper;
use Psr\Http\Message\ResponseInterface;

class WXPayController extends Controller
{
    /**
     * 配置信息
     * @return array
     */
    public static function config()
    {
        $config = config('h5account.'.env('APP_ENV'));
        return [
            'app_id' => $config['appId'],
            'mch_id' => $config['mch_id'],
            'key' => $config['key'],
            'cert_path' => $config['cert_path'], // XXX: 绝对路径！！！！
            'key_path' => $config['key_path'],      // XXX: 绝对路径！！！！
            'rsa_public_key_path' => $config['rsa_public_key_path'],
            'notify_url' => route('refund_notify'),     // 你也可以在下单时单独设置来想覆盖它
            'getTokenFunc' => WechatHelper::getTokenFunc(),
        ];

    }

    /**
     * 付款到用户余额
     * @param $openid
     * @param $amount
     * @param $partner_trade_no
     * @return array|Collection|object|ResponseInterface|string
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     */
    public static function payToBalance($openid, $amount, $partner_trade_no)
    {
        $app = Factory::payment(self::config());
        return $app->transfer->toBalance([
            'partner_trade_no' => $partner_trade_no, // 商户订单号，需保持唯一性(只能是字母或者数字，不能包含有符号)
            'openid' => $openid,
            'check_name' => 'NO_CHECK', // NO_CHECK：不校验真实姓名, FORCE_CHECK：强校验真实姓名
            //'re_user_name' => $name, // 如果 check_name 设置为FORCE_CHECK，则必填用户真实姓名
            'amount' => $amount, // 企业付款金额，单位为分
            'desc' => '用户提现到余额', // 企业付款操作说明信息。必填
        ]);

    }

    /**
     * 付款到银行卡
     * @param $amount
     * @param $partner_trade_no
     * @param $name
     * @param $bankNo
     * @param $bankCode
     * @return array|Collection|object|ResponseInterface|string
     * @throws GuzzleException
     * @throws InvalidArgumentException
     * @throws InvalidConfigException
     * @throws RuntimeException
     */
    public static function payToBank($bankNo, $amount, $partner_trade_no,$name,$bankCode)
    {
        $app = Factory::payment(self::config());
        return $app->transfer->toBankCard([
            'partner_trade_no' => $partner_trade_no,
            'enc_bank_no' => $bankNo, // 银行卡号
            'enc_true_name' => $name,   // 银行卡对应的用户真实姓名
            'bank_code' => $bankCode, // 银行编号
            'amount' => $amount,  // 单位：分
            'desc' => '用户提现到银行卡',
        ]);
    }

    /*
     * 统一下单
     */
    public static function unify($money, $openid, $outTradeNo)
    {
        $payment = Factory::payment(self::config());
        return $payment->order->unify([
            'body' => '纽宾凯汉city总部壹号定金',
            'out_trade_no' => $outTradeNo,
            'total_fee' => $money * 100,
//            'spbill_create_ip' => '123.12.12.123', // 可选，如不传该参数，SDK 将会自动获取相应 IP 地址
            'notify_url' => route('pay_notify'), // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            'trade_type' => 'JSAPI', // 请对应换成你的支付方式对应的值类型
            'openid' => $openid,
        ]);

    }

    /**
     * JSAPI支付
     */
    public function pay(Request $request)
    {
        $reserve = Reserve::find($request->id);
//        $reserve = Reserve::find(3);
        if (!$reserve) {
            return Helper::Json('-1', '订单不存在');
        }
        if ($reserve->status != 0) {
            return Helper::Json('-1', '订单状态错误');
        }
        $money = $reserve->money;
        $openid = $reserve->user->openid;
        $outTradeNo = 'nbk_city01_'.date('YmdHis').mt_rand(100000, 999999);
        $result = self::unify($money, $openid, $outTradeNo);
        $payment = Factory::payment(self::config());
//        dd($payment);
        if ($result['return_code'] == 'SUCCESS' && $result['return_msg'] == 'OK') {
            //保存订单号
            $reserve->out_trade_no = $outTradeNo;
            $reserve->save();
            $jssdk = $payment->jssdk;
            return $jssdk->bridgeConfig($result['prepay_id']);
        } else {
            return Helper::Json('1', '支付失败', ['result' => $result]);
        }
    }

    /**
     * 支付通知
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \EasyWeChat\Kernel\Exceptions\Exception
     */
    public function payNotify()
    {
        $payment = Factory::payment(self::config());
        $response = $payment->handlePaidNotify(function ($message, $fail) {
            // 使用通知里的 "微信支付订单号" 或者 "商户订单号" 去自己的数据库找到订单
            $order = Reserve::where('out_trade_no', $message['out_trade_no'])->first();

            if (!$order || $order->status == 11) { // 如果订单不存在 或者 订单已经支付过了
                return true; // 告诉微信，我已经处理完了，订单没找到，别再通知我了
            }

            ///////////// <- 建议在这里调用微信的【订单查询】接口查一下该笔订单的情况，确认是已经支付 /////////////

            if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
                // 用户是否支付成功
                if ($message['result_code'] === 'SUCCESS' && $message['cash_fee'] == ($order->money * 100)) {
                    $order->paid_at = date('Y-m-d H:i:s', time()); // 更新支付时间为当前时间
                    $order->status = 11;   //更新状态->已付款

                    //自动修改推荐人状态
                    $invite = Invite::where('user_invite_id', $order->user_id)->where('status', '<', 31)->first();
                    if ($invite) {
                        $invite->status = 31; //已签约
                        $invite->save();
                    }

                    // 用户支付失败
                } elseif ($message['result_code'] === 'FAIL') {
                    $order->status = -11;
                }
            } else {
                return $fail('通信失败，请稍后再通知我');
            }

            $order->save(); // 保存订单

            return true; // 返回处理完成
        });
        return $response;
    }

    /**
     *  其中 $message['req_info'] 获取到的是加密信息
     *  $reqInfo 为 message['req_info'] 解密后的信息
     * 返回错误原因 $fail('参数格式校验错误')
     * @throws \EasyWeChat\Kernel\Exceptions\Exception
     */
    public function refundNotify()
    {
        $payment = Factory::payment(self::config());
        $response = $payment->handleRefundedNotify(function ($message, $reqInfo, $fail) {
            if ($message['return_code'] === 'SUCCESS') { // return_code 表示通信状态，不代表支付状态
                // 用户是否支付成功
                $refund = Refund::where('refund_sn', $reqInfo['out_refund_no'])->first();
                if (!$refund || $refund->status == 1) {
                    return true;
                }
                if ($reqInfo['refund_status'] === 'SUCCESS') {
                    $refund->refund_at = date('Y-m-d H:i:s', time()); // 更新退款时间为当前时间
                    $refund->status = 1;   //更新状态->已退款
                    $reserve = Reserve::where('out_trade_no', $reqInfo['out_trade_no'])->first();
                    if ($reserve) {
                        $reserve->status = 10; //更新状态->已退款
                        $reserve->save();
                        //更改房源为在售
                        $house = House::find($reserve->house_id);
                        $house->status = 1;
                        $house->save();
                    }
                    // 用户支付失败
                    $refund->save(); // 保存退款单
                } elseif ($reqInfo['refund_status'] === 'CHANGE') {
                    $refund->status = -1; //退款异常
                }
            } else {
                return $fail('通信失败，请稍后再通知我');// 返回错误原因 $fail('参数格式校验错误');
            }

            return true; // 返回 true 告诉微信“我已处理完成”
        });
        return $response;
    }

    public function query(Request $request)
    {
        $payment = Factory::payment(self::config());
        if (substr($request->out_trade_no, 4, 6) == 'refund') {
            $order = $payment->refund->queryByOutRefundNumber($request->out_trade_no);
        } else {
            $order = $payment->order->queryByOutTradeNumber($request->out_trade_no);
        }
        return Helper::Json('1', '查询成功', ['result' => $order]);
    }
}