<?php

namespace App\Http\Controllers;

use App\Http\Requests\TheLoaiRequest;
use App\Models\SanPham;
use App\Models\Sanpham_Theloai;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;

session_start();

class TheLoaiController extends Controller
{
    public function index()
    {
        $list_theloai = TheLoai::orderBy('id', 'DESC')->get();

        return view('admin.theloai.index', compact('list_theloai'));
    }

    public function create()
    {
        return view('admin.theloai.form');
    }

    public function store(TheLoaiRequest $request, FlasherInterface $flasher)
    {
        $data = $request->all();
        $theloai = new TheLoai();
        $theloai->name = $data['name'];
        $theloai->slug = $data['slug'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();

        $flasher->addSuccess('Thêm thể loại ' . $theloai->name . ' thành công!');
        return redirect()->route('theloai.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $theloai = TheLoai::find($id);
        return view('admin.theloai.form', compact('theloai'));
    }

    public function update(TheLoaiRequest $request, $id, FlasherInterface $flasher)
    {
        $data = $request->all();
        $theloai = TheLoai::find($id);
        $theloai->name = $data['name'];
        $theloai->slug = $data['slug'];
        $theloai->kichhoat = $data['kichhoat'];
        $theloai->save();

        $flasher->addSuccess('Cập nhật thể loại ' . $theloai->name . ' thành công!');
        return redirect()->route('theloai.index');
    }

    public function destroy($id, FlasherInterface $flasher)
    {
        $the_loai = TheLoai::find($id);

        $id_sanpham_theloai = Sanpham_Theloai::where('theloai_id', $id)->get(); //lấy theloai_id từ $id trong bảng Sanpham_Theloai
        $ntheLoai = [];
        foreach ($id_sanpham_theloai as $sp_tl) {
            $ntheLoai[] = $sp_tl->sanpham_id;
        }   //đưa thể loại lấy được từ $sanpham_theloai vào chuổi $ntheLoai

        $check_theloai = SanPham::whereIn('id', $ntheLoai)->first();

        if ($check_theloai) {
            $flasher->addError('Thể loại có sản phẩm!');
        } else {
            $flasher->addSuccess('Xóa thể loại thành công!');
            $the_loai->delete();
        }
        return redirect()->route('theloai.index');
    }
}
