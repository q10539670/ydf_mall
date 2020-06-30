<?php

namespace App\Models;

use App\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class GoodsType extends Model
{
    protected $table = 'ydf_goods_type';

    protected $guarded = [];

    /**
     * 验证器
     * @param $data
     * @return JsonResponse
     */
    public static function validator($data)
    {
        $validator = Validator::make($data, [
            'name' => ['required', 'max:32'],
            'sort' => ['required','numeric'],
        ], [
            'name.required' => '分类名称不能为空',
            'name.max' => '分类名称最大长度为64个字符',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
        ]);
        if ($validator->fails()) {
            return Helper::Json(-1, $validator->errors()->first());
        }
    }
}
