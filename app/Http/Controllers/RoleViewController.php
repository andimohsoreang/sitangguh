<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $lb_total = DB::table('laporan_bencanas')
                        ->where('user_id', Auth::user()->id)
                        ->count();
        $lb_selesai = DB::table('laporan_bencanas')
                        ->where('user_id', Auth::user()->id)
                        ->where('status', 'selesai')->count();
        $lb_tolak = DB::table('laporan_bencanas')
                        ->where('user_id', Auth::user()->id)
                        ->where('status', 'tolak')->count();
        return view('user.home', compact('lb_total','lb_selesai','lb_tolak'));
    }
}
