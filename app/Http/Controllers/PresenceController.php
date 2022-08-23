<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Meetings;
use App\Models\Presence;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PresenceRequest;

class PresenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presence = Presence::where('nim', Auth::user()->nim)->filter(request(['search']))->paginate(5)->withQueryString();
        return view('user.list-absensi', [
            'presence' => $presence,
            'title' => 'Presensi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('presence.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePresenceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PresenceRequest $request)
    {
        $cekMeetings = Meetings::firstWhere('topik', request('topik'));

        $presence_date = Carbon::now()->format('Y-m-d');

        $presence = $request->validated();

        $presence['nim'] = Auth::user()->nim;
        $presence['presence_date'] = $presence_date;
        $presence['meetings_id'] = $cekMeetings->id;

        if ($presence['nim'] == null || $presence['meetings_id'] == null || $presence['presence_date'] == null) {
            return redirect()->back()->with('PresenceError', 'Data tidak boleh kosong');
        } else {
            if ($presence['status'] === 'Hadir') {
                $checkUser = Presence::where('nim', Auth::user()->nim)->where('token', $presence['token'])->first();

                if ($presence['token'] == $cekMeetings->token && $cekMeetings->end_time >= now() && !$checkUser && $cekMeetings->tanggal === $presence_date) {
                    Presence::create($presence);
                    return redirect()->route('dashboard')->with('success', 'Presensi berhasil');
                } else {
                    return redirect()->with('PresenceError', 'Presensi error, silahkan cek kembali form anda');
                }
            } else if ($cekMeetings->end_time >= now() && $presence['status'] !== 'Hadir' && $cekMeetings->tanggal === $presence_date) {
                Presence::create($presence);
                return redirect()->route('dashboard')->with('success', 'Presensi berhasil');
            } else {
                return redirect()->with('PresenceError', 'Presensi error, silahkan cek kembali form anda');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function show(Presence $presence)
    {
        $presences = Presence::where('nim', Auth::user()->nim)
            ->whereHas('meetings', function ($query) use ($presence) {
                $query->where('topik', $presence->meetings->topik);
            })->first();
        return view('admin.edit_absensi', [
            'presence' => $presences,
            'title' => 'Presensi',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function edit(Presence $presence)
    {
        return view('admin.edit_absensi', [
            'presence' => $presence,
            'title' => 'Presensi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePresenceRequest  $request
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function update(PresenceRequest $request, Presence $presence)
    {
        $validated = $request->validated();
        Presence::where('nim', $presence->nim)->update($validated);
        return redirect()->route('presence.index')->with('success', 'Presence updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Presence  $presence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Presence $presence)
    {
        Presence::destroy($presence->user->nim);
        return redirect()->route('presence.index')->with('success', 'Presence deleted successfully.');
    }
}