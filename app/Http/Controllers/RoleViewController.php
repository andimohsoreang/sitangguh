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
        $lb_total = DB::table('laporan_bencanas')
                ->count();
        $lb_selesai = DB::table('laporan_bencanas')
                ->where('status', 'selesai')->count();
        $lb_proses = DB::table('laporan_bencanas')
                ->where('status', 'proses')->count();
        $lb_tolak = DB::table('laporan_bencanas')
                ->where('status', 'tolak')->count();
        return view('petugas.home', compact('lb_total', 'lb_selesai', 'lb_proses', 'lb_tolak'));
    }

    public function petugasNotifikasi()
    {
        $laporan_bencana = DB::table('laporan_bencanas')
                            ->where('status', 'tunggu')
                            ->orderBy('id', 'desc')
                            ->get();
        return view('petugas.notifikasi', compact('laporan_bencana'));
    }

    public function petugasNotifikasiShow($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        if ($lpb->status != true) {
            $lpb->update([ 'read' => true ]);
        }

        return view('petugas.notifikasi-show', compact('lpb'));
    }

    public function petugasTangani($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        if ($lpb->status != true) {
            $lpb->update([
                'status' => 'proses',
                'read' => true,
            ]);
        } else {
            $lpb->update([
                'status' => 'proses',
            ]);
        }

        Alert::success('Success', 'Tangani Laporan. Silahkan cek dibagian menu Verifikasi Bencana');

        return redirect()->route('petugas.notifikasi');
    }

    public function petugasTolak($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        if ($lpb->status != true) {
            $lpb->update([
                'status' => 'tolak',
                'read' => true,
            ]);
        } else {
            $lpb->update([
                'status' => 'tolak',
            ]);
        }

        Alert::success('Success', 'Tolak Laporan.');

        return redirect()->route('petugas.notifikasi');
    }

    public function petugasVerifikasi()
    {
        $laporan_bencana = DB::table('laporan_bencanas')
                            ->where('status', 'proses')
                            ->orderBy('id', 'desc')
                            ->get();
        return view('petugas.verifikasi-bencana', compact('laporan_bencana'));
    }

    public function petugasVerifikasiForm($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        return view('petugas.verifikasi-form', compact('lpb'));
    }

    public function petugasVerifikasiFormUpdate(Request $request, $id)
    {
        $request->validate([
            'kronologi' => ['required'],
            'kerusakan' => ['required'],
            'kerugian' => ['required'],
        ]);

        $lpb = LaporanBencana::findorfail($id);
        
        $lpb->update([
            'status' => 'selesai',
            'kronologi' => $request->kronologi,
            'kerusakan' => $request->kerusakan,
            'kerugian' => $request->kerugian,
        ]);

        Alert::success('Success', 'Berhasil Verifikasi Laporan.');

        return redirect()->route('petugas.verifikasi');
    }

    public function petugasRiwayat()
    {
        $laporan_bencana = DB::table('laporan_bencanas')
                            ->where('status', 'selesai')
                            ->orderBy('id', 'desc')
                            ->get();
        return view('petugas.riwayat-penanganan', compact('laporan_bencana'));
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
