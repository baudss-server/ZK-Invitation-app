import './bootstrap';

document.addEventListener('DOMContentLoaded', function() {

    // --- 0. INITIAL PAGE LOAD LOADER (BAGONG ADD!) ---
    const pageLoader = document.getElementById('pageLoader');
    if (pageLoader) {
        // Pagkatapos ng 1 segundo (pagka-fill ng bar), fade out ang loader
        setTimeout(() => {
            pageLoader.style.opacity = '0';
            setTimeout(() => {
                pageLoader.style.display = 'none'; // Tuluyang itago para hindi makaharang sa clicks
            }, 300); // 300ms transition
        }, 1000); 
    }

    // --- 1. LIVE COUNTDOWN TIMER LOGIC ---
    const countdownDate = new Date("2026-05-24T15:00:00+08:00").getTime();
    const timerInterval = setInterval(function() {
        const now = new Date().getTime();
        const distance = countdownDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        const daysEl = document.getElementById("days");
        if(daysEl) {
            daysEl.innerText = days < 10 ? '0' + days : days;
            document.getElementById("hours").innerText = hours < 10 ? '0' + hours : hours;
            document.getElementById("minutes").innerText = minutes < 10 ? '0' + minutes : minutes;
            document.getElementById("seconds").innerText = seconds < 10 ? '0' + seconds : seconds;

            if (distance < 0) {
                clearInterval(timerInterval);
                document.querySelector('.countdown-wrapper').innerHTML = "<h3>The Party has Started! 🎈</h3>";
            }
        }
    }, 1000);

    // --- 2. SMART SUBMIT BUTTON LOGIC ---
    const form = document.getElementById('rsvpForm');
    if(form) {
        form.addEventListener('submit', function() {
            const btn = document.getElementById('submitBtn');
            const btnText = btn.querySelector('.btn-text');
            const spinner = btn.querySelector('.spinner');

            btn.disabled = true;
            btnText.innerText = "SENDING...";
            spinner.style.display = "inline-block";
        });
    }

    // --- 3. TOAST AUTO-CLOSE ---
    const toast = document.getElementById('toast-success');
    const closeToastBtn = document.getElementById('closeToastBtn');
    if (toast) {
        if(closeToastBtn) {
            closeToastBtn.addEventListener('click', function() { toast.style.display = 'none'; });
        }
        setTimeout(() => { toast.remove(); }, 3500);
    }

    // --- 4. PAGE TRANSITION LOADER (PARA SA MGA BUTTONS) ---
    const transitionLinks = document.querySelectorAll('.transition-link');
    if (transitionLinks.length > 0 && pageLoader) {
        transitionLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); 
                const targetUrl = this.href;

                pageLoader.style.display = 'flex';
                setTimeout(() => { pageLoader.style.opacity = '1'; }, 10);
                setTimeout(() => { window.location.href = targetUrl; }, 1000); 
            });
        });
    }
});

// Ito ay para siguraduhing hindi stuck ang loader kapag pinindot ng user yung "Back" button sa browser
window.addEventListener('pageshow', function(event) {
    if (event.persisted) {
        const pageLoader = document.getElementById('pageLoader');
        if (pageLoader) {
            pageLoader.style.display = 'none';
            pageLoader.style.opacity = '0';
        }
    }
});