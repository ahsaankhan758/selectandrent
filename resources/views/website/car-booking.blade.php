@extends('website.layout.master')
@section('title')
{{ __('messages.Car Booking') }}| {{ __('messages.Select and Rent') }}
@endsection

@section('content')
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
</div>

<div class="container mt-4">
    <div class="row g-3">
        <!-- Pickup Location -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Pickup Location') }}</label>
            <select class="form-select">
                <option selected>{{ __('messages.Select Location') }}</option>
                <option value="1">Location 1</option>
                <option value="2">Location 2</option>
            </select>
        </div>

        <!-- Dropoff Location -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Dropoff Location') }}</label>
            <select class="form-select">
                <option selected>{{ __('messages.Select Location') }}</option>
                <option value="1">Location 1</option>
                <option value="2">Location 2</option>
            </select>
        </div>

        <!-- Pickup Date & Time -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Pickup Date') }}</label>
            <div class="input-group">
                <input type="time" class="form-control time-input">
            </div>
        </div>

        <!-- Drop-off Date & Time -->
        <div class="col-md-3">
            <label class="form-label">{{ __('messages.Drop-off Date') }}</label>
            <div class="input-group">
                <input type="time" class="form-control time-input">
            </div>
        </div>
    </div>
</div>
<!-- CAR DETAIL -->
<div class="container py-3">
    <div class="vehicle-card d-flex mobile-car">
        <ul class="col-md-6">{{ __('messages.Vehicle Info') }}</ul>
        <ul class="col-md-3">{{ __('messages.Price') }}</ul>
        <ul class="col-md-3">{{ __('messages.Days') }}</ul>
    </div>
</div>
<div class="container">
<div class="row d-flex py-2">
            <div class="col-md-3">
                <img src="{{asset('/')}}company-assets/assets/main.png" class="car-order-img" alt="Car Image">
            </div>
            <div class="col-md-3 align-items-center">
                <div class="stars text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <span class="vehicle-title">Porche Turbo 6.0</span>
                <p class="car-model-text">2019, Sportcar</p>
            </div>
            <div class="col-md-6">

            </div>
    </div>
</div>
<div class="container py-2">
    <div class="row d-flex">
        <div class="col-md-6">
           <div class="mb-2"><strong>{{ __('messages.Pickup Location') }}:</strong> The Shard</div>
           <div class="mb-2"><strong>{{ __('messages.Dropoff Location') }}:</strong> Ahmed pur East</div>
           <div class="mb-2"><strong>{{ __('messages.Pickup Date') }}:</strong> 27-11-2024</div>
           <div class="mb-2"><strong>{{ __('messages.Drop-off Date') }}:</strong> 28-11-2024</div>
           <div class="mb-2"><strong>{{ __('messages.Vehicle Id') }}:</strong> Audi-2020,Ferrari-4858,kia-2016</div>
           <div class="mb-2"><strong>{{ __('messages.beam') }}:</strong> 3 km</div>
           <div class="mb-2"><strong>{{ __('messages.Postal Code') }}:</strong> 5400</div>
           <div class="mb-2"><strong>{{ __('messages.transmission') }}:</strong> Automatic</div>
           <div class="mb-2"><strong>{{ __('messages.radius') }}:</strong> 100 M</div>
        </div>
        <div class="col-md-3 mobile-car">
            <div class="mb-2 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-2"><h6>$1000</h6></div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
        </div>
        <div class="col-md-3 mobile-car">
            <div class="mb-2 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-3 empty-box"> </div>
            <div class="mb-2"><h6>2 {{ __('messages.Days') }}</h6></div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
            <div class="mb-2 empty-box"> </div>
        </div>
    </div>
</div>
<div class="container my-3">
    <div class="row justify-content-center align-items-center g-3">
        <!-- Subtotal Box -->
        <div class="col-md-4 col-6">
            <div class="box">
                <div><strong>{{ __('messages.Subtotal') }}</strong></div>
                <div class="price-car">$1000</div>
            </div>
        </div>
        <!-- Total Box -->
        <div class="col-md-4 col-6">
            <div class="box">
                <div><strong>{{ __('messages.Total') }}</strong></div>
                <div class="price-car">$1000</div>
            </div>
        </div>
        <!-- Order Confirmation Button -->
        <div class="col-md-4 col-12">
            <button class="btn-order btn-orange-clr">{{ __('messages.Order Confirmation') }}</button>
        </div>
    </div>
</div>

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