<?php

namespace App\Livewire\Coloringroll;

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartBadge extends Component
{
    public $count = 0;

    protected $listeners = ['cart-updated' => 'refreshCart'];

    public function mount()
    {
        $this->refreshCart();
    }

    public function refreshCart()
    {
        if (!Auth::check()) {
            $this->count = 0;
            return;
        }

        $cart = Cart::where('user_id', Auth::id())
            ->where('status', 'active')
            ->with('items')
            ->first();

        $this->count = $cart
            ? $cart->items->sum('quantity')
            : 0;
    }

    public function render()
    {
        return view('livewire.coloringroll.cart-badge');
    }
}
