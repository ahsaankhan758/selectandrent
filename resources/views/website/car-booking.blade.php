@extends('website.layout.master')
@section('title')
{{ __('messages.Car Booking') }}| {{ __('messages.Select and Rent') }}
@endsection

@section('content')
<!-- load ajax for remove cart -->
<script src="{{asset('/frontend-assets/assets/Js/getDifferenceDays.js')}}"></script>
<script src="{{asset('/frontend-assets/assets/Js/cartRmoveItems.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
<div class="container py-2">
    <div class="progress-container">
        <div class="progress-line"></div>
        <div class="progress-bar-filled"></div>

       <!-- Step 1 -->
       <div class="progress-step active">
        <span class="step-number">1</span>
        <span class="step-text">{{ __('messages.Booking') }}</span>
        </div>

        <!-- Step 2 -->
        <div class="progress-step">
            <span class="step-number">2</span>
            <span class="step-text">{{ __('messages.Confirmation') }}</span>
        </div>

        <!-- Step 3 -->
        <div class="progress-step">
            <span class="step-number">3</span>
            <span class="step-text">{{ __('messages.Checkout') }}</span>
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
<a class="text-right" href="{{ route('clear.cart') }}">{{ __('messages.Clear_Cart') }} ({{$cartItemsCount}})</a>
</div>
@foreach($cartItems as $cart)

<div class="container mt-4">

    <div class="row g-3">
        <!-- Pickup Location -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Pickup Location') }}</label>
            <select class="form-select">
                <option selected>{{ __('messages.Select Location') }}</option>
                @if(isset($vehicleLocation) && !empty($vehicleLocation))
                    @foreach($vehicleLocation as $location)
                    <option value="{{$location->id}}">{{$location->city}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <!-- Dropoff Location -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Dropoff Location') }}</label>
            <select class="form-select">
                <option selected>{{ __('messages.Select Location') }}</option>
                @if(isset($vehicleLocation) && !empty($vehicleLocation))
                    @foreach($vehicleLocation as $location)
                    <option value="{{$location->id}}">{{$location->city}}</option>
                    @endforeach
                @endif
            </select>
        </div>

        <!-- Pickup Date & Time -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Pickup_Date_time') }}</label>
            <div class="input-group">
            <input type="datetime-local" id="getPickupDate" class="form-control time-input">
            </div>
        </div>

        <!-- Drop-off Date & Time -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Drop-off_Date_time') }}</label>
            <div class="input-group">
                <input type="datetime-local" id="getDropoffDate" class="form-control time-input">
            </div>
        </div>

        <!-- Display Difference -->
        <div class="col-md-3 mt-3">
            <p id="timeDifference"></p>
        </div>
        
    </div>
    
</div>
<!-- CAR DETAIL -->
<div class="container py-3">
    <div class="vehicle-card d-flex mobile-car">
        <ul class="col-md-6">{{ __('messages.Vehicle Info') }}</ul>
        <ul class="col-md-2">{{ __('messages.Price') }}</ul>
        <ul class="col-md-2">{{ __('messages.Days') }}</ul>
        <ul class="col-md-2">{{ __('messages.Action') }}</ul>
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
                <p class="fw-bold text-capitalize">$100 / Day</p>
               
            </div>
            <div class="col-md-6">

            </div>
    </div>
</div>
<div class="container py-2">
    <div class="row d-flex">
        <div class="col-md-6">
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.Seats') }}:</strong> {{$cart->options->seats}}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.weight') }}:</strong> {{$cart->options->weight}}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.Doors') }}:</strong> {{$cart->options->doors}}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.Mileage') }}:</strong> {{$cart->options->mileage}}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.Vehicle Id') }}:</strong> {{$cart->options->lisence_plate}}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.beam') }}:</strong> {{ $cart->options->beam }}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.Postal Code') }}:</strong>  {{ $cart->options->postal_code }}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.transmission') }}:</strong> {{ $cart->options->transmission }}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.engine size') }}:</strong> {{ $cart->options->engine_size }}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.Exterior Color') }}:</strong> {{ $cart->options->exterior_color }}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.Interior Color') }}:</strong> {{ $cart->options->interior_color }}</div>
           <div class="mb-2 text-capitalize"><strong>{{ __('messages.radius') }}:</strong> 12M</div>
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
            <div class="mb-2"><h6>1 {{ __('messages.Days') }}</h6></div>
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
            <div class="mb-2"><a href="javascript::void();" class="remove-btn" data-rowid="{{ $cart->rowId }}"><i class="fa fa-trash text-danger"></i></a></div>
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
                <div><strong>{{ __('messages.Subtotal') }}</strong></div>
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
                <div><strong>{{ __('messages.Total') }}</strong></div>
                <div class="price-car">${{$totalPriceIncludingTax}}</div>
            </div>
        </div>
        <!-- Order Confirmation Button -->
        <div class="col-md-3 col-12">
            <button onclick="window.location.href='{{ url('/confirmation') }}'" class="btn-order btn-orange-clr">
                {{ __('messages.Order Confirmation') }}
            </button>
        </div>
    </div>
</div>


@else

<div class="row">
    <div class="col-md-12 text-center pt-5 bp-5">
        <p>{{ __('messages.No_car_found_in_your_cart') }}</p>
        <a href="{{route('car.listing')}}" class="btn btn-orange-clr text-white">{{ __('messages.Car_Listing') }}</a>
    </div>
</div>

@endif
<!-- END CAR DETAIL -->
<div class="container py-3">
    <div class="row">
        <!--book Section -->
        <div class="col-md-12 mb-4">
            <h4 class="section-title"><span></span>{{ __('messages.A Special Note to Our Car Rental Partners') }}</h4>
            <p class="text-size">{{ __('messages.At SelectandRent, we value our partnership with car rental companies like yours. Together, we aim to redefine the car rental experience for customers worldwide. Our platform is built to support your growth, offering tools to showcase your fleet, connect with a broader audience, and streamline your operations') }}.<br>
                {{ __('messages.Your success is our priority, and we’re here to help you reach new heights with innovative technology, insightful analytics, and dedicated support. Thank you for trusting us to be a part of your journey. Let’s drive forward, together') }} !</p>
        </div>
    </div>
</div>

@endsection