<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
   
    public function authorize(): bool
    { 
        return true;
    }


    public function rules(): array
    {
        return [
            'full_name' => 'required',
            'email' => 'required|email|unique:user',
            'password' => 'required|min:5|max:12',
        ];
    }

    public function messages()
    {
        return[
            'full_name.required' => 'وارد کردن نام الزامی میباشد',
           'email.required' => 'وارد کردن ایمیل الزامی میباشد',
           'email.email' => 'ایمیل درست نمی باشد',
           'email.unique' => 'ایمیل تکراری باشد',
           'password.required' => 'وارد کردن رمز عبور الزامی میباشد',
           'password.min' => 'رمز عبور کمتر از 6 حرف میباشد',
           'password.max' => 'رمز عبور بیشتر از 12 حرف است',
        ];
    }
}
