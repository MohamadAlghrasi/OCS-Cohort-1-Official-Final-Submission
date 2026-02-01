<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game; // Changed from WeeklyGame to Game

class WeeklyGameController extends Controller
{
    public function index()
    {
        // Get only weekly games that are confirmed and in the future
        $games = Game::where('type', 'weekly')
                    ->where('status', 'confirmed')
                    ->where('date', '>=', now())
                    ->orderBy('date', 'asc')
                    ->orderBy('time', 'asc')
                    ->get();
        
        // Group games by location for the view
        $gamesByLocation = [
            'International Academy Amman' => $games->where('location', 'International Academy Amman'),
            'Islamic Educational College' => $games->where('location', 'Islamic Educational College'),
        ];
        
        return view('site.games', compact('games', 'gamesByLocation'));
    }
}