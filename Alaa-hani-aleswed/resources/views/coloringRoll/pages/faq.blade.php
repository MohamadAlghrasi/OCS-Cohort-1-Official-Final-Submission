@extends('coloringRoll.layout.master')

@section('title', 'FAQ')

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

      <!-- faq-area-start -->
      <div class="it-faq-area p-relative pt-120 pb-120">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-4 order-1 order-lg-0">
                  <div class="it-sv-details-sidebar it-faq-sidebar">
                     <div class="it-sv-details-sidebar-search mb-55">
                        <input type="text" placeholder="search">
                        <button type="submit">
                           <i class="fal fa-search"></i>
                        </button>
                     </div>
                     <div class="it-sv-details-sidebar-widget mb-55">
                        <h4 class="it-sv-details-sidebar-title mb-30">service category</h4>
                        <a href="faq.html#">
                           <div class="it-sv-details-sidebar-category mb-10">
                              graphic design
                              <span><i class="fa-light fa-angle-right"></i></span>
                           </div>
                        </a>
                        <a href="faq.html#">
                           <div class="it-sv-details-sidebar-category active mb-10">
                              web design
                              <span><i class="fa-light fa-angle-right"></i></span>
                           </div>
                        </a>
                        <a href="faq.html#">
                           <div class="it-sv-details-sidebar-category mb-10">
                              it and software
                              <span><i class="fa-light fa-angle-right"></i></span>
                           </div>
                        </a>
                        <a href="faq.html#">
                           <div class="it-sv-details-sidebar-category mb-10">
                              seles marketing
                              <span><i class="fa-light fa-angle-right"></i></span>
                           </div>
                        </a>
                        <a href="faq.html#">
                           <div class="it-sv-details-sidebar-category mb-10">
                              art & humanities
                              <span><i class="fa-light fa-angle-right"></i></span>
                           </div>
                        </a>
                        <a href="faq.html#">
                           <div class="it-sv-details-sidebar-category mb-10">
                              mobile application
                              <span><i class="fa-light fa-angle-right"></i></span>
                           </div>
                        </a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-8 col-lg-8 order-0 order-lg-1">
                  <div class="it-faq-wrap">
                     <div class="it-custom-accordion it-custom-accordion-style-3">
                        <div class="accordion" id="accordionExample">
                           <div class="accordion-items tp-faq-active">
                              <h2 class="accordion-header" id="headingOne">
                                 <button class="accordion-buttons " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    What Happens to my data if I cancel?
                                 </button>
                              </h2>
                              <div id="collapseOne" class="accordion-collapse collapse show"
                                 aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingTwo">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    What are the different types of marketing solutions?
                                 </button>
                              </h2>
                              <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingThree">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is the most important thing in a designing?
                                 </button>
                              </h2>
                              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFour">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    What activities are done in the development?
                                 </button>
                              </h2>
                              <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFour4">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour4" aria-expanded="false" aria-controls="collapseFour4">
                                    Are social media good for the business growth?
                                 </button>
                              </h2>
                              <div id="collapseFour4" class="accordion-collapse collapse" aria-labelledby="headingFour4"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFour6">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour6" aria-expanded="false" aria-controls="collapseFour6">
                                    How often should i work on the digital marketing?
                                 </button>
                              </h2>
                              <div id="collapseFour6" class="accordion-collapse collapse" aria-labelledby="headingFour6"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFour7">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour7" aria-expanded="false" aria-controls="collapseFour7">
                                    What activities are done in the development?
                                 </button>
                              </h2>
                              <div id="collapseFour7" class="accordion-collapse collapse" aria-labelledby="headingFour7"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFour8">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour8" aria-expanded="false" aria-controls="collapseFour8">
                                    Are social media good for the business growth?
                                 </button>
                              </h2>
                              <div id="collapseFour8" class="accordion-collapse collapse" aria-labelledby="headingFour8"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                           <div class="accordion-items">
                              <h2 class="accordion-header" id="headingFour9">
                                 <button class="accordion-buttons collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour9" aria-expanded="false" aria-controls="collapseFour9">
                                    What Happens to my data if I cancel?
                                 </button>
                              </h2>
                              <div id="collapseFour9" class="accordion-collapse collapse" aria-labelledby="headingFour9"
                                 data-bs-parent="#accordionExample">
                                 <div class="accordion-body d-flex align-items-center">
                                    <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate velit esse
                                       cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non
                                       proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    <img class="d-none d-xl-block" src="{{ asset('coloringRoll/img/faq/faq.jpg')}}" alt="">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- faq-area-end -->



@endsection