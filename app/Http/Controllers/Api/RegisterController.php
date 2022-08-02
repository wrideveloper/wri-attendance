<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register',
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nim' => 'required|max:11',
            'name' => 'required|max:255',
            'email' => 'required|email:dns|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'roles_id' => 'required',
            'miniclass_id' => 'required',
            'generation_id' => 'required',
            'phone' => 'required'
        ]);

        $data['password'] = Hash::make($data['password']);
        $response = User::create($data);
        // $response->header('Content-Type', 'application/json');
        return $response;
            
        // return redirect('/login')->with('success', 'Register successfull! Please login'); 
    }

    
}
