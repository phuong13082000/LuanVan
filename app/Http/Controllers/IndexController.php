<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\Sanpham_Theloai;
use App\Models\TheLoai;
use Illuminate\Http\Request;

session_start();

class IndexController extends Controller
{
    public function index()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $list_all_sanpham = SanPham::paginate(4);
        $list_sanpham_moi = SanPham::orderBy('id', 'DESC')->take(4)->get();
        $list_sanpham_khuyenmai = SanPham::where('giakhuyenmai', '!=', '0')->orderBy('giakhuyenmai', 'ASC')->take(4)->get();

        $phukien_id = TheLoai::where('slug', 'phu-kien')->first();
        $sanpham_id = Sanpham_Theloai::where('theloai_id', $phukien_id->id)->get();
        $ntheLoai = [];
        foreach ($sanpham_id as $sanpham_theloai) {
            $ntheLoai[] = $sanpham_theloai->sanpham_id;
        }
        $list_phukien = SanPham::whereIn('id', $ntheLoai)->take(4)->get();

        return view('pages.index')->with(compact( 'list_danhmuc', 'list_theloai', 'list_sanpham_moi', 'list_sanpham_khuyenmai', 'list_phukien', 'list_all_sanpham'));
    }

    public function detail($slug)
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $ten_sanpham = SanPham::select('name')->where('slug', '=', $slug)->first();
        $chitiet_sanpham = SanPham::where('slug', '=', $slug)->get();

        return view('pages.detail')->with(compact('list_danhmuc', 'list_theloai', 'ten_sanpham', 'chitiet_sanpham'));
    }

    public function danhmuc($slug)
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $danhmuc_id = DanhMuc::where('slug', $slug)->first();
        $tendanhmuc = $danhmuc_id->name;

        //lay danhmuc.id so sánh với sanpham.danhmuc.id
        $chitiet_sanpham = SanPham::where('danhmuc_id', '=', $danhmuc_id->id)->orderBy('id', 'DESC')->get();

        return view('pages.danhmuc')->with(compact('list_danhmuc', 'list_theloai', 'chitiet_sanpham', 'tendanhmuc'));
    }

    public function theloai($slug)
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $theloai_id = TheLoai::where('slug', $slug)->first();   //lấy ra id từ slug
        $tentheloai = $theloai_id->name;    //lấy ra name từ $theloai_id

        $sanpham_theloai = Sanpham_Theloai::where('theloai_id', $theloai_id->id)->get(); //lấy theloai_id từ $theloai_id trong bảng Sanpham_Theloai
        $ntheLoai = [];
        foreach ($sanpham_theloai as $sp_tl) {
            $ntheLoai[] = $sp_tl->sanpham_id;
        }   //đưa thể loại lấy được từ $sanpham_theloai vào chuổi $ntheLoai

        $chitiet_sanpham = SanPham::whereIn('id', $ntheLoai)->orderBy('id', 'DESC')->get();    //so sánh và chọn sanpham.id trong chuỗi $ntheLoai

        return view('pages.theloai')->with(compact('list_danhmuc', 'list_theloai', 'chitiet_sanpham', 'tentheloai'));
    }

    public function timkiem(Request $request)
    {
        $data = $request->all();

        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        $tukhoa = $data['tukhoa'];
        $chitiet_sanpham = SanPham::with('danhMuc', 'ntheLoai')->where('name', 'LIKE', '%' . $tukhoa . '%')->get();

        return view('pages.timkiem')->with(compact('list_danhmuc', 'chitiet_sanpham', 'list_theloai', 'tukhoa'));
    }

    public function timkiem_ajax(Request $request)
    {
        $data = $request->all();

        if ($data['keywords']) {
            $sanpham = SanPham::where('kichhoat', 0)->where('name', 'LIKE', '%' . $data['keywords'] . '%')->get();

            $output = '<ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="display:block;"><h5 style="text-align: center">Sản phẩm gợi ý:</h5><hr>';

            foreach ($sanpham as $sp) {
                $output .= '<li>
                                <a class="dropdown-item" href="#">
                                    <img width="90" src="../uploads/sanpham/' . $sp->hinhanh . '" alt="' . $sp->name . '">
                                    <b class="li_search_ajax">' . $sp->name . '</b>
                                </a>
                            </li>';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function profile($id)
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('pages.profile')->with(compact('list_danhmuc', 'list_theloai'));
    }
}
