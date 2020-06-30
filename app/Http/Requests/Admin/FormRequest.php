<?php

namespace App\Http\Requests\Admin;

use App\Helpers\Helper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class FormRequest extends BaseFormRequest
{
    /**
     * 确定用户是否有权限发出此请求
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 自定义返回错误格式
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator) {
        $error= $validator->errors()->all();
        throw new HttpResponseException(
            Helper::Json(-1,$error[0])
        );
    }
}
