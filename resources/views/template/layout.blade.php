@include('template.header')

<body class="scrollable-layout">
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <!-- ./ Preloader -->

    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        <div class="header d-print-none">
            <div class="header-container">
                <div class="header-left">
                    <div class="navigation-toggler">
                        <a href="#" data-action="navigation-toggler">
                            <i data-feather="menu"></i>
                        </a>
                    </div>

                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img class="logo" src="{{ asset('assets/media/image/logo2.png') }}" alt="logo">
                        </a>
                    </div>
                </div>

                <div class="header-body">
                    <div class="header-body-left">
                        <ul class="navbar-nav">
                            <li class="nav-item mr-3">
                                <div class="header-search-form">
                                    <form>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn">
                                                    <i data-feather="search"></i>
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Search">
                                            <div class="input-group-append">
                                                <button class="btn header-search-close-btn">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item dropdown d-none d-md-block">
                                <a href="#" class="nav-link" title="Actions" data-toggle="dropdown">Create</a>
                                <div class="dropdown-menu">
                                    <a href="{{ route('member.create') }}" class="dropdown-item">Add Member</a>
                                    <a href="{{ route('absensi.create') }}" class="dropdown-item">Add Absensi</a>
                                    @if(Auth::user()->level == 1)
                                    <a href="{{ route('pertemuan.create') }}" class="dropdown-item">Add Pertemuan</a>
                                    @endif
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="header-body-right">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link mobile-header-search-btn" title="Search">
                                    <i data-feather="search"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown d-none d-md-block">
                                <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                    <i class="maximize" data-feather="maximize"></i>
                                    <i class="minimize" data-feather="minimize"></i>
                                </a>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link nav-link-notify" title="Notifications" data-toggle="dropdown">
                                    <i data-feather="bell"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                    <div class="border-bottom px-4 py-3 text-center d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">Notifications</h5>
                                        <small class="opacity-7">2 unread notifications</small>
                                    </div>
                                    <div class="dropdown-scroll">
                                        <ul class="list-group list-group-flush">
                                            <li class="px-4 py-2 text-center small text-muted bg-light">Today</li>
                                            <li class="px-4 py-3 list-group-item">
                                                <a href="#" class="d-flex align-items-center hide-show-toggler">
                                                    <div class="flex-shrink-0">
                                                        <figure class="avatar mr-3">
                                                            <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                                <i class="ti-lock"></i>
                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                            2 steps verification
                                                            <i title="Mark as read" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                        </p>
                                                        <span class="text-muted small">20 min ago</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="px-4 py-3 list-group-item">
                                                <a href="#" class="d-flex align-items-center hide-show-toggler">
                                                    <div class="flex-shrink-0">
                                                        <figure class="avatar mr-3">
                                                            <span class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                                <i class="ti-server"></i>
                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                            Storage is running low!
                                                            <i title="Mark as read" data-toggle="tooltip" class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                        </p>
                                                        <span class="text-muted small">45 sec ago</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="px-4 py-2 text-center small text-muted bg-light">Old Notifications</li>
                                            <li class="px-4 py-3 list-group-item">
                                                <a href="#" class="d-flex align-items-center hide-show-toggler">
                                                    <div class="flex-shrink-0">
                                                        <figure class="avatar mr-3">
                                                            <span class="avatar-title bg-secondary-bright text-secondary rounded-circle">
                                                                <i class="ti-file"></i>
                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                            1 person sent a file
                                                            <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                        </p>
                                                        <span class="text-muted small">Yesterday</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="px-4 py-3 list-group-item">
                                                <a href="#" class="d-flex align-items-center hide-show-toggler">
                                                    <div class="flex-shrink-0">
                                                        <figure class="avatar mr-3">
                                                            <span class="avatar-title bg-success-bright text-success rounded-circle">
                                                                <i class="ti-download"></i>
                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                            Reports ready to download
                                                            <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                        </p>
                                                        <span class="text-muted small">Yesterday</span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="px-4 py-3 list-group-item">
                                                <a href="#" class="d-flex align-items-center hide-show-toggler">
                                                    <div class="flex-shrink-0">
                                                        <figure class="avatar mr-3">
                                                            <span class="avatar-title bg-primary-bright text-primary rounded-circle">
                                                                <i class="ti-arrow-top-right"></i>
                                                            </span>
                                                        </figure>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                            The invitation has been sent.
                                                            <i title="Mark as unread" data-toggle="tooltip" class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                        </p>
                                                        <span class="text-muted small">Last Week</span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="px-4 py-3 text-right border-top">
                                        <ul class="list-inline small">
                                            <li class="list-inline-item mb-0">
                                                <a href="#">Mark All Read</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                    <figure class="avatar avatar-sm">
                                        @if($user->level == 1)
                                        <img src="{{ asset('assets/media/image/logo-unisec.png') }}" class="rounded-circle" alt="avatar">
                                        @else
                                        <img src="{{ asset('assets/media/image/user/boy.png') }}" class="rounded-circle" alt="avatar">
                                        @endif
                                    </figure>
                                    <span class="ml-2 d-sm-inline d-none">{{ $user->name }}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                    <div class="text-center py-4">
                                        <figure class="avatar avatar-lg mb-3 border-0">
                                            @if($user->level == 1)
                                            <img src="{{ asset('assets/media/image/logo-unisec.png') }}" class="rounded-circle" alt="avatar">
                                            @else
                                            <img src="{{ asset('assets/media/image/user/boy.png') }}" class="rounded-circle" alt="avatar">
                                            @endif
                                        </figure>
                                        <h5 class="text-center">{{ $user->name }}</h5>
                                        <div class="mb-3 small text-center text-muted">{{ $user->username }}</div>
                                        <a href="#" class="btn btn-outline-light btn-rounded">Manage Your Account</a>
                                    </div>
                                    <div class="list-group">
                                        <a href="profile.html" class="list-group-item">View Profile</a>
                                        <a class="list-group-item text-danger" href="#" data-sidebar-target="#settings" data-toggle="modal" data-target="#logoutModal">Sign Out!</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- ./ Header -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- begin::sidebar -->
            @include('template.sidebar')
            <!-- end::sidebar -->

            <!-- Content body -->
            <div class=" content-body">
                <!-- Content -->
                <div class="content ">
                    @yield('content')
                </div>
                <!-- ./ Content -->

                <!-- Footer -->
                @extends('template.footer')
                <!-- ./ Footer -->
            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./ Layout wrapper -->
    @extends('template.modal')

    @extends('template.js')