@extends('coloringRoll.layout.master')

@section('title', 'Home')

@section('content')
    <!-- hero-area-start -->
    <div class="it-hero-area it-hero-ptb p-relative fix grey-bg">
        <div class="it-hero-shape-4" data-background="{{ asset('coloringRoll/img/hero/shape-1-4.png')}}"></div>
        <div class="it-hero-shape-5">
            <img src="{{ asset('coloringRoll/img/home-02/Bannar/image-16.svg')}}')}}" alt="" />
        </div>
        <div class="it-hero-shape-6">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-5.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-7 d-none d-lg-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-6.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-8 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-7.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-9 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-8.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-10 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-9.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-11 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-10.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-12 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-11.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-13 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-10.png')}}" alt="" />
        </div>
        <div class="it-hero-shape-14 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/hero/shape-1-12.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="it-hero-content">
                        <div class="it-hero-title-box pb-20">
                            <span class="it-section-subtitle theme-2 wow itfadeUp" data-wow-duration=".9s"
                                data-wow-delay=".3s">
                                Creative Coloring Rolls</span>
                            <h1 class="it-hero-title wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                                Turn Free Time Into <br />
                                <span>Creative Fun.</span>
                            </h1>
                        </div>
                        <div class="it-hero-text pb-15 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                            <p>
                                Long coloring rolls designed to keep kids engaged, creative,
                                and away from screens. <br />
                                A fun activity kids love and parents trust.
                            </p>
                        </div>
                        <div class="it-hero-button wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".9s">
                            <a class="it-btn circle-effect" href="contact.html">
                                <span>shop now
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
                <div class="col-xl-5 col-lg-6">
                    <div class="it-hero-thumb-box p-relative z-index">
                        <div class="it-hero-thumb p-relative" data-mask-src="{{ asset('coloringRoll/img/hero/thumb-1.png')}}">
                            <img src="{{ asset('coloringRoll/img/aatest/hero.png')}}" alt="" width="550px" />
                        </div>
                        <div class="it-hero-shape-1">
                            <img src="{{ asset('coloringRoll/img/hero/shape-1-1.png')}}" alt="" />
                        </div>
                        <div class="it-hero-shape-2 d-none d-md-block">
                            <img src="{{ asset('coloringRoll/img/hero/shape-1-2.png')}}" alt="" />
                        </div>
                        <div class="it-hero-shape-3 d-none d-xxl-block">
                            <img src="{{ asset('coloringRoll/img/hero/shape-1-3.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero-area-end -->

    <!-- service-area-start -->
    <div class="it-service-2-area pt-120 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="it-service-2-title-box text-center pb-75">
                        <h3 class="it-section-title pb-20">Why Our Coloring Rolls?</h3>
                        <p>
                            More than just coloring… a smart way to learn, play, and relax
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mb-50 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".3s">
                    <div class="it-service-2-item-wrap it-service-2-style-1">
                        <div class="it-service-2-item text-center">
                            <img src="{{ asset('coloringRoll/img/aatest/roll.png')}}" alt="" style="margin-bottom: 5px" />
                            <div class="it-service-2-content">
                                <h4 class="it-service-2-title pb-15">
                                    Long Coloring Rolls
                                </h4>
                                <p class="mb-20">
                                    Extra-long coloring rolls (1m, 2m, or 3m) give kids more
                                    space to explore their creativity without limits.
                                </p>
                                <div class="it-service-2-button"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-6 col-md-6 mb-50 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".7s">
                    <div class="it-service-2-item-wrap it-service-2-style-3">
                        <div class="it-service-2-item text-center">
                            <img src="{{ asset('coloringRoll/img/aatest/safe.png')}}" alt="" style="margin-bottom: 5px" />
                            <div class="it-service-2-content">
                                <h4 class="it-service-2-title pb-15">
                                    Safe & Kid-Friendly Paper
                                </h4>
                                <p class="mb-20">
                                    High-quality paper, safe for kids, suitable size for more
                                    than one, perfect for crayons, colors, and markers.
                                </p>
                                <div class="it-service-2-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 mb-50 wow itfadeUp" data-wow-duration=".9s" data-wow-delay=".5s">
                    <div class="it-service-2-item-wrap it-service-2-style-2">
                        <div class="it-service-2-item text-center">
                            <img src="{{ asset('coloringRoll/img/aatest/3.jpg')}}" alt="" style="margin-bottom: 5px" />
                            <div class="it-service-2-content">
                                <h4 class="it-service-2-title pb-15">
                                    Fun & Educational Themes
                                </h4>
                                <p class="mb-20">
                                    Animals, cars, superheroes, and more themed illustrations
                                    designed to boost imagination and focus.
                                </p>
                                <div class="it-service-2-button"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service-area-end -->

    <!-- about-area-start -->
    <div class="it-about-2-area p-relative fix grey-bg pt-140 pb-120">
        <div class="it-about-2-shape-3 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/about/shape-1-3.png')}}" alt="" />
        </div>
        <div class="it-about-2-shape-4 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/about/shape-1-4.png')}}" alt="" />
        </div>
        <div class="it-about-2-shape-5 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/about/shape-1-5.png')}}" alt="" />
        </div>
        <div class="it-about-2-shape-6 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/about/shape-1-6.png')}}" alt="" />
        </div>
        <div class="it-about-2-shape-7 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/about/shape-1-7.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-7 col-lg-6">
                    <div class="it-about-2-thumb-box p-relative">
                        <div class="it-about-2-shape-1">
                            <img src="{{ asset('coloringRoll/img/about/shape-1-1.png')}}" alt="" />
                        </div>
                        <div class="it-about-2-shape-2 d-none d-xl-block">
                            <img src="{{ asset('coloringRoll/img/about/shape-1-2.png')}}" alt="" />
                        </div>
                        <div class="it-about-2-thumb" data-mask-src="{{ asset('coloringRoll/img/about/Image-2.png')}}">
                            <img src="{{ asset('coloringRoll/img/aatest/children.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6 wow itfadeRight" data-wow-duration=".9s" data-wow-delay=".7s">
                    <div class="it-about-2-right">
                        <h3 class="it-section-title pb-20">
                            Coloring a <span>Smarter Generation</span>
                        </h3>
                        <div class="it-about-2-text pb-25">
                            <p>
                                Our coloring rolls are designed to turn screen-free time
                                into a fun and meaningful activity. While kids enjoy
                                coloring and expressing their creativity, parents enjoy a
                                calm and productive time.
                            </p>
                        </div>
                        <div class="it-about-2-nursery-box mb-15 d-flex align-items-start">
                            <div class="it-about-2-nursery-icon">
                                <img src="{{ asset('coloringRoll/img/aatest/paint.png')}}" alt="" width="90px" />
                            </div>
                            <div class="it-about-2-nursery-text">
                                <h5 class="it-about-2-nursery-title">Keeps Kids Busy</h5>
                                <p>
                                    One roll can keep children engaged for hours without
                                    screens or distractions.
                                </p>
                            </div>
                        </div>
                        <div class="it-about-2-nursery-box mb-25 d-flex align-items-start">
                            <div class="it-about-2-nursery-icon">
                                <img src="{{ asset('coloringRoll/img/aatest/mother.png')}}" alt="" width="90px" />
                            </div>
                            <div class="it-about-2-nursery-text">
                                <h5 class="it-about-2-nursery-title">
                                    Gives Parents Peace of Mind
                                </h5>
                                <p>
                                    A quiet activity that helps parents relax while their kids
                                    play and learn safely.
                                </p>
                            </div>
                        </div>
                        <a class="it-btn circle-effect" href="about-us.html">
                            <span>
                                about us
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
    <!-- about-area-end -->

    <!-- classes-area-start -->
    <div class="it-classes-area pt-110 pb-140">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="it-classes-title-box text-center pb-55">
                        <h3 class="it-section-title pb-20">Our Coloring Themes</h3>
                        <p>Choose the perfect roll for your child's imagination</p>
                    </div>
                </div>
                <div class="col-xl-12">
                    <div class="it-classes-wrap p-relative">
                        <div class="swiper-container it-classes-active">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="it-classes-item-wrap text-center">
                                        <div class="it-classes-item text-center">
                                            <div class="it-classes-thumb mb-35">
                                                <a href="program-details.html"><img src="{{ asset('coloringRoll/img/aatest/10.jpg')}}"
                                                        alt="" height="300px" /></a>
                                            </div>
                                            <div class="it-classes-content">
                                                <h4 class="it-classes-title pb-15">
                                                    <a href="program-details.html">Kids Worlds Theme</a>
                                                </h4>
                                                <p>
                                                    A colorful collection of kids' favorite worlds
                                                    such as animals, letters, cars, and shapes,
                                                    designed to make learning fun and engaging.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="it-classes-item-wrap text-center">
                                        <div class="it-classes-item text-center">
                                            <div class="it-classes-thumb mb-35">
                                                <a href="program-details.html"><img src="{{ asset('coloringRoll/img/aatest/ramadan.png')}}"
                                                        alt="" height="300px" /></a>
                                            </div>
                                            <div class="it-classes-content">
                                                <h4 class="it-classes-title pb-15">
                                                    <a href="program-details.html">Religious Occasions Theme</a>
                                                </h4>
                                                <p>
                                                    Coloring rolls inspired by religious occasions
                                                    like Ramadan,Eid and more, helping children learn
                                                    values and meanings in a simple and joyful way.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="it-classes-item-wrap text-center">
                                        <div class="it-classes-item text-center">
                                            <div class="it-classes-thumb mb-35">
                                                <a href="program-details.html"><img src="{{ asset('coloringRoll/img/aatest/istiklal.png')}}"
                                                        alt="" height="300px" /></a>
                                            </div>
                                            <div class="it-classes-content">
                                                <h4 class="it-classes-title pb-15">
                                                    <a href="program-details.html">National Occasions Theme</a>
                                                </h4>
                                                <p>
                                                    Creative coloring rolls that celebrate national
                                                    occasions and symbols, strengthening children’s
                                                    sense of identity and belonging.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="it-classes-dots text-center mt-55"></div>
                        <div class="it-classes-arrow-box d-none d-xl-block">
                            <button class="classes-next">
                                <i class="fa-regular fa-angle-right"></i>
                            </button>
                            <button class="classes-prev">
                                <i class="fa-regular fa-angle-left"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- classes-area-end -->

    <!-- cta-area-start -->
    <div class="it-cta-area it-cta-ptb fix p-relative theme-bg">
        <div class="it-cta-shape-1 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/cta/shape-1-1.png')}}" alt="" />
        </div>
        <div class="it-cta-shape-2">
            <img src="{{ asset('coloringRoll/img/cta/shape-1-2.png')}}" alt="" />
        </div>
        <div class="it-cta-shape-3 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/cta/shape-1-3.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="it-cta-content text-center">
                        <h4 class="it-cta-title pb-20">
                            Turn Free Time Into Creative Time
                        </h4>
                        <p>
                            Give your child a fun, educational activity that keeps them
                            busy and happy. Choose your favorite coloring roll and start
                            coloring today.
                        </p>
                        <a class="it-btn-white circle-effect" href="contact.html">
                            <span>Shop Now
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
    <!-- cta-area-end -->

    <!-- funfact-area-start -->
    <div class="it-funfact-2-area it-funfact-2-ptb p-relative fix">
        <div class="it-funfact-2-shape-1">
            <img src="{{ asset('coloringRoll/img/funfact/shape-1-1.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 wow itfadeLeft" data-wow-duration=".9s" data-wow-delay=".5s">
                    <div class="it-funfact-2-left">
                        <div class="it-funfact-2-title-box pb-50">
                            <h4 class="it-section-title pb-15">
                                Why Parents Love Our Rolls
                            </h4>
                        </div>
                        <div class="it-funfact-2-wrap">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="it-funfact-item d-flex align-items-center">
                                        <div class="it-funfact-content">
                                            <h6>Hours of Screen-Free Fun</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="it-funfact-item d-flex align-items-center">
                                        <div class="it-funfact-content">
                                            <h6>Happy and Satisfied Families</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="it-funfact-item d-flex align-items-center">
                                        <div class="it-funfact-content">
                                            <h6>Creative and Happy Kids</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="it-funfact-item d-flex align-items-center">
                                        <div class="it-funfact-content">
                                            <h6>Multiple Length Options</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="it-funfact-2-thumb-box p-relative">
                        <div class="it-funfact-2-thumb" data-mask-src="{{ asset('coloringRoll/img/funfact/thumb-1-1.png')}}">
                            <img src="{{ asset('coloringRoll/img/aatest/family.png')}}" alt="" />
                        </div>
                        <div class="it-funfact-2-shape-2">
                            <img src="{{ asset('coloringRoll/img/funfact/shape-1-4.png')}}" alt="" />
                        </div>
                        <div class="it-funfact-2-shape-3 d-none d-xl-block">
                            <img src="{{ asset('coloringRoll/img/funfact/shape-1-2.png')}}" alt="" />
                        </div>
                        <div class="it-funfact-2-shape-4 d-none d-xl-block">
                            <img src="{{ asset('coloringRoll/img/funfact/shape-1-3.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- funfact-area-end -->

    <!-- contact-area-start -->
    <div class="it-contact-area pt-100 pb-100 p-relative black-bg fix">
        <div class="it-contact-shape-4 d-none d-md-block">
            <img src="{{ asset('coloringRoll/img/contact/shape-2-2.png')}}" alt="" />
        </div>
        <div class="it-contact-shape-6 d-none d-xxl-block">
            <img src="{{ asset('coloringRoll/img/contact/shape-1-2.png')}}" alt="" />
        </div>
        <div class="it-contact-shape-7 d-none d-xxl-block">
            <img src="{{ asset('coloringRoll/img/contact/shape-2-4.png')}}" alt="" />
        </div>
        <div class="it-contact-shape-8 d-none d-xl-block">
            <img src="{{ asset('coloringRoll/img/contact/shape-2-5.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-5 col-lg-5 order-1 order-lg-0 wow itfadeLeft" data-wow-duration=".9s"
                    data-wow-delay=".5s">
                    <div class="it-contact-thumb-box it-contact-thumb-wrap text-center text-lg-start z-index p-relative">
                        <!-- <div
                      class="it-contact-thumb"
                      data-mask-src="{{ asset('coloringRoll/img/contact/Image.png')}}"
                    >
                      <img src="{{ asset('coloringRoll/img/contact/thumb-2-1.png')}}" alt="" />
                    </div> -->
                        <div class="it-contact-shape-3">
                            <img src="{{ asset('coloringRoll/img/contact/shape-2-1.png')}}" alt="" />
                        </div>
                        <div class="it-contact-shape-5 d-none d-xl-block">
                            <img src="{{ asset('coloringRoll/img/contact/shape-2-3.png')}}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 order-0 order-lg-1 wow itfadeRight" data-wow-duration=".9s"
                    data-wow-delay=".7s">
                    <div class="it-contact-form-box z-index">
                        <div class="it-funfact-2-title-box pb-55">
                            <h4 class="it-section-title pb-15 text-white">
                                Contact with Us
                            </h4>
                            <p class="text-white">
                                We are ready to make you thiughts and
                                <br />
                                ideas real
                            </p>
                        </div>
                        <form action="index-2.html#">
                            <div class="row">
                                <div class="col-md-6 mb-20">
                                    <div class="it-contact-input-box">
                                        <input type="text" placeholder="first name:" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="it-contact-input-box">
                                        <input type="text" placeholder="your subject:" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="it-contact-input-box">
                                        <input type="email" placeholder="Email address:" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-20">
                                    <div class="it-contact-input-box">
                                        <input type="text" placeholder="Phone:" />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-20">
                                    <div class="it-contact-textarea-box">
                                        <textarea placeholder="Write here..."></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="it-contact-button">
                            <button class="it-btn circle-effect theme-style">
                                <span>Send
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
        </div>
    </div>
    <!-- contact-area-end -->

    <!-- gallery-area-start -->
    <div class="it-gallery-area p-relative z-index grey-bg pt-120 pb-90" id="gallery">
        <div class="it-gallery-shape-1 d-none d-xxl-block">
            <img src="{{ asset('coloringRoll/img/gallery/shape-1-2.png')}}" alt="" />
        </div>
        <div class="it-gallery-shape-2 d-none d-xxl-block">
            <img src="{{ asset('coloringRoll/img/gallery/shape-1-3.png')}}" alt="" />
        </div>
        <div class="it-gallery-shape-3 d-none d-xxl-block">
            <img src="{{ asset('coloringRoll/img/gallery/shape-1-1.png')}}" alt="" />
        </div>
        <div class="container">
            <div class="row gx-35">
                <div class="col-xl-12">
                    <div class="it-blog-2-title-box text-center pb-55">
                        <h3 class="it-section-title pb-20">Our gallery</h3>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                            do eiusmod <br />
                            tempor incididunt ut labore et dolore magna aliqua
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-1.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-1.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-2.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-2.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-3.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-3.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-4.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-4.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-5.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-5.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-6.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-6.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-7.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-7.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-35">
                    <div class="it-gallery-item p-relative">
                        <div class="it-gallery-thumb">
                            <img src="{{ asset('coloringRoll/img/gallery/thumb-1-8.jpg')}}" alt="" />
                        </div>
                        <div class="it-gallery-thumb-icon">
                            <a class="popup-image" href="{{ asset('coloringRoll/img/gallery/thumb-1-8.jpg')}}">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.2188 9.21875H10.7812V0.78125C10.7812 0.349766 10.4315 0 10 0C9.56852 0 9.21875 0.349766 9.21875 0.78125V9.21875H0.78125C0.349766 9.21875 0 9.56852 0 10C0 10.4315 0.349766 10.7812 0.78125 10.7812H9.21875V19.2188C9.21875 19.6502 9.56852 20 10 20C10.4315 20 10.7812 19.6502 10.7812 19.2188V10.7812H19.2188C19.6502 10.7812 20 10.4315 20 10C20 9.56852 19.6502 9.21875 19.2188 9.21875Z"
                                        fill="currentcolor" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery-area-end -->

@endsection
