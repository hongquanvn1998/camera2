<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use User;
class CheckRegister extends FormRequest
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
            'username'=>'required',
            'email'=>'required|unique:users,email|email',
            'pass' =>'required|min:3|max|30',
            'confirmPass'=>'required|same:pass',
        ];
    }

    public function message()
    {
        return [
                'username.required' => 'Email không được để trống',
                'username.min' => 'Email không được để trống',
                'email.required' => 'Email không được để trống',
                'email.email' => 'Không đúng định dạng email',
                'email.unique' => 'Email đã tồn tại',
                'pass.required' => 'Mật khẩu không được để trống',
                'pass.min' => 'Mật khẩu ít nhất chứa 3 kí tự',
                'pass.min' => 'Mật khẩu không vượt quá 30 kí tự',
                'confirmPass.required' => 'Mật khẩu không được để trống',
                'confirmPass.same' => 'Mật khẩu không khớp',
        ];
    }
}
