<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TheLoaiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'name' => 'required|unique:theloais|max:100',
                'slug' => 'required|max:100',
                'kichhoat' => 'required',
            ];
        } else {
            return [
                'name' => 'required|unique:theloais|max:100',
            ];
        }
    }

    public function messages()
    {
        if (request()->isMethod('post')) {
            return [
                'name.required'=>'Vui lòng nhập tên!',
                'unique.name'=>'Đã có tên, vui lòng đổi tên khác!',
                'slug.required'=>'Vui lòng nhập slug!',
            ];
        } else {
            return [
                'name.required'=>'Vui lòng nhập tên!',
            ];
        }
    }
}
