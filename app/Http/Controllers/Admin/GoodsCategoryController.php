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


class GoodsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * 获取加前缀的分类
     * 获取商品类型
     * @return JsonResponse
     */
    public function create()
    {
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        $types = GoodsType::orderBy('sort', 'asc')->get();
        return Helper::json(1, '获取分类列表成功', ['types' => $types, 'cates' => $cates]);
    }

    /**
     * 保存分类
     *
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
     * 查询分类
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
     * 编辑分类
     *
     * @param int $id
     * @return JsonResponse
     */
    public function edit(GCRequest $id)
    {
        $cate = GoodsCategory::find($id);
        $cateModel = new GoodsCategory();
        $cates = $cateModel->getCatesWithPrefix();
        $types = GoodsType::orderBy('sort', 'asc')->get();
        return Helper::Json(1, '分类查询成功', ['cate' => $cate, 'types' => $types, 'cates' => $cates]);
    }

    /**
     * 更新分类
     *
     * @param Request $request
     * @param int $id
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
     * 删除分类
     *
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
     * 更改状态
     *
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
        return Helper::Json(1, '状态更改成功', []);
    }
}
