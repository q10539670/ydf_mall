<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group User
 * 用户接口
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    /**
     * index
     * 用户列表
     * @queryParam phone 手机号 No-example
     * @queryParam sex 性别[1:男, 2:女] No-example
     * @queryParam nickname 昵称 No-example
     * @queryParam status 状态[1:正常, 2:禁用] No-example
     * @queryParam pid_phone 推荐人手机号 No-example
     * @queryParam  current_page required 当前页 Example: 1
     * @queryParam  per_page required 每页显示数量 Example: 10
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $phone = $request->input('phone');
        $sex = $request->input('sex');
        $nickname = $request->input('nickname');
        $status = $request->input('status');
        $pidPhone = $request->input('pid_phone');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = User::when($phone != '', function ($query) use ($phone) {
            return $query->where('phone', 'like', '%'.$phone.'%');
        })
            ->when($sex == 1 || $sex == 2, function ($query) use ($sex) {
                return $query->where('sex', $sex);
            })
            ->when($nickname != '', function ($query) use ($nickname) {
                return $query->where('nickname', $nickname);
            })
            ->when($status == 1 || $status == 2, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($pidPhone != '', function ($query) use ($pidPhone) {
                $ids = array_reduce(User::where('phone', 'like', '%'.$pidPhone.'%')->get('id')->toArray(),
                    function ($result, $value) {
                        return array_merge($result, array_values($value));
                    }, array()); //把二维数组的值转成一位数组
                return $query->whereIn('id', $ids);
            });
        $query->orderBy('created_at', 'desc');
        $users = self::paginator($query, $currentPage, $perPage);
        foreach ($users as $user) {
            if ($user->pid != 0) $user->pid = User::find($user->pid);
            if ($user->ppid != 0) $user->ppid = User::find($user->ppid);
        }
        return Helper::Json(1, '用户查询成功', ['brand' => $users]);
    }

    /**
     * status
     * 更改用户状态
     * @urlParam user required 用户ID Example:1
     * @bodyParam status required 状态[1:正常, 2:禁用] Example: 2
     * @param  Request  $request
     * @param $id
     * @return JsonResponse
     */
    public function status(Request $request, $id)
    {
        if (!$user = User::find($id)) {
            return Helper::Json(-1, '状态修改失败,该用户不存在');
        }
        $user->status = $request->input('status');
        $user->save();
        Helper::Json(1, '状态修改成功', ['user' => $user]);
    }
}
