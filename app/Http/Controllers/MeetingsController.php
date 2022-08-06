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
        $datas = Meetings::where('miniclass_id', Auth::user()->miniclass_id)
        ->filter(request(['search']))
        ->orderBy('tanggal', 'asc')
        ->paginate(5)->withQueryString();
        $title = 'List Pertemuan';
        return view('kadiv.list_pertemuan', compact('datas', 'title'));

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
        $checking = Meetings::where('token', $data['token'])->first();
        if($checking) {
            return redirect()->back()->with('error', 'Token sudah digunakan');
        } else {
            Meetings::create($data);
            return redirect()->route('dashboard')->with('success', 'Pertemuan berhasil ditambahkan');
        }
    }



    /**
     * Display the specified resource.
     *
     *
     */
    public function show(Meetings $meeting)
    {
        return view('kadiv.config-presensi', [
            'meetings'=> $meeting,
            'title' => 'List Pertemuan'
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
        $datas = Meetings::where('token', $meeting->token)->update($newData);
        //ddd($datas);
        return redirect()->route('dashboard')->with('success', 'Data meetings berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Meetings $meeting)
    {
        $destroy = Meetings::destroy($meeting->id);
        return redirect()->route('dashboard')->with('success', 'Data meetings berhasil dihapus');;
    }
}
