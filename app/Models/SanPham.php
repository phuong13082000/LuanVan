<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'name',
        'slug',
        'hinhanh',
        'gia',
        'giakhuyenmai',
        'soluong',
        'kichhoat',
        'noidung',
        //'color',
        //'noidungkhuyenmai',
        'cauhinh',
        'danhmuc_id',
        'theloai_id',
    ];
    protected $primaryKey = 'id';
    protected $table = 'sanphams';

    //nsanpham - 1danhmuc
    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id');
    }

    //nsanpham - 1theloai
    public function theLoai()
    {
        return $this->belongsTo(TheLoai::class, 'theloai_id');
    }
}

//hasone 11
//hasmany 1n
//belongsTo n1
