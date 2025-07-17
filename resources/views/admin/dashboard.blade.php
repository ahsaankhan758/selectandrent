@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.dashboard') }}
@endsection
@section('content')
    @if (can('dashboard', 'view'))
        <script>
            window.bookingDashboardUrl = "{{ route('dashboard') }}";
            window.formattedChartData = @json($formattedChartData);
        </script>
        <script src="{{ asset('assets/js/admin/dashboardEarning.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.3.0/raphael.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item active">{{ __('messages.dashboard') }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ __('messages.dashboard') }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-12 row my-3">
                @include('admin.financial.include.filter')
            </div>
            <!-- end page title -->
            <div class="row" id="cards-container">
                <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('carBooking', [
                        'filter' => 'total',
                        'user_id' => request('user_id'),
                        'country_id' => request('country_id'),
                        'start_date' => request('start_date'),
                        'end_date' => request('end_date'),
                    ]) }}"
                        style="text-decoration: none;">

                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fe-layers avatar-title font-22 text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $totalbooking }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.total_booking') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <a
                        href="{{ route('carBooking', [
                            'filter' => 'revenue',
                            'user_id' => request('user_id'),
                            'country_id' => request('country_id'),
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                        ]) }}">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fa-solid fa-wallet avatar-title font-22 text-white"
                                        style="text-align: center; margin-top: 15px;"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $defaultCurrencySymbol }} {{ $totalrevenue }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.total_revenue') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 3 -->
                <div class="col-md-4 mb-4">
                    <a
                        href="{{ route('carBooking', [
                            'filter' => 'commission',
                            'user_id' => request('user_id'),
                            'country_id' => request('country_id'),
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                        ]) }}">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fa-solid fa-wallet avatar-title font-22 text-white"
                                    style="text-align: center; margin-top: 15px;"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $defaultCurrencySymbol }} {{ $commission }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.commissiondashboard') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 4 -->
                <div class="col-md-4 mb-4">
                    <a href="#" style="text-decoration: none;">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fa-solid fa-wallet avatar-title font-22 text-white"
                                    style="text-align: center; margin-top: 15px;"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $defaultCurrencySymbol }} {{ $payoutcompany }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.payout') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 5 -->
                <div class="col-md-4 mb-4">
                    <a
                        href="{{ route('carBooking', [
                            'filter' => 'pending',
                            'user_id' => request('user_id'),
                            'country_id' => request('country_id'),
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                        ]) }}">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fa-solid fa-wallet avatar-title font-22 text-white"
                                    style="text-align: center; margin-top: 15px;"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $defaultCurrencySymbol }} {{ $totalpending }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.pendingpayment') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 6 -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route(
                        'carListings',
                        array_merge(request()->only(['user_id', 'country_id', 'start_date', 'end_date']), ['is_booked' => 1]),
                    ) }}"
                        style="text-decoration: none;">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fe-calendar avatar-title font-22 text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $bookedCars }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.activebooked') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 7 -->
                <div class="col-md-4 mb-4">
                    <a
                        href="{{ route('carBooking', [
                            'filter' => 'cancelled_today',
                            'user_id' => request('user_id'),
                            'country_id' => request('country_id'),
                            'start_date' => request('start_date'),
                            'end_date' => request('end_date'),
                        ]) }}">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fe-check-circle avatar-title font-22 text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $totalcancelled }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.canceltoday') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 8 -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('client', array_merge(request()->only(['user_id', 'country_id', 'start_date', 'end_date']))) }}"
                        style="text-decoration: none;">

                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fe-users avatar-title font-22 text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $customers }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.clients') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Card 9 -->
                <div class="col-md-4 mb-4">
                    <a href="{{ route('carListings', array_merge(request()->only(['user_id', 'country_id', 'start_date', 'end_date']))) }}"
                        style="text-decoration: none;">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fe-bar-chart avatar-title font-22 text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $totalCars }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.totalcar') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- card 10 --}}
                <div class="col-md-4 mb-4">
                    <a href="{{ route('carBooking', [
                        'filter' => 'cancelledCar',
                        'user_id' => request('user_id'),
                        'country_id' => request('country_id'),
                        'start_date' => request('start_date'),
                        'end_date' => request('end_date'),
                    ]) }}"
                        style="text-decoration: none;">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fe-x-circle avatar-title font-22 text-white"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $cancelledCar }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.cancelled') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- card 11 --}}
                <div class="col-md-4 mb-4">
                    <a href="{{ route('carBooking', [
                        'filter' => 'refunded',
                        'user_id' => request('user_id'),
                        'country_id' => request('country_id'),
                        'start_date' => request('start_date'),
                        'end_date' => request('end_date'),
                    ]) }}"
                        style="text-decoration: none;">
                        <div class="card bg-pattern card-clickable">
                            <div class="card-body d-flex">
                                <div class="avatar-md bg-orange-clr rounded me-3">
                                    <i class="fa-solid fa-wallet avatar-title font-22 text-white"
                                    style="text-align: center; margin-top: 15px;"></i>
                                </div>
                                <div>
                                    <h3 class="text-dark my-1">{{ $defaultCurrencySymbol }} {{ $refundedamount }}</h3>
                                    <p class="text-muted mb-0">{{ __('messages.refunded') }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <!-- end row-->
            <!-- Booking Chart Section (Top, Full Width) -->
            <div class="col-12">
                <div class="card" dir="ltr">
                    <div class="card-body" id="dashboardtable">
                        <h4 class="header-title mb-3">{{ __('messages.bookingchart') }}</h4>
                        <div class="text-center">
                            <p class="text-muted font-15 font-family-secondary mb-0">
                                <span class="mx-2">
                                    <i class="mdi mdi-checkbox-blank-circle" style="color: #07407B"></i>
                                    {{ __('messages.confirmed') }}
                                </span>
                                <span class="mx-2">
                                    <i class="mdi mdi-checkbox-blank-circle" style="color: #f06115"></i>
                                    {{ __('messages.pending') }}
                                </span>
                                <span class="mx-2">
                                    <i class="mdi mdi-checkbox-blank-circle" style="color: #495057"></i>
                                    {{ __('messages.cancelled') }}
                                </span><br>
                                <span class="mx-2">
                                    <i class="mdi mdi-checkbox-blank-circle" style="color: #28a745"></i>
                                    {{ __('messages.completed') }}
                                </span>
                                <span class="mx-2">
                                    <i class="mdi mdi-checkbox-blank-circle" style="color: #8e44ad"></i>
                                    {{ __('messages.refunded') }}
                                </span>
                            </p>
                        </div>
                        <div id="morris-bar-example" style="height: 350px;" class="morris-chart"></div>
                    </div>
                </div>
            </div>

            <!-- Reminder Section (Bottom, Full Width) -->
            <div class="col-12 mt-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body reminder-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="fw-bold mb-0">{{ __('messages.reminders') }}</h5>
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
                                    {{ __('messages.no_reminder') }}
                                </div>
                            @endforelse
                        </div>
                        @if ($reminder->count() > 5)
                            <div class="text-end mt-3">
                                <a href="#" class="btn btn-sm text-white" style="background-color: #f06115;">
                                    {{ __('messages.View All') }}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- end row-->
        </div> <!-- container -->
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif
@endsection
