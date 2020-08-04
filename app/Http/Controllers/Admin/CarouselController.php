<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarouselRequest;
use App\Models\Carousel;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Carousel
 * 轮播图管理
 * @package App\Http\Controllers\Admin
 */
class CarouselController extends Controller
{
    /**
     * index
     * 轮播图列表
     *
     * @queryParam name 轮播图名称 No-example
     * @queryParam type 轮播图类型[0:图片 1:视频] No-example
     * @queryParam date_range 起止时间 No-example
     * @queryParam is_del 是否删除[0:正常 1:删除] Example: 0
     * @queryParam current_page required 当前页 Example: 1
     * @queryParam per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $name = $request->input('name');
        $type = $request->input('type');
        $dateRange = Helper::formatDateString($request->input('date_range'));
        $isDel = $request->input('is_del', '0');
        $perPage = $request->input('per_page') != '' ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = Carousel::when($name != '', function ($query) use ($name) {
            return $query->where('name', 'like', '%'.$name.'%');
        })
            ->when($type === 0 || $type === 1, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when($dateRange != '', function ($query) use ($dateRange) {
                return $query->where('start_at', '>', $dateRange[0])->orWhere('end_at', '<', $dateRange[1]);
            })
            ->when($isDel === 0 || $isDel === 1, function ($query) use ($isDel) {
                return $query->where('is_del', $isDel);
            });
        $query->orderBy('created_at', 'desc');
        $carousels = self::paginator($query, $currentPage, $perPage);
        foreach ($carousels as $carousel) {
            $carousel->image;
        }
        return Helper::Json(1, '查询成功', ['coupons' => $carousels]);
    }

    /**
     * store
     * 保存
     *
     * @bodyParam name string required 轮播图名称 Example:轮播图1
     * @bodyParam type int required 类型[0:图片 1:视频] Example:0
     * @bodyParam path string required 跳转地址 Example:https://www.baidu.com
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam is_show int required 展示标记[0:不展示 1:展示] Example:1
     * @bodyParam image_id int required 资源ID Example:1
     * @bodyParam start_at date 开始时间
     * @bodyParam end_at date 结束时间
     * @bodyParam is_delete required 删除标记[0:正常 1:删除] Example:0
     * @param  CarouselRequest  $request
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "创建成功",
    "data": {
    "carousel": {
    "name": "轮播图1",
    "type": "0",
    "path": "https://www.baidu.com",
    "sort": "100",
    "is_show": "1",
    "image_id": "1",
    "start_at": "2020-08-01 00:00:00",
    "end_at": "2020-08-31 23:59:59",
    "is_delete": "0",
    "updated_at": "2020-08-04 18:00:03",
    "created_at": "2020-08-04 18:00:03",
    "id": 7
    }
    }
     * }
     */
    public function store(CarouselRequest $request)
    {
        $request->merge(['start_at' => Helper::formatTimeString($request->input('start_at'),'start')]);
        $request->merge(['end_at' => Helper::formatTimeString($request->input('end_at'))]);
        $carousel = Carousel::create($request->all());
        return Helper::Json(1,'创建成功',['carousel' =>$carousel]);
    }

    /**
     * show
     * 查询(单一)
     * @urlParam carousel required 轮播图ID Example:1
     * @param  CarouselRequest  $id
     * @return JsonResponse
     */
    public function show(CarouselRequest $id)
    {
        $carousel = Carousel::find($id);
        $carousel[0]->image;
        return Helper::Json(1,'查询成功',['carousel' =>$carousel]);
    }

    /**
     * update
     * 更新
     * @urlParam carousel required 轮播图ID Example:1
     * @bodyParam name string required 轮播图名称 Example:轮播图1
     * @bodyParam type int required 类型[0:图片 1:视频] Example:0
     * @bodyParam path string required 跳转地址 Example:https:www.baidu.com
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam is_show int required 展示标记[0:不展示 1:展示] Example:1
     * @bodyParam image_id int required 资源ID Example:1
     * @bodyParam start_at date 开始时间
     * @bodyParam end_at date 结束时间
     * @bodyParam is_delete required 删除标记[0:正常 1:删除] Example:0
     * @param  CarouselRequest  $request
     * @param  int  $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "更新成功",
    "data": {
    "carousel": {
    "id": 7,
    "name": "轮播图1",
    "type": "0",
    "path": "https://www.baidu.com",
    "sort": "100",
    "is_show": "1",
    "image_id": "1",
    "start_at": "2020-08-01 00:00:00",
    "end_at": "2020-08-31 23:59:59",
    "is_delete": "0",
    "created_at": "2020-08-04 18:00:03",
    "updated_at": "2020-08-04 18:00:03"
    }
    }
     * }
     */
    public function update(CarouselRequest $request, $id)
    {
        $carousel = Carousel::find($id);
        $request->merge(['start_at' => Helper::formatTimeString($request->input('start_at'),'start')]);
        $request->merge(['end_at' => Helper::formatTimeString($request->input('end_at'))]);
        $carousel->fill($request->all());
        $carousel->save();
        return Helper::Json(1,'更新成功',['carousel' =>$carousel]);

    }

    /**
     * delete
     * 删除
     * @urlParam carousel required 轮播图ID Example:1
     * @param  int  $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "删除成功",
    "data": []
     * }
     */
    public function destroy($id)
    {
        if (!$carousel = Carousel::find($id)) {
            return Helper::Json(-1,'删除失败,ID参数错误');
        }
        $carousel->is_delete = 1;
        $carousel->save();
        return Helper::Json(-1,'删除成功');
    }
}
