<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Tutor;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function createStudent(Request $request): View
    {
         if ($request->has('redirect')) {
            session(['url.intended' => $request->get('redirect')]);
        }
         return view('auth.register-student');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
     public function storeStudent(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => [
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols(),
            ],
            'phone' => 'string',
            'location' => 'string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

$path = $request->hasFile('profile_image') 
        ? $request->file('profile_image')->store('profile_images', 'public') 
        : null;
        

   $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone'=> $request->phone,
    'location'=> $request->location,
    'profile_image'=> $path, 
    'password' => Hash::make($request->password),
    'role' => 'student',
]);

        auth()->login($user);

        if ($request->has('redirect')) {
            return redirect($request->input('redirect'));
        }

        if (session()->has('url.intended')) {
            $url = session()->pull('url.intended');
            return redirect($url);
        }
        return redirect()->route('home.index');
    }

    public function createTutor()
    {
        return view('auth.register-tutor');
    }

    public function storeTutor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone' => 'required|regex:/^[0-9]{8,15}$/',
            'location' => 'required|string',
            'bio' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        
 $path = $request->hasFile('profile_image') 
        ? $request->file('profile_image')->store('profile_images', 'public') 
        : null;

   $user = User::create([
    'name' => $request->name,
    'email' => $request->email,
    'phone'=> $request->phone,
    'location'=> $request->location,
    'profile_image'=> $path, 
    'password' => Hash::make($request->password),
    'role' => 'tutor',
]);

$tutor = Tutor::create([
    'user_id' => $user->id, 
    'bio'=>$request->bio
]);

        auth()->login($user);

        if ($request->has('redirect')) {
        return redirect($request->input('redirect'));
    }

        return redirect()->route('tutor.tutor_profile'); 
    }


}
