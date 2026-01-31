@extends('layouts.home')
@section('title', 'Course Details')
@section('style')
<style>
 #btn-purple {
    background-color: #6f42c1 !important;
    border-color: #6f42c1 !important;
    color: #fff !important;
    width: 100%;
    padding: 12px;
    font-size: 16px;
    border-radius: 8px;
  }

 #btn-purple:hover {
    background-color: #5a32a3 !important;
    border-color: #5a32a3 !important;
    color: #fff;
  }
</style>
@endsection

@section('content')

<div class="page-title" data-aos="fade">
  <div class="heading">
    <div class="container">
      <div class="row d-flex justify-content-center text-center">
        <div class="col-lg-8">
          <h1>Course Details</h1>
          <p class="mb-0">Explore everything you need to know about this course</p>
        </div>
      </div>
    </div>
  </div>
  <nav class="breadcrumbs">
    <div class="container">
      <ol>
        <li><a href="index.html">Home</a></li>
        <li class="current">Course Details</li>
      </ol>
    </div>
  </nav>
</div>

<section id="courses-course-details" class="courses-course-details section">
  <div class="container" data-aos="fade-up">
    <div class="row">
      <div class="col-lg-8">
        <img src="{{asset('assets/home/img/subject.png')}}" class="img-fluid" alt="{{$subject->name}}">
        <h3>Subject description</h3>
        <p>
            {{$subject->description}}
        </p>
      </div>
      <div class="col-lg-4">
           
          <div class="course-info d-flex justify-content-between align-items-center">
              <h5>Subject</h5>
          <p>{{$subject->name}}</p>
        </div> 

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>tutor</h5>
          <div>
        @forelse($subject->tutors as $tutor)
          <p><a href="{{ route('home.tutor_profile', $tutor->id) }}">{{ $tutor->user->name }}</a></p>
        @empty
          <p class="text-muted">No tutors available.</p>
        @endforelse
      </div>
        </div>

        <div class="course-info d-flex justify-content-between align-items-center">
          <h5>Price Per Hour</h5>
           <div>
        @forelse($subject->tutors as $tutor)
          <p>{{ $tutor->pivot->price_per_hour." JD" ?? 'N/A' }}</p>
        @empty
          <p class="text-muted">N/A</p>
        @endforelse
      </div>
        </div>
      
      <div  class="text-center"  data-bs-toggle="modal" data-bs-target="#requestModal">
        <button href="#"   class="btn btn-primary" 
   style="background-color: #6f42c1; border: none;">Book Now</button>
      </div>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="requestModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-header">
        <h5 class="modal-title">Send Request to Tutor</h5>
       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <div class="modal-body">
        @guest
    
    <div class="text-center py-4">
    <i class="fas fa-lock fa-3x text-warning mb-3"></i>
    <h5>Please Login to Book</h5>
    <p class="text-muted">You need to be logged in to book a session.</p>
    
   <a href="{{ route('login') }}?redirect={{ urlencode(url()->current()) }}" 
   class="btn btn-primary" 
   style="background-color: #6f42c1; border: none;">
    <i class="fas fa-sign-in-alt"></i> Login Now
</a>
    
 <p class="mt-3 mb-0">
        Don't have an account? 
        <a href="{{ route('user.register_student') }}?redirect={{ urlencode(url()->current()) }}" 
           style="color: #6f42c1;">Register here</a>
    </p>
</div>

        @else
          @php
            $user = auth()->user();
            $missingInfo = [];
            
            if (empty($user->phone)) {
              $missingInfo[] = 'phone';
            }
            if (empty($user->location)) {
              $missingInfo[] = 'location';
            }
          @endphp

          @if(count($missingInfo) > 0)
      
            <form action="{{ route('user.quick.update') }}" method="POST">
              @csrf
              @method('PUT')
              
              <div class="alert alert-info">
                <i class="fas fa-info-circle"></i>
                <strong>Almost there!</strong> Please complete your profile to continue.
              </div>

              @if(in_array('phone', $missingInfo))
              <div class="mb-3">
                <label class="form-label">
                  <i class="fas fa-phone"></i> Phone Number <span class="text-danger">*</span>
                </label>
                <input type="text" name="phone" class="form-control" placeholder="+962 7X XXX XXXX" required>
              </div>
              @endif

              @if(in_array('location', $missingInfo))
              <div class="mb-3">
                <label class="form-label">
                  <i class="fas fa-map-marker-alt"></i> Location <span class="text-danger">*</span>
                </label>
                <input type="text" name="location" class="form-control" placeholder="City, Country" required>
              </div>
              @endif

              <input type="hidden" name="redirect_to_booking" value="1">
              <input type="hidden" name="subject_id" value="{{ $subject->id }}">

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" style="background-color: #6f42c1; border:none;">
                  <i class="fas fa-check"></i> Save & Continue
                </button>
              </div>
            </form>
          @else
    
            <form id="requestForm" action="{{ route('home.book',$subject->id) }}" method="POST">
                @csrf
                <input type="hidden" name="tutor_id" value="{{ $tutor->id }}">
                @auth
             <input type="hidden" name="student_id" value="{{ auth()->user()->id }}">
              @endauth
                
              <div class="mb-3">
        <label>Subject</label>
        <input type="text" class="form-control" value="{{ $subject->name }}" readonly>
        <input type="hidden" name="subject_id" value="{{ $subject->id }}">
    </div>


        <div class="mb-3">
          <div class="mb-3">
        <label>Select Tutor</label>
            @foreach($subject->tutors as $tutor)
                <input type="text" class="form-control" value="{{ $tutor->user->name }}" readonly>
            @endforeach
    </div>

                <div class="mb-3">
                    <label>Proposed Date & Time</label>
                    <input type="datetime-local" name="proposed_datetime" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Notes</label>
                    <textarea name="notes" class="form-control" rows="3"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" style="background-color: #5a32a3; border:none;">Send Request</button>
                </div>
            </form>
          @endif
        @endguest
      </div>
      
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>
@if(session('profile_updated'))
  var requestModal = new bootstrap.Modal(document.getElementById('requestModal'));
  requestModal.show();
@endif
</script>
@endsection