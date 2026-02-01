<?php

namespace App\Http\Controllers\coloringroll;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
     public function index()
    {
        $products = Product::with([
            'images',
            'category',
            'variants'
        ])->get();

        return view('coloringRoll.pages.shop', compact('products'));
    }
     public function show(Product $product)
    {
        $product->load([
            'images',
            'category',
            'variants.values.attribute'
        ]);

        $relatedProducts = Product::with('images')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('coloringRoll.pages.shop-details', compact('product', 'relatedProducts'));
    }
}
