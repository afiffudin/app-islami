<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        dd($credentials);
        $credentials = $request->only(['email', 'password']);

        if (Auth::attempt($credentials)) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => true]);
    }

    public function getUser()
    {
        if (Auth::check()) {
            return response()->json(Auth::user());
        }

        return response()->json(null);
    }
}