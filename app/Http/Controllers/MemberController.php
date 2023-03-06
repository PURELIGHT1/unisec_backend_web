<?php

namespace App\Http\Controllers;

use App\Exports\MemberExport;
use App\Models\Divisi;
use App\Models\Member;
use App\Models\Prodi;
use App\Models\TahunAkademik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class MemberController extends Controller
{
    public function index()
    {
        return View::make('member/index', [
            'titles' => 'Member',
            'user' => Auth::user(),
            'member' => Member::memberRelasi(),
            'pembuat' => Member::pembuat(),
        ],);
    }

    public function export()
    {
        return Excel::download(new MemberExport, 'Daftar Anggota UNISEC.xlsx');
    }

    public function show($id)
    {
        $absensi = Member::find($id);
        $absensi->creator = Auth::user()->id;
        $absensi->modifier = Auth::user()->id;
        $absensi->save();

        return redirect()->intended('member');
    }

    public function create()
    {
        return view('member.add', [
            'titles' => 'Member',
            'user' => Auth::user(),
            'prodi' => Prodi::all(),
            'ta' => TahunAkademik::all(),
            'div' => Divisi::all(),
        ]);
    }

    public function store(Request $request)
    {
        //Validasi Data
        $request->validate(
            [
                'name' => 'required',
                'npm' => 'required|numeric|digits:9|unique:members',
                'emailStudents' => 'required',
                'noHp' => 'required|min:10|max:15|regex:(08)',
                'line' => 'required',
                'angkatan' => 'required|numeric',
                'prodi' => 'required',
                'ta' => 'required',
                'div' => 'required',
            ],
            [
                'name.required' => 'Nama Mahasiswa tidak boleh kosong',

                'npm.required' => 'Nomor Pokok Mahasiswa tidak boleh kosong',
                'npm.numeric' => 'Nomor Pokok Mahasiswa hanya mengandung angka',
                'npm.digits' => 'Nomor Pokok Mahasiswa terdiri dari 9 angka',
                'npm.unique' => 'Nomor Pokok Mahasiswa sudah terdaftar',

                'emailStudents.required' => 'Email Mahasiswa tidak boleh kosong',

                'noHp.required' => 'Nomor Handphone tidak boleh kosong',
                'noHp.min' => 'Nomor Handphone terdiri dari 10 sampai 15 angka',
                'noHp.max' => 'Nomor Handphone terdiri dari 10 sampai 15 angka',
                'noHp.regex' => 'Nomor Handphone harus diawali dengan 08',

                'line.required' => 'ID Line tidak boleh kosong',

                'angkatan.required' => 'Angkatan tidak boleh kosong',
                'angkatan.numeric' => 'Angkatan hanya mengandung angka',
            ]
        );

        //Fungsi Simpan Data ke dalam Database
        Member::create([
            'name' => $request->name,
            'npm' => $request->npm,
            'emailStudents' => $request->emailStudents,
            'noHp' => $request->noHp,
            'line' => $request->line,
            'angkatan' => $request->angkatan,
            'id_prodi' => $request->prodi,
            'id_ta' => $request->ta,
            'id_div' => $request->div,
            'status' => 'Aktif',
            'creator' => Auth::user()->id,
        ]);
        return redirect()->intended('member')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $data = Member::find($id);
        // dd($data);
        return view('member.change', [
            'titles' => 'Member',
            'user' => Auth::user(),
            'member' => $data,
            'prodi' => Prodi::all(),
            'ta' => TahunAkademik::all(),
            'div' => Divisi::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        //Validasi Data
        $request->validate(
            [
                'name' => 'required',
                'npm' => 'required|numeric|digits:9',
                'emailStudents' => 'required',
                'noHp' => 'required|min:10|max:15|regex:(08)',
                'line' => 'required',
                'angkatan' => 'required|numeric',
                'prodi' => 'required',
                'ta' => 'required',
                'div' => 'required',
            ],
            [
                'name.required' => 'Nama Mahasiswa tidak boleh kosong',

                'npm.required' => 'Nomor Pokok Mahasiswa tidak boleh kosong',
                'npm.numeric' => 'Nomor Pokok Mahasiswa hanya mengandung angka',
                'npm.digits' => 'Nomor Pokok Mahasiswa terdiri dari 9 angka',

                'emailStudents.required' => 'Email Mahasiswa tidak boleh kosong',

                'noHp.required' => 'Nomor Handphone tidak boleh kosong',
                'noHp.min' => 'Nomor Handphone terdiri dari 10 sampai 15 angka',
                'noHp.max' => 'Nomor Handphone terdiri dari 10 sampai 15 angka',
                'noHp.regex' => 'Nomor Handphone harus diawali dengan 08',

                'line.required' => 'ID Line tidak boleh kosong',

                'angkatan.required' => 'Angkatan tidak boleh kosong',
                'angkatan.numeric' => 'Angkatan hanya mengandung angka',
            ]
        );

        //Fungsi Simpan Data ke dalam Database
        Member::where('id', $id)->update([
            'name' => $request->name,
            'npm' => $request->npm,
            'emailStudents' => $request->emailStudents,
            'noHp' => $request->noHp,
            'line' => $request->line,
            'angkatan' => $request->angkatan,
            'id_prodi' => $request->prodi,
            'id_ta' => $request->ta,
            'id_div' => $request->div,
            'status' => 'Aktif',
            'modifier' => Auth::user()->id,
        ]);
        return redirect()->intended('member')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $data = Member::find($id);
        $data->delete();
        return redirect()->intended('member')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
