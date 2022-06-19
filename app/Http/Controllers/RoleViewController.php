<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleViewController extends Controller
{
    // Admin
    public function admin()
    {
        return view('admin.home');
    }

    public function adminNotifikasi()
    {
        return view('admin.notifikasi');
    }

    public function adminPetugas()
    {
        return view('admin.petugas');
    }

    public function adminRekap()
    {
        return view('admin.rekap');
    }

    // Petugas
    public function petugas()
    {
        return view('petugas.home');
    }

    public function petugasNotifikasi()
    {
        return view('petugas.notifikasi');
    }

    public function petugasRiwayat()
    {
        return view('petugas.riwayat-penanganan');
    }

    public function petugasVerifikasi()
    {
        return view('petugas.verifikasi-bencana');
    }

    // User
    public function user()
    {
        return view('user.home');
    }

    public function userAlur()
    {
        return view('user.alur-laporan');
    }

    public function userNotifikasi()
    {
        return view('user.notifikasi');
    }

    public function userLaporan()
    {
        return view('user.laporan-terkirim');
    }
}
