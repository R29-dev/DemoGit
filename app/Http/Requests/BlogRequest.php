<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Title' => 'required',
            'Image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'Description' => 'required'
        ];
    }
    
    public function messages()
    {
        return [
            'required' => 'Vui lòng nhập.',
            'image' => 'Vui lòng chọn một hình ảnh.',
            'mimes' => 'Định dạng hình ảnh không hợp lệ. Chỉ chấp nhận các định dạng jpeg, png, jpg, gif.',
            'max' => 'Hình ảnh vượt quá kích thước cho phép (tối đa 2048 KB).'
        ];
    }
}    
