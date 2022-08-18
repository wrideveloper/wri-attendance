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
            'email' => 'required|email:dns',
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
            return redirect('/')->with('ResetPassword', 'Permintaan ubah password berhasil, silahkan cek email anda');
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
            'password1' => 'required|min:5|max:255',
            'password2' => 'required|min:5|max:255',
        ]);
        if($request->password1 == $request->password2){
            $email = DB::table('password_resets')->where('token', '=', $request->token)->first()->email;
            DB::table('users')->where('email', '=', $email)->update([
                'password' => bcrypt($request->password1),
            ]);
            DB::table('password_resets')->where('email', '=', $email)->update([
                'token' => Str::random(16),
            ]);
            return redirect('/')->with('ResetPassword', 'Password berhasil diubah');
        } else{
            return redirect()->back()->with('ResetErrors', 'Password tidak sama');
        }
    }
}
