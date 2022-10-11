<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'customer_id',
        'shipping_id',
        'status',
        'code_order',
        'huybo',
    ];

    public function shipping()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id');
    }
}
