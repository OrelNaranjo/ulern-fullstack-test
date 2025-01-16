<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Handle the incoming request to get the authenticated user's profile.
     */
    public function show(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return the user's profile data
        return response()->json($user);
    }
}
