<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Miniclass;
use App\Models\Generation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $user = User::filter(request(['search']))
                ->orderBy('name', 'asc')
                ->paginate(5)->withQueryString();
        return view('user.index', [
            'user' => $user,
            'title' => 'Edit User',
            'generations' => Generation::all(),
            'miniclass' => Miniclass::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_user', [
            'generations' => DB::table('generations')->get(),
            'miniclasses' => DB::table('miniclasses')->get()
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
        $user = $request->validate([
            'miniclass_id' => 'required|exists:miniclasses,id|integer',
            'roles_id' => 'required|exists:roles,id|integer',
            'generations_id' => 'required|exists:generations,id|integer',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'nim' => 'required',
            'password' => 'required',
            'roles_id' => 'required|exists:roles,id|integer',
        ]);
        $user['password'] = Hash::make($user['password']);
        $user['miniclass_id'] = (int)$user['miniclass_id'];
        $user['roles_id'] = (int)$user['roles_id'];
        $user['generations_id'] = (int)$user['generations_id'];

        User::create($user);
        return redirect()->route('user.index')->with('success', 'Anggota baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.edit_profil', [
            'user' => $user,
            'title' => 'Edit User',
            'generations' => Generation::all(),
            'miniclasses' => Miniclass::all(),
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
            'miniclass_id' => 'prohibited',
            'generations_id' => 'prohibited',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'sometimes',
            'phone' => 'sometimes'
        ]);

        if(request()->password){
            $validated['password'] = Hash::make($request['password']);
        } else {
            $validated['password'] = $user->password;
        }

        if(Auth::user()->roles_id == 1) {
            $validated['phone'] = $request->phone;
        } else {
            $validated['phone'] = $user->phone;
        }

        User::where('nim', $user->nim)->update($validated);
        return redirect()->route('dashboard')->with('success', 'Profil berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $users = User::where('nim', $user->nim)->delete();
        return redirect()->route('user.index')->with('success', 'Data anggota berhasil dihapus');
    }
}
