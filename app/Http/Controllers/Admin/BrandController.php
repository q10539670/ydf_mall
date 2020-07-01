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
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * 查询所有品牌
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $condition = $request->input('condition');
        $isDel = $request->input('is_del', '0');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = Brand::when($condition, function ($query) use ($condition) {
            return $query->where('name', 'like', '%' . $condition . '%');
        })
            ->when($isDel === '0' or $isDel === '1', function ($query) use ($isDel) {
                return $query->where('is_del', $isDel);
            });
        $query->orderBy('sort','asc');
        $brands = self::paginator($query, $currentPage,$perPage);
        return Helper::Json(1, '品牌查询成功', ['brand' => BrandResource::collection($brands)]);
    }

    /**
     * 创建品牌
     *
     * @param \Illuminate\Http\Request $request
     * @return JsonResponse|Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(BrandRequest $request)
    {
        $brand = Brand::create($request->all());

        return Helper::Json(1, '品牌创建成功', ['brand' => new BrandResource($brand)]);
    }

    /**
     * 查询单一品牌
     *
     * @param BrandRequest $id
     * @return JsonResponse
     */
    public function show(BrandRequest $id)
    {
        $brand = Brand::find($id);
        return Helper::Json(1, '品牌查询成功', ['brand' => BrandResource::collection($brand)]);
    }

    /**
     * 更新品牌
     *
     * @param BrandRequest $request
     * @param int $id
     * @return JsonResponse|Response
     */
    public function update(BrandRequest $request, $id)
    {
        $brand = Brand::find($id);

        $brand->fill($request->all());
        $brand->save();
        return Helper::Json(1, '品牌更新成功', ['brand' => new BrandResource($brand)]);
    }

    /**
     * 删除品牌
     *
     * @param BrandRequest $id
     * @return JsonResponse|Response
     */
    public function destroy($id)
    {
        //
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
