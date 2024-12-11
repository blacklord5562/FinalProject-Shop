<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // Show the user profile edit form
    public function edit()
    {
        $user = auth()->user(); // Get the authenticated user

        if (!$user) {
            abort(404, 'User not found'); // Handle cases where the user is not authenticated
        }

        return view('client.profile.edit', compact('user'));
    }

    // Handle the form submission and update the profile
    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
            'birthday' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'profile_picture' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $profilePicturePath;
        }

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->birthday = $request->input('birthday');
        $user->address = $request->input('address');

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
