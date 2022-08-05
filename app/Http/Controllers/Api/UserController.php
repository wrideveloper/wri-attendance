<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return redirect("/admin/add-user")->with('success', 'Presensi data Tersimpan');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('user.show', [
            'user' => $user
        ]);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        return redirect('/dashboard')->with('success', 'Profil berhasil diubah');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::destroy($user->nim);
        return redirect()->route('user.index')->with('User deleted.');
        }
}
