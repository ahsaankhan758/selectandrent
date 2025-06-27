@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.bookingcardeatil') }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title" id="page-title">{{ __('messages.booking_orderdetail') }}</h4>
                    @if ($booking->booking_status == 'cancelled' && $booking->payment_status == 'paid' && $source == 'refundSource')
                        <div id="issueRefund">
                            <a class="ms-2 btn btn-success float-end mb-3" href="javascript::void(0)" id="refund"
                                data-bs-toggle="modal" data-bs-target="#refundModal" data-booking-id="{{ $booking->id }}"
                                data-user-reason="{{ $booking->notes }}" data-booking-amount="{{ $booking->total_price }}"
                                title="Refund">
                                {{ __('messages.refund') }}
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            @foreach ($booking->booking_items as $item)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">{{ __('messages.booking_trackorder') }}</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="mt-0">{{ __('messages.booking_platenumber') }}</h5>
                                        <p>{{ $item->vehicle->lisence_plate ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="track-order-list">
                                <ul class="list-unstyled">
                                    <li class="completed">
                                        <h5 class="mt-0 mb-1">{{ __('messages.booking_orderplaced') }}</h5>
                                        <p class="text-muted">
                                            {{ \Carbon\Carbon::parse($booking->created_at)->format('F d Y') }}
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($booking->created_at)->format('h:i A') }}</small>
                                        </p>
                                    </li>
                                    <li class="{{ $booking->payment_status == 'pending' ? '' : 'completed' }}">
                                        @if ($booking->payment_status == 'pending')
                                            <span class="active-dot dot"></span>
                                        @endif
                                        <h5 class="mt-0 mb-1">{{ __('messages.bookingpayment') }}</h5>
                                        <p class="text-muted">
                                            {{ ucfirst($booking->payment_status ?? 'N/A') }}
                                        </p>
                                    </li>
                                    <li
                                        class="{{ $booking->booking_status == 'completed' ? 'completed' : ($booking->payment_status == 'paid' ? '' : '') }}">
                                        @if ($booking->booking_status != 'completed' && $booking->payment_status == 'paid')
                                            <span class="active-dot dot"></span>
                                        @endif
                                        <h5 class="mt-0 mb-1">{{ __('messages.pickup_status') }}</h5>
                                        <p class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->pickup_datetime)->format('F d Y') }}
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($item->pickup_datetime)->format('h:i A') }}</small>
                                        </p>
                                        <p>
                                            @if ($item->actual_pickup_datetime)
                                                (<span data-bs-toggle="tooltip" title="Actual Pickup">
                                                    {{ \Carbon\Carbon::parse($item->actual_pickup_datetime)->format('F d Y') }}
                                                    <small class="text-muted">
                                                        {{ \Carbon\Carbon::parse($item->actual_pickup_datetime)->format('h:i A') }}
                                                    </small>
                                                </span>)
                                            @endif
                                        </p>
                                    </li>

                                    <li class="{{ $booking->booking_status == 'completed' ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1">{{ __('messages.dropoff_status') }}</h5>
                                        <p class="text-muted">
                                            {{ \Carbon\Carbon::parse($item->dropoff_datetime)->format('F d Y') }}
                                            <small
                                                class="text-muted">{{ \Carbon\Carbon::parse($item->dropoff_datetime)->format('h:i A') }}</small>
                                        </p>
                                        <p>
                                            @if ($item->actual_dropoff_datetime)
                                                <span data-bs-toggle="tooltip" title="Actual Dropoff">
                                                    ({{ \Carbon\Carbon::parse($item->actual_dropoff_datetime)->format('F d Y') }}
                                                    <small class="text-muted">
                                                        {{ \Carbon\Carbon::parse($item->actual_dropoff_datetime)->format('h:i A') }}
                                                    </small>)
                                                </span>
                                            @endif
                                        </p>
                                    </li>
                                    <li class="{{ $booking->booking_status == 'completed' ? 'completed' : '' }}">
                                        <h5 class="mt-0 mb-1">{{ __('messages.order_completed') }}</h5>
                                        <p class="text-muted">{{ ucfirst($booking->booking_status ?? 'N/A') }}</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title mb-3">{{ __('messages.booking_referenceid') }}
                            {{ $booking->booking_reference }}</h4>

                        <div class="table-responsive">
                            <table class="table table-bordered table-centered mb-0">
                                <thead class="table-light">
                                    <tr class="text-nowrap">
                                        <th>{{ __('messages.booking_image') }}</th>
                                        <th>{{ __('messages.category') }}</th>
                                        <th>{{ __('messages.company') }}</th>
                                        <th>{{ __('messages.booking_name') }}</th>
                                        <th>{{ __('messages.booking_pickuplocation') }}</th>
                                        <th>{{ __('messages.booking_dropofflocation') }}</th>
                                        <th>{{ __('messages.booking_days') }} / {{ __('messages.hour') }}</th>
                                    </tr>
                                </thead>
                                <tbody class="text-nowrap">
                                    @if (isset($booking))
                                        @foreach ($booking->booking_items as $detail)
                                            <tr>
                                                <td>
                                                    @php
                                                        $thumbnail = $detail->vehicle->thumbnail ?? null;
                                                    @endphp

                                                    @if ($thumbnail && file_exists(public_path('storage/' . $thumbnail)))
                                                        <img src="{{ asset('storage/' . $thumbnail) }}"
                                                            alt="Vehicle Thumbnail" height="32">
                                                    @else
                                                        <img src="{{ asset('/frontend-assets/assets/car-suv.png') }}"
                                                            alt="Default Vehicle Image" height="32">
                                                    @endif
                                                </td>
                                                <td>{{ $detail->vehicle->car_categories->name }}</td>
                                                <td>{{ $detail->vehicle->company->name ?? 'N/A' }}</td>
                                                <td class="text-nowrap">{{ $detail->vehicle->carModel->name ?? 'N/A' }} -
                                                    {{ $detail->vehicle->year ?? 'N/A' }}</td>
                                                <td>{{ $detail->pickupLocation->area_name ?? 'N/A' }}</td>
                                                <td>{{ $detail->dropoffLocation->area_name ?? 'N/A' }}</td>
                                                <td>{{ $detail->duration_days }} /
                                                    {{ $detail->vehicle->rent_type ?? 'N/A' }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row d-flex align-items-stretch mb-3">
            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="header-title mb-3">{{ __('messages.booking_userinfo') }}</h4>
                        <p class="mb-1">
                            <span class="fw-semibold me-2">{{ __('messages.name') }}</span>
                            {{ $booking->first_name ?? 'N/A' }} {{ $booking->last_name ?? 'N/A' }}
                        </p>
                        <p class="mb-1">
                            <span class="fw-semibold me-2">{{ __('messages.address') }}</span>
                            {{ $booking->billing_addresss ?? 'N/A' }}
                        </p>
                        <p class="mb-1">
                            <span class="fw-semibold me-2">{{ __('messages.phone') }}</span>
                            {{ $booking->phonenumber ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="header-title mb-3">{{ __('messages.booking_billinginfo') }}</h4>
                        <ul class="list-unstyled mb-0">
                            <li>
                                <p class="mb-1"><span
                                        class="fw-semibold me-2">{{ __('messages.booking_paymentmode') }}</span>
                                    {{ $booking->payment_method ?? 'N/A' }}</p>
                                <p class="mb-1"><span
                                        class="fw-semibold me-2">{{ __('messages.booking_subtotal') }}</span>$
                                    {{ number_format($booking->subtotal) }}</p>
                                <p class="mb-1"><span class="fw-semibold me-2">{{ __('messages.booking_tax') }}</span>$
                                    {{ number_format($booking->tax_amount) }}</p>
                                <p class="mb-1"><span class="fw-semibold me-2">{{ __('messages.booking_total') }}</span>$
                                    {{ number_format($booking->total_price) }}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card h-100">
                    <div class="card-body">
                        @if (isset($booking))
                            @foreach ($booking->booking_items as $detail)
                                <h4 class="header-title mb-3">{{ __('messages.company_info') }}</h4>
                                <div class="text-left">
                                    <p class="mb-1">
                                        <span class="fw-semibold me-2">{{ __('messages.name') }}</span>
                                        {{ $detail->vehicle?->company?->name ?? '-' }}
                                    </p>
                                    <p class="mb-1">
                                        <span class="fw-semibold me-2">{{ __('messages.phone') }}</span>
                                        {{ $detail->vehicle?->company?->phone ?? '-' }}
                                    </p>
                                    <p class="mb-1">
                                        <span class="fw-semibold me-2">{{ __('messages.email') }}</span>
                                        {{ $detail->vehicle?->company?->email ?? '-' }}
                                    </p>
                                    <p class="mb-1">
                                        <span class="fw-semibold me-2">{{ __('messages.country') }}</span>
                                        {{ $detail->vehicle?->company?->country?->name ?? '-' }}
                                    </p>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Refund Modal -->
    <div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('refund.booking') }}" id="refundForm">
                @csrf
                <input type="hidden" name="booking_id" id="refund-booking-id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="refundModalLabel">{{ __('messages.issue') }}
                            {{ __('messages.refund') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="user_reason" class="form-label">{{ __('messages.customer') }}
                                {{ __('messages.reason') }}</label>
                            <input type="text" name="user-reason" id="user-reason" class="form-control"
                                rows="3" readonly></input>
                        </div>

                        <div class="mb-3">
                            <label for="refund_amount" class="form-label">{{ __('messages.refund') }}
                                {{ __('messages.amount') }}</label>
                            <input type="number" name="refund_amount" id="refund_amount" class="form-control" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="refunded_reason" class="form-label">{{ __('messages.refund') }}
                                {{ __('messages.reason') }}</label>
                            <select name="refunded_reason" id="refunded_reason" class="form-control" required>
                                <option disabled selected value="">{{ __('messages.select') }}
                                    {{ __('messages.reason') }} </option>
                                <option value="Duplicate">Duplicate</option>
                                <option value="Fraudulent">Fraudulent</option>
                                <option value="Request by Customer">Request by Customer</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <textarea name="refunded_reason_other" id="refunded_reason_other" class="form-control d-none"
                                placeholder="Type Reason Here...."></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('messages.process') }}
                            {{ __('messages.refund') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="{{ asset('/assets/js/admin/cancelBooking.js') }}"></script>
@endsection
