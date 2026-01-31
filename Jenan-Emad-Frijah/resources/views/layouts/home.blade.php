<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', 'TutorHub')</title>
    <meta name="description" content="@yield('description', 'Connect with expert tutors for personalized learning')">
    
    <!-- Favicons -->
    <link href="{{ asset('assets/home/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets/home/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
      
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/home/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/home/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets/home/css/main.css') }}" rel="stylesheet">
     
    <!-- Page Specific Styles -->
    @yield('styles')


    <style>
    .dropdown {
    list-style: none;
    padding-left: 0;
}

.dropdown-item:hover{
    background-color:  #4C1D95 !important;
    color: #ffffff !important;
}

.dropdown-item {
    background: none !important;
    border: none ;
    width: 100%;
    color: #000 !important;
    text-align: left;
}

    </style>
    @livewireStyles
</head>
<body>
    
    <!-- Header -->
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo d-flex align-items-center">
            <h1 class="sitename">TutorHub</h1>
        </a>

        <!-- Navigation -->
        <nav id="navmenu" class="navmenu d-none d-xl-block mx-auto">
            <ul class="d-flex gap-4 mb-0">
                <li><a href="{{ route('home.index') }}">Home</a></li>
                <li><a href="{{ route('home.about') }}">About</a></li>
                <li><a href="{{ route('home.tutors') }}">Tutors</a></li>
                {{-- <li><a href="{{ route('home.subjects') }}">Subjects</a></li> --}}

                <li><a href="{{ route('home.contact') }}">Contact</a></li>
            </ul>
        </nav>

        <!-- Right Side -->
        <div class="d-flex align-items-center gap-3">
            @guest
                <a class="btn-getstarted" href="{{ route('login') }}">Login</a>
                <a class="btn-getstarted" href="{{ route('user.register_student') }}">Sign Up</a>
            @endguest


         
               @auth
    <li class="dropdown">
        <a href="#"  data-bs-toggle="dropdown">
            <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
            <i class="bi bi-chevron-down ms-1"></i>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a class="dropdown-item {{ request()->routeIs('user.student_profile') ? 'active' : '' }}" 
                   href="{{ route('user.student_profile') }}">
                    <i class="bi bi-person"></i> Profile
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ request()->routeIs('user.student_requests') ? 'active' : '' }}" 
                   href="{{ route('user.student_requests') }}">
                    <i class="bi bi-file-text"></i> My Requests
                </a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </li>
@endauth
        </div>

        <!-- Mobile Toggle -->
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </div>
</header>

    <!-- Main Content -->
    <main id="main">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer id="footer" class="footer position-relative light-background">
        <div class="container footer-top">
            <div class="row gy-4">

                <!-- About Section -->
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                        <span class="sitename">TutorHub</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Ahlam Tower, Abdoun</p>
                        <p>Amman, Jordan</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+962 7 1234 5678</span></p>
                        <p><strong>Email:</strong> <span>info@tutorhub.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="#" aria-label="Twitter"><i class="bi bi-twitter"></i></a>
                        <a href="#" aria-label="Facebook"><i class="bi bi-facebook"></i></a>
                        <a href="#" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <!-- Useful Links -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">About Us</a></li>
                        <li><a href="{{ url('/trainers') }}">Tutors</a></li>
                        <li><a href="{{ url('/courses') }}">Subjects</a></li>
                        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">One-on-One Tutoring</a></li>
                        <li><a href="#">Group Sessions</a></li>
                        <li><a href="#">Online Learning</a></li>
                        <li><a href="#">Exam Preparation</a></li>
                    </ul>
                </div>

                <!-- How It Works -->
                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>How TutorHub Works</h4>
                    <ul>
                        <li>1. Browse tutors by subject & grade</li>
                        <li>2. Book your preferred schedule</li>
                        <li>3. Learn and achieve your goals</li>
                        <li>4. Rate and review your experience</li>
                    </ul>
                </div>

            </div>
        </div>

        <!-- Copyright -->
        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright {{ date('Y') }}</span> <strong class="px-1 sitename">TutorHub</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <a href="{{ url('/privacy') }}">Privacy Policy</a> | 
                <a href="{{ url('/terms') }}">Terms of Service</a>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/home/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/home/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/home/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/home/js/main.js') }}"></script>
    
    <!-- Page Specific Scripts -->
    @yield('scripts')
    @livewireScripts
</body>
</html>
