@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
<script>
    const formattedChartData = @json($formattedChartData);
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="{{ asset('assets/js/admin/dashboardEarning.js') }}"></script>


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
                <a href="{{ route('carBooking') }}" style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
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
                </a>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('carBooking', ['payment_status' => 'paid', 'status' => 'completed']) }}"
                    style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
                        <div class="card-body d-flex">
                            <div class="avatar-md bg-danger rounded me-3">
                                <i class="fe-dollar-sign avatar-title font-22 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-dark my-1">{{ $totalrevenue }}</h3>
                                <p class="text-muted mb-0">Total Revenue</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 9 -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('carBooking', ['payment_status' => 'paid']) }}" style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
                        <div class="card-body d-flex">
                            <div class="avatar-md bg-dark rounded me-3">
                                <i class="fe-user-check avatar-title font-22 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-dark my-1">{{ $commission }}</h3>
                                <p class="text-muted mb-0">Commission</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <a href="#" style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
                        <div class="card-body d-flex">
                            <div class="avatar-md bg-info rounded me-3">
                                <i class="fe-credit-card avatar-title font-22 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-dark my-1">{{ $payoutcompany }}</h3>
                                <p class="text-muted mb-0">Payouts to Rental Companies</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 4 -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('carBooking', ['payment_status' => 'pending', 'status' => 'pending']) }}"
                    style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
                        <div class="card-body d-flex">
                            <div class="avatar-md bg-warning rounded me-3">
                                <i class="fe-briefcase avatar-title font-22 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-dark my-1">{{ $totalpending }}</h3>
                                <p class="text-muted mb-0">Pending Payments</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 5 -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('carListings', ['is_booked' => 1]) }}" style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
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
                </a>
            </div>

            <!-- Card 6 -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('carBooking', ['payment_status' => 'failed', 'date' => 'today']) }}"
                    style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
                        <div class="card-body d-flex">
                            <div class="avatar-md bg-success rounded me-3">
                                <i class="fe-check-circle avatar-title font-22 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-dark my-1">{{ $totalcancelled }}</h3>
                                <p class="text-muted mb-0">Cancellations Today</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 7 -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('client') }}" style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
                        <div class="card-body d-flex">
                            <div class="avatar-md bg-pink rounded me-3">
                                <i class="fe-users avatar-title font-22 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-dark my-1">{{ $customers }}</h3>
                                <p class="text-muted mb-0">Customers</p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 8 -->
            <div class="col-md-4 mb-4">
                <a href="{{ route('carListings') }}" style="text-decoration: none;">
                    <div class="card bg-pattern card-clickable">
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
                </a>
            </div>
        </div>

        <!-- end row-->
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card shadow-sm border-0">
                    <div class="card-body reminder-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">Reminders</h5>
                            <button class="btn btn-light btn-sm rounded-circle"
                                onclick="window.location='{{ route('reminders.create') }}'">
                                <i class="mdi mdi-plus"></i>
                            </button>
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

            <!-- end col -->
            {{-- Booking Chart Section --}}
            <div class="col-xl-6 col-lg-6">
                <div class="card" dir="ltr">
                    <div class="card-body">
                        <h4 class="header-title mb-3">Booking Chart</h4>
                        <div class="text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-info"></i>
                                    Pending</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-muted"></i>
                                    Confirmed</span>
                                <span class="mx-2"><i class="mdi mdi-checkbox-blank-circle text-success"></i>
                                    Completed</span>
                            </p>
                        </div>
                        <div id="morris-bar-example" style="height: 350px;" class="morris-chart"></div>
                    </div>
                </div>
            </div>

        </div>
        <!-- end row-->
    </div> <!-- container -->
@endsection
