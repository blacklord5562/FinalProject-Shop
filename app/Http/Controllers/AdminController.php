<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return the 'home' view and pass the user data
        return view('home', compact('user'));
    }

}
