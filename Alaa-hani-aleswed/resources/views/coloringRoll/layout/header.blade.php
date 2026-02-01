 <!-- preloader -->
 {{-- <div id="preloader">
     <div class="preloader">
         <span></span>
         <span></span>
     </div>
 </div> --}}
 <!-- preloader end  -->

 <!-- back-to-top-start  -->
 <button class="scroll-top scroll-to-target" data-target="html">
     <i class="far fa-angle-double-up"></i>
 </button>
 <!-- back-to-top-end  -->

 <!-- search popup start -->
 {{-- <div class="search__popup">
     <div class="container">
         <div class="row">
             <div class="col-xxl-12">
                 <div class="search__wrapper">
                     <div class="search__top d-flex justify-content-between align-items-center">
                         <div class="search__logo">
                             <a href="index.html">
                                 <img src="{{ asset('coloringRoll/img/logo/logo-white.png') }}" alt="" />
                             </a>
                         </div>
                         <div class="search__close">
                             <button type="button" class="search__close-btn search-close-btn">
                                 <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                     <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5"
                                         stroke-linecap="round" stroke-linejoin="round" />
                                     <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5"
                                         stroke-linecap="round" stroke-linejoin="round" />
                                 </svg>
                             </button>
                         </div>
                     </div>
                     <div class="search__form">
                         <form action="index-2.html#">
                             <div class="search__input">
                                 <input class="search-input-field" type="text"
                                     placeholder="Type here to search..." />
                                 <span class="search-focus-border"></span>
                                 <button type="submit">
                                     <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                         <path
                                             d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z"
                                             stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                             stroke-linejoin="round" />
                                         <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor"
                                             stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                     </svg>
                                 </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div> --}}
 <!-- search popup end -->

 <!-- it-offcanvus-area-start -->
 {{-- <div class="it-offcanvas-area">
     <div class="itoffcanvas">
         <div class="it-offcanva-bottom-shape d-none d-xxl-block"></div>
         <div class="itoffcanvas__close-btn">
             <button class="close-btn"><i class="fal fa-times"></i></button>
         </div>
         <div class="itoffcanvas__logo">
             <a href="index.html">
                 <img src="{{ asset('coloringRoll/img/logo/logo-white.png') }}" alt="" />
             </a>
         </div>
         <div class="itoffcanvas__text">
             <p>
                 Suspendisse interdum consectetur libero id. Fermentum leo vel orci
                 porta non. Euismod viverra nibh cras pulvinar suspen.
             </p>
         </div>
         <div class="it-menu-mobile"></div>
         <div class="itoffcanvas__info">
             <h3 class="offcanva-title">Get In Touch</h3>
             <div class="it-info-wrapper mb-20 d-flex align-items-center">
                 <div class="itoffcanvas__info-icon">
                     <a href="index-2.html#"><i class="fal fa-envelope"></i></a>
                 </div>
                 <div class="itoffcanvas__info-address">
                     <span>Email</span>
                     <a href="maito:hello@yourmail.com">coloringRoll@gmail.com</a>
                 </div>
             </div>
             <div class="it-info-wrapper mb-20 d-flex align-items-center">
                 <div class="itoffcanvas__info-icon">
                     <a href="index-2.html#"><i class="fal fa-phone-alt"></i></a>
                 </div>
                 <div class="itoffcanvas__info-address">
                     <span>Phone</span>
                     <a href="tel:(00)45611227890">(+962) 79 5364 8524</a>
                 </div>
             </div>
             <div class="it-info-wrapper mb-20 d-flex align-items-center">
                 <div class="itoffcanvas__info-icon">
                     <a href="index-2.html#"><i class="fas fa-map-marker-alt"></i></a>
                 </div>
                 <div class="itoffcanvas__info-address">
                     <span>Location</span>
                     <a href="htits://www.google.com/maps/@37.4801311,22.8928877,3z" target="_blank">Amman, Jordan
                     </a>
                 </div>
             </div>
         </div>
     </div>
 </div> --}}
 {{-- <div class="body-overlay"></div> --}}

 <!-- it-offcanvus-area-end -->

 @php
     $isHome = request()->is('home');
 @endphp

 <header class="it-header-height {{ $isHome ? 'it-header-transparent' : '' }}">

     <!-- header-area-start -->
     <div id="header-sticky" class="it-header-area z-index-5 {{ $isHome ? '' : 'it-header-bg' }}">

         <div class="container">
             <div class="row align-items-center">

                 {{-- Logo --}}
                 <div class="col-xl-2 col-6">
                     <div class="it-header-logo">
                         <a href="{{ url('/home') }}">
                             <img src="{{ asset('coloringRoll/img/logo/logo.png') }}" alt="Logo">
                         </a>
                     </div>
                 </div>

                 {{-- Menu --}}
                 <div class="col-xl-7 d-none d-xl-block">
                     <div class="it-header-menu">
                         <nav class="it-menu-content">
                             <ul>
                                 <li class="has-dropdown p-static">
                                     <a href="{{ url('/home') }}">
                                         <span>
                                             <i class="fa-light fa-house fa-lg"></i>
                                         </span>
                                         Home
                                     </a>
                                 </li>

                                 <li class="has-dropdown p-static">
                                     <a href="{{ url('/shop') }}">
                                         <span>
                                             <i class="fa-light fa-palette fa-lg"></i>
                                         </span>
                                         Rolls
                                     </a>
                                 </li>

                                 <li class="has-dropdown p-static">
                                     <a href="{{ url('/gallery') }}">
                                         <span>
                                             <i class="fa-light fa-images"></i>
                                         </span>
                                         Gallery
                                     </a>
                                 </li>

                                 {{-- <li class="has-dropdown">
                                     <a href="#">
                                         <span>
                                             <i class="fa-light fa-file-lines fa-lg"></i>
                                         </span>
                                         Pages
                                     </a>
                                     <ul class="it-submenu submenu">
                                         <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                                         <li><a href="{{ url('/faq') }}">Faq</a></li>
                                         <li><a href="{{ url('/login') }}">Login</a></li>
                                         <li><a href="{{ url('/register') }}">Register</a></li>
                                         <li><a href="{{ url('/shop') }}">Shop</a></li>
                                         <li><a href="{{ url('/shop-details') }}">Shop Details</a></li>
                                         <li><a href="{{ url('/cart') }}">Cart</a></li>
                                         <li><a href="{{ url('/checkout') }}">Checkout</a></li>
                                         <li><a href="{{ url('/404') }}">404</a></li>
                                     </ul>
                                 </li> --}}

                                 <li class="has-dropdown p-static">
                                     <a href="{{ url('/about') }}">
                                         <span>
                                             <i class="fa-light fa-users fa-lg"></i>
                                         </span>
                                         About Us
                                     </a>
                                 </li>

                                 <li>
                                     <a href="{{ url('/contact') }}">
                                         <span>
                                             <i class="fa-light fa-address-book fa-lg"></i>
                                         </span>
                                         Contact Us
                                     </a>
                                 </li>
                             </ul>

                         </nav>
                     </div>
                 </div>

                 {{-- Right Actions --}}
                 <div class="col-xl-3 col-6">
                     <div class="it-header-right d-flex align-items-center justify-content-end">
                         <div class="it-header-button d-none d-xl-block">
                             {{-- <div class="it-header-top-action-box">
                                 
                                 @livewire('coloringroll.cart-badge')

                                 @auth
                                     <li class="user-menu">
                                         <a href="#">
                                             <i class="fa-light fa-user"></i>
                                             <span>{{ Auth::user()->name }}</span>
                                         </a>

                                         <ul class="user-submenu">
                                             <li>
                                                 <a href="{{ route('profile.edit') }}">Profile</a>
                                             </li>
                                             <li>
                                                 <form method="POST" action="{{ route('logout') }}">
                                                     @csrf
                                                     <button type="submit">Logout</button>
                                                 </form>
                                             </li>
                                         </ul>
                                     </li>
                                 @endauth

                             </div> --}}
                             <div class="it-header-top-action-box d-flex align-items-center">

                                 @livewire('coloringroll.cart-badge')

                                 @guest
                                     <a href="{{ route('login') }}" class="it-btn circle-effect ml-20">
                                         <span>
                                             <i class="fa-light fa-user mr-5"></i>
                                             Sign In
                                         </span>
                                     </a>

                                 @endguest

                                 @auth
                                     {{-- <ul class="user-menu ml-20">
                                         <li class="has-dropdown user-dropdown">
                                             <a href="#" class="user-trigger">
                                                 <i class="fa-light fa-user"></i>
                                                 <span class="user-name">{{ Auth::user()->name }}</span>
                                                 <i class="fa-light fa-chevron-down arrow"></i>
                                             </a>

                                             <ul class="user-submenu">
                                                 <li>
                                                     <a href="{{ route('profile.edit') }}">
                                                         <i class="fa-light fa-user-pen"></i>
                                                         Profile
                                                     </a>
                                                 </li>
                                                 <li>
                                                     <form method="POST" action="{{ route('logout') }}">
                                                         @csrf
                                                         <button type="submit" class="logout-btn">
                                                             <i class="fa-light fa-right-from-bracket"></i>
                                                             Logout
                                                         </button>
                                                     </form>
                                                 </li>
                                             </ul>
                                         </li>
                                     </ul> --}}
                                     <div class="user-dropdown">
                                         <button type="button" class="user-trigger" id="userToggle">
                                             <i class="fa-light fa-user"></i>
                                             <span>{{ Auth::user()->name }}</span>
                                             <i class="fa-light fa-chevron-down"></i>
                                         </button>

                                         <div class="user-submenu" id="userMenu">
                                             <a href="{{ route('profile') }}">Profile</a>

                                             <form method="POST" action="{{ route('logout') }}">
                                                 @csrf
                                                 <button type="submit" class="logout-btn">Logout</button>
                                             </form>
                                         </div>
                                     </div>


                                 @endauth

                             </div>


                         </div>
                         <div class="it-header-bar d-xl-none text-end">
                             <button class="it-menu-bar">
                                 <i class="fa-solid fa-bars"></i>
                             </button>
                         </div>
                     </div>
                 </div>

             </div>
         </div>
     </div>
     <!-- header-area-end -->

 </header>
