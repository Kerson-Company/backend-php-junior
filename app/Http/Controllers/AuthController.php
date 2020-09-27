<?php

namespace App\Http\Controllers;

use App\Http\Resources\User;
use App\Http\Resources\UserResource;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['auth']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function auth()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'The data that you have entered is incorrect'
                ],
                401
            );
        }

        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out'
        ]);
    }


    /**
     * @param String $token
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken(String $token)
    {
        return response()->json(array_merge([
            'status' => 'success',
            'tokenjwt' => $token,
            'expires' => auth()->factory()->getTTL() * 60,
            'token_type' => 'bearer',
            "tokenmsg" => "Use the token to access endpoints!",
        ], (new UserResource(auth()->user()))->resolve()));
    }
}
