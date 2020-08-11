<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group SaleItems
 * 分销商品结算表
 * @package App\Http\Controllers\Admin
 */
class SaleItemController extends Controller
{
    /**
     * index
     * 结算列表
     * @queryParam mobile 手机号 No-example
     * @queryParam order_id 订单ID No-example
     * @queryParam status 状态 No-example
     * @queryParam nickname 昵称 No-example
     * @queryParam current_page required 当前页 Example: 1
     * @queryParam per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $mobile = $request->input('mobile');
        $orderId = $request->input('order_id');
        $status = $request->input('status');
        $nickname = $request->input('nickname');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = SaleItem::when($orderId != '', function ($query) use ($orderId) {
            return $query->where('order_id', 'like', '%'.$orderId.'%');
        })
            ->when($mobile != '', function ($query) use ($mobile) {
                return $query->where('mobile', 'like', '%'.$mobile.'%');
            })
            ->when(preg_match('/^-?[1|2]1?$/', $status), function ($query) use ($status) {
                return $query->whereHas('user', function ($query) use ($status) {
                    $query->where('status', $status);
                });
            })
            ->when($nickname != '', function ($query) use ($nickname) {
                return $query->whereHas('user', function ($query) use ($nickname) {
                    $query->where('nickname', 'like', '%'.$nickname.'%');
                });
            });
        $query->orderBy('created_at', 'desc');
        $saleItems = self::paginator($query, $currentPage, $perPage);
        foreach ($saleItems as $saleItem) {
            $saleItem->user;
            $saleItem->order;
            $saleItem->orderItem;
        }
        return Helper::Json(1, '查询成功', ['saleItems' => $saleItems]);
    }
}
