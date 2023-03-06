@extends('template.layout')
@section('content')
<div class="page-header d-md-flex justify-content-between">
    <div>
        <h3>{{ $titles }}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('pertemuan') }}">{{ $titles }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $titles }}</li>
            </ol>
        </nav>
    </div>
    <div class="mt-2 mt-md-0">
        <div class="btn-group" role="group">
            <a type="button" class="btn btn-danger mr-2 mb-2" href="{{ url('pertemuan') }}"><i data-feather="arrow-left"></i> Kembali</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" action="{{ route('pertemuan.store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Nama Pertemuan</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Pertemuan">
                                    @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Tanggal</label>
                                    <input type="text" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" placeholder="Date">
                                    @error('tanggal')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Buka Pertemuan</label>
                                    <div class="input-group clockpicker-demo">
                                        <div class=" input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="jam_mulai" class="form-control create-event-timepicker @error('jam_mulai') is-invalid @enderror">
                                        @error('jam_mulai')
                                        <div class=" invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Tutup Pertemuan</label>
                                    <div class="input-group clockpicker-demo">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-clock-o"></i>
                                            </span>
                                        </div>
                                        <input type="text" name="jam_selesai" class="form-control create-event-timepicker @error('jam_selesai') is-invalid @enderror">
                                        @error('jam_selesai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
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