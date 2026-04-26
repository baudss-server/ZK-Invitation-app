<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby Zean's Birthday & Christening</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="peeking-bear grizzly-peek" style="background-image: url('{{ asset('images/grizzly.png') }}');"></div>
    <div class="peeking-bear icebear-peek" style="background-image: url('{{ asset('images/icebear.png') }}');"></div>
    <div class="peeking-bear pandabear-peek" style="background-image: url('{{ asset('images/panda.png') }}');"></div>
    
    <div class="page-wrapper">
        <div class="content-card">

            <div class="mobile-header">
                <div style="text-align: center; margin-bottom: 15px;">
                    <img src="{{ asset('images/zk.jpg') }}" alt="Baby Zean Kharique" style="width: 160px; height: 160px; object-fit: cover; border-radius: 50%; border: 4px solid #6b4d32; box-shadow: 0 8px 15px rgba(0,0,0,0.1);">
                </div>
                <h1>Baby Zean's Birthday & Christening!</h1>
                <div class="subtitle">Come celebrate Zean Kharique Santos Lazaro's Birthday & Christening!</div>
            </div>

            <div class="left-column">
                <div class="animated-bear-placeholder">
                    <img src="{{ asset('images/party.gif') }}" alt="We Bare Bears Party Prep" class="bear-prep-gif">
                </div>
                
                <div class="details-box">
                    <p><strong>⛪ Church:</strong> Diocesan Shrine and Parish of San Miguel Arcangel</p>
                    <p><strong>🎉 Reception:</strong> ECS3 Farm & Resort - Manggahan sa Riles</p>
                    <p><strong>📅 When:</strong> May 24, 2026</p>
                    <p><strong>⏰ Time:</strong> 11:00 AM onwards</p>
                </div> 

                <div class="countdown-wrapper">
                    <div class="time-box"><span id="days">00</span><small>Days</small></div>
                    <div class="time-box"><span id="hours">00</span><small>Hours</small></div>
                    <div class="time-box"><span id="minutes">00</span><small>Minutes</small></div>
                    <div class="time-box"><span id="seconds">00</span><small>Seconds</small></div>
                </div>
            </div>

            <div class="right-column">
                
                <div class="desktop-header">
                    <div style="text-align: center; margin-bottom: 15px;">
                        <img src="{{ asset('images/zk.jpg') }}" alt="Baby Zean Kharique" style="width: 160px; height: 160px; object-fit: cover; border-radius: 50%; border: 4px solid #6b4d32; box-shadow: 0 8px 15px rgba(0,0,0,0.1);">
                    </div>
                    <h1>Baby Zean's Christening!</h1>
                    <div class="subtitle">Welcome to the Christian world, Zean Kharique Santos Lazaro!</div>
                </div>

                <form id="rsvpForm" action="{{ route('rsvp.submit') }}" method="POST">
                    @csrf
                    
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>

                    <input type="hidden" name="attendance" value="yes">

                    <div style="display: flex; flex-direction: column; gap: 15px; margin-top: 10px;">
                        <button type="submit" id="submitBtn" class="rsvp-btn">
                            <span class="btn-text">I'm in!</span>
                            <span class="spinner" style="display: none;">⏳</span>
                        </button>
                        
                        <a href="{{ route('event.details') }}" class="visit-btn transition-link" style="text-decoration: none; text-align: center; display: block;">Visit Event Details</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@if(session('success'))
    <div id="toast-success" class="toast">
        <div class="toast-content">
            <span class="toast-icon" style="font-size: 1.5rem;">🥟</span>
            <p class="toast-message" style="font-size: 1.1rem; font-weight: bold; line-height: 1.4;">
                Thank you{{ session('guest_name') ? ', ' . session('guest_name') : '' }}!<br>
                Your Reservation has been received.<br>
                Reserved na shanghai mo! 🥟
            </p>
        </div>
        <button class="toast-close" id="closeToastBtn">&times;</button>
    </div>
@endif

    <div id="pageLoader" class="page-loader" style="display: flex; opacity: 1;">
        <div class="loader-content">
            <span class="bear-icon" style="font-size: 45px; display: block; margin-bottom: 10px;">🐻🐼❄️</span>
            <h3 style="color: #6b4d32; font-family: 'Fredoka One', cursive; margin: 0 0 15px 0; font-size: 1.5rem;">Preparing the Party...</h3>
            <div class="loading-bar-container">
                <div class="loading-bar"></div>
            </div>
        </div>
    </div>
</body>
</html>