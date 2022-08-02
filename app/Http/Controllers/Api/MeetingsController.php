<?php

namespace App\Http\Controllers\Api;

use \App\Http\Requests\MeetingsRequest;
use \App\Models\Meetings;
use \Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class MeetingsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        return response()->json([
            'response' => Meetings::where('miniclass_id', Auth::user()->miniclass_id)
        ]);
    }
    
    public function edit(Meetings $meeting)
    {
        return response()->json([
            'response' => $meeting
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(MeetingsRequest $request)
    {
        $data = $request->validated();
        Meetings::create($data);
        return response()->json([
            'response' => $data
        ]);
    }



    /**
     * Display the specified resource.
     *
     *
     */
    public function show(Meetings $meeting){
        return response()->json([
            'response' => $meeting
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
    public function update(MeetingsRequest $request, Meetings $meeting)
    {
        $newData = $request->validated();
        $data = Meetings::where('id', $meeting->id)->update($newData);
        return response()->json([
            'response' => $data
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Meetings $meeting)
    {
        Meetings::destroy($meeting->id);
        return response()->json([
            'response' => 'success'
        ]);
    }
}
