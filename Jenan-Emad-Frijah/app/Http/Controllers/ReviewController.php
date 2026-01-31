<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Request as CourseRequest;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'request_id' => 'required|exists:requests,id',
            'rating' => 'nullable|integer|min:1|max:5',
            'feedback' => 'required|string|max:1000',
        ]);

    
        $courseRequest = CourseRequest::findOrFail($validated['request_id']);

  
        if ($courseRequest->student_id != auth()->id()) {
            abort(403, 'Unauthorized action');
        }


        if ($courseRequest->status !== 'completed') {
            return redirect()->back()->with('error', 'You can only review completed sessions.');
        }

        $existingReview = Review::where('request_id', $validated['request_id'])->first();
        if ($existingReview) {
            return redirect()->back()->with('error', 'You have already reviewed this session.');
        }

        Review::create([
            'tutor_id' => $courseRequest->tutor_id,
            'student_id' => auth()->id(),
            'request_id' => $validated['request_id'],
            'rating' => $validated['rating']?? null,
            'feedback' => $validated['feedback'],
        ]);

    
        $courseRequest->update(['status' => 'reviewed']);

        return redirect()->back()->with('success', 'Thank you for your review!');
    }
}