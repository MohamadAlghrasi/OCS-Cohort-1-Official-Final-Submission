<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Subject;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\TutorController;
use App\Http\Controllers\TutorProfileController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PayPalController;


Route::get('/', function () {
    return view('home.index');
})->middleware('public.pages')->name('home.index');

Route::prefix('/home')
    ->middleware('public.pages')
    ->name('home.')
    ->group(function(){

    Route::get('/', fn () => view('home.index'))->name('index');
    Route::get('/about', fn () => view('home.about'))->name('about');
    Route::get('/contact', fn () => view('home.contact'))->name('contact');
    Route::get('/tutors', fn () => view('home.tutors'))->name('tutors');
    Route::get('/tutor_profile/{tutor}',[TutorProfileController::class,'show'])->name('tutor_profile');
    Route::get('/course_details/{subject}',[TutorProfileController::class,'showSubject'])->name('course_details');
});


Route::prefix('/user')->name('user.')->middleware('guest')->group(function(){
    Route::get('/register/student', [RegisteredUserController::class, 'createStudent'])->name('register_student');
    Route::post('/register/student', [RegisteredUserController::class, 'storeStudent'])->name('register_student.store');
    
    Route::get('/register/tutor', [RegisteredUserController::class, 'createTutor'])->name('register_tutor');
    Route::post('/register/tutor', [RegisteredUserController::class, 'storeTutor'])->name('register_tutor.store');
});


Route::post('/home/course_details/{subject}', [RequestController::class, 'store'])
    ->middleware('auth', 'role:student')
    ->name('home.book');


Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');



Route::middleware(['auth', 'role:student'])->group(function(){
    Route::prefix('/user')->name('user.')->group(function(){
        Route::get('/student_requests', [RequestController::class,'studentRequests'])->name('student_requests');
        Route::get('/student_profile', function () {
            return view('user.student_profile', ['user' => auth()->user()]);
        })->name('student_profile'); 
    Route::post('/requests/{id}/pay', [RequestController::class, 'pay'])->name('requests.pay');
    Route::put('/quick-update', [ProfileController::class, 'quickUpdate'])->name('quick.update');
       });

});




Route::prefix('/admin')->middleware(['auth', 'role:admin'])->name('admin.')->group(function(){
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/students', [AdminController::class,'students'])->name('students');
    Route::get('/tutors', [AdminController::class,'tutors'])->name('tutors');
    Route::get('/grades', function () {return view('admin.grades');})->name('grades');
    // Route::get('/tutors', function () {return view('admin.tutors');})->name('tutors');
    Route::delete('/students/{id}',[AdminController::class,'student_destroy'])->name('student_delete');
    Route::delete('/tutors/{id}',[AdminController::class , 'tutor_destroy'])->name('tutor_delete');
    Route::post('/tutors',[AdminController::class,'create'])->name('tutor_add');
});

 

Route::prefix('/tutor')->middleware(['auth', 'role:tutor'])->name('tutor.')->group(function(){
    Route::get('/tutor_profile', [TutorController::class, 'edit'])->name('tutor_profile');
    Route::put('/tutor_profile', [TutorController::class, 'update'])->name('profile.update');
    
    Route::get('/my_requests', [RequestController::class, 'tutorRequests'])->name('my_requests');
    Route::post('/requests/{id}/approve', [RequestController::class, 'approve'])->name('requests.approve');
    Route::post('/requests/{id}/deny', [RequestController::class, 'deny'])->name('requests.deny');
   
    Route::post('/requests/{request}/completed',[RequestController::class, 'markCompleted'])->name('request.completed');
    
    Route::get('/{id}/subjects', [TutorProfileController::class, 'index'])->name('subjects');
    Route::post('/subjects/add', [TutorProfileController::class, 'create'])->name('subject_add');
    Route::delete('/{tutor}/subjects/{subject}', [TutorProfileController::class, 'destroy'])->name('subject_delete');
    Route::put('/subjects/update', [TutorProfileController::class, 'update'])->name('subject_update');
});

Route::post('/paypal/create', [PayPalController::class, 'createPayment'])->name('paypal.create');
Route::get('/paypal/success', [PayPalController::class, 'paymentSuccess'])->name('paypal.success');
Route::get('/paypal/cancel', [PayPalController::class, 'paymentCancel'])->name('paypal.cancel');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/dashboard', function () {
    $user = auth()->user();
    

    if ($user->role === 'tutor') {
        return redirect()->route('tutor.my_requests');
    } elseif ($user->role === 'student') {
        return redirect()->route('home.index');
    } elseif ($user->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';