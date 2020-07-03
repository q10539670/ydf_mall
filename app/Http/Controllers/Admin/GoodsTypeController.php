<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsTypeRequest as GTRequest;
use App\Models\GoodsType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GoodsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $condition = $request->input('condition');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = GoodsType::when($condition, function ($query) use ($condition) {
            return $query->where('name', 'like', '%' . $condition . '%');
        });
        $query = $query->orderBy('sort', 'asc');  //排序
        $types = self::paginator($query, $currentPage, $perPage);
        return Helper::Json(1, '查询成功', ['types' => $types]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param GTRequest $request
     * @return JsonResponse
     */
    public function store(GTRequest $request)
    {
        //
        $type = GoodsType::create($request->all());
        return Helper::Json(1, '创建成功', ['type' => $type]);
    }

    /**
     * Display the specified resource.
     *
     * @param GTRequest $id
     * @return JsonResponse
     */
    public function show(GTRequest $id)
    {
        $type = GoodsType::find($id);
        return Helper::Json(1, '查询成功', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param GTRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(GTRequest $request, $id)
    {
        if (!$type = GoodsType::find($id)) return Helper::Json(-1, '更新失败,未查到该类型');
        $type->fill($request->all());
        $type->save();
        return Helper::Json(1, '更新成功', ['type' => $type]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        //检查该类型是否有其他关联
        if ($err = GoodsType::checkSafeOfDestroy($id)) {
            return Helper::Json(-1, $err);
        }
        GoodsType::destroy($id);
        return Helper::Json(1, '删除成功');
    }
}
