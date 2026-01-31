<!DOCTYPE html>
<html lang="en">
@include('site.layout.head')
<body data-spy="scroll" data-target="site-navbar-target" data-offset="300">
<div class="site-wrap">
    @include('site.layout.header')
    <!-- DEBUG TEST - Can you see this? -->
<div style="background: red; color: white; padding: 20px; text-align: center; font-weight: bold;">
    ⚠️ DEBUG TEST: If you can see this red box, then HTML is loading!
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
                    font-size: 20px; font-weight: 800; margin-right: 12px; letter-spacing: 0.5px;">
                    🔴 
                </span>
                <strong style="color: #white;">JOIN OUR WEEKLY DODGEBALL GAMES</strong> 
            </span>
            
            <!-- Item 2 -->
            <span style="margin-right: 50px; display: inline-block;">
                <span style=" padding: 6px 10px; border-radius: 12px; 
                    font-size: 20px; font-weight: 800; margin-right: 12px; letter-spacing: 0.5px;">
                    🔴 
                </span>
                <strong style="color: #white;">GET READY TO THE BIGGEST DODGEBALL EVENT!</strong> 
            </span>
            
            <!-- Item 3 -->
            <span style="margin-right: 50px; display: inline-block;">
                <span style=" padding: 6px 10px; border-radius: 12px; 
                    font-size: 20px; font-weight: 800; margin-right: 12px; letter-spacing: 0.5px;">
                    🔴 
                </span>
                <strong style="color: #white;"> NO EXPERIENCE NEEDED</strong> 
            </span>
            
            <!-- Item 4 -->
            <span style="margin-right: 50px; display: inline-block;">
                <span style=" padding: 6px 10px; border-radius: 12px; 
                    font-size: 20px; font-weight: 800; margin-right: 12px; letter-spacing: 0.5px;">
                    🔴 
                </span>
                <strong style="color: #white;">NOW AVAILABLE AT ISLAMIC EDUCATIONAL COLLEGE (JUBAIHA)</strong> 
            </span>
            
            <!-- Item 5 -->
            <span style="margin-right: 50px; display: inline-block;">
                <span style="background: #white; padding: 3px 10px; border-radius: 12px; 
                    font-size: 20px; font-weight: 800; margin-right: 12px; letter-spacing: 0.5px;">
                    🔴
                </span>
                <strong style="color: #white;">JOIN 150+ PLAYERS IN JORDAN'S LARGEST DODGEBALL COMMUNITY</strong> 
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

    @yield('content')

    @include('site.layout.footer')
</div>    

</body>
</html>