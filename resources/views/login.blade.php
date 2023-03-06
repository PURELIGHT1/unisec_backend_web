<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UNISEC - GAMERS</title>

    <!-- Logo -->
    <link rel="shortcut icon" href="{{ asset('assets/media/image/logo-unisec.png') }}" />

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{ asset('vendors/bundle.css') }}" type="text/css">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css">

    <!-- Toast -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
</head>

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


        <h5>Sign in</h5>

        <!-- form -->
        <form action="{{ url('login/proses') }}" method="post">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control 
                @error('username') 
                    is-invalid
                @enderror
                " placeholder="Username" autofocus name="username" value="{{ old('username') }}">

                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <input type="password" class="form-control 
                @error('password') 
                    is-invalid 
                @enderror
                " placeholder="Password" autofocus name="password" value="{{ old('password') }}">

                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                </div>
                <a href="" disabled>Reset password</a>
            </div>
            <button class="btn btn-primary btn-block">Sign in</button>
            <hr>
        </form>
        <!-- ./ form -->
    </div>

    <!-- Plugin scripts -->
    <script src="{{ asset('vendors/bundle.js') }}"></script>

    <!-- App scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Form validation example -->
    <script src="{{ asset('assets/js/examples/form-validation.js') }}"></script>

    <!-- Toast -->
    <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
</body>
@extends('template.toast')

</html>