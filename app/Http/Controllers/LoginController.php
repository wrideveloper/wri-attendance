<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function index() {
        return view('auth.login');
    }

    public function authenticate(LoginRequest $request) {
        $credential = $request->validated();

        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with(
                'success', 'Login berhasil, Selamat datang ' . Auth::user()->name . '!'
            );
        }
        return back()->with('LoginErrors', 'Login gagal! tolong cek kembali NIM atau Password Anda');
    }

    public function logout() {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/')->with('LogoutSuccess', 'Logout berhasil, sampai jumpa lagi!');;
    }
}
