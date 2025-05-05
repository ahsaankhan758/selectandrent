@extends('admin.layouts.Master')
@section('title')  Car Detail | Select And Rent @endsection
@section('content')
        <div class="container-fluid">  
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Order Detail</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title --> 

            <div class="row">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Track Order</h4>

                            <div class="row">
                                {{-- <div class="col-lg-6">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Order ID:</h5>
                                        <p> # {{ $booking->id }}</p>
                                    </div>
                                </div> --}}
                                <div class="col-lg-12">
                                    <div class="mb-4">
                                        <h5 class="mt-0">Reference ID:</h5>
                                        <p>{{ $booking->booking_reference }}</p>
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

                                {{-- <div class="text-center mt-4">
                                    <a href="#" class="btn btn-primary">Show Details</a>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Order id # {{ $booking->id }}</h4>

                            <div class="table-responsive">
                                <table class="table table-bordered table-centered mb-0">
                                    <thead class="table-light">
                                        <tr class="text-nowrap">
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Pickup Location</th>
                                            <th>Dropoff Location</th>
                                            <th>Pickup date</th>
                                            <th>Pickup time</th>
                                            <th>Dropoff date</th>
                                            <th>Dropoff time</th>
                                            <th>Days</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- @php
                                            echo"<pre>";
                                                print_r($booking);die;
                                        @endphp --}}
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
                            <h4 class="header-title mb-3">User Information</h4>
                            <h5 class="font-family-primary fw-semibold">
                                {{ $booking->first_name ?? 'N/A' }} {{ $booking->last_name ?? 'N/A' }}
                            </h5>
                            <p class="mb-2">
                                <span class="fw-semibold me-2">Address:</span>
                                {{ $booking->billing_addresss ?? 'N/A' }}
                            </p>
                            <p class="mb-2">
                                <span class="fw-semibold me-2">Phone:</span>
                                {{ $booking->phonenumber ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="header-title mb-3">Billing Information</h4>
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <p class="mb-2"><span class="fw-semibold me-2">Subtotal:</span>$ {{ number_format($booking->subtotal) }}</p>
                                    <p class="mb-2"><span class="fw-semibold me-2">Tax:</span>$ {{ number_format($booking->tax_amount) }}</p>
                                    <p class="mb-2"><span class="fw-semibold me-2">Total:</span>$ {{ number_format($booking->total_price) }}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> 

                <div class="col-lg-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <h4 class="header-title ">Booking Info</h4>

                            <div class="text-left">
                                <i class="mdi mdi-truck-fast h2 text-muted"></i>
                                <p class="mb-1"><span class="fw-semibold">Order ID :</span> # {{ $booking->id }}</p>
                                <p class="mb-0"><span class="fw-semibold">Payment Mode :</span>{{ $booking->payment_method ?? 'N/A' }}</p>
                                <p class="mb-2"><span class="fw-semibold me-2"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
        </div> 
@endsection