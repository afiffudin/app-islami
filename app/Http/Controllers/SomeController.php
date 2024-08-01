<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SomeController extends Controller
{
    public function index()
    {
        return "Hello, World!";
    }
    // public function someProtectedMethod(Request $request)
    // {
    //     $user = JWTAuth::parseToken()->authenticate();
        
    //     if (!$user) {
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    
    //     // Aksi yang diizinkan
    // }
}
