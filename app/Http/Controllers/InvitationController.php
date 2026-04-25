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
            'attendance' => 'required|string|in:yes',
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
        $this->guardAdmin($request);

        $rsvps = Rsvp::where('attendance', 'yes')
            ->latest()
            ->get();

        return view('invitation-admin', [
            'rsvps' => $rsvps,
            'totalRsvps' => $rsvps->count(),
        ]);
    }

    public function adminRsvps(Request $request)
    {
        $this->guardAdmin($request);

        $rsvps = Rsvp::where('attendance', 'yes')
            ->latest()
            ->get()
            ->map(function ($rsvp) {
                return [
                    'id' => $rsvp->id,
                    'name' => $rsvp->name,
                    'created_at' => $rsvp->created_at
                        ? $rsvp->created_at->format('M d, Y • h:i A')
                        : 'No timestamp available',
                ];
            });

        return response()->json([
            'total' => $rsvps->count(),
            'latest_name' => $rsvps->first()['name'] ?? 'None yet',
            'latest_time' => $rsvps->first()['created_at'] ?? 'Waiting for guests',
            'rsvps' => $rsvps,
        ]);
    }

    private function guardAdmin(Request $request): void
    {
        $adminKey = (string) env('INVITATION_ADMIN_KEY', '');

        if ($adminKey === '' || ! hash_equals($adminKey, (string) $request->query('key', ''))) {
            abort(403);
        }
    }
}