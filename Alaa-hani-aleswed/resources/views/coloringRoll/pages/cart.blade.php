@extends('coloringRoll.layout.master')

@section('title', 'Cart')

@section('content')

 

      <!-- breadcrumb area start -->
      <div class="it-breadcrumb-area it-breadcrumb-height black-bg p-relative fix">
         <div class="it-breadcrumb-shape-1">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-1.png')}}" alt="">
         </div>
         <div class="it-breadcrumb-shape-2">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-2.png')}}" alt="">
         </div>
         <div class="it-breadcrumb-shape-3">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-3.png')}}" alt="">
         </div>
         <div class="it-breadcrumb-shape-5">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-5.png')}}" alt="">
         </div>
         <div class="it-breadcrumb-shape-6">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-6.png')}}" alt="">
         </div>
         <div class="it-breadcrumb-shape-7">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-5.png')}}" alt="">
         </div>
         <div class="it-breadcrumb-shape-8">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-7.png')}}" alt="">
         </div>
         <div class="it-breadcrumb-shape-9">
            <img src="{{ asset('coloringRoll/img/breadcurmb/shape-1-8.png')}}" alt="">
         </div>
         <div class="container">
            <div class="row">
               <div class="col-xxl-12">
                  <div class="it-breadcrumb-content z-index text-center">
                     <div class="it-breadcrumb-section-title-box mb-20">
                        <h3 class="it-breadcrumb-title">Cart</h3>
                     </div>
                     <div class="it-breadcrumb-list">
                        <span><a href="index.html">Home</a></span>
                        <span class="dvdr"><i>//</i></span>
                        <span class="color">Cart</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- cart-area-start -->
      <section class="cart-area pt-120 pb-120">
         <div class="container">
           @livewire('coloringroll.carts')
         </div>
      </section>
      <!-- cart-area-end -->


@endsection