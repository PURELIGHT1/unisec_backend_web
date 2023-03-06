<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiExport;
use App\Models\Absensi;
use App\Models\Member;
use App\Models\Pertemuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    public function index()
    {
        return view('absensi.index', [
            'titles' => 'Absensi',
            'user' => Auth::user(),
            'absensi' => Absensi::class::all(),
        ],);
    }

    public function tampil()
    {
        $pertemuan = Pertemuan::class::getPertemuanAktif();
        return view('absensi.index2', [
            'titles' => 'Absensi Member',
            'absensi' => Absensi::class::getAll($pertemuan[0][0]->name),
        ],);
    }

    public function export()
    {
        return Excel::download(new AbsensiExport, 'Absensi Anggota UNISEC.xlsx');
    }

    public function presensi()
    {
        $pertemuan = Pertemuan::class::getPertemuanAktif();
        if (count($pertemuan[0]) == 0) {
            return view('close');
        } else {
            if ($pertemuan[1] >= $pertemuan[0][0]->jam_mulai && $pertemuan[1] <= $pertemuan[0][0]->jam_selesai) {
                return view('presensi', [
                    'titles' => 'Form Presensi Anggota',
                    'pertemuan' => $pertemuan,
                ]);
            } else {
                return view('close');
            }
        }
    }

    public function savePresensi(Request $request)
    {
        $request->validate([
            'npm' => 'required',
            'bukti' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);
        $cekAnggota = Member::class::cekAnggota($request->npm);
        if (empty($cekAnggota)) {
            return redirect()->intended('absen')->with('error', 'Data tersebut tidak terdaftar');
        } else {
            $cekNPM = Absensi::class::cekNpm($request->npm, $request->name);
            if (!empty($cekNPM)) {
                return redirect()->intended('absen')->with('warning', 'Data tersebut sudah absen');
            } else {
                $file = $request->file('bukti');
                $name_dv = Absensi::class::getNama($request->npm);
                $ekstensi = $file->clientExtension();
                $name_file = $name_dv[0]->div_nama . "-" . $request->npm . "_" . time() . "." . $ekstensi;
                $file->move(\base_path() . "/public/bukti", $name_file);

                $absensi = new Absensi;
                $absensi->npm = $request->npm;
                $absensi->name = $request->name;
                $absensi->status = $request->status;
                $absensi->bukti = $name_file;
                $absensi->creator = 1;
                $absensi->status = 'Belum Absen';
                $absensi->save();

                return redirect()->intended('absen')->with('success', 'Absensi berhasil ditambahkan');
            }
        }
    }

    public function create()
    {
        $pertemuan = Pertemuan::class::getPertemuanAktif();
        if (count($pertemuan[0]) == 0) {
            return view('close');
        } else {
            if ($pertemuan[1] >= $pertemuan[0][0]->jam_mulai && $pertemuan[1] <= $pertemuan[0][0]->jam_selesai) {
                return view('absensi.add', [
                    'titles' => 'Absensi',
                    'user' => Auth::user(),
                    'pertemuan' => $pertemuan,
                ],);
            } else {
                return view('close');
            }
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'npm' => 'required',
            'status' => 'required',
            'bukti' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);
        $cekAnggota = Member::class::cekAnggota($request->npm);
        if (empty($cekAnggota)) {
            return redirect()->intended('absensi')->with('error', 'Data tersebut tidak terdaftar');
        } else {
            $cekNPM = Absensi::class::cekNpm($request->npm, $request->name);
            if (!empty($cekNPM)) {
                return redirect()->intended('absensi')->with('warning', 'Data tersebut sudah absen');
            } else {
                $file = $request->file('bukti');
                $name_dv = Absensi::class::getNama($request->npm);
                $ekstensi = $file->clientExtension();
                $name_file = $name_dv[0]->div_nama . "-" . $request->npm . "_" . time() . "." . $ekstensi;
                $file->move(\base_path() . "/public/bukti", $name_file);

                $absensi = new Absensi;
                $absensi->npm = $request->npm;
                $absensi->name = $request->name;
                $absensi->status = $request->status;
                $absensi->bukti = $name_file;
                $absensi->creator = Auth::user()->id;
                $absensi->save();

                return redirect()->intended('absensi')->with('success', 'Absensi berhasil ditambahkan');
            }
        }
    }

    public function show($id)
    {
        $absensi = Absensi::class::find($id);
        $absensi->status = "Hadir";
        $absensi->modifier = Auth::user()->id;
        $absensi->save();

        return redirect()->intended('absensi');
    }

    public function edit($id)
    {
        $pertemuan = Pertemuan::class::getPertemuanAktif();

        return view('absensi.change', [
            'titles' => 'Absensi',
            'user' => Auth::user(),
            'pertemuan' => $pertemuan,
            'absensi' => Absensi::class::find($id),
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'npm' => 'required',
            'status' => 'required',
            'bukti' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
        ]);

        $file = $request->file('bukti');

        if (!$file) {
            $absensi = Absensi::class::find($id);
            $absensi->npm = $request->npm;
            $absensi->name = $request->name;
            $absensi->status = $request->status;
            $absensi->modifier = Auth::user()->id;
            $absensi->save();
        } else {
            // get Data
            $bukti = Absensi::where('id', $id)->first();
            $path = public_path('bukti/' . $bukti->bukti);

            if (FILE::exists($path)) {
                FILE::delete($path);
            }

            $file = $request->file('bukti');
            $name_dv = Absensi::class::getNama($request->npm);
            $ekstensi = $file->clientExtension();
            $name_file = $name_dv[0]->div_nama . "-" . $request->npm . "_" . time() . "." . $ekstensi;
            $file->move(\base_path() . "/public/bukti", $name_file);

            $absensi = Absensi::class::find($id);
            $absensi->npm = $request->npm;
            $absensi->name = $request->name;
            $absensi->status = $request->status;
            $absensi->bukti = $name_file;
            $absensi->modifier = Auth::user()->id;
            $absensi->save();
        }

        return redirect()->intended('absensi')->with('success', 'Absensi berhasil diubah');
    }

    // destroy
    public function destroy($id)
    {
        $absensi = Absensi::class::find($id);
        $bukti = Absensi::where('id', $id)->first();
        $path = public_path('bukti/' . $bukti->bukti);

        if (FILE::exists($path)) {
            FILE::delete($path);
        }
        $absensi->delete();

        return redirect()->intended('absensi')->with('success', 'Absensi berhasil dihapus');
    }
}
