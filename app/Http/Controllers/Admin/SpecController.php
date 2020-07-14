<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SpecRequest;
use App\Models\Spec;
use App\Models\SpecValue;
use App\Models\TypeSpec;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Spec
 * 属性接口
 * Class SpecController
 * @package App\Http\Controllers\Admin
 */
class SpecController extends Controller
{
    /**
     * index
     * 属性列表
     * @queryParam  condition 类型名称  No-example
     * @queryParam  current_page required 当前页 Example: 1
     * @queryParam  per_page required 每页显示数量 Example: 10
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        //
        $condition = $request->input('condition');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = Spec::when($condition, function ($query) use ($condition) {
            return $query->where('name', 'like', '%' . $condition . '%');
        });
        $query = $query->orderBy('sort', 'asc');  //排序
        $specs = self::paginator($query, $currentPage, $perPage);
        foreach ($specs as $spec) $spec->value;
        return Helper::Json(1, '查询成功', ['specs' => $specs]);
    }

    /**
     * store
     * 保存属性
     * @bodyParam name string required 属性名称 Example:码数
     * @bodyParam sort int required 排序(越小越靠前) Example: 100
     * @bodyParam values array required 属性值 Example: [34,35,36,37,38,39,40]
     * @response {
    "code": 1,
    "message": "创建成功",
    "data": {
    "$spec": {
    "name": "码数",
    "sort": "100",
    "updated_at": "2020-07-14 11:08:54",
    "created_at": "2020-07-14 11:08:54",
    "id": 16,
    "value": [
    {
    "id": 61,
    "spec_id": 16,
    "name": "34",
    "sort": 0,
    "details": "",
    "created_at": "2020-07-14 11:08:54",
    "updated_at": "2020-07-14 11:08:54"
    },
    {
    "id": 62,
    "spec_id": 16,
    "name": "35",
    "sort": 0,
    "details": "",
    "created_at": "2020-07-14 11:08:54",
    "updated_at": "2020-07-14 11:08:54"
    },
    {
    "id": 63,
    "spec_id": 16,
    "name": "36",
    "sort": 0,
    "details": "",
    "created_at": "2020-07-14 11:08:54",
    "updated_at": "2020-07-14 11:08:54"
    }
    ]
    }
    }
     * }
     * @param SpecRequest $request
     * @return JsonResponse|Response
     */
    public function store(SpecRequest $request)
    {
        $spec = Spec::create([
            'name' =>$request->name,
            'sort' =>$request->sort
        ]);
        foreach ($request->values as $value) {
            SpecValue::create([
                'spec_id'=>$spec->id,
                'name' => $value
            ]);
        }
        $spec->value;
        return Helper::Json(1, '创建成功', ['$spec' => $spec]);
    }

    /**
     * show
     * 查询属性(单一)
     * @urlParam spec required 属性ID
     *
     * @param SpecRequest $id
     * @return JsonResponse
     */
    public function show(SpecRequest $id)
    {
        $spec = Spec::find($id);
        foreach ($spec as $s) $s->value;
        return Helper::Json(1, '查询成功', ['spec' => $spec]);
    }

    /**
     * update
     * 更新属性
     * @urlParam spec required 属性名ID
     * @bodyParam name string required 属性名称 Example:码数
     * @bodyParam sort int required 排序(越小越靠前) Example: 100
     * @bodyParam values array required 属性值 Example: [34,35,36,37,38,39,40]
     * @response {
    "code": 1,
    "message": "更新成功",
    "data": {
    "$spec": {
    "name": "码数",
    "sort": "100",
    "updated_at": "2020-07-14 11:08:54",
    "created_at": "2020-07-14 11:08:54",
    "id": 16,
    "value": [
    {
    "id": 61,
    "spec_id": 16,
    "name": "34",
    "sort": 0,
    "details": "",
    "created_at": "2020-07-14 11:08:54",
    "updated_at": "2020-07-14 11:08:54"
    },
    {
    "id": 62,
    "spec_id": 16,
    "name": "35",
    "sort": 0,
    "details": "",
    "created_at": "2020-07-14 11:08:54",
    "updated_at": "2020-07-14 11:08:54"
    },
    {
    "id": 63,
    "spec_id": 16,
    "name": "36",
    "sort": 0,
    "details": "",
    "created_at": "2020-07-14 11:08:54",
    "updated_at": "2020-07-14 11:08:54"
    }
    ]
    }
    }
     * }
     * @param SpecRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(SpecRequest $request, $id)
    {

        $spec = Spec::find($id);
        SpecValue::where('spec_id',$id)->delete();
        $spec->fill($request->only('name','sort'));
        $spec->save();
        foreach ($request->values as $value) {
            SpecValue::create([
                'spec_id'=>$spec->id,
                'name' => $value
            ]);
        }
        $spec->value;
        return Helper::Json(1, '更新成功', ['$spec' => $spec]);
    }

    /**
     * delete
     * 删除
     *
     * @param int $id
     * @return JsonResponse|Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        if (!TypeSpec::where('spec_id')->first()) return Helper::Json(-1,'删除失败,请先解除该属性关联类型');
        Spec::destroy($id);
        SpecValue::where('spec_id',$id)->delete();

        return Helper::Json(1, '删除成功');
    }
}
