<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Request as CourseRequest; 

class RequestController extends Controller
{
    public function store(Request $request)
{
    
    $request->validate([
        'tutor_id' => 'required|exists:tutors,id',
        'student_id' => 'required|exists:users,id',
        'subject_id' => 'required|exists:subjects,id',
        'grade_id' => 'nullable|exists:grades,id',
        'proposed_datetime' => 'required|date',
        'notes' => 'nullable|string',
    ]);

       CourseRequest::create([
        'student_id' => auth()->id(),
        'tutor_id' => $request->tutor_id,
        'subject_id' => $request->subject_id,
        'grade_id' => $request->grade_id,
        'proposed_datetime' => $request->proposed_datetime,
        'notes' => $request->notes,
        'status' => 'pending', 
    ]);

   return redirect()->route('user.student_requests')->with('success', 'Request sent successfully!');

}


 public function tutorRequests()
    {
      
        $tutor = auth()->user()->tutor;
        
        if (!$tutor) {
            abort(403, 'You are not registered as a tutor');
        }

        $requests = CourseRequest::where('tutor_id', $tutor->id)
            ->with(['student', 'subject'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('tutor.my_requests', compact('requests'));
    }

  public function studentRequests()
    {
        $requests = CourseRequest::where('student_id', auth()->id())
            ->with(['tutor.user', 'subject', 'grade'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.student_requests', compact('requests'));
    }

    public function approve($id)
    {
        $tutor = auth()->user()->tutor;
        $courseRequest = CourseRequest::findOrFail($id);
        
    
        if ($courseRequest->tutor_id != $tutor->id) {
            abort(403, 'Unauthorized action');
        }

        $courseRequest->update(['status' => 'accepted']);

        return redirect()->back()->with('success', 'Request accepted successfully!');
    }

    public function deny($id)
    {
        $tutor = auth()->user()->tutor;
        $courseRequest = CourseRequest::findOrFail($id);
        
        if ($courseRequest->tutor_id != $tutor->id) {
            abort(403, 'Unauthorized action');
        }

        $courseRequest->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Request rejected.');
    }

      public function pay($id)
    {

        $courseRequest = CourseRequest::findOrFail($id);
        
        if ($courseRequest->student_id != auth()->id()) {
        abort(403, 'Unauthorized action');
    }

     if ($courseRequest->status != 'accepted') {
        return redirect()->back()->with('error', 'This request cannot be paid.');
    }

        $courseRequest->update(['status' => 'paid']);

        return redirect()->back()->with('success', 'Request paid.');
    }


    public function markCompleted($id)
{
    $request = CourseRequest::findOrFail($id);

    $tutor = auth()->user()->tutor;
    if (!$tutor || $request->tutor_id != $tutor->id) {
        abort(403, 'Unauthorized action');
    }

    if ($request->status != 'paid') {
        return back()->with('error', 'Cannot complete request before payment.');
    }


    $request->update([
        'status' => 'completed'
    ]);

       return redirect()->route('tutor.my_requests')->with('showReviewPopup', $request->id);
}

    

}
