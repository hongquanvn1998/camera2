<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckLogin extends FormRequest
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
            'username' => 'required|min:3|max:20',
            'pass' => 'required|min:3|max:20',
        ];
    }
    public function messages()
    {
        return [
            'username.required'=>':attribute không được để trống',
            'username.min'=>':attribute không được nhỏ hơn 3 kí tự',
            'username.max'=>':attribute không được lớn hơn 20 kí tự',
            'pass.required'=>':attribute không được để trống',
            'pass.min'=>':attribute không được nhỏ hơn 3 kí tự',
            'pass.max'=>':attribute không được lớn hơn 20 kí tự',
        ];
    }
}
