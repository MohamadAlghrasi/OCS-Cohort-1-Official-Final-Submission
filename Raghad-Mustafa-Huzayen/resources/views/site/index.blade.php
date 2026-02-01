@extends('site.layout.master') 

@section('content')
<div 
  class="intro-section" 
  id="home-section"
  style="

  "
>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12 mx-auto text-center aos-init aos-animate" data-aos="fade-up">
            <h1 class="mb-3">Welcome to Our Family !</h1>
            <p class="lead mx-auto desc mb-5">
              Jordan’s Home for Weekly Dodgeball Games
            </p>
            <p class="text-center">
              <a href="{{ route('games.index') }}" class="btn btn-outline-white py-3 px-5">Join Our Games</a>
            </p>
          </div>
        </div>
      </div>
</div>

<div class="schedule-wrap">
      <div class="d-md-flex align-items-center">
        <div class="hours mr-md-4 mb-4 mb-lg-0">
          <strong class="d-block" style="color: #f23a2e;">Hours</strong>
        </div>
        <div class="cta ml-auto">
          <a href="{{ route('contact') }}" class="smoothscroll d-flex d-md-flex align-items-center btn">
            <span class="mx-auto">  <span>Contact us</span> <span class="arrow icon-keyboard_arrow_right"></span></span>
          </a>
        </div>
      </div>
    </div>
    <!-- ENHANCED STATIC NEWS TICKER -->
<div style="
    background: linear-gradient(90deg, #0f172a 0%, #1e293b 100%);
    color: white;
    padding: 12px 0;
    border-bottom: 3px solid #f23a2e;
">
    <div style="
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
        display: flex;
        align-items: center;
    ">
        
        <!-- Marquee Ticker -->
        <marquee behavior="scroll" direction="left" scrollamount="3" style="
            flex: 1;
            padding-top: 2px;
            font-size: 30px;
            font-weight: 500;
        ">
            <!-- Item 1 -->
            <span style="margin-right: 50px; display: inline-block;">
                <span style=" padding: 6px 10px; border-radius: 12px; 
                    font-size: 30px; font-weight: 800; margin-right: 12px; letter-spacing: 0.5px;"> 
                       ⚡ Watch highlights from our weekly games and tournaments. See why players choose Yalla Dodge for the best dodgeball experience in Jordan! ⚡
                </span>    
            </span>
        </marquee>
    </div>
</div>

<style>
@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

/* Pause on hover */
marquee:hover {
    animation-play-state: paused;
}
</style>

    <!-- ========== VIDEO SECTION RRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRRR========== -->
<section class="video-highlights" style="
    padding: 100px 0;
    position: relative;
    overflow: hidden;
">
    <!-- Background pattern -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 25% 25%, rgba(242, 58, 46, 0.1) 2px, transparent 2px),
            radial-gradient(circle at 75% 75%, rgba(242, 58, 46, 0.1) 2px, transparent 2px);
        background-size: 50px 50px;
        opacity: 0.3;
    "></div>
    
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-10">
                <!-- Section Header -->
                <div style="margin-bottom: 50px;">
                    
                    <h2 style="
                        color: #1e293b;
                        font-size: 3rem;
                        font-weight: 800;
                        margin-bottom: 20px;
                        line-height: 1.2;
                    ">
                        Experience the thrill of 
                        <span style="
                            color: #ef4444;
                            position: relative;
                            display: inline-block;
                        "> Dodgeball 
                        </span> 
                        
                        <p style="
                                color: #1e293b;
                                font-size: 1.1rem;
                                margin-bottom: 0;
                            ">
                               <br> ENJOY THE HIGHLIGHTS OF OUR WEEKLY DODGEBALL GAMES
                            </p>
                    </h2>
                </div>
                
                <!-- Video Player -->
                <div style="
                    max-width: 1000px;
                    margin: 0 auto;
                    border-radius: 20px;
                    overflow: hidden;
                    background: #ffffff;
                    position: relative;
                ">
                    <!-- Video Container -->
                    <div style="position: relative; padding-top: 56.25%;"> <!-- 16:9 Aspect Ratio -->
                        <!-- Video Element -->
                        <video id="mainVideo" 
                            autoplay
                            muted
                            loop
                            playsinline
                            style="
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                background: #1e293b;
                            "
                        >
                            <source src="{{ asset('videos/mainV.mp4') }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                        
                        <!-- Play Button Overlay -->
                        <div id="videoOverlay" style="
                            position: absolute;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background: rgba(0, 0, 0, 0.3);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: all 0.3s;
                            cursor: pointer;
                            opacity: 0;
                            pointer-events: none;
                        ">
                            <div id="playButton" style="
                                width: 100px;
                                height: 100px;
                                background: rgba(242, 58, 46, 0.9);
                                border-radius: 50%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                position: relative;
                                transition: transform 0.3s;
                            ">
                                <svg style="
                                    width: 40px;
                                    height: 40px;
                                    fill: white;
                                    margin-left: 5px;
                                " viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z"></path>
                                </svg>
                            </div>
                        </div>
                        
                        <!-- Unmute Button -->
                        <div id="unmuteButton" style="
                            position: absolute;
                            top: 20px;
                            right: 20px;
                            background: #1e293b;
                            color: white;
                            border: none;
                            border-radius: 50%;
                            width: 50px;
                            height: 50px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            cursor: pointer;
                            font-size: 1.2rem;
                            z-index: 10;
                            transition: all 0.3s;
                        ">
                            🔊
                        </div>
                        
                        <!-- Video Info Overlay -->
                        <div style="
                            position: absolute;
                            bottom: 0;
                            left: 0;
                            width: 100%;
                            padding: 30px;
                            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
                            color: white;
                        ">
                            <p style="
                                color: #cbd5e1;
                                font-size: 1.1rem;
                                margin-bottom: 0;
                            ">
                                Play Hard, Have Fun!
                            </p>
                             <p style="
                                font-weight: 700;
                                color: #f23a2e;
                                margin-top: 10px;
                            ">
                                YALLA DODGE
                            </p>
                        </div>
                    </div>
                    
                    <!-- Video Controls -->
                    <div style="
                        background: #111;
                        padding: 15px 30px;
                        display: flex;
                        align-items: center;
                        gap: 20px;
                    ">
                        <button id="playPauseBtn" style="
                            background: rgba(0, 0, 0, 0.7);
                            border: none;
                            width: 45px;
                            height: 45px;
                            border-radius: 50%;
                            color: white;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-size: 1.2rem;
                            transition: background 0.3s;
                        ">
                            ⏸
                        </button>
                        
                        <!-- Progress Bar -->
                        <div style="flex: 1; position: relative;">
                            <div style="
                                width: 100%;
                                height: 6px;
                                background: #333;
                                border-radius: 3px;
                                overflow: hidden;
                                cursor: pointer;
                            " id="progressContainer">
                                <div id="progressBar" style="
                                    width: 0%;
                                    height: 100%;
                                    background: #f23a2e;
                                    transition: width 0.1s;
                                "></div>
                            </div>
                            
                            <!-- Time Display -->
                            <div style="
                                display: flex;
                                justify-content: space-between;
                                margin-top: 8px;
                            ">
                                <span id="currentTime" style="
                                    color: #94a3b8;
                                    font-size: 0.9rem;
                                    font-family: monospace;
                                ">0:00</span>
                                <span id="duration" style="
                                    color: #94a3b8;
                                    font-size: 0.9rem;
                                    font-family: monospace;
                                ">0:00</span>
                            </div>
                        </div>
                        
                        <!-- Volume Control -->
                        <div style="display: flex; align-items: center; gap: 15px;">
                            <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0" 
                                style="width: 80px; cursor: pointer;">
                            
                            <button id="fullscreenBtn" style="
                                background: none;
                                border: none;
                                color: #94a3b8;
                                cursor: pointer;
                                font-size: 1.2rem;
                                transition: color 0.3s;
                            ">
                                ⛶
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Video Thumbnails -->
                <div style="
                    display: flex;
                    gap: 20px;
                    margin-top: 40px;
                    justify-content: center;
                    flex-wrap: wrap;
                    background: #1e293b;
                    padding: 20px;
                    border-radius: 15px;
                ">
                    <!-- Thumbnail 1 - Connected to friendsV.MP4 -->
                    <div class="video-thumbnail" data-video="{{ asset('videos/friendsV.MP4') }}" 
                         data-title="Ultimate Friends Showdown" 
                         data-description="Watch our friends battle it out in an epic dodgeball match!"
                         style="
                        width: 200px;
                        background: rgba(255, 255, 255, 0.05);
                        border-radius: 10px;
                        overflow: hidden;
                        cursor: pointer;
                        transition: transform 0.3s, background 0.3s;
                    ">
                    
                        <div style="
                            height: 120px;
                            background: linear-gradient(45deg, #1a1a1a, #2a2a2a);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #f23a2e;
                            font-size: 2rem;
                        ">
                            ▶
                        </div>
                        <div style="padding: 15px;">
                            <div style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                margin-bottom: 8px;
                            ">
                                <span style="
                                    background: #f23a2e;
                                    color: white;
                                    padding: 3px 10px;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 600;
                                ">
                                    FEATURED
                                </span>
                                <span style="color: #94a3b8; font-size: 0.9rem;">0:35</span>
                            </div>
                            <h4 style="
                                color: white;
                                font-size: 1rem;
                                margin: 0;
                                font-weight: 600;
                            ">
                                Ultimate Friends Showdown
                            </h4>
                        </div>
                    </div>

                    <!-- Thumbnail 2 - Connected to advicesV.mp4 -->
                    <div class="video-thumbnail" data-video="{{ asset('videos/advicesV.mp4') }}"
                         data-title="Learn to Play Dodgeball" 
                         data-description="Perfect for beginners! Learn the basics from our coaches."
                         style="
                        width: 200px;
                        background: rgba(255, 255, 255, 0.05);
                        border-radius: 10px;
                        overflow: hidden;
                        cursor: pointer;
                        transition: transform 0.3s, background 0.3s;
                    ">
                        <div style="
                            height: 120px;
                            background: linear-gradient(45deg, #1a1a1a, #2a2a2a);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #10b981;
                            font-size: 2rem;
                        ">
                            ▶
                        </div>
                        <div style="padding: 15px;">
                            <div style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                margin-bottom: 8px;
                            ">
                                <span style="
                                    background: #10b981;
                                    color: white;
                                    padding: 3px 10px;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 600;
                                ">
                                    BEGINNERS
                                </span>
                                <span style="color: #94a3b8; font-size: 0.9rem;">0:20</span>
                            </div>
                            <h4 style="
                                color: white;
                                font-size: 1rem;
                                margin: 0;
                                font-weight: 600;
                            ">
                                Learn to Play Dodgeball
                            </h4>
                        </div>
                    </div>

                    <!-- Thumbnail 3 - Connected to tournamentV.mp4 -->
                    <div class="video-thumbnail" data-video="{{ asset('videos/tournamentV.mp4') }}"
                         data-title="Championship Match Highlights" 
                         data-description="The most intense moments from our championship finals!"
                         style="
                        width: 200px;
                        background: rgba(255, 255, 255, 0.05);
                        border-radius: 10px;
                        overflow: hidden;
                        cursor: pointer;
                        transition: transform 0.3s, background 0.3s;
                    ">
                        <div style="
                            height: 120px;
                            background: linear-gradient(45deg, #1a1a1a, #2a2a2a);
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            color: #3b82f6;
                            font-size: 2rem;
                        ">
                            ▶
                        </div>
                        <div style="padding: 15px;">
                            <div style="
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                                margin-bottom: 8px;
                            ">
                                <span style="
                                    background: #3b82f6;
                                    color: white;
                                    padding: 3px 10px;
                                    border-radius: 12px;
                                    font-size: 0.8rem;
                                    font-weight: 600;
                                ">
                                    INTENSE
                                </span>
                                <span style="color: #94a3b8; font-size: 0.9rem;">0:27</span>
                            </div>
                            <h4 style="
                                color: white;
                                font-size: 1rem;
                                margin: 0;
                                font-weight: 600;
                            ">
                                Championship Match Highlights
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Player JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const video = document.getElementById('mainVideo');
    const playPauseBtn = document.getElementById('playPauseBtn');
    const videoOverlay = document.getElementById('videoOverlay');
    const unmuteButton = document.getElementById('unmuteButton');
    const progressBar = document.getElementById('progressBar');
    const progressContainer = document.getElementById('progressContainer');
    const currentTime = document.getElementById('currentTime');
    const duration = document.getElementById('duration');
    const volumeSlider = document.getElementById('volumeSlider');
    const fullscreenBtn = document.getElementById('fullscreenBtn');
    const videoTitle = document.getElementById('videoTitle');
    
    // Format time helper
    function formatTime(seconds) {
        const mins = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${mins}:${secs < 10 ? '0' : ''}${secs}`;
    }
    
    // Update video progress
    video.addEventListener('timeupdate', function() {
        if (video.duration) {
            const progress = (video.currentTime / video.duration) * 100;
            progressBar.style.width = `${progress}%`;
            currentTime.textContent = formatTime(video.currentTime);
        }
    });
    
    // Set duration when video loads
    video.addEventListener('loadedmetadata', function() {
        duration.textContent = formatTime(video.duration);
        // Video should already be playing due to autoplay
        playPauseBtn.textContent = '⏸';
    });
    
    // Toggle play/pause
    function togglePlayPause() {
        if (video.paused) {
            video.play();
            playPauseBtn.textContent = '⏸';
            videoOverlay.style.opacity = '0';
            videoOverlay.style.pointerEvents = 'none';
        } else {
            video.pause();
            playPauseBtn.textContent = '▶';
            videoOverlay.style.opacity = '1';
            videoOverlay.style.pointerEvents = 'auto';
        }
    }
    
    // Unmute functionality
    unmuteButton.addEventListener('click', function() {
        video.muted = !video.muted;
        volumeSlider.value = video.muted ? 0 : 1;
        unmuteButton.textContent = video.muted ? '🔇' : '🔊';
        
        if (!video.muted) {
            unmuteButton.style.background = '#f23a2e';
            unmuteButton.style.transform = 'scale(1.1)';
            setTimeout(() => {
                unmuteButton.style.transform = 'scale(1)';
            }, 300);
        } else {
            unmuteButton.style.background = 'rgba(0, 0, 0, 0.7)';
        }
    });
    
    // Volume control
    volumeSlider.addEventListener('input', function() {
        video.volume = this.value;
        video.muted = this.value == 0;
        unmuteButton.textContent = this.value == 0 ? '🔇' : '🔊';
    });
    
    // Event listeners
    playPauseBtn.addEventListener('click', togglePlayPause);
    videoOverlay.addEventListener('click', togglePlayPause);
    
    // Click on progress bar to seek
    progressContainer.addEventListener('click', function(e) {
        const rect = this.getBoundingClientRect();
        const pos = (e.clientX - rect.left) / rect.width;
        video.currentTime = pos * video.duration;
    });
    
    // Fullscreen
    fullscreenBtn.addEventListener('click', function() {
        const videoContainer = document.querySelector('.video-highlights .container > div');
        if (!document.fullscreenElement) {
            videoContainer.requestFullscreen();
        } else {
            document.exitFullscreen();
        }
    });
    
    // Show overlay when video is paused
    video.addEventListener('pause', function() {
        videoOverlay.style.opacity = '1';
        videoOverlay.style.pointerEvents = 'auto';
    });
    
    video.addEventListener('play', function() {
        videoOverlay.style.opacity = '0';
        videoOverlay.style.pointerEvents = 'none';
    });
    
    // Loop video when it ends
    video.addEventListener('ended', function() {
        video.currentTime = 0;
        video.play();
    });
    
    // ========== THUMBNAIL CLICK FUNCTIONALITY ==========
    const thumbnails = document.querySelectorAll('.video-thumbnail');
    
    thumbnails.forEach(thumb => {
        // Hover effects
        thumb.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
            this.style.background = 'rgba(255, 255, 255, 0.1)';
        });
        
        thumb.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.background = 'rgba(255, 255, 255, 0.05)';
        });
        
        // Click to change video
        thumb.addEventListener('click', function() {
            const videoSrc = this.getAttribute('data-video');
            const title = this.getAttribute('data-title');
            const description = this.querySelector('h4').textContent;
            
            // Change video source
            video.src = videoSrc;
            video.load();
            video.play();
            
            // Update UI
            playPauseBtn.textContent = '⏸';
            videoOverlay.style.opacity = '0';
            videoOverlay.style.pointerEvents = 'none';
            
            // Update video title and info
            videoTitle.textContent = title;
            
            // Highlight active thumbnail
            thumbnails.forEach(t => {
                t.style.border = 'none';
                t.style.boxShadow = 'none';
            });
            
            this.style.border = '2px solid #f23a2e';
            this.style.boxShadow = '0 10px 30px rgba(242, 58, 46, 0.3)';
            
            // Show notification
            showVideoNotification(`Now playing: ${description}`);
        });
    });
    
    // Notification function
    function showVideoNotification(message) {
        // Remove existing notification
        const existingNotification = document.querySelector('.video-notification');
        if (existingNotification) {
            existingNotification.remove();
        }
        
        // Create notification
        const notification = document.createElement('div');
        notification.className = 'video-notification';
        notification.style.cssText = `
            position: fixed;
            top: 20px;
            right: 20px;
            background: #f23a2e;
            color: white;
            padding: 15px 25px;
            border-radius: 10px;
            font-weight: 600;
            z-index: 9999;
            animation: slideInRight 0.3s ease, fadeOut 0.3s ease 2.7s;
            box-shadow: 0 5px 20px rgba(0,0,0,0.3);
        `;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 3000);
    }
    
    // Auto-hide controls after 3 seconds of inactivity
    let controlsTimeout;
    const videoPlayer = document.querySelector('.video-highlights .container > div');
    
    function showControls() {
        const controls = document.querySelector('[style*="background: #111"]');
        if (controls) {
            controls.style.opacity = '1';
            controls.style.pointerEvents = 'auto';
        }
        
        clearTimeout(controlsTimeout);
        controlsTimeout = setTimeout(hideControls, 3000);
    }
    
    function hideControls() {
        const controls = document.querySelector('[style*="background: #111"]');
        if (controls && !video.paused) {
            controls.style.opacity = '0.7';
        }
    }
    
    videoPlayer.addEventListener('mousemove', showControls);
    videoPlayer.addEventListener('click', showControls);
    
    // Initialize controls
    showControls();
});

// Add CSS for notifications
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }
    
    @keyframes pulseUnmute {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(242, 58, 46, 0.7);
        }
        50% {
            transform: scale(1.1);
            box-shadow: 0 0 0 10px rgba(242, 58, 46, 0);
        }
    }
    
    #unmuteButton:hover {
        animation: pulseUnmute 1.5s infinite;
        background: #f23a2e !important;
    }
    
    /* Button hover effects */
    #playPauseBtn:hover {
        background: #ff6b6b !important;
        transform: scale(1.1);
    }
    
    #fullscreenBtn:hover {
        color: white !important;
    }
    
    /* Responsive */
    @media (max-width: 768px) {
        .video-highlights h2 {
            font-size: 2rem !important;
        }
        
        #playButton {
            width: 80px !important;
            height: 80px !important;
        }
        
        .video-thumbnail {
            width: 100% !important;
            margin-bottom: 20px;
        }
    }
`;
document.head.appendChild(style);
</script>

<div class="site-section about-us-section">
  <div class="container">
    <div class="row justify-content-center text-center mb-5">
      <div class="col-md-8 section-heading about-us-content">
        <span class="subheading">know more</span>
        <h2 class="heading mb-3">About Us</h2>
        <p class="about-us-text">
         We are a community-driven platform dedicated to organizing and managing weekly dodgeball games. Our goal is to create a fun, safe, and well-organized environment where players of all skill levels can enjoy the game and stay active.<br>

Our weekly games are designed to bring people together, improve fitness, and encourage teamwork through a fast-paced and exciting sport.<br>Whether you are new to dodgeball or have years of experience, our games are open to everyone.

We work with experienced coaches who focus on fair play, safety, and creating an enjoyable experience for all participants. We also offer private game scheduling, and special events tailored to different groups and occasions.<br>

Our mission is to grow the dodgeball community in Jordan by making the sport more accessible, organized, and enjoyable for everyone.
        </p>
      </div>
    </div>
    
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <p class="text-center">
          <a href="{{ route('games.index') }}" class="btn btn-outline-white py-3 px-5 join-games-btn" style="border: 4px solid #f23a2e;">Join Our Games</a>
        </p>
      </div>
    </div>

    <!-- Slider -->
    <div class="owl-carousel nonloop-block-14 block-14 aos-init aos-animate" data-aos="fade">
      <!-- slider content stays untouched -->
    </div>
  </div>
</div>

    <!-- Slider -->
    <div class="owl-carousel nonloop-block-14 block-14 aos-init aos-animate" data-aos="fade">
      <!-- slider content stays untouched -->
    </div>

  </div>
</div>
<br><br>
<br><br>

<!-- Simple FAQ with Pure CSS - NO BOOTSTRAP -->
<!-- ========== SIMPLE ENHANCED FAQ SECTION ========== -->
<section class="simple-faq" style="
    padding: 80px 0;
    background-image: url('{{ asset('site/images/thumbnail.png') }}');
    background-size: cover;
    background-position: center;
    position: relative;
    overflow: hidden;
">
    <!-- Simple background pattern -->
    <div style="
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 10% 20%, rgba(242, 58, 46, 0.05) 0px, transparent 50%),
            radial-gradient(circle at 90% 80%, rgba(242, 58, 46, 0.05) 0px, transparent 50%);
    "></div>
    
    <div class="container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-lg-10">
                <!-- Simple Header -->
                <div style="margin-bottom: 50px;">
                    
                    
                    <h2 style="
                        color: #1e293b;
                        font-size: 2.5rem;
                        font-weight: 800;
                        margin-bottom: 15px;
                        background: #ffffff;
                        display: inline-block;
                        padding: 10px 20px;
                        border-radius: 10px;

                    ">
                        Frequently Asked <span style="color: #ef4444;">Questions</span>
                    </h2>
                    
                    <p style="
                        color: #ffffff;
                        font-size: 1.1rem;
                        max-width: 600px;
                        margin: 0 auto;
                        line-height: 1.6;
                    ">
                        Get answers to common questions about our dodgeball games
                    </p>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Simple Search -->
                <div style="margin-bottom: 30px;">
                    <div style="position: relative;">
                        <input type="text" id="simpleSearch" placeholder="Type to search questions..." style="
                            width: 100%;
                            padding: 15px 20px;
                            border: 2px solid #ddd;
                            border-radius: 8px;
                            font-size: 1rem;
                            outline: none;
                            transition: all 0.3s;
                        ">
                        <div style="
                            position: absolute;
                            right: 15px;
                            top: 50%;
                            transform: translateY(-50%);
                            color: #999;
                        ">
                            🔍
                        </div>
                    </div>
                </div>
                
                <!-- Simple FAQ Items -->
                <div class="simple-faq-list">
                    <!-- FAQ 1 -->
                    <div class="faq-item-simple" style="
                        background: white;
                        border-radius: 10px;
                        margin-bottom: 15px;
                        overflow: hidden;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                        border: 2px solid transparent;
                        transition: all 0.3s;
                    ">
                        <div class="faq-question-simple" style="
                            padding: 20px;
                            cursor: pointer;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        ">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="
                                    width: 35px;
                                    height: 35px;
                                    background: #f23a2e;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-weight: 700;
                                    font-size: 0.9rem;
                                    flex-shrink: 0;
                                ">
                                    Q1
                                </div>
                                <h3 style="
                                    color: #333;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    margin: 0;
                                ">
                                    Do I need experience to join weekly games?
                                </h3>
                            </div>
                            <div class="faq-icon-simple" style="
                                color: #f23a2e;
                                font-size: 1.2rem;
                                font-weight: bold;
                                transition: transform 0.3s;
                            ">
                                +
                            </div>
                        </div>
                        
                        <div class="faq-answer-simple" style="
                            max-height: 0;
                            overflow: hidden;
                            transition: max-height 0.4s ease;
                        ">
                            <div style="padding: 0 20px 20px 70px;">
                                <div style="
                                    background: #f8f9fa;
                                    padding: 15px;
                                    border-radius: 8px;
                                    border-left: 4px solid #f23a2e;
                                ">
                                    <p style="
                                        color: #555;
                                        margin: 0;
                                        line-height: 1.6;
                                    ">
                                        <strong style="color: #f23a2e;">No experience needed!</strong> Our weekly games are open to players of all skill levels. Our coaches provide rule explanations and warm-up sessions before each game to ensure everyone can participate comfortably and safely.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 2 -->
                    <div class="faq-item-simple" style="
                        background: white;
                        border-radius: 10px;
                        margin-bottom: 15px;
                        overflow: hidden;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                        border: 2px solid transparent;
                        transition: all 0.3s;
                    ">
                        <div class="faq-question-simple" style="
                            padding: 20px;
                            cursor: pointer;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        ">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="
                                    width: 35px;
                                    height: 35px;
                                    background: #f23a2e;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-weight: 700;
                                    font-size: 0.9rem;
                                ">
                                    Q2
                                </div>
                                <h3 style="
                                    color: #333;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    margin: 0;
                                ">
                                    How do I reserve a spot in weekly games?
                                </h3>
                            </div>
                            <div class="faq-icon-simple" style="
                                color: #f23a2e;
                                font-size: 1.2rem;
                                font-weight: bold;
                                transition: transform 0.3s;
                            ">
                                +
                            </div>
                        </div>
                        
                        <div class="faq-answer-simple" style="
                            max-height: 0;
                            overflow: hidden;
                            transition: max-height 0.4s ease;
                        ">
                            <div style="padding: 0 20px 20px 70px;">
                                <div style="
                                    background: #f8f9fa;
                                    padding: 15px;
                                    border-radius: 8px;
                                    border-left: 4px solid #f23a2e;
                                ">
                                    <p style="
                                        color: #555;
                                        margin: 0;
                                        line-height: 1.6;
                                    ">
                                        You can reserve spots through our website on the "Weekly Games" page. Simply select your preferred game, choose the number of players, and complete the reservation. You'll receive a confirmation email with all the details.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 3 -->
                    <div class="faq-item-simple" style="
                        background: white;
                        border-radius: 10px;
                        margin-bottom: 15px;
                        overflow: hidden;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                        border: 2px solid transparent;
                        transition: all 0.3s;
                    ">
                        <div class="faq-question-simple" style="
                            padding: 20px;
                            cursor: pointer;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        ">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="
                                    width: 35px;
                                    height: 35px;
                                    background: #f23a2e;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-weight: 700;
                                    font-size: 0.9rem;
                                ">
                                    Q3
                                </div>
                                <h3 style="
                                    color: #333;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    margin: 0;
                                ">
                                    What should I wear to play dodgeball?
                                </h3>
                            </div>
                            <div class="faq-icon-simple" style="
                                color: #f23a2e;
                                font-size: 1.2rem;
                                font-weight: bold;
                                transition: transform 0.3s;
                            ">
                                +
                            </div>
                        </div>
                        
                        <div class="faq-answer-simple" style="
                            max-height: 0;
                            overflow: hidden;
                            transition: max-height 0.4s ease;
                        ">
                            <div style="padding: 0 20px 20px 70px;">
                                <div style="
                                    background: #f8f9fa;
                                    padding: 15px;
                                    border-radius: 8px;
                                    border-left: 4px solid #f23a2e;
                                ">
                                    <p style="
                                        color: #555;
                                        margin: 0;
                                        line-height: 1.6;
                                    ">
                                        Wear comfortable athletic clothing that allows movement: t-shirt, shorts or athletic pants, and clean indoor sports shoes. We provide the dodgeballs and all necessary equipment.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 4 -->
                    <div class="faq-item-simple" style="
                        background: white;
                        border-radius: 10px;
                        margin-bottom: 15px;
                        overflow: hidden;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                        border: 2px solid transparent;
                        transition: all 0.3s;
                    ">
                        <div class="faq-question-simple" style="
                            padding: 20px;
                            cursor: pointer;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        ">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="
                                    width: 35px;
                                    height: 35px;
                                    background: #f23a2e;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-weight: 700;
                                    font-size: 0.9rem;
                                ">
                                    Q4
                                </div>
                                <h3 style="
                                    color: #333;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    margin: 0;
                                ">
                                    What's the minimum age to play?
                                </h3>
                            </div>
                            <div class="faq-icon-simple" style="
                                color: #f23a2e;
                                font-size: 1.2rem;
                                font-weight: bold;
                                transition: transform 0.3s;
                            ">
                                +
                            </div>
                        </div>
                        
                        <div class="faq-answer-simple" style="
                            max-height: 0;
                            overflow: hidden;
                            transition: max-height 0.4s ease;
                        ">
                            <div style="padding: 0 20px 20px 70px;">
                                <div style="
                                    background: #f8f9fa;
                                    padding: 15px;
                                    border-radius: 8px;
                                    border-left: 4px solid #f23a2e;
                                ">
                                    <p style="
                                        color: #555;
                                        margin: 0;
                                        line-height: 1.6;
                                    ">
                                        Our regular weekly games are for players aged <strong style="color: #f23a2e;">15 and above</strong>. For younger players, we offer special Youth & School Programs designed for different age groups.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 5 -->
                    <div class="faq-item-simple" style="
                        background: white;
                        border-radius: 10px;
                        margin-bottom: 15px;
                        overflow: hidden;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                        border: 2px solid transparent;
                        transition: all 0.3s;
                    ">
                        <div class="faq-question-simple" style="
                            padding: 20px;
                            cursor: pointer;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        ">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="
                                    width: 35px;
                                    height: 35px;
                                    background: #f23a2e;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-weight: 700;
                                    font-size: 0.9rem;
                                ">
                                    Q5
                                </div>
                                <h3 style="
                                    color: #333;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    margin: 0;
                                ">
                                    Can I book a private game for my company/friends?
                                </h3>
                            </div>
                            <div class="faq-icon-simple" style="
                                color: #f23a2e;
                                font-size: 1.2rem;
                                font-weight: bold;
                                transition: transform 0.3s;
                            ">
                                +
                            </div>
                        </div>
                        
                        <div class="faq-answer-simple" style="
                            max-height: 0;
                            overflow: hidden;
                            transition: max-height 0.4s ease;
                        ">
                            <div style="padding: 0 20px 20px 70px;">
                                <div style="
                                    background: #f8f9fa;
                                    padding: 15px;
                                    border-radius: 8px;
                                    border-left: 4px solid #f23a2e;
                                ">
                                    <p style="
                                        color: #555;
                                        margin: 0;
                                        line-height: 1.6;
                                    ">
                                        <strong style="color: #f23a2e;">Absolutely!</strong> We specialize in private games for corporate events, birthdays, team building, and friend groups. Use our "Private Games" booking form on the website.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- FAQ 6 -->
                    <div class="faq-item-simple" style="
                        background: white;
                        border-radius: 10px;
                        margin-bottom: 15px;
                        overflow: hidden;
                        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                        border: 2px solid transparent;
                        transition: all 0.3s;
                    ">
                        <div class="faq-question-simple" style="
                            padding: 20px;
                            cursor: pointer;
                            display: flex;
                            justify-content: space-between;
                            align-items: center;
                        ">
                            <div style="display: flex; align-items: center; gap: 15px;">
                                <div style="
                                    width: 35px;
                                    height: 35px;
                                    background: #f23a2e;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    color: white;
                                    font-weight: 700;
                                    font-size: 0.9rem;
                                ">
                                    Q6
                                </div>
                                <h3 style="
                                    color: #333;
                                    font-size: 1.1rem;
                                    font-weight: 600;
                                    margin: 0;
                                ">
                                    What are the payment options?
                                </h3>
                            </div>
                            <div class="faq-icon-simple" style="
                                color: #f23a2e;
                                font-size: 1.2rem;
                                font-weight: bold;
                                transition: transform 0.3s;
                            ">
                                +
                            </div>
                        </div>
                        
                        <div class="faq-answer-simple" style="
                            max-height: 0;
                            overflow: hidden;
                            transition: max-height 0.4s ease;
                        ">
                            <div style="padding: 0 20px 20px 70px;">
                                <div style="
                                    background: #f8f9fa;
                                    padding: 15px;
                                    border-radius: 8px;
                                    border-left: 4px solid #f23a2e;
                                ">
                                    <p style="
                                        color: #555;
                                        margin: 0;
                                        line-height: 1.6;
                                    ">
                                        We accept cash at the venue, bank transfer, and online payments. For weekly games, payment is made on arrival. For private games, a 50% deposit is required upon booking.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Simple Contact CTA -->
                <div style="
                    text-align: center;
                    margin-top: 40px;
                    padding: 30px;
                    background: white;
                    border-radius: 10px;
                    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
                    border: 2px solid #f23a2e;
                ">
                    <div style="
                        width: 60px;
                        height: 60px;
                        background: #f23a2e;
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin: 0 auto 20px;
                        font-size: 1.5rem;
                        color: white;
                    ">
                        💬
                    </div>
                    
                    <h3 style="
                        color: #333;
                        font-size: 1.5rem;
                        font-weight: 700;
                        margin-bottom: 10px;
                    ">
                        Still have questions?
                    </h3>
                    
                    <p style="
                        color: #666;
                        font-size: 1rem;
                        margin-bottom: 20px;
                    ">
                        Our team is ready to help you!
                    </p>
                    
                    <a href="{{ route('contact') }}" style="
                        display: inline-block;
                        background: #f23a2e;
                        color: white;
                        padding: 12px 30px;
                        border-radius: 5px;
                        text-decoration: none;
                        font-weight: 600;
                        font-size: 1rem;
                        transition: all 0.3s;
                    ">
                        Contact Us Now
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Simple JavaScript for FAQ -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // ========== SIMPLE FAQ TOGGLE ==========
    const faqQuestions = document.querySelectorAll('.faq-question-simple');
    
    faqQuestions.forEach(question => {
        question.addEventListener('click', function() {
            const faqItem = this.parentElement;
            const answer = faqItem.querySelector('.faq-answer-simple');
            const icon = this.querySelector('.faq-icon-simple');
            const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';
            
            // Close all other FAQ items
            document.querySelectorAll('.faq-answer-simple').forEach(ans => {
                if (ans !== answer) {
                    ans.style.maxHeight = '0';
                    ans.parentElement.querySelector('.faq-icon-simple').textContent = '+';
                    ans.parentElement.querySelector('.faq-icon-simple').style.transform = 'rotate(0deg)';
                    ans.parentElement.style.borderColor = 'transparent';
                }
            });
            
            // Toggle current FAQ item
            if (isOpen) {
                answer.style.maxHeight = '0';
                icon.textContent = '+';
                icon.style.transform = 'rotate(0deg)';
                faqItem.style.borderColor = 'transparent';
            } else {
                answer.style.maxHeight = answer.scrollHeight + 'px';
                icon.textContent = '−';
                icon.style.transform = 'rotate(180deg)';
                faqItem.style.borderColor = '#f23a2e';
                
                // Smooth scroll to center the opened FAQ
                setTimeout(() => {
                    faqItem.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }, 100);
            }
        });
    });
    
    // ========== SIMPLE SEARCH ==========
    const searchInput = document.getElementById('simpleSearch');
    const faqItems = document.querySelectorAll('.faq-item-simple');
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        if (searchTerm.length > 0) {
            // Highlight search term
            this.style.borderColor = '#f23a2e';
            this.style.boxShadow = '0 0 0 3px rgba(242, 58, 46, 0.1)';
        } else {
            this.style.borderColor = '#ddd';
            this.style.boxShadow = 'none';
        }
        
        // Filter FAQ items
        faqItems.forEach(item => {
            const question = item.querySelector('h3').textContent.toLowerCase();
            const answer = item.querySelector('p').textContent.toLowerCase();
            
            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = 'block';
                
                // Highlight matching text
                if (searchTerm.length > 0) {
                    item.style.background = '#fff8f8';
                    item.style.borderColor = '#f23a2e';
                } else {
                    item.style.background = 'white';
                    item.style.borderColor = 'transparent';
                }
            } else {
                item.style.display = 'none';
            }
        });
        
        // Show message if no results
        const visibleItems = Array.from(faqItems).filter(item => item.style.display !== 'none');
        if (visibleItems.length === 0 && searchTerm.length > 0) {
            // Show no results message
            const noResults = document.createElement('div');
            noResults.style.cssText = `
                text-align: center;
                padding: 40px;
                color: #666;
                background: white;
                border-radius: 10px;
                margin-bottom: 20px;
            `;
            noResults.innerHTML = `
                <div style="font-size: 3rem; margin-bottom: 15px;">🔍</div>
                <h3 style="color: #333; margin-bottom: 10px;">No results found</h3>
                <p>Try different keywords or <a href="{{ route('contact') }}" style="color: #f23a2e; font-weight: 600;">contact us</a> directly</p>
            `;
            
            const existingMessage = document.querySelector('.no-results-message');
            if (existingMessage) existingMessage.remove();
            
            noResults.className = 'no-results-message';
            document.querySelector('.simple-faq-list').appendChild(noResults);
        } else {
            const existingMessage = document.querySelector('.no-results-message');
            if (existingMessage) existingMessage.remove();
        }
    });
    
    // ========== HOVER EFFECTS ==========
    faqItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-5px)';
            this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.1)';
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.style.borderColor || this.style.borderColor === 'transparent') {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 5px 15px rgba(0,0,0,0.05)';
            }
        });
    });
    
    // ========== AUTO-OPEN FIRST FAQ ON LOAD (Optional) ==========
    // Uncomment if you want first FAQ to be open by default
    // setTimeout(() => {
    //     if (faqQuestions[0]) {
    //         faqQuestions[0].click();
    //     }
    // }, 500);
});
</script>

<!-- Simple CSS Animations -->
<style>
/* Add these styles to your existing CSS */
.simple-faq-list .faq-item-simple {
    transition: all 0.3s ease;
}

.simple-faq-list .faq-question-simple:hover {
    background: #f8f9fa !important;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .simple-faq h2 {
        font-size: 2rem !important;
    }
    
    .faq-question-simple {
        padding: 15px !important;
    }
    
    .faq-answer-simple > div {
        padding: 0 15px 15px 60px !important;
    }
    
    .faq-question-simple h3 {
        font-size: 1rem !important;
    }
}
</style>
@endsection