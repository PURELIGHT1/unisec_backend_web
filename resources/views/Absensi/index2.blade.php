<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNISEC | {{$titles}}</title>

    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('/') }}assets/media/image/logo-unisec.png.png" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/app.min.css" type="text/css">

    <!-- Prism -->
    <link rel="stylesheet" href="../../vendors/prism/prism.css" type="text/css">

    <!-- DataTable -->
    <link rel="stylesheet" href="{{ asset('vendors/dataTable/datatables.min.css') }}" type="text/css">

    <!-- Lightbox -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/lightbox/magnific-popup.css" type="text/css">
</head>
<style>
    * {
        font-family: 'Courier New', Courier, monospace;
    }
</style>

<body class="form-membership">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->

    <!-- Syarat Upload Gambar -->
    <div class="card">
        <div class="card-body">
            <h6 class="card-title">Ketentuan</h6>

            <div class="accordion accordion-danger custom-accordion">
                <div class="accordion-row open">
                    <a href="#" class="accordion-header">
                        <span> Ketentuan Upload Bukti (Presensi)</span>
                        <i data-feather="chevron-up"></i>
                        <i data-feather="chevron-down"></i>
                    </a>
                    <div class="accordion-body">
                        <ol class="huruf">
                            <li>
                                Upload Gambar Wajib di isi atau tidak boleh kosong
                            </li>
                            <li>
                                Upload Gambar Wajib di isi berupa gambar (jpeg,png,jpg)
                            </li>
                            <li>
                                Upload Gambar Wajib di isi dengan ukuran maksimal 2Mb atau setara dengan 2048 Kb
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="accordion-row">
                    <a href="#" class="accordion-header">
                        <span>Jika Gambar yang di upload Salah</span>
                        <i data-feather="chevron-up"></i>
                        <i data-feather="chevron-down"></i>
                    </a>
                    <div class="accordion-body">
                        <ol class="upper-alpha">
                            <li>
                                Konfirmasi ke Penanggung jawab
                            </li>
                            <li>
                                Minta PJ untuk ubah gambar sesuai dengan yang ingin diubah
                            </li>
                        </ol>
                    </div>
                </div>
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
                        <th>Divisi</th>
                        <th>Status</th>
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
                        <td>{{ $item->div_nama }}</td>
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
    <footer class="content-footer">
        <div>© 2023 UNISEC - <a href="https://www.instagram.com/unisec.uajy/" target=" _blank">KOMINFO</a></div>
        <div>
            <nav class="nav">
                <a href="https://www.instagram.com/bram.m.p/" class="nav-link">
                    Design By BMP'20</a>
            </nav>
        </div>
    </footer>
    <!-- Plugin scripts -->
    <script src="{{ asset('/') }}vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="{{ asset('/') }}assets/js/app.min.js"></script>
    <!-- DataTable -->
    <script src="{{ asset('/') }}vendors/dataTable/datatables.min.js"></script>
    <script src="{{ asset('/') }}assets/js/examples/datatable.js"></script>

    <!-- Lightbox -->
    <script src="{{ asset('/') }}vendors/lightbox/jquery.magnific-popup.min.js"></script>
    <script src="{{ asset('/') }}assets/js/examples/lightbox.js"></script>

    <!-- Prism -->
    <script src="{{ asset('/') }}vvendors/prism/prism.js"></script>

</html>