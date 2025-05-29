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
                    <th class="text-nowrap table-clr">{{ __('messages.bookingtotal') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingsubtotal') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingnotes') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>

                <td class="py-4 text-center">
                    <div class="d-inline-flex align-items-center">
                        <a href="{{ route('website.bookingdetail', $booking->id) }}" class="me-2" title="View Booking">
                            <i class="fa fa-eye"></i>
                        </a>
                        <span class="text-muted mx-2">|</span>
                        <a href="javascript::void(0)" id="getVehicleId" data-bs-toggle="modal" data-bs-target="#reviewModal" data-vehicle-id="{{ optional($booking->booking_items->first())->vehicle_id }}" title="Give Review" class="ms-2">
                            <img src="{{asset('/')}}frontend-assets/icons/review.webp" width="20px" height="20px" data-bs-toggle="tooltip" title="Give Review" alt="Give Review">
                        </a>
                    </div>
                </td>

                    <td class="py-4 text-center">{{ $booking->user->name }}</td>
                    <td class="py-4 text-center">{{ $booking->booking_reference }}</td>
                    <td class="py-4 text-center">{{ $booking->booking_items->first()->vehicle->company->name ?? '' }}</td>
                    <td class="py-4 text-center"><span class="badge btn-orange-clr text-dark text-uppercase">{{ $booking->payment_status }}</span></td>
                    <td class="py-4 text-center"><span class="badge bg-secondary text-uppercase">{{ $booking->booking_status }}</span></td>
                    <td class="py-4 text-center">{{ ucfirst($booking->payment_method) }}</td>
                    <td class="py-4 text-center">{{ $booking->coupon_code ?: '—' }}</td>
                    <td class="py-4 text-center">{{ convertPrice($booking->discount_amount, 0) }}</td>
                    <td class="py-4 text-center">{{ convertPrice($booking->tax_amount, 0) }}</td>
                    <td class="py-4 text-center">{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                    <td class="py-4 text-center">{{ convertPrice($booking->total_price, 0) }}</td>
                    <td class="py-4 text-center">{{ convertPrice($booking->subtotal, 0) }}</td>
                    <td class="py-4 text-center">{{ $booking->notes }}</td>
                </tr>
                              
                @empty
                <tr>
                    <td colspan="16" class="text-center">{{ __('messages.bookingpayment') }}</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4 d-flex justify-content-center">
        {{ $bookings->links() }}
    </div> 
</div>

<!-- review -->
 <!-- Review Modal -->
<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="{{route('review.store')}}" method="POST" id="reviewForm" class="w-100">
      @csrf
      <input type="hidden" name="vehicle_id" id="modal_vehicle_id">
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
            <label for="comment" class="form-label fw-semibold">Comment</label>
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
<script src="{{ asset('/frontend-assets/assets/Js/reviews.js') }}"></script>
<!-- end review -->
@endsection
