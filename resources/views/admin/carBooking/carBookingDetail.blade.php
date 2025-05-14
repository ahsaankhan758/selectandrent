@extends('admin.layouts.Master')
@section('title') {{ __('messages.bookingcardeatil') }} @endsection
@section('content')
        <div class="container-fluid">  
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">{{ __('messages.booking_orderdetail') }}</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 
                <div class="row">
                @foreach($booking->booking_items as $item)
                  <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">{{ __('messages.booking_trackorder') }}</h4>
                            <div class="row">
                                {{-- <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Reference ID:</h5>
                                        <p>{{ $booking->booking_reference }}</p>
                                    </div>
                                </div> --}}
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
                                        <h5 class="mt-0 mb-1">Order Placed</h5>
                                        <p class="text-muted">April 21 2019 <small class="text-muted">07:22 AM</small> </p>
                                    </li>
                                    <li class="completed">
                                        <h5 class="mt-0 mb-1">Packed</h5>
                                        <p class="text-muted">April 22 2019 <small class="text-muted">12:16 AM</small></p>
                                    </li>
                                    <li>
                                        <span class="active-dot dot"></span>
                                        <h5 class="mt-0 mb-1">Shipped</h5>
                                        <p class="text-muted">April 22 2019 <small class="text-muted">05:16 PM</small></p>
                                    </li>
                                    <li>
                                        <h5 class="mt-0 mb-1"> Delivered</h5>
                                        <p class="text-muted">Estimated delivery within 3 days</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">{{ __('messages.booking_referenceid') }} {{ $booking->booking_reference }}</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="table-light">
                                        <tr class="text-nowrap">
                                            <th>{{ __('messages.booking_image') }}</th>
                                            <th>{{ __('messages.booking_name') }}</th>
                                            <th>{{ __('messages.booking_pickuplocation') }}</th>
                                            <th>{{ __('messages.booking_dropofflocation') }}</th>
                                            <th>{{ __('messages.booking_pickupdate') }}</th>
                                            <th>{{ __('messages.booking_pickuptime') }}</th>
                                            <th>{{ __('messages.booking_dropoffdate') }}</th>
                                            <th>{{ __('messages.booking_dropofftime') }}</th>
                                            <th>{{ __('messages.booking_days') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($booking))
                                        @foreach($booking->booking_items as $detail)
                                        <tr>
                                            <td>
                                                @php
                                                    $thumbnail = $detail->vehicle->thumbnail ?? null;
                                                @endphp
                                            
                                                @if($thumbnail && file_exists(public_path('storage/' . $thumbnail)))
                                                    <img src="{{ asset('storage/' . $thumbnail) }}" alt="Vehicle Thumbnail" height="32">
                                                @else
                                                    <img src="{{ asset('/frontend-assets/assets/car-suv.png') }}" alt="Default Vehicle Image" height="32">
                                                @endif
                                            </td>
                                            
                                            <td class="text-nowrap">{{ $detail->vehicle->carModel->name ?? 'N/A' }} - {{ $detail->vehicle->year ?? 'N/A' }}</td>
                                            <td>{{ $detail->pickup_location }}</td>
                                            <td>{{ $detail->dropoff_location }}</td>
                                            <td>{{ \Carbon\Carbon::parse($detail->pickup_datetime)->format('Y-m-d') }}</td> 
                                            <td>{{ \Carbon\Carbon::parse($detail->pickup_datetime)->format('H:i:s') }}</td> 
                                            <td>{{ \Carbon\Carbon::parse($detail->dropoff_datetime)->format('Y-m-d') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($detail->dropoff_datetime)->format('H:i:s') }}</td>
                                            <td>{{ $detail->duration_days }}</td>
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
                            <h5 class="font-family-primary fw-semibold">
                                {{ $booking->first_name ?? 'N/A' }} {{ $booking->last_name ?? 'N/A' }}
                            </h5>
                            <p class="mb-2">
                                <span class="fw-semibold me-2">{{ __('messages.booking_address') }}</span>
                                {{ $booking->billing_addresss ?? 'N/A' }}
                            </p>
                            <p class="mb-2">
                                <span class="fw-semibold me-2">{{ __('messages.booking_phone') }}</span>
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
                                    <p class="mb-2"><span class="fw-semibold me-2">{{ __('messages.booking_subtotal') }}</span>$ {{ number_format($booking->subtotal) }}</p>
                                    <p class="mb-2"><span class="fw-semibold me-2">{{ __('messages.booking_tax') }}</span>$ {{ number_format($booking->tax_amount) }}</p>
                                    <p class="mb-2"><span class="fw-semibold me-2">{{ __('messages.booking_total') }}</span>$ {{ number_format($booking->total_price) }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 

                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="header-title ">{{ __('messages.booking_bookinginfo') }}</h4>

                            <div class="text-left">
                                <i class="mdi mdi-truck-fast h2 text-muted"></i>
                                <p class="mb-1"><span class="fw-semibold">{{ __('messages.booking_orderid') }}</span> # {{ $booking->id }}</p>
                                <p class="mb-0"><span class="fw-semibold">{{ __('messages.booking_paymentmode') }}</span> {{ $booking->payment_method ?? 'N/A' }}</p>
                                <p class="mb-2"><span class="fw-semibold me-2"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div> 
@endsection