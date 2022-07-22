<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LaporanTerkirimController extends Controller
{
    public function index()
    {
        $laporan_bencana = DB::table('laporan_bencanas')
                            ->where('user_id', Auth::user()->id)
                            ->where('status', 'selesai')
                            ->orderBy('id', 'desc')
                            ->get();
        return view('user.laporan-terkirim', compact('laporan_bencana'));
    }
}
