<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:api', ['except' => ['login']]);
    }



    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {


        $credentials = $request->only(['email', 'password']);


        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function auth(Request $request){

        $user = new User();



        $credentials = request(['email', 'password']);
        if(! $token = auth('api')->attempt($credentials)) {

                return response()->json(['error'=>true, 'status'=>'error'],
                                        ['message' => 'Usuário não pode ser autenticado'], 500);
        }


        if(!$user){
            return response()->json("usuario nao encontrado");
        }


        // $user = User::find($credentials);
        $user = User::where($credentials)->first();
        $user = auth()->user();

        return response()->json([

            'status' => "success",
            'message' =>"Usuário criado e JWT encontrado",
            'tokenjwt' => $token,
            'expires' => auth('api')->factory()->getTTL() * 60,

            'User' => $user


        ]);


    }

}
