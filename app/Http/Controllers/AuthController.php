<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Invalid login details'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'Could not create token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();
        Log::info('Logout attempt', ['token' => $token]);
    
        if (!$token) {
            return response()->json(['message' => 'Token not provided'], 400);
        }
    
        try {
            JWTAuth::invalidate($token);
            Log::info('Logout successful');
            return response()->json(['message' => 'Successfully logged out']);
        } catch (JWTException $e) {
            Log::error('Logout failed', ['error' => $e->getMessage()]);
            return response()->json(['error' => 'Could not log out, please try again'], 500);
        }
    }
}