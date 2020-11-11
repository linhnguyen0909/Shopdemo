<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidationRule extends FormRequest
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
            'start'=>'required|date|after:tomorrow',
            'name'=>'required|alpha', //chỉ là chữ
            'address'=>'alpha_dash', //chữ số và kí tự nối
            'number'=>'alpha_num', //chỉ là số
            'name'=>'bail', //nếulỗi sẽ dừng
            'password'=>'required|comfirmed|min:6',//kiem tra 2 truong password_comfirmation
            'password' => 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&"*()\-_=+{};:,<.>]).{8,255}+$/'//bắt lỗi theo format
            

        ];
    }
}
