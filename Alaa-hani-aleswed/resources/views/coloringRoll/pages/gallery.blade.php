@extends('coloringRoll.layout.master')

@section('title', 'Gallery')

@section('content')

    <main>

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
                                <h3 class="it-breadcrumb-title">Gallery</h3>
                            </div>
                            <div class="it-breadcrumb-list">
                                <span><a href="index.html">Home</a></span>
                                <span class="dvdr"><i>//</i></span>
                                <span class="color">Gallery</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- gallery-area-start -->
        <div class="it-gallery-area pt-120 pb-90">
            <div class="container">
                <div class="row grid">
                    @livewire('coloringroll.add-gallery-image')
                    @foreach ($images as $image)
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35 grid-item">
                            <div class="it-gallery-item p-relative">
                                <div class="it-gallery-thumb">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="">
                                </div>

                                <div class="it-gallery-thumb-icon">
                                    <a class="popup-image" href="{{ asset('storage/' . $image->image_path) }}">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
                                            <path d="M19.2188 9.21875H10.7812V0.78125..." fill="currentcolor" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <!-- gallery-area-end -->

    </main>

@endsection
