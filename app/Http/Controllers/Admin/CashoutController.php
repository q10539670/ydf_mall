<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WXPayController;
use App\Models\AmountChange;
use App\Models\Bankcards;
use App\Models\Cashout;
use App\Models\Distribution;
use App\Models\SalerInfo;
use App\Models\User;
use EasyWeChat\Kernel\Exceptions\InvalidArgumentException;
use EasyWeChat\Kernel\Exceptions\InvalidConfigException;
use EasyWeChat\Kernel\Exceptions\RuntimeException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Cashout
 * 提现记录
 * @package App\Http\Controllers\Admin
 */
class CashoutController extends Controller
{
    /**
     * index
     * 提现记录表
     * @queryParam mobile 手机号 No-example
     * @queryParam nickname 昵称 No-example
     * @queryParam type 类型[1:银行卡 2:微信余额] No-example
     * @queryParam status 状态[0:已申请 1:成功 2:提现失败 3:拒绝] No-example
     * @queryParam current_page required 当前页 Example: 1
     * @queryParam per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $mobile = $request->input('mobile');
        $type = $request->input('type');
        $status = $request->input('status');
        $nickname = $request->input('nickname');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = Cashout::when($mobile != '', function ($query) use ($mobile) {
            return $query->whereHas('user', function ($query) use ($mobile) {
                $query->where('mobile', 'like', '%'.$mobile.'%');
            });
        })
            ->when($nickname != '', function ($query) use ($nickname) {
                return $query->whereHas('user', function ($query) use ($nickname) {
                    $query->where('nickname', 'like', '%'.$nickname.'%');
                });
            })
            ->when($type == 1 || $type == 2, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when(preg_match('/^[0-3]$/', $status), function ($query) use ($status) {
                return $query->where('status', $status);
            });
        $query->orderBy('created_at', 'desc');
        $cashouts = self::paginator($query, $currentPage, $perPage);
        foreach ($cashouts as $cashout) {
            $cashout->user;
        }
        return Helper::Json(1, '查询成功', ['cashouts' => $cashouts]);
    }

    /**
     * refuse
     * 拒绝
     * @urlParam cashout required 提现ID No-example
     * @param $id
     * @return JsonResponse
     *
     */
    public function refuse($id)
    {
        if (!$cashout = Cashout::find($id)) {
            return Helper::Json(-1, '该提现记录不存在');
        }
        if ($cashout !== 0) {
            return Helper::Json(-1, '该提现记录已处理完成');
        }
        $cashout->status = 3;
        $cashout->content = '该提现申请被拒绝,详情咨询客服';
        $cashout->save();
        return Helper::Json(1, '审核成功', ['cashout' => $cashout]);
    }

    /**
     * cashout
     * 提现
     * @urlParam cashout required 提现ID
     * @param $id
     * @return JsonResponse
     * @throws GuzzleException
     * @throws InvalidConfigException
     * @throws RuntimeException
     * @throws InvalidArgumentException
     */
    public function cashout($id)
    {
        if (!$cashout = Cashout::find($id)) {
            return Helper::Json(-1, '该提现记录不存在');
        }
        if ($cashout->status == 1) {
            return Helper::Json(-1, '已成功提现,请勿重复提交');
        }
        $cashoutId = $cashout->cashout_id ? $cashout->cashout_id : Helper::generateNo('cash', $cashout->user_id);
        $user = User::find($cashout->user_id);
        $amount = $cashout->apply_amount * 100;
        //支付到银行卡
        if ($cashout->type == 1) {
            $bankcard = Bankcards::find($cashout->bankcard_id);
            $result = WXPayController::payToBank($bankcard->card_number, $amount, $cashoutId, $bankcard->account_name,
                $bankcard->bank_code);
            if ($result['return_code'] == 'SUCCESS' && $result['result_code'] == 'SUCCESS') {
                $cashout->status = 1; //成功
                $cashout->apply_at = now()->toDateTimeString();
                //同步更新账户余额变动表
                AmountChange::create([
                    'type' => 2,
                    'user_id' => $cashout->user_id,
                    'amount' => $cashout->apply_amount,
                ]);
            } else {
                $cashout->status = 2;//失败
            }
            $cashout->pay_return_msg = $result['return_msg'];
            $cashout->content = $result['err_code_des'];
            $cashout->pay_detail = json_encode($result, JSON_UNESCAPED_UNICODE);
        }
        //支付到余额
        if ($cashout->type == 2) {
            $result = WXPayController::payToBalance($user->openid, $amount, $cashoutId);
            if ($result['return_code'] == 'SUCCESS' && $result['result_code'] == 'SUCCESS') {
                $cashout->status = 1; //成功
                $cashout->apply_at = $result['payment_time'];
                //同步更新账户余额变动表
                AmountChange::create([
                    'type' => 2,
                    'user_id' => $cashout->user_id,
                    'amount' => $cashout->apply_amount,
                ]);
                $salerInfo = SalerInfo::where('user_id',$cashout->user_id)->first();
                $salerInfo->received_amount += $cashout->apply_amount;
                $salerInfo->store_amount -= $cashout->apply_amount;
                $salerInfo->save();
            } else {
                $cashout->status = 2;//失败
                $cashout->content = $result['err_code_des'];
            }
            $cashout->pay_return_msg = $result['return_msg'];
            $cashout->pay_detail = json_encode($result, JSON_UNESCAPED_UNICODE);
        }
        $cashout->save();
        return Helper::Json(1, '提现完成', ['cashout' => $cashout]);
    }
}
