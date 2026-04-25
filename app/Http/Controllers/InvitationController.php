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
}