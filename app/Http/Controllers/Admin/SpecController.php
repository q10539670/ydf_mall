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
     * Display a listing of the resource.
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
     * Store a newly created resource in storage.
     *
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
     * Display the specified resource.
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
     * Update the specified resource in storage.
     *
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
     * Remove the specified resource from storage.
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
