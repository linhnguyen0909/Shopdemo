<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactRequest extends FormRequest
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
            'first_name'=>'required|max:10|unique:contacts,first_name,'.$this->contact,
            'last_name'=>'required|max:10',
            'email'=>'required|regex:/^.+@gmail.+$/|',
            'phone'=>'required|between:9,11'
        ];
    }
}
