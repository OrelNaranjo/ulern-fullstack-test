<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/profile",
     *     summary="Get authenticated user's profile",
     *     tags={"Authentication"},
     *     @OA\Response(
     *         response=200,
     *         description="User profile data",
     *         @OA\JsonContent(
     *             @OA\Property(property="id", type="integer", example=1),
     *             @OA\Property(property="first_name", type="string", example="John"),
     *             @OA\Property(property="last_name", type="string", example="Doe"),
     *             @OA\Property(property="phone_number", type="string", example="1234567890"),
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-16T14:07:59.000000Z"),
     *             @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-16T14:07:59.000000Z")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Unauthenticated.")
     *         )
     *     ),
     *     security={{"sanctum": {}}}
     * )
     */
    public function show(Request $request)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Return the user's profile data
        return response()->json($user);
    }
}
