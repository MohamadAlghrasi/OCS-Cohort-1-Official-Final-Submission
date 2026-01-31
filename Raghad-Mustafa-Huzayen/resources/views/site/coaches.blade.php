@extends('site.layout.master')

@section('content')
 <!-- Background Section with Heading -->
    <div class="section-background" style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('site/images/coachesB.jpeg') }}');
        background-size: cover;
        background-position: center;
        padding: 100px 0;
        margin-bottom: 60px;
    ">
        <div class="container">
            <div class="row justify-content-center text-center text-white">
                <div class="col-md-8">
                    <span class="subheading" style="color: #f23a2e; font-size: 1.2rem;">meet our</span>
                    <h2 class="heading mb-3" style="font-size: 3rem; color: white;"><b>Dodgeball Coaches</b></h2>
                    <p style="font-size: 1.1rem; color: #f0f0f0;"><b>
                       Get to know the professionals who organize and oversee all our dodgeball games.
                    </b></p>
                </div>
            </div>
        </div>
    </div>
<div class="site-section" id="coaches-section">
    
    <div class="container">
        
        <div class="row">
            @foreach($coaches as $coach)
            <div class="col-lg-6 mb-5">
                <div class="d-flex align-items-stretch">
                    <div class="coach-image mr-4" style="flex-shrink: 0;">
                        <img src="{{ asset('storage/' . $coach->image) }}" 
                         alt="{{ $coach->name }}" 
                         class="img-fluid rounded"
                         style="width: 150px; height: 150px; object-fit: cover;"
                         >
                    </div>
                    <div class="coach-content">
                        <h3 class="mb-2">{{ $coach->name }}</h3>
                        <span class="d-block text-primary mb-2">{{ $coach->title }}</span>
                        
                        <div class="mb-3">
                            <span style="color: #black; font-weight: bold;">{{ $coach->experience }} Experience</span>
                            <span style="color: #black; font-weight: bold;">{{ $coach->specialty }}</span>
                        </div>
                        
                        <p>{{ $coach->bio }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection