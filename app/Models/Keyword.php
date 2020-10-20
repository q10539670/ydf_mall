<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     description="热搜模板",
 *     type="object",
 *     title="热搜模板"
 * )
 * Class SearchHotKeywords
 * @package App\Models
 */
class Keyword extends Model
{
    protected $table = 'ydf_search_hot_keywords';

    protected $guarded = [];

    public $id;

    public $type;

    /**
     * 是否展示在热门搜索[0:不展示,1:展示]
     * @OA\Property (format="integer",example=1)
     * @var
     */
    public $is_show;

    /**
     * 是否热门搜索[0:非热门,1:热门]
     * @OA\Property (format="integer",example=1)
     * @var
     */
    public $is_hot;

    /**
     * 排序 越小越靠前
     * @OA\Property (format="integer",example=100)
     * @var
     */
    public $sort;

    /**
     * 热搜词
     * @OA\Property (format="string",example="男装")
     * @var
     */
    public $keywords;
}

/**
 * @OA\Parameter (
 *     parameter="keyword_in_path_required",
 *     name="keyword",
 *     in="path",
 *     required=true,
 *     description="热搜ID",
 *     @OA\Schema (type="integer",format="int64")
 * )

 */