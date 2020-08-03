<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AfterSales;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group 售后单
 * @package App\Http\Controllers\Admin
 */
class AfterSalesController extends Controller
{
    /**
     * index
     * 售后单列表
     *
     * @queryParam id 售后单号 No-example
     * @queryParam order_id 订单号
     * @queryParam date_range 申请时间
     * @queryParam mobile
     * @queryParam confirm
     * @queryParam status
     * @queryParam per_page
     * @queryParam current_page
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $orderId = $request->input('order_id');
        $dateRange = Helper::formatDateString($request->input('date_range'));
        $mobile = $request->input('mobile');
        $confirm = $request->input('confirm');
        $status = $request->input('status');
        $perPage = $request->input('per_page') != '' ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = AfterSales::when($id != '', function ($query) use ($id) {
            return $query->where('id', 'like', '%'.$id.'%');
        })
            ->when($orderId != '', function ($query) use ($orderId) {
                return $query->where('order_id', 'like', '%'.$orderId.'%');
            })
            ->when(preg_match("/^[0-3]$/", $status), function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($dateRange != '', function ($query) use ($dateRange) {
                return $query->where('created_at', '>', $dateRange[0])->orWhere('created_at', '<', $dateRange[1]);
            })
            ->when($mobile != '', function ($query) use ($mobile) {
                return $query->whereHas('user', function ($query) use ($mobile) {
                    $query->where('mobile', 'like', '%'.$mobile.'%');
                });
            })
            ->when($confirm == 1 || $confirm == 2, function ($query) use ($confirm) {
                return $query->whereHas('order', function ($query) use ($confirm) {
                    $query->where('confirm', $confirm);
                });
            });
        $query->order('created_at','desc');
        $afterSales = self::paginator($query,$currentPage,$perPage);
        foreach ($afterSales as $afterSale) {
            $afterSale->order;
            $afterSale->orderItem;
            $afterSale->user;
        }
        return Helper::Json(1,'查询成功',['after_sales',$afterSales]);

    }


    /**
     * show
     * 查询(单一)
     * @urlParam id required 售后单ID No-example
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {

        if ($afterSale = AfterSales::find($id)) {
            return  Helper::Json(-1,'该售后单不存在');
        }
        $afterSale->order;
        $afterSale->orderItem;
        $afterSale->user;
        return Helper::Json(1,'查询成功',['after_sale',$afterSale]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
