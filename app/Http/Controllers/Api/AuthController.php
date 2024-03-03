<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => User::MSG_ERROR_LOGIN_INVALID], 401);
        }

        return $this->respondWithToken($token);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        if (!JWTAuth::manager()->invalidate(new \Tymon\JWTAuth\Token($token))) {
            throw new \Exception("Erro. Tente novamente.", 404);
        }

        return response()->json(['msg' => User::MSG_END_SESSION_LOGIN]);
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            'id' => auth()->id(),
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => 86400
        ]);
    }

}
