<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('presence.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->validate([
            'miniclas_id' => 'required|exists:miniclass,id',
            'roles_id' => 'required|exists:roles,id',
            'generation_id' => 'required|exists:generation,id',
            'name' => 'required|exists:users,name',
            'email' => 'required|exists:users,email',
            'phone' => 'required|exists:users,phone',
            'nim' => 'required|exists:users,nim',
            'password' => 'required|exists:users,password'
        ]);
        $user['password'] = Hash::make($user['password']);
        User::create($user);
            return redirect()->route('user.index')->with('success', 'Presensi data Tersimpan');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.show', [
            'user' => $user
        ]);    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $model = User::find($user->nim);
        return view("user.edit_profil", compact("model"));}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request-> validate([
        'miniclas_id' => 'required|exists:miniclass,id',
        'roles_id' => 'required|exists:roles,id',
        'generation_id' => 'required|exists:generation,id',
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'nim' => 'required',
        'password' => 'required']);
        $user['password'] = Hash::make($user['password']);
        User::where($user->nim)->update($validated);
        return redirect()->route('user.index')->with('User data Updated.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        user::destroy($user->nim);
        return redirect()->route('user.index')->with('User deleted.' );    }
}
