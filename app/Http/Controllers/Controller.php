<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;



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

/**
 *@OA\Info(
 *     version="1.0.0",
 *     title="又东风小程序后台 Api 文档",
 *     description="又东风小程序后台 Api 文档",
 * )
 * @OA\Server(
 *      url="/admin-api/admin",
 *      description="普通接口地址"
 * )
 * @OA\Server(
 *      url="/admin-api",
 *      description="通用接口地址"
 * )
 * @OA\Parameter(
 *   parameter="current_page",
 *   name="current_page",
 *   description="当前页",
 *   @OA\Schema(
 *     type="integer",
 *     format="int64",
 *     default=1
 *   ),
 *   in="path",
 *   required=true
 * )
 * @OA\Parameter(
 *   parameter="per_page",
 *   name="per_page",
 *   description="每页显示数量",
 *   @OA\Schema(
 *     type="integer",
 *     format="int64",
 *     default=10
 *   ),
 *   in="path",
 *   required=true
 * )
 */
