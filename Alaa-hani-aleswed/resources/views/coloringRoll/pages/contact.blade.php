@extends('coloringRoll.layout.master')

@section('title', 'Contact')

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
                        <h3 class="it-breadcrumb-title">contact</h3>
                     </div>
                     <div class="it-breadcrumb-list">
                        <span><a href="index.html">Home</a></span>
                        <span class="dvdr"><i>//</i></span>
                        <span class="color">contact</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- breadcrumb area end -->

      <!-- contact-area-start -->
      <div class="it-contact-area pt-120 pb-90">
         <div class="container">
            <div class="row">
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                  <div class="it-contact-item it-contact-item-style-1">
                     <div class="it-contact-icon mb-25">
                        <span><i class="flaticon-map"></i></span>
                     </div>
                     <div class="it-contact-content">
                        <h4 class="it-contact-title">ADDRESS</h4>
                        <a href="contact.html#">736 University Drive Chicago
                           IL 60606 USA</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-30">
                  <div class="it-contact-item it-contact-item-style-2">
                     <div class="it-contact-icon mb-25">
                        <span><i class="flaticon-email"></i></span>
                     </div>
                     <div class="it-contact-content">
                        <h4 class="it-contact-title">EMAIL</h4>
                        <a href="mailto:brandinfo@gmail.com">brandinfo@ gmail.com</a>
                        <a href="mailto:brandinfo@gmail.com">brandinfo@ gmail.com</a>
                     </div>
                  </div>
               </div>
               <div class="col-xl-4 col-lg-4 col-md- col-sm-6 mb-30">
                  <div class="it-contact-item it-contact-item-style-3">
                     <div class="it-contact-icon mb-25">
                        <span><i class="flaticon-phone-call"></i></span>
                     </div>
                     <div class="it-contact-content">
                        <h4 class="it-contact-title">PHONE</h4>
                        <a href="tel:+9813127756689">(+981)312-775-6689</a>
                        <a href="tel:+9813127756689">(+981)312-775-6689</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- contact-area-end -->

      <!-- form-area-start -->
      <div class="it-form-area z-index">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="it-student-bg">
                     <div class="it-form-section-title text-center mb-65">
                        <span class="it-section-subtitle">Contact with us</span>
                        <h3 class="it-section-title">Feel free to write us <br>
                           anytime</h3>
                     </div>
                     <div class="it-student-regiform mb-20">
                        <form action="contact.html#">
                           <div class="it-student-regiform-wrap">
                              <div class="row gx-20">
                                 <div class="col-xl-6">
                                    <div class="it-student-regiform-item">
                                       <input type="text" placeholder="first name">
                                    </div>
                                 </div>
                                 <div class="col-xl-6">
                                    <div class="it-student-regiform-item">
                                       <input type="text" placeholder="last name">
                                    </div>
                                 </div>
                                 <div class="col-xl-6">
                                    <div class="it-student-regiform-item">
                                       <input type="email" placeholder="email">
                                    </div>
                                 </div>
                                 <div class="col-xl-6">
                                    <div class="it-student-regiform-item">
                                       <input type="text" placeholder="phone">
                                    </div>
                                 </div>
                                 <div class="col-xl-12">
                                    <div class="it-student-regiform-item">
                                       <div class="postbox__select">
                                          <select>
                                             <option>subject</option>
                                             <option>01 Year</option>
                                             <option>02 Year</option>
                                             <option>03 Year</option>
                                             <option>04 Year</option>
                                             <option>05 Year</option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-xl-12">
                                    <div class="it-student-regiform-item">
                                       <textarea placeholder="write a message...."></textarea>
                                    </div>
                                 </div>
                                 <div class="col-xl-12">
                                    <div class="it-student-regiform-button mt-20">
                                       <button class="it-btn w-100 circle-effect">
                                          <span>Submit now
                                             <svg width="15" height="14" viewBox="0 0 15 14" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                   d="M13.6875 7.71875C14.0938 7.34375 14.0938 6.6875 13.6875 6.3125L8.6875 1.3125C8.3125 0.90625 7.65625 0.90625 7.28125 1.3125C6.875 1.6875 6.875 2.34375 7.28125 2.71875L10.5625 6H1C0.4375 6 0 6.46875 0 7C0 7.5625 0.4375 8 1 8H10.5625L7.28125 11.3125C6.875 11.6875 6.875 12.3438 7.28125 12.7188C7.65625 13.125 8.3125 13.125 8.6875 12.7188L13.6875 7.71875Z"
                                                   fill="currentcolor" />
                                             </svg>
                                          </span>
                                       </button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- form-area-end -->

      <!-- map-area-start -->
      <div class="it-map-area">
         <div class="container-fluid p-0">
            <div class="row gx-0">
               <div class="col-xl-12">
                  <div class="it-map-wrap">
                     <iframe
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2337283.354854926!2d46.02386841617145!3d24.75268462660893!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1702544795801!5m2!1sen!2sbd"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- map-area-end -->




@endsection