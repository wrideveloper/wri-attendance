<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Meetings;
use App\Models\Presence;
use App\Models\Miniclass;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    public function index() {
        if (auth()->user()->roles_id == 1) {
            $title = 'Dashboard';
            // ADMIN
            $users = User::count();
            $meetings = Meetings::count();
            $miniclass = Miniclass::count();

            return view('admin.dashboard', compact(
                'users',
                'meetings',
                'miniclass',
                'title'
            ));
        } else if (auth()->user()->roles_id == 2) {
            $user = User::find(auth()->user()->id);
            $role = $user->roles->roles_name;
            $title = 'Dashboard';
            // KADIV
            $miniclass = $user->miniclass_id;
            $daftar_kehadiran = Meetings::where('miniclass_id', $miniclass)->orderBy('tanggal', 'asc')->skip(0)->take(5)->get(); // limit 5
            $jumlah_hadir = Miniclass::find($miniclass)->hadir->count();
            $jumlah_izin = Miniclass::find($miniclass)->izin->count();
            $jumlah_sakit = Miniclass::find($miniclass)->sakit->count();
            $jumlah_alpha = Miniclass::find($miniclass)->alpha->count();
            $jumlah_kehadiran = $jumlah_hadir + $jumlah_izin + $jumlah_sakit + $jumlah_alpha;
            $data_pie_kehadiran = [$jumlah_hadir, $jumlah_izin, $jumlah_sakit, $jumlah_alpha];

            if ($jumlah_kehadiran == 0) {
                $prosentase_hadir = 0;
                $prosentase_izin = 0;
                $prosentase_sakit = 0;
                $prosentase_alpha = 0;
            } else {
                $prosentase_hadir = round($jumlah_hadir / $jumlah_kehadiran * 100, 1);
                $prosentase_izin = round($jumlah_izin / $jumlah_kehadiran * 100, 1);
                $prosentase_sakit = round($jumlah_sakit / $jumlah_kehadiran * 100, 1);
                $prosentase_alpha = round($jumlah_alpha / $jumlah_kehadiran * 100, 1);
            }

            return view('kadiv.dashboard', compact(
                'daftar_kehadiran',
                'data_pie_kehadiran',
                'prosentase_hadir',
                'prosentase_izin',
                'prosentase_sakit',
                'prosentase_alpha',
                'title'
            ));
        } else if(auth()->user()->roles_id == 3) {
            $user = User::find(auth()->user()->id);
            $role = $user->roles->roles_name;
            $title = 'Dashboard';
            $currentTime = Carbon::now()->format('H:i:s');
            $currentDate = Carbon::now()->format('Y-m-d');

            // MEMBER
            $presensi = Presence::where('nim', Auth::user()->nim)->skip(0)->take(5)->get(); // limit 5

            // Menampilkan timeline, ada pengkondisian apabila sudah melakukan presensi maka timeline tidak muncul
            $timeline = Meetings::where('miniclass_id', Auth::user()->miniclass_id)
                        // ->whereDate('tanggal', '=', $currentDate)
                        ->where('end_time', '>=', $currentTime)
                        // Menampilkan timeline yang nim tersebut belum pernah melakukan presensi di meetings tersebut
                        ->whereNotExists(function ($query) {
                            $query->select(DB::raw(1))
                                  ->from('presences')
                                  ->whereRaw('presences.meetings_id = meetings.id')
                                  ->where('presences.nim', Auth::user()->nim);
                        })
                        ->orderBy('tanggal', 'asc')->take(3)->get(); // limit 3

            $jumlah_hadir = $user->hadir->count();
            $jumlah_izin = $user->izin->count();
            $jumlah_sakit = $user->sakit->count();
            $jumlah_alpha = $user->alpha->count();
            $jumlah_kehadiran = $jumlah_hadir + $jumlah_izin + $jumlah_sakit + $jumlah_alpha;
            $data_pie_kehadiran = [$jumlah_hadir, $jumlah_izin, $jumlah_sakit, $jumlah_alpha];

            if ($jumlah_kehadiran == 0) {
                $prosentase_hadir = 0;
                $prosentase_izin = 0;
                $prosentase_sakit = 0;
                $prosentase_alpha = 0;
            } else {
                $prosentase_hadir = round($jumlah_hadir / $jumlah_kehadiran * 100, 1);
                $prosentase_izin = round($jumlah_izin / $jumlah_kehadiran * 100, 1);
                $prosentase_sakit = round($jumlah_sakit / $jumlah_kehadiran * 100, 1);
                $prosentase_alpha = round($jumlah_alpha / $jumlah_kehadiran * 100, 1);
            }
            $currentYear = Carbon::now()->year;
            $nextYear = Carbon::now()->addYear()->year;
            //dd($presensi);
            return view('user.dashboard', compact(
                'presensi',
                'timeline',
                'data_pie_kehadiran',
                'prosentase_hadir',
                'prosentase_izin',
                'prosentase_sakit',
                'prosentase_alpha',
                'title',
                'currentYear',
                'nextYear'
            ));
        } else {
            return redirect()->route('login')->with('loginError', 'Anda belum login');
        }
    }
}
