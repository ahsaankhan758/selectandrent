@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
    @if (can('bookings', 'view'))
        <script>
            window.bookingOverviewDataRoute = "{{ route('bookingOverviewDataRoute') }}";
            window.bookingDashboardUrl = "{{ route('bookingDashboard') }}";
        </script>
        <script src="{{ asset('assets/js/admin/dashboardBooking.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <div class="row mt-3">
            <div class="col-12 row my-3">
                @include('admin.financial.include.filter')
            </div>

            <div class="col-lg-6 col-md-12">
                <div id="cards-container">
                    @include('admin.bookingDashboard.include.cards')
                </div>
            </div>

            <div class="col-lg-6 col-md-12">
                <div class="chart-container">
                    <h3>{{ __('messages.booking_overview') }}</h3>
                    <div class="booking-legend mt-4 d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="d-flex align-items-center">
                                <div class="done-color me-1" style="width: 10px; height: 10px;"></div>
                                {{ __('messages.confirmed') }}
                            </span>
                            <span class="d-flex align-items-center ms-3">
                                <div class="canceled-color me-1" style="width: 10px; height: 10px;"></div>
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

            <div class="col-lg-12 col-mg-12" id="dashboardtable">
                @include('admin.financial.include.dashboardBookingtable')
            </div>
        @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
    @endsection
