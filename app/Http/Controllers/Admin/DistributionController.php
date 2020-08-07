<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Distribution;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

/**
 * @group Distribution
 * 分销账户表
 * @package App\Http\Controllers\Admin
 */
class DistributionController extends Controller
{
    /**
     * index
     * 分销列表
     * @queryParam phone 手机号 No-example
     * @queryParam sex 性别[1:男, 2:女] No-example
     * @queryParam nickname 昵称 No-example
     * @queryParam  current_page required 当前页 Example: 1
     * @queryParam  per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $mobile = $request->input('mobile');
        $sex = $request->input('sex');
        $nickname = $request->input('nickname');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = Distribution::when($mobile != '', function ($query) use ($mobile) {
            return $query->whereHas('user', function ($query) use ($mobile) {
                $query->where('mobile', 'like', '%'.$mobile.'%');
            });
        })
            ->when($sex == 1 || $sex == 2, function ($query) use ($sex) {
                return $query->whereHas('user', function ($query) use ($sex) {
                    $query->where('sex', $sex);
                });
            })
            ->when($nickname != '', function ($query) use ($nickname) {
                return $query->whereHas('user', function ($query) use ($nickname) {
                    $query->where('nickname', 'like', '%'.$nickname.'%');
                });
            });
        $query->orderBy('created_at', 'desc');
        $distributions = self::paginator($query, $currentPage, $perPage);
        foreach ($distributions as $distribution) {
            $distribution->user;
        }
        return Helper::Json(1, '分销账户查询成功', ['distributions' => $distributions]);
    }
}
