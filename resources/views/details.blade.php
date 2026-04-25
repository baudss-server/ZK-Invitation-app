<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baby Zean's Christening Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="peeking-bear grizzly-peek" style="background-image: url('{{ asset('images/grizzly.png') }}');"></div>
    <div class="peeking-bear icebear-peek" style="background-image: url('{{ asset('images/icebear.png') }}');"></div>
    <div class="peeking-bear pandabear-peek" style="background-image: url('{{ asset('images/panda.png') }}');"></div>

    <div class="page-wrapper" style="max-width: 850px; margin: 0 auto; padding-top: 20px; padding-bottom: 60px;">
        
        <div class="content-card event-details-card">
            
            <h1 style="font-size: 2.8rem;">Event Details</h1>
            <div class="subtitle">Everything you need to know about Baby Zean Kharique's Christening!</div>
            
            <div style="margin: 15px 0 30px;">
                <img src="{{ asset('images/zk.jpg') }}" alt="Baby Zean Kharique" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%; border: 4px solid #6b4d32; box-shadow: 0 8px 15px rgba(0,0,0,0.1);">
            </div>

            <div class="details-box" style="max-width: 100%; margin-bottom: 30px;">
                <h3 style="color: #6b4d32; font-family: 'Fredoka One', cursive; font-size: 1.5rem; margin-bottom: 15px;">⛪ Church Ceremony</h3>
                <p><strong>Church:</strong> Diocesan Shrine and Parish of San Miguel Arcangel San Miguel, Bulacan</p>
                <p><strong>Time:</strong> 11:00 AM</p>
                <div style="margin-top: 15px;">
                    <a href="https://maps.app.goo.gl/LpDcwV6BUXesHKvL6" target="_blank" rel="noopener" class="rsvp-btn" style="padding: 10px 20px; font-size: 1rem; width: auto; background-color: #A4C8E1; color: #333; text-decoration: none; display: inline-block;">
                        📍 Open in Maps
                    </a>
                </div>
                
                <hr style="border: 1px dashed #ccc; margin: 25px 0;">
                
                <h3 style="color: #6b4d32; font-family: 'Fredoka One', cursive; font-size: 1.5rem; margin-bottom: 15px;">🎉 Reception & Party</h3>
                <p><strong>Venue:</strong> ECS3 Farm & Resort - Manggahan sa Riles</p>
                <p><strong>Time:</strong> After the Mass</p>
                <div style="margin-top: 15px;">
                    <a href="https://maps.app.goo.gl/oy7vZDjweotKKbwA6?g_st=afm" target="_blank" rel="noopener" class="rsvp-btn" style="padding: 10px 20px; font-size: 1rem; width: auto; background-color: #A4C8E1; color: #333; text-decoration: none; display: inline-block;">
                        📍 Open Reception in Maps
                    </a>
                </div>

                <hr style="border: 1px dashed #ccc; margin: 25px 0;">

                <h3 style="color: #6b4d32; font-family: 'Fredoka One', cursive; font-size: 1.5rem; margin-bottom: 15px;">📅 Save the Date</h3>
                <p style="font-size: 0.95rem; color: #777; margin-bottom: 18px;">Add Baby Zean's Christening to your calendar.</p>

                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 12px;">
                    <a
                       href="https://calendar.google.com/calendar/render?action=TEMPLATE&text=Baby%20Zean%27s%20Christening&dates=20260524T030000Z/20260524T070000Z&details=Church%20Ceremony%20at%2011%3A00%20AM.%20Reception%20follows%20after%20the%20Mass%20at%20ECS3%20Farm%20%26%20Resort%20-%20Manggahan%20sa%20Riles.&location=Diocesan%20Shrine%20and%20Parish%20of%20San%20Miguel%20Arcangel%20San%20Miguel%2C%20Bulacan"
                        target="_blank"
                        rel="noopener"
                        class="visit-btn"
                        style="width: auto; max-width: 280px; padding: 12px 22px; font-size: 1rem; text-align: center; text-decoration: none;"
                    >
                        📅 Add to Google Calendar
                    </a>

                    <a
                       href="data:text/calendar;charset=utf8,BEGIN:VCALENDAR%0AVERSION:2.0%0ABEGIN:VEVENT%0ASUMMARY:Baby%20Zean%27s%20Christening%0ADTSTART:20260524T030000Z%0ADTEND:20260524T070000Z%0ADESCRIPTION:Church%20Ceremony%20at%2011%3A00%20AM.%20Reception%20follows%20after%20the%20Mass%20at%20ECS3%20Farm%20%26%20Resort%20-%20Manggahan%20sa%20Riles.%0ALOCATION:Diocesan%20Shrine%20and%20Parish%20of%20San%20Miguel%20Arcangel%20San%20Miguel%2C%20Bulacan%0AEND:VEVENT%0AEND:VCALENDAR"
                        download="baby-zean-christening.ics"
                        class="visit-btn"
                        style="width: auto; max-width: 280px; padding: 12px 22px; font-size: 1rem; text-align: center; text-decoration: none;"
                    >
                        🍎 Add to Apple Calendar
                    </a>
                </div>
            </div>

<div class="details-box godparents-box">
    <h3 class="godparents-title">✨ Godparents ✨</h3>
    <p class="godparents-subtitle">To our principal sponsors, thank you for guiding Baby Zean!</p>
    
    <div class="godparents-grid">
        <div class="godparent-card">
            <h4 class="godfather-title">🐻 Godfathers</h4>
            <ul class="godparent-list">
                <li>1. Moraleda, Dale</li>
                <li>2. Ignacio, Louie</li>
                <li>3. Dela Cruz, Rovimil</li>
                <li>4. Estor, Francis</li>
                <li>5. Garcia, Abel</li>
            </ul>
        </div>

        <div class="godparent-card">
            <h4 class="godmother-title">🐼 Godmothers</h4>
            <ul class="godparent-list">
                <li>1. Mallare, Lovelyn</li>
                <li>2. Dela Cruz, Reicel</li>
                <li>3. Manila, Ronalin</li>
                <li>4. Delos Santos, Ella Rica</li>
                <li>5. Reyes, Raiza</li>
            </ul>
        </div>
    </div>
</div>

            <div class="details-box" style="max-width: 100%; margin-bottom: 40px; background-color: #f0f8ff; border-color: #A4C8E1;">
                <h3 style="color: #6b4d32; font-family: 'Fredoka One', cursive; font-size: 1.5rem;">🕊️ A Blessing for Zean</h3>
                <blockquote style="font-family: 'Nunito', sans-serif; font-size: 1.1rem; font-style: italic; color: #555; margin: 20px auto; max-width: 85%; line-height: 1.6;">
                    "Every good and perfect gift is from above, coming down from the Father of the heavenly lights, who does not change like shifting shadows."
                </blockquote>
                <p style="margin: 0; font-weight: bold; color: #6b4d32; font-size: 1.1rem;">- James 1:17 -</p>
            </div>

            <a href="{{ route('invitation') }}" class="rsvp-btn transition-link" style="text-decoration: none; display: inline-block; max-width: 300px; margin: 0 auto;">Return to RSVP</a>
        </div>
    </div>

    <div id="pageLoader" class="page-loader" style="display: flex; opacity: 1;">
        <div class="loader-content">
            <span class="bear-icon" style="font-size: 45px; display: block; margin-bottom: 10px;">🐻🐼❄️</span>
            <h3 style="color: #6b4d32; font-family: 'Fredoka One', cursive; margin: 0 0 15px 0; font-size: 1.5rem;">Loading Details...</h3>
            <div class="loading-bar-container">
                <div class="loading-bar"></div>
            </div>
        </div>
    </div>
</body>
</html>