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

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
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
//        $brands = $query->orderBy('sort', 'asc')->orderBy('created_at', 'desc')->paginate(10);
        $perPage = 5;
        $page = $request->has('page') ? $request->page : 1;
        $total = $query->count();
        $items = $query->offset($perPage * ($page - 1))->limit($perPage)->get();
        $user = new Paginator($items, $total, $perPage, $page);
        return Helper::Json(1, '品牌查询成功', ['brands' => BrandResource::collection($user)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        $brand = Brand::create($request->all());
        return Helper::Json(1, '品牌创建成功', ['brand' => $brand]);
    }

    /**
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        //
        $brand = Brand::find($id);
        $brand->fill($request->all());
        $brand->save();
        return Helper::Json(1, '品牌更新成功', ['brand' => $brand]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $brand = Brand::find($id);
        if (Goods::where('brand', $id)->first()) {
            return Helper::Json(-1, '删除失败,该品牌下还有商品');
        }
        $brand->is_del = 1;
        $brand->save();
        return Helper::Json(1, '删除成功');
    }
}
