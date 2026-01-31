@extends('layouts.home')

@section('title', 'About Us')

@section('content')
  <!-- Page Title -->
  <div class="page-title" data-aos="fade">
    <div class="heading">
      <div class="container">
        <div class="row d-flex justify-content-center text-center">
       <div class="col-lg-8">
  <h1>About Us</h1>
  <p class="mb-0">
    Why TutorHub? Because we make learning simple, flexible, and effective by connecting you with the right tutors.
  </p>
</div>


        </div>
      </div>
    </div>
    <nav class="breadcrumbs">
      <div class="container">
        <ol>
          <li><a href="{{ url('/') }}">Home</a></li>
          <li class="current">About Us</li>
        </ol>
      </div>
    </nav>
  </div>

  <!-- About Us Section -->
  <section id="about-us" class="section about-us">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-1 order-lg-2">
          <img src="{{ asset('assets/home/img/about12.png') }}" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 order-2 order-lg-1 content">
          <h3>Welcome to TutorHub : Where Learning Meets Convenience!</h3>
     <ul>
  <li><i class="bi bi-check-circle"></i> Connect with experienced tutors in a variety of subjects anytime, anywhere.</li>
  <li><i class="bi bi-check-circle"></i> Personalized learning tailored to your needs and pace.</li>
  <li><i class="bi bi-check-circle"></i> Safe and user-friendly platform to enhance both teaching and learning experiences.</li>
  <li><i class="bi bi-check-circle"></i> Access high-quality resources and learning materials at your fingertips.</li>
  <li><i class="bi bi-check-circle"></i> Track your progress and improve continuously with tutor feedback.</li>
  <li><i class="bi bi-check-circle"></i> Flexible scheduling to fit your lifestyle and busy routines.</li>
  <li><i class="bi bi-check-circle"></i> Join a supportive learning community and share knowledge with peers.</li>
</ul>

        </div>
      </div>
    </div>
  </section>


  
@endsection