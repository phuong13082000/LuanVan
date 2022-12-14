<?php

namespace App\Http\Controllers;

use App\Http\Requests\DanhMucRequest;
use App\Models\DanhMuc;
use App\Models\SanPham;
use Flasher\Prime\FlasherInterface;


class DanhMucController extends Controller
{
    public function index()
    {
        $list_danhmuc = DanhMuc::orderBy('id', 'DESC')->get();

        return view('admin.danhmuc.index', compact('list_danhmuc'));
    }

    public function create()
    {
        return view('admin.danhmuc.form');
    }

    public function store(DanhMucRequest $request, FlasherInterface $flasher)
    {
        $data = $request->all();

        $danhmuc = new DanhMuc();
        $danhmuc->name = $data['name'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->kichhoat = $data['kichhoat'];
        $danhmuc->save();

        $flasher->addSuccess('Thêm danh mục ' . $danhmuc->name . ' thành công!');
        return redirect()->route('danhmuc.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $danhmuc = DanhMuc::find($id);

        return view('admin.danhmuc.form', compact('danhmuc'));
    }

    public function update(DanhMucRequest $request, $id, FlasherInterface $flasher)
    {
        $data = $request->all();

        $danhmuc = DanhMuc::find($id);
        $danhmuc->name = $data['name'];
        $danhmuc->slug = $data['slug'];
        $danhmuc->kichhoat = $data['kichhoat'];
        $danhmuc->save();

        $flasher->addSuccess('Cập nhật danh mục ' . $danhmuc->name . ' thành công!');
        return redirect()->route('danhmuc.index');
    }

    public function destroy($id, FlasherInterface $flasher)
    {
        $danh_muc = DanhMuc::find($id);
        $check_danhmuc = SanPham::with('danhMuc')->where('danhmuc_id', '=', $id)->first();

        if ($check_danhmuc) {
            $flasher->addError('Danh mục có sản phẩm!');
        } else {
            $flasher->addSuccess('Xóa danh mục thành công!');
            $danh_muc->delete();
        }
        return redirect()->route('danhmuc.index');
    }
}
