@extends('website.layout.master')
@section('title')
{{ __('messages.Checkout') }}
@endsection

@section('content')
<!-- progress bar order -->
<div class="container py-2">
    <div class="progress-container">
        <div class="progress-line"></div>
        <div class="progress-bar-filled-check-out"></div>

        <!-- Step 1 -->
        <div class="progress-step active">
            <span class="step-number">1</span>
            <span class="step-text">{{ __('messages.Ride info') }}</span>
        </div>

        <!-- Step 2 -->
        <div class="progress-step active">
            <span class="step-number">2</span>
            <span class="step-text">{{ __('messages.Payment info') }}</span>
        </div>

        <!-- Step 3 -->
        <div class="progress-step active">
            <span class="step-number">3</span>
            <span class="step-text">{{ __('messages.Checkout') }}</span>
        </div>
    </div>
</div>
<!-- end progress bar -->
<!-- thankyou -->
<div class="container-fluid py-5">
<div class="container">
<h2 class="text-center">{{ __('messages.Thank you') }}.</h2>
<p class="text-center text-check-out-clr">{{ __('messages.Your order has been received') }}.</p>
</div>
 </div> 
<!-- end thankyou -->
<!-- cards -->
<div class="container py-5">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}frontend-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">{{ __('messages.Order Number') }}</div>
                <div class="start-text">{{ $booking->booking_reference }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}frontend-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">{{ __('messages.Date') }}</div>
                <div class="start-text">{{ $booking->created_at }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}frontend-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">{{ __('messages.Email') }}</div>
                <div class="start-text">{{ $booking->email }}</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}frontend-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">{{ __('messages.total') }}</div>
                <div class="start-text">{{ $booking->total_price}}</div>
            </div>
        </div>
    </div>
</div>
<!-- end cards -->

@endsection