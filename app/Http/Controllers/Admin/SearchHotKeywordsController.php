<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarouselRequest;
use App\Http\Requests\Admin\KeywordsRequest;
use App\Models\SearchHotKeywords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group SearchHotKeywords
 * 热搜接口
 * @package App\Http\Controllers\Admin
 */
class SearchHotKeywordsController extends Controller
{
    /**
     * index
     * 热搜列表
     *
     * @queryParam keywords 关键词 No-example
     * @queryParam type 添加类型[1:系统添加 2:后台添加] No-example
     * @queryParam is_show 是否展示[0:不展示 1:展示] No-example
     * @queryParam is_hot 是否热门[0:非热门 1:热门] No-example
     * @queryParam is_del 是否删除[0:正常 1:删除] Example: 0
     * @queryParam current_page required 当前页 Example: 1
     * @queryParam per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $keywords = $request->input('keywords');
        $type = $request->input('type');
        $isShow = $request->input('is_show');
        $isHot = $request->input('is_hot');
        $isDel = $request->input('is_del', '0');
        $perPage = $request->input('per_page') != '' ? $request->input('per_page') : 10;
        $currentPage = $request->input('current_page') != '' ? $request->input('current_page') : 1;
        $query = SearchHotKeywords::when($keywords != '', function ($query) use ($keywords) {
            return $query->where('keywords', 'like', '%'.$keywords.'%');
        })
            ->when($type === 1 || $type === 2, function ($query) use ($type) {
                return $query->where('type', $type);
            })
            ->when($isShow === 0 || $isShow === 1, function ($query) use ($isShow) {
                return $query->where('is_show', $isShow);
            })
            ->when($isHot === 0 || $isHot === 1, function ($query) use ($isHot) {
                return $query->where('is_hot', $isHot);
            })
            ->when($isDel === 0 || $isDel === 1, function ($query) use ($isDel) {
                return $query->where('is_del', $isDel);
            });
        $query->orderBy('sort', 'asc');
        $keywords = self::paginator($query, $currentPage, $perPage);
        return Helper::Json(1, '查询成功', ['keywords' => $keywords]);
    }

    /**
     * store
     * 保存
     *
     * @bodyParam keywords string required 关键词 Example:夏季
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam is_show int required 展示标记[0:不展示 1:展示] Example:1
     * @bodyParam is_hot int required 热门标记[0:非热门 1:热门] Example:1
     * @bodyParam is_delete required 删除标记[0:正常 1:删除] Example:0
     * @param  KeywordsRequest  $request
     * @return JsonResponse
     * @response {
     * }
     */
    public function store(KeywordsRequest $request)
    {
        $request->type = 2; //标记后台添加
        $keywords = SearchHotKeywords::create($request->all());
        return Helper::Json(1,'创建成功',['keywords' =>$keywords]);
    }

    /**
     * show
     * 查询(单一)
     * @urlParam keyword required 关键词ID Example:1
     * @param  KeywordsRequest  $id
     * @return JsonResponse
     */
    public function show(KeywordsRequest $id)
    {
        $keyword = SearchHotKeywords::find($id);
        return Helper::Json(1,'查询成功',['keyword' =>$keyword]);
    }

    /**
     * update
     * 更新
     * @urlParam keyword required 关键词ID Example:1
     * @bodyParam keywords string required 关键词 Example:夏季
     * @bodyParam sort int required 排序 Example:100
     * @bodyParam is_show int required 展示标记[0:不展示 1:展示] Example:1
     * @bodyParam is_hot int required 热门标记[0:非热门 1:热门] Example:1
     * @bodyParam is_delete required 删除标记[0:正常 1:删除] Example:0
     * @param  KeywordsRequest  $request
     * @param  int  $id
     * @return JsonResponse
     * @response {
     * }
     */
    public function update(KeywordsRequest $request, $id)
    {
        $keyword = SearchHotKeywords::find($id);
        $request->type = 2; //标记后台添加
        $keyword->fill($request->all());
        $keyword->save();
        return Helper::Json(1,'更新成功',['carousel' =>$keyword]);

    }

    /**
     * delete
     * 删除
     * @urlParam keyword required 关键词ID Example:1
     * @param  int  $id
     * @return JsonResponse
     * @response {
    "code": 1,
    "message": "删除成功",
    "data": []
     * }
     */
    public function destroy($id)
    {
        if (!$keyword = SearchHotKeywords::find($id)) {
            return Helper::Json(-1,'删除失败,ID参数错误');
        }
        $keyword->is_del = 1;
        $keyword->save();
        return Helper::Json(-1,'删除成功');
    }
}
