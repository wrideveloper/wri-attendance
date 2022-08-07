<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForPasController extends Controller
{
    public function forpas(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns|unique:password_resets',
        ]);
        // check email ada atau tidak
        $user = DB::table('users')->where('email', '=', $request->email)->first();
        if (!empty($user->email)) {
            // Bikin random string untuk token
            $token = Str::random(16);
            //Cek request->email ada atau tidak di tabel forpas
            $checkEmail = DB::table('password_resets')->where('email', '=', $request->email)->first();
            if (!empty($checkEmail)) {
                DB::table('password_resets')->where('email', '=', $request->email)->update([
                    'token' => $token,
                ]);
            } else {
                DB::table('password_resets')->insert([
                    'email' => $user->email,
                    'token' => $token,
                ]);
            }
            \Mail::to($user->email)->send(new \App\Mail\ForgotPasswordMail($user->name, $token));
        } else {
            return redirect('/');
        }
    }
    public function halaman_reset($token)
    {
        $forpas = DB::table('password_resets')->where('token', '=', $token)->first();
        if (!empty($forpas->token)) {
            return view('auth.gantipass')->with('token', $forpas->token);
        } else {
            return redirect('/');
        }
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:5|max:255'
        ]);
        $email = DB::table('password_resets')->where('token', '=', $request->token)->first()->email;
        DB::table('users')->where('email', '=', $email)->update([
            'password' => bcrypt($request->password),
        ]);
        DB::table('password_resets')->where('email', '=', $email)->update([
            'token' => Str::random(16),
        ]);
        return redirect('/');
    }
}
