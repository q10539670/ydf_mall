<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     description="属性模型",
 *     type="object",
 *     title="属性模型"
 * )
 * Class Spec
 * @package App\Models
 */
class Spec extends Model
{
    protected $table = 'ydf_spec';

    protected $guarded = [];

    public function value()
    {
        return $this->hasMany('App\Models\SpecValue');
    }

    public $id;

    /**
     * @OA\Property(format="string",example="内存")
     * @var string
     */
    public $name;

    /**
     * @var integer
     * @OA\Property (format="integer",example=100)
     */
    public $sort;

    /**
     * @var string
     * @OA\Property (format="string",nullable=true)
     */
    public $details;

    /**
     * @var
     * @OA\Property(format="string",example={34,35})
     */
    public $values;
}

/**
 * @OA\Parameter(
 *     parameter="spec_in_path_required",
 *     name="spec",
 *     description="属性ID",
 *     @OA\Schema(
 *       type="integer",
 *       format="int64",
 *     ),
 *     in="path",
 *     required=true
 * )
 * @OA\Response(
 *     response="spec",
 *     description="属性信息",
 *     @OA\JsonContent(ref="#/components/schemas/Spec")
 * )
 * @OA\RequestBody(
 *     request="spec_in_body",
 *     required=true,
 *     description="属性表单数据",
 *     @OA\JsonContent(ref="#/components/schemas/Spec")
 * )
 *
 */