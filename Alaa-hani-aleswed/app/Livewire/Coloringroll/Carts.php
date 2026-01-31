<?php

namespace App\Livewire\Coloringroll;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ProductVariant;
use Livewire\Attributes\On;
use Livewire\Component;

class Carts extends Component
{
    public $cart;
    public $deliveryFee = 2;

    public function mount()
    {
        $this->cart = Cart::with(['items.product.images', 'items.variant.product.images', 'items.variant.values.attribute'])
            ->where('user_id', auth()->id())
            ->where('status', 'active')
            ->first();
    }

    public function increment($itemId)
    {
        $item = $this->cart->items()->find($itemId);
        $item->increment('quantity');
        $this->cart = $this->cart->fresh([
            'items.product.images',
            'items.variant.product.images',
            'items.variant.values.attribute'
        ]);
        $this->dispatch('cart-updated');
    }

    public function decrement($itemId)
    {
        $item = $this->cart->items()->find($itemId);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }

        $this->cart = $this->cart->fresh([
            'items.product.images',
            'items.variant.product.images',
            'items.variant.values.attribute'
        ]);
        $this->dispatch('cart-updated');
    }

    public function remove($itemId)
    {
        $this->cart->items()->where('id', $itemId)->delete();
        $this->cart = $this->cart->fresh([
            'items.product.images',
            'items.variant.product.images',
            'items.variant.values.attribute'
        ]);
        $this->dispatch('cart-updated');
    }

    public function getSubtotalProperty()
    {
        return $this->cart
            ? $this->cart->items->sum(fn($i) => $i->price * $i->quantity)
            : 0;
    }
    public function getTotalProperty()
{
    return $this->subtotal + $this->deliveryFee;
}
  
    public function render()
    {
        return view('livewire.coloringroll.carts');
    }
}
