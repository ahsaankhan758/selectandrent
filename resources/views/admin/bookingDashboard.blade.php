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
        <!-- Left Side: 4 Cards (2x2 Layout) -->
        <div class="col-lg-6 col-md-12">

            <div class="booking-dashboard">
                <div class="card booking-card">
                    <div class="booking-cards-header">
                        <span class="booking-booking-icon-container">
                            <img src="{{ asset('/') }}assets/images/dollar-icon.png" height="29px">
                        </span>
                        <h6>Upcoming Bookings</h6>
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
                        <h6>Pending Bookings</h6>
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
                        <h6>Canceled Bookings</h6>
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
                        <h6>Completed Bookings</h6>
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

        <!-- Right Side: Extra Section -->
        <div class="col-lg-6 col-md-12">
            <div class="chart-container">
                <h3>Bookings Overview</h3>
                <div class="booking-legend mt-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <span class="d-flex align-items-center">
                            <div class="done-color me-1" style="width: 12px; height: 12px;"></div> Confirmed
                        </span>
                        <span class="d-flex align-items-center ms-3">
                            <div class="canceled-color me-1" style="width: 12px; height: 12px;"></div> Cancelled
                        </span>
                    </div>
                    <select id="monthSelector" class="form-select form-select-sm w-auto">
                        <option value="3">Last 3 Months</option>
                        <option value="6">Last 6 Months</option>
                        <option value="12" selected>Last 12 Months</option>
                    </select>
                </div>
                <div class="chart-wrapper">
                    <canvas id="bookingsChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Recent Transactions -->
        {{-- <div class="row"> --}}
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-lg-8">
                                <form class="d-flex flex-wrap align-items-center">
                                    <label for="inputPassword2" class="visually-hidden">Search</label>
                                    <div class="me-3">
                                        <input type="search" class="form-control my-1 my-lg-0" id="inputPassword2"
                                            placeholder="Search...">
                                    </div>
                                    <label for="status-select" class="me-2">Status</label>
                                    <div class="me-sm-3">
                                        <select class="form-select form-select my-1 my-lg-0" id="status-select">
                                            <option selected>Choose...</option>
                                            <option value="1">Paid</option>
                                            <option value="2">Awaiting Authorization</option>
                                            <option value="3">Payment failed</option>
                                            <option value="4">Cash On Delivery</option>
                                            <option value="5">Fulfilled</option>
                                            <option value="6">Unfulfilled</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <div class="text-lg-end">
                                    @if (can('Bookings', 'add'))
                                        <button type="button" class="btn btn-danger waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-basket me-1"></i> Add New Order</button>
                                    @endif
                                    <button type="button" class="btn btn-light waves-effect mb-2">Export</button>
                                </div>
                            </div><!-- end col-->
                        </div>
    
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Booking Ref</th>
                                        <th>Transaction ID</th>
                                        <th>Payment Status</th>
                                        <th>Booking Status</th>
                                        <th>Payment Method</th>
                                        <th>Coupon</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>Insurance</th>
                                        <th>Total</th>
                                        <th>Subtotal</th>
                                        <th>Notes</th>
                                        <th style="width: 125px;">Action</th>
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
                                            <td><a href="#" class="text-body fw-bold">{{ $booking->id }}</a></td>
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
                                            <td>{{ number_format($booking->discount_amount, 2) }}</td>
                                            <td>{{ number_format($booking->tax_amount, 2) }}</td>
                                            <td>{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                                            <td>{{ number_format($booking->total_price, 2) }}</td>
                                            <td>{{ number_format($booking->subtotal, 2) }}</td>
                                            <td>{{ $booking->notes }}</td>
                                            <td>
                                                <a href="{{ route('car.booking.detail', ['id' => $booking->id]) }}"
                                                    class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="16" class="text-center">No bookings found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </div> --}}
    @endsection
