@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
    <script>
        window.bookingOverviewDataRoute = "{{ route('bookingOverviewDataRoute') }}";
    </script>
    <script src="{{ asset('assets/js/admin/dashboardBooking.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="row mt-3">
        <div class="col-lg-12 my-3 row">
            @include('admin.financial.include.filter')
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="booking-dashboard">
                <div class="card booking-card">
                    <div class="booking-cards-header">
                        <span class="booking-booking-icon-container">
                            <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">
                        </span>
                        <h6>{{ __('messages.upcoming_booking') }}</h6>
                    </div>
                    <h3 class="mt-2">{{ $futureConfirmedCount }}</h3>
                    <div class="booking-chart-up"></div>
                    <div class="booking-status">
                        <span class="up">&#9650; +2.97%</span>
                    </div>
                    <div class="booking-bottom-text">from last week</div>
                </div>

                <div class="card booking-card">
                    <div class="booking-cards-header">
                        <span class="booking-booking-icon-container">
                            <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">

                        </span>
                        <h6>{{ __('messages.pending_booking') }}</h6>
                    </div>
                    <h3 class="mt-2">{{ $pendingCount }}</h3>
                    <div class="booking-chart-up"></div>
                    <div class="booking-status">
                        <span class="up">&#9650; +1.72%</span>
                    </div>
                    <div class="booking-bottom-text">from last week</div>
                </div>
                <div class=" card booking-card">
                    <div class="booking-cards-header">
                        <span class="booking-booking-icon-container">
                            <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">

                        </span>
                        <h6>{{ __('messages.cancelled_booking') }}</h6>
                    </div>
                    <h3 class="mt-2">{{ $cancelledCount }}</h3>
                    <div class="chart-down"></div>
                    <div class="booking-status">
                        <span class="down">&#9660; -4.02%</span>
                    </div>
                    <div class="booking-bottom-text">from last week</div>
                </div>
                <div class="card booking-card">
                    <div class="booking-cards-header">
                        <span class="booking-booking-icon-container">
                            <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">

                        </span>
                        <h6>{{ __('messages.complete_booking') }}</h6>
                    </div>
                    <h3 class="mt-2">{{ $confirmedCount }}</h3>
                    <div class="booking-chart-up"></div>
                    <div class="booking-status">
                        <span class="up">&#9650; +3.15%</span>
                    </div>
                    <div class="booking-bottom-text">from last week</div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-12">
            <div class="chart-container">
                <h3>{{ __('messages.booking_overview') }}</h3>
                <div class="booking-legend mt-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <span class="d-flex align-items-center">
                            <div class="done-color me-1" style="width: 12px; height: 12px;"></div>
                            {{ __('messages.confirmed') }}
                        </span>
                        <span class="d-flex align-items-center ms-3">
                            <div class="canceled-color me-1" style="width: 12px; height: 12px;"></div>
                            {{ __('messages.cancelled') }}
                        </span>
                    </div>
                    <select id="monthSelector" class="form-select form-select-sm w-auto">
                        <option value="3">{{ __('messages.3_month') }}</option>
                        <option value="6">{{ __('messages.6_month') }}</option>
                        <option value="12" selected>{{ __('messages.12_month') }}</option>
                    </select>
                </div>
                <div class="chart-wrapper">
                    <canvas id="bookingsChart"></canvas>
                </div>
            </div>
        </div>

        <div class="row" id="dashboardtable">
            @include('admin.financial.include.dashboardBookingtable')
        </div>
    @endsection
