<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNISEC | {{$titles}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/') }}assets/media/image/logo-unisec.png" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('/') }}vendors/bundle.css" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/app.min.css" type="text/css">
</head>
<style>
    * {
        font-family: 'Courier New', Courier, monospace;
    }

    h5 {
        font-size: large;
        font-size: 20px;
    }

    label,
    input,
    button,
    a {
        font-size: 18px;
    }
</style>

<body class="form-membership">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->

    <div class="form-wrapper">

        <!-- logo -->
        <div id="logo">
            <img src="{{ asset('assets/media/image/logo-unisec.png') }}" alt="image" width="40%" height="40%">
        </div>
        <!-- ./ logo -->


        <h5>Absensi {{ $pertemuan[0][0]->name }}</h5>

        <!-- form -->
        <form class="needs-validation" novalidate="" action="{{ url('save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group d-flex align-items-center">
                <div class="mr-3">
                    <div class="form-row">
                        <input type="hidden" name="name" class="form-control" value="{{ $pertemuan[0][0]->name }}">
                        <div class="col-md-12 mb-3">
                            <label for="formFile" class="form-label">Upload Bukti <strong>(Maksimal 2MB)</strong></label>
                            <input class="form-control" type="file" id="formFile" id="bukti" name="bukti" accept="image/*">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Nomor Pokok Mahasiswa</label>
                            <input type="text" name="npm" class="form-control @error('npm') is-invalid @enderror" placeholder="Nomor Pokok Mahasiswa">
                            @error('npm')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <!-- <input type=" password" class="form-control" placeholder="Password" required autofocus> -->
            </div>
            <button class="btn btn-primary btn-block btn-rounded">Kirim</button>
            <hr>
            <a href="{{ url('absen') }}" class="btn btn-sm btn-outline-success ml-1 btn-rounded">Cek Status Presensi</a>
        </form>
        <!-- ./ form -->


    </div>

    <!-- Plugin scripts -->
    <script src="{{ asset('/') }}vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="{{ asset('/') }}assets/js/app.min.js"></script>
</body>

</html>