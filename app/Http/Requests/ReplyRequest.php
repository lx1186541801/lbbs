<?php

namespace App\Http\Requests;


class ReplyRequest extends Request
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
            'content' => 'required|min:2',
        ];
    }



    public function messages()
    {
        return [
            'content.min'   =>  '内容最少为2个字符',
        ];
    }
}
