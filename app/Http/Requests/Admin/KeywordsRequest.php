<?php

namespace App\Http\Requests\Admin;

class KeywordsRequest extends FormRequest
{


    /**
     *
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
                    'keywords' => ['required', 'max:32'],
                    'is_show' => ['required','regex:/^[0,1]$/'],
                    'is_hot' => ['required', 'regex:/^[0,1]$/'],
                    'sort' => ['required', 'numeric'],
                    'is_del' => ['required', 'regex:/^[0,1]$/']
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'keyword' => ['required', 'exists:ydf_search_hot_keywords,id']
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
            'keyword.required' => 'ID必须填写',
            'keyword.exists' => 'ID不存在',
            'keywords.required' => '关键词不能为空',
            'keywords.max' => '关键词最大长度为32个字符',
            'is_show.required' => '展示标记不能为空',
            'is_show.regex' => '展示标记参数错误',
            'is_hot.required' => '热门标记不能为空',
            'is_hot.regex' => '热门标记参数错误',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'is_del.required' => '状态不能为空',
            'is_del.regex' => '状态参数错误',
        ];
    }
}
