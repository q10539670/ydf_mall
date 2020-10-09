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


class SpecController extends Controller
{

    /**
     * @OA\Get (
     *     path="/spec",
     *     tags={"属性"},
     *     summary="获取属性列表",
     *     description="返回属性列表",
     *     @OA\Parameter(ref="#/components/parameters/current_page"),
     *     @OA\Parameter(ref="#/components/parameters/per_page"),
     *     @OA\Parameter(
     *         name="condition",
     *         description="类型名称",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="属性查询成功",
     *         @OA\JsonContent(ref="#/components/responses/spec"),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     ),
     * )
     * @param  Request  $request
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
     * @OA\Post(
     *     path="/spec",
     *     tags={"属性"},
     *     description="保存属性",
     *     summary="返回保存属性详情",
     *     @OA\RequestBody(ref="#/components/requestBodies/spec_in_body"),
     *     @OA\Response(
     *         response=200,
     *         description="属性保存成功",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     ),
     * )
     * @param  SpecRequest  $request
     * @return JsonResponse
     */
    public function store(SpecRequest $request)
    {
        $spec = Spec::create([
            'name' =>$request->name,
            'sort' =>$request->sort
        ]);
        foreach ($request->values as $value) {
            SpecValue::create([
                'spec_id'=>$spec['id'],
                'name' => $value
            ]);
        }
        $spec->value;
        return Helper::Json(1, '创建成功', ['spec' => $spec]);
    }

    /**
     * @OA\Get(
     *     path="/spec/{spec}",
     *     tags={"属性"},
     *     description="通过ID查询属性",
     *     summary="返回ID所属属性",
     *     @OA\Parameter (ref="#/components/parameters/spec_in_path_required"),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *         @OA\JsonContent(ref="#/components/responses/spec"),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     )
     * )
     * @param  SpecRequest  $id
     * @return JsonResponse
     */
    public function show(SpecRequest $id)
    {
        $spec = Spec::find($id);
        foreach ($spec as $s) $s->value;
        return Helper::Json(1, '查询成功', ['spec' => $spec]);
    }

    /**
     * @OA\Patch(
     *     path="/spec/{spec}",
     *     tags={"属性"},
     *     description="更新属性",
     *     summary="返回更新的属性详情",
     *     @OA\Parameter(ref="#/components/parameters/spec_in_path_required"),
     *     @OA\RequestBody(ref="#/components/requestBodies/spec_in_body"),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *         @OA\JsonContent(ref="#/components/responses/spec"),
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     )
     * )
     * @param  SpecRequest  $request
     * @param $id
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
     * @OA\Delete(
     *     path="/spec/{spec}",
     *     tags={"属性"},
     *     description="删除属性",
     *     summary="返回状态",
     *     @OA\Parameter(ref="#/components/parameters/spec_in_path_required"),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误",
     *     )
     * )
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        if (!TypeSpec::where('spec_id')->first()) return Helper::Json(-1,'删除失败,请先解除该属性关联类型');
        Spec::destroy($id);
        SpecValue::where('spec_id',$id)->delete();

        return Helper::Json(1, '删除成功');
    }
}
