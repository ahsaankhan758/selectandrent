@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.car') }} {{ trans_choice('messages.booking', 2) }}
@endsection
@section('content')
    @if (can('bookings', 'view'))
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-centered table-nowrap mb-0" id="myTable">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 20px;">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="customCheck1">
                                                <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                            </div>
                                        </th>
                                        <th>{{ __('messages.action') }}</th>
                                        <th>{{ __('messages.pick/drop') }}</th>
                                        <th>{{ __('messages.bookingname') }}</th>
                                        <th>{{ __('messages.bookingref') }}</th>
                                        <th>{{ __('messages.bookingpayment') }}</th>
                                        <th>{{ __('messages.bookingstatus') }}</th>
                                        <th>{{ __('messages.bookingmethod') }}</th>
                                        <th>{{ __('messages.bookingcoupon') }}</th>
                                        <th>{{ __('messages.bookingdiscount') }}</th>
                                        <th>{{ __('messages.bookingtax') }}</th>
                                        <th>{{ __('messages.commission') }}</th>
                                        <th>{{ __('messages.bookinginsurance') }}</th>
                                        <th>{{ __('messages.currency') }}</th>
                                        <th>{{ __('messages.bookingtotal') }}</th>
                                        <th>{{ __('messages.bookingsubtotal') }}</th>
                                        <th>{{ __('messages.notes(Cancel)') }}</th>
                                        <th>{{ __('messages.cancel') }}</th>
                                        <th>{{ __('messages.cancelled_by') }} ({{ __('messages.role') }})</th>
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
                                                <a href="{{ route('car.booking.detail', ['id' => $booking->id, 'source' => 'bookingSource']) }}"
                                                    class="action-icon"> <i class="mdi mdi-eye"></i>
                                                </a>
                                                @if($booking->booking_status == 'completed')
                                                    <span class="text-muted mx-2">|</span>
                                                    <a href="javascript::void(0)" id="getVehicleId" data-bs-toggle="modal" data-bs-target="#reviewModal" data-booking-id="{{ $booking->id }}" data-customer-id="{{ $booking->user_id }}" title="Give Review" class="ms-2">
                                                        <img src="{{asset('/')}}frontend-assets/icons/review.webp" width="20px" height="20px" data-bs-toggle="tooltip" title="Give Review" alt="Give Review">
                                                    </a>
                                                @endif
                                            </td>
                                            <td>
                                                @foreach ($booking->booking_items as $item)
                                                    @if ($booking->booking_status == 'confirmed')
                                                        @if (!$item->actual_pickup_datetime)
                                                            <form action="{{ route('booking.pickup', $item->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                <button class="btn btn-success btn-sm">Pickup</button>
                                                            </form>
                                                        @elseif (!$item->actual_dropoff_datetime)
                                                            <form action="{{ route('booking.dropoff', $item->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                <button class="btn btn-danger btn-sm">Dropoff</button>
                                                            </form>
                                                        @else
                                                            <span class="badge bg-info">Completed</span>
                                                        @endif
                                                    @else
                                                        @if ($item->actual_pickup_datetime && $item->actual_dropoff_datetime)
                                                            —
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                            <td>{{ $booking->booking_reference }}</td>
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
                                            <td>{{ number_format($booking->commission, 2) }}</td>
                                            <td>{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                                            <td>{{$booking->currency}}</td>
                                            <td>{{ number_format($booking->total_price, 2) }}</td>
                                            <td>{{ number_format($booking->subtotal, 2) }}</td>
                                            <td><span id="cancel_note">{{ $booking->notes }}</span></td>
                                            <td>
                                                @if($booking->booking_status == 'pending' || $booking->booking_status == 'confirmed' && $booking->payment_status != 'refunded')
                                                    <button href="javascript:void(0)" 
                                                    id="cancelButton-{{ $booking->id }}" 
                                                    class="btn btn-danger btn-sm cancelBookingBtn" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#cancelModal" 
                                                    data-booking-id="{{ $booking->id }}">
                                                        {{ __('messages.cancel') }}
                                                    </button>
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td>
                                                <span id="cancelled_by">
                                                    {{ optional($booking->cancelledBy)?->name 
                                                    ? optional($booking->cancelledBy)->name . ' (' . ucfirst(optional($booking->cancelledBy)->role) . ')'
                                                    : '—' }}
                                                </span>
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
        </div>
        <!-- Review Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true" >
        <div class="modal-dialog modal-dialog-centered">
            <form action="{{route('storeCustomerReview')}}" method="POST" id="reviewForm" class="w-100">
            @csrf
            <input type="hidden" name="booking_id" id="modal_booking_id">
            <input type="hidden" name="customer_id" id="modal_customer_id">
            <div class="modal-content shadow-lg border-0 rounded-4">
                <div class="modal-header text-center border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                <div class="mb-4 text-center">
                        <label class="form-label d-block fw-semibold">Rating</label>
                        <div class="star-rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" required />
                                <label for="star{{ $i }}" title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">&#9733;</label>
                            @endfor
                        </div>
                </div>

                <div class="mb-3 text-center">
                    <label for="comment" class="form-label fw-semibold">Comment (Optional)</label>
                    <textarea name="comment" class="form-control" rows="4" placeholder="Share your experience..."></textarea>
                </div>
                </div>

                <div class="modal-footer border-0">
                <button type="submit" class="btn text-white btn-orange-clr w-100" style="background-color: #ff6600 !important;">Submit Review</button>
                </div>
            </div>
            </form>
        </div>
        </div>

        <!-- Cancel Modal -->
        <div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('cancelBooking')}}" id="cancelForm" method="POST">
            @csrf
            <input type="hidden" name="booking_id" id="modal_booking_id_cancel">
            <div class="modal-content">
                <div class="modal-header position-relative">
                    <h5 class="modal-title w-100 text-center" id="cancelModalLabel">
                        <b>{{ __('messages.cancel') }}</b>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <label for="cancelReason" class="form-label mt-4 text-start d-block">{{ __('messages.reason') }}</label>
                <textarea class="form-control" name="cancel_reason" id="cancelReason" rows="3" required></textarea>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-sm" id="cancelBookingBtn">
                    <span class="spinner-border spinner-border-sm me-2 d-none" role="status" aria-hidden="true" id="refundLoadingSpinner"></span>
                    <span>{{ __('messages.confirm') }}</span>
                </button>
                </div>
            </div>
            </form>
        </div>
        </div>

        <script src="{{ asset('/assets/js/admin/customerReview.js') }}"></script>
        <script src="{{ asset('/assets/js/admin/cancelBookingAdmin.js') }}"></script>
        <script>
            document.getElementById('cancelForm').addEventListener('submit', function(e) {
                const submitBtn = document.getElementById('cancelBookingBtn');
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
