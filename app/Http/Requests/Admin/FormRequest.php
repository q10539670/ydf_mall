<?php

namespace App\Http\Requests\Admin;

use App\Helpers\Helper;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

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
    protected function failedValidation(Validator $validator)
    {
        $error = $validator->errors()->all();
        throw new HttpResponseException(
            Helper::Json(-1, $error[0])
        );
    }

    public function all($keys = null)
    {

        switch ($this->method()) {
            case 'PATCH':
            case 'POST':
                $input = array_replace_recursive($this->input(), $this->allFiles());
                if (!$keys) {
                    return $input;
                }
                $results = [];
                foreach (is_array($keys) ? $keys : func_get_args() as $key) {
                    Arr::set($results, $key, Arr::get($input, $key));
                }
                break;
            case 'GET':
            case 'DELETE':
                $results['brand'] = $this->route('brand');
                break;
            default:
                return [];
                break;
        }

        return $results;
    }
}
