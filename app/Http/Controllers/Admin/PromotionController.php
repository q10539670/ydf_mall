<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PromotionRequest;
use App\Models\Goods;
use App\Models\Promotion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Promotion
 * 促销接口
 */
class PromotionController extends Controller
{
    /**
     * index
     * 促销列表
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $status = $request->input('status');
        $exclusive = $request->input('exclusive');
        $dateRange = Helper::formatDateString($request->input('date_range'));
        $del = $request->input('del', 0);
        $perPage = ($request->input('per_page') != '') ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Promotion::when($name != '', function ($query) use ($name) {
            return $query->where('name', 'like', '%'.$name.'%');
        })
            ->when($status == 1 || $status == 2, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($exclusive == 1 || $exclusive == 2, function ($query) use ($exclusive) {
                return $query->where('exclusive', $exclusive);
            })
            ->when($dateRange != '', function ($query) use ($dateRange) {
                return $query->where('start_time', '>', $dateRange[0])->orWhere('end_time', '<', $dateRange[1]);
            })
            ->when($del === 0 || $del === 1, function ($query) use ($del) {
                return $query->where('is_del', $del);
            });
        $query->orderBy('sort', 'asc');
        $promotions = self::paginator($query, $currentPage, $perPage);
        return Helper::Json(1, '查询成功', ['promotions' => $promotions]);
    }

    /**
     * create
     * 创建促销
     * @return JsonResponse
     */
    public function create()
    {
        $goods = Goods::where('is_del', 0)->get();
        return Helper::Json(1, '查询成功', [ 'goods' => $goods]);
    }

    /**
     * store
     * 保存促销
     * @bodyParam name string required 促销名称 Example:国庆节促销
     * @bodyParam exclusive int required 排他标志[1:不排他 2:排他] Example:1
     * @bodyParam condition_code string required 促销条件编码[GOODS_ALL(所有商品),GOODS_IDS(指定商品),ORDER_FULL(订单满减)] Example:GOODS_IDS
     * @bodyParam condition_params array required 促销条件参数[1,2,3] Example:1
     * @bodyParam result_code string required 促销结果编码[GOODS_DISCOUNT(指定商品X折) ORDER_REDUCE(订单减多少钱)] Example:GOODS_DISCOUNT
     * @bodyParam result_params string required 促销结果参数[{"discount":97}(指定商品97折)] Example:{"discount":97}
     * @bodyParam description string required 促销描述 Example: 这是一个国庆节促销活动
     * @bodyParam sort numeric required 排序 Example: 100
     * @bodyParam start_time date required 开始时间 Example: 2020-07-01
     * @bodyParam end_time data required 结束时间 Example: 2020-08-31
     * @bodyParam is_del int required 是否删除[0:正常 1:删除] Example: 0
     * @bodyParam status int required 状态[1:正常 2:禁用] Example:1
     * @param  PromotionRequest  $request
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "创建成功",
    "data": {
    "promotion": {
    "name": "元旦促销",
    "exclusive": "1",
    "condition_code": "GOODS_IDS",
    "condition_params": [1],
    "result_code": "GOODS_DISCOUNT",
    "result_params": "{\"discount\":77}",
    "description": "这是一个元旦促销活动",
    "sort": "100",
    "start_time": "2020-07-01",
    "end_time": "2020-08-31",
    "is_del": "0",
    "status": "1",
    "updated_at": "2020-07-16 17:46:56",
    "created_at": "2020-07-16 17:46:56",
    "id": 1
    }
    }
     * }
     */
    public function store(PromotionRequest $request)
    {
        if (is_array($conditionParams = $request->input('condition_params')) && !empty($conditionParams)) {
            $conditionParams = implode(',', $conditionParams);
        } else {
            $conditionParams = '';
        }
        $request->merge(['condition_params' => $conditionParams]);
        $request->merge(['start_time' => Helper::formatTimeString($request->input('start_time'),'start')]);
        $request->merge(['end_time' => Helper::formatTimeString($request->input('end_time'))]);
        $promotion = Promotion::create($request->all());
        return Helper::Json(1,'创建成功',['promotion'=>$promotion]);
    }

    /**
     * show
     * 查询促销
     * @urlParam promotion required 促销ID Example: 1
     * @param  PromotionRequest  $id
     * @return JsonResponse
     */
    public function show(PromotionRequest $id)
    {
        $promotion = Promotion::find($id);
        return Helper::Json(1,'查询成功',['promotion' => $promotion]);
    }

    /**
     * edit
     * 编辑促销
     * @urlParam promotion required 促销ID Example: 1
     * @param  PromotionRequest  $id
     * @return JsonResponse
     */
    public function edit(PromotionRequest $id)
    {
        $promotion = Promotion::find($id);
        $goods = Goods::where('is_del', 0)->get();
        return Helper::Json(1, '查询成功', ['goods' => $goods,'promotion' =>$promotion]);
    }

    /**
     * update
     * 更新促销
     * @urlParam promotion required 促销ID Example: 1
     * @bodyParam name string required 促销名称 Example:国庆节促销
     * @bodyParam exclusive int required 排他标志[1:不排他 2:排他] Example:3
     * @bodyParam condition_code string required 促销条件编码[GOODS_ALL(所有商品),GOODS_IDS(指定商品),ORDER_FULL(订单满减)] Example:GOODS_IDS
     * @bodyParam condition_params array required 促销条件参数[1,2,3] Example:1
     * @bodyParam result_code string required 促销结果编码[GOODS_DISCOUNT(指定商品X折) ORDER_REDUCE(订单减多少钱)] Example:GOODS_DISCOUNT
     * @bodyParam result_params string required 促销结果参数[{"discount":97}(指定商品97折)] Example:{"discount":97}
     * @bodyParam description string required 促销描述 Example: 这是一个国庆节促销活动
     * @bodyParam sort numeric required 排序 Example: 100
     * @bodyParam start_time date required 开始时间 Example: 2020-07-01
     * @bodyParam end_time data required 结束时间 Example: 2020-08-31
     * @bodyParam is_del int required 是否删除[0:正常 1:删除] Example: 0
     * @bodyParam status int required 状态[1:正常 2:禁用] Example:1
     * @param  PromotionRequest  $request
     * @param  int  $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "更新成功",
    "data": {
    "promotion": {
    "name": "元旦促销",
    "exclusive": "1",
    "condition_code": "GOODS_IDS",
    "condition_params": [1,2,3],
    "result_code": "GOODS_DISCOUNT",
    "result_params": "{\"discount\":77}",
    "description": "这是一个元旦促销活动",
    "sort": "100",
    "start_time": "2020-07-01",
    "end_time": "2020-08-31",
    "is_del": "0",
    "status": "1",
    "updated_at": "2020-07-16 17:46:56",
    "created_at": "2020-07-16 17:46:56",
    "id": 1
    }
    }
     * }
     */
    public function update(PromotionRequest $request, $id)
    {
        if (is_array($conditionParams = $request->input('condition_params')) && !empty($conditionParams)) {
            $conditionParams = implode(',', $conditionParams);
        } else {
            $conditionParams = '';
        }
        $request->merge(['start_time' => Helper::formatTimeString($request->input('start_time'),'start')]);
        $request->merge(['end_time' => Helper::formatTimeString($request->input('end_time'))]);
        $request->merge(['condition_params' => $conditionParams]);
        $promotion = Promotion::find($id);
        $promotion->fill($request->all());
        $promotion->save();
        return Helper::Json(1,'更新成功',['promotion'=>$promotion]);
    }

    /**
     * delete
     * 删除促销
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
        if (!$promotion = Promotion::find($id)) {
            return Helper::Json(-1, '删除失败,该促销不存在');
        }
        if ($promotion->is_del == 1) {
            return Helper::Json(-1, '删除失败,该促销已删除');
        }
        $promotion->is_del = 1;
        $promotion->save();
        return Helper::Json(1, '删除成功');
    }
}
