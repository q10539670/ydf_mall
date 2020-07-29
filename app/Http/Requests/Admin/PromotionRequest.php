<?php

namespace App\Http\Requests\Admin;


class PromotionRequest extends FormRequest
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
                    'exclusive' => ['required', 'regex:/^[1,2]$/'],
                    'condition_code' => ['required', 'regex:/(GOODS_ALL|GOODS_IDS|ORDER_FULL)/'],
                    'condition_params' => ['required','array'],
                    'result_code' => ['required', 'regex:/(GOODS_DISCOUNT|ORDER_REDUCE)/'],
                    'result_params' => ['required'],
                    'description' => ['required'],
                    'sort' => ['required','numeric'],
                    'start_time' => ['required','date'],
                    'end_time' => ['required','date','after:start_time'],
                    'is_del' => ['required','regex:/^[0,1]$/'],
                    'status' =>['required', 'regex:/^[1,2]$/'],
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'promotion' => ['required', 'exists:ydf_promotion,id']
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
            'promotion.required' => 'ID必须填写',
            'promotion.exists' => 'ID不存在',
            'exclusive.required' => '促销排他标志不能为空',
            'exclusive.regex' => '促销排他标志参数错误',
            'condition_code.required' => '促销条件编码不能为空',
            'condition_code.regex' => '促销条件编码参数错误',
            'condition_params.required' => '促销参数不能为空',
            'condition_params.array' => '促销参数参数错误(数组)',
            'result_code.required' => '促销结果编码不能为空',
            'result_code.regex' => '促销结果编码参数错误[数组格式]',
            'result_params.required' => '促销结果参数不能为空',
            'description.required' => '促销描述不能为空',
            'sort.required' => '排序不能为空',
            'start_time.required' => '开始时间不能为空',
            'start_time.date' => '开始时间格式错误',
            'end_time.required' => '结束时间不能为空',
            'end_time.date' => '结束时间格式错误',
            'end_time.after' => '结束时间不能早于开始时间',
            'is_del.required' => '是否删除不能为空',
            'is_del.regex' => '是否删除格式错误',
            'status.required' => '状态不能为空',
            'status.regex' => '状态参数错误'
        ];
    }
}
