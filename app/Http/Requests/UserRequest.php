<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|between:3,25|regex:/^[A-Z0-9a-z\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:png,jpg,gif,jpeg|dimensions:min_width:208,min_height:208',
        ];

    }


    public function messages()
    {
        return [
            'name.unique' => '用户名已被占用',
            'name.regex' => '用户名只支持数组，字母，下划线和横杠',
            'name.between' => '用户名必须介于3-25位之间',
            'name.required' => '用户名必填',
            'avatar.mimes' => '头像格式必须为png,jpg,gif,jpeg',
            'avatar.dimensions' => '头像尺寸最小为208*208',
        ];
    }
}
