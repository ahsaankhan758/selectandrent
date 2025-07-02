@extends('admin.layouts.Master')
@section('title')
    {{ ucfirst($role) }} {{ __('messages.financial') }}
@endsection
@section('content')
    @if (can('financials', 'view'))
        <script>
            window.earningSummaryUrl = "{{ route('earningSummary') }}";
            window.orderStatusRoute = "{{ route('orders.status.data') }}";
            window.bookingChartRoute = "{{ route('bookings.chart-data') }}";
            window.earningsdata = "{{ route('earnings.data') }}";
        </script>
        <script src="{{ asset('assets/js/admin/earningsummary.js') }}"></script>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">{{ __('messages.financial') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('messages.financial') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('messages.financial') }}</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <!-- added by farhan -->
        <div class="col-lg-12 my-3 row" >
            @include('admin.financial.include.filter')
        </div>

        <div class="row">
            <!-- 8 Column Section -->
            <div class="col-xl-8 col-md-8" id="cards-container">
                @include('admin.financial.include.cards')
            </div>
            <!-- 4 Column Section (Rent Status Card) -->
            <!-- Chart Container -->
            <div class="col-xl-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">{{ __('messages.order_status') }}</h4>
                            <div class="dropdown">
                            <button class="btn btn-light btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ __('messages.week') }} <i class="fas fa-angle-down ms-2"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item filter-option" href="#"
                                            data-filter="week">{{ __('messages.week') }}</a>
                                    </li>
                                    <li><a class="dropdown-item filter-option" href="#"
                                            data-filter="month">{{ __('messages.month') }}</a>
                                    </li>
                                    <li><a class="dropdown-item filter-option" href="#"
                                            data-filter="last_month">{{ __('messages.last_month') }}</a></li>
                                    <li><a class="dropdown-item filter-option" href="#"
                                            data-filter="year">{{ __('messages.this_year') }}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div id="cardCollapseRentStatus" class="collapse show">
                            <div class="text-center">
                                <div dir="ltr">
                                    <div id="lifetime-sales" data-colors="#07407B,#f06115,#ebeff2" style="height: 270px;"
                                        class="morris-chart mt-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- added by farhan -->
        <div class="row">
            <div class="col-xl-12 col-md-12 summary2">
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>{{ __('messages.booking_overview') }}</h3>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" id="bookingDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('messages.this_year') }} <i class="fas fa-angle-down ms-2"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="bookingDropdown">
                                <li><a class="dropdown-item" href="#"
                                        onclick="updateChart('this_year')">{{ __('messages.this_year') }}</a>
                                </li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="updateChart('month')">{{ __('messages.month') }}</a>
                                </li>
                                <li><a class="dropdown-item" href="#"
                                        onclick="updateChart('last_month')">{{ __('messages.last_month') }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <canvas id="bookingsChart"></canvas>
                </div>
            </div>
            {{-- <div class="col-xl-4 col-md-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body reminder-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">{{ __('messages.reminders') }}</h5>
                            <button class="btn btn-light btn-sm rounded-circle"><i class="mdi mdi-plus"></i></button>
                        </div>
                        <div class="mt-3">
                            <!-- Reminder 1 -->
                            <div class="reminder-item">
                                <div class="reminder-icon">
                                    <i class="mdi mdi-alert-circle-outline"></i>
                                </div>
                                <div>
                                    <p class="mb-1 reminder-text">Inspect and service the fleet vehicles.</p>
                                    <small class="text-muted">2028-08-10</small>
                                </div>
                            </div>
                            <!-- Reminder 2 -->
                            <div class="reminder-item">
                                <div class="reminder-icon">
                                    <i class="mdi mdi-alert-circle-outline"></i>
                                </div>
                                <div>
                                    <p class="mb-1 reminder-text">Update the car rental pricing plans for the upcoming season.
                                    </p>
                                    <small class="text-muted">2028-08-12</small>
                                </div>
                            </div>
                            <!-- Reminder 3 -->
                            <div class="reminder-item">
                                <div class="reminder-icon">
                                    <i class="mdi mdi-alert-circle-outline"></i>
                                </div>
                                <div>
                                    <p class="mb-1 reminder-text">Review customer feedback and implement improvements.</p>
                                    <small class="text-muted">2028-08-15</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row mt-2">
            <div class="col-xl-12 col-md-12 summary">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="header-title mb-0">{{ __('messages.earning_summary') }}</h4>
                            <div class="dropdown">
                                <button id="dropdownBtn" class="btn btn-light btn-sm dropdown-toggle" type="button"
                                    data-bs-toggle="dropdown">
                                    {{ __('messages.12_month') }} <i class="fas fa-angle-down ms-2"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"
                                        onclick="fetchEarnings(1, 'Last Month')">{{ __('messages.last_month') }}</a>
                                    <a class="dropdown-item" href="#"
                                        onclick="fetchEarnings(3, 'Last 3 Months')">{{ __('messages.3_month') }}</a>
                                    <a class="dropdown-item" href="#"
                                        onclick="fetchEarnings(6, 'Last 6 Months')">{{ __('messages.6_month') }}</a>
                                    <a class="dropdown-item" href="#"
                                        onclick="fetchEarnings(12, 'Last 12 Months')">{{ __('messages.12_month') }}</a>
                                </div>
                            </div>
                        </div>

                        <div id="earnings-chart" style="height: 300px;"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" id="dashboardtable">
            @include('admin.financial.include.dashboardBookingtable')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection
