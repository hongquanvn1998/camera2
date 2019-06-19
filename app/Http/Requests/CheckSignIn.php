<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckSignIn extends FormRequest
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
            'email' =>'required|unique:users|email',
            'name'  =>'required',
            'pass'  =>'required',
        ];
    }

    public function message()
    {
        return [
            'email.required' =>':attribute không được để trống',
            'email.unique'   =>':attribute đã tồn tại',
            'email.email'    =>':attribute yêu cầu nhập đúng email',
            'name.required'  =>':attribute không được để trống',
            'pass.required'  =>':attribute không được để trống',

];
    }
}
