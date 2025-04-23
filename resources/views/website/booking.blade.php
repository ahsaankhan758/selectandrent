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
                    <th class="text-nowrap table-clr">ID</th>
                    <th class="text-nowrap table-clr">User ID</th>
                    <th class="text-nowrap table-clr">Booking Ref</th>
                    <th class="text-nowrap table-clr">Subtotal </th>
                    <th class="text-nowrap table-clr">Total </th>
                    <th class="text-nowrap table-clr">Transaction ID</th>
                    <th class="text-nowrap table-clr">Payment Status</th>
                    <th class="text-nowrap table-clr"">Booking Status</th>
                    <th class="text-nowrap table-clr">Payment Method</th>
                    <th class="text-nowrap table-clr">Coupon</th>
                    <th class="text-nowrap table-clr">Discount </th>
                    <th class="text-nowrap table-clr">Tax </th>
                    <th class="text-nowrap table-clr">Insurance</th>
                    <th class="text-nowrap table-clr">Notes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $booking)
                <tr>
                    <td class="py-4 text-center">{{ $booking->id }}</td>
                    <td class="py-4 text-center">{{ $booking->user_id }}</td>
                    <td class="py-4 text-center">{{ $booking->booking_reference }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->subtotal, 2) }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->total_price, 2) }}</td>
                    <td class="py-4 text-center">{{ $booking->transaction_id }}</td>
                    <td class="py-4 text-center"><span class="badge bg-warning text-dark text-uppercase">{{ $booking->payment_status }}</span></td>
                    <td class="py-4 text-center"><span class="badge bg-secondary text-uppercase">{{ $booking->booking_status }}</span></td>
                    <td class="py-4 text-center">{{ ucfirst($booking->payment_method) }}</td>
                    <td class="py-4 text-center">{{ $booking->coupon_code ?: '—' }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->discount_amount, 2) }}</td>
                    <td class="py-4 text-center">{{ number_format($booking->tax_amount, 2) }}</td>
                    <td class="py-4 text-center">{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                    <td class="py-4 text-center">{{ $booking->notes }}</td>
                </tr>
                              
                @empty
                <tr>
                    <td colspan="16" class="text-center">No bookings found.</td>
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
