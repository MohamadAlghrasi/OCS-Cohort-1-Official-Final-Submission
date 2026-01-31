<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
    $user = $request->user();

    $validated = $request->validated();
    unset($validated['profile_image']);

    $user->fill($validated); 

    if ($request->hasFile('profile_image')) {
     
        $path = $request->file('profile_image')->store('profile_images', 'public');
        $user->profile_image = $path; 
    }

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }
    $user->save();

    return redirect()->route('user.student_profile')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

     public function quickUpdate(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'phone' => 'nullable|string|max:20',
            'location' => 'nullable|string|max:255',
        ]);

   
        if (!empty($validated['phone'])) {
            $user->phone = $validated['phone'];
        }
        if (!empty($validated['location'])) {
            $user->location = $validated['location'];
        }

        $user->save();

        if ($request->redirect_to_booking && $request->subject_id) {
            return redirect()
                ->route('home.course_details', $request->subject_id)
                ->with('profile_updated', true);
        }

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
