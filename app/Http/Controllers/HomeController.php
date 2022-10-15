<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

        $soluong_chitiet_sanpham = SanPham::where('soluong', '!=', '0')->get();

        return view('home')->with(compact('count_danhmuc', 'count_theloai', 'count_sanpham', 'soluong_chitiet_sanpham'));
    }

}
