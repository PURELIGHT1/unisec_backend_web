@extends('template.layout')
@section('content')


<div class="page-header d-md-flex justify-content-between">
    <div>
        <h3>{{ $titles }}</h3>
        <nav aria-label="breadcrumb" class="d-flex align-items-start">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/home') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $titles }}</li>
            </ol>
        </nav>
    </div>
    <div class="mt-2 mt-md-0">
        <div class="btn-group" role="group">
            @if($user->level == 1)
            <a type="button" class="btn btn-success mr-2 mb-2" href="/exportAbsensi"><i data-feather="file"></i> Export</a>
            <a type="button" class="btn btn-success mr-2 mb-2" href="/exportAbsensiTipe2"><i data-feather="file"></i> Export Full</a>
            @endif
            <a type="button" class="btn btn-primary mr-2 mb-2" href="{{ route('absensi.create') }}"><i data-feather="plus"></i> Tambah Baru</a>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bukti</th>
                    <th>Pertemuan</th>
                    <th>NPM</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($absensi as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        <a class="image-popup" href="{{ asset('bukti/' .$item->bukti) }}">
                            <img src="{{ asset('bukti/' .$item->bukti) }}" class="img-fluid" width="200px" height="200px">
                        </a>
                    </td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>
                        @if($item->status == 'Hadir')
                        <span class="badge badge-success">{{ $item->status }}</span>
                        @elseif($item->status == 'Alfa')
                        <span class="badge badge-danger">{{ $item->status }}</span>
                        @elseif($item->status == 'Sakit')
                        <span class="badge badge-primary">{{ $item->status }}</span>
                        @elseif($item->status == 'Izin')
                        <span class="badge badge-info">{{ $item->status }}</span>
                        @elseif($item->status == 'Belum Absen')
                        <span class="badge badge-warning">{{ $item->status }}</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                @if($user->level == 1)
                                <a href="{{ route('absensi.edit', $item->id) }}" class="dropdown-item">Update</a>
                                @endif
                                <a href="{{ route('absensi.show', $item->id) }}" class="dropdown-item">Verifikasi</a>
                                <form onclick="return confirm('Apakah Anda Yakin ?');" action="{{ route('absensi.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Hapus</button>
                                </form>
                                <!-- Belum Absen	Belum Absen, Hadir, Izin, Sakit, Alfa -->
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Bukti</th>
                    <th>Pertemuan</th>
                    <th>NPM</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection