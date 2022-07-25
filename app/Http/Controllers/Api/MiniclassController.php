<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        return response()->json([
            'response' => Miniclass::all()
        ]);
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
        $validatedData = $request->validate([
            'miniclass_name' => 'required|max:255',
        ]);

        $miniclass = Miniclass::create($validatedData);
        return response()->json([
            'response' => $miniclass
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Miniclass $miniclass)
    {
        return response()->json([
            'response' => $miniclass,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Miniclass $miniclass)
    {
        return response()->json([
            'response' => $miniclass
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Miniclass $miniclass)
    {
        $validatedData = $request->validate([
            'miniclass_name' => 'required|max:255',
        ]);

        $updatedMiniclass = Miniclass::where('miniclass_name', $miniclass->miniclass_name)->update($validatedData);
        return response()->json([
            'response' => $updatedMiniclass
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Miniclass $miniclass)
    {
        Miniclass::where('miniclass_name', $miniclass->miniclass_name)->delete();
        return response()->json([
            'response' => 'success'
        ]);
    }
}
