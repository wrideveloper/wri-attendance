<?php

namespace App\Http\Controllers;

use App\Models\Meetings;
use App\Models\Miniclass;
use App\Models\Presence;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // next menggunakan Auth::user()
        $user = User::find(auth()->user()->id);
        $role = $user->roles->roles_name;
        // ini kan data precense auto generate ketika kadiv membuat miniclas meeting baru, default status e apa?
        if ($role == 'Admin') {
            // ADMIN
            $users = User::count();
            $meetings = Meetings::count();
            $miniclass = Miniclass::count();

            return view('admin.dashboard', compact(
                'users',
                'meetings',
                'miniclass'
            ));
        } else if ($role == 'Kadiv') {
            // KADIV
            $miniclass = $user->miniclass_id;
            $daftar_kehadiran = Meetings::where('miniclass_id', $miniclass)->orderBy('id', 'desc')->skip(0)->take(5)->get(); // limit 5
            $jumlah_hadir = Miniclass::find($miniclass)->hadir->count();
            $jumlah_izin = Miniclass::find($miniclass)->izin->count();
            $jumlah_sakit = Miniclass::find($miniclass)->sakit->count();
            $jumlah_kehadiran = $jumlah_hadir + $jumlah_izin + $jumlah_sakit;
            $data_pie_kehadiran = [$jumlah_hadir, $jumlah_izin, $jumlah_sakit];
            $prosentase_hadir = round($jumlah_hadir / $jumlah_kehadiran * 100, 1);
            $prosentase_izin = round($jumlah_izin / $jumlah_kehadiran * 100, 1);
            $prosentase_sakit = round($jumlah_sakit / $jumlah_kehadiran * 100, 1);

            return view('kadiv.dashboard', compact(
                'daftar_kehadiran',
                'data_pie_kehadiran',
                'prosentase_hadir',
                'prosentase_izin',
                'prosentase_sakit',
            ));
        } else {
            // MEMBER
            $miniclass = $user->miniclass_id;
            $daftar_kehadiran = $user->presence->take(5); // limit 5
            // Timeline ini untuk semua miniclass atau hanya miniclass si anggota?
            $timeline = Meetings::where('miniclass_id', $miniclass)->where('tanggal', '>=', '2022-05-25')->orderBy('tanggal', 'asc')->take(3)->get(); // limit 3
            $jumlah_hadir = $user->hadir->count();
            $jumlah_izin = $user->izin->count();
            $jumlah_sakit = $user->sakit->count();
            $jumlah_kehadiran = $jumlah_hadir + $jumlah_izin + $jumlah_sakit;
            $data_pie_kehadiran = [$jumlah_hadir, $jumlah_izin, $jumlah_sakit];
            $prosentase_hadir = round($jumlah_hadir / $jumlah_kehadiran * 100, 1);
            $prosentase_izin = round($jumlah_izin / $jumlah_kehadiran * 100, 1);
            $prosentase_sakit = round($jumlah_sakit / $jumlah_kehadiran * 100, 1);

            return view('user.dashboard', compact(
                'daftar_kehadiran',
                'timeline',
                'data_pie_kehadiran',
                'prosentase_hadir',
                'prosentase_izin',
                'prosentase_sakit',
            ));
        }
    }
}
