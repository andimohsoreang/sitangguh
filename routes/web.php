<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\VerifikasiController;

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
    return view('welcome');
});


Route::get('/home', function () {
    return view('admin.home');
});

Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');

Route::get('/verifikasi', [VerifikasiController::class, 'index'])->name('verifikasi.index');

Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');

Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');


