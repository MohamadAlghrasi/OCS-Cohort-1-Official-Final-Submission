@extends('coloringRoll.layout.master')

@section('title', '404')

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
                        <h3 class="it-breadcrumb-title">PrOPPS! This page is not found</h3>
                     </div>
                     <div class="it-breadcrumb-list">
                        <span><a href="index.html">Home</a></span>
                        <span class="dvdr"><i>//</i></span>
                        <span class="color">404</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- error-area-start -->
      <div class="it-error-area pt-120 pb-120">
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xl-8">
                  <div class="it-error-box text-center">
                     <div class="it-error-thumb mb-65">
                        <img src="{{ asset('coloringRoll/img/error/error.png')}}" alt="">
                     </div>
                     <div class="it-error-content">
                        <h4 class="it-error-title">Sorry, Page Not Found!</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed eiusmod tempor incididunt ut
                           labore et dolore magna aliqua.</p>
                        <div class="it-error-input-box p-relative">
                           <input type="text" placeholder="Search here...">
                           <div class="it-error-input-icon">
                              <i class="flaticon-loupe"></i>
                           </div>
                        </div>
                        <div class="it-error-button">
                           <a class="it-btn circle-effect" href="index.html">
                              <span>Back home page
                                 <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                       d="M13.6875 7.71875C14.0938 7.34375 14.0938 6.6875 13.6875 6.3125L8.6875 1.3125C8.3125 0.90625 7.65625 0.90625 7.28125 1.3125C6.875 1.6875 6.875 2.34375 7.28125 2.71875L10.5625 6H1C0.4375 6 0 6.46875 0 7C0 7.5625 0.4375 8 1 8H10.5625L7.28125 11.3125C6.875 11.6875 6.875 12.3438 7.28125 12.7188C7.65625 13.125 8.3125 13.125 8.6875 12.7188L13.6875 7.71875Z"
                                       fill="currentcolor" />
                                 </svg>
                              </span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- error-area-end -->



@endsection