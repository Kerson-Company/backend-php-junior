<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                    'message' => 'Usuário não pode ser autenticado'
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

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken(String $token)
    {
        return response()->json([
            'status' => 'success',
            'tokenjwt' => $token,
            'expires' => auth()->factory()->getTTL() * 60,
            'token_type' => 'bearer',
            "tokenmsg" => "use o token para acessar os endpoints!",
            "User" =>
                [
                    "id" => auth()->user()->id,
                    "nome" => auth()->user()->name,
                    "cpf" => auth()->user()->name,
                    "email" => auth()->user()->email,
                    "createdAt" => auth()->user()->created_at,
                    "updatedAt" => auth()->user()->updated_at
               ]
        ]);
    }
}
