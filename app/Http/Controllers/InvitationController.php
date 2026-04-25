<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rsvp;

class InvitationController
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'attendance' => 'required|string',
        ]);

        Rsvp::create([
            'name' => $request->name,
            'attendance' => $request->attendance,
        ]);

        return back()
            ->with('success', true)
            ->with('guest_name', $request->input('name'));
    }

    public function admin(Request $request)
    {
        $adminKey = (string) env('INVITATION_ADMIN_KEY', '');

        if ($adminKey === '' || ! hash_equals($adminKey, (string) $request->query('key', ''))) {
            abort(403);
        }

        $rsvps = Rsvp::where('attendance', 'yes')
            ->latest()
            ->get();

        return view('invitation-admin', [
            'rsvps' => $rsvps,
            'totalRsvps' => $rsvps->count(),
        ]);
    }
}