<?php

use App\Models\Presence;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PresenceController;
use App\Http\Controllers\ConfigMeetingController;

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
    return view('login.login');
});
Route::get('/forgot-password', function () {
    return view('login.forgotpassword');
})->name('forgot-password');

Route::get('/reset-password', function () {
    return view('login.gantipass');
})->name('reset-password');

Route::get('/post-absensi', function () {
    return view('user.input_absensi');
})->name('post-absensi');

Route::get('/user', fn () => view('user.dashboard'));
Route::get('/user/edit-profil', fn () => view('user.edit_profil'));
Route::get('/user/input_absensi', fn () => view('user.input_absensi'));

Route::get('/kadiv', fn () => view('kadiv.dashboard'));
Route::get('/kadiv/edit-profil', fn () => view('kadiv.edit_profil'));
Route::get('/kadiv/update-jadwal', fn () => view('kadiv.update_jadwal'));
Route::get('/kadiv/attendance-list', fn () => view('kadiv.attendance_list'));

Route::get('/admin/add-user', fn () => view('admin.add_user'));
Route::get('/admin/edit-profil', fn () => view('admin.edit_profil'));

// Sisi User
Route::resource('/presence', PresenceController::class);

// Configurasi Meetings dan Presence dari sisi Admin
Route::controller(ConfigMeetingController::class)->group(function () {
    Route::prefix('/dashboard')->group(function () {
        Route::get('/config-meeting', 'listMeetings')->name('list-meetings');
        Route::get('/check-presence/{presence}', 'checkPresence')->name('check-presence');
        Route::get('/check-presence/{presence}/detail', 'detailPresence')->name('detail-presence');
        Route::get('/config-meeting/create', 'createMeetings')->name('create-meetings');

        // Update Meetings
        Route::put('/check-presence/{presence}', 'updateMeetings')->name('update-meetings');

        // Add Meetings
        Route::post('/config-meeting/post', 'postPresence')->name('post-presence');

        // Delete Meetings
        Route::delete('/check-meetings/{presence}', 'deleteMeetings')->name('delete-meetings');

        // Update Presence
        Route::put('/check-presence/{presence}/edit', 'updatePresence')->name('update-presence');

        // Delete Presence
        Route::delete('/check-presence/{presence}/edit', 'deletePresence')->name('delete-presence');
    });
});
