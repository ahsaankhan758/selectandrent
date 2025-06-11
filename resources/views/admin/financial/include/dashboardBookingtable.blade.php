 <div class="col-12">
     <div class="card">
         <div class="card-body">
             <div class="table-responsive">
                 <table class="table table-centered table-nowrap mb-0" id="myTable">
                     <div class="col-lg-12 mb-2">
                         <a href="{{ route('carBooking') }}" class="btn btn-success">{{ __('messages.booking_all') }}</a>
                     </div>
                     <thead class="table-light">
                         <tr>
                             <th style="width: 20px;">
                                 <div class="form-check">
                                     <input type="checkbox" class="form-check-input" id="customCheck1">
                                     <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                 </div>
                             </th>
                             <th>Invoice</th>
                             <th>{{ __('messages.pick/drop') }}</th>
                             <th style="width: 125px;">{{ __('messages.action') }}</th>
                             <th>{{ __('messages.name') }}</th>
                             <th>{{ __('messages.bookingref') }}</th>
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
                                     <a href="{{ route('booking.invoice', ['id' => $booking->id]) }}"
                                         class="text-primary fw-bold">
                                         Invoice
                                     </a>
                                 </td>

                                 <td>
                                     @foreach ($booking->booking_items as $item)
                                         @if ($booking->booking_status == 'confirmed')
                                             @if (!$item->actual_pickup_datetime)
                                                 <form action="{{ route('booking.pickup', $item->id) }}" method="POST"
                                                     style="display:inline;">
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

                                 <td>
                                     <a href="{{ route('car.booking.detail', ['id' => $booking->id]) }}"
                                         class="action-icon">
                                         <i class="mdi mdi-eye"></i></a>
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
                                 <td>{{ $booking->insurance_included ? 'Yes' : 'No' }}</td>
                                 <td>{{ number_format($booking->total_price, 2) }}</td>
                                 <td>{{ number_format($booking->subtotal, 2) }}</td>
                                 <td>{{ $booking->notes }}</td>
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
