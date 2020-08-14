<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\SaleItem;
use App\Models\SalerInfo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group SalerInfo
 * 用户分销账户表
 * @package App\Http\Controllers\Admin
 */
class SalerInfoController extends Controller
{
    /**
     * index
     * 用户分销账户列表
     * @queryParam mobile 手机号 No-example
     * @queryParam nickname 昵称 No-example
     * @queryParam current_page required 当前页 Example: 1
     * @queryParam per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $mobile = $request->input('mobile');
        $nickname = $request->input('nickname');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = SaleItem::when($mobile != '', function ($query) use ($mobile) {
            return $query->where('mobile', 'like', '%'.$mobile.'%');
        })
            ->when($nickname != '', function ($query) use ($nickname) {
                return $query->whereHas('user', function ($query) use ($nickname) {
                    $query->where('nickname', 'like', '%'.$nickname.'%');
                });
            });
        $query->orderBy('created_at', 'desc');
        $salerInfos = self::paginator($query, $currentPage, $perPage);
        foreach ($salerInfos as $salerInfo) {
            $salerInfo->user;
        }
        return Helper::Json(1, '查询成功', ['salerInfos' => $salerInfos]);
    }

    public function show($id)
    {
        if (!$salerInfo = SalerInfo::find($id)) {
            return Helper::Json(-1, '该分销账户不存在');
        }
        return Helper::Json(1, '查询成功', ['salerInfo' => $salerInfo]);
    }
}
