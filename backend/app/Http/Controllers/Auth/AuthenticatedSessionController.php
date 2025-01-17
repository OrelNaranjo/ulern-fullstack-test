<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Info(title="API Documentation Ulern", version="1.0")
 * @OA\Tag(
 *     name="Authentication",
 *     description="Endpoints related to user authentication"
 * )
 */
class AuthenticatedSessionController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/login",
     *     summary="Login user",
     *     tags={"Authentication"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="email", type="string", example="john.doe@example.com"),
     *             @OA\Property(property="password", type="string", example="password")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Logged in successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Logged in successfully"),
     *             @OA\Property(property="token", type="string", example="your_auth_token")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The provided credentials are incorrect.")
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate the user
        if (!Auth::attempt($request->only('email', 'password'))) {
            // Throw a validation exception if authentication fails
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Regenerate the session to prevent session fixation attacks
        $request->session()->regenerate();

        // Get the authenticated user
        $user = Auth::user();

        // Create a new token for the user
        $token = $user->createToken('auth_token')->plainTextToken;

        // Return a success response with the token
        return response()->json([
            'message' => 'Logged in successfully',
            'token' => $token
        ], 200);
    }

    /**
     * @OA\Post(
     *     path="/api/logout",
     *     summary="Logout user",
     *     tags={"Authentication"},
     *     @OA\Response(
     *         response=200,
     *         description="Logged out successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Logged out successfully")
     *         )
     *     )
     * )
     */
    public function destroy(Request $request)
    {
        // Check if the user is authenticated and has a current access token
        if ($request->user() && $request->user()->currentAccessToken() && !($request->user()->currentAccessToken() instanceof \Laravel\Sanctum\TransientToken)) {
            // Revoke the current token
            $request->user()->currentAccessToken()->delete();
        }

        // Log out the user
        Auth::guard('web')->logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Return a success response
        return response()->json([
            'message' => 'Logged out successfully'
        ], 200);
    }
}
