<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Meetings;
use App\Models\Presence;
use App\Models\Miniclass;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller {

    public function index() {
        // next menggunakan Auth::user()
        $user = User::find(auth()->user()->id);
        $role = $user->roles->roles_name;
        if ($user->roles->roles_name === 'Admin') {
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
        } else if ($user->roles->roles_name === 'Kadiv') {
            $title = 'Dashboard';
            // KADIV
            $miniclass = $user->miniclass_id;
            $daftar_kehadiran = Meetings::where('miniclass_id', $miniclass)->orderBy('tanggal', 'asc')->skip(0)->take(5)->get(); // limit 5
            $jumlah_hadir = Miniclass::find($miniclass)->hadir->count();
            $jumlah_izin = Miniclass::find($miniclass)->izin->count();
            $jumlah_sakit = Miniclass::find($miniclass)->sakit->count();
            $jumlah_kehadiran = $jumlah_hadir + $jumlah_izin + $jumlah_sakit;
            $data_pie_kehadiran = [$jumlah_hadir, $jumlah_izin, $jumlah_sakit];

            if ($jumlah_kehadiran == 0) {
                $prosentase_hadir = 0;
                $prosentase_izin = 0;
                $prosentase_sakit = 0;
            } else {
                $prosentase_hadir = round($jumlah_hadir / $jumlah_kehadiran * 100, 1);
                $prosentase_izin = round($jumlah_izin / $jumlah_kehadiran * 100, 1);
                $prosentase_sakit = round($jumlah_sakit / $jumlah_kehadiran * 100, 1);
            }

            return view('kadiv.dashboard', compact(
                'daftar_kehadiran',
                'data_pie_kehadiran',
                'prosentase_hadir',
                'prosentase_izin',
                'prosentase_sakit',
                'title'
            ));
        } else if($user->roles->roles_name === 'Members') {
            $title = 'Dashboard';
            // MEMBER
            $miniclass = $user->miniclass_id;
            $presensi = Presence::where('nim', Auth::user()->nim)->skip(0)->take(5)->get(); // limit 5
            $timeline = Meetings::where('miniclass_id', $miniclass)->where('tanggal', '>=', '2022-05-25')->orderBy('tanggal', 'asc')->take(3)->get(); // limit 3
            $jumlah_hadir = $user->hadir->count();
            $jumlah_izin = $user->izin->count();
            $jumlah_sakit = $user->sakit->count();
            $jumlah_kehadiran = $jumlah_hadir + $jumlah_izin + $jumlah_sakit;
            $data_pie_kehadiran = [$jumlah_hadir, $jumlah_izin, $jumlah_sakit];

            if ($jumlah_kehadiran == 0) {
                $prosentase_hadir = 0;
                $prosentase_izin = 0;
                $prosentase_sakit = 0;
            } else {
                $prosentase_hadir = round($jumlah_hadir / $jumlah_kehadiran * 100, 1);
                $prosentase_izin = round($jumlah_izin / $jumlah_kehadiran * 100, 1);
                $prosentase_sakit = round($jumlah_sakit / $jumlah_kehadiran * 100, 1);
            }
            //dd($presensi);
            return view('user.dashboard', compact(
                'presensi',
                'timeline',
                'data_pie_kehadiran',
                'prosentase_hadir',
                'prosentase_izin',
                'prosentase_sakit',
                'title'
            ));
        } else {
            return redirect()->route('login')->with('loginError', 'Anda belum login');
        }
    }
}
