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
                    <p class="admin-subtitle">Owner-only live view for Baby Zean Kharique's Christening RSVP submissions.</p>
                </div>

                <a href="{{ route('invitation') }}" class="visit-btn admin-home-link">
                    View Invitation
                </a>
            </div>

            <div class="admin-live-pill">
                <span class="admin-live-dot"></span>
                Live tracking active
            </div>

            <div class="admin-stats-grid">
                <div class="admin-stat-card">
                    <span class="admin-stat-label">Total I'm In Clicks</span>
                    <strong id="adminTotalRsvps">{{ $totalRsvps }}</strong>
                    <small>Private count only</small>
                </div>

                <div class="admin-stat-card">
                    <span class="admin-stat-label">Latest Submission</span>
                    <strong id="adminLatestName">
                        @if($rsvps->isNotEmpty())
                            {{ $rsvps->first()->name }}
                        @else
                            None yet
                        @endif
                    </strong>
                    <small id="adminLatestTime">
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
                    <span id="adminTotalBadge">{{ $totalRsvps }} total</span>
                </div>

                <div id="adminEmptyState" class="admin-empty-state" style="{{ $rsvps->isEmpty() ? '' : 'display: none;' }}">
                    <div class="admin-empty-icon">🐻</div>
                    <h3>No RSVP submissions yet.</h3>
                    <p>Once someone clicks “I'm in!”, their name will appear here.</p>
                </div>

                <div id="adminRsvpList" class="admin-rsvp-list" style="{{ $rsvps->isEmpty() ? 'display: none;' : '' }}">
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

    <script>
        const adminKey = @json(request()->query('key'));

        function escapeHtml(value) {
            return String(value)
                .replaceAll('&', '&amp;')
                .replaceAll('<', '&lt;')
                .replaceAll('>', '&gt;')
                .replaceAll('"', '&quot;')
                .replaceAll("'", '&#039;');
        }

        function renderRsvps(data) {
            const totalEl = document.getElementById('adminTotalRsvps');
            const latestNameEl = document.getElementById('adminLatestName');
            const latestTimeEl = document.getElementById('adminLatestTime');
            const totalBadgeEl = document.getElementById('adminTotalBadge');
            const listEl = document.getElementById('adminRsvpList');
            const emptyEl = document.getElementById('adminEmptyState');

            totalEl.textContent = data.total;
            latestNameEl.textContent = data.latest_name;
            latestTimeEl.textContent = data.latest_time;
            totalBadgeEl.textContent = `${data.total} total`;

            if (!data.rsvps || data.rsvps.length === 0) {
                listEl.style.display = 'none';
                emptyEl.style.display = 'block';
                listEl.innerHTML = '';
                return;
            }

            emptyEl.style.display = 'none';
            listEl.style.display = 'flex';

            listEl.innerHTML = data.rsvps.map((rsvp) => {
                const name = escapeHtml(rsvp.name);
                const createdAt = escapeHtml(rsvp.created_at);
                const initial = name.charAt(0).toUpperCase();

                return `
                    <div class="admin-rsvp-row">
                        <div class="admin-rsvp-avatar">${initial}</div>

                        <div class="admin-rsvp-info">
                            <strong>${name}</strong>
                            <span>${createdAt}</span>
                        </div>

                        <div class="admin-rsvp-status">
                            I'm In
                        </div>
                    </div>
                `;
            }).join('');
        }

        async function fetchAdminRsvps() {
            try {
                const response = await fetch(`/invitation-admin/rsvps?key=${encodeURIComponent(adminKey)}`, {
                    headers: {
                        'Accept': 'application/json',
                    },
                    cache: 'no-store',
                });

                if (!response.ok) {
                    return;
                }

                const data = await response.json();
                renderRsvps(data);
            } catch (error) {
                console.warn('Admin RSVP live update failed:', error);
            }
        }

        setInterval(fetchAdminRsvps, 3000);
    </script>
</body>
</html>