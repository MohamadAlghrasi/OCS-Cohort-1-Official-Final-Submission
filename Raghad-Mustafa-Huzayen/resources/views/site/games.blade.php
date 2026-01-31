@extends('site.layout.master')

@section('content')
<div class="site-section" id="classes-section">
    <!-- Background Section with Heading -->
    <div class="section-background" style="
        background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('{{ asset('site/images/weeklyB.PNG') }}');
        background-size: cover;
        background-position: center;
        padding: 100px 0;
        margin-bottom: 60px;
    ">
        <div class="container">
            <div class="row justify-content-center text-center text-white">
                <div class="col-md-8">
                    <span class="subheading" style="color: #f23a2e; font-size: 1.2rem;">our weekly</span>
                    <h2 class="heading mb-3" style="font-size: 3rem; color: white;"><b>Dodgeball Games</b></h2>
                    <p style="font-size: 1.1rem; color: #f0f0f0;"><b>
                        Participate in our weekly dodgeball games. Check the schedule below and reserve your spot in just a few clicks! All skill levels are welcome.
                    </b></p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row">
            <!-- Left Column: International Academy Amman -->
            <div class="col-lg-6">
                <h3 class="location-heading mb-4">
                    <i class="fas fa-map-marker-alt"></i> International Academy Amman
                </h3>
                
                @forelse($games->where('location', 'International Academy Amman') as $game)
                <div class="game-card mb-4">
                    <div class="game-header">
                        <h4>
                            <a href="{{ route('reservation.create', $game->id) }}">
                                {{ $game->date->format('l, F j') }} Game
                            </a>
                        </h4>
                        <span class="game-time">
                            <i class="fas fa-clock"></i> 
                            {{ \Carbon\Carbon::parse($game->time)->format('g:i A') }}
                        </span>
                    </div>
                    <div class="game-body">
                        <p class="game-info">
                            <i class="fas fa-users"></i> 
                            Players: {{ $game->registered_players }}/{{ $game->max_players }}
                        </p>
                        <p class="game-info">
                            <i class="fas fa-money-bill"></i> 
                            Price: {{ $game->price ? 'JOD ' . $game->price : 'Free' }}
                        </p>
                        @if($game->description)
                        <p class="game-description">{{ $game->description }}</p>
                        @endif
                    </div>
                    <div class="game-footer">
                        <a href="{{ route('reservation.create', $game->id) }}" class="btn btn-primary">
                            <i class="fas fa-calendar-plus"></i> Reserve Spot
                        </a>
                        <span class="available-spots">
                            {{ $game->max_players - $game->registered_players }} spots left
                        </span>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No upcoming games at International Academy Amman.
                </div>
                @endforelse
            </div>
            
            <!-- Right Column: Islamic Educational College -->
            <div class="col-lg-6">
                <h3 class="location-heading mb-4">
                    <i class="fas fa-map-marker-alt"></i> Islamic Educational College
                </h3>
                
                @forelse($games->where('location', 'Islamic Educational College') as $game)
                <div class="game-card mb-4">
                    <div class="game-header">
                        <h4>
                            <a href="{{ route('reservation.create', $game->id) }}">
                                {{ $game->date->format('l, F j') }} Game
                            </a>
                        </h4>
                        <span class="game-time">
                            <i class="fas fa-clock"></i> 
                            {{ \Carbon\Carbon::parse($game->time)->format('g:i A') }}
                        </span>
                    </div>
                    <div class="game-body">
                        <p class="game-info">
                            <i class="fas fa-users"></i> 
                            Players: {{ $game->registered_players }}/{{ $game->max_players }}
                        </p>
                        <p class="game-info">
                            <i class="fas fa-money-bill"></i> 
                            Price: {{ $game->price ? 'JOD ' . $game->price : 'Free' }}
                        </p>
                        @if($game->description)
                        <p class="game-description">{{ $game->description }}</p>
                        @endif
                    </div>
                    <div class="game-footer">
                        <a href="{{ route('reservation.create', $game->id) }}" class="btn btn-primary">
                            <i class="fas fa-calendar-plus"></i> Reserve Spot
                        </a>
                        <span class="available-spots">
                            {{ $game->max_players - $game->registered_players }} spots left
                        </span>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">
                    <i class="fas fa-info-circle"></i> No upcoming games at Islamic Educational College.
                </div>
                @endforelse
            </div>
        </div>
        
        <!-- Weekly Games Gallery Slider Section -->
        <div class="row mt-5 pt-5" id="weekly-gallery">
            <div class="col-12 text-center mb-5">
                <h2 class="heading mb-3" style="color: #ef4444;"><b>Weekly Games Gallery</b></h2>
                <p class="subheading" style="color: #666;">Check out photos from our weekly dodgeball sessions</p>
            </div>
            
            <div class="col-12">
                <div class="weekly-slider-container">
                    <div class="weekly-slider" id="weeklySlider">
                        @php
                            $weeklyImages = ['weekly1.PNG', 'weekly2.PNG', 'weekly3.PNG', 'weekly4.PNG', 'weekly5.PNG', 'weekly6.PNG', 'weekly7.PNG', 'weekly8.PNG'];
                        @endphp
                        
                        @foreach($weeklyImages as $image)
                        <div class="slider-item">
                            <img src="{{ asset('site/images/' . $image) }}" 
                                 alt="Weekly Dodgeball Game" 
                                 class="slider-image"
                                 onerror="this.src='https://via.placeholder.com/800x500?text=Dodgeball+Game'">
                        </div>
                        @endforeach
                    </div>
                    
                    <!-- Slider Navigation -->
                    <button class="slider-nav slider-prev" onclick="prevSlide()">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="slider-nav slider-next" onclick="nextSlide()">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                    
                    <!-- Slider Dots -->
                    <div class="slider-dots" id="sliderDots"></div>
                </div>
            </div>
        </div>
        
        <!-- Add CSS for the game cards and slider -->
        <style>
        .game-card {
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            padding: 20px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .game-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }
        .game-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            border-bottom: 2px solid #f23a2e;
            padding-bottom: 10px;
        }
        .game-header h4 {
            margin: 0;
            color: #333;
        }
        .game-header a {
            color: #333;
            text-decoration: none;
        }
        .game-header a:hover {
            color: #f23a2e;
        }
        .game-time {
            color: #666;
            font-size: 0.9rem;
        }
        .game-body {
            margin-bottom: 15px;
        }
        .game-info {
            margin: 5px 0;
            color: #555;
        }
        .game-description {
            font-style: italic;
            color: #777;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px dashed #ddd;
        }
        .game-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        .available-spots {
            color: #f23a2e;
            font-weight: bold;
        }
        .location-heading {
            color: #333;
            border-bottom: 3px solid #f23a2e;
            padding-bottom: 10px;
        }
        
        /* Slider Styles */
        .weekly-slider-container {
            position: relative;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            overflow: hidden;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        
        .weekly-slider {
            display: flex;
            transition: transform 0.5s ease-in-out;
            height: 500px;
        }
        
        .slider-item {
            min-width: 100%;
            height: 100%;
            position: relative;
        }
        
        .slider-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 15px;
        }
        
        /* Slider Navigation */
        .slider-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(242, 58, 46, 0.8);
            color: white;
            border: none;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .slider-nav:hover {
            background: #f23a2e;
            transform: translateY(-50%) scale(1.1);
        }
        
        .slider-prev {
            left: 20px;
        }
        
        .slider-next {
            right: 20px;
        }
        
        .slider-nav i {
            font-size: 1.5rem;
        }
        
        /* Slider Dots */
        .slider-dots {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            display: flex;
            justify-content: center;
            gap: 10px;
            z-index: 10;
        }
        
        .slider-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .slider-dot.active {
            background: #f23a2e;
            transform: scale(1.2);
        }
        
        .slider-dot:hover {
            background: #f23a2e;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .weekly-slider-container {
                max-width: 800px;
            }
            
            .weekly-slider {
                height: 450px;
            }
        }
        
        @media (max-width: 768px) {
            .section-background {
                padding: 60px 0;
            }
            .section-background h2.heading {
                font-size: 2.5rem;
            }
            
            .weekly-slider-container {
                max-width: 95%;
            }
            
            .weekly-slider {
                height: 400px;
            }
            
            .slider-nav {
                width: 40px;
                height: 40px;
            }
        }
        
        @media (max-width: 576px) {
            .section-background {
                padding: 40px 0;
            }
            .section-background h2.heading {
                font-size: 2rem;
            }
            
            .weekly-slider {
                height: 300px;
            }
            
            .slider-nav {
                width: 35px;
                height: 35px;
            }
            
            .slider-prev {
                left: 10px;
            }
            
            .slider-next {
                right: 10px;
            }
        }
        </style>
    </div>
</div>

<!-- JavaScript for Slider -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('weeklySlider');
    const slides = document.querySelectorAll('.slider-item');
    const dotsContainer = document.getElementById('sliderDots');
    let currentSlide = 0;
    const totalSlides = slides.length;
    
    // Create dots
    slides.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('slider-dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(index));
        dotsContainer.appendChild(dot);
    });
    
    const dots = document.querySelectorAll('.slider-dot');
    
    function updateSlider() {
        slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        
        // Update dots
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }
    
    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateSlider();
    }
    
    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateSlider();
    }
    
    function goToSlide(index) {
        currentSlide = index;
        updateSlider();
    }
    
    // Auto slide every 5 seconds
    let slideInterval = setInterval(nextSlide, 5000);
    
    // Pause auto-slide on hover
    const sliderContainer = document.querySelector('.weekly-slider-container');
    sliderContainer.addEventListener('mouseenter', () => clearInterval(slideInterval));
    sliderContainer.addEventListener('mouseleave', () => {
        slideInterval = setInterval(nextSlide, 5000);
    });
    
    // Touch swipe support for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    sliderContainer.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    });
    
    sliderContainer.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        
        if (touchStartX - touchEndX > swipeThreshold) {
            // Swipe left - next slide
            nextSlide();
        } else if (touchEndX - touchStartX > swipeThreshold) {
            // Swipe right - previous slide
            prevSlide();
        }
    }
    
    // Expose functions globally for button onclick events
    window.nextSlide = nextSlide;
    window.prevSlide = prevSlide;
});
</script>
@endsection