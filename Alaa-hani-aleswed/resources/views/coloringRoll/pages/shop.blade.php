@extends('coloringRoll.layout.master')

@section('title', 'Shop')

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
                            <h3 class="it-breadcrumb-title">Shop</h3>
                        </div>
                        <div class="it-breadcrumb-list">
                            <span><a href="index.html">Home</a></span>
                            <span class="dvdr"><i>//</i></span>
                            <span class="color">Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- product-area-start -->
    <div class="tp-product__area pt-100 pb-120">
        <div class="container">
            {{-- <div class="row">
                <div class="col-12">
                    <div class="tp-shop-top pb-30">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                                <div class="it-product__text">
                                    <span>Showing 12 of 120 results</span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                                <div class="it-product__filter-wrap d-flex justify-content-start justify-content-md-end">
                                    <div class="it-product__filter-box p-relative">
                                        <div class="it-product__filter">
                                            <select>
                                                <option>Default sorting</option>
                                                <option>Low to Hight</option>
                                                <option>High to Low</option>
                                                <option>New Added</option>
                                                <option>On Sale</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $product)
                    @php
                        $mainImage = $product->images->firstWhere('is_main', true);
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30">
                        <div class="it-shop-item text-center">
                            <div class="it-shop-thumb p-relative">
                                @if ($mainImage)
                                    <img class="w-100" src="{{ asset('storage/' . $mainImage->image_path) }}"
                                        alt="{{ $product->name }}">
                                @else
                                    <img class="w-100" src="{{ asset('coloringRoll/img/shop/thumb-placeholder.jpg') }}"
                                        alt="No image">
                                @endif
                            </div>

                            <div class="it-shop-content-box">
                                <div class="it-shop-content">
                                    <h4 class="it-shop-title pb-15">
                                        <a href="{{ route('shop.details', $product->slug) }}">
                                            {{ $product->name }}
                                        </a>
                                    </h4>

                                    <div class="it-shop-rate mb-20">
                                        <span class="color">
                                            @if ($product->category?->type === 'simple')
                                                {{ $product->base_price }} JD
                                            @else
                                                From {{ $product->variants->min('price') }} JD
                                            @endif
                                        </span>
                                    </div>

                                    <div class="it-shop-button">
                                        <a class="it-btn-sm" href="{{ route('shop.details', $product->slug) }}">
                                            <span>View Details</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-xl-12">
                    <div class="basic-pagination text-center mt-35">
                        <nav>
                            <ul>
                                <li>
                                    <a class="current" href="shop.html">
                                        <span>
                                            <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.7595 0L6.6949 0.974515L2.53237 5.31093H21V6.68912H2.53237L6.6949 11.0255L5.7595 12L0 5.99998L5.7595 0Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="shop.html">1</a>
                                </li>
                                <li>
                                    <a href="shop.html">2</a>
                                </li>
                                <li>
                                    <a href="shop.html">3</a>
                                </li>
                                <li>
                                    <a class="current" href="shop.html">
                                        <span>
                                            <svg width="22" height="12" viewBox="0 0 22 12" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.1975 0L15.2621 0.974515L19.4247 5.31093H0.957031V6.68912H19.4247L15.2621 11.0255L16.1975 12L21.957 5.99998L16.1975 0Z"
                                                    fill="currentcolor" />
                                            </svg>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div> --}}
            @livewire('coloringroll.shop-products')
        </div>
    </div>
    <!-- product-area-end -->



@endsection
