<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BrandRequest;
use App\Http\Resources\Admin\BrandResource;
use App\Models\Brand;
use App\Models\Goods;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    /**
     * 查询所有品牌
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $condition = $request->input('condition');
        $isDel = $request->input('is_del', '0');
        $query = Brand::when($condition, function ($query) use ($condition) {
            return $query->where('name', 'like', '%' . $condition . '%');
        })
            ->when($isDel === '0' or $isDel === '1', function ($query) use ($isDel) {
                return $query->where('is_del', $isDel);
            })
            ->orderBy('sort', 'asc')->orderBy('created_at', 'desc');
        $page = $request->has('page') ? $request->page : 1;
        $total = $query->count();
        $items = $query->offset($this->perPage * ($page - 1))->limit($this->perPage)->get();
//        dd($items);
        $brands = new Paginator($items, $total, $this->perPage, $page);
//        $brands = new BrandResource($brands);
        return Helper::Json(1, '品牌查询成功', [
            'current_page' => $page,
            'per_page' => $this->perPage,
            'total_page' => ceil($total / $this->perPage),
            'total' => $total,
            'brands' => BrandResource::collection($brands)
        ]);
    }

    /**
     * 创建品牌
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:64'],
            'logo' => ['required', 'exists:ydf_images,id'],
            'sort' => ['required', 'numeric'],
            'is_del' => ['required', 'regex:/^[0,1]$/']
        ], [
            'name.required' => '品牌名称不能为空',
            'name.max' => '品牌名称最大长度为64个字符',
            'logo.required' => 'logo不能为空',
            'logo.exists' => 'logo不存在',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'is_del.required' => '状态不能为空',
            'is_del.regex' => '状态参数错误',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
        $brand = Brand::create($request->all());
        return Helper::Json(1, '品牌创建成功', ['brand' => $brand]);
    }

    /**
     * 查询单一品牌
     *
     * @param BrandRequest $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $brand = Brand::find($id);
        if (!$brand) {
            return Helper::Json(-1, '查询参数错误');
        }
        return Helper::Json(1, '品牌查询成功', ['brand' => new BrandResource($brand)]);
    }

    /**
     * 更新品牌
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'max:64'],
            'logo' => ['required', 'exists:ydf_images,id'],
            'sort' => ['required', 'numeric'],
            'is_del' => ['required', 'regex:/^[0,1]$/']
        ], [
            'name.required' => '品牌名称不能为空',
            'name.max' => '品牌名称最大长度为64个字符',
            'logo.required' => 'logo不能为空',
            'logo.exists' => 'logo不存在',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'is_del.required' => '状态不能为空',
            'is_del.regex' => '状态参数错误',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
        $brand = Brand::find($id);
        if (!$brand) {
            return Helper::Json(-1, '品牌参数错误');
        }
        $brand->fill($request->all());
        $brand->save();
        return Helper::Json(1, '品牌更新成功', ['brand' => $brand]);
    }

    /**
     * 删除品牌
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $brand = Brand::find($id);
        if (!$brand) {
            return Helper::Json(-1, '删除失败,参数错误');
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
        return Helper::Json(1, '删除成功', ['brand' => $brand]);
    }
}
