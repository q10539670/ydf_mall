<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsTypeRequest as GTRequest;
use App\Models\GoodsType;
use App\Models\Spec;
use App\Models\TypeSpec;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Type
 * @package App\Http\Controllers\Admin
 */
class GoodsTypeController extends Controller
{
    /**
     * index
     * 类型列表
     * @queryParam  condition 类型名称  No-example
     * @queryParam  current_page required 当前页 Example: 1
     * @queryParam  per_page required 每页显示数量 Example: 10
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
     * create
     * 创建类型
     * @return JsonResponse
     */
    public function create()
    {
        $spec = Spec::all();
        return Helper::Json(1,'查询成功',['spec'=>$spec]);
    }

    /**
     * store
     * 保存分类
     * @bodyParam name string required 类型名称 Example: 通用类型
     * @bodyParam spec_id array required 属性名ID Example: [1]
     * @bodyParam sort int required 排序 Example: 100
     * @response {
    "code": 1,
    "message": "创建成功",
    "data": {
    "type": {
    "name": "通用类型",
    "sort": "100",
    "updated_at": "2020-07-14 10:57:26",
    "created_at": "2020-07-14 10:57:26",
    "id": 26,
    "spec": [
    {
    "id": 1,
    "name": "通用",
    "sort": 100,
    "details": "",
    "created_at": "2020-07-06 17:18:24",
    "updated_at": "2020-07-06 17:18:24",
    "pivot": {
    "type_id": 26,
    "spec_id": 1
    }
    }
    ]
    }
    }
     * }
     * @param GTRequest $request
     * @return JsonResponse
     */
    public function store(GTRequest $request)
    {
        //
        $type = GoodsType::create($request->except('spec_id'));
        foreach ($request->spec_id as $spec) {
            TypeSpec::create([
                'type_id'=>$type->id,
                'spec_id'=>$spec
            ]);
        }
        $type->spec;
        return Helper::Json(1, '创建成功', ['type' => $type]);
    }

    /**
     * show
     * 查询类型(单一)
     * @urlParam type required 类型ID Example:1
     * @param GTRequest $id
     * @return JsonResponse
     */
    public function show(GTRequest $id)
    {
        $type = GoodsType::find($id);
        return Helper::Json(1, '查询成功', ['type' => $type]);
    }

    /**
     * edit
     * 编辑类型
     * @urlParam type required 类型ID Example:1
     * @param GTRequest $id
     * @return JsonResponse
     */
    public function edit(GTRequest $id)
    {
        $spec = Spec::all();
        $type = GoodsType::find($id);
        $type[0]->spec;
        return Helper::Json(1,'查询成功',['type' => $type,'spec'=>$spec]);
    }

    /**
     * update
     * 更新类型
     * @urlParam type required 类型ID Example:1
     * @bodyParam name string required 类型名称 Example: 通用类型1
     * @bodyParam spec_id array required 属性名ID Example: [1]
     * @bodyParam sort int required 排序 Example: 100
     * @response {
    "code": 1,
    "message": "更新成功",
    "data": {
    "type": {
    "name": "通用类型1",
    "sort": "100",
    "updated_at": "2020-07-14 10:57:26",
    "created_at": "2020-07-14 10:57:26",
    "id": 26,
    "spec": [
    {
    "id": 1,
    "name": "通用",
    "sort": 100,
    "details": "",
    "created_at": "2020-07-06 17:18:24",
    "updated_at": "2020-07-06 17:18:24",
    "pivot": {
    "type_id": 26,
    "spec_id": 1
    }
    }
    ]
    }
    }
     * }
     * @param GTRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(GTRequest $request, $id)
    {
        if (!$type = GoodsType::find($id)) return Helper::Json(-1, '更新失败,未查到该类型');
        $type->fill($request->except('spec_id'));
        $type->save();
        TypeSpec::where('type_id',$type->id)->delete();
        foreach ($request->spec_id as $spec) {
            TypeSpec::create([
                'type_id'=>$type->id,
                'spec_id'=>$spec
            ]);
        }
        $type->spec;
        return Helper::Json(1, '更新成功', ['type' => $type]);
    }

    /**
     * delete
     * 删除分类
     * @urlParam type required 类型ID Example:1
     * @response {
     *  "code":1,
     *  "message": "删除成功",
     *  "data":[]
     * }
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
