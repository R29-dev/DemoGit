<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'price'=>'required',
            'company'=>'required',
            // 'hinhanh' => 'image|mimes:jpeg,png,jpg,gif|max:1024',

        ];
      
    }
    public function messages(){
        return[
           'required'=> 'vui lòng nhập',
        //    'hinhanh.image' => 'Tệp tin phải là hình ảnh',
        //    'hinhanh.mimes' => 'Tệp tin phải có định dạng jpeg, png, jpg, hoặc gif',
        //    'hinhanh.max' => 'Kích thước tệp tin không được vượt quá 1MB',
           
        ];
   }
}
