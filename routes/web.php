<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanBencanaController;
use App\Http\Controllers\LaporanTerkirimController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\RoleViewController;
use App\Http\Controllers\VerifikasiController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Auth::routes();

Route::group(['middleware' => ['auth','role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [RoleViewController::class, 'admin']);
    Route::get('/dashboard', [RoleViewController::class, 'admin'])->name('admin.index');

    Route::get('/laporan/tunggu', [RoleViewController::class, 'adminlaporan'])->name('laporan.tunggu');
    Route::get('/laporan/ditolak', [RoleViewController::class, 'adminlaporan'])->name('laporan.tolak');
    Route::get('/laporan/proses', [RoleViewController::class, 'adminlaporan'])->name('laporan.proses');
    Route::get('/laporan/selesai', [RoleViewController::class, 'adminlaporan'])->name('laporan.selesai');
    Route::get('/laporan/show/{id}', [LaporanBencanaController::class, 'show'])->name('laporan.show');

    Route::get('/rekap', [RoleViewController::class, 'adminRekap'])->name('admin.rekap');
    Route::get('/rekap/all', [RekapController::class, 'semua'])->name('rekap.semua');
    Route::post('/rekap/status', [RekapController::class, 'perstatus'])->name('rekap.perstatus');
    Route::get('/rekap/bulan/{bulan}', [RekapController::class, 'perbulan'])->name('rekap.perbulan');


    Route::get('/petugas', [PetugasController::class, 'index'])->name('admin.petugas');
    Route::get('/petugas/create', [PetugasController::class, 'create'])->name('admin.create.petugas');
    Route::post('/petugas/store', [PetugasController::class, 'store'])->name('admin.store.petugas');
    Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('admin.edit.petugas');
    Route::put('/petugas/update/{id}', [PetugasController::class, 'update'])->name('admin.update.petugas');
    Route::delete('/petugas/destroy/{id}', [PetugasController::class, 'destroy'])->name('admin.destroy.petugas');
});

Route::group(['middleware' => ['auth','role:petugas'], 'prefix' => 'petugas'], function () {
    Route::get('/', [RoleViewController::class, 'petugas']);
    Route::get('/dashboard', [RoleViewController::class, 'petugas'])->name('petugas.index');

    Route::get('/profile', [RoleViewController::class, 'userprofile'])->name('petugas.profile');
    Route::put('/profile/{id}', [RoleViewController::class, 'userupdateprofile'])->name('petugas.update.profile');
    Route::put('/password/{id}', [RoleViewController::class, 'userupdatepassword'])->name('petugas.update.password');
    
    Route::get('/notifikasi', [RoleViewController::class, 'petugasNotifikasi'])->name('petugas.notifikasi');
    Route::get('/notifikasi/{id}', [RoleViewController::class, 'petugasNotifikasiShow'])->name('petugas.show.notifikasi');
    Route::put('/notifikasi/tangani/{id}', [RoleViewController::class, 'petugasTangani'])->name('petugas.tangani');
    Route::put('/notifikasi/tolak/{id}', [RoleViewController::class, 'petugasTolak'])->name('petugas.tolak');

    
    Route::get('/verifikasi', [RoleViewController::class, 'petugasVerifikasi'])->name('petugas.verifikasi');
    Route::get('/verifikasi/detail/{id}', [RoleViewController::class, 'petugasNotifikasiShow'])->name('petugas.show.verifikasi');
    Route::get('/verifikasi/{id}', [RoleViewController::class, 'petugasVerifikasiForm'])->name('petugas.verifikasiform');
    Route::put('/verifikasi/{id}', [RoleViewController::class, 'petugasVerifikasiFormUpdate'])->name('petugas.update.verifikasiform');

    Route::get('/riwayat', [RoleViewController::class, 'petugasRiwayat'])->name('petugas.riwayat');
    Route::get('/riwayat/detail/{id}', [RoleViewController::class, 'petugasNotifikasiShow'])->name('petugas.show.riwayat');
});

Route::group(['middleware' => ['auth','role:user'], 'prefix' => 'user'], function () {
    Route::get('/', [RoleViewController::class, 'user']);
    Route::get('/dashboard', [RoleViewController::class, 'user'])->name('user.index');
    Route::get('/profile', [RoleViewController::class, 'userprofile'])->name('user.profile');
    Route::put('/profile/{id}', [RoleViewController::class, 'userupdateprofile'])->name('user.update.profile');
    Route::put('/password/{id}', [RoleViewController::class, 'userupdatepassword'])->name('user.update.password');

    Route::get('/laporanbencana', [LaporanBencanaController::class, 'index'])->name('user.laporanbencana');
    Route::get('/laporanbencana/create', [LaporanBencanaController::class, 'create'])->name('user.create.laporanbencana');
    Route::post('/laporanbencana/store', [LaporanBencanaController::class, 'store'])->name('user.store.laporanbencana');
    Route::get('/laporanbencana/show/{id}', [LaporanBencanaController::class, 'show'])->name('user.show.laporanbencana');
    Route::get('/laporanbencana/edit/{id}', [LaporanBencanaController::class, 'edit'])->name('user.edit.laporanbencana');
    Route::put('/laporanbencana/update/{id}', [LaporanBencanaController::class, 'update'])->name('user.update.laporanbencana');
    Route::delete('/laporanbencana/destroy/{id}', [LaporanBencanaController::class, 'destroy'])->name('user.destroy.laporanbencana');

    Route::get('/laporanterkirim/detail/{id}', [LaporanBencanaController::class, 'show'])->name('user.show.laporanterkirim');

    Route::get('/laporanterkirim', [LaporanTerkirimController::class, 'index'])->name('user.laporanterkirim');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
