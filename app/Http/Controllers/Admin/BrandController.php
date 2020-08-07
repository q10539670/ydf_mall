<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Http\Resources\Admin\BrandResource;
use App\Models\Brand;
use App\Models\Goods;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Brand
 * 品牌接口
 * @package App\Http\Controllers\Admin
 */
class BrandController extends Controller
{
    /**
     * index
     * 品牌列表
     * @queryParam  condition 品牌名称  Example: 三星
     * @queryParam  is_del 是否删除
     * @queryParam  current_page required 当前页 Example: 1
     * @queryParam  per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $condition = $request->input('condition');//distribution
        $isDel = $request->input('is_del', '0');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = Brand::when($condition, function ($query) use ($condition) {
            return $query->where('name', 'like', '%'.$condition.'%');
        })
            ->when($isDel === '0' or $isDel === '1', function ($query) use ($isDel) {
                return $query->where('is_del', $isDel);
            });
        $query->orderBy('sort', 'asc');
        $brands = self::paginator($query, $currentPage, $perPage);
        return Helper::Json(1, '品牌查询成功', ['brand' => BrandResource::collection($brands)]);
    }

    /**
     * store
     * 保存品牌
     *
     * @bodyParam name string required  品牌名称 Example:三星
     * @bodyParam logo int required  logo图片ID Example:1
     * @bodyParam sort int required  排序 Example: 100
     * @bodyParam is_del int required  是否删除[0:正常,1:删除] Example:0
     * @response {
     * "code": 1,
     * "message": "品牌创建成功",
     * "data": {
     * "brand": {
     * "id": 51,
     * "name": "三星",
     * "logo_id": "1",
     * "logo": "http://192.168.0.178:8888/storage/images/20200629/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
     * "sort": "100",
     * "is_del": "0",
     * "created_at": "2020-07-13 17:37:27",
     * "updated_at": "2020-07-13 17:37:27"
     * }
     * }
     * }
     * @param  BrandRequest  $request
     * @return JsonResponse|Response
     */
    public function store(BrandRequest $request)
    {
        $brand = Brand::create($request->all());
        return Helper::Json(1, '品牌创建成功', ['brand' => new BrandResource($brand)]);
    }

    /**
     * show
     * 查询单一品牌
     * @urlParam brand required 品牌ID Example:1
     * @param  BrandRequest  $id
     * @return JsonResponse
     */
    public function show(BrandRequest $id)
    {
        $brand = Brand::find($id);
        return Helper::Json(1, '品牌查询成功', ['brand' => BrandResource::collection($brand)]);
    }

    /**
     * update
     * 更新品牌
     * @urlParam brand required 品牌ID Example:51
     * @bodyParam name string required  品牌名称 Example:三星
     * @bodyParam logo int required  logo图片ID Example:1
     * @bodyParam sort int required  排序 Example: 90
     * @bodyParam is_del int required  是否删除[0:正常,1:删除] Example:0
     * @response {
     * "code": 1,
     * "message": "品牌更新成功",
     * "data": {
     * "brand": {
     * "id": 51,
     * "name": "三星",
     * "logo_id": "1",
     * "logo": "http://192.168.0.178:8888/storage/images/20200629/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
     * "sort": "90",
     * "is_del": "0",
     * "created_at": "2020-07-13 17:37:27",
     * "updated_at": "2020-07-13 17:37:27"
     * }
     * }
     * }
     * @param  BrandRequest  $request
     * @param  int  $id
     * @return JsonResponse|Response
     */
    public function update(BrandRequest $request, $id)
    {
        if (!$brand = Brand::find($id)) {
            return Helper::Json(-1, '更新失败,未查到该品牌');
        }
        $brand = Brand::find($id);
        $brand->fill($request->all());
        $brand->save();
        return Helper::Json(1, '品牌更新成功', ['brand' => new BrandResource($brand)]);
    }

    /**
     * delete
     * 删除品牌
     *
     * @urlParam brand required 品牌ID Example:51
     * @param  BrandRequest  $id
     * @return JsonResponse|Response
     * @response {
     * "code": 1,
     * "message": "品牌删除成功",
     * "data": {
     * "brand": {
     * "id": 51,
     * "name": "三星",
     * "logo_id": "1",
     * "logo": "http://192.168.0.178:8888/storage/images/20200629/1a50b6ea3afc308f4b88407bd0d7ecf9.jpg",
     * "sort": "90",
     * "is_del": "1",
     * "created_at": "2020-07-13 17:37:27",
     * "updated_at": "2020-07-13 17:37:27"
     * }
     * }
     * }
     */
    public function destroy($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return Helper::Json(-1, '品牌参数错误');
        }
        if (Goods::where('brand_id', $id)->first()) {
            return Helper::Json(-1, '删除失败,该品牌下还有商品');
        }
        if ($brand->is_del == 1) {
            return Helper::Json(-1, '删除失败,该品牌已被删除');
        }
        $brand->is_del = 1;
        $brand->save();
//        $brand = Brand::find($id);
        return Helper::Json(1, '删除成功', ['brand' => new BrandResource($brand)]);
    }


}
