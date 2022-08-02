<?php

namespace App\Http\Controllers;

use \App\Models\Meetings;
use App\Models\Miniclass;
use \Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use \App\Http\Requests\MeetingsRequest;

class MeetingsController extends Controller {
        /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        $datas = Meetings::where('miniclass_id', Auth::user()->miniclass_id);
        return view('kadiv.list_pertemuan', compact(
            'datas' => $datas
        ));
    }

    public function create() {
        $miniclass = Miniclass::where('id', Auth::user()->miniclass_id)->first();
        return view('meetings.create', [
            'miniclass' => $miniclass,
            'title' => 'List Pertemuan'
        ]);
    }

    public function edit(Meetings $meeting) {
        $meetings = $meeting::where('token', $meeting->token)->first();
        return view('kadiv.config-presensi',[
            'meetings'=> $meetings,
            'title' => 'List Pertemuan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(MeetingsRequest $request) {
        $data = $request->validated();
        Meetings::create($data);
        return redirect()->route('dashboard')->with('success', 'Data berhasil ditambahkan');
    }



    /**
     * Display the specified resource.
     *
     *
     */
    public function show(Meetings $meeting)
    {
        return view('Meetings.show', [
            'Meetings' => $meeting
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
        Meetings::where('token', $meeting->token)->update($newData);
        return redirect()->route('dashboard')->with('success', 'Data meetings berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Meetings $meeting)
    {
        Meetings::destroy($meeting->id);
        return redirect()->route('Meetings.index');
    }
}
