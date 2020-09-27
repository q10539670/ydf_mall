<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     description="配送方式模板",
 *     type="object",
 *     title="配送方式模板"
 * )
 * Class Ship
 * @package App\Models
 */
class Ship extends Model
{
    protected $table = 'ydf_ship';

    protected $guarded = [];

    public $timestamps = false;

    public $id;
    /**
     * @OA\Property (format="string",example="配送方式1")
     * @var
     */
    public $name;

    /**
     * 计算方式[1:按重量 2:按件数]
     * @OA\Property (format="integer",example=1)
     * @var
     */
    public $type;

    /**
     * 是否货到付款[1:不是 2:是]
     * @OA\Property (format="integer",example=1)
     * @var
     */
    public $has_cod;

    /**
     * 首重(单位:克)
     * @OA\Property (format="integer",example=500)
     * @var
     */
    public $firstunit;

    /**
     * 续重(单位:克)
     * @OA\Property (format="integer",example=500)
     * @var
     */
    public $continueunit;

    /**
     * 按地区设置配送费用是否启用默认配送费用[1:启用 2:不启用]
     * @OA\Property (format="integer",example=1)
     * @var
     */
    public $def_area_fee;

    /**
     * 地区类型[1:全部地区 2:指定地区]
     * @OA\Property (format="integer",example=1)
     * @var
     */
    public $area_type;

    /**
     * 首重费用
     * @OA\Property (format="float",example=10.00)
     * @var
     */
    public $firstunit_price;

    /**
     * 续重费用
     * @OA\Property (format="float",example=10.00)
     * @var
     */
    public $continueunit_price;

    /**
     * 物流公司名称
     * @OA\Property (format="string",example="顺丰速运")
     * @var
     */
    public $logi_name;

    /**
     * 物流公司编码
     * @OA\Property (format="string",example="顺丰速运")
     * @var
     */
    public $logi_code;

    /**
     * 是否默认[1:默认 2:不默认]
     * @OA\Property (format="integer",example=2)
     * @var
     */
    public $is_def;

    /**
     * 排序
     * @OA\Property (format="integer",example=100)
     * @var
     */
    public $sort;

    /**
     * 状态[1:正常 2:禁用]
     * @OA\Property (format="integer",example=1)
     * @var
     */
    public $status;

    /**
     * 是否包邮[1:包邮 2:不包邮]
     * @OA\Property (format="integer",example=2)
     * @var
     */
    public $free_postage;

    /**
     * 满多少免运费
     * @OA\Property (format="float",example=200.00)
     * @var
     */
    public $goodsmoney;

    /**
     * 地区配送费用
     * @OA\Property(format="string",example={{"area_id":{10005,2005,25576}},{"firstunit":"500"},{"continueunit":"500"},{"firstunit_price":"12"},{"continueunit_price":"8"}})
     */
    public $area_fee;

}

/**
 * @OA\Parameter (
 *     parameter="ship_in_path_required",
 *     name="ship",
 *     in="path",
 *     required=true,
 *     description="配送方式ID",
 *     @OA\Schema (
 *         type="integer",
 *         format="int64"
 *     )
 * )
 * @OA\Response(
 *     response="ship",
 *     description="配送方式信息",
 *     @OA\JsonContent(ref="#/components/schemas/Ship")
 * )
 * @OA\RequestBody(
 *     request="ship_in_body",
 *     description="配送方式表单数据",
 *     required=true,
 *     @OA\JsonContent (ref="#/components/schemas/Ship")
 * )
 */