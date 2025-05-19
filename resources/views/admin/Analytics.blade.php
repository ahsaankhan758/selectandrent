@extends('admin.layouts.Master')

@section('title')
    Analytics Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="#">Analytics</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
            <h4 class="page-title">Analytics Overview</h4>
        </div>
    </div>
</div>

<div class="row">
    {{-- Card 1: Homepage Views --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="me-3 fs-3 text-primary"><i class="fa fa-eye"></i></div>
            <div>
                <h6 class="text-muted mb-1">Homepage Views</h6>
                <p class="mb-0 text-dark fs-5">{{ $homepageViews }}</p>
                <small class="text-muted">Unique {{ $uniqueHomepageViews }}</small>
            </div>
        </div>
    </div>
</div>


   {{-- Card 2: Car Detail Views --}}
<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="me-3 fs-3 text-info"><i class="fa fa-car"></i></div>
            <div>
                <h6 class="text-muted mb-1">Car Detail Views</h6>
                <p class="mb-0 text-dark fs-5">{{ $carDetailViews }}</p>
                <small class="text-muted">Unique {{ $uniqueCarDetailViews }}</small>
            </div>
        </div>
    </div>
</div>

{{-- Card 3: Booking Clicks --}}
<div class="col-lg-4 col-md-6 col-sm-12 mb-4">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <div class="me-3 fs-3 text-success"><i class="fa fa-mouse-pointer"></i></div>
            <div>
                <h6 class="text-muted mb-1">Booking Clicks</h6>
                <p class="mb-0 text-dark fs-5">{{ $bookingClicks }}</p>
                <small class="text-muted">Unique {{ $uniqueBookingClicks }}</small>
            </div>
        </div>
    </div>
</div>


    {{-- Card 4: Completed Payments --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-warning"><i class="fa fa-credit-card"></i></div>
                <div>
                    <h6 class="text-muted mb-1">Completed Payments</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 5 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-danger"><i class="fa fa-chart-bar"></i></div>
                <div>
                    <h6 class="text-muted mb-1">Contact Page Views</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 6 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-secondary"><i class="fa fa-chart-pie"></i></div>
                <div>
                    <h6 class="text-muted mb-1">Signup Page Views</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 7 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-dark"><i class="fa fa-database"></i></div>
                <div>
                    <h6 class="text-muted mb-1">Login Page Views</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 8 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-primary"><i class="fa fa-chart-line"></i></div>
                <div>
                    <h6 class="text-muted mb-1">Profile Updates</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 9 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-info"><i class="fa fa-server"></i></div>
                <div>
                    <h6 class="text-muted mb-1">Password Reset Requests</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 10 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-success"><i class="fa fa-chart-area"></i></div>
                <div>
                    <h6 class="text-muted mb-1">Newsletter Signups</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 11 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-warning"><i class="fa fa-poll"></i></div>
                <div>
                    <h6 class="text-muted mb-1">11</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- Card 12 --}}
    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
        <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="me-3 fs-3 text-danger"><i class="fa fa-tachometer-alt"></i></div>
                <div>
                    <h6 class="text-muted mb-1">12</h6>
                    <h2 class="text-dark">--</h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
