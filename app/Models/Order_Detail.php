<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Detail extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'order_code',
        'sanpham_id',
        'sanpham_name',
        'sanpham_gia',
        'sanpham_soluong',
    ];
    protected $primaryKey = 'id';
    protected $table = 'order_details';

    public function sanPham(){
        return $this->belongsTo(SanPham::class,'sanpham_id');
    }

}
