<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProduct extends FormRequest
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
            'nameProdcuts' =>'required',
            'cate' =>'required',
            'brands' =>'required',
            'price' =>'required',
            'qty' =>'required',
            'saleOff' =>'required',
            'images' =>'required',
            'status' =>'required',
            'highlight' =>'required',
        ];
    }
    public function messages()
    {
        return [
            'nameProdcuts.required' =>':attribute không được để trống',
            'cate.required' =>':attribute không được để trống',
            'brands.required' =>':attribute không được để trống',
            'price.required' =>':attribute không được để trống',
            'qty.required' =>':attribute không được để trống',
            'saleOff.required' =>':attribute không được để trống',
            'images.required' =>':attribute không được để trống',
            'status.required' =>':attribute không được để trống',
            'highlight.required' =>':attribute không được để trống'
        ];
    }
}
