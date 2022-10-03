<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $list_danhmuc = DanhMuc::get();
        $count_danhmuc = count($list_danhmuc);

        $list_theloai = TheLoai::get();
        $count_theloai = count($list_theloai);

        $list_sanpham = SanPham::get();
        $count_sanpham = count($list_sanpham);

        return view('home')->with(compact('count_danhmuc','count_theloai', 'count_sanpham'));
    }
}
