<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrivateGameRequest;

class PrivateGameController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'contact_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'preferred_date' => 'required|date',
            'preferred_time' => 'required',
            'venue' => 'required|string',
            'duration' => 'required|string',
            'total_players' => 'required|string',
            'skill_level' => 'nullable|string',
            'additional_info' => 'nullable|string',
        ]);

        // Convert player names array to string if present
        $playerNames = '';
        if ($request->has('player_names')) {
            $playerNames = implode(', ', array_filter($request->player_names));
        }

        PrivateGameRequest::create([
            'contact_name' => $validated['contact_name'],
            'phone' => $validated['phone'],
            'email' => $validated['email'],
            'preferred_date' => $validated['preferred_date'],
            'preferred_time' => $validated['preferred_time'],
            'venue' => $validated['venue'],
            'duration' => $validated['duration'],
            'total_players' => $validated['total_players'],
            'skill_level' => $validated['skill_level'] ?? 'mixed',
            'player_names' => $playerNames,
            'additional_info' => $validated['additional_info'] ?? '',
            'status' => 'pending',
        ]);

        return redirect()->route('private')
                         ->with('success', 'Your private game request has been submitted! We will contact you within 24 hours.');
    }
}