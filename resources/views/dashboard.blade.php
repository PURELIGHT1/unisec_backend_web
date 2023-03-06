@extends('template.layout')
@section('content')
<div class="page-header d-md-flex justify-content-between">
    <div>
        <h3>Welcome back, {{ $user->name }}</h3>
        <p class="text-muted">This page shows an overview for your member unisec summary</p>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-8">
        <div class="card bg-facebook">
            <div class="card-body">
                <div class="text-center">
                    <h6 class="card-title mb-4 text-center">Total Member Mobile Legend</h6>
                    <h2 class="font-size-35 font-weight-bold text-center">{{ $ml }} Orang</h2>
                    <div class="mt-4">
                        <a href="{{ url('member') }}" class="btn btn-primary">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-info-gradient">
            <div class="card-body">
                <div class="text-center">
                    <h6 class="card-title mb-4 text-center">Total Member PUBGM</h6>
                    <h2 class="font-size-35 font-weight-bold text-center">{{ $pubgm }} Orang</h2>
                    <div class="mt-4">
                        <a href="{{ url('member') }}" class="btn btn-primary">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-12">
        <div class="card bg-dribbble">
            <div class="card-body">
                <div class="text-center">
                    <h6 class="card-title mb-4 text-center">Total Member Valorant</h6>
                    <h2 class="font-size-35 font-weight-bold text-center">{{ $valo }} Orang</h2>
                    <div class="mt-4">
                        <a href="{{ url('member') }}" class="btn btn-primary">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card bg-danger-gradient">
            <div class="card-body">
                <div class="text-center">
                    <h6 class="card-title mb-4 text-center">Total Member Dota 2</h6>
                    <h2 class="font-size-35 font-weight-bold text-center">{{ $dota2 }} Orang</h2>
                    <div class="mt-4">
                        <a href="{{ url('member') }}" class="btn btn-primary">View Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection