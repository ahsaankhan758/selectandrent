@extends('website.layout.master')
@section('title')
Car Booking | Select and Rent
@endsection

@section('content')
<div class="container py-2">
    <div class="progress-container">
        <div class="progress-line"></div>
        <div class="progress-bar-filled"></div>

        <!-- Step 1 -->
        <div class="progress-step active">
            <span class="step-number">1</span>
            <span class="step-text">Booking</span>
        </div>

        <!-- Step 2 -->
        <div class="progress-step">
            <span class="step-number">2</span>
            <span class="step-text">Confirmation</span>
        </div>

        <!-- Step 3 -->
        <div class="progress-step">
            <span class="step-number">3</span>
            <span class="step-text">Checkout</span>
        </div>
    </div>
    @if(session('success'))
    <div id="div1" class="alert alert-success text-center mt-3 text-capitalize">{{ session('success') }}</div>
    @endif
    @if(session('message'))
    <div id="div1" class="alert alert-danger text-center mt-3 text-capitalize">{{ session('message') }}</div>
    @endif
</div>

@if($cartItems->count() > 0)
<div class="container">
<a class="text-right" href="{{ route('clear.cart') }}">Clear Cart ({{$cartItemsCount}})</a>
</div>
@foreach($cartItems as $cart)

<div class="container mt-4">

    <div class="row g-3">
        <!-- Pickup Location -->
        <div class="col-md-3">
            <label class="form-label">Pickup Location</label>
            <select class="form-select">
                <option selected>Select Location</option>
                @if(isset($vehicleLocation) && !empty($vehicleLocation))
                    @foreach($vehicleLocation as $location)
                    <option value="{{$location->id}}">{{$location->city}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <!-- Dropoff Location -->
        <div class="col-md-3">
            <label class="form-label">Dropoff Location</label>
            <select class="form-select">
                <option selected>Select Location</option>
                @if(isset($vehicleLocation) && !empty($vehicleLocation))
                    @foreach($vehicleLocation as $location)
                    <option value="{{$location->id}}">{{$location->city}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <!-- Pickup Date & Time -->
        <div class="col-md-3">
            <label class="form-label">Pickup Date Time</label>
            <div class="input-group">
            <input type="datetime-local" class="form-control time-input">
            </div>
        </div>

        <!-- Drop-off Date & Time -->
        <div class="col-md-3">
            <label class="form-label">Drop-off Date Time</label>
            <div class="input-group">
                <input type="datetime-local" class="form-control time-input">
            </div>
        </div>

       
        
    </div>
    
</div>
<!-- CAR DETAIL -->
<div class="container py-3">
    <div class="vehicle-card d-flex mobile-car">
        <ul class="col-md-6">Vehicle Info</ul>
        <ul class="col-md-2">Price</ul>
        <ul class="col-md-2">Days</ul>
        <ul class="col-md-2">Action</ul>
    </div>
</div>
<div class="container">
<div class="row d-flex py-2">
            <div class="col-md-3">

            <img src="{{  asset(Storage::url($cart->options->thumbnail)) }}" class="car-order-img" alt="{{ $cart->options->car_model ?? 'thumbnail' }}">

            </div>
            <div class="col-md-3 align-items-center">
                <div class="stars text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="vehicle-title text-capitalize">{{$cart->options->car_brand}} {{$cart->name}}</span>
                <p class="car-model-text text-capitalize">{{ $cart->options->year }}, {{$cart->options->car_category}}</p>
            </div>
            <div class="col-md-6">

            </div>
    </div>
</div>
<div class="container py-2">
    <div class="row d-flex">
        <div class="col-md-6">
           <div class="mb-2 text-capitalize"><strong>Seats:</strong> {{$cart->options->seats}}</div>
           <div class="mb-2 text-capitalize"><strong>weight:</strong> {{$cart->options->weight}}</div>
           <div class="mb-2 text-capitalize"><strong>Doors:</strong> {{$cart->options->doors}}</div>
           <div class="mb-2 text-capitalize"><strong>Mileage:</strong> {{$cart->options->mileage}}</div>
           <div class="mb-2 text-capitalize"><strong>Vehicle Id:</strong> {{$cart->options->lisence_plate}}</div>
           <div class="mb-2 text-capitalize"><strong>Beam:</strong> {{ $cart->options->beam }}</div>
           <div class="mb-2 text-capitalize"><strong>Postal Code:</strong>  {{ $cart->options->postal_code }}</div>
           <div class="mb-2 text-capitalize"><strong>Transmission:</strong> {{ $cart->options->transmission }}</div>
           <div class="mb-2 text-capitalize"><strong>Engine Size:</strong> {{ $cart->options->engine_size }}</div>
           <div class="mb-2 text-capitalize"><strong>Exterior Color:</strong> {{ $cart->options->exterior_color }}</div>
           <div class="mb-2 text-capitalize"><strong>Interior Color:</strong> {{ $cart->options->interior_color }}</div>
           <div class="mb-2 text-capitalize"><strong>Radius:</strong> 12M</div>
        </div>
        <div class="col-md-2 mobile-car">
            <div class="mb-2 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-2 text-capitalize"><h6>${{ $cart->price }}</h6></div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
        </div>
        <div class="col-md-2 mobile-car">
            <div class="mb-2 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-2"><h6>1 Days</h6></div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"></div>
        </div>
        <div class="col-md-2 mobile-car">
            <div class="mb-2 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-2"><a href=""><i class="fa fa-trash text-danger"></i></a></div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"></div>
            <div class="mb-2 empty-box"></div>
        </div>
    </div>
</div>
@endforeach
<div class="container my-3">
    <div class="row justify-content-center align-items-center g-3">
        <!-- Subtotal Box -->
        <div class="col-md-3 col-6">
            <div class="box">
                <div><strong>Subtotal</strong></div>
                <div class="price-car">${{ $subtotal }}</div>
            </div>
        </div>
        <div class="col-md-3 col-6">
            <div class="box">
                <div><strong>VAT</strong></div>
                <div class="price-car">${{ $tax }}</div>
            </div>
        </div>
        <!-- Total Box -->
        <div class="col-md-3 col-6">
            <div class="box">
                <div><strong>Total</strong></div>
                <div class="price-car">${{$totalPriceIncludingTax}}</div>
            </div>
        </div>
        <!-- Order Confirmation Button -->
        <div class="col-md-3 col-12">
            <button onclick="window.location.href='{{ url('/confirmation') }}'" class="btn-order btn-orange-clr">
                Order Confirmation
            </button>
        </div>
    </div>
</div>


@else

<div class="row">
    <div class="col-md-12 text-center pt-5 bp-5">
        <p>No car found in your cart</p>
        <a href="{{route('car.listing')}}" class="btn btn-orange-clr text-white">Car Listing</a>
    </div>
</div>

@endif
<!-- END CAR DETAIL -->
<div class="container py-3">
    <div class="row">
        <!--book Section -->
        <div class="col-md-12 mb-4">
            <h4 class="section-title"><span></span>A Special Note to Our Car Rental Partners</h4>
            <p class="text-size">At SelectandRent, we value our partnership with car rental companies like yours. Together, we aim to redefine the car rental experience for customers worldwide. Our platform is built to support your growth, offering tools to showcase your fleet, connect with a broader audience, and streamline your operations.<br>
                Your success is our priority, and we’re here to help you reach new heights with innovative technology, insightful analytics, and dedicated support. Thank you for trusting us to be a part of your journey. Let’s drive forward, together!</p>
        </div>
    </div>
</div>

@endsection