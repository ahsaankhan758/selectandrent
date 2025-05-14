@extends('admin.layouts.Master')
@section('title')  {{ __('messages.car') }}  {{ trans_choice('messages.booking',2) }} @endsection
@section('content')
<div class="row">
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
                                <th>{{ __('messages.bookingview') }}</th>
                                <th>{{ __('messages.bookingname') }}</th>
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
                                    <a href="{{ route('car.booking.detail', ['id' => $booking->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                </td>
                                <td>{{ $booking->user->name ?? 'N/A' }}</td>
                                <td>{{ $booking->booking_reference }}</td> 
                                <td>{{ $booking->transaction_id }}</td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i>{{ $booking->payment_status }}</span></h5>
                                </td>
                                <td><h5><span class="badge bg-info">{{ $booking->booking_status }}</span></h5></td>
                                <td>{{ ucfirst($booking->payment_method) }}</td>
                                <td>{{ $booking->coupon_code ?: '—' }}</td>
                                <td>{{ number_format($booking->discount_amount, 2) }}</td>
                                <td>{{ number_format($booking->tax_amount, 2) }}</td>
                                <td>{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                                <td>{{ number_format($booking->total_price, 2) }}</td>
                                <td>{{ number_format($booking->subtotal, 2) }}</td>
                                <td>{{ $booking->notes }}</td>
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
@endsection
