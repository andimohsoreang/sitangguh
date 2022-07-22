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
        $lpb_total = LaporanBencana::count();
        $lpb_tunggu = LaporanBencana::where('status', 'tunggu')->count();
        $lpb_tolak = LaporanBencana::where('status', 'tolak')->count();
        $lpb_proses = LaporanBencana::where('status', 'proses')->count();
        $lpb_selesai = LaporanBencana::where('status', 'selesai')->count();
        $lpb_petugas = DB::table('users')->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                            ->where('roles.name', '=', 'petugas')
                            ->count();
        $lpb_masyarakat = DB::table('users')->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                            ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
                            ->where('roles.name', '=', 'user')
                            ->count();

        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $today = \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('admin.home', compact('lpb_total', 'lpb_tunggu', 'lpb_tolak', 'lpb_proses', 'lpb_selesai', 'lpb_petugas', 'lpb_masyarakat', 'today'));
    }

    public function adminlaporan()
    {
        if (request()->routeIs('laporan.tunggu')) {
            $lpb = LaporanBencana::where('status', 'tunggu')
                                ->orderBy('created_at', 'desc')
                                ->get();
        }
        if (request()->routeIs('laporan.tolak')) {
            $lpb = LaporanBencana::where('status', 'tolak')
                                ->orderBy('created_at', 'desc')
                                ->get();
        }
        if (request()->routeIs('laporan.proses')) {
            $lpb = LaporanBencana::where('status', 'proses')
                                ->orderBy('created_at', 'desc')
                                ->get();
        }
        if (request()->routeIs('laporan.selesai')) {
            $lpb = LaporanBencana::where('status', 'selesai')
                                ->orderBy('created_at', 'desc')
                                ->get();
        }

        return view('admin.laporan', compact('lpb'));
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
                ->where('petugas_id', Auth::user()->id)
                ->count();
        $lb_selesai = DB::table('laporan_bencanas')
                ->where('status', 'selesai')
                ->where('petugas_id', Auth::user()->id)
                ->count();
        $lb_proses = DB::table('laporan_bencanas')
                ->where('status', 'proses')
                ->where('petugas_id', Auth::user()->id)
                ->count();
        $lb_tolak = DB::table('laporan_bencanas')
                ->where('petugas_id', Auth::user()->id)
                ->where('status', 'tolak')->count();

        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $today = \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('petugas.home', compact('lb_total', 'lb_selesai', 'lb_proses', 'lb_tolak', 'today'));
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
        if ($lpb->status !== true) {
            $lpb->update([ 
                'read' => true,
            ]);
        }

        return view('petugas.notifikasi-show', compact('lpb'));
    }

    public function petugasTangani($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        if ($lpb->status !== true) {
            $lpb_data = [
                'status' => 'proses',
                'read' => true,
                'petugas_id' => Auth::user()->id,
            ];
        } else {
            $lpb_data = [
                'status' => 'proses',
                'petugas_id' => Auth::user()->id,
            ];
        }

        $lpb->update($lpb_data);

        Alert::success('Success', 'Tangani Laporan. Silahkan cek dibagian menu Verifikasi Bencana');

        return redirect()->route('petugas.notifikasi');
    }

    public function petugasTolak($id)
    {
        $lpb = LaporanBencana::findorfail($id);
        if ($lpb->status !== true) {
            $lpb_data = [
                'status' => 'tolak',
                'read' => true,
                'petugas_id' => Auth::user()->id,
            ];
        } else {
            $lpb_data = [
                'status' => 'tolak',
                'petugas_id' => Auth::user()->id,
            ];
        }

        $lpb->update($lpb_data);

        Alert::success('Success', 'Tolak Laporan.');

        return redirect()->route('petugas.notifikasi');
    }

    public function petugasVerifikasi()
    {
        $laporan_bencana = LaporanBencana::where('status', 'proses')
                            ->where('petugas_id', Auth::user()->id)
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
        $laporan_bencana = LaporanBencana::where('status', 'selesai')->orWhere('status', 'tolak')
                            ->where('petugas_id', Auth::user()->id)
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
        $lb_tunggu = DB::table('laporan_bencanas')
                        ->where('user_id', Auth::user()->id)
                        ->where('status', 'tunggu')->count();
        $lb_proses = DB::table('laporan_bencanas')
                        ->where('user_id', Auth::user()->id)
                        ->where('status', 'proses')->count();

        setlocale(LC_TIME, 'id_ID');
        \Carbon\Carbon::setLocale('id');
        $today = \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y');
        return view('user.home', compact('lb_total','lb_selesai','lb_tolak','lb_tunggu','lb_proses','today'));
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
