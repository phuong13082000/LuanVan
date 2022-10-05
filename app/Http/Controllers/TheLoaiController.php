<?php

namespace App\Http\Controllers;

use App\Http\Requests\TheLoaiRequest;
use App\Models\SanPham;
use App\Models\TheLoai;
use Flasher\Prime\FlasherInterface;

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
        $check_theloai = SanPham::with('theLoai')->where('theloai_id', '=', $id)->first();

        if ($check_theloai) {
            $flasher->addError('Thể loại có sản phẩm!');
        } else {
            $flasher->addSuccess('Xóa thể loại thành công!');
            $the_loai->delete();
        }
        return redirect()->route('theloai.index');
    }
}
