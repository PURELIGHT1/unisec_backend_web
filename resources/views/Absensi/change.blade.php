@extends('template.layout')
@section('content')
<div class="page-header d-md-flex justify-content-between">
    <div>
        <h3>Edit {{ $titles }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('absensi') }}">{{ $titles }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit {{ $titles }}</li>
            </ol>
        </nav>
    </div>
    <div class="mt-2 mt-md-0">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-danger mr-2 mb-2" href="{{ url('absensi') }}"><i data-feather="arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" action="{{ route('absensi.update', $absensi->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Nomor Pokok Mahasiswa</label>
                                    <input type="text" class="form-control" value="{{ $absensi->npm }}" disabled>
                                    <input type="hidden" name="npm" value="{{ $absensi->npm }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Pertemuan</label>
                                    <input type="text" class="form-control" value="{{ $pertemuan[0][0]->nama }}" disabled>
                                    <input type="hidden" name="name" class="form-control" value="{{ $pertemuan[0][0]->nama }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Keterangan Kehadiran</label>
                                    <select class="custom-select custom-select-lg mb-3 @error('status') is-invalid @enderror " name="status" required>
                                        <option value="Belum Absen">Belum Absen</option>
                                        <option value="Hadir">Hadir</option>
                                        <option value="Izin">Izin</option>
                                        <option value="Sakit">Sakit</option>
                                        <option value="Alfa">Alfa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Upload Bukti</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="bukti" name="bukti" accept="image/*">
                                        <label class=" custom-file-label" for="customFile">Choose file (.jpg, .png, .jpng)</label>
                                    </div>
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