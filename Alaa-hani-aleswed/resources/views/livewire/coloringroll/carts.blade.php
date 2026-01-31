 <div class="row">
     <div class="col-12">
         <form action="cart.html#">
             <div class="table-content table-responsive wow tpfadeUp" data-wow-duration=".9s" data-wow-delay=".3s"
                 style="visibility: visible; animation-duration: 0.9s; animation-delay: 0.3s; animation-name: tpfadeUp;">
                 <table class="table">
                     <thead>
                         <tr>
                             <th class="product-thumbnail">Images</th>
                             <th class="cart-product-name">Product</th>
                             <th class="product-variant">Variant</th>
                             <th class="product-price">Unit Price</th>
                             <th class="product-quantity">Quantity</th>
                             <th class="product-subtotal">Total</th>
                             <th class="product-remove">Remove</th>
                         </tr>
                     </thead>
                     <tbody>
                         @if ($cart && $cart->items->count())
                             @foreach ($cart->items as $item)
                                 @php
                                     if ($item->product) {
                                         $product = $item->product;
                                     } elseif ($item->variant && $item->variant->product) {
                                         $product = $item->variant->product;
                                     } else {
                                         $product = null;
                                     }
                                     if ($product && $product->images->isNotEmpty()) {
                                         $mainImage =
                                             $product->images->firstWhere('is_main', true) ?? $product->images->first();
                                     } else {
                                         $mainImage = null;
                                     }
                                 @endphp
                                 <tr>
                                     <td class="product-thumbnail">
                                         <a href="{{ route('shop.details', $product->slug) }}">
                                             @if ($mainImage)
                                                 <img src="{{ asset('storage/' . $mainImage->image_path) }}"
                                                     width="70" alt="{{ $product->name }}">
                                             @else
                                                 <img src="{{ asset('coloringRoll/img/shop/thumb-placeholder.jpg') }}"
                                                     width="70" alt="No image">
                                             @endif
                                         </a>
                                     </td>

                                     <td class="product-name">
                                         <a href="{{ route('shop.details', $product->slug) }}">
                                             {{ $product?->name }}
                                         </a>
                                     </td>
                                     <td class="product-variant">
                                         @if ($item->variant && $item->variant->values->count())
                                             @php
                                                 $variantText = $item->variant->values
                                                     ->map(fn($v) => $v->value . $v->attribute->unit)
                                                     ->join(' × ');
                                             @endphp

                                             {{ $variantText }}
                                         @else
                                             —
                                         @endif
                                     </td>

                                     <td class="product-price">
                                         {{ $item->price }} JD
                                     </td>

                                     <td class="product-quantity">
                                         <div class="cart-qty-wrapper">
                                             <button type="button" wire:click="decrement({{ $item->id }})"
                                                 wire:loading.attr="disabled" class="cart-qty-btn minus">
                                                 -
                                             </button>
                                             <input class="cart-qty-input" type="text" value="{{ $item->quantity }}"
                                                 readonly>
                                             <button type="button" wire:click="increment({{ $item->id }})"
                                                 wire:loading.attr="disabled" class="cart-qty-btn plus">
                                                 +
                                             </button>
                                         </div>
                                     </td>

                                     <td class="product-subtotal">
                                         {{ $item->price * $item->quantity }} JD
                                     </td>

                                     <td class="product-remove">
                                         <a wire:click="remove({{ $item->id }})">
                                             <i class="fa fa-times"></i>
                                         </a>
                                     </td>
                                 </tr>
                             @endforeach
                         @else
                             <tr>
                                 <td colspan="6" class="text-center">Your cart is empty</td>
                             </tr>
                         @endif
                     </tbody>

                 </table>
             </div>
             <div class="row justify-content-end">
                 <div class="col-md-5 ">
                     <div class="cart-page-total">
                         <h2>Cart totals</h2>
                         <ul class="mb-20">
                             <li>Subtotal <span>{{ $this->subtotal }} JD</span></li>
                             <li>Delivery fees <span>{{ $this->deliveryFee }} JD</span></li>
                             <li style="color:red; font-weight: bold;">Total <span>{{ $this->total }} JD</span>
                             </li>
                         </ul>
                         <a class="it-btn circle-effect" href="{{ route('checkout') }}"><span>Proceed to checkout</span></a>
                     </div>
                 </div>
             </div>
         </form>
     </div>
 </div>
