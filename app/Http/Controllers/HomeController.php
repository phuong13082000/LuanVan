<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $count_danhmuc = DanhMuc::count();
        $count_theloai = TheLoai::count();
        $count_sanpham = SanPham::count();

        return view('home')->with(compact('count_danhmuc', 'count_theloai', 'count_sanpham'));
    }

}
