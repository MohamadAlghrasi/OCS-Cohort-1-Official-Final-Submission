@extends('site.layout.master')

@section('content')
<div class="site-section" id="services-section">
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8 section-heading">
                <span class="subheading" style="color: #f23a2e;">browse our</span>
                <h2 class="heading mb-3">Services</h2>
                <p>From weekly games to private bookings, we offer a complete dodgeball experience for everyone.</p>
            </div>
        </div>
        
        <div class="row">
            @foreach($services as $service)
            <div class="col-lg-4 mb-4 col-md-6">
                <div class="ftco-feature-1 h-100">
                    <span class="icon flaticon">
                        <i class="{{ $service->icon_class }}"></i>
                    </span>
                    <div class="ftco-feature-1-text">
                        <h2>{{ $service->title }}</h2>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- Services Gallery Slider Section -->
<div class="row mt-5 pt-5" id="services-gallery">
    <div class="col-12 text-center mb-5">
        <h2 class="heading mb-3" style="color: #ef4444;"><b>Services Gallery</b></h2>
        <p class="subheading" style="color: #666;"><b>Check out our professional dodgeball services</b></p>
    </div>
    
    <div class="col-12">
        <div class="services-slider-container">
            <div class="services-slider" id="servicesSlider">
                @php
                    $servicesImages = ['services1.png', 'services2.png', 'services3.png', 'services4.png', 'services5.png'];
                @endphp
                
                @foreach($servicesImages as $image)
                <div class="slider-item">
                    <img src="{{ asset('site/images/' . $image) }}" 
                         alt="Dodgeball Service {{ $loop->iteration }}" 
                         class="slider-image"
                         onerror="this.onerror=null; this.src='https://via.placeholder.com/800x500/FF6B6B/FFFFFF?text=Service+{{ $loop->iteration }}'">
                </div>
                @endforeach
            </div>
            
            <!-- Slider Navigation -->
            <button class="slider-nav slider-prev" onclick="servicesPrevSlide()">
                <i class="fas fa-chevron-left"></i>
            </button>
            <button class="slider-nav slider-next" onclick="servicesNextSlide()">
                <i class="fas fa-chevron-right"></i>
            </button>
            
            <!-- Slider Dots -->
            <div class="slider-dots" id="servicesSliderDots"></div>
        </div>
    </div>
</div>

<!-- CSS for Services Slider -->
<style>
.services-slider-container {
    position: relative;
    width: 100%;
    max-width: 900px;
    margin: 0 auto;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    min-height: 500px;
    background: #f5f5f5;
}

.services-slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
    height: 100%;
}

.services-slider .slider-item {
    min-width: 100%;
    height: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
}

.services-slider .slider-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 15px;
    display: block;
}

/* Slider Navigation */
.services-slider-container .slider-nav {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(242, 58, 46, 0.9);
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

.services-slider-container .slider-nav:hover {
    background: #f23a2e;
    transform: translateY(-50%) scale(1.1);
}

.services-slider-container .slider-prev {
    left: 20px;
}

.services-slider-container .slider-next {
    right: 20px;
}

.services-slider-container .slider-nav i {
    font-size: 1.5rem;
}

/* Slider Dots */
.services-slider-container .slider-dots {
    position: absolute;
    bottom: 20px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 10px;
    z-index: 10;
}

.services-slider-container .slider-dots .slider-dot {
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.5);
    cursor: pointer;
    transition: all 0.3s ease;
}

.services-slider-container .slider-dots .slider-dot.active {
    background: #f23a2e;
    transform: scale(1.2);
}

.services-slider-container .slider-dots .slider-dot:hover {
    background: #f23a2e;
}

/* Responsive adjustments */
@media (max-width: 992px) {
    .services-slider-container {
        max-width: 800px;
        min-height: 450px;
    }
}

@media (max-width: 768px) {
    .services-slider-container {
        max-width: 95%;
        min-height: 400px;
    }
    
    .services-slider-container .slider-nav {
        width: 40px;
        height: 40px;
    }
}

@media (max-width: 576px) {
    .services-slider-container {
        min-height: 300px;
    }
    
    .services-slider-container .slider-nav {
        width: 35px;
        height: 35px;
    }
    
    .services-slider-container .slider-prev {
        left: 10px;
    }
    
    .services-slider-container .slider-next {
        right: 10px;
    }
}
</style>

<!-- JavaScript for Services Slider -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.getElementById('servicesSlider');
    const slides = document.querySelectorAll('#servicesSlider .slider-item');
    const dotsContainer = document.getElementById('servicesSliderDots');
    
    if (slides.length === 0) {
        console.log('No slides found for services slider');
        return;
    }
    
    let currentSlide = 0;
    const totalSlides = slides.length;
    
    console.log('Services slider initialized with', totalSlides, 'slides');
    
    // Create dots
    slides.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('slider-dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => servicesGoToSlide(index));
        dotsContainer.appendChild(dot);
    });
    
    const dots = document.querySelectorAll('#servicesSliderDots .slider-dot');
    
    function updateServicesSlider() {
        if (slider && totalSlides > 0) {
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
            
            // Update dots
            dots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }
    }
    
    function servicesNextSlide() {
        if (totalSlides > 0) {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateServicesSlider();
        }
    }
    
    function servicesPrevSlide() {
        if (totalSlides > 0) {
            currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
            updateServicesSlider();
        }
    }
    
    function servicesGoToSlide(index) {
        if (index >= 0 && index < totalSlides) {
            currentSlide = index;
            updateServicesSlider();
        }
    }
    
    // Auto slide every 5 seconds
    let slideInterval;
    if (totalSlides > 1) {
        slideInterval = setInterval(servicesNextSlide, 5000);
        
        // Pause auto-slide on hover
        const sliderContainer = document.querySelector('.services-slider-container');
        if (sliderContainer) {
            sliderContainer.addEventListener('mouseenter', () => {
                clearInterval(slideInterval);
            });
            
            sliderContainer.addEventListener('mouseleave', () => {
                slideInterval = setInterval(servicesNextSlide, 5000);
            });
        }
    }
    
    // Touch swipe support for mobile
    const sliderContainer = document.querySelector('.services-slider-container');
    if (sliderContainer) {
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
                servicesNextSlide();
            } else if (touchEndX - touchStartX > swipeThreshold) {
                servicesPrevSlide();
            }
        }
    }
    
    // Expose functions globally for button onclick events
    window.servicesNextSlide = servicesNextSlide;
    window.servicesPrevSlide = servicesPrevSlide;
    
    // Initialize slider
    updateServicesSlider();
});
</script>
@endsection