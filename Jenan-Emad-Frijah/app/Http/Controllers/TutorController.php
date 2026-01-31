<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tutor;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class TutorController extends Controller
{
    public function edit()
    {
        $user = auth()->user(); 
        return view('tutor.tutor_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $tutor = auth()->user()->tutor;

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . auth()->id(),
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
            'bio' => 'nullable|string|max:500',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:1024',
            'current_password' => [
                'nullable',
                'required_with:password',
                'current_password',
            ],
            'password' => [
                'nullable',
                'confirmed',
                Password::min(8)->mixedCase()->numbers()->symbols(),
            ],
        ]);

  
        auth()->user()->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
        ]);

 
        if ($request->hasFile('profile_image')) {
            try {
                $image = $request->file('profile_image');
                
            
                if (!$image->isValid()) {
                    return back()->withErrors(['profile_image' => 'The uploaded file is not valid.']);
                }
                
              
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                
           
                $destinationPath = public_path('storage/profile_images');
            
                if (!file_exists($destinationPath)) {
                    mkdir($destinationPath, 0755, true);
                }
                
                if (auth()->user()->profile_image) {
                    $oldImagePath = $destinationPath . '/' . auth()->user()->profile_image;
                    if (file_exists($oldImagePath)) {
                        @unlink($oldImagePath);
                    }
                }
                
               
                $moved = $image->move($destinationPath, $imageName);
                
                if (!$moved) {
                    Log::error('Failed to move uploaded image');
                    return back()->withErrors(['profile_image' => 'Failed to save the image.']);
                }
                
         
                if (!file_exists($destinationPath . '/' . $imageName)) {
                    Log::error('Image file does not exist after move');
                    return back()->withErrors(['profile_image' => 'Image was not saved properly.']);
                }
                
      
                auth()->user()->update(['profile_image' => $imageName]);
                
            } catch (\Exception $e) {
                Log::error('Image upload error: ' . $e->getMessage());
                return back()->withErrors(['profile_image' => 'Error uploading image: ' . $e->getMessage()]);
            }
        }

      
        if ($tutor) {
            $tutor->update(['bio' => $request->bio]);
        }

        
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, auth()->user()->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        return back()->with('success', 'Profile updated successfully!');
    }
}