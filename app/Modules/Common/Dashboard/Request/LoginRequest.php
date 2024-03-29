<?php

namespace App\Modules\Common\Dashboard\Request;

use Illuminate\Foundation\Http\FormRequest;
class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password'=>'required|min:6|max:15',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Tài khoản không được để trống',
            'email.email'=> 'Email không đúng định dạng',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu không được ít hơn 6 ký tự',
            'password.max'=>'Mật khẩu không được vượt quá 15 ký tự',
        ];
    }
}
