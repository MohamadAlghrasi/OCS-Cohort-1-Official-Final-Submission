<?php

namespace App\Http\Controllers\coloringroll;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::with(['product', 'user'])
            ->where('status', 'approved')
            ->latest()
            ->get();

        return view('coloringRoll.pages.gallery', compact('images'));
    }
}
