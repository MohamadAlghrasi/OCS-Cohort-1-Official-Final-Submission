@extends('coloringRoll.layout.master')

@section('title', 'Shop-details')

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
                            <h3 class="it-breadcrumb-title">Shop-details</h3>
                        </div>
                        <div class="it-breadcrumb-list">
                            <span><a href="index.html">Home</a></span>
                            <span class="dvdr"><i>//</i></span>
                            <span class="color">Shop-details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!--product-details-area-start -->
    <div class="it-product-details-area pt-130">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    {{-- <div class="it-shop-details__wrapper">
                        <div class="it-shop-details__tab-content-box mb-20">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-one" role="tabpanel"
                                    aria-labelledby="nav-one-tab">
                                    <div class="it-shop-details__tab-big-img">
                                        <img src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                            alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="it-shop-details__tab-btn-box">
                            <nav>
                                <div class="nav nav-tab" id="nav-tab" role="tablist">
                                    @foreach ($product->images as $index => $image)
                                        <button class="nav-links {{ $index === 0 ? 'active' : '' }}" data-bs-toggle="tab"
                                            data-bs-target="#img-{{ $image->id }}">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="">
                                        </button>
                                    @endforeach

                                </div>
                            </nav>
                        </div>
                    </div> --}}
                    <div class="it-shop-details__wrapper">
            <div class="swiper product-images-slider">
                <div class="swiper-wrapper">
                    @foreach ($product->images as $image)
                        <div class="swiper-slide">
                            <img src="{{ asset('storage/' . $image->image_path) }}" alt="">
                        </div>
                    @endforeach
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
                </div>


                <div class="col-xl-6 col-lg-6">
                    <div class="it-shop-details__right-warp">
                        <h3 class="it-shop-details__title-sm">
                            {{ $product->name }}
                        </h3>

                        <div class="it-shop-details__price">
                            @if ($product->category->type === 'simple')
                                <span>{{ $product->base_price }} JD</span>
                            @else
                                <span>Starting from {{ $product->variants->min('price') }} JD</span>
                            @endif
                        </div>

                        <div class="it-shop-details__text-2">
                            <p>{{ $product->description }}</p>
                        </div>

                        <div class="it-shop-details__product-info">
                            <ul>
                                <li>
                                    <span>Category : </span>
                                    {{ $product->category->name }}
                                </li>
                            </ul>
                        </div>

                        @php
                            $widths = collect();
                            $lengths = collect();
                            foreach ($product->variants as $variant) {
                                foreach ($variant->values as $value) {
                                    if ($value->attribute->name === 'width') {
                                        $widths->push($value);
                                    }
                                    if ($value->attribute->name === 'length') {
                                        $lengths->push($value);
                                    }
                                }
                            }
                            $widths = $widths->unique('id');
                            $lengths = $lengths->unique('id');
                        @endphp
                        @if ($product->category->type === 'rolls')
                            <div class="it-product-variant mb-25">
                                <h6>Width</h6>
                                <div class="variant-options">
                                    @foreach ($widths as $width)
                                        <button type="button" class="variant-btn" data-width="{{ $width->id }}">
                                            {{ $width->value }} {{ $width->attribute->unit }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                            <div class="it-product-variant mb-25">
                                <h6>length</h6>
                                <div class="variant-options">
                                    @foreach ($lengths as $length)
                                        <button type="button" class="variant-btn" data-length="{{ $length->id }}">
                                            {{ $length->value }} {{ $length->attribute->unit }}
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <input type="hidden" id="variant_id" name="variant_id">

                        <div class="it-shop-details__price mt-20">
                            <span id="variant-price">—</span>
                            <input type="hidden" id="base-variant-price">
                        </div>

                        <div class="it-shop-details__quantity-wrap mt-30 d-flex align-items-center">
                            <div class="it-shop-details__btn mr-30">
                                <form action="{{ route('cart.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">

                                    @if ($product->category->type === 'rolls')
                                        @if ($product->variants->isNotEmpty())
                                            <input type="hidden" name="variant_id"
                                                value="{{ $product->variants->first()->id }}">
                                        @else
                                            <p style="color:red">This product is not available right now</p>
                                        @endif
                                    @else
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    @endif

                                    <button type="submit" class="it-btn">
                                        Add to Cart
                                    </button>
                                </form>


                            </div>


                            <div class="it-shop-details__quantity-box">
                                <div class="it-shop-details__quantity">
                                    <div class="it-cart-minus"><i class="fal fa-minus"></i></div>
                                    <input type="number" value="1" min="1" name="qty" id="qty">
                                    <div class="it-cart-plus"><i class="fal fa-plus"></i></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- product-details-area-end -->

    <!-- shop-area-start -->
    <div class="it-shop-area pt-115 pb-90">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="it-shop-title-box text-center mb-65">
                        <span class="it-section-subtitle">Shop</span>
                        <h3 class="it-section-title">Our Kindergarten Shop Products</h3>
                    </div>
                </div>

                @foreach ($relatedProducts as $related)
                    @php
                        $image = $related->images->firstWhere('is_main', true) ?? $related->images->first();
                    @endphp

                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-30 wow itfadeUp">
                        <div class="it-shop-item text-center">
                            <div class="it-shop-thumb p-relative">
                                <img class="w-100" src="{{ asset('storage/' . $image->image_path) }}" alt="">
                            </div>

                            <div class="it-shop-content-box">
                                <div class="it-shop-content">
                                    <h4 class="it-shop-title pb-15">
                                        <a href="{{ route('shop.details', $related->slug) }}">
                                            {{ $related->name }}
                                        </a>
                                    </h4>

                                    <div class="it-shop-rate mb-20">
                                        <span class="color">
                                            {{ $related->base_price ?? $related->variants->min('price') }} JD
                                        </span>
                                    </div>

                                    <div class="it-shop-button">
                                        <a class="it-btn-sm" href="{{ route('shop.details', $related->slug) }}">
                                            <span>View Details</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- shop-area-end -->




@endsection
