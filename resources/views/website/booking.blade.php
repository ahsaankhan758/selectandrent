@extends('website.layout.master')

@section('title')
Booking | Select and Rent 
@endsection

@section('content')
<div class="container py-5">
    <div class="table-responsive rounded">
        <table class="table table-hover table-striped table-bordered mb-0">
            <thead class="table-dark">
                <tr>
                    <th class="text-nowrap table-clr">{{ __('messages.action') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.user') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingref') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.company_name') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingtransaction') }}</th>
                    <th class="text-nowrap table-clr">{{ __('messages.bookingpayment') }}</th>
                    <th class="text-nowrap table-clr"">{{ __('messages.bookingstatus') }}</th>
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
                        <a href="" title="Send Message" class="ms-2">
                            <img src="/frontend-assets/icons/review.webp" width="18px" height="18px" alt="">
                        </a>
                    </div>
                </td>
                    <td class="py-4 text-center">{{ $booking->user->name }}</td>
                    <td class="py-4 text-center">{{ $booking->booking_reference }}</td>
                    <td class="py-4 text-center">{{ $booking->booking_items->first()->vehicle->company->name ?? '' }}</td>
                    <td class="py-4 text-center">{{ $booking->transaction_id }}</td>
                    <td class="py-4 text-center"><span class="badge btn-orange-clr text-dark text-uppercase">{{ $booking->payment_status }}</span></td>
                    <td class="py-4 text-center"><span class="badge bg-secondary text-uppercase">{{ $booking->booking_status }}</span></td>
                    <td class="py-4 text-center">{{ ucfirst($booking->payment_method) }}</td>
                    <td class="py-4 text-center">{{ $booking->coupon_code ?: '—' }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->discount_amount, 2) }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->tax_amount, 2) }}</td>
                    <td class="py-4 text-center">{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->total_price, 2) }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->subtotal, 2) }}</td>
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
@endsection
