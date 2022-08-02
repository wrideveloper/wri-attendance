<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meetings;
use App\Models\Presence;
use App\Models\Miniclass;
use App\Models\Generation;
use Illuminate\Http\Request;

class ConfigMeetingController extends Controller {

    // Untuk melakukan post presence
    public function postPresence(Request $request){
        $validated = $request->validate([
            'miniclasses_id' => 'required|exists:miniclasses,id',
            'topik' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'pertemuan' => 'required|integer',
            'token' => 'required|string|max:10',
        ]);

        Meetings::create($validated);
        return redirect()->route('dashboard.list-meetings')->with('success', 'Post Presensi berhasil');
    }

    public function createMeetings() {
        return view('dashboard.create-meetings');
    }

    // Untuk melakukan updatepresence
    public function updateMeetings(Request $request, Meetings $meetings) {
        $rule = [
            'miniclasses_id' => 'required|exists:miniclasses,id',
            'topik' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'pertemuan' => 'required|integer',
            'token' => 'required|string|max:10',
        ];

        $validated = $request->validate($rule);
        Meetings::where('id', $meetings->id)->update($validated);
        return redirect()->route('dashboard.list-meetings')->with('success', 'Update Meeting berhasil');
    }

    public function listPresence(Meetings $meetings){
        $meeting = Meetings::where('token', $meetings->token)->first();
        $presence = Presence::where('meetings_id', $meeting->id)->filter(request(['search']))->paginate(5)->withQueryString();
        return view('kadiv.attendance_list', [
            'presence' => $presence,
            'meeting' => $meeting,
            'title' => 'Config Presensi'
        ]);
    }

    // Hapus pertemuan
    public function deleteMeetings(Meetings $meetings) {
        Meetings::where('token', $meetings->token)->delete();
        return redirect()->back()->with('success', 'Meetings berhasil dihapus!');
    }

    // Berisi list presence dari mahasiswa pada miniclass yang dipilih
    public function checkPresence(Presence $presence) {
        return view('dashboard.check-presence', [
            'presence' => $presence,
        ]);
    }

    // Detail per anggota
    public function detailPresence(Presence $presence) {
        $user = User::where('nim', $presence->nim)->first();
        $gen = Generation::where('id', $user->generations_id)->first();
        $mc = Miniclass::where('id', $user->miniclass_id)->first();
        return view('admin.edit_absensi', [
            'presence' => $presence,
            'user' => $user,
            'gen' => $gen,
            'mc' => $mc,
            'title' => 'Config Presensi',
            'generations' => Generation::all(),
            'miniclasses' => Miniclass::all()
        ]);
    }

    public function show(Meetings $meeting) {
        $meetings = Meetings::where('token', $meeting->token)->firstOrFail();
        return view('kadiv.config-presensi', [
            'meetings' => $meetings
        ]);
    }
    public function listMeeting(){
        $datas = Meetings::where('miniclass_id', Auth::user()->miniclass_id);
        return view('kadiv.meetings_list', compact([
            'datas' => $datas
        ]));
    }

    // Update dari masing-masing anggota
    public function updatePresence(Request $request, Presence $presence) {
        $rule = [
            'status' => 'required|',
        ];
        $validated = $request->validate($rule);
        Presence::where('id', $presence->id)->update($validated);
        return redirect()->route('dashboard.detail-presence')->with('success', 'Presence updated successfully.');
    }

    // Hapus Presesnce
    public function deletePresence(Presence $presence) {
        Presence::where('id', $presence->id)->delete();
        return redirect()->route('dashboard.check-presence')->with('success', 'Presence deleted successfully.');
    }
}
