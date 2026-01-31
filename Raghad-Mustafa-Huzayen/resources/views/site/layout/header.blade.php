<!-- Mobile Menu -->
<div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div>

<!-- Header -->
<header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
    <div class="container-fluid">
        <div class="d-flex align-items-center">

            <!-- Logo -->
            <div class="site-logo">
                <a href="{{ url('/') }}">Yalla Dodge<span>.</span></a>
            </div>

            <!-- Navigation -->
            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li><a href="{{ route('index') }}#home-section" class="nav-link">Home</a></li>
                        <li><a href="{{ route('games.index') }}#classes-section" class="nav-link">Weekly Games</a></li>
                        <li><a href="{{ route('private') }}#schedule-section" class="nav-link">Private Games</a></li>
                        <li><a href="{{ route('coaches.index') }}#trainer-section" class="nav-link">Our Coaches</a></li>
                        <li><a href="{{ route('services.index') }}#services-section" class="nav-link">Services</a></li>
                        <li><a href="{{ route('contact') }}#contact-section" class="nav-link">Contact Us</a></li>
                    </ul>
                </nav>

                <!-- Mobile Toggle -->
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle float-right">
                    <span class="icon-menu h3"></span>
                </a>
            </div>

        </div>
    </div>
</header>
