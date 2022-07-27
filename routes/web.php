<?php

use App\Models\Presence;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PresenceController;
use App\Http\Controllers\ConfigMeetingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MiniclassController;
use App\Http\Controllers\RegisterController;
use App\Models\Meetings;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login-page', function () {
    return view('auth.login');
});

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('auth.forgotpassword');
})->name('forgot-password');

Route::get('/reset-password', function () {
    return view('auth.gantipass');
})->name('reset-password');

Route::get('/post-absensi', function () {
    return view('user.input_absensi', [
        'title' => 'Sistem Absensi Miniclass',
    ]);
})->name('post-absensi');

// home route after login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::get('/user/edit-profil', fn () => view('user.edit_profil'));
Route::get('/user/input_absensi', fn () => view('user.input_absensi'));

Route::get('/kadiv/edit-profil', fn () => view('kadiv.edit_profil'));
Route::get('/kadiv/attendance-list', fn () => view('kadiv.attendance_list'));

Route::get('/admin/add-user', fn () => view('admin.add_user'));
Route::get('/admin/dashboard', fn () => view('admin.dashboard', [
    'title' => 'Dashboard',
]));
Route::get('/admin/edit-absensi', fn () => view('admin.edit_absensi'));
Route::get('/admin/edit-profil', fn () => view('admin.edit_profil'));

Route::resource('/miniclass', MiniclassController::class);

Route::prefix('/kadiv')->group(function() {
    Route::get('/config-presensi', fn () => view('kadiv.config-presensi', [
        'title' => 'Config Presensi',
    ]));
    Route::get('/edit-presensi', fn () => view('kadiv.config-presensi', [
        'title' => 'Config Presensi',
    ]));
    Route::get('/check-presence/detail/{presence}/pertemuan-{presence}', [ConfigMeetingController::class, 'detailPresence'])->name('detail-presence');

    // Delete Meetings
    Route::delete('/delete-meetings/{meetings}', [ConfigMeetingController::class, 'deleteMeetings'])->name('delete-meetings');
});

// Sisi User
Route::resource('/presence', PresenceController::class);
// Configurasi Meetings dan Presence dari sisi Admin
Route::controller(ConfigMeetingController::class)->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/config-meeting', 'listMeetings')->name('list-meetings');
        Route::get('/check-presence/{presence}', 'checkPresence')->name('check-presence');
        //Route::get('/check-presence/{presence}/detail', 'detailPresence')->name('detail-presence');
        Route::get('/config-meeting/create', 'createMeetings')->name('create-meetings');

        // Update Meetings
        Route::put('/check-presence/{presence}', 'updateMeetings')->name('update-meetings');

        // Add Meetings
        Route::post('/config-meeting/post', 'postPresence')->name('post-presence');

        // Update Presence
        Route::put('/check-presence/{presence}/edit', 'updatePresence')->name('update-presence');

        // Delete Presence
        Route::delete('/check-presence/{presence}/edit', 'deletePresence')->name('delete-presence');
    });
});
