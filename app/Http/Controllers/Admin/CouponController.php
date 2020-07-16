<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Models\Coupon;
use App\Models\Goods;
use App\Models\GoodsCategory;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Monolog\Handler\IFTTTHandler;

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
     * @queryParam perPage required 每页显示数量 Example: 10
     * @queryParam currentPage required 当前页 Example: 1
     * @queryParam del 是否删除[0:正常 1:删除]空值或0查正常 其他数值均为查所有 No-example
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $dateRange = Helper::formatDateString($request->input('date_range'));
        $del = $request->input('del') != '' ? $request->input('per_page') : 0;;
        $perPage = $request->input('per_page') != '' ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Coupon::when($name != '', function ($query) use ($name) {
            return $query->where('name', 'like', '%'.$name.'%');
        })
            ->when($status == 1 || $status == 2, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($dateRange != '', function ($query) use ($dateRange) {
                return $query->where('start_time', '>', $dateRange[0])->orWhere('end_time', '<', $dateRange[1]);
            })
            ->when($del == 0 || $del == 1, function ($query) use ($del) {
                return $query->where('is_del', $del);
            });
        $query->orderBy('created_at', 'desc');
        $coupons = self::paginator($query, $currentPage, $perPage);
        return Helper::Json(1, '查询成功', ['coupons' => $coupons]);

    }

    /**
     * create
     * 创建优惠券
     *
     * @return JsonResponse
     */
    public function create()
    {
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        $goods = Goods::where('is_del', 0)->get();
        return Helper::Json(1, '查询成功', ['cates' => $cates, 'goods' => $goods]);
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
     * @bodyParam publish_count int required 发放数量 Example: 1000
     * @bodyParam enable_time data required 可领取的结束时间 Example: 2020-07-31
     * @bodyParam status int required 状态[1:正常 2:禁用]
     * @response {
     * "code": 1,
     * "message": "优惠券创建成功",
     * "data": {
     * "coupon": {
     * "type": "0",
     * "name": "20元优惠券",
     * "use_key": "0",
     * "use_value": "",
     * "amount": "20",
     * "per_limit": "1",
     * "min_point": "0",
     * "start_time": "2020-07-01",
     * "end_time": "2020-08-31",
     * "note": "这是一张优惠券",
     * "publish_count": "1000",
     * "enable_time": "2020-07-31",
     * "status": "1",
     * "code": "97D7BE62C439EB97",
     * "updated_at": "2020-07-16 14:29:17",
     * "created_at": "2020-07-16 14:29:17",
     * "id": 3
     * }
     * }
     * }
     * @param  CouponRequest  $request
     * @return JsonResponse
     */
    public function store(CouponRequest $request)
    {
        $code = strtoupper(substr(md5(time().mt_rand(1, 1000000)), 8, 16));
        $request->merge(['code' => $code]);
        if (is_array($useValue = $request->input('use_value')) && !empty($useValue)) {
            $useValue = implode(',', $useValue);
        } else {
            $useValue = '';
        }
        $request->merge(['use_value' => $useValue]);
        $coupon = Coupon::create($request->all());
        return Helper::Json(1, '优惠券创建成功', ['coupon' => $coupon]);
    }

    /**
     * edit
     * 编辑
     * @urlParam coupon required 优惠券ID Example:1
     * @param $id
     * @return JsonResponse
     */
    public function edit(CouponRequest $id)
    {
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        $goods = Goods::where('is_del', 0)->get();
        $coupon = Coupon::find($id);
        return Helper::Json(1, '查询成功', ['coupon' => $coupon, 'cates' => $cates, 'goods' => $goods]);
    }

    /**
     * update
     * 更新优惠券
     *
     * @urlParam coupon required 优惠券ID Example:1
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
     * @bodyParam publish_count int required 发放数量 Example: 1000
     * @bodyParam enable_time data required 可领取的结束时间 Example: 2020-07-31
     * @bodyParam status int required 状态[1:正常 2:禁用]
     * @param  CouponRequest  $request
     * @param  int  $id
     * @return JsonResponse
     * @response {
     * "code": 1,
     * "message": "优惠券更新成功",
     * "data": {
     * "coupon": {
     * "type": "0",
     * "name": "20元优惠券",
     * "use_key": "0",
     * "use_value": "",
     * "amount": "20",
     * "per_limit": "1",
     * "min_point": "0",
     * "start_time": "2020-07-01",
     * "end_time": "2020-08-31",
     * "note": "这是一张优惠券",
     * "publish_count": "1000",
     * "enable_time": "2020-07-31",
     * "status": "1",
     * "code": "97D7BE62C439EB97",
     * "updated_at": "2020-07-16 14:29:17",
     * "created_at": "2020-07-16 14:29:17",
     * "id": 3
     * }
     * }
     * }
     */
    public function update(CouponRequest $request, $id)
    {
        $coupon = Coupon::find($id);
        $data = $request->all();
        if (is_array($useValue = $data['use_value']) && !empty($useValue)) {
            $useValue = implode(',', $useValue);
        } else {
            $useValue = "";
        }
        $data['use_value'] = $useValue;
        $coupon->fill($data);
        $coupon->save();
        return Helper::Json(1, '更新成功', ['coupon' => $coupon]);
    }

    /**
     * delete
     * 删除优惠券
     *
     * @urlParam coupon required 优惠券ID Example:1
     * @param  int  $id
     * @return JsonResponse
     *
     * @response {
     *  "code": 1,
     *  "message": "删除成功",
     *  "data": []
     * }
     */
    public function destroy($id)
    {
        if (!$coupon = Coupon::find($id)) {
            return Helper::Json(-1, '删除失败,优惠券不存在');
        }
        if ($coupon->is_del == 1) {
            return Helper::Json(-1, '删除失败,优惠券已删除');
        }
        $coupon->is_del = 1;
        $coupon->save();
        return Helper::Json(1, '删除成功');
    }
}
