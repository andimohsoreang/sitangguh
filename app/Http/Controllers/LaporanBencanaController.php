<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.laporan-bencana.home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.laporan-bencana.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => ['required'],
            'waktu' => ['required'],
            'kronologi' => ['required'],
            'lokasi' => ['required'],
            'bukti' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        // dd($request->bukti);

        $bukti = $request->bukti;
        $new_bukti = time().$bukti->getClientOriginalName();

        $lb = LaporanBencana::create([
            'user_id' => Auth::user()->id,
            'kronologi' => $request->kronologi,
            'url_gmaps' => $request->lokasi,
            'bukti' => 'uploads/laporanbencana/'.$new_bukti,
            'status' => 'tunggu',
            'read' => false,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
        ]);

        if ($lb)
        {
            $bukti->move('uploads/laporanbencana/', $new_bukti);
            Alert::success('Success', 'Berhasil menambah laporan.');
            return redirect()->route('user.laporanbencana');
        }
        else
        {
            Alert::error('Failed', 'Gagal menambah laporan.');
            return redirect()->route('user.laporanbencana');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function show(LaporanBencana $laporanBencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function edit(LaporanBencana $laporanBencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LaporanBencana $laporanBencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy(LaporanBencana $laporanBencana)
    {
        //
    }
}
