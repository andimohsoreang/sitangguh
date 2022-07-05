<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
// use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class RekapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.rekap');
    }

    public function semua()
    {
        $laporan_bencana = LaporanBencana::orderBy('created_at', 'desc')->get();
        $pdf = PDF::loadView('admin.rekap.semua', compact('laporan_bencana'))->setPaper('a4', 'landscape');
        $date = date('Y-m-d');
        $time = date('H-i-s');
        $namefile = 'Rekap_Semua_Laporan_'.$date.'_'.$time.'.pdf';
        return $pdf->download($namefile);
        // return view('admin.rekap.semua', compact('laporan_bencana'));
    }

    public function perstatus(Request $request)
    {
        $status = $request->status;
        if (!empty($status)) {
            $laporan_bencana = LaporanBencana::where('status', $status)
                                            ->orderBy('created_at', 'desc')
                                            ->get();
            $pdf = PDF::loadView('admin.rekap.semua', compact('laporan_bencana'))->setPaper('a4', 'landscape');
            $date = date('Y-m-d');
            $time = date('H-i-s');
            if ($status == "selesai") {
                $sts = "selesai";
            } else if ($status == "proses") {
                $sts = "proses";
            } else if ($status == "tolak") {
                $sts = "tolak";
            }
            $namefile = 'Rekap_Semua_Laporan_'.$sts.'_'.$date.'_'.$time.'.pdf';
            return $pdf->download($namefile);
        } else {
            Alert::error('Failed', 'Silahkan pilih status terlebih dahulu!');
            return redirect()->route('admin.rekap');
        }
    }

    public function perbulan($bulan)
    {
        
    }
}
