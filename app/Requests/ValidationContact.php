<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationContact extends FormRequest
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
            'first_name'=>'required|max:10|unique:contacts',
            'last_name'=>'required|max:10',
            'email'=>'required|regex:/^.+@gmail.+$/|unique:contacts',
        ];
    }
    public function messages()
    {
        return [
            'email.required'     => 'Chưa nhập email',
            'email.email'        => 'Email không đúng',
            'email.unique'       => 'Email không được trùng',
            'email.regex'     => 'Email phải là @gmail..... ',
        ];
    }
}
