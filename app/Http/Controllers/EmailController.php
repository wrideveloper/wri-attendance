<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function forpas(){
        $user = auth()->user();

        \Mail::to($user->email)->send(new \App\Mail\ForgotPasswordMail($user->name));
    
        dd("Email terkirim");
    }
}
