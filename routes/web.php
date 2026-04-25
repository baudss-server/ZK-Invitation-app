<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;

// Nilagyan natin ng pangalan itong route!
Route::get('/invitation', function () {
    return view('invitation');
})->name('invitation');

Route::get('/', function () {
    return redirect()->route('invitation');
});

Route::post('/rsvp', [InvitationController::class, 'store'])->name('rsvp.submit');

Route::get('/invitation-admin', [InvitationController::class, 'admin'])->name('invitation.admin');
Route::get('/invitation-admin/rsvps', [InvitationController::class, 'adminRsvps'])->name('invitation.admin.rsvps');

Route::get('/event-details', function () {
    return view('details');
})->name('event.details');