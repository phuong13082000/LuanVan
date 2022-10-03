<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\TheLoai;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('welcome')->with(compact('list_danhmuc','list_theloai'));
    }
}
