<?php

namespace App\Livewire\Coloringroll;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryImage;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AddGalleryImage extends Component
{
    use WithFileUploads;

    public $image;
    public $caption = '';
    public $order_id;
    public $product_id;
    public $selected;



    public function submit()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $path = $this->image->store('gallery', 'public');

        GalleryImage::create([
            'user_id' => Auth::id(),
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'image_path' => $path,
            'caption' => $this->caption,
            'status' => 'pending',
        ]);

        $this->reset(['image', 'caption', 'order_id', 'product_id']);

        session()->flash('success', 'Image submitted for review 👍');
        $this->dispatch('closeGalleryModal');
    }
    public function updatedSelected($value)
    {
        if (!$value)
            return;

        [$this->order_id, $this->product_id] = explode('|', $value);
    }


    public function render()
    {
        $orders = Order::where('user_id', Auth::id())
            ->where('status', 'paid')
            ->with('items.variant.product')
            ->get();

        return view('livewire.coloringroll.add-gallery-image', compact('orders'));
    }
}
