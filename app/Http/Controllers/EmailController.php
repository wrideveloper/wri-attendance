<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    public function forpas(Request $request){
        // check email ada atau tidak
        $user = DB::table('users')->where('email', '=', $request->email)->first();
        if (!empty($user->email)){
            // Bikin random string untuk token
            $token = Str::random(16);
            //Check request->email ada atau tidak di tabel forpas
            $checkEmail = DB::table('password_resets')->where('email', '=', $request->email)->first();
            if(!empty($checkEmail)){
                DB::table('password_resets')->where('email', '=', $request->email)->update([
                    'token' => $token,
                ]);
            }
            else{
                DB::table('password_resets')->insert([
                    'email' => $user->email,
                    'token' => $token,
                ]);
            }
            \Mail::to($user->email)->send(new \App\Mail\ForgotPasswordMail($user->name, $token));
        }
        else{
            return redirect('/');
        }
        
        // $user = auth()->user();
        // $email = DB::table('users')->where('email' == $request->email);
        // //check email exist or not
        // if($email == 1){
            
        // }
    }
}
