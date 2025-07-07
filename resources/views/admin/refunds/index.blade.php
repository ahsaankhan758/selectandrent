@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.refunds') }} 
@endsection
@section('content')
    @if (can('refunds', 'view'))
        <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0" id="myTable">
                            <div class="col-lg-12 mb-2">
                                <h4>{{ __('messages.refunds') }}</h4>
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
                                    @if (can('refunds', 'edit'))
                                        <th>{{ __('messages.refund') }}</th>
                                    @endif
                                    <th>{{ __('messages.invoice') }}</th>
                                    <th>{{ __('messages.name') }}</th>
                                    <th>{{ __('messages.bookingref') }}</th>
                                    <th>{{ __('messages.bookingpayment') }}</th>
                                    <th>{{ __('messages.bookingstatus') }}</th>
                                    <th>{{ __('messages.bookingmethod') }}</th>
                                    <th>{{ __('messages.bookingcoupon') }}</th>
                                    <th>{{ __('messages.bookingdiscount') }}</th>
                                    <th>{{ __('messages.bookingtax') }}</th>
                                    <th>{{ __('messages.commission') }}</th>
                                    <th>{{ __('messages.bookinginsurance') }}</th>
                                    <th>{{ __('messages.bookingtotal') }}</th>
                                    <th>{{ __('messages.bookingsubtotal') }}</th>
                                    <th>{{ __('messages.notes(Cancel)') }}</th>
                                    <th>{{ __('messages.cancelled_by') }} ({{  __('messages.role') }})</th>
                                    <th>{{ __('messages.refunded_by') }} ({{  __('messages.role') }})</th>
                                    <th>{{ __('messages.refund_notes') }}</th>
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
                                        <td class="py-4 text-center">
                                            <div class="d-inline-flex align-items-center"></div>
                                                <a href="{{ route('car.booking.detail', ['id' => $booking->id, 'source' => 'refundSource']) }}"
                                                    class="action-icon" data-source="refund">
                                                    <i class="mdi mdi-eye"></i>
                                                </a>
                                            </td>
                                        </td>
                                        @if (can('refunds', 'edit'))
                                            <td>
                                                @if( $booking->booking_status == 'cancelled' && $booking->payment_status == 'paid')
                                                    <div id="issueRefund">
                                                        <a href="javascript::void(0)" id="refund" data-bs-toggle="modal" data-bs-target="#refundModal" data-booking-id="{{ $booking->id }}" data-user-reason="{{ $booking->notes }}" data-booking-amount="{{ $booking->total_price }}" title="Refund" class="ms-2 btn btn-success">
                                                            {{ __('messages.refund') }}
                                                        </a>
                                                    </div>
                                                @else
                                                    —
                                                @endif
                                            </td>
                                        @endif
                                        <td>
                                            <a href="{{ route('booking.invoice', ['id' => $booking->id]) }}"
                                                class="text-danger fw-bold" style="font-size: 20px;">
                                            <i class="fa-solid fa-file-pdf"></i>
                                            </a>
                                        </td>
                                        <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                        <td>{{ $booking->booking_reference }}</td>
                                        <td>
                                            <h5>
                                                <span class="badge bg-soft-success text-success" id="payment_status">
                                                    <i class="mdi mdi-bitcoin"></i>
                                                    {{ $booking->payment_status }}
                                                </span>
                                            </h5>
                                        </td>
                                        <td>
                                            <h5><span class="badge bg-info" id="booking_status">{{ $booking->booking_status }}</span></h5>
                                        </td>
                                        <td>{{ ucfirst($booking->payment_method) }}</td>
                                        <td>{{ $booking->coupon_code ?: '—' }}</td>
                                        <td>{{ number_format($booking->discount_amount, 2) }}</td>
                                        <td>{{ number_format($booking->tax_amount, 2) }}</td>
                                        <td>{{ number_format($booking->commission, 2) }}</td>
                                        <td>{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                                        <td>{{ number_format($booking->total_price, 2) }}</td>
                                        <td>{{ number_format($booking->subtotal, 2) }}</td>
                                        <td>{{ $booking->notes }}</td>
                                        <td>
                                            <span id="cancelled_by">
                                                {{ optional($booking->cancelledBy)?->name 
                                                    ? optional($booking->cancelledBy)->name . ' (' . ucfirst(optional($booking->cancelledBy)->role) . ')'
                                                    : '—' }}
                                            </span>
                                        </td>
                                        <td>
                                            <span id="refunded_by">
                                                {{ optional($booking->refundedBy)?->name 
                                                    ? optional($booking->refundedBy)->name . ' (' . ucfirst(optional($booking->refundedBy)->role) . ')'
                                                    : '—' }}
                                            </span>
                                        </td>
                                        <td><span id="refunded_notes">{{ $booking->refunded_note ?: '—' }}</span></td>
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

        <!-- Refund Modal -->
        <div class="modal fade" id="refundModal" tabindex="-1" aria-labelledby="refundModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form method="POST" action="{{ route('refund.booking') }}" id="refundForm">
                    @csrf
                    <input type="hidden" name="booking_id" id="refund-booking-id">
                    
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="refundModalLabel">{{ __('messages.issue') }} {{ __('messages.refund') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="user_reason" class="form-label">{{ __('messages.cancellation') }} {{ __('messages.reason') }}</label>
                                <input type="text" name="user-reason" id="user-reason" class="form-control" rows="3" readonly></input>
                            </div>
                            
                            <div class="mb-3">
                                <label for="refund_amount" class="form-label">{{ __('messages.refund') }} {{ __('messages.amount') }}</label>
                                <input type="number" name="refund_amount" id="refund_amount" class="form-control" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="refunded_reason" class="form-label">{{ __('messages.refund') }} {{ __('messages.reason') }}</label>
                                <select name="refunded_reason" id="refunded_reason" class="form-control" required>
                                    <option disabled selected value="">{{ __('messages.select') }} {{ __('messages.reason') }}  </option>
                                    <option value="Duplicate">Duplicate</option>
                                    <option value="Fraudulent">Fraudulent</option>
                                    <option value="Request by Customer">Request by Customer</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <textarea name="refunded_reason_other" id="refunded_reason_other" class="form-control d-none" placeholder="Type Reason Here...."></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('messages.cancel') }}</button>
                            <button type="submit" class="btn btn-danger d-flex align-items-center justify-content-center" id="refundSubmitBtn">
                                <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true" id="refundLoadingSpinner"></span>
                                <span>{{ __('messages.process') }} {{ __('messages.refund') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="{{ asset('/assets/js/admin/refund.js') }}"></script>
        <script>
            document.getElementById('refundForm').addEventListener('submit', function(e) {
                const submitBtn = document.getElementById('refundSubmitBtn');
                const spinner = document.getElementById('refundLoadingSpinner');
                spinner.classList.remove('d-none');
                submitBtn.setAttribute('disabled', true);
            });
        </script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection