<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Booking;
use App\Models\Player;
use App\Models\PrivateGameRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Use try-catch to handle missing tables
        try {
            $totalPlayers = Player::count();
        } catch (\Exception $e) {
            $totalPlayers = 0;
        }
        
        try {
            $upcomingGames = Game::where('date', '>=', now())
                                ->where('status', 'confirmed')
                                ->count();
        } catch (\Exception $e) {
            $upcomingGames = 0;
        }
        
        try {
            $pendingBookings = Booking::where('status', 'pending')->count();
        } catch (\Exception $e) {
            $pendingBookings = 0;
        }
        
        try {
            $nextGame = Game::where('date', '>=', now())
                           ->where('status', 'confirmed')
                           ->orderBy('date', 'asc')
                           ->first();
            
            $nextGameDate = $nextGame ? $nextGame->date->format('M d, Y') : 'No games scheduled';
        } catch (\Exception $e) {
            $nextGameDate = 'No games scheduled';
        }
        
        try {
            $upcomingGamesList = Game::where('date', '>=', now())
                                    ->orderBy('date', 'asc')
                                    ->limit(5)
                                    ->get();
        } catch (\Exception $e) {
            $upcomingGamesList = collect(); // empty collection
        }
        
        try {
            $recentBookings = Booking::with('game')
                                    ->orderBy('created_at', 'desc')
                                    ->limit(5)
                                    ->get();
        } catch (\Exception $e) {
            $recentBookings = collect(); // empty collection
        }
        
        try {
            $weeklyGamesCount = Game::where('type', 'weekly')->count();
        } catch (\Exception $e) {
            $weeklyGamesCount = 0;
        }
        
        try {
            $privateGamesCount = Game::where('type', 'private')->count();
        } catch (\Exception $e) {
            $privateGamesCount = 0;
        }
        
        // Calculate average players per game
        try {
            $totalGames = Game::count();
            $totalRegistered = Game::sum('registered_players');
            $avgPlayersPerGame = $totalGames > 0 ? round($totalRegistered / $totalGames, 1) : 0;
        } catch (\Exception $e) {
            $avgPlayersPerGame = 0;
        }
        
        // Calculate occupancy rate
        try {
            $totalCapacity = Game::sum('max_players');
            $occupancyRate = $totalCapacity > 0 ? round(($totalRegistered / $totalCapacity) * 100, 1) : 0;
        } catch (\Exception $e) {
            $occupancyRate = 0;
        }

        // Get private game requests with try-catch
        try {
            $privateRequests = PrivateGameRequest::orderBy('created_at', 'desc')
                                                ->limit(5)
                                                ->get();
        } catch (\Exception $e) {
            $privateRequests = collect(); // empty collection
        }
        
        try {
            $pendingPrivateRequests = PrivateGameRequest::where('status', 'pending')->count();
        } catch (\Exception $e) {
            $pendingPrivateRequests = 0;
        }
        try {
            $unreadContacts = Contact::where('status', 'unread')->count();
        } catch (\Exception $e) {
            $unreadContacts = 0;
        }

        return view('admin.AdminDashboard', compact(
            'totalPlayers',
            'upcomingGames',
            'pendingBookings',
            'nextGameDate',
            'upcomingGamesList',
            'recentBookings',
            'weeklyGamesCount',
            'privateGamesCount',
            'avgPlayersPerGame',
            'occupancyRate',
            'privateRequests',
            'pendingPrivateRequests',
            'unreadContacts'
        ));

    }
}