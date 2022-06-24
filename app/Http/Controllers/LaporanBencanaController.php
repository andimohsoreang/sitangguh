<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class LaporanBencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_bencana = DB::table('laporan_bencanas')
                            ->where('user_id', Auth::user()->id)
                            ->where('status', '!=', 'selesai')->get();
        return view('user.laporan-bencana.home', compact('laporan_bencana'));
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
    public function show($id)
    {
        $lp = LaporanBencana::findorfail($id);
        return view('user.laporan-bencana.show', compact('lp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lp = LaporanBencana::findorfail($id);
        return view('user.laporan-bencana.edit', compact('lp'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => ['required'],
            'waktu' => ['required'],
            'kronologi' => ['required'],
            'lokasi' => ['required'],
            'bukti' => ['image', 'mimes:png,jpg,jpeg'],
        ]);

        $lp = LaporanBencana::findorfail($id);

        if ($request->has('bukti')) {
            $path_bukti = $request->bukti_lama;

            if (File::exists($path_bukti)) {
                File::delete($path_bukti);
            }

            $bukti = $request->bukti;
            $new_bukti = time().$bukti->getClientOriginalName();
            $bukti->move('uploads/laporanbencana/', $new_bukti);

            $lp_data = [
                'user_id' => Auth::user()->id,
                'kronologi' => $request->kronologi,
                'url_gmaps' => $request->lokasi,
                'bukti' => 'uploads/laporanbencana/'.$new_bukti,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
            ];
        } else {
            $lp_data = [
                'user_id' => Auth::user()->id,
                'kronologi' => $request->kronologi,
                'url_gmaps' => $request->lokasi,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
            ];
        }

        $lp->update($lp_data);

        if ($lp)
        {
            Alert::success('Success', 'Berhasil mengupdate laporan.');
            return redirect()->route('user.laporanbencana');
        }
        else
        {
            Alert::error('Failed', 'Gagal mengupdate laporan.');
            return redirect()->route('user.laporanbencana');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LaporanBencana  $laporanBencana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lp = LaporanBencana::findOrFail($id);
        $destination = $lp->bukti;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $lp->delete();

        Alert::success('Success', 'Berhasil menghapus laporan.');
        return redirect()->route('user.laporanbencana');
    }
}
