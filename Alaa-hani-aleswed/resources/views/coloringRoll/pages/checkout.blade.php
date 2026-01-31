@extends('coloringRoll.layout.master')

@section('title', 'Checkout')

@section('content')


    <!-- breadcrumb area start -->
    <div class="it-breadcrumb-area it-breadcrumb-height black-bg p-relative fix">
        <div class="it-breadcrumb-shape-1">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-1.png') }}" alt="">
        </div>
        <div class="it-breadcrumb-shape-2">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-2.png') }}" alt="">
        </div>
        <div class="it-breadcrumb-shape-3">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-3.png') }}" alt="">
        </div>
        <div class="it-breadcrumb-shape-5">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-5.png') }}" alt="">
        </div>
        <div class="it-breadcrumb-shape-6">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-6.png') }}" alt="">
        </div>
        <div class="it-breadcrumb-shape-7">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-5.png') }}" alt="">
        </div>
        <div class="it-breadcrumb-shape-8">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-7.png') }}" alt="">
        </div>
        <div class="it-breadcrumb-shape-9">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-8.png') }}" alt="">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="it-breadcrumb-content z-index text-center">
                        <div class="it-breadcrumb-section-title-box mb-20">
                            <h3 class="it-breadcrumb-title">Checkout</h3>
                        </div>
                        <div class="it-breadcrumb-list">
                            <span><a href="index.html">Home</a></span>
                            <span class="dvdr"><i>//</i></span>
                            <span class="color">Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- coupon-area start -->
    <section class="coupon-area pt-100 pb-30">
        <div class="container">
        </div>
    </section>
    <!-- coupon-area end -->

    <!-- checkout-area start -->
    <section class="checkout-area pb-70">
        <div class="container">
            <form method="POST" action="{{ route('checkout.store') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label> Name <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone <span class="required">*</span></label>
                                        <input type="text" name="phone" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" name="address" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>City <span class="required">*</span></label>
                                        <input type="text" name="city" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Country <span class="required">*</span></label>
                                        <input type="text" name="country" value="Jordan" required>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>
                                        <input type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}" required>
                                    </div>
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="your-order mb-30 ">
                            <h3>Your order</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cart->items as $item)
                                            @php
                                                $product = $item->product ?? $item->variant?->product;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $product?->name }}
                                                    <strong class="product-quantity"> × {{ $item->quantity }}</strong>
                                                </td>
                                                <td class="product-total">
                                                    {{ $item->price * $item->quantity }} JD
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>


                                    <tfoot >
                                        <tr class="cart-subtotal" >
                                            <th>Subtotal</th>
                                            <td>{{ $cart->items->sum(fn($i) => $i->price * $i->quantity) }} JD</td>
                                        </tr>

                                        <tr class="shipping">
                                            <th>Delivery</th>
                                            <td>2 JD</td>
                                        </tr>

                                        <tr class="order-total"">
                                            <th>Total</th>
                                            <td>
                                                <strong>
                                                    {{ $cart->items->sum(fn($i) => $i->price * $i->quantity) + 2 }} JD
                                                </strong>
                                            </td>
                                        </tr>
                                    </tfoot>


                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="order-button-payment mt-20">
                                    <form method="POST" action="{{ route('checkout.store') }}">
                                        @csrf
                                        <button type="submit" class="it-btn circle-effect">
                                             Place order & Pay
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- checkout-area end -->



@endsection
