<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        // Get all services, ordered by the 'order' column
        $services = Service::orderBy('order')->get();
        
        // Pass data to view
        return view('site.services', compact('services'));
    }
}