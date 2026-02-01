<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrivateGameRequest;

class PrivateGameRequestController extends Controller
{
    public function index()
    {
        $requests = PrivateGameRequest::orderBy('created_at', 'desc')->get();
        return view('admin.private-requests.index', compact('requests'));
    }

    public function show($id)
    {
        $request = PrivateGameRequest::findOrFail($id);
        return view('admin.private-requests.show', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $privateRequest = PrivateGameRequest::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled,completed',
            'admin_notes' => 'nullable|string',
        ]);

        $privateRequest->update($validated);

        return redirect()->route('admin.private-requests.show', $id)
                         ->with('success', 'Request updated successfully!');
    }

    public function destroy($id)
    {
        $privateRequest = PrivateGameRequest::findOrFail($id);
        $privateRequest->delete();

        return redirect()->route('admin.private-requests.index')
                         ->with('success', 'Request deleted successfully!');
    }
}