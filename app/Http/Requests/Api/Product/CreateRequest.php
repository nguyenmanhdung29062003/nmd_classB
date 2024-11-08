<?php

namespace App\Http\Requests\Api\Product;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //validate các trường
            'name'=>['required'],
            'price'=> ['required']
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'Bạn chưa nhập thông tin name',
            'price.required'=> 'Bạn chưa nhập giá'
        ];
    }
}
