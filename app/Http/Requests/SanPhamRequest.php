<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if (request()->isMethod('post')) {
            return [
                'name' => 'required|unique:sanphams|max:200',
                'slug' => 'required|max:200',
                'hinhanh' => 'required',
                'gia' => 'required',
                'giakhuyenmai' => 'required',
                'soluong' => 'required',
                'noidung' => 'required',
                'danhmuc_id' => 'required',
                'theloai_id' => 'required',
                'kichhoat' => 'required',
            ];
        } else {
            return [
                'name' => 'required|max:200',
                'gia' => 'required',
                'soluong' => 'required',
                'noidung' => 'required',
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
