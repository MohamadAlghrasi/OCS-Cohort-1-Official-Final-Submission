<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::with(['user', 'product', 'order'])
            ->latest()
            ->paginate(12);

        return view('admin.adminPages.gallery', compact('images'));
    }

    public function approve(GalleryImage $image)
    {
        $image->update(['status' => 'approved']);
        return back()->with('success', 'Image approved');
    }

    public function reject(GalleryImage $image)
    {
        $image->update(['status' => 'rejected']);
        return back()->with('success', 'Image rejected');
    }
}
