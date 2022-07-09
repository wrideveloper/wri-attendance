<?php

namespace App\Http\Controllers;

use App\Models\Miniclass;
use Illuminate\Http\Request;

class MiniclassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $this->validate($request, [
        'miniclass_name' => 'required|max:255',
        ]);

        Miniclass::create($validatedData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Miniclass  $miniclass
     * @return \Illuminate\Http\Response
     */
    public function show(Miniclass $miniclass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Miniclass  $miniclass
     * @return \Illuminate\Http\Response
     */
    public function edit(Miniclass $miniclass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Miniclass  $miniclass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Miniclass $miniclass)
    {
        $validatedData = $this->validate($request, [
        'miniclass_name' => 'required|max:255',
        ]);

        Miniclass::where('id', $miniclass->id)->update($validatedData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Miniclass  $miniclass
     * @return \Illuminate\Http\Response
     */
    public function destroy(Miniclass $miniclass)
    {
        //
    }
}
