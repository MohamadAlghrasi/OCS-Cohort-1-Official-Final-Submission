<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Tutor;


class TutorProfileController extends Controller
{

public function index($id)
{
  $tutor = Tutor::with('subjects')->findOrFail($id);
        return view('tutor.subjects', compact('tutor'));
}

public function create(Request $request)
{
  
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'grade' => 'nullable|string|max:50',
        'price_per_hour' => 'required|numeric|min:0',
        'description' => 'nullable|string|max:1000',
    ]);

    $tutor = auth()->user()->tutor;

    if (!$tutor) {
        return redirect()->back()->with('error', 'You must create a Tutor profile first.');
    }

   
        $subject = Subject::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);
    


    $tutor->subjects()->attach($subject->id, [
        'price_per_hour' => $validated['price_per_hour'],
        'grade' => $validated['grade'] ?? 'Not Specified',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Subject added successfully!');
}


 public function update(Request $request)
    {
     try {
        $validated = $request->validate([
            'subject_id' => 'required|exists:subjects,id',
            'name' => 'required|string|max:255',
            'price_per_hour' => 'required|numeric|min:0',
             'description' => 'nullable|string|max:1000',
            ]);

            $tutor = auth()->user()->tutor;
            $subject = Subject::findOrFail($validated['subject_id']);

            $subject->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
            ]);

    
            $tutor->subjects()->updateExistingPivot($subject->id, [
                'price_per_hour' => $validated['price_per_hour'],
                'updated_at' => now(),
            ]);

            return redirect()->back()->with('success', 'Subject updated successfully!');
            
        } 
        
        catch (\Exception $e) {
            Log::error('Error updating subject: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Error updating subject: ' . $e->getMessage());
        }
    }

public function destroy($tutorId, $subjectId)
{
    $tutor = Tutor::findOrFail($tutorId);

  
    $tutor->subjects()->detach($subjectId);

 
    $subject = Subject::findOrFail($subjectId);
    $subject->delete(); 

    return redirect()->back()->with('success', 'Subject deleted successfully!');
}


public function show(Tutor $tutor){
   $tutor->load(['user', 'subjects']);

    return view('home.tutor_profile', compact('tutor'));
}


public function showSubject(Subject $subject)
{
    $subject->load('tutors.user'); 

    return view('home.course_details', compact('subject'));
}




}
