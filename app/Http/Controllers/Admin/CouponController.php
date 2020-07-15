<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Coupon
 * 优惠券接口
 */
class CouponController extends Controller
{
    /**
     * index
     * 优惠券列表
     * @queryParam name 优惠券名称 No-example
     * @queryParam status 状态[1:正常 2:禁用] No-example
     * @queryParam date_range 起止时间[] No-example
     * @queryParam name 优惠券名称 No-example
     * @queryParam name 优惠券名称 No-example
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $dateRange = $request->input('date_range');
        $dateRange = $dateRange[0] != '' && $dateRange[1] != '' ? [$dateRange[0] . ' 00:00:00', $dateRange[1] . ' 23:59:59'] : '';
        $perPage = ($request->input('per_page') != '') ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Coupon::when($name != '',function ($query) use($name) {
            return $query->where('name', 'like', '%'. $name.'%');
        })
            ->when($status == 1 || $status == 2,function ($query) use($status) {
                return $query->where('status',$status);
            })
            ->when($dateRange != '',function ($query) use($dateRange) {
                return $query->where('start_time', '>', $dateRange[0])->orWhere('end_time','<',$dateRange[1]);
            });
        $query->orderBy('created_at','desc');
        $coupons = self::paginator($query, $currentPage, $perPage);
        return Helper::Json(1,'查询成功',['coupons' =>$coupons]);

    }

    /**
     * store
     * 保存优惠券
     *
     * @bodyParam name string required 优惠券名称 Example: 20元优惠券
     * @bodyParam type int required 优惠券类型[0:全场赠券 1:会员赠券 2:购物赠券 3:注册赠券] Example:0
     * @bodyParam use_key int required 使用场景[0:全场通用 1:指定分类 2:指定商品] Example:2
     * @bodyParam use_value array required 使用场景对应的指定分类或者商品的id Example:[1,2,3]
     * @bodyParam amount float required 优惠券金额 Example:20.00
     * @bodyParam per_limit int required 每人限领数量 Example:1
     * @bodyParam min_point float required 使用门槛[0.00表示无门槛] Example:0.00
     * @bodyParam start_time date required 开始时间 Example: 2020-07-01
     * @bodyParam end_time data required 结束时间 Example: 2020-08-31
     * @bodyParam note string 备注 Example: 这是一张优惠券
     * @bodyParam enable_time data required 可领取的结束时间 Example: 2020-07-31
     * @bodyParam status int required 状态[1:正常 2:禁用]
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $code =
        $request->merge(['code' => $code]);
        $coupon = Coupon::create($request->all());
        return Helper::Json(1,'优惠券创建成功',['coupon' => $coupon]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
