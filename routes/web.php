<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\Login;
use App\Http\Controllers\Beranda;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', [Beranda::class, 'index'])->middleware('auth');
Route::get('/home', [Beranda::class, 'index'])->middleware('auth');
Route::get('/export', [MemberController::class, 'export']);
Route::get('/exportAbsensiTipe2', [AbsensiController::class, 'export']);
Route::get('/presensi', [AbsensiController::class, 'presensi']);
Route::post('/save', [AbsensiController::class, 'savePresensi']);
Route::get('/absen', [AbsensiController::class, 'tampil']);

Route::controller(Login::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('logout', 'logout')->name('logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('beranda', Beranda::class);
    Route::resource(
        '/member',
        \App\Http\Controllers\MemberController::class
    );
    Route::resource(
        '/pertemuan',
        \App\Http\Controllers\PertemuanController::class
    );
    Route::resource(
        '/absensi',
        \App\Http\Controllers\AbsensiController::class
    );
});
