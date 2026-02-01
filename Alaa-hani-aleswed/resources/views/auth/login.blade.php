@extends('coloringRoll.layout.master')

@section('title', 'Login')

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
                            <h3 class="it-breadcrumb-title">Login</h3>
                        </div>
                        <div class="it-breadcrumb-list">
                            <span><a href="index.html">Home</a></span>
                            <span class="dvdr"><i>//</i></span>
                            <span class="color">Login</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- signup-area-start -->
    <div class="it-signup-area pt-120 pb-120">
        <div class="container">
            <div class="it-signup-bg p-relative">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="it-signup-thumb d-none d-lg-block">
                            <img src="{{ asset('coloringRoll/img/login/login.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="it-signup-wrap">
                                <h4 class="it-signup-title">Welcome</h4>
                                <span>Log in your accuount</span>
                                <div class="it-signup-input-wrap">
                                    <div class="it-signup-input mb-20">
                                        <input type="email" name="email" placeholder="Email">
                                    </div>
                                    <div class="it-signup-input mb-15">
                                        <input type="Password" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="it-signup-forget d-flex justify-content-between flex-wrap">
                                    <div class="it-signup-agree mb-20">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Remember me
                                            </label>
                                        </div>
                                    </div>
                                    <a class="mb-20" href="login.html#">Forgot Password?</a>
                                </div>
                                <div class="it-signup-btn mb-40">
                                    <button type="submit" class="it-btn circle-effect theme-style w-100"><span>sign
                                            in</span></button>
                                </div>
                                <div class="it-signup-border text-center">
                                    <span>or</span>
                                </div>
                                <div
                                    class="it-signup-continue-wrap d-flex align-items-center justify-content-lg-between justify-content-evenly mb-40">
                                    <a href="login.html#">
                                        <div class="it-signup-continue-item d-flex align-items-center">
                                            <img src="{{ asset('coloringRoll/img/contact/contact-1-1.png') }}"
                                                alt="">
                                            <span>Continue with Google</span>
                                        </div>
                                    </a>
                                    <a href="login.html#">
                                        <div class="it-signup-continue-item d-flex align-items-center">
                                            <img src="{{ asset('coloringRoll/img/contact/contact-1-2.png') }}"
                                                alt="">
                                            <span>Continue with Facebook</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="it-signup-text text-center text-lg-start">
                                    <span>Don't have an account?<a href="{{ route('register') }}"> Sign Up</a></span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- signup-area-end -->



@endsection
