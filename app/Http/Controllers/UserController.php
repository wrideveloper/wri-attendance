<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use App\Models\Miniclass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
            'miniclass_id' => 'required|exists:miniclasses,id',
            'roles_id' => 'required|exists:roles,id',
            'generations_id' => 'required|exists:generations,id',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nim' => 'required',
            'password' => 'required'
        ]);
        $user['password'] = Hash::make($user['password']);
        $user['miniclass_id'] = (int)$user['miniclass_id'];
        $user['roles_id'] = (int)$user['roles_id'];
        $user['generations_id'] = (int)$user['generations_id'];
        User::create($user);
        return redirect("/admin/add-user")->with('success', 'Presensi data Tersimpan');
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
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("user.edit_profil", [
            'user' => $user,
            'generations' => Generation::all(),
            'miniclasses' => Miniclass::all(),
            'title' => 'Edit Profile'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'miniclass_id' => 'required',
            'generations_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'password' => 'sometimes'
        ]);
        $validated['password'] = Hash::make($validated['password']);
        User::where('nim', $user->nim)->update($validated);
        return redirect()->back();
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
        return redirect()->route('user.index')->with('User deleted.');
    }
}
