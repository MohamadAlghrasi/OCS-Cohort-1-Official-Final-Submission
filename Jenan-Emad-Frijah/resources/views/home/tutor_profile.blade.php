@extends('layouts.home')
@section('title', 'Tutor Profile')
@section('styles')
<style>
body{
    font-size: 16px;
    color: #6f6f6f;
    font-weight: 400;
    line-height: 28px;
    letter-spacing: 0.8px;
    margin-top:20px;
}
.font-size38 {
    font-size: 38px;
}
.team-single-text .section-heading h4,
.section-heading h5 {
    font-size: 36px
}

.team-single-text .section-heading.half {
    margin-bottom: 20px
}

@media screen and (max-width: 1199px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 32px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 15px
    }
}

@media screen and (max-width: 991px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 28px
    }
    .team-single-text .section-heading.half {
        margin-bottom: 10px
    }
}

@media screen and (max-width: 767px) {
    .team-single-text .section-heading h4,
    .section-heading h5 {
        font-size: 24px
    }
}

.team-single-icons ul li {
    display: inline-block;
    border: 1px solid #02c2c7;
    border-radius: 50%;
    color: #86bc42;
    margin-right: 8px;
    margin-bottom: 5px;
    -webkit-transition-duration: .3s;
    transition-duration: .3s
}

.team-single-icons ul li a {
    color: #02c2c7;
    display: block;
    font-size: 14px;
    height: 25px;
    line-height: 26px;
    text-align: center;
    width: 25px
}

.team-single-icons ul li:hover {
    background: #02c2c7;
    border-color: #02c2c7
}

.team-single-icons ul li:hover a {
    color: #fff
}

.team-social-icon li {
    display: inline-block;
    margin-right: 5px
}

.team-social-icon li:last-child {
    margin-right: 0
}

.team-social-icon i {
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    font-size: 15px;
    border-radius: 50px
}

.padding-30px-all {
    padding: 30px;
}
.bg-light-gray {
    background-color: #f7f7f7;
}
.text-center {
    text-align: center!important;
}
#tutor-img{
    max-width: 100%;
    height: auto;
    border-radius: 60%;
}

.list-style9 {
    list-style: none;
    padding: 0
}

.list-style9 li {
    position: relative;
    padding: 0 0 15px 0;
    margin: 0 0 15px 0;
    border-bottom: 1px dashed rgba(0, 0, 0, 0.1)
}

.list-style9 li:last-child {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0
}

.custom-progress {
    height: 10px;
    border-radius: 50px;
    box-shadow: none;
    margin-bottom: 25px;
}
.progress {
    display: -ms-flexbox;
    display: flex;
    height: 1rem;
    overflow: hidden;
    font-size: .75rem;
    background-color: #e9ecef;
    border-radius: .25rem;
}

strong, i{
    color:#4C1D95;
}

.btn-purple {
    background-color: #6f42c1 !important;
    border-color: #6f42c1 !important;
    color: #fff !important;
    width: 60%;
}

.btn-purple:hover {
    background-color: #5a32a3 !important;
    border-color: #5a32a3 !important;
    color: #fff;
}

/* Reviews Section */
.reviews-section {
    background-color: #f8f9fa;
    padding: 40px 0;
    margin-top: 50px;
}

.review-card {
    background: white;
    border-radius: 12px;
    padding: 25px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: transform 0.3s;
}

.review-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.12);
}

.review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.reviewer-name {
    font-weight: 600;
    font-size: 18px;
    color: #4C1D95;
    margin: 0;
}

.review-stars {
    color: #ffc107;
    font-size: 16px;
}

.review-date {
    color: #999;
    font-size: 13px;
    margin-top: 5px;
}

.review-text {
    color: #555;
    line-height: 1.7;
    font-size: 15px;
    margin-bottom: 0;
}

.rating-summary {
    background: linear-gradient(135deg, #6f42c1 0%, #5a32a3 100%);
    color: white;
    padding: 30px;
    border-radius: 12px;
    text-align: center;
    margin-bottom: 30px;
}

.rating-number {
    font-size: 48px;
    font-weight: bold;
    margin-bottom: 10px;
}

.rating-stars-large {
    font-size: 24px;
    color: #ffc107;
    margin-bottom: 10px;
}

.total-reviews {
    font-size: 14px;
    opacity: 0.9;
}

.subject-card {
    transition: all 0.3s;
    border: none;
}

.subject-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(111, 66, 193, 0.2) !important;
}

.subject-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px auto 15px;
    color: white;
    font-size: 24px;
}
</style>
@endsection

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

<form action="{{route('home.tutor_profile', $tutor->id)}}" method="GET">
    @csrf
    <div class="container">
    <div class="team-single">
    <div class="row">
    <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="300">
    <div class="member-img d-flex justify-content-center">
    <img src="{{ $tutor->user->profile_image ? asset('storage/profile_images/' . $tutor->user->profile_image) 
            : asset('storage/profile_images/profile.jpg') }}" alt="Profile Photo"class="img-fluid rounded-circle shadow"
            style="width:180px; height:180px; object-fit:cover;" id="preview-image">
    </div>
    </div>
                
    <div class="col-lg-8 col-md-7 mt-3">
       <div class="team-single-text padding-50px-left sm-no-padding-left">
           <h4 class="font-size38 sm-font-size32 xs-font-size30">{{$tutor->user->name}}</h4>
            <p class="no-margin-bottom">{{$tutor->bio}}</p>
            <div class="contact-info-section margin-40px-tb">
            <ul class="list-style9 no-margin">
            <li>
            <div class="row">
            <div class="col-md-5 col-5"><i class="fas fa-map-marker-alt text-green"></i>
                <strong class="margin-10px-left text-green">Location:</strong></div>
                <div class="col-md-7 col-7"><p>{{$tutor->user->location}}</p></div>
            </div>
            </li>

            <li>
            <div class="row">
            <div class="col-md-5 col-5">
            <i class="fas fa-mobile-alt text-purple"></i>
            <strong class="margin-10px-left xs-margin-four-left text-purple">Phone:</strong>
            </div>
            <div class="col-md-7 col-7">
            <p>{{$tutor->user->phone}}</p>
            </div>
            </div>
            </li>


            <li>
            <div class="row">
            <div class="col-md-5 col-5">
            <i class="fas fa-envelope text-pink"></i>
            <strong class="margin-10px-left xs-margin-four-left text-pink">Email:</strong>
            </div>
            <div class="col-md-7 col-7">
            <p><a>{{$tutor->user->email}}</a></p>
            </div>
           </div>
            </li>
            </ul>
            </div>
            </div>
               </div>
          </div>
        </div>
    </div>
</form>
  
<div class="container mt-4">
    <div class="row mb-5 justify-content-center">
        <div class="col-md-6 text-center">
            <h2 class="mb-4" style="color: #4C1D95; font-weight: bold;">Explore Subjects</h2>
        </div>
    </div>

    <div class="row" id="subjectList">
        @forelse ($tutor->subjects as $subject)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 subject-item">
                <div class="card subject-card h-100 shadow-sm">
                    <div class="subject-icon" style="background: #6D28D9;">
                        <i class="fas fa-book"></i>
                    </div>

                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold">
                            {{ $subject->name }}
                        </h5>

                        <p class="card-text text-muted small mt-2">
                            {{ $subject->description 
                                ? Str::limit($subject->description, 80) 
                                : 'No description available.' }}
                        </p>
                        
                        <a href="{{ route('home.course_details', $subject->id) }}"
                            class="btn btn-purple">
                            View Subject
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No subjects assigned.</p>
            </div>
        @endforelse
    </div>
</div>


<div class="reviews-section">
    <div class="container">
        <div class="row mb-4 justify-content-center">
            <div class="col-md-8 text-center">
                <h2 style="color: #4C1D95; font-weight: bold;">
                     Student Reviews
                </h2>
            </div>
        </div>

        <div class="row">
    
        
            <div class="col-lg-8">
                @forelse($tutor->reviews()->latest()->get() as $review)
                <div class="review-card">
                <div class="review-header">
                <div>
                <h6 class="reviewer-name">
                <i class="fas fa-user-circle"></i> {{ $review->student->name }}
                                </h6>
                                <small class="review-date">
                                    <i class="far fa-clock"></i> {{ $review->created_at->diffForHumans() }}
                                </small>
                            </div>
                        </div>
                        <p class="review-text">
                            "{{ $review->feedback }}"
                        </p>
                    </div>
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No reviews yet. Be the first to leave a review!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection