<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function view_order()
    {
        $list_order = Order::with('shipping')->orderBy('created_at','DESC')->get();

        return view('admin.order.index')->with(compact('list_order'));
    }
}
