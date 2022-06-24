<?php

namespace App\Http\Controllers;

use App\Models\LaporanBencana;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

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
        $laporan_bencana = DB::table('laporan_bencanas')
                            ->where('status', 'tunggu')
                            ->get();
        return view('petugas.notifikasi', compact('laporan_bencana'));
    }

    public function petugasTangani($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        $lpb->update([
            'status' => 'proses',
            'read' => true,
        ]);

        Alert::success('Success', 'Tangani Laporan.');

        return redirect()->route('petugas.notifikasi');
    }

    public function petugasTolak($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        $lpb->update([
            'status' => 'tolak',
            'read' => true,
        ]);

        Alert::success('Success', 'Tolak Laporan.');

        return redirect()->route('petugas.notifikasi');
    }

    public function petugasUpdateNotifikasi()
    {

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

    public function userProfile()
    {
        return view('profile');
    }

    public function userupdateprofile(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,'.$id]
        ]);

        $user = User::findorfail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ]);

        Alert::success('Success', 'Berhasil memperbaruhi data.');

        if ($user->hasRole('petugas')) {
            return redirect()->route('petugas.profile');
        } else if ($user->hasRole('user')) {
            return redirect()->route('user.profile');
        }
    }

    public function userupdatepassword(Request $request, $id)
    {
        $request->validate([
            'password_sekarang' => ['required', new MatchOldPassword],
            'password_baru' => ['required'],
            'konrimasi_password' => ['same:password_baru'],
        ]);

        $user = User::findorfail($id);
        $user->update([
            'password' => Hash::make($request->password_baru),
        ]);

        Alert::success('Success', 'Berhasil memperbaruhi password.');

        if ($user->hasRole('petugas')) {
            return redirect()->route('petugas.profile');
        } else if ($user->hasRole('user')) {
            return redirect()->route('user.profile');
        }
    }
}
