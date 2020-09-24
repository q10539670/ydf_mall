<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     description="用户模型",
 *     type="object",
 *     title="用户模型"
 * )
 */
class User extends Model
{
    protected $table = 'ydf_user';

    protected $guarded = [];


    /**
     * @OA\Property (ref="#/components/schemas/user_status")
     */
    public $status;

    /**
     * @OA\Response(
     *   response="user",
     *   description="返回用户信息",
     *   @OA\JsonContent(ref="#/components/schemas/User")
     * )
     *
     * * @OA\RequestBody(
     *   request="user_in_body",
     *   required=true,
     *   description="用户表单数据",
     *   @OA\JsonContent(ref="#/components/schemas/User")
     * )
     * @OA\Schema (
     *     schema="user_status",
     *     type="integer",
     *     description="用户状态[1:正常,2:黑名单]",
     *     enum={1, 2},
     *     default=1,
     * )
     */


}
