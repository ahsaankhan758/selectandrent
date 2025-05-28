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

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0" id="myTable">
                            <div class="col-lg-12">
                            <a href="{{ route('carBooking') }}" class="btn btn-success">{{ __('messages.booking_all') }}</a>
                            </div>
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 20px;">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="customCheck1">
                                            <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                        </div>
                                    </th>
                                    <th style="width: 125px;">{{ __('messages.action') }}</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.bookingref') }}</th>
                                    <th>{{ __('messages.bookingtransaction') }}</th>
                                    <th>{{ __('messages.bookingpayment') }}</th>
                                    <th>{{ __('messages.bookingstatus') }}</th>
                                    <th>{{ __('messages.bookingmethod') }}</th>
                                    <th>{{ __('messages.bookingcoupon') }}</th>
                                    <th>{{ __('messages.bookingdiscount') }}</th>
                                    <th>{{ __('messages.bookingtax') }}</th>
                                    <th>{{ __('messages.bookinginsurance') }}</th>
                                    <th>{{ __('messages.bookingtotal') }}</th>
                                    <th>{{ __('messages.bookingsubtotal') }}</th>
                                    <th>{{ __('messages.bookingnotes') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr>
                                        <td>
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck2">
                                                <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('car.booking.detail', ['id' => $booking->id]) }}"
                                                class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                        </td>
                                        <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                        <td>{{ $booking->booking_reference }}</td>
                                        <td>{{ $booking->transaction_id }}</td>
                                        <td>
                                            <h5><span class="badge bg-soft-success text-success"><i
                                                        class="mdi mdi-bitcoin"></i>{{ $booking->payment_status }}</span>
                                            </h5>
                                        </td>
                                        <td>
                                            <h5><span class="badge bg-info">{{ $booking->booking_status }}</span></h5>
                                        </td>
                                        <td>{{ ucfirst($booking->payment_method) }}</td>
                                        <td>{{ $booking->coupon_code ?: '—' }}</td>
                                        <td>{{ number_format($booking->discount_amount) }}</td>
                                        <td>{{ number_format($booking->tax_amount) }}</td>
                                        <td>{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                                        <td>{{ number_format($booking->total_price) }}</td>
                                        <td>{{ number_format($booking->subtotal) }}</td>
                                        <td>{{ $booking->notes }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="16" class="text-center">{{ __('messages.no_booking') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
