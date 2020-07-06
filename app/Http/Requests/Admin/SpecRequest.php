<?php

namespace App\Http\Requests\Admin;


class SpecRequest extends FormRequest
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
                    'sort' => ['required', 'numeric'],
                    'values' => ['required','array']
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'spec' => ['required', 'exists:ydf_spec,id']
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
            'spec.required' => 'ID不能为空',
            'spec.exists' => 'ID错误,该属性不存在',
            'name.required' => '属性名称不能为空',
            'name.max' => '属性名称最大长度为64个字符',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'values.required' =>'属性值不能为空',
            'values.array' =>'属性值格式错误(数组)',
        ];
    }
}
