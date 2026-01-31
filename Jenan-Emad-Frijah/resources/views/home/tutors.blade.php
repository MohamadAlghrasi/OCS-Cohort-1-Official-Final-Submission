@extends('layouts.home')
@section('title', 'Find Your Perfect Tutor')
@section('styles')
<style>
  .btn-purple {
  background-color: #6f42c1 !important;
  border-color: #6f42c1 !important;
  color: #fff !important;
  width: 40%;
}

.btn-purple:hover {
  background-color: #5a32a3 !important;
  border-color: #5a32a3 !important;
  color: #fff;
}

  .page-item.active .page-link {
    background-color: #4C1D95 !important;
    border-color: #4C1D95 !important;
    color:white !important;
}

</style>
@endsection
@section('content')


  <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
           <div class="col-lg-8">
            <h1>Tutor</h1>
              <p class="mb-0">
    Our expert tutors are here to guide you every step of the way, offering personalized lessons and practical tips to help you succeed.
                </p>
               </div>

          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li class="current">Tutors</li>
          </ol>
        </div>
      </nav>
    </div>
    
    <!-- End Page Title -->

    <!-- Tutors Section -->
    <section id="trainers" class="section trainers">

         <div class="row mb-5 justify-content-center">
      <div class="col-lg-10 mx-auto">
   <livewire:tutor-search />
</div>
      </div>

    </section><!-- /Tutors Section -->
    @endsection