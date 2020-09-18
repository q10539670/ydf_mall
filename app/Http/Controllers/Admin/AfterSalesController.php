<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\AfterSales;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
     * @queryParam order_id 订单号 No-example
     * @queryParam date_range 申请时间 No-example
     * @queryParam mobile 手机号 No-example
     * @queryParam confirm 是否确认收货[1:未确认收货 2:已确认收货] No-example
     * @queryParam status 状态[0:待提交 1:未审核 2:审核通过 3:审核拒绝] No-example
     * @queryParam current_page required 当前页 Example: 1
     * @queryParam per_page required 每页显示数量 Example: 10
     *
     * @param  Request  $request
     * @return JsonResponse
     */

    /**
     * @OA\Get (
     *     path="/admin-api/admin/after",
     *     summary="售后单列表",
     *     tags={"售后单"},
     *   @OA\Response(
     *     response=200,
     *     description="售后单列表",
     *   )
     *     )
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
        $query->order('created_at', 'desc');
        $afterSales = self::paginator($query, $currentPage, $perPage);
        foreach ($afterSales as $afterSale) {
            $afterSale->order;
            $afterSale->orderItem;
            $afterSale->user;
        }
        return Helper::Json(1, '查询成功', ['after_sales', $afterSales]);

    }


    /**
     * show
     * 查询(单一)
     * @urlParam id required 售后单ID No-example
     * @param  int  $id
     * @return JsonResponse
     */
    public function show(int $id)
    {

        if ($afterSale = AfterSales::find($id)) {
            return Helper::Json(-1, '该售后单不存在');
        }
        $afterSale->order;
        $afterSale->orderItem;
        $afterSale->user;
        return Helper::Json(1, '查询成功', ['after_sale', $afterSale]);
    }


    /**
     * update
     * 审核
     *
     * @urlParam id required 售后单ID No-example
     * @queryParam status required 是否通过审核[2,通过 3,不通过] Example:2
     * @queryParam admin_mark 管理员备注 No-example
     * @param  Request  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $status = $request->input('status');
        $adminMark = $request->input('admin_mark') ?? '';
        $handleTime = now()->toDateTimeString();
        $afterSale = AfterSales::find($id);
        $afterSale->status = $status;
        $afterSale->admin_mark = $adminMark;
        $afterSale->handle_time = $handleTime;
        $afterSale->save();
        return Helper::Json(1,'审核成功',['after_sale' => $afterSale]);
    }

}
