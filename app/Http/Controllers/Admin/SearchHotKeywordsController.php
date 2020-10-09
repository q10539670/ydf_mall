<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CarouselRequest;
use App\Http\Requests\Admin\KeywordsRequest;
use App\Models\Keyword as SearchHotKeywords;
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
     * @OA\Get (
     *     path="/keyword",
     *     tags={"热搜"},
     *     summary="热搜列表",
     *     description="返回热搜列表",
     *     @OA\Parameter (ref="#/components/parameters/current_page"),
     *     @OA\Parameter (ref="#/components/parameters/per_page"),
     *     @OA\Parameter (
     *         name="keyword",
     *         description="关键词",
     *         in="query",
     *         @OA\Schema (type="string")
     *     ),
     *     @OA\Parameter (
     *         name="type",
     *         description="添加类型[1:系统添加 2:后台添加]",
     *         in = "query",
     *         @OA\Schema (type="integer")
     *     ),
     *     @OA\Parameter (
     *         name = "is_show",
     *         description="是否展示[0:不展示 1:展示]",
     *         in = "query",
     *         @OA\Schema (type="integer")
     *     ),
     *     @OA\Parameter (
     *         name = "is_hot",
     *         description = "是否热门[0:非热门 1:热门]",
     *         in = "query",
     *         @OA\Schema (type="integer")
     *     ),
     *     @OA\Parameter (
     *         name = "is_del",
     *         description = "是否删除[0:正常 1:删除]",
     *         in = "query",
     *         @OA\Schema (type="integer")
     *     ),
     *     @OA\Response(
     *         response = 200,
     *         description="成功",

     *     ),
     *     @OA\Response(
     *         response = 500,
     *         description="服务器错误"
     *     ),
     * )
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
    /**
     * @OA\Get(
     *     path="/keyword/{keyword}",
     *     tags={"热搜"},
     *     description="根据ID查询热搜词",
     *     summary="返回热搜词",
     *     @OA\Parameter (ref="#/components/parameters/keyword_in_path_required"),
     *     @OA\Response (
     *         response=200,
     *         description="成功"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误"
     *     )
     * )
     * @param  KeywordsRequest  $id
     * @return JsonResponse
     */
    public function show(KeywordsRequest $id)
    {
        $keyword = SearchHotKeywords::find($id);
        return Helper::Json(1,'查询成功',['keyword' =>$keyword]);
    }


    public function update(KeywordsRequest $request, $id)
    {
        $keyword = SearchHotKeywords::find($id);
        $request->type = 2; //标记后台添加
        $keyword->fill($request->all());
        $keyword->save();
        return Helper::Json(1,'更新成功',['carousel' =>$keyword]);

    }

    /**
     * @OA\Delete (
     *     path="/keyword/{keyword}",
     *     tags={"热搜"},
     *     description="根据ID删除热搜",
     *     summary="返回删除状态",
     *     @OA\Parameter (ref="#/components/parameters/keyword_in_path_required"),
     *     @OA\Response(
     *         response=200,
     *         description="成功"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="服务器错误"
     *     ),
     * )
     * @param $id
     * @return JsonResponse
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
