<?php

namespace App\Http\Requests\Admin;


class GoodCategoryRequest extends FormRequest
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
                'pid' =>['required','numeric'],
                'name' => ['required', 'max:32'],
                'goods_type_id' => ['exists:ydf_goods_type,id'],
                'sort' => ['required','numeric'],
                'images_id' => ['exists:ydf_goods_type,id'],
                'status' => ['required','regex:/^[1,2]$/']
            ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'category' => ['required', 'exists:ydf_goods_category,id']
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
            'category.required' => 'ID不能为空',
            'category.exists' => 'ID错误,该分类不存在',
            'pid.required' => 'PID不能为空',
            'pid.numeric' => 'PID只能是数字',
            'name.required' => '分类名称不能为空',
            'name.max' => '分类名称最大长度为64个字符',
            'goods_type_id.exists' => '商品类型不存在',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'images_id.exists' => '图片不存在',
            'status.required' => '状态不能为空',
            'status.regex' => '状态参数错误',
        ];
    }
}
