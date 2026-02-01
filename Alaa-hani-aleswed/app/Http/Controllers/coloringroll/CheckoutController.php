<?php

namespace App\Http\Controllers\coloringroll;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::with([
            'items.product.images',
            'items.variant.product.images',
            'items.variant.values.attribute'
        ])
            ->where('user_id', Auth::id())
            ->where('status', 'active')
            ->first();

        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart')
                ->with('error', 'Your cart is empty');
        }

        $subtotal = $cart->items->sum(fn($i) => $i->price * $i->quantity);
        $deliveryFee = 2;
        $total = $subtotal + $deliveryFee;

        return view('coloringRoll.pages.checkout', compact(
            'cart',
            'subtotal',
            'deliveryFee',
            'total'
        ));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'address' => 'required|string',
        ]);
        $cart = Cart::with('items')
            ->where('user_id', auth()->id())
            ->where('status', 'active')
            ->firstOrFail();

        DB::transaction(function () use ($cart, $request, &$order) {

            $subtotal = $cart->items->sum(fn($i) => $i->price * $i->quantity);
            $deliveryFee = 2;
            $total = $subtotal + $deliveryFee;

            $order = Order::create([
                'user_id' => auth()->id(),
                'total_price' => $total,
                'status' => 'pending',
            ]);

            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'product_variant_id' => $item->product_variant_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                ]);
            }

            OrderAddress::create([
                'order_id' => $order->id,
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'city' => $request->city,
                'address' => $request->address,
            ]);

            $cart->update(['status' => 'completed']);
        });

        return redirect()->route('paypal.pay', $order->id);

    }
}
