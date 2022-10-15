<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPhamRequest;
use App\Models\DanhMuc;
use App\Models\SanPham;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;
use Illuminate\Http\Request;


class SanPhamController extends Controller
{
    public function index()
    {
        $list_sanpham = SanPham::with('danhMuc', 'ntheLoai')->get();

        return view('admin.sanpham.index', compact('list_sanpham'));
    }

    public function create()
    {
        $danhmuc = DanhMuc::pluck('name', 'id');
        $theloai = TheLoai::pluck('name', 'id');

        $list_theloai = TheLoai::all();

        return view('admin.sanpham.form')->with(compact('danhmuc', 'theloai', 'list_theloai'));
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

        $sanpham->ntheLoai()->attach($data['theloai']);

        $flasher->addSuccess('Thêm sản phẩm ' . $sanpham->name . ' thành công!');
        return redirect()->route('sanpham.index');
    }

    public function show($id)
    {
        $danhmuc = DanhMuc::pluck('name', 'id');
        $theloai = TheLoai::pluck('name', 'id');

        $sanpham = SanPham::with('danhMuc', 'ntheLoai')->find($id);

        return view('admin.sanpham.show')->with(compact('sanpham', 'danhmuc', 'theloai'));
    }

    public function edit($id)
    {
        $danhmuc = DanhMuc::pluck('name', 'id');
        $theloai = TheLoai::pluck('name', 'id');

        $list_theloai = TheLoai::all();

        $sanpham = SanPham::find($id);
        $sanpham_theloai = $sanpham->ntheLoai;

        $sanpham = SanPham::with('danhMuc', 'ntheLoai')->find($id);

        return view('admin.sanpham.form')->with(compact('sanpham', 'danhmuc', 'theloai', 'list_theloai', 'sanpham_theloai'));
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

        $sanpham->ntheLoai()->sync($data['theloai']);

        $flasher->addSuccess('Cập nhật sản phẩm ' . $sanpham->name . ' thành công!');
        return redirect()->route('sanpham.index');
    }

    public function destroy($id, FlasherInterface $flasher)
    {
        $sanpham = SanPham::find($id);

        if (file_exists('uploads/sanpham/' . $sanpham->hinhanh)) {
            unlink('uploads/sanpham/' . $sanpham->hinhanh);
        }
        $sanpham->delete();

        $sanpham->ntheLoai()->where('sanpham_id', $id)->detach();

        $flasher->addSuccess('Xóa sản phẩm thành công!');
        return redirect()->route('sanpham.index');
    }

    public function update_soluong(Request $request)
    {
        $data = $request->all();
        $id = $data['id_sanpham'];

        $sanpham = SanPham::find($id);
        $sanpham->soluong = $data['soluong'];
        $sanpham->save();

        return redirect()->route('sanpham.index');
    }

    public function update_giakhuyenmai(Request $request)
    {
        $data = $request->all();
        $id = $data['id_sanpham'];

        $sanpham = SanPham::find($id);
        $sanpham->giakhuyenmai = $data['giakhuyenmai'];
        $sanpham->save();

        return redirect()->route('sanpham.index');
    }
}
