<?php

namespace App\Http\Requests\Admin;


class GoodsTypeRequest extends FormRequest
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
                    'type' =>['sometimes','required','exists:ydf_goods_type,id'],
                    'name' => ['required', 'max:64'],
                    'sort' => ['required', 'numeric'],
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'type' => ['required', 'exists:ydf_goods_type,id']
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
            'type.required' => 'ID不能为空',
            'type.exists' => 'ID错误,该分类不存在',
            'name.required' => '分类名称不能为空',
            'name.max' => '分类名称最大长度为64个字符',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
        ];
    }
}
