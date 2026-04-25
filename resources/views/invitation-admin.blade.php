<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitation Admin - Baby Zean's Christening</title>
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin-page">
    <div class="peeking-bear grizzly-peek" style="background-image: url('{{ asset('images/grizzly.png') }}');"></div>
    <div class="peeking-bear icebear-peek" style="background-image: url('{{ asset('images/icebear.png') }}');"></div>
    <div class="peeking-bear pandabear-peek" style="background-image: url('{{ asset('images/panda.png') }}');"></div>

    <div class="page-wrapper admin-wrapper">
        <div class="content-card admin-card">
            <div class="admin-topbar">
                <div>
                    <p class="admin-kicker">Private RSVP Tracker</p>
                    <h1>Invitation Admin</h1>
                    <p class="admin-subtitle">Owner-only view for Baby Zean Kharique's Christening RSVP submissions.</p>
                </div>

                <a href="{{ route('invitation') }}" class="visit-btn admin-home-link">
                    View Invitation
                </a>
            </div>

            <div class="admin-stats-grid">
                <div class="admin-stat-card">
                    <span class="admin-stat-label">Total I'm In Clicks</span>
                    <strong>{{ $totalRsvps }}</strong>
                    <small>Private count only</small>
                </div>

                <div class="admin-stat-card">
                    <span class="admin-stat-label">Latest Submission</span>
                    <strong>
                        @if($rsvps->isNotEmpty())
                            {{ $rsvps->first()->name }}
                        @else
                            None yet
                        @endif
                    </strong>
                    <small>
                        @if($rsvps->isNotEmpty() && $rsvps->first()->created_at)
                            {{ $rsvps->first()->created_at->format('M d, Y • h:i A') }}
                        @else
                            Waiting for guests
                        @endif
                    </small>
                </div>
            </div>

            <div class="admin-list-card">
                <div class="admin-list-header">
                    <div>
                        <h2>Submitted Names</h2>
                        <p>Latest submissions appear first.</p>
                    </div>
                    <span>{{ $totalRsvps }} total</span>
                </div>

                @if($rsvps->isEmpty())
                    <div class="admin-empty-state">
                        <div class="admin-empty-icon">🐻</div>
                        <h3>No RSVP submissions yet.</h3>
                        <p>Once someone clicks “I'm in!”, their name will appear here.</p>
                    </div>
                @else
                    <div class="admin-rsvp-list">
                        @foreach($rsvps as $rsvp)
                            <div class="admin-rsvp-row">
                                <div class="admin-rsvp-avatar">
                                    {{ strtoupper(substr($rsvp->name, 0, 1)) }}
                                </div>

                                <div class="admin-rsvp-info">
                                    <strong>{{ $rsvp->name }}</strong>
                                    <span>
                                        @if($rsvp->created_at)
                                            {{ $rsvp->created_at->format('M d, Y • h:i A') }}
                                        @else
                                            No timestamp available
                                        @endif
                                    </span>
                                </div>

                                <div class="admin-rsvp-status">
                                    I'm In
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div id="pageLoader" class="page-loader" style="display: flex; opacity: 1;">
        <div class="loader-content">
            <span class="bear-icon" style="font-size: 45px; display: block; margin-bottom: 10px;">🐻🐼❄️</span>
            <h3 style="color: #6b4d32; font-family: 'Fredoka One', cursive; margin: 0 0 15px 0; font-size: 1.5rem;">Loading Admin...</h3>
            <div class="loading-bar-container">
                <div class="loading-bar"></div>
            </div>
        </div>
    </div>
</body>
</html>