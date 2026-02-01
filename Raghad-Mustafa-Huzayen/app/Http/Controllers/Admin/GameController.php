<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game; 

class GameController extends Controller
{
    /**
     * Display a listing of the games.
     */
    public function index()
    {
        $games = Game::orderBy('date', 'asc')->get();
        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new game.
     */
    public function create()
    {
        // This loads resources/views/admin/games/create.blade.php
        return view('admin.games.create');
    }

    /**
     * Store a newly created game in the database.
     */
    public function store(Request $request)
{
    $request->validate([
        'type' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required',
        'location' => 'required|string|max:255',
        'max_players' => 'required|integer|min:4|max:50',
        'status' => 'required|in:pending,confirmed,cancelled',
        'price' => 'nullable|numeric|min:0',
        'description' => 'nullable|string',
    ]);

    Game::create([
        'type' => $request->type,
        'date' => $request->date,
        'time' => $request->time,
        'location' => $request->location,
        'max_players' => $request->max_players,
        'registered_players' => 0, // default for new game
        'status' => $request->status,
        'price' => $request->price,
        'description' => $request->description,
    ]);

    return redirect()->route('admin.games.index')
                     ->with('success', 'Game added successfully!');
}

    /**
     * Display the specified game.
     */
    public function show(Game $game)
    {
        return view('admin.games.show', compact('game'));
    }

    /**
     * Show the form for editing the specified game.
     */
    public function edit(Game $game)
    {
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified game in storage.
     */
    public function update(Request $request, Game $game)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'max_players' => 'required|integer',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $game->update($request->only(['type','date','time','max_players','status']));

        return redirect()->route('admin.games.index')
                         ->with('success', 'Game updated successfully!');
    }

    /**
     * Remove the specified game from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return redirect()->route('admin.games.index')
                         ->with('success', 'Game deleted successfully!');
    }
}
