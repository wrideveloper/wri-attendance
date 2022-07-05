<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Roles::all();
        return view("roles.index", compact(
            "datas"
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Roles();
        return view("roles.create", compact(
            "model"
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRolesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "roles_name" => "required",
        ]);
        $model = new Roles();
        $model->roles_name = $validated["roles_name"];

        $model->save();

        return redirect('roles');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Roles::find($id);
        return view("roles.edit", compact(
            "model"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRolesRequest  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            "roles_name" => "required",
        ]);
        $model = Roles::find($id);
        $model->roles_name = $validated["roles_name"];

        $model->save();

        return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Roles::find($id);
        $model->delete();
        return redirect("roles");
    }
}
