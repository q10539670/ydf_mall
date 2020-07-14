<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GoodsCategoryRequest as GCRequest;
use App\Models\Goods;
use App\Models\GoodsCategory;
use App\Models\GoodsType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Category
 * 商品分类接口
 * @package App\Http\Controllers\Admin
 */

class GoodsCategoryController extends Controller
{
    /**
     * index
     * 分类列表
     *
     * @return JsonResponse
     */
    public function index()
    {
        $cateModel = new GoodsCategory();
        $treeCates = $cateModel->getCatesForTable();
        //获取所有pid
        $pids = GoodsCategory::groupBy('pid')->get('pid');
        static $allPids = [];
        foreach ($pids as $pid) {
            $allPids[] .= $pid->pid;
        }
        return Helper::Json(1, '获取分类成功', ['pids' => $allPids, 'treeCates' => $treeCates]);
    }

    /**
     * create
     * 获取加前缀的分类
     * 获取商品类型
     * @return JsonResponse
     */
    public function create()
    {
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        $types = GoodsType::orderBy('sort', 'asc')->get();
        array_unshift($cates,['id'=>0,'name'=>'顶级分类']);
        return Helper::json(1, '获取分类列表成功', ['types' => $types, 'cates' => $cates]);
    }

    /**
     * store
     * 保存分类
     * @bodyParam pid int required 父级ID Example: 1
     * @bodyParam name string required 分类名称 Example: 短裤
     * @bodyParam goods_type_id int required 商品类型ID Example: 1
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam image_id int required 分类图片ID Example:1
     * @bodyParam status int required 状态[1:显示,2:隐藏] Example:1
     * @response {
     * "code": 1,
    "message": "分类创建成功",
    "data": {
    "category": {
    "pid": "1",
    "name": "短裤",
    "goods_type_id": "1",
    "sort": "100",
    "image_id": "1",
    "status": "1",
    "updated_at": "2020-07-14 09:20:32",
    "created_at": "2020-07-14 09:20:32",
    "id": 32
    }
    }
     * }
     * @param Request $request
     * @return JsonResponse
     */
    public function store(GCRequest $request)
    {
        $data = $request->all();
        if (!$data['goods_type_id']) unset($data['goods_type_id']);
        if (!$data['image_id']) unset($data['image_id']);
//        GoodsCategory::validator($data);
        $category = GoodsCategory::create($data);
        return Helper::Json(1, '分类创建成功', ['category' => $category]);

    }

    /**
     * show
     * 查询分类(单一)
     * @urlParam category required 分类ID Example: 1
     * @param int $id
     * @return JsonResponse
     */
    public function show(GCRequest $id)
    {
        //
        $cate = GoodsCategory::find($id);
        if (!$cate) return Helper::Json(-1, '参数错误');

        return Helper::Json(1, '分类查询成功', ['cate' => $cate]);
    }

    /**
     * edit
     * 编辑分类
     * @urlParam category required 分类ID Example: 1
     * @param  GCRequest  $id
     * @return JsonResponse
     */
    public function edit(GCRequest $id)
    {
        $cate = GoodsCategory::find($id);
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        array_unshift($cates,['id'=>0,'name'=>'顶级分类']);
        $types = GoodsType::orderBy('sort', 'asc')->get();
        return Helper::Json(1, '分类查询成功', ['cate' => $cate, 'types' => $types, 'cates' => $cates]);
    }

    /**
     * update
     * 更新分类
     * @urlParam category required 分类ID Example: 32
     * @bodyParam pid int required 父级ID Example: 1
     * @bodyParam name string required 分类名称 Example: 短裤2
     * @bodyParam goods_type_id int required 商品类型ID Example: 1
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam image_id int required 分类图片ID Example:1
     * @bodyParam status int required 状态[1:显示,2:隐藏] Example:1
     * @response {
     * "code": 1,
     * "message": "分类更新成功",
     * "data": {
     * "category": {
     * "pid": "1",
     * "name": "短裤2",
     * "goods_type_id": "1",
     * "sort": "100",
     * "image_id": "1",
     * "status": "1",
     * "updated_at": "2020-07-14 09:20:32",
     * "created_at": "2020-07-14 09:20:32",
     * "id": 32
     * }
     * }
     * }
     * @param  GCRequest  $request
     * @param  int  $id
     * @return JsonResponse
     */
    public function update(GCRequest $request, $id)
    {
        //
        $data = $request->all();

        if (!$cate = GoodsCategory::find($id)) {
            return Helper::Json(-1, '参数错误,未查到该分类');
        }
        $cate->fill($data);
        GoodsCategory::setStatus($data['status'], $id);
        $cate->save();
        return Helper::Json(1, '品牌更新成功', ['cate' => $cate]);
    }

    /**
     * delete
     * 删除分类
     * @urlParam category required 分类ID Example: 1
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
        if (!$cate = GoodsCategory::find($id)) return Helper::Json(-1, '删除失败,参数错误');
        if (Goods::where('goods_category_id', $id)->first()) return Helper::Json(-1, '删除失败,该分类下还有商品');
        if (GoodsCategory::where('pid', $id)->first()) return Helper::Json(-1, '删除失败,该分类下还有子分类');
        GoodsCategory::destroy($id);
        return Helper::Json(1, '删除成功');

    }

    /**
     * status
     * 更改状态
     * @urlParam category required 分类ID Example: 1
     * @bodyParam status int required 状态[1:显示,2:隐藏]
     * @response {
     *  "code":1,
     *  "message": "状态更改成功",
     *  "data":[]
     * }
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     */
    public function status(Request $request, $id)
    {
        if (!$cate = GoodsCategory::find($id)) return Helper::Json(-1, '更改失败,参数错误');
        $status = $request->input('status');
        GoodsCategory::setStatus($status, $id);
        $cate->status = $status;
        $cate->save();
        return Helper::Json(1, '状态更改成功');
    }
}
