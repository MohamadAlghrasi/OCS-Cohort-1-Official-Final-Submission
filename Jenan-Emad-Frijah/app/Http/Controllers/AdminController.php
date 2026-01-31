<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tutor;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use App\Models\Subject;


class AdminController extends Controller
{
    public function students(){

        $students=User::where('role','student')->paginate(5);
        return view('admin.students',compact('students'));
    }


    public function tutors(){
        $tutors=User::where('role','tutor')->paginate(5);
        return view('admin.tutors',compact('tutors'));
    }

   public function student_destroy($id)
{
    $student = User::findOrFail($id);

    $student->delete(); 

    return redirect()->back()->with('success', 'Student deleted successfully!');
}

public function tutor_destroy($id){
    $tutor = User::where('role','tutor')->findOrFail($id);

    $tutor->delete();

    return redirect()->back()->with('success','Tutor deleted successfully!');

}

public function create(Request $request){

$validated=$request->validate([
    'name'=>'required|string|max:255',
    'email'=>'required|string|email|max:255|unique:users,email',
    'phone'=>'required|regex:/^[0-9]{8,15}$/',
    'location'=> 'required|max:255',
    'bio' => 'required|string',
    'profile_image'=> 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
]);



$defaultPassword = 'Tutor@123';

 $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone'=> $request->phone,
    'location'=> $request->location,
    'password' => Hash::make($defaultPassword),
    'role' => 'tutor',
]);

$tutor = Tutor::create([
    'user_id' => $user->id, 
    'bio'=>$request->bio
]);

  auth()->login($user);

  return redirect()->back()->with('success','Tutor created successfully!');
}

public function dashboard(){
    
    $studentsCount = User::where('role', 'student')->count();
    
  
    $tutorsCount = User::where('role', 'tutor')->count();

    $subjectsCount = Subject::count(); 
    

    $monthlyStudents = User::where('role', 'student')
        ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->pluck('count', 'month');
    
    return view('admin.dashboard', compact(
        'studentsCount',
        'tutorsCount', 
        'subjectsCount',
        'monthlyStudents'
    ));
}


}
