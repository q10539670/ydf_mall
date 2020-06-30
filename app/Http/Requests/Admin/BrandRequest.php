<?php

namespace App\Http\Requests\Admin;

use App\Helpers\Helper;

class BrandRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method())
        {
            // CREATE
            case 'PATCH':
            case 'POST':
                return [
                    'name' => ['required', 'max:64'],
                    'logo' => ['required','exists:ydf_images,id'],
                    'sort' => ['required','numeric'],
                    'is_del' => ['required','regex:/^[0,1]$/']
                ];
                break;

            // UPDATE
            case 'PUT':
                break;

            case 'GET':
                return [
                    //
                    'id' => ['required','exists:ydf_brand,id']
                ];
                break;

            case 'DELETE':
                break;

            default:
                return [];
                break;
        }

    }

    public function messages()
    {
        return [
            'id.required' => 'ID必须填写',
            'id.exists' => 'ID不存在',
            'name.required' => '品牌名称不能为空',
            'name.max' => '品牌名称最大长度为64个字符',
            'logo.required' => 'logo不能为空',
            'logo.exists' => 'logo不存在',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'is_del.required' => '状态不能为空',
            'is_del.regex' => '状态参数错误',
        ];
    }
}
