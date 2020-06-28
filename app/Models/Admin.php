<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\RoleAdmin;
use App\Models\RolePermission;
use App\Models\Permission;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'ydf_admin';

    protected $guarded = [];

//    protected static $userPermissions = null;
//
//    protected static $appPermissions = null;

//    /*
//     * 验证是否有权限
//     * */
//    public function hasPermission($permissionName)
//    {
//        if (is_null(self::$userPermissions)) {
//            $roleIdArr = RoleAdmin::where('admin_id', $this->id)->get()->pluck('role_id')->toArray();
//            if (empty($roleIdArr)) {
//                self::$userPermissions = [];
//                return false;
//            }
//            $permissionIdArr = RolePermission::select('permission_id')->whereIn('role_id', $roleIdArr)->get()->pluck('permission_id')->toArray();
//            if (empty($permissionIdArr)) {
//                self::$userPermissions = [];
//                return false;
//            }
//            self::$userPermissions = Permission::whereIn('id', array_unique($permissionIdArr))->get()->pluck('name')->toArray();
//        }
//        return in_array($permissionName, self::$userPermissions);
//    }
//
//    public function isSuperAdministrator()
//    {
//        if ($this->status >= 1000) {
//            return true;
//        }
//        return false;
//    }
//
//    public function role()
//    {
//        return $this->belongsToMany('App\Models\Admin\Role','nbk_role_admin');
//    }
}
