<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Coach;

class CoachController extends Controller
{
    public function index()
    {
        // Get all coaches, ordered by experience or any other criteria
        $coaches = Coach::orderBy('experience', 'desc')->get();
        
        // Pass data to view
        return view('site.coaches', compact('coaches'));
    }
}