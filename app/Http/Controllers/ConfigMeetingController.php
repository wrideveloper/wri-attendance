<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meetings;
use App\Models\Presence;
use App\Models\Miniclass;
use App\Models\Generation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ConfigMeetingController extends Controller
{

    // Untuk melakukan post presence
    public function postPresence(Request $request)
    {
        $validated = $request->validate([
            'miniclasses_id' => 'required|exists:miniclasses,id',
            'topik' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'pertemuan' => 'required|integer',
            'token' => 'required|string|max:10',
        ]);
        $validated['slug'] = Str::slug($validated['topik']);
        Meetings::create($validated);
        return redirect()->route('dashboard.list-meetings')->with('success', 'Post Presensi berhasil');
    }

    public function createMeetings()
    {
        return view('dashboard.create-meetings');
    }

    public function inputPresence($miniclass_name, $pertemuan, $slug)
    {
        $meeting = Meetings::where('pertemuan', $pertemuan)
            ->where('slug', $slug)
            ->whereHas('miniclass', function ($query) use ($miniclass_name) {
                $query->where('miniclass_name', $miniclass_name);
            })->first();
        //dd($meeting);
        return view('user.input_absensi', [
            'meetings' => $meeting,
            'title' => 'Presensi'
        ]);
    }

    // Untuk melakukan updatepresence
    public function updateMeetings(Request $request, Meetings $meetings)
    {
        $rule = [
            'miniclasses_id' => 'required|exists:miniclasses,id',
            'topik' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'pertemuan' => 'required|integer',
            'token' => 'required|string|max:10',
        ];

        $validated = $request->validate($rule);
        $validated['slug'] = Str::slug($validated['topik']);
        Meetings::where('id', $meetings->id)->update($validated);
        return redirect()->route('dashboard.list-meetings')->with('success', 'Update Meeting berhasil');
    }

    public function listPresence(Meetings $meetings)
    {
        // $presence = Presence::where('meetings_id', $meeting->id)->filter(request(['search']))->paginate(5)->withQueryString();
        $presence = DB::table('users')
                    ->select('users.name AS name', 'presences.status AS status', 'meetings.topik AS topik',
                    'presences.created_at AS created_at', 'presences.nim AS nim', 'meetings.slug AS slug')
                    ->leftJoin('presences', function($join) use ($meetings){
                        $join->on('users.nim', 'presences.nim')
                                ->where('presences.meetings_id', $meetings->id);
                    })
                    ->leftJoin('meetings', function($join) use ($meetings){
                        $join->on('meetings.miniclass_id', 'presences.meetings_id')
                        ->where('meetings.miniclass_id', $meetings->miniclass_id);
                    })
                    ->where('users.miniclass_id', $meetings->miniclass_id)
                    ->where('users.roles_id', 3)
                    ->orderBy('presences.created_at','DESC')->paginate(5);
        return view('kadiv.attendance_list', [
            'presence' => $presence,
            'meeting' => $meetings,
            'title' => 'List Pertemuan'
        ]);
    }

    // Hapus pertemuan
    public function deleteMeetings(Meetings $meetings)
    {
        Meetings::where('token', $meetings->token)->delete();
        return redirect()->back()->with('success', 'Meetings berhasil dihapus!');
    }

    // Berisi list presence dari mahasiswa pada miniclass yang dipilih
    public function checkPresence(Presence $presence)
    {
        return view('dashboard.check-presence', [
            'presence' => $presence,
        ]);
    }

    // Detail per anggota
    public function detailPresence($nim, $slug) {
        $presences = Presence::where('nim', $nim)
                    ->whereHas('meetings', function ($query) use ($slug) {
                        $query->where('slug', $slug);
                    })
                    ->first();
        $user = User::where('nim', $nim)->first();
        $gen = Generation::where('id', $user->generations_id)->first();
        $mc = Miniclass::where('id', $user->miniclass_id)->first();
        return view('admin.edit_absensi', [
            'presence' => $presences,
            'user' => $user,
            'gen' => $gen,
            'mc' => $mc,
            'title' => 'List Pertemuan',
            'generations' => Generation::all(),
            'miniclasses' => Miniclass::all()
        ]);
    }

    public function show(Meetings $meeting)
    {
        $meetings = Meetings::where('token', $meeting->token)->firstOrFail();
        return view('kadiv.config-presensi', [
            'meetings' => $meetings,
            'title' => 'List Pertemuan'
        ]);
    }

    // Update dari masing-masing anggota
    public function updatePresence(Request $request, Presence $presence)
    {
        $rule = [
            'status' => 'required|',
        ];
        $validated = $request->validate($rule);
        Presence::where('id', $presence->id)->update($validated);
        return redirect()->route('dashboard.detail-presence')->with('success', 'Presence updated successfully.');
    }

    // Hapus Presesnce
    public function deletePresence(Presence $presence)
    {
        Presence::where('id', $presence->id)->delete();
        return redirect()->route('dashboard.check-presence')->with('success', 'Presence deleted successfully.');
    }

    // Lihat detail presensi dari sisi user
    public function showDetails(Presence $presence, $topik)
    {
        $presences = Presence::where('nim', $presence->nim)
            ->whereHas('meetings', function ($query) use ($topik) {
                $query->where('topik', $topik);
            })->first();
        return view('admin.edit_absensi', [
            'presence' => $presences,
            'title' => 'Presensi',
        ]);
    }
}
