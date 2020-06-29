<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\GoodsCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class GoodsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        //
        $cateModel = new GoodsCategory();
        $treeCates = $cateModel->getCTree();
        //获取所有pid
        $pids = GoodsCategory::groupBy('pid')->get('pid');
        static $allPids = [];
        foreach ($pids as $pid)
        {
            $allPids[] .= $pid->pid;
        }
        return Helper::json(1, '获取分类成功', ['treeCates' => $treeCates,'pids'=>$allPids]);
    }

    /**
     * 获取加前缀的分类
     *
     * @return JsonResponse
     */
    public function create()
    {
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getPrefixTreeData()['data'];
        return Helper::json(1, '获取分类列表成功', ['cates' => $cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pid' =>['required','numeric'],
            'name' => ['required', 'max:32'],
            'goods_type_id' => ['exists:ydf_goods_type,id'],
            'sort' => ['required','numeric'],
            'images_id' => ['exists:ydf_goods_type,id'],
            'status' => ['required','regex:/^[1,2]$/']
        ], [
            'pid.required' => 'PID不能为空',
            'pid.numeric' => 'PID只能是数字',
            'name.required' => '分类名称不能为空',
            'name.max' => '分类名称最大长度为64个字符',
            'goods_type_id.exists' => '商品类型不存在',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'images_id.exists' => '图片不存在',
            'status.required' => '状态不能为空',
            'status.regex' => '状态参数错误',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
        $category = GoodsCategory::create($request->all());
        return Helper::Json(1, '分类创建成功', ['category' => $category]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
