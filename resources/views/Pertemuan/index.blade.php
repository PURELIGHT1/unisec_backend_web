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
            <a type="button" class="btn btn-warning mr-2 mb-2" href="{{ url('absen') }}"><i data-feather="external-link"></i> List Presensi Member</a>
            <a type="button" class="btn btn-danger mr-2 mb-2" href="{{ url('presensi') }}"><i data-feather="link"></i> Link Presensi</a>
            @if($user->level == 1)
            <a type="button" class="btn btn-primary mr-2 mb-2" href="{{ route('pertemuan.create') }}"><i data-feather="plus"></i> Tambah Baru</a>
            @endif
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($pertemuan as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y');}}</td>
                    <td>{{ $item->jam_mulai }}</td>
                    <td>{{ $item->jam_selesai }}</td>
                    <td>
                        @if($item->status == 1)
                        <span class="badge badge-success">Aktif</span>
                        @else
                        <span class="badge badge-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                @if($user->level == 1)
                                <a href="{{ route('pertemuan.edit', $item->id) }}" class="dropdown-item">Update</a>
                                <form onclick="return confirm('Apakah Anda Yakin ?');" action="{{ route('pertemuan.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item">Hapus</button>
                                </form>
                                @else
                                <a class="dropdown-item" disabled>No Action For U</a>
                                @endif
                                <!-- <a type="submit" class="dropdown-item deleteData" value="{{ $item->id }}">Delete</a> -->
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endsection