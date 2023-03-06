<?php

namespace App\Http\Controllers;

use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PertemuanController extends Controller
{
    public function index()
    {
        return view('pertemuan.index', [
            'titles' => 'Pertemuan',
            'user' => Auth::user(),
            'pertemuan' => Pertemuan::class::all(),
        ],);
    }

    public function create()
    {
        return view('pertemuan.add', [
            'titles' => 'Tambah Pertemuan',
            'user' => Auth::user(),
        ],);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:waktu_mulai',
        ]);


        $request->merge([
            'jam_selesai' => $request->jam_selesai . ":00",
            'jam_mulai' => $request->jam_mulai . ":00",
        ]);

        Pertemuan::create([
            'name' => $request->name,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => 1,
            'creator' => Auth::user()->id,
        ]);

        return redirect()->intended('pertemuan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('pertemuan.change', [
            'titles' => 'Edit Pertemuan',
            'user' => Auth::user(),
            'pertemuan' => Pertemuan::class::find($id),
        ],);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // exit;
        $request->validate([
            'name' => 'required',
            'tanggal' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:waktu_mulai',
            'status' => 'required',
        ]);

        $request->merge([
            'jam_selesai' => $request->jam_selesai . ":00",
            'jam_mulai' => $request->jam_mulai . ":00",
        ]);

        Pertemuan::class::find($id)->update([
            'name' => $request->name,
            'tanggal' => date('Y-m-d', strtotime($request->tanggal)),
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'status' => $request->status,
            'modifier' => Auth::user()->id,
        ]);

        return redirect()->intended('pertemuan')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        Pertemuan::class::find($id)->delete();
        return redirect()->intended('pertemuan')->with('success', 'Data berhasil dihapus');
    }
}
