@extends('template.layout')
@section('content')
<div class="page-header d-md-flex justify-content-between">
    <div>
        <h3>Tambah {{ $titles }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/member') }}">{{ $titles }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Tambah {{ $titles }}</li>
            </ol>
        </nav>
    </div>
    <div class="mt-2 mt-md-0">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-danger mr-2 mb-2" href="{{ url('/member') }}"><i data-feather="arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" action="{{ route('member.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Nama Mahasiswa</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Mahasiswa">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Nomor Pokok Mahasiswa</label>
                                    <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" placeholder="2xxxxxxxx">
                                    @error('npm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email Students</label>
                                    <input type="text" name="emailStudents" class="form-control @error('emailStudents') is-invalid @enderror" placeholder="2xxxxxxxx@students.uajy.ac.id">
                                    @error('emailStudents')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Nomor Handphone</label>
                                    <input type="text" name="noHp" class="form-control @error('noHp') is-invalid @enderror" placeholder="08xxxxxxxxxx">
                                    @error('noHp')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>ID Line</label>
                                    <input type="text" name="line" class="form-control @error('line') is-invalid @enderror" placeholder="@xxxxxxxx">
                                    @error('line')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Angkatan</label>
                                    <input type="text" name="angkatan" class="form-control @error('angkatan') is-invalid @enderror" placeholder="2023">
                                    @error('angkatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label>Tahun Akademik</label>
                                    <select class="custom-select custom-select-lg mb-3" name="ta" required>
                                        @foreach ($ta as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Program Studi</label>
                                    <select class="custom-select custom-select-lg mb-3" name="prodi" required>
                                        @foreach ($prodi as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label>Divisi Game</label>
                                    <select class="custom-select custom-select-lg mb-3" name="div" required>
                                        @foreach ($div as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection