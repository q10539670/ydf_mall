<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Delivery;
use App\Models\DeliveryItems;
use App\Models\Logistics;
use App\Models\Order;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * @group Order
 * 订单接口
 */
class OrderController extends Controller
{
    /** index
     * 订单列表
     * @queryParam order_id 订单ID No-example
     * @queryParam date_range 日期区间 No-example
     * @queryParam order_type 订单类型[1:普通,2:秒杀,3:拼团] No-example
     * @queryParam name_or_mobile 用户昵称或电话 No-example
     * @queryParam ship_mobile 收货人电话 No-example
     * @queryParam per_page required 每页显示数量 Example: 10
     * @queryParam current_page required 当前页 Example:1
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
            });
        $query->orderBy('created_at', 'desc');
        $orders = self::paginator($query, $currentPage, $perPage);
        foreach ($orders as $order) {
            $order->item;
            $order->ship;
            $order->area;
        }
        return Helper::Json(1, '查询成功', ['orders' => $orders]);
    }

    /**
     * show
     * 查询订单
     * @urlParam order required 订单ID
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        if (!$order = Order::find($id)) {
            return Helper::Json(-1, '该订单不存在');
        }
        $order->item;
        $order->ship;
        $order->area;
        return Helper::Json(1, '查询成功', ['order' => $order]);
    }

    /**
     * edit
     * 编辑订单
     * @urlParam order required 订单ID
     * @param $id
     * @return JsonResponse
     */
    public function edit($id)
    {
        if (!$order = Order::find($id)) {
            return Helper::Json(-1, '该订单不存在');
        }
        return Helper::Json(1, '查询成功', ['order' => $order]);
    }

    /**
     * update
     * 更新订单
     * @urlParam order required 订单ID Example:20200727123340order001835
     * @bodyParam ship_area_code required 收货人地址ID Example:9
     * @bodyParam ship_address required 收货人详细地址 Example:1号
     * @bodyParam ship_name required 收货人姓名 Example:徐其阳
     * @bodyParam ship_mobile required 收货人电话 Example:18107120122
     * @param  Request  $request
     * @param $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "更新成功",
    "data": {
    "order": {
    "order_id": "20200727123340order001835",
    "total_amount": "860.00",
    "payed_amount": "860.00",
    "freight_amount": "10.00",
    "promotion_amount": "0.00",
    "coupon_amount": "0.00",
    "pay_status": 1,
    "ship_status": 3,
    "status": 1,
    "order_type": 1,
    "payment_time": null,
    "confirm_time": null,
    "logistics_id": null,
    "logistics_name": null,
    "cost_freight": "0.00",
    "user_id": 1,
    "confirm": 1,
    "ship_area_code": "9",
    "ship_address": "1号",
    "ship_name": "徐其阳",
    "ship_mobile": "18107120122",
    "weight": 0,
    "order_pmt": "0.00",
    "goods_pmt": "0.00",
    "coupon_pmt": "0.00",
    "coupon_list": null,
    "promotion_list": null,
    "memo": null,
    "ip": null,
    "mark": null,
    "is_comment": 1,
    "created_at": "2020-07-27 12:33:40",
    "updated_at": "2020-07-29 17:58:36",
    "is_del": 0
    }
    }
     * }
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ship_area_code' => 'required|exists:china_area,id',
            'ship_address' => 'required',
            'ship_name' => 'required|max:50',
            'ship_mobile' => 'required|max:11',
        ], [
            'ship_area_code.required' => '收货地区不能为空',
            'ship_area_code.exists' => '收货地区参数错误',
            'ship_address.required' => '收货地址不能为空',
            'ship_name.required' => '收货姓名不能为空',
            'ship_name.max' => '收货姓名字符太长',
            'ship_mobile.required' => '收货人电话不能为空',
            'ship_mobile.max' => '收货人电话字符太长',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
        if (!$order = Order::find($id)) {
            return Helper::Json(-1, '该订单不存在');
        }
        $order->fill($request->all());
        $order->save();
        return Helper::Json(1, '更新成功', ['order' => $order]);
    }

    /**
     * ship_
     * 发货
     * @urlParam order required 订单ID Example:20200727123340order001835
     * @bodyParam ship_area_code required 收货人地址ID Example:9
     * @bodyParam ship_address required 收货人详细地址 Example:1号
     * @bodyParam ship_name required 收货人姓名 Example:徐其阳
     * @bodyParam ship_mobile required 收货人电话 Example:18107120122
     * @bodyParam send_nums required 发货数量 Example:18107120122
     * @bodyParam logi_id required 物流公司 Example:18107120122
     * @bodyParam logi_no required 物流单号 Example:18107120122
     * @param  Request  $request
     * @param $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "发货成功",
    "data": []
     * }
     */
    public function ship(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ship_area_code' => 'required|exists:china_area,id',
            'ship_address' => 'required',
            'ship_name' => 'required|max:50',
            'ship_mobile' => 'required|max:11',
            'send_nums' => 'required',
            'logi_id' => 'required|exists:ydf_logistics,id',
            'logi_no' => 'required'
        ], [
            'ship_area_code.required' => '收货地区不能为空',
            'ship_area_code.exists' => '收货地区参数错误',
            'ship_address.required' => '收货地址不能为空',
            'ship_name.required' => '收货姓名不能为空',
            'ship_name.max' => '收货姓名字符太长',
            'ship_mobile.required' => '收货人电话不能为空',
            'ship_mobile.max' => '收货人电话字符太长',
            'send_nums.required' => '发货数量不能为空',
            'logi_id.required' => '物流公司不能为空',
            'logi_id.exists' => '物流公司参数错误',
            'logi_no.required' => '物流单号不能为空',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
        $order = Order::find($id);
        $logistics = Logistics::find($request->input('logi_id'));
        $deliveryId = Helper::generateNo('dl',$order->user_id);
        $delivery = Delivery::create([
            'id' => $deliveryId,
            'order_id' => $id,
            'logi_name' => $logistics->logi_name,
            'logi_code' => $logistics->logi_code,
            'logi_no' => $request->input('logi_no'),
            'ship_area_code' => $request->input('ship_area_code'),
            'ship_address' => $request->input('ship_address'),
            'ship_name' => $request->input('ship_name'),
            'ship_mobile' => $request->input('ship_mobile'),
            'desc' => $request->has('desc') ? $request->input('desc') : ''
        ]);

        $order->fill($request->only('ship_area_code', 'ship_address', 'ship_name', 'ship_mobile'));
        $orderItems = $order->item;
        $sendNums = $request->input('send_nums');
        if (array_sum($sendNums) == 0) {
            return Helper::Json(-1, '请至少发货一件商品');
        }
        $shipStatus = 0;//标记是否完全发货
        foreach ($orderItems as $item) {
            $item->sendnums += $sendNums[$item->id];
            if ($item->sendnums > $item->nums) {
                return Helper::Json(-1, '发货失败,发货数量超过购买数量');
            }
            $item->save();
            DeliveryItems::create([
                'delivery_id' => $deliveryId,
                'goods_id' => $item->goods_id,
                'product_id' => $item->product_id,
                'goods_name' => $item->goods_name,
                'goods_pic_url' => $item->goods_pic_url,
                'sn' => $item->sn,
                'bn' => $item->bn,
                'nums' => $sendNums[$item->id],
                'weight' => $item->weight,
                'product_spec' => $item->product_spec
            ]);
            if ((int)$item->nums > (int)$item->sendnums) {
                $shipStatus++;
            }
        }
        if ($shipStatus != 0) {
            $order->ship_status = 2;
        } else {
            $order->ship_status = 3;
        }
        $order->save();
        return Helper::Json(1, '发货成功');
    }
}
