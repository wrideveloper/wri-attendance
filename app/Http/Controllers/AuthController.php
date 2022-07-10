<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $checkTrue = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);
        if(Auth::attempt($checkTrue)){
            return response()->json([
                'success' => 'berhasil login!',
            ]);  
        }
        else{
            return response()->json([
                'success' => 'gagal login!',
                'request' => '',
            ]);
        }
    }
}
