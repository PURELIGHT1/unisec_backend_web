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
            <a type="button" class="btn btn-success mr-2 mb-2" href="/export"><i data-feather="file"></i> Export</a>
            @endif
            <a type="button" class="btn btn-primary mr-2 mb-2" href="{{ route('member.create') }}"><i data-feather="plus"></i> Tambah Baru</a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-head">
    </div>
    <div class=" card-body">

        <table id="example1" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Email</th>
                    <th>Divisi</th>
                    <th>Aksi</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($member as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->emailStudents }}</td>
                    <td>{{ $item->div_name }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                Action
                            </button>
                            <div class="dropdown-menu">
                                @if($user->level == 1)
                                <a href="{{ route('member.edit', $item->id) }}" class="dropdown-item">Update</a>
                                <form onclick="return confirm('Apakah Anda Yakin ?');" action="{{route('member.destroy',$item->id) }}" method="POST">
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
                    <td>
                        @if($item->status == 'Aktif')
                        <span class="badge badge-success">{{ $item->status }}</span>
                        @else
                        <span class="badge badge-danger">{{ $item->status }}</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Email</th>
                    <th>Divisi</th>
                    <th>Aksi</th>
                    <th>Status</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<!-- MEMBER BUATAN PJ -->
@if($user->level == 1)
<div class="card">
    <div class="card-body">
        <table id="example1" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Divisi</th>
                    <th>Pembuat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @forelse ($pembuat as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->npm }}</td>
                    <td>{{ $item->div_name }}</td>
                    <td>{{ $item->pembuat }}</td>
                    <td>
                        <a class="btn btn-success" style="border-radius: 10px;" href="{{ route('member.show', $item->id) }}">
                            Terima
                        </a>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">Data Member Tidak Ada</div>
                @endforelse
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NPM</th>
                    <th>Divisi</th>
                    <th>Pembuat</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@endif
@endsection