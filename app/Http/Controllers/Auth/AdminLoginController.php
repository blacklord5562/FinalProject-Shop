<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'admin'; // Ensure the role is 'admin'

        if (Auth::attempt($credentials)) {
            // Authentication passed, redirect to admin dashboard
            return redirect()->route('admin.dashboard');
        }

        // Authentication failed, redirect back with error
        return redirect()->route('admin.login')->withErrors([
            'email' => 'Invalid credentials or not an admin.',
        ]);
    }
}
