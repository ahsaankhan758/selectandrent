@extends('website.layout.master')
@section('title')
Checkout | Select and Rent
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
            <span class="step-text">Ride info</span>
        </div>

        <!-- Step 2 -->
        <div class="progress-step active">
            <span class="step-number">2</span>
            <span class="step-text">Payment info</span>
        </div>

        <!-- Step 3 -->
        <div class="progress-step active">
            <span class="step-number">3</span>
            <span class="step-text">Checkout</span>
        </div>
    </div>
</div>
<!-- end progress bar -->
<!-- thankyou -->
<div class="container-fluid py-5">
<div class="container">
<h2 class="text-center">Thank you.</h2>
<p class="text-center text-check-out-clr">Your order has been received.</p>
</div>
 </div> 
<!-- end thankyou -->
<!-- cards -->
<div class="container py-5">
    <div class="row g-3">
        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}company-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">Order Number</div>
                <div class="start-text">311</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}company-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">Date</div>
                <div class="start-text">Nov 23, 2024</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}company-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">Email</div>
                <div class="start-text">hello@sparkodic.com</div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="start-card">
                <div>
                    <img src="{{asset('/')}}company-assets/icons/send.png" class="order-icon-img" alt="Icon">
                </div>
                <div class="start-title">Order Number</div>
                <div class="start-text">311</div>
            </div>
        </div>
    </div>
</div>
<!-- end cards -->

@endsection