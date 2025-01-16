<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class RegisteredUserController extends Controller
{

    private const VALIDATION_RULE = 'required|string|max:255';

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => self::VALIDATION_RULE,
            'last_name' => self::VALIDATION_RULE,
            'phone_number' => self::VALIDATION_RULE,
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }
}
