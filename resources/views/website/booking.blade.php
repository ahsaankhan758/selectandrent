@extends('website.layout.master')

@section('title')
Booking | Select and Rent 
@endsection

@section('content')

<!-- css for review stars in modal  -->
 <!-- Star Rating CSS -->
<style>
  .star-rating {
    direction: rtl;
    font-size: 1.5rem;
    unicode-bidi: bidi-override;
    display: inline-block;
    justify-content: start;
  }

  .star-rating input[type="radio"] {
    display: none;
  }

  .star-rating label {
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s;
  }

  .star-rating input[type="radio"]:checked ~ label,
  .star-rating label:hover,
  .star-rating label:hover ~ label {
    color: #ffc107;
  }
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
 <!-- end css -->
<div class="container py-5">
    <div class="table-responsive rounded">
        <table class="table table-hover table-striped table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="text-nowrap table-clr">{{ __('messages.action') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.user') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingref') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.company_name') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingpayment') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingstatus') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingmethod') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingcoupon') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingdiscount') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingtax') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookinginsurance') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingsubtotal') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingtotal') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingnotes') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.cancel') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                  <tr>
                    <td class="py-4 text-center text-nowrap">
                        <div class="d-inline-flex align-items-center">
                            <a href="{{ route('website.bookingdetail', $booking->id) }}" class="me-2" title="View Booking">
                                <i class="fa fa-eye"></i>
                            </a>
                            <span class="text-muted mx-2">|</span>

                            <a href="javascript::void(0)" id="getVehicleId" data-bs-toggle="modal" data-bs-target="#reviewModal" data-vehicle-id="{{ optional($booking->booking_items->first())->vehicle_id }}" data-review-booking-id="{{ $booking->id }}" title="Give Review" class="ms-2">

                                <img src="{{asset('/')}}frontend-assets/icons/review.webp" width="20px" height="20px" data-bs-toggle="tooltip" title="Give Review" alt="Give Review">
                            </a>
                        </div>
                    </td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->user->name }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->booking_reference }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->booking_items->first()->vehicle->company->name ?? '' }}</td>

                    <td class="py-4 text-center text-nowrap"><span class="badge btn-orange-clr text-dark text-uppercase">{{ $booking->payment_status }}</span></td>

                    <td class="py-4 text-center text-nowrap">
                      <span id="bookingStatus-{{ $booking->id }}" class="badge bg-secondary text-uppercase">
                        {{ $booking->booking_status }}
                      </span>
                    </td>
                    <td class="py-4 text-center text-nowrap">{{ ucfirst($booking->payment_method) }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->coupon_code ?: '—' }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->discount_amount }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->tax_amount }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->subtotal }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->total_price }}</td>
                    <td class="py-4 text-center text-nowrap">{{ $booking->notes }}</td>
                    <td class="py-4 text-center text-nowrap">
                      @if(
                          $booking->payment_status === 'paid' &&
                          $booking->booking_status === 'confirmed' &&
                          $booking->booking_items->isNotEmpty() &&
                          \Carbon\Carbon::parse($booking->booking_items->first()->pickup_datetime)->gt(\Carbon\Carbon::now())
                        )
                        <a href="javascript:void(0)" 
                          id="cancelButton-{{ $booking->id }}" 
                          class="btn btn-danger btn-sm cancelBookingBtn" 
                          data-bs-toggle="modal" 
                          data-bs-target="#cancelModal" 
                          data-booking-id="{{ $booking->id }}">
                            {{ __('messages.cancel') }}
                        </a>
                      @else
                        <span> - </span>
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                      <td colspan="16" class="text-center">{{ __('messages.no_booking') }}</td>
                  </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $bookings->links() }}
    </div> 
</div>

<!-- Cancel Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('website.booking.cancel')}}" id="cancelForm" method="POST">
      @csrf
      <input type="hidden" name="booking_id" id="modal_booking_id">
      <div class="modal-content">
        <div class="modal-header position-relative">
            <h5 class="modal-title w-100 text-center" id="cancelModalLabel">
                <b>{{ __('messages.cancel') }}</b>
            </h5>
            <button type="button" class="btn-close position-absolute end-0 top-50 translate-middle-y" data-bs-dismiss="modal" aria-label="Close"></button>
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

<!-- review -->
 <!-- Review Modal -->
<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="{{route('review.store')}}" method="POST" id="reviewForm" class="w-100">
      @csrf
      <input type="hidden" name="vehicle_id" id="modal_review_vehicle_id">
      <input type="hidden" name="booking_id" id="modal_review_booking_id">
      <div class="modal-content shadow-lg border-0 rounded-4">
        <div class="modal-header text-center border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="mb-4">
            <label class="form-label d-block fw-semibold">Rating</label>
            <div class="star-rating">
              @for ($i = 5; $i >= 1; $i--)
                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" required />
                <label for="star{{ $i }}" title="{{ $i }} star{{ $i > 1 ? 's' : '' }}">&#9733;</label>
              @endfor
            </div>
          </div>

          <div class="mb-3">
            <label for="comment" class="form-label fw-semibold">Comment (Optional)</label>
            <textarea name="comment" class="form-control" rows="4" placeholder="Share your experience..."></textarea>
          </div>
        </div>

        <div class="modal-footer border-0">
          <button type="submit" class="btn text-white btn-orange-clr w-100">Submit Review</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
    document.getElementById('cancelForm').addEventListener('submit', function(e) {
        const submitBtn = document.getElementById('cancelBookingBtn');
        const spinner = document.getElementById('refundLoadingSpinner');
        spinner.classList.remove('d-none');
        submitBtn.setAttribute('disabled', true);
    });
</script>


<script src="{{ asset('/frontend-assets/assets/Js/reviews.js') }}"></script>
<script src="{{ asset('/frontend-assets/assets/Js/cancelBooking.js') }}"></script>
<!-- end review -->
@endsection
