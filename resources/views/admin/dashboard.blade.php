@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-primary rounded me-3">
                            <i class="fe-layers avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">{{ $totalbooking }}</h3>
                            <p class="text-muted mb-0">Total Booking</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-danger rounded me-3">
                            <i class="fe-dollar-sign avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">{{$totalrevenue}}</h3>
                            <p class="text-muted mb-0">Total Revenue</p>
                        </div>
                    </div>
                </div>
            </div>

             <!-- Card 9 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-dark rounded me-3">
                            <i class="fe-user-check avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">1234</h3>
                            <p class="text-muted mb-0">Commission</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-info rounded me-3">
                            <i class="fe-credit-card avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">256</h3>
                            <p class="text-muted mb-0">Payouts to Rental Companies</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-warning rounded me-3">
                            <i class="fe-briefcase avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">{{$totalpending}}</h3>
                            <p class="text-muted mb-0">Pending Payments</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-secondary rounded me-3">
                            <i class="fe-calendar avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">{{ $bookedCars }}</h3>
                            <p class="text-muted mb-0">Active Booked</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-success rounded me-3">
                            <i class="fe-check-circle avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">{{$totalcancelled}}</h3>
                            <p class="text-muted mb-0">Cancellations Today</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 7 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-pink rounded me-3">
                            <i class="fe-users avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">7,410</h3>
                            <p class="text-muted mb-0">Bookings Requiring Attention</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 8 -->
            <div class="col-md-4 mb-4">
                <div class="card bg-pattern">
                    <div class="card-body d-flex">
                        <div class="avatar-md bg-dark rounded me-3">
                            <i class="fe-bar-chart avatar-title font-22 text-white"></i>
                        </div>
                        <div>
                            <h3 class="text-dark my-1">{{ $totalCars }}</h3>
                            <p class="text-muted mb-0">Total Cars</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end row-->
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body reminder-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Reminders</h5>
                            <button class="btn btn-light btn-sm rounded-circle"><i class="mdi mdi-plus"></i></button>
                        </div>
                        <div class="mt-3" style="max-height: 358px; overflow-y: auto;">
                            @forelse ($reminder as $item)
                                <div class="reminder-item mb-3">
                                    <div class="reminder-icon">
                                        <i class="mdi mdi-alert-circle-outline"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 reminder-text">{{ $item->name }}</h6>
                                        <p class="mb-1">{{ $item->description }}</p>
                                        <small class="text-muted">{{ $item->created_at->format('Y-m-d') }}</small>
                                    </div>
                                </div>
                            @empty
                                <div class="text-muted text-center">
                                    No Reminders Set.
                                </div>
                            @endforelse
                        </div>
                        @if ($reminder->count() > 5)
                            <div class="text-end mt-3">
                                <a href="#" class="btn btn-sm text-white" style="background-color: #f06115;">
                                    View All
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <style>
                .reminder-body div[style*="overflow-y: auto;"] {
                    scrollbar-width: thin;
                    scrollbar-color: #ccc transparent;
                }

                .reminder-body div[style*="overflow-y: auto;"]::-webkit-scrollbar {
                    width: 4px;
                }

                .reminder-body div[style*="overflow-y: auto;"]::-webkit-scrollbar-thumb {
                    background-color: #ccc;
                    border-radius: 10px;
                }
            </style>

            <!-- end col -->
            <div class="col-xl-6 col-lg-6">
                <div class="card" dir="ltr">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Bar Chart</h4>
                        <div class="text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-info"></i>
                                    Bitcoin</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i>
                                    Ethereum</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-muted"></i>
                                    Litecoin</span>
                            </p>
                        </div>
                        <div id="morris-bar-example" style="height: 350px; position: relative;" class="morris-chart"
                            data-colors="#02c0ce,#0acf97,#ebeff2"><svg height="350" version="1.1" width="424"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                style="overflow: hidden; position: relative; left: -0.333313px; top: -0.200012px;">
                                <desc>Created with Raphaël 2.3.0</desc>
                                <defs></defs><text
                                    style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="32.5" y="298.78260174507153" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888" font-weight="normal">
                                    <tspan dy="4.0000189852143535">0</tspan>
                                </text>
                                <path style="" fill="none" stroke="#41505f" d="M45,298.5H399"
                                    stroke-opacity="0.07" stroke-width="0.5"></path><text
                                    style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="32.5" y="230.33695130880363" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888" font-weight="normal">
                                    <tspan dy="4.000001483516769">25</tspan>
                                </text>
                                <path style="" fill="none" stroke="#41505f" d="M45,230.5H399"
                                    stroke-opacity="0.07" stroke-width="0.5"></path><text
                                    style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="32.5" y="161.89130087253577" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888" font-weight="normal">
                                    <tspan dy="3.9999992406082754">50</tspan>
                                </text>
                                <path style="" fill="none" stroke="#41505f" d="M45,161.5H399"
                                    stroke-opacity="0.07" stroke-width="0.5"></path><text
                                    style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="32.5" y="93.4456504362679" text-anchor="end" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888" font-weight="normal">
                                    <tspan dy="4.000004627094313">75</tspan>
                                </text>
                                <path style="" fill="none" stroke="#41505f" d="M45,93.5H399"
                                    stroke-opacity="0.07" stroke-width="0.5"></path><text
                                    style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="32.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px"
                                    stroke="none" fill="#888888" font-weight="normal">
                                    <tspan dy="4.000000476837158">100</tspan>
                                </text>
                                <path style="" fill="none" stroke="#41505f" d="M45,25.5H399"
                                    stroke-opacity="0.07" stroke-width="0.5"></path><text
                                    style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="373.7142857142857" y="311.28260174507153" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    font-weight="normal"
                                    transform="matrix(0.8192,-0.5736,0.5736,0.8192,-122.0175,284.3989)">
                                    <tspan dy="4.0000189852143535">2018</tspan>
                                </text><text
                                    style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="323.14285714285717" y="311.28260174507153" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    font-weight="normal"
                                    transform="matrix(0.8192,-0.5736,0.5736,0.8192,-131.1632,255.3923)">
                                    <tspan dy="4.0000189852143535">2017</tspan>
                                </text><text
                                    style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="272.57142857142856" y="311.28260174507153" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    font-weight="normal"
                                    transform="matrix(0.8192,-0.5736,0.5736,0.8192,-140.3089,226.3858)">
                                    <tspan dy="4.0000189852143535">2016</tspan>
                                </text><text
                                    style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="222" y="311.28260174507153" text-anchor="middle" font-family="sans-serif"
                                    font-size="12px" stroke="none" fill="#888888" font-weight="normal"
                                    transform="matrix(0.8192,-0.5736,0.5736,0.8192,-149.4547,197.3792)">
                                    <tspan dy="4.0000189852143535">2015</tspan>
                                </text><text
                                    style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="171.42857142857144" y="311.28260174507153" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    font-weight="normal"
                                    transform="matrix(0.8192,-0.5736,0.5736,0.8192,-158.6004,168.3726)">
                                    <tspan dy="4.0000189852143535">2014</tspan>
                                </text><text
                                    style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="120.85714285714286" y="311.28260174507153" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    font-weight="normal"
                                    transform="matrix(0.8192,-0.5736,0.5736,0.8192,-167.7462,139.366)">
                                    <tspan dy="4.0000189852143535">2013</tspan>
                                </text><text
                                    style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;"
                                    x="70.28571428571428" y="311.28260174507153" text-anchor="middle"
                                    font-family="sans-serif" font-size="12px" stroke="none" fill="#888888"
                                    font-weight="normal"
                                    transform="matrix(0.8192,-0.5736,0.5736,0.8192,-176.8919,110.3595)">
                                    <tspan dy="4.0000189852143535">2012</tspan>
                                </text>
                                <rect x="60.17142857142857" y="25" width="4.742857142857143" height="273.78260174507153"
                                    rx="0" ry="0" fill="#02c0ce" stroke="none"
                                    style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="67.91428571428571" y="52.378260174507176" width="4.742857142857143"
                                    height="246.40434157056436" rx="0" ry="0" fill="#0acf97"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="75.65714285714286" y="189.26956104704294" width="4.742857142857143"
                                    height="109.51304069802859" rx="0" ry="0" fill="#ebeff2"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="110.74285714285713" y="93.4456504362679" width="4.742857142857143"
                                    height="205.33695130880363" rx="0" ry="0" fill="#02c0ce"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="118.48571428571428" y="120.82391061077504" width="4.742857142857143"
                                    height="177.9586911342965" rx="0" ry="0" fill="#0acf97"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="126.22857142857141" y="244.02608139605724" width="4.742857142857143"
                                    height="54.756520349014295" rx="0" ry="0" fill="#ebeff2"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="161.31428571428572" y="161.89130087253577" width="4.742857142857143"
                                    height="136.89130087253577" rx="0" ry="0" fill="#02c0ce"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="169.05714285714285" y="189.26956104704294" width="4.742857142857143"
                                    height="109.51304069802859" rx="0" ry="0" fill="#0acf97"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="176.8" y="161.89130087253577" width="4.742857142857143"
                                    height="136.89130087253577" rx="0" ry="0" fill="#ebeff2"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="211.8857142857143" y="93.4456504362679" width="4.742857142857143"
                                    height="205.33695130880363" rx="0" ry="0" fill="#02c0ce"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="219.62857142857143" y="120.82391061077504" width="4.742857142857143"
                                    height="177.9586911342965" rx="0" ry="0" fill="#0acf97"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="227.3714285714286" y="38.6891300872536" width="4.742857142857143"
                                    height="260.09347165781793" rx="0" ry="0" fill="#ebeff2"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="262.45714285714286" y="161.89130087253577" width="4.742857142857143"
                                    height="136.89130087253577" rx="0" ry="0" fill="#02c0ce"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="270.2" y="189.26956104704294" width="4.742857142857143"
                                    height="109.51304069802859" rx="0" ry="0" fill="#0acf97"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="277.9428571428571" y="238.5504293611558" width="4.742857142857143"
                                    height="60.232172383915724" rx="0" ry="0" fill="#ebeff2"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="313.0285714285714" y="93.4456504362679" width="4.742857142857143"
                                    height="205.33695130880363" rx="0" ry="0" fill="#02c0ce"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="320.77142857142854" y="120.82391061077504" width="4.742857142857143"
                                    height="177.9586911342965" rx="0" ry="0" fill="#0acf97"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="328.5142857142857" y="145.46434476783148" width="4.742857142857143"
                                    height="153.31825697724005" rx="0" ry="0" fill="#ebeff2"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="363.6" y="25" width="4.742857142857143" height="273.78260174507153"
                                    rx="0" ry="0" fill="#02c0ce" stroke="none"
                                    style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="371.34285714285716" y="52.378260174507176" width="4.742857142857143"
                                    height="246.40434157056436" rx="0" ry="0" fill="#0acf97"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                                <rect x="379.0857142857143" y="134.51304069802862" width="4.742857142857143"
                                    height="164.2695610470429" rx="0" ry="0" fill="#ebeff2"
                                    stroke="none" style="fill-opacity: 1;" fill-opacity="1"></rect>
                            </svg>
                            <div class="morris-hover morris-default-style" style="display: none;"></div>
                        </div>
                    </div>
                </div> <!-- end card-->
            </div>
        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
