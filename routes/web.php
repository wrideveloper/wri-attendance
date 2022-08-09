<?php

use Carbon\Carbon;
use App\Models\Meetings;
use App\Models\Presence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForPasController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MiniclassController;
use App\Http\Controllers\GenerationController;
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

Route::get('tested', function () {
    return view('kadiv.list_pertemuan', ['title' => 'Dashboard']);
});

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/login-page', function () {
//     return view('auth.login');
// });

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', function () {
    return view('auth.forgotpassword');
})->name('forgot-password');
Route::post('/send-forpas-mail', [ForPasController::class, 'forpas']);
Route::post('/ganti-pass', [ForPasController::class, 'reset']);
Route::get('/reset-password/{token}', [ForPasController::class, 'halaman_reset'])->name('reset-password');

//
// Route::get('/post-absensi', function () {
//     return view('user.input_absensi', [
//         'title' => 'Sistem Absensi Miniclass',
//     ]);
// })->name('post-absensi');

//
Route::get('/presence/{miniclass:miniclass_name}/pertemuan-{meetings:pertemuan}/{meetings:topik}',
[ConfigMeetingController::class, 'inputPresence'] )->name('input.presence')->middleware('auth');


// home route after login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::resource('/user', UserController::class);
Route::get('/user/input_absensi', fn () => view('user.input_absensi'));

Route::get('/kadiv/edit-profil', fn () => view('kadiv.edit_profil'));
Route::get('/kadiv/attendance-list', fn () => view('kadiv.attendance_list'));

Route::get('/admin/add-user', fn () => view('admin.add_user', ['generations' => DB::table('generations')->get(), 'miniclasses' => DB::table('miniclasses')->get()]));
// Route::post('/admin/add-user', [UserController::class, 'store'])->name('adminAddUser');
Route::get('/admin/dashboard', fn () => view('admin.dashboard', [
    'title' => 'Dashboard',
]));
Route::get('/admin/edit-absensi', fn () => view('admin.edit_absensi', [
    'title' => 'Edit Absensi',
]));
Route::get('/admin/edit-profil', fn () => view('admin.edit_profil'));

Route::resource('/miniclass', MiniclassController::class);

Route::group(['prefix' => 'kadiv', 'middleware' => ['auth']], function () {
    // Route::get('/edit-meetings/{meetings}', [MeetingsController::class, 'edit'])->name('edit-meetings');
    Route::resource('/meetings', MeetingsController::class);
    Route::get('/rekap-meeting/{meetings}', [ConfigMeetingController::class, 'listPresence'])->name('list-presence');
    Route::get('/check-meetings/detail/{meetings}', [ConfigMeetingController::class, 'show'])->name('detail-meetings');
    Route::get('/check-presence/detail/{presence}', [ConfigMeetingController::class, 'detailPresence'])->name('detail-presence');

    // Delete Meetings
    Route::delete('/delete-meetings/{meetings}', [ConfigMeetingController::class, 'deleteMeetings'])->name('delete-meetings');
    // Route::get('/list-pertemuan', [Meeti])->name('list-pertemuan');
    // Route::get('/check-presence/{presence}', 'checkPresence')->name('check-presence');
});

// Sisi User
Route::resource('/presence', PresenceController::class)->middleware('auth');
// Configurasi Meetings dan Presence dari sisi Admin
Route::controller(ConfigMeetingController::class)->group(function () {
    Route::get('/presence/detail/{presence}', [ConfigMeetingController::class, 'detailPresence'])->name('presence-members');
    Route::prefix('/dashboard')->group(function () {
        Route::get('/config-meeting', 'listMeetings')->name('list-meetings');
        // Route::get('/check-presence/{presence}', 'checkPresence')->name('check-presence');
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
