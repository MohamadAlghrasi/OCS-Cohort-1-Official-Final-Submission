<?php

namespace App\Http\Controllers;

use App\Models\Game; // Changed from WeeklyGame to Game
use App\Models\Booking;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create(Game $game)
    {
        // Make sure game is available and confirmed
        if ($game->status !== 'confirmed') {
            abort(404, 'This game is not available for reservations.');
        }
        
        $availableSpots = $game->max_players - $game->registered_players;
        
        if ($availableSpots <= 0) {
            abort(404, 'This game is fully booked.');
        }
        
        return view('site.reservation', compact('game', 'availableSpots'));
    }

    public function store(Request $request, Game $game)
    {
        $request->validate([
            'reserved_by_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'number_of_players' => 'required|integer|min:1|max:' . ($game->max_players - $game->registered_players),
            'payment_method' => 'required|in:cash,clique',
            'special_requests' => 'nullable|string',
        ]);

        // Create booking
        $booking = Booking::create([
            'game_id' => $game->id,
            'reserved_by_name' => $request->reserved_by_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'number_of_players' => $request->number_of_players,
            'payment_method' => $request->payment_method,
            'special_requests' => $request->special_requests,
            'status' => 'pending',
        ]);

        // Update game registered players count
        $game->increment('registered_players', $request->number_of_players);

        return redirect()->route('reservation.confirmation', $booking->id)
                         ->with('success', 'Reservation confirmed!');
    }

    public function confirmation($id)
    {
        $booking = Booking::findOrFail($id);
        return view('site.reservation_confirmation', compact('booking'));
    }
}