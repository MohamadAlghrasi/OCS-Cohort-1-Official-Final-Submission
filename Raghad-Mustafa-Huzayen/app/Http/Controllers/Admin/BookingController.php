<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Game;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::with('game')
                          ->orderBy('created_at', 'desc')
                          ->get();
        
        return view('admin.bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $games = Game::where('status', 'confirmed')
                    ->where('date', '>=', now())
                    ->orderBy('date', 'asc')
                    ->get();
        
        return view('admin.bookings.create', compact('games'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'game_id' => 'required|exists:games,id',
            'reserved_by_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'number_of_players' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,clique',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $game = Game::findOrFail($request->game_id);
        
        // Check if there's enough capacity
        $availableSpots = $game->max_players - $game->registered_players;
        if ($request->number_of_players > $availableSpots) {
            return back()->withErrors(['number_of_players' => "Only {$availableSpots} spots available for this game."]);
        }

        $booking = Booking::create([
            'game_id' => $request->game_id,
            'reserved_by_name' => $request->reserved_by_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'number_of_players' => $request->number_of_players,
            'payment_method' => $request->payment_method,
            'special_requests' => $request->special_requests,
            'status' => $request->status,
        ]);

        // Update game registered players count
        $game->increment('registered_players', $request->number_of_players);

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with('game')->findOrFail($id);
        return view('admin.bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $booking = Booking::findOrFail($id);
        $games = Game::where('status', 'confirmed')
                    ->where('date', '>=', now())
                    ->orderBy('date', 'asc')
                    ->get();
        
        return view('admin.bookings.edit', compact('booking', 'games'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $booking = Booking::with('game')->findOrFail($id);
        
        $request->validate([
            'reserved_by_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'number_of_players' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,clique',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        // If number of players changed, update game capacity
        if ($request->number_of_players != $booking->number_of_players) {
            $game = $booking->game;
            $difference = $request->number_of_players - $booking->number_of_players;
            
            // Check if new number exceeds capacity
            $newTotal = $game->registered_players + $difference;
            if ($newTotal > $game->max_players) {
                return back()->withErrors(['number_of_players' => "Exceeds game capacity. Maximum is {$game->max_players} players."]);
            }
            
            $game->increment('registered_players', $difference);
        }

        $booking->update($request->only([
            'reserved_by_name', 'email', 'phone', 'number_of_players',
            'payment_method', 'special_requests', 'status'
        ]));

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $booking = Booking::with('game')->findOrFail($id);
        
        // Update game capacity before deleting
        $booking->game->decrement('registered_players', $booking->number_of_players);
        
        $booking->delete();

        return redirect()->route('admin.bookings.index')
                         ->with('success', 'Booking deleted successfully!');
    }
}