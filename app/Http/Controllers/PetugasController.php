<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::whereHas('roles', function ($q) {
            $q->Where('name', 'petugas');
        })->get();

        return view('admin.petugas.home', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.petugas.create');
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
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ]);

        $petugas = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $petugas->assignRole('petugas');

        if ($petugas)
        {
            Alert::success('Success', 'Berhasil menambah petugas.');
            return redirect()->route('admin.petugas');
        }
        else
        {
            Alert::error('Failed', 'Gagal menambah petugas.');
            return redirect()->route('admin.petugas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email']

        ]);

        $petugas = User::findOrFail($id);

        if ($request->input('password'))
        {
            $petugas_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ];
        }
        else
        {
            $petugas_data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $petugas->password,
            ];
        }

        $petugas->update($petugas_data);

        if ($petugas)
        {
            Alert::success('Success', 'Berhasil mengupdate petugas.');
            return redirect()->route('admin.petugas');
        }
        else
        {
            Alert::error('Failed', 'Gagal mengupdate petugas.');
            return redirect()->route('admin.petugas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $mhr = DB::table('model_has_roles')->where('model_id', $petugas->id);
        $mhr->delete();
        $petugas->delete();

        Alert::success('Success', 'Berhasil menghapus petugas.');
        return redirect()->route('admin.petugas');
    }
}
