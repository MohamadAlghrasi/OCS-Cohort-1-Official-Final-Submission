<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with([
            'user',
            'address',
            'items.product',
            'items.variant.values.attribute'
        ])->latest()->get();

        return view('admin.adminPages.orders', compact('orders'));
    }
}
