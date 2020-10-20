<?php

namespace App\Http\Requests\Admin;


class GoodsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'PATCH':
            case 'POST':
                return [
                    'name' => ['required', 'max:64'],
                    'price' => ['sometimes', 'required', 'regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/'],
                    'costprice' => ['sometimes', 'required', 'regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/'],
                    'mktprice' => ['sometimes', 'required', 'regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/'],
                    'image_id' => ['required', 'exists:ydf_images,id'],
                    'pics' => ['sometimes','required','array'],
                    'goods_category_id' => ['required', 'exists:ydf_goods_category,id'],
                    'goods_type_id' => ['required', 'exists:ydf_goods_type,id'],
                    'brand_id' =>['sometimes','required', 'exists:ydf_brand,id'],
                    'sort' => ['required', 'numeric']
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    'good' => ['required', 'exists:ydf_goods,id']
                ];
                break;
            default:
                return [];
                break;
        }
    }

    public function messages()
    {
        return [
            'good.required' => 'ID不能为空',
            'good.exists' => 'ID错误,该商品不存在',
            'name.required' => '商品名称不能为空',
            'name.max' => '商品名称最大长度为64个字符',
            'price.regex' =>'商品价格格式错误',
            'costprice.regex' =>'商品成本价格格式错误',
            'mktprice.regex' =>'商品市场价格格式错误',
            'image_id.required' => '商品主图片不能为空',
            'pics.array' =>'商品图片格式错误(数组)',
            'brand_id.exists' =>'所选品牌不存在',
            'goods_category_id.required' => '商品分类不能为空',
            'goods_category_id.exists' => '该商品分类不存在',
            'goods_type_id.required' => '商品类型不能为空',
            'goods_type_id.exists' => '该商品类型不存在',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
//            'products.required' => '商品规格不能为空',
        ];
    }

}
