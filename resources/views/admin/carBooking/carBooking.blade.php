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
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Booking Ref</th>
                                <th>Transaction ID</th>
                                <th>Payment Status</th>
                                <th>Booking Status</th>
                                <th>Payment Method</th>
                                <th>Coupon</th>
                                <th>Discount</th>
                                <th>Tax</th>
                                <th>Insurance</th>
                                <th>Total</th>
                                <th>Subtotal</th>
                                <th>Notes</th>
                                <th style="width: 125px;">Action</th>                                
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
                                <td><a href="#" class="text-body fw-bold">{{ $booking->id }}</a></td>
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
                                <td>
                                    <a href="{{ route('car.booking.detail', ['id' => $booking->id]) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    {{-- 
                                    @if(can('Bookings','edit'))
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    @endif
                                    @if(can('Bookings','delete'))
                                        <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a> 
                                    @endif    
                                    --}}
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
@endsection

{{-- <div class="content-body">
    <div class="booking-container  mt-4">
        <div class="booking-header-section">
            <!-- Title -->
            <h2 class="mb-0">{{ __('messages.car') }}  {{ trans_choice('messages.booking',2) }}</h2>

            <!-- Search and Filters in the Same Row -->
            <div class="d-flex align-items-center gap-5">
                <!-- Search Bar -->
                <div class="booking-search-box mr-2">
                    <i class="fa fa-search"></i>
                    <input type="text" placeholder="{{ __('messages.search') }}">
                </div>
                <!-- Filters -->
                <!-- <button id="carTypeFilter" class="booking-filter-box mr-2">
                    <i class="fa fa-filter"></i> Car Type
                </button> -->
                <div class="booking-filter-custom-dropdown mr-2">
                <span class="booking-filter-icon">
                    <!-- <svg width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 4h18l-7 10v6l-4 2v-8z"/>
                    </svg> -->
                </span>
                <select id="statusFilter" class="form-select booking-filter-box">
                    <option value="" disabled selected>{{ __('messages.status') }}</option>
                    <option value="Returned">{{ __('messages.returned') }}</option>
                    <option value="Ongoing">{{ __('messages.ongoing') }}</option>
                    <option value="Cancelled">{{ __('messages.cancelled') }}</option>
                    <option value="Pending">{{ __('messages.pending') }}</option>
                </select>
            </div>
            <div class="booking-filter-custom-dropdown">
                <span class="booking-filter-icon">
                <!-- <svg width="16" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 4h18l-7 10v6l-4 2v-8z"/>
                </svg> -->
            </span>
            <select id="carTypeFilter" class="form-select booking-filter-box">
                <option value=""><i class="fa fa-filter"></i> {{ __('messages.car') }} {{ __('messages.type') }}</option>
                <option value="Sedan">Sedan</option>
                <option value="SUV">SUV</option>
                <option value="Hatchback">Hatchback</option>
            </select>
            </div>
            </div>

            <!-- Add Booking Button -->
            <button class="btn booking-btn-add">{{ __('messages.add') }} {{ trans_choice('messages.booking',1) }}</button>
        </div>
        <table id="myTable" class="table table-striped booking-table">
        <thead class="text-nowrap">
            <tr>
                <th>{{ trans_choice('messages.booking',1) }} ID</th>
                <th>{{ trans_choice('messages.booking',1) }} Date</th>
                <th>{{ trans_choice('messages.client',2) }} Name</th>
                <th>{{ __('messages.car') }} {{ __('messages.model') }}</th>
                <th>{{ trans_choice('messages.plan',1) }}</th>
                <th>{{ __('messages.date') }}</th>
                <th>{{ trans_choice('messages.driver',1) }}</th>
                <th>{{ trans_choice('messages.payment',1) }}</th>
                <th>{{ __('messages.status') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>BK-WZ1001</td>
                <td>Aug 1, 2028</td>
                <td>Alice Johnson</td>
                <td>Toyota Corolla <span class="badge car-badge">Sedan</span></td>
                <td>2 Days</td>
                <td>Aug 1, 2028 → Aug 2, 2028</td>
                <td><span class="driver-icon">➖</span></td>
                <td>$50 <span class="status-paid">Paid</span></td>
                <td><span class="status-badge status-returned">Returned</span></td>
            </tr>
            <tr>
                <td>BK-WZ1002</td>
                <td>Aug 1, 2028</td>
                <td>Bob Smith</td>
                <td>Honda Civic <span class="badge car-badge">Sedan</span></td>
                <td>7 Days</td>
                <td>Aug 1, 2028 → Aug 8, 2028</td>
                <td><span class="driver-icon">✔️</span></td>
                <td>$350 <span class="status-pending">Pending</span></td>
                <td><span class="status-badge status-ongoing">Ongoing</span></td>
            </tr>
            <tr>
                <td>BK-WZ1005</td>
                <td>Aug 3, 2028</td>
                <td>Edward Green</td>
                <td>Nissan Altima <span class="badge car-badge">Sedan</span></td>
                <td>8 Days</td>
                <td>Aug 3, 2028 → Aug 10, 2028</td>
                <td><span class="driver-icon">➖</span></td>
                <td>$350 <span class="status-pending">Pending</span></td>
                <td><span class="status-badge status-cancelled">Cancelled</span></td>
            </tr>
        </tbody>
    </table>
    </div>    
</div> --}}
{{-- <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-lg-8">
                        <form class="d-flex flex-wrap align-items-center">
                            <label for="inputPassword2" class="visually-hidden">Search</label>
                            <div class="me-3">
                                <input type="search" class="form-control my-1 my-lg-0" id="inputPassword2" placeholder="Search...">
                            </div>
                            <label for="status-select" class="me-2">Status</label>
                            <div class="me-sm-3">
                                <select class="form-select form-select my-1 my-lg-0" id="status-select">
                                    <option selected>Choose...</option>
                                    <option value="1">Paid</option>
                                    <option value="2">Awaiting Authorization</option>
                                    <option value="3">Payment failed</option>
                                    <option value="4">Cash On Delivery</option>
                                    <option value="5">Fulfilled</option>
                                    <option value="6">Unfulfilled</option>
                                </select>
                            </div>
                        </form>                            
                    </div>
                    <div class="col-lg-4">
                        <div class="text-lg-end">
                            <button type="button" class="btn btn-danger waves-effect waves-light mb-2 me-2"><i class="mdi mdi-basket me-1"></i> Add New Order</button>
                            <button type="button" class="btn btn-light waves-effect mb-2">Export</button>
                        </div>
                    </div><!-- end col-->
                </div>

                <div class="table-responsive">
                    <table class="table table-centered table-nowrap mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 20px;">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">&nbsp;</label>
                                    </div>
                                </th>
                                <th>Order ID</th>
                                <th>Products</th>
                                <th>Date</th>
                                <th>Payment Status</th>
                                <th>Total</th>
                                <th>Payment Method</th>
                                <th>Order Status</th>
                                <th style="width: 125px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck2">
                                        <label class="form-check-label" for="customCheck2">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9708</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-1.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-2.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>
                                    August 05 2018 <small class="text-muted">10:29 PM</small>
                                </td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i> Paid</span></h5>
                                </td>
                                <td>
                                    $176.41
                                </td>
                                <td>
                                    Mastercard
                                </td>
                                <td>
                                    <h5><span class="badge bg-info">Shipped</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck3">
                                        <label class="form-check-label" for="customCheck3">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9707</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-3.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-4.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-5.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>August 04 2018 <small class="text-muted">08:18 AM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-warning text-warning"><i class="mdi mdi-timer-sand"></i> Awaiting Authorization</span></h5>
                                </td>
                                <td>
                                    $1,458.65
                                </td>
                                <td>
                                    Visa
                                </td>
                                <td>
                                    <h5><span class="badge bg-warning">Processing</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck4">
                                        <label class="form-check-label" for="customCheck4">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9706</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-7.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>August 04 2018 <small class="text-muted">10:29 PM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i> Paid</span></h5>
                                </td>
                                <td>
                                    $801.99
                                </td>
                                <td>
                                    Credit Card
                                </td>
                                <td>
                                    <h5><span class="badge bg-warning">Processing</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck5">
                                        <label class="form-check-label" for="customCheck5">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9705</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-3.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-8.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>August 03 2018 <small class="text-muted">07:56 AM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i> Paid</span></h5>
                                </td>
                                <td>
                                    $215.35
                                </td>
                                <td>
                                    Mastercard
                                </td>
                                <td>
                                    <h5><span class="badge bg-success">Delivered</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck6">
                                        <label class="form-check-label" for="customCheck6">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9704</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-5.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-7.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>May 22 2018 <small class="text-muted">07:22 PM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-danger text-danger"><i class="mdi mdi-cancel"></i> Payment Failed</span></h5>
                                </td>
                                <td>
                                    $2,514.36
                                </td>
                                <td>
                                    Paypal
                                </td>
                                <td>
                                    <h5><span class="badge bg-danger">Cancelled</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck7">
                                        <label class="form-check-label" for="customCheck7">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9703</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-2.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>April 02 2018 <small class="text-muted">03:02 AM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i> Paid</span></h5>
                                </td>
                                <td>
                                    $183.20
                                </td>
                                <td>
                                    Payoneer
                                </td>
                                <td>
                                    <h5><span class="badge bg-info">Shipped</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck8">
                                        <label class="form-check-label" for="customCheck8">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9702</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-4.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-6.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>March 18 2018 <small class="text-muted">11:19 PM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-warning text-warning"><i class="mdi mdi-timer-sand"></i> Awaiting Authorization</span></h5>
                                </td>
                                <td>
                                    $1,768.41
                                </td>
                                <td>
                                    Visa
                                </td>
                                <td>
                                    <h5><span class="badge bg-warning">Processing</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck9">
                                        <label class="form-check-label" for="customCheck9">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9701</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-6.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-8.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-3.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>February 01 2018 <small class="text-muted">07:22 AM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-info text-info"><i class="mdi mdi-cash"></i> Cash on Delivery</span></h5>
                                </td>
                                <td>
                                    $3,582.99
                                </td>
                                <td>
                                    Paypal
                                </td>
                                <td>
                                    <h5><span class="badge bg-info">Shipped</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck10">
                                        <label class="form-check-label" for="customCheck10">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9700</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-2.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-5.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>January 22 2018 <small class="text-muted">08:09 PM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i> Paid</span></h5>
                                </td>
                                <td>
                                    $923.95
                                </td>
                                <td>
                                    Credit Card
                                </td>
                                <td>
                                    <h5><span class="badge bg-success">Delivered</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck11">
                                        <label class="form-check-label" for="customCheck11">&nbsp;</label>
                                    </div>
                                </td>
                                <td><a href="ecommerce-order-detail.html" class="text-body fw-bold">#UB9699</a> </td>
                                <td>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-7.png" alt="product-img" height="32" /></a>
                                    <a href="ecommerce-product-detail.html"><img src="assets/images/products/product-8.png" alt="product-img" height="32" /></a>
                                </td>
                                <td>January 17 2018 <small class="text-muted">02:30 PM</small></td>
                                <td>
                                    <h5><span class="badge bg-soft-success text-success"><i class="mdi mdi-bitcoin"></i> Paid</span></h5>
                                </td>
                                <td>
                                    $5,177.68
                                </td>
                                <td>
                                    Mastercard
                                </td>
                                <td>
                                    <h5><span class="badge bg-info">Shipped</span></h5>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                    <a href="javascript:void(0);" class="action-icon"> <i class="mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>

                <ul class="pagination pagination-rounded justify-content-end my-2">
                    <li class="page-item">
                        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                    <li class="page-item">
                        <a class="page-link" href="javascript: void(0);" aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </li>
                </ul>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> --}}