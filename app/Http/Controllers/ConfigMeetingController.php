<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use App\Models\Presence;
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

    public function listMeetings(Meetings $meetings){
        return view('dashboard.list-meetings', [
            'meetings' => $meetings,
        ]);
    }

    // Hapus pertemuan
    public function deleteMeetings(Presence $presence) {
        Meetings::where('id', $presence->id)->delete();
        return redirect()->route('dashboard.list-meetings')->with('success', 'Meetings deleted successfully.');
    }

    // Berisi list presence dari mahasiswa pada miniclass yang dipilih
    public function checkPresence(Presence $presence) {
        return view('dashboard.check-presence', [
            'presence' => $presence,
        ]);
    }

    // Detail per anggota
    public function detailPresence(Presence $presence) {
        return view('dashboard.detail-presence', [
            'presence' => $presence,
        ]);
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
