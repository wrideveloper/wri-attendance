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
            'id' => 'required|exists:users,id',
            'miniclas_id' => 'required|exists:miniclass,id',
            'roles_id' => 'required|exists:roles,id',
            'generation_id' => 'required|exists:generation,id',
            'name' => 'required|exists:users,name',
            'email' => 'required|exists:users,email',
            'phone' => 'required|exists:users,phone',
            'nim' => 'required|exists:users,nim',
            'password' => 'required|exists:users,password',
        ]);
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
        $model = User::find($user->id);
        return view("user.edit_profil", compact("model"));}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $id)
    {
        $validated = $request-> validate(["user_id" => "required",])
        $model = User::find($id);
        $model -> user_id = $validated["user_id"];
        $model -> save();
        return redirect('user' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        user::destroy($user->nama);
        return redirect()->route('user.index')->with('Presence deleted.' );    }
}
