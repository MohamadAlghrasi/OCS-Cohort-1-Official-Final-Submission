<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coach;
use Illuminate\Support\Facades\Storage;

class CoachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coaches = Coach::orderBy('created_at', 'desc')->get();
        return view('admin.coaches.index', compact('coaches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.coaches.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'experience' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'title', 'bio', 'experience', 'specialty']);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('coaches', 'public');
            $data['image'] = $imagePath;
        } else {
            $data['image'] = 'coaches/default-coach.jpg';
        }

        Coach::create($data);

        return redirect()->route('admin.coaches.index')
                         ->with('success', 'Coach added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coach = Coach::findOrFail($id);
        return view('admin.coaches.show', compact('coach'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $coach = Coach::findOrFail($id);
        return view('admin.coaches.edit', compact('coach'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $coach = Coach::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'bio' => 'required|string',
            'experience' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'title', 'bio', 'experience', 'specialty']);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists and not default
            if ($coach->image && $coach->image !== 'coaches/default-coach.jpg') {
                Storage::disk('public')->delete($coach->image);
            }
            $imagePath = $request->file('image')->store('coaches', 'public');
            $data['image'] = $imagePath;
        }

        $coach->update($data);

        return redirect()->route('admin.coaches.index')
                         ->with('success', 'Coach updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coach = Coach::findOrFail($id);
        
        // Delete image if exists and not default
        if ($coach->image && $coach->image !== 'coaches/default-coach.jpg') {
            Storage::disk('public')->delete($coach->image);
        }
        
        $coach->delete();

        return redirect()->route('admin.coaches.index')
                         ->with('success', 'Coach deleted successfully!');
    }
}