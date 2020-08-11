<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AmountChange;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group AmountChange
 * 余额变动表
 * @package App\Http\Controllers\Admin
 */
class AmountChangeController extends Controller
{
    /**
     * index
     * 余额变动表
     * @queryParam mobile 手机号 No-example
     * @queryParam nickname 昵称 No-example
     * @queryParam type 类型[1:结算收入 2:提现支出] No-example
     * @queryParam current_page required 当前页 Example: 1
     * @queryParam per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $mobile = $request->input('mobile');
        $type = $request->input('type');
        $nickname = $request->input('nickname');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = AmountChange::when($mobile != '', function ($query) use ($mobile) {
            return $query->whereHas('user', function ($query) use ($mobile) {
                $query->where('mobile', 'like', '%'.$mobile.'%');
            });
        })
            ->when($type == 1 || $type == 2, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when($nickname != '', function ($query) use ($nickname) {
                return $query->whereHas('user', function ($query) use ($nickname) {
                    $query->where('nickname', 'like', '%'.$nickname.'%');
                });
            });
        $query->orderBy('created_at', 'desc');
        $amountChanges = self::paginator($query, $currentPage, $perPage);
        foreach ($amountChanges as $amountChange) {
            $amountChange->user;
        }
        return Helper::Json(1, '查询成功', ['amountChanges' => $amountChanges]);
    }
}
