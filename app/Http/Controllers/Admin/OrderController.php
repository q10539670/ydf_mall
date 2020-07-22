<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Order
 * 订单接口
 */
class OrderController extends Controller
{
    /**
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $orderId = $request->input('order_id');
        $dateRange = Helper::formatDateString($request->input('date_range'));
        $type = $request->input('order_type');
        $nameOrMobile = $request->input('name_or_mobile');
        $shipMobile = $request->input('ship_mobile');
        $del = $request->input('del', 0);
        $perPage = ($request->input('per_page') != '') ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Order::when($orderId != '', function ($query) use ($orderId) {
            return $query->where('order_id', 'like', '%'.$orderId.'%');
        })
            ->when($dateRange != '', function ($query) use ($dateRange) {
                return $query->whereBetween('created_at', $dateRange);
            })
            ->when($type != '', function ($query) use ($type) {
                return $query->where('order_type', $type);
            })
            ->when(!preg_match("/^\d{11}$/", $nameOrMobile), function ($query) use ($nameOrMobile) {
                return $query->whereHas('user', function ($query) use ($nameOrMobile) {
                    $query->where('nickname', 'like', '%'.$nameOrMobile.'%');
                });
            })
            ->when(preg_match("/^\d{11}$/", $nameOrMobile), function ($query) use ($nameOrMobile) {
                return $query->whereHas('user', function ($query) use ($nameOrMobile) {
                    $query->where('mobile', $nameOrMobile);
                });
            })
            ->when($shipMobile != '', function ($query) use ($shipMobile) {
                return $query->where('ship_mobile', $shipMobile);
            })
            ->when($del === 0 || $del === 1, function ($query) use ($del) {
                return $query->where('is_del', $del);
            });
        $query->orderBy('created_at','desc');
        $orders = self::paginator($query,$currentPage,$perPage);
        foreach ($orders as $order) {
            $order->item;
            $order->ship;
            $order->area;
        }
        return Helper::Json(1,'查询成功',['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     * @urlParam order required 订单ID
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        if ($order = Order::find($id)) return Helper::Json(-1,'该订单不存在');
        $order[0]->item;
        $order[0]->ship;
        $order[0]->area;
        return Helper::Json(1,'查询成功',['order' => $order]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
