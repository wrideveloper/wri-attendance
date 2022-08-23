<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ForPasController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ConfigMeetingController;
use Illuminate\Support\Facades\Auth;

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

// authentication

Route::get('/', function () {
    return view('auth.login');
});
// login and logout
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password
Route::get('/forgot-password', function () {
    return view('auth.forgotpassword');
})->name('forgot-password');
Route::post('/send-forpas-mail', [ForPasController::class, 'forpas'])->name('send-forpas-email');
Route::post('/ganti-pass', [ForPasController::class, 'reset'])->name('post-reset-password');
Route::get('/reset-password/{token}', [ForPasController::class, 'halaman_reset'])->name('reset-password');
// end forgot password

// end authentication

// general route
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::resource('/presence', PresenceController::class)->middleware('auth');
Route::get('/presence/{presence:nim}/{topik}', [ConfigMeetingController::class, 'showDetails'])->middleware('auth')->name('show-details');
Route::get(
    '/presence/{miniclass_name}/pertemuan-{pertemuan}/{topik}',
    [ConfigMeetingController::class, 'inputPresence']
)->name('input.presence')->middleware('auth');
// end general route

// User
Route::group(['prefix' => 'users', 'middleware' => ['auth']], function () {
    Route::resource('/presence', PresenceController::class);
    Route::get(
        '/presence/{miniclass_name}/pertemuan-{pertemuan}/{topik}',
        [ConfigMeetingController::class, 'inputPresence']
    )->name('input.presence');
    Route::resource('/user', UserController::class)->only(['edit', 'update']);
});
// end user

// kadiv
Route::group(['prefix' => 'kadiv', 'middleware' => ['auth']], function () {
    // meetings
    Route::resource('/meetings', MeetingsController::class);
    Route::get('/rekap-meeting/{meetings}', [ConfigMeetingController::class, 'listPresence'])->name('list-presence');
    Route::get('/check-meetings/detail/{meetings}', [ConfigMeetingController::class, 'show'])->name('detail-meetings');
    Route::get('/check-presence/detail/{presence}', [ConfigMeetingController::class, 'detailPresence'])->name('detail-presence');
    Route::delete('/delete-meetings/{meetings}', [ConfigMeetingController::class, 'deleteMeetings'])->name('delete-meetings');
});
// end kadiv

// admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::resource('/user', UserController::class);

    // meetings
    Route::resource('/meetings', MeetingsController::class);
    Route::get('/rekap-meeting/{meetings}', [ConfigMeetingController::class, 'listPresence'])->name('list-presence');
    Route::get('/check-meetings/detail/{meetings}', [ConfigMeetingController::class, 'show'])->name('detail-meetings');
    Route::get('/check-presence/detail/{presence}', [ConfigMeetingController::class, 'detailPresence'])->name('detail-presence');
    Route::delete('/delete-meetings/{meetings}', [ConfigMeetingController::class, 'deleteMeetings'])->name('delete-meetings');
});
// end admin


// Route::resource('/user', UserController::class)->middleware('auth');

// Configurasi Meetings dan Presence dari sisi Admin
Route::controller(ConfigMeetingController::class)->group(function () {
    Route::get('/presence/detail/{presence}', [ConfigMeetingController::class, 'detailPresence'])->name('presence-members');

    Route::prefix('/dashboard')->group(function () {
        Route::get('/config-meeting', 'listMeetings')->name('list-meetings');

        // Update Meetings
        Route::put('/check-presence/{presence}', 'updateMeetings')->name('update-meetings');

        // Add Meetings
        Route::get('/config-meeting/create', 'createMeetings')->name('create-meetings');
        Route::post('/config-meeting/post', 'postPresence')->name('post-presence');

        // Update Presence
        Route::put('/check-presence/{presence}/edit', 'updatePresence')->name('update-presence');

        // Delete Presence
        Route::delete('/check-presence/{presence}/edit', 'deletePresence')->name('delete-presence');
    });
});

// useless

// Route::resource('/miniclass', MiniclassController::class);
