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
    ];
    protected $primaryKey = 'id';
    protected $table = 'sanphams';

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'danhmuc_id');
    }

    public function ntheLoai()
    {
        return $this->belongsToMany(TheLoai::class,'sanpham_theloai','sanpham_id','theloai_id');
    }
}

