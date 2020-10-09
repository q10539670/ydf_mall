<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    /**
     * @OA\Get(
     *    path="/user",
     *    tags={"用户"},
     *    summary="获取用户列表",
     *    description="返回用户列表",
     *    @OA\Parameter(ref="#/components/parameters/current_page"),
     *    @OA\Parameter(ref="#/components/parameters/per_page"),
     *    @OA\Parameter(
     *         name="mobile",
     *         description="手机号码",
     *         required=false,
     *         in="query",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *    @OA\Parameter(
     *         name="sex",
     *         description="性别[1:男 2:女]",
     *         required=false,
     *         in="query",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *    @OA\Parameter(
     *         name="nickname",
     *         description="昵称",
     *         required=false,
     *         in="query",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *    @OA\Parameter(
     *         name="status",
     *         description="状态[1:正常, 2:禁用]",
     *         required=false,
     *         in="query",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *    @OA\Parameter(
     *         name="pid_mobile",
     *         description="推荐人手机号码",
     *         required=false,
     *         in="query",
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *    @OA\Response(
     *         response=200,
     *         description="用户查询成功",
     *         @OA\JsonContent(ref="#/components/responses/user")
     *      ),
     *    @OA\Response(
     *         response=404,
     *         description="页面未找到",
     *      )
     * )
     * @param  Request  $request
     * @return JsonResponse
     */
    public function index(Request $request)
    {
        $mobile = $request->input('mobile');
        $sex = $request->input('sex');
        $nickname = $request->input('nickname');
        $status = $request->input('status');
        $pidMobile = $request->input('pid_mobile');
        $currentPage = $request->input('current_page'); //当前页
        $perPage = $request->input('per_page');    //每页显示数量
        $query = User::when($mobile != '', function ($query) use ($mobile) {
            return $query->where('mobile', 'like', '%'.$mobile.'%');
        })
            ->when($sex == 1 || $sex == 2, function ($query) use ($sex) {
                return $query->where('sex', $sex);
            })
            ->when($nickname != '', function ($query) use ($nickname) {
                return $query->where('nickname', 'like','%'.$nickname.'%');
            })
            ->when($status == 1 || $status == 2, function ($query) use ($status) {
                return $query->where('status', $status);
            })
            ->when($pidMobile != '', function ($query) use ($pidMobile) {
                $ids = array_reduce(User::where('mobile', 'like', '%'.$pidMobile.'%')->get('id')->toArray(),
                    function ($result, $value) {
                        return array_merge($result, array_values($value));
                    }, array()); //把二维数组的值转成一位数组
                return $query->whereIn('pid', $ids);
            });
        $query->orderBy('created_at', 'desc');
        $users = self::paginator($query, $currentPage, $perPage);
        foreach ($users as $user) {
            if ($user->pid != 0) $user->pid = User::find($user->pid);
            if ($user->ppid != 0) $user->ppid = User::find($user->ppid);
        }
        return Helper::Json(1, '用户查询成功', ['users' => $users]);
    }

    /**
     * @OA\Patch (
     *     path="/user/status/{user}",
     *     tags={"用户"},
     *     summary="修改用户状态",
     *     description="修改用户状态",
     *     @OA\Parameter(
     *         name="user",
     *         description="用户ID",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\RequestBody(
     *          ref="#/components/requestBodies/user_in_body",
     *     ),
     *     @OA\Response(
     *          response="200",
     *          description="状态修改成功",
     *     )
     * )
     * @param  Request  $request
     * @param $id
     * @return JsonResponse
     */
    public function status(Request $request, $id)
    {
        if (!$user = User::find($id)) {
            return Helper::Json(-1, '状态修改失败,该用户不存在');
        }
        $validator = Validator::make($request->all(), [
            'status' => 'required|regex:/^[1,2]$/',
        ], [
            'status.required' => '状态参数不能为空',
            'status.regex' => '状态参数错误',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
        $user->status = $request->input('status');
        $user->save();
        return Helper::Json(1, '状态修改成功', ['user' => $user]);
    }
}
