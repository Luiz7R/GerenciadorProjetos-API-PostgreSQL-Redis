<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request) : JsonResponse
    {
        $payload = $request->only(['email','password']);
        $token = auth('api')->attempt($payload);

        if ( !$token ) {
            return response()->json(['error' => 'Email ou Senha inválidos'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout()  
    {
       auth('api')->logout();
       return response()->json(['msg' => 'Deslogado com Sucesso']);
    }

    public function refresh()  
    {
        $token = auth('api')->refresh();
        return response()->json(['token' => $token], 200);
    }

    public function me()  
    {
        return response()->json(auth()->user(), 200);
    }

   /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL()
        ]);
    }
}
