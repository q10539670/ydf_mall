<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @Gourp Delivery
 * 发货单接口
 * @package App\Http\Controllers\Admin
 */
class DeliveryController extends Controller
{
    /**
     * index
     * 发货单列表
     * @queryParam id 发货单号 No-example
     * @queryParam order_id 订单号 No-example
     * @queryParam date_range 下单时间[范围] No-example
     * @queryParam logi_no 快递单号 No-example
     * @queryParam ship_mobile 收货人电话 No-example
     * @queryParam per_page required 显示数量
     * @queryParam current_page required 当前页
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $orderId = $request->input('order_id');
        $dateRange = Helper::formatDateString($request->input('date_range'));
        $logiNo = $request->input('logi_no');
        $shipMobile = $request->input('ship_mobile');
        $perPage = ($request->input('per_page') != '') ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Delivery::when($orderId != '', function ($query) use ($orderId) {
            return $query->where('order_id', 'like', '%'.$orderId.'%');
        })
            ->when($dateRange != '', function ($query) use ($dateRange) {
                return $query->whereBetween('created_at', $dateRange);
            })
            ->when($id != '', function ($query) use ($id) {
                return $query->where('order_type','like','%'. $id.'%');
            })
            ->when($shipMobile != '', function ($query) use ($shipMobile) {
                return $query->where('ship_mobile', $shipMobile);
            })
            ->when($logiNo != '', function ($query) use ($logiNo) {
                return $query->where('order_type','like','%'. $logiNo.'%');
            });
        $query->orderBy('created_at', 'desc');
        $deliverys = self::paginator($query, $currentPage, $perPage);
        foreach ($deliverys as $delivery) {
            $delivery->item;
        }
        return Helper::Json(1, '查询成功', ['deliverys' => $deliverys]);
    }


    /**
     * show
     * 查询单一
     * @urlParam delivery required 发货单号
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        //
        if (!$delivery = Delivery::find($id)) return Helper::Json(1,'该发货单不存在');
        $delivery[0]->item;
        return Helper::Json(1, '查询成功', ['delivery' => $delivery]);
    }
}
