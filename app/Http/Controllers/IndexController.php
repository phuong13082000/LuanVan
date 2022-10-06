<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;

class IndexController extends Controller
{
    public function index()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $list_sanpham_moi = SanPham::with('danhMuc', 'theLoai')
            ->orderBy('id', 'DESC')
            ->take(4)
            ->get();

        $list_sanpham_khuyenmai = SanPham::with('danhMuc', 'theLoai')
            ->where('giakhuyenmai', '!=', '0')
            ->orderBy('giakhuyenmai', 'ASC')
            ->take(4)
            ->get();

        return view('pages.index')->with(compact('list_danhmuc', 'list_theloai', 'list_sanpham_moi', 'list_sanpham_khuyenmai'));
    }

    public function detail($slug)
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $ten_sanpham = SanPham::select('name')->where('slug', '=', $slug)->first();
        $chitiet_sanpham = SanPham::with('danhMuc', 'theLoai')
            ->where('slug', '=', $slug)
            ->get();

        return view('pages.detail')->with(compact('list_danhmuc', 'list_theloai', 'ten_sanpham', 'chitiet_sanpham'));
    }

    public function danhmuc($slug)
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $danhmuc_id = DanhMuc::where('slug', $slug)->first();
        $tendanhmuc = $danhmuc_id->name;
        //lay danhmuc.id so sánh với sanpham.danhmuc.id
        $chitiet_sanpham = SanPham::with('danhMuc', 'theLoai')
            ->where('danhmuc_id', '=', $danhmuc_id->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('pages.danhmuc')->with(compact('list_danhmuc', 'list_theloai', 'chitiet_sanpham', 'tendanhmuc'));
    }

    public function theloai($slug)
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $theloai_id = TheLoai::where('slug', $slug)->first();
        $tentheloai = $theloai_id->name;

        $chitiet_sanpham = SanPham::with('danhMuc', 'theLoai')
            ->where('theloai_id', '=', $theloai_id->id)
            ->orderBy('id', 'DESC')
            ->get();

        return view('pages.theloai')->with(compact('list_danhmuc', 'list_theloai', 'chitiet_sanpham', 'tentheloai'));
    }
}
