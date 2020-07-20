<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ShipRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array
     */
    public function authorize()
    {
        switch ($this->method()) {
            // CREATE
            case 'PATCH':
            case 'POST':
                return [
                    'name' => ['required', 'max:50'],
                    'type' => ['required', 'regex:/^[1,2]$/'],
                    'has_cod' => ['required', 'regex:/^[1,2]$/'],
                    'firstunit' => ['required', 'numeric'],
                    'continueunit' => ['required', 'numeric'],
                    'def_area_fee' => ['required', 'regex:/^[1,2]$/'],
                    'area_type' => ['required', 'regex:/^[1,2]$/'],
                    'firstunit_price' => ['required', 'regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/'],
                    'continueunit_price' => ['required', 'regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/'],
                    'logi_name' => ['required', 'max:50'],
                    'logi_code' => ['required', 'max:50'],
                    'is_def' => ['required', 'regex:/^[1,2]$/'],
                    'sort' => ['required', 'numeric'],
                    'status' => ['required', 'regex:/^[1,2]$/'],
                    'free_postage' => ['required', 'regex:/^[1,2]$/'],
                    'goodsmoney' => ['required', 'regex:/(^[1-9]([0-9]+)?(\.[0-9]{1,2})?$)|(^(0){1}$)|(^[0-9]\.[0-9]([0-9])?$)/']
                ];
                break;
            case 'GET':
            case 'DELETE':
                return [
                    //
                    'ship' => ['required', 'exists:ydf_ship,id']
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
            'ship.required' => 'ID必须填写',
            'ship.exists' => 'ID不存在',
            'type.required' => '配送方式类型不能为空',
            'type.regex' => '配送方式类型参数错误',
            'name.required' => '配送方式名称不能为空',
            'name.max' => '配送方式名称过长',
            'has_cod.required' => '货到付款标志不能为空',
            'has_cod.regex' => '货到付款标志参数错误',
            'firstunit.required' => '首重不能为空',
            'firstunit.numeric' => '首重参数错误',
            'continueunit.required' => '续重不能为空',
            'continueunit.numeric' => '续重参数错误',
            'def_area_fee.required' => '默认配送费标志不能为空',
            'def_area_fee.regex' => '默认配送费标志参数错误',
            'area_type.required' => '地区类型不能为空',
            'area_type.regex' => '地区类型参数错误',
            'firstunit_price.required' => '首重费用不能为空',
            'firstunit_price.regex' => '首重费用参数错误',
            'continueunit_price.required' => '续重费用不能为空',
            'continueunit_price.regex' => '续重费用参数错误',
            'logi_name.required' => '物流公司不能为空',
            'logi_name.max' => '物流公司名称太长(50个字符以内)',
            'logi_code.required' => '物流公司编码不能为空',
            'logi_code.max' => '物流公司编码名称太长(50个字符以内)',
            'is_def.required' => '默认标志不能为空',
            'is_def.regex' => '默认标志参数错误',
            'sort.numeric' => '排序参数错误',
            'sort.required' => '排序不能为空',
            'status.required' => '状态不能为空',
            'status.regex' => '状态参数错误',
            'free_postage.required' => '包邮标志不能为空',
            'free_postage.regex' => '包邮标志参数错误',
            'goodsmoney.required' => '满免运费不能为空',
            'goodsmoney.regex' => '满免运费参数错误'
        ];
    }
}
