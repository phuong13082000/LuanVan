<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequest;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;

class SanPhamController extends Controller
{
    public function index()
    {
        $list_sanpham = SanPham::with('danhMuc', 'theLoai')->orderBy('id', 'DESC')->get();

        return view('admin.sanpham.index', compact('list_sanpham'));
    }

    public function create()
    {
        $danhmuc = DanhMuc::pluck('name', 'id');
        $theloai = TheLoai::pluck('name', 'id');

        return view('admin.sanpham.form')->with(compact('danhmuc','theloai'));
    }

    public function store(SanPhamRequest $request, FlasherInterface $flasher)
    {
        $data = $request->all();

        $sanpham = new SanPham();
        $sanpham->name = $data['name'];
        $sanpham->slug = $data['slug'];
        $sanpham->gia = $data['gia'];
        $sanpham->giakhuyenmai = $data['giakhuyenmai'];
        $sanpham->soluong = $data['soluong'];
        $sanpham->noidung = $data['noidung'];
        $sanpham->danhmuc_id = $data['danhmuc_id'];
        $sanpham->theloai_id = $data['theloai_id'];
        $sanpham->kichhoat = $data['kichhoat'];
        $sanpham->cauhinh = $data['cauhinh'];

        $get_image = $request->file('hinhanh');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/sanpham/', $new_image);
            $sanpham->hinhanh = $new_image;
        }

        $sanpham->save();

        $flasher->addSuccess('Thêm sản phẩm ' . $sanpham->name . ' thành công!');
        return redirect()->route('sanpham.index');
    }

    public function show($id)
    {
        $danhmuc = DanhMuc::pluck('name', 'id');
        $theloai = TheLoai::pluck('name', 'id');
        $sanpham = SanPham::with('danhMuc', 'theLoai')->find($id);

        return view('admin.sanpham.show')->with(compact('sanpham', 'danhmuc', 'theloai'));
    }

    public function edit($id)
    {
        $danhmuc = DanhMuc::pluck('name', 'id');
        $theloai = TheLoai::pluck('name', 'id');

        $sanpham = SanPham::with('danhMuc', 'theLoai')->find($id);

        return view('admin.sanpham.form')->with(compact('sanpham', 'danhmuc', 'theloai'));
    }

    public function update(SanPhamRequest $request, $id, FlasherInterface $flasher)
    {
        $data = $request->all();

        $sanpham = SanPham::find($id);

        $sanpham->name = $data['name'];
        $sanpham->slug = $data['slug'];
        $sanpham->gia = $data['gia'];
        $sanpham->giakhuyenmai = $data['giakhuyenmai'];
        $sanpham->soluong = $data['soluong'];
        $sanpham->noidung = $data['noidung'];
        $sanpham->danhmuc_id = $data['danhmuc_id'];
        $sanpham->theloai_id = $data['theloai_id'];
        $sanpham->kichhoat = $data['kichhoat'];
        $sanpham->cauhinh = $data['cauhinh'];

        $get_image = $request->file('hinhanh');

        if ($get_image) {
            if (file_exists('uploads/sanpham/' . $sanpham->hinhanh)) {
                unlink('uploads/sanpham/' . $sanpham->hinhanh);
            } else {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.', $get_name_image));
                $new_image = $name_image . rand(0, 9999) . '.' . $get_image->getClientOriginalExtension();
                $get_image->move('uploads/sanpham/', $new_image);
                $sanpham->hinhanh = $new_image;
            }
        }

        $sanpham->save();

        $flasher->addSuccess('Cập nhật sản phẩm ' . $sanpham->name . ' thành công!');
        return redirect()->route('sanpham.index');
    }

    public function destroy($id, FlasherInterface $flasher)
    {
        $sanpham = SanPham::find($id);

        if (file_exists('uploads/sanpham/' . $sanpham->image)) {
            unlink('uploads/sanpham/' . $sanpham->image);
        }
        $sanpham->delete();

        $flasher->addSuccess('Xóa sản phẩm thành công!');
        return redirect()->route('sanpham.index');
    }
}
