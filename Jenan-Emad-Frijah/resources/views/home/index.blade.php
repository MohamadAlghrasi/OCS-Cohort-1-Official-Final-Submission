@extends('layouts.home')

@section('title', 'Home Page')




<style>

:root {
  --primary-purple: #6f42c1;
  --dark-purple: #5a32a3;
  --light-purple: #9775fa;
  --purple-gradient-start: #667eea;
  --purple-gradient-end: #764ba2;
}

.btn-purple {
  --bs-btn-bg: var(--primary-purple);      
  --bs-btn-border-color: var(--primary-purple);
  --bs-btn-hover-bg: var(--dark-purple); 
  --bs-btn-hover-border-color: var(--dark-purple);
  --bs-btn-color: #fff;
}


.section {
  padding: 80px 0;
}

.section-title {
  margin-bottom: 50px;
}


.icon-box i {
  color: var(--primary-purple) !important;
}

.features-item i {
  font-size: 2.5rem;
}
</style>
@section('content')


<section id="hero" class="hero section dark-background">
  <img src="{{ asset('assets/home/img/hero1.jpg') }}" alt="" data-aos="fade-in">
  <div class="container">
    <h2 data-aos="fade-up" data-aos-delay="100">Find Your Perfect Tutor Today</h2>
    <p data-aos="fade-up" data-aos-delay="200">Connect with expert tutors for personalized learning experiences</p>
    <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
      <a href="{{ route('home.tutors') }}" class="btn-get-started me-3">Browse Tutors</a>
    </div>
  </div>
</section>


<section id="why-us" class="section why-us">
  <div class="container">
    <div class="row gy-4">
      
      <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
        <div class="why-box">
          <h3>Why Choose Tutor Hub?</h3>
          <p>
            Tutor Hub makes it easy to connect with qualified and reliable tutors in different subjects.
            Our platform is simple to use and designed to support your learning needs.
          </p>
          <p>
            You can explore clear tutor profiles, compare options, and choose the tutor that fits your goals.
            With Tutor Hub, learning becomes more flexible, effective, and accessible.
          </p>
          <div class="text-center mt-4">
            <a href="{{route('home.about')}}" class="more-btn">
              <span>Learn More</span> <i class="bi bi-chevron-right"></i>
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-8 d-flex align-items-stretch">
        <div class="row gy-8" data-aos="fade-up" data-aos-delay="200">

          <div class="col-xl-4">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-clipboard-data"></i>
              <h4>Easy & Efficient Platform</h4>
              <p>Find tutors, schedule sessions, and learn without any hassle.</p>
            </div>
          </div>

          <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300"> 
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-gem"></i>
              <h4>High Quality Education</h4>
              <p>Learn from carefully selected tutors who deliver professional and effective teaching.</p>
            </div>
          </div>

          <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box d-flex flex-column justify-content-center align-items-center">
              <i class="bi bi-inboxes"></i>
              <h4>All Subjects in One Place</h4>
              <p>Access a wide range of subjects and find the right tutor for your academic needs.</p>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>


<section id="features" class="features section" style="background-color: #f8f9fa;">
  <div class="container section-title" data-aos="fade-up">
    <h2>Features</h2>
    <p>What Makes Us Special</p>
  </div>

  <div class="container">
    <div class="row gy-4">

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="100">
        <div class="features-item">
          <i class="bi bi-search" style="color: #6f42c1;"></i>
          <h3><a href="" class="stretched-link">Find Tutors Easily</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="200">
        <div class="features-item">
          <i class="bi bi-clock" style="color: #8b5cf6;"></i>
          <h3><a href="" class="stretched-link">Flexible Scheduling</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="300">
        <div class="features-item">
          <i class="bi bi-mortarboard" style="color: #a78bfa;"></i>
          <h3><a href="" class="stretched-link">Qualified Tutors</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="400">
        <div class="features-item">
          <i class="bi bi-chat-dots" style="color: #7c3aed;"></i>
          <h3><a href="" class="stretched-link">Direct Communication</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="500">
        <div class="features-item">
          <i class="bi bi-shield-check" style="color: #6d28d9;"></i>
          <h3><a href="" class="stretched-link">Safe & Secure</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="600">
        <div class="features-item">
          <i class="bi bi-star" style="color: #9333ea;"></i>
          <h3><a href="" class="stretched-link">Top Reviews</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="700">
        <div class="features-item">
          <i class="bi bi-book" style="color: #a855f7;"></i>
          <h3><a href="" class="stretched-link">Wide Subject Range</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="800">
        <div class="features-item">
          <i class="bi bi-camera-video" style="color: #6f42c1;"></i>
          <h3><a href="" class="stretched-link">Easy Booking</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="900">
        <div class="features-item">
          <i class="bi bi-people" style="color: #8b5cf6;"></i>
          <h3><a href="" class="stretched-link">Community Support</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1000">
        <div class="features-item">
          <i class="bi bi-lightbulb" style="color: #a78bfa;"></i>
          <h3><a href="" class="stretched-link">Personalized Learning</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1100">
        <div class="features-item">
          <i class="bi bi-calendar-check" style="color: #7c3aed;"></i>
          <h3><a href="" class="stretched-link">Interactive Learning</a></h3>
        </div>
      </div>

      <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="1200">
        <div class="features-item">
          <i class="bi bi-trophy" style="color: #6d28d9;"></i>
          <h3><a href="" class="stretched-link">Achieve Goals</a></h3>
        </div>
      </div>

    </div>
  </div>
</section>


<section id="how-it-works" class="section">
  <div class="container section-title" data-aos="fade-up">
    <h2>How It Works</h2>
    <p>Get Started in 3 Simple Steps</p>
  </div>

  <div class="container">
    <div class="row gy-5">
      
      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
        <div class="text-center p-4">
          <div class="icon-box mb-4">
            <i class="bi bi-person-plus" style="font-size: 4rem; color: #6f42c1;"></i>
          </div>
          <h4 class="mb-3">1. Create Account</h4>
          <p class="text-muted">Sign up as a student or tutor in minutes. Fill in your profile and preferences to get started.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
        <div class="text-center p-4">
          <div class="icon-box mb-4">
            <i class="bi bi-search" style="font-size: 4rem; color: #6f42c1;"></i>
          </div>
          <h4 class="mb-3">2. Find Your Tutor</h4>
          <p class="text-muted">Browse through qualified tutors, check their profiles, ratings, and reviews to find the perfect match.</p>
        </div>
      </div>

      <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
        <div class="text-center p-4">
          <div class="icon-box mb-4">
            <i class="bi bi-calendar-check" style="font-size: 4rem; color: #6f42c1;"></i>
          </div>
          <h4 class="mb-3">3. Book & Learn</h4>
          <p class="text-muted">Schedule your sessions at your convenience. Learn at your own pace and achieve your academic goals.</p>
        </div>
      </div>

    </div>
  </div>
</section>

<section id="faq" class="faq section" style="background-color: #f8f9fa;">
  <div class="container section-title" data-aos="fade-up">
    <h2>FAQ</h2>
    <p>Frequently Asked Questions</p>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">

        <div class="accordion" id="faqAccordion" data-aos="fade-up">
          
          <div class="accordion-item mb-3 border-0 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1" style="background-color: #f8f9fa;">
                How do I book a tutor?
              </button>
            </h2>
            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Simply browse our tutor profiles, select a tutor that matches your needs, and click "Book Now". Choose your preferred date and time, and you're all set!
              </div>
            </div>
          </div>

          <div class="accordion-item mb-3 border-0 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                What subjects are available?
              </button>
            </h2>
            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                We offer tutoring in Mathematics, Physics, Chemistry, Biology, English, Arabic, Computer Science, and more. Check our subjects page for the full list.
              </div>
            </div>
          </div>

          <div class="accordion-item mb-3 border-0 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                Can I cancel or reschedule a session?
              </button>
            </h2>
            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Yes! You can cancel or reschedule up to 24 hours before your session without any penalty. Contact support for assistance.
              </div>
            </div>
          </div>

          <div class="accordion-item mb-3 border-0 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                How much does it cost?
              </button>
            </h2>
            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                Pricing varies by tutor experience and subject. Rates typically range from 10-30 JOD per hour. Check individual tutor profiles for exact pricing.
              </div>
            </div>
          </div>

          <div class="accordion-item mb-3 border-0 shadow-sm">
            <h2 class="accordion-header">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                Are sessions online or in-person?
              </button>
            </h2>
            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
              <div class="accordion-body">
                We offer both! You can choose online sessions via video call or arrange in-person meetings based on tutor availability and your location.
              </div>
            </div>
          </div>

        </div>

      </div>
    </div>
  </div>
</section>


@endsection

@section('scripts')
<script src="https://unpkg.com/@srexi/purecounterjs/dist/purecounter_vanilla.js"></script>
@endsection