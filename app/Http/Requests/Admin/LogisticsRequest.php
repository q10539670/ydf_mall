<?php

namespace App\Http\Requests\Admin;


class LogisticsRequest extends FormRequest
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
                    'logi_name' => [ 'required', 'max:30'],
                    'logi_code' => ['required', 'max:50'],
                    'sort' => ['required', 'numeric'],
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'logi' => ['required', 'exists:ydf_logistics,id']
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
            'logi.required' => 'ID不能为空',
            'logi.exists' => 'ID错误,该物流公司不存在',
            'logi_code.required' => '物流公司名称不能为空',
            'logi_code.max' => '物流公司最大长度为30个字符',
            'logi_name.required' => '物流公司编码不能为空',
            'logi_name.max' => '物流公司编码最大长度为50个字符',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
        ];
    }
}
