<?php

namespace App\Http\Controllers;

use \App\Http\Requests\MeetingsRequest;
use \App\Models\Meetings;
use \Illuminate\Http\Response;
use App\Http\Controller;

class MeetingsController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {
        $datas -> Meetings::all;
        return view('Meetings.index', compact([
            'datas' => $datas
        ]));
    }

    public function create()
    {
        return view('Meetings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(MeetingsRequest $request)
    {
        $datas = $this->validate($request, [
            all()
        ]);
        Meetings::create($request);
        return redirect()->route('Meetings.index');
    }



    /**
     * Display the specified resource.
     *
     *
     */
    public function show($id)
    {
        $data = Meetings::where('id', $id)->get();
        return view('Meetings.show', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * 
     */
    public function edit(MeetingsResponse $request, $id)
    {
        $newData = $this->validate($request, all());
        $data = Meetings::where('id', $id)->get();
        $data->update([
            all() => $newData[all()]
        ]);
        return redirect()->route('Meetings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy($id)
    {
        $datas = collect(Meetings::all)->forget($id);
        return redirect()->route('Meetings.index', compact([
            'datas' => $data
        ]));
    }
}
