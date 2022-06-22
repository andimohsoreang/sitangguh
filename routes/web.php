<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanBencanaController;
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
    Route::get('/notifikasi', [RoleViewController::class, 'adminNotifikasi'])->name('admin.notifikasi');
    Route::get('/rekap', [RoleViewController::class, 'adminRekap'])->name('admin.rekap');

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
    Route::get('/notifikasi', [RoleViewController::class, 'petugasNotifikasi'])->name('petugas.notifikasi');
    Route::get('/verifikasi', [RoleViewController::class, 'petugasVerifikasi'])->name('petugas.verifikasi');
    Route::get('/riwayat', [RoleViewController::class, 'petugasRiwayat'])->name('petugas.riwayat');
});

Route::group(['middleware' => ['auth','role:user'], 'prefix' => 'user'], function () {
    Route::get('/', [RoleViewController::class, 'user']);
    Route::get('/dashboard', [RoleViewController::class, 'user'])->name('user.index');

    Route::get('/laporanbencana', [LaporanBencanaController::class, 'index'])->name('user.laporanbencana');
    Route::get('/laporanbencana/create', [LaporanBencanaController::class, 'create'])->name('user.create.laporanbencana');
    Route::post('/laporanbencana/store', [LaporanBencanaController::class, 'store'])->name('user.store.laporanbencana');
    Route::get('/laporanbencana/show/{id}', [LaporanBencanaController::class, 'show'])->name('user.show.laporanbencana');
    Route::get('/laporanbencana/edit/{id}', [LaporanBencanaController::class, 'edit'])->name('user.edit.laporanbencana');
    Route::put('/laporanbencana/update/{id}', [LaporanBencanaController::class, 'update'])->name('user.update.laporanbencana');
    Route::delete('/laporanbencana/destroy/{id}', [LaporanBencanaController::class, 'destroy'])->name('user.destroy.laporanbencana');


    Route::get('/notifikasi', [RoleViewController::class, 'userNotifikasi'])->name('user.notifikasi');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
