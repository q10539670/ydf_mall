<?php

namespace App\Http\Requests\Admin;


class CouponRequest extends FormRequest
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
                    'type' => ['required', 'regex:/^[0-3]$/'],
                    'use_key' => ['required', 'regex:/^[0-2]$/'],
                    'use_value' => ['required','array'],
                    'amount' => ['required', 'regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/'],
                    'per_limit' => ['required','numeric'],
                    'min_point' => ['required','regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/'],
                    'start_time' => ['required','date'],
                    'end_time' => ['required','date','after:start_time'],
                    'enable_time' => ['required','date','before:end_time'],
                    'status' =>['required', 'regex:/^[1,2]$/']
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'coupon' => ['required', 'exists:ydf_coupon,id']
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
            'coupon.required' => 'ID必须填写',
            'coupon.exists' => 'ID不存在',
            'name.required' => '优惠券名称不能为空',
            'name.max' => '优惠券名称最大长度为64个字符',
            'type.required' => '优惠券类型不能为空',
            'type.regex' => '优惠券类型参数错误',
            'use_key.required' => '使用场景不能为空',
            'use_key.regex' => '使用场景参数错误',
            'use_value.required' => '使用场景内容不能为空',
            'use_value.array' => '使用场景内容参数错误[数组格式]',
            'amount.required' => '金额不能为空',
            'amount.regex' => '金额参数错误',
            'per_limit.required' => '限领数量不能为空',
            'per_limit.numeric' => '限领数量参数错误',
            'min_point.required' => '使用门槛不能为空',
            'min_point.regex' => '使用门槛参数错误',
            'start_time.required' => '开始时间不能为空',
            'start_time.date' => '开始时间格式错误',
            'end_time.required' => '结束时间不能为空',
            'end_time.date' => '结束时间格式错误',
            'end_time.after' => '结束时间不能早于开始时间',
            'enable_time.required' => '可领取结束时间不能为空',
            'enable_time.date' => '可领取结束时间格式错误',
            'enable_time.before' => '可领取结束时间不能晚于结束时间',
            'status.required' => '状态不能为空',
            'status.regex' => '状态参数错误'
        ];
    }
}
