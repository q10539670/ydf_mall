<?php

namespace App\Http\Requests\Admin;

class CarouselRequest extends FormRequest
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
                    'name' => ['required', 'max:64'],
                    'type' => ['required', 'regex:/^[0,1]$/'],
                    'path' => ['required'],
                    'sort' => ['required', 'numeric'],
                    'is_show' => ['required', 'regex:/^[0,1]$/'],
                    'image_id' => ['required', 'exists:ydf_images,id'],
                    'start_at' => ['required', 'date'],
                    'end_at' => ['required', 'date','after:start_at'],
                    'is_delete' => ['required', 'regex:/^[0,1]$/']
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'carousel' => ['required', 'exists:ydf_lunbo,id']
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
            'carousel.required' => 'ID必须填写',
            'carousel.exists' => 'ID不存在',
            'name.required' => '轮播图名称不能为空',
            'name.max' => '轮播图名称最大长度为64个字符',
            'type.required' => '轮播图类型不能为空',
            'type.regex' => '轮播图类型参数错误',
            'path.required' => '跳转路径不能为空',
            'sort.required' => '排序不能为空',
            'sort.numeric' => '排序只能是数字',
            'is_show.required' => '展示标记不能为空',
            'is_show.regex' => '展示标记参数错误',
            'image_id.required' => '资源ID必须填写',
            'image_id.exists' => '资源ID不存在',
            'start_at.required' => '开始时间不能为空',
            'start_at.date' => '开始时间格式错误',
            'end_at.required' => '结束时间不能为空',
            'end_at.date' => '结束时间格式错误',
            'end_at.after' => '结束时间不能早于开始时间',
            'is_delete.required' => '状态不能为空',
            'is_delete.regex' => '状态参数错误',
        ];
    }
}
