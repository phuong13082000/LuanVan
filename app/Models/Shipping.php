<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_name',
        'shipping_diachi',
        'shipping_phone',
        'shipping_email',
        'shipping_notes',
        'shipping_phuongthuc',
    ];
}
