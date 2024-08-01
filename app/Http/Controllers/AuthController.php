<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Log;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        
        return response()->json(['message' => 'Pendaftaran Berhasil'], 201);
    }
    public function login(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $credentials = $request->only(['email', 'password']);
        if (!$token =  auth()->attempt($credentials)) {

            // return redirect()->intended(route('/dashboard'));
            return response()->json(['message' => 'Email atau Password Salah'], 401);
        }
        // return view('layouts/login');
        return response()->json(['token' => $token]);
        // // Log::info('Received token: ' . $request);
        // $credentials = $request->only('email', 'password');

        // try {
        //     if (!$token = JWTAuth::attempt($credentials)) {
        //         return response()->json(['error' => 'Gagal login jamal !!'], 401);
        //     }
        // } catch (JWTException $e) {
        //     return response()->json(['error' => 'Could not create token'], 500);
        // }

        return response()->json(compact('token'));
    }
    public function showLoginForm()
    {
        return view('layouts.login');
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