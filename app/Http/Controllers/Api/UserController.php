<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
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
        return response()->json([
            'response' => User::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'miniclass_id' => 'required|exists:miniclasses,id',
            'roles_id' => 'required|exists:roles,id',
            'generations_id' => 'required|exists:generations,id',
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'nim' => 'required',
            'password' => 'required'
        ]);
        $user = User::create($request->all());
        return response()->json([
            'response' => $user
        ]);

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $id) {
        return response()->json([
            'response' => $user,
        ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        // $rule = $request->validated();
        $updatedUser = User::where('nim', $user->nim)->update($validated);
        return response()->json([
            'response' => $updatedUser
        ]);}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('nim', $user->nim)->delete();
        return response()->json([
            'response' => 'User deleted.'
        ]);

    }
}
