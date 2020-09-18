<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

/**
 *@OA\Info(
 *     version="1.0.0",
 *     title="又东风小程序后台 Api 文档",
 *     description="又东风小程序后台 Api 文档"
 * )
 * @OA\Link (
 *     link="http://ydf_mall.test",
 *     server="http://"
 * )
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * 分页处理
     * @param $query
     * @param $currentPage
     * @param $perPage
     * @return Paginator
     */
    public static function paginator($query, $currentPage, $perPage)
    {
        //获取查询总数
        $total = $query->count();
        //当前页
        $currentPage = $currentPage ?? 1;
        //每页数量
        $perPage = $perPage ?? 10;
        $items = $query->offset($perPage * ($currentPage - 1))->limit($perPage)->get();
        return new Paginator($items, $total, $perPage, $currentPage);

    }
}
