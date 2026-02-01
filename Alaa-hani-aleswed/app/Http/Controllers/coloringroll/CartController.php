<?php

namespace App\Http\Controllers\coloringroll;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
{
    $cart = Cart::firstOrCreate([
        'user_id' => auth()->id(),
        'status' => 'active',
    ]);

    if ($request->filled('variant_id')) {

        $variant = ProductVariant::findOrFail($request->variant_id);

        $item = CartItem::where('cart_id', $cart->id)
            ->where('product_variant_id', $variant->id)
            ->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_variant_id' => $variant->id,
                'quantity' => $request->quantity,
                'price' => $variant->price,
            ]);
        }

    }
    elseif ($request->filled('product_id')) {

        $product = Product::findOrFail($request->product_id);

        $item = CartItem::where('cart_id', $cart->id)
            ->whereNull('product_variant_id')
            ->where('product_id', $product->id)
            ->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            CartItem::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'quantity' => $request->quantity,
                'price' => $product->base_price,
            ]);
        }
    }

    return redirect()->route('cart')->with('cart_updated', true);;
}


}
