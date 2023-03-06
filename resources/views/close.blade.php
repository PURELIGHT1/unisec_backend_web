<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNISEC | Form Presensi Anggota</title>

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

    p {
        color: white;
    }
</style>

<body class="form-membership">

    <!-- begin::preloader-->
    <div class="preloader">
        <div class="preloader-icon"></div>
    </div>
    <!-- end::preloader -->

    <div id="wrapper">

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Container Fluid-->
                <div class="container-fluid" id="container-wrapper">
                    <div class="text-center">
                        <center>
                            <img src="{{ asset('assets/media/image/waltere.png') }}" alt="image" width="30%" height="30%">
                            <br><br>

                            <h3 class="text-gray-800 font-weight-bold"></h3>
                            <p class="lead text-gray-800 mx-auto">Absensi Sudah Ditutup</p>
                        </center>
                    </div>

                </div>
                <!---Container Fluid-->
            </div>
        </div>
    </div>

    <!-- Plugin scripts -->
    <script src="{{ asset('/') }}vendors/bundle.js"></script>

    <!-- App scripts -->
    <script src="{{ asset('/') }}assets/js/app.min.js"></script>
</body>

</html>