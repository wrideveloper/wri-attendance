<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Generation;

class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Generation::all();
        return view('generation.index',[
            'datas' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('generation.create');
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
            'crew_name' => 'required|max:255',
        ]);
    
        Generation::create($validatedData);
        return redirect()->route('generation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($crew_name)
    {
        $data=Generation::where('crew_name',$crew_name)->get();
        return view('generation.show',[
            'datas' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Generation::find($id);
        return view('generation.edit',[
            'datas' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $this->validate($request, [
            'crew_name' => 'required|max:255',
        ]);
    
        $data = Generation::find($id);
        $data->update($validatedData);
        return redirect()->route('generation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Generation::find($id);
        $data->delete();
        return redirect()->route('generation.index');
    }
}
