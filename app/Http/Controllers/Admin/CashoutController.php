<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Controllers\WXPayController;
use App\Models\Cashout;
use App\Models\Distribution;
use App\Models\User;
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
            ->when(preg_match('/^[0-3]$/',$status), function ($query) use ($status) {
                return $query->where('status', $status);
            });
        $query->orderBy('created_at', 'desc');
        $cashouts = self::paginator($query, $currentPage, $perPage);
        foreach ($cashouts as $cashout) {
            $cashout->user;
        }
        return Helper::Json(1, '查询成功', ['cashouts' => $cashouts]);
    }

    public function cashout(Request $request, $id)
    {
        if (!$cashout = Cashout::find($id)) {
            return Helper::Json(-1,'该提现记录不存在');
        }
        if ($request->has('status') && $status = $request->input('status') == 3) {
            $cashout->status = $status;
            $cashout->content = '该提现申请被拒绝,详情咨询客服';
            $cashout->save();
            return Helper::Json(1,'审核成功');
        }
        $cashoutId = $cashout->cashout_id ? $cashout->cashout_id : Helper::generateNo('cash',$cashout->user_id);
        //支付到银行卡
        $user = User::find($cashout->user_id);
        if ($cashout->type == 1) {
            $result = WXPayController::payToBalance($user->openid,$cashout->apply_amount * 100,$cashoutId);
            if ($result['return_code'] == 'SUCCESS' && $result['result_code'] == 'SUCCESS') {

            } else {

            }
        }
        //支付到余额
        if ($cashout->type == 2) {

        }
    }
}
