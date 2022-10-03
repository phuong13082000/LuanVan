<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
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
        $list_danhmuc = DanhMuc::get();
        $count_danhmuc = count($list_danhmuc);

        $list_theloai = TheLoai::get();
        $count_theloai = count($list_theloai);

        return view('home')->with(compact('count_danhmuc','count_theloai'));
    }
}
