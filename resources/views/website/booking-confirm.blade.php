@extends('website.layout.master')
@section('title')
{{ __('messages.Car Booking ') }}| {{ __('messages.Select and Rent') }}
@endsection

@section('content')
<script src="{{asset('/frontend-assets/assets/Js/payment-gateways/ActivePaymentRadioButtons.js')}}"></script>
<style>
    .payment-card {
        transition: 0.3s ease-in-out;
        border: 2px solid transparent;
    }

    .payment-card.active-payment {
        border-color: #000; /* Bootstrap primary */
        box-shadow: 0 0 8px rgb(21 23 25 / 30%);
    }
    .payment-card:hover {
    border-color: #007bff44;
    }
</style>
<div class="container py-2" id="booking-confirm-container">
    <?php
    $encodedData = base64_encode(serialize($checkoutData));
    ?>
    <div class="progress-container">
        <div class="progress-line"></div>
        <div class="progress-bar-filled-order"></div>

        <!-- Step 1 -->
        <div class="progress-step active">
            <span class="step-number">1</span>
            <span class="step-text">{{ __('messages.Booking') }}</span>
        </div>

        <!-- Step 2 -->
        <div class="progress-step active">
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
<!-- end progress bar -->
 <!-- input form -->
  <!-- billing -->
<div class="container heading-background py-3 mb-3">
    <div class="container text-start fw-bold">{{ __('messages.PaymentMethod') }}</div>
</div>
<form method="post" id="bookingFormSubmit" action="{{route('booking.payment')}}" enctype="multipart/form-data">
    @csrf
  <input type="hidden" name="checkoutData" value="<?= htmlspecialchars($encodedData) ?>">
  <div class="container cvv-card py-3 mb-3">
  <div class="mb-4">
        @if(count($paymentGateways) > 0)
            <ul class="list-unstyled d-flex flex-wrap gap-3">
                @foreach($paymentGateways as $index => $gateway)
                @php 
                    $gatewayValue = strtolower(trim($gateway->name));
                    $gatewayImage = '';

                    if (in_array($gatewayValue, ['stripe', 'paypal'])) {
                        $gatewayImage = url(asset('/frontend-assets/assets/Js/payment-gateways/images').'/'.$gatewayValue.'.svg'); 
                    }
                @endphp

                    <li>
                        <input type="radio" name="paymentMethod" id="paymentOption_{{ $gatewayValue }}" value="{{ $gatewayValue }}" class="d-none payment-radio"
                            {{ $index === 0 ? 'checked' : '' }} required>

                        <label for="paymentOption_{{ $gatewayValue }}" class="payment-card border rounded p-3 d-flex align-items-center gap-2 cursor-pointer" style="min-width: 200px;">
                            @if($gatewayImage)
                                <img src="{{ $gatewayImage }}" alt="{{ $gateway->name }}" height="30">
                            @endif
                            
                        </label>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
    
  </div>
<div class="container heading-background py-3 mb-3">
    <div class="container text-start fw-bold">{{ __('messages.Billing Address') }}</div>
</div>
<div class="container cvv-card py-3">
        
        <div class="row g-3">

                <div class="col-md-6">
                    <label for="firstName" class="form-label fw-bold">{{ __('messages.First Name') }}</label>
                    <input type="text" name="firstName" class="form-control form-control-border" id="firstName" placeholder="Enter your first name" required>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label fw-bold">{{ __('messages.Last Name') }}</label>
                    <input type="text" name="lastName" class="form-control form-control-border" id="lastName" placeholder="Enter your last name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label fw-bold">{{ __('messages.Email Address') }}</label>
                    <input type="email" name="email" class="form-control form-control-border" id="email" placeholder="Enter your email address" required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label fw-bold">{{ __('messages.Phone Number') }}</label>
                    <input type="tel" name="phonenumber" class="form-control form-control-border" id="phone" placeholder="Enter your phone number" required>
                </div>
                <!-- First Row: 4 Inputs (Card Number, Expiration Month, Expiration Year, CVV) -->
                <div class="col-md-6">
                    <label class="custom-label">{{ __('messages.city') }}</label>
                    <input type="text" name="city" class="form-control form-control-border"  placeholder="Enter your city" required>
                </div>
                <div class="col-md-6">
                    <label class="custom-label">{{ __('messages.Country') }}</label>
                    <input type="text" name="country" class="form-control form-control-border" placeholder="Enter your country" required>
                </div>
                <div class="col-md-6">
                    <label class="custom-label">{{ __('messages.Postal Code') }}</label>
                    <input type="text" name="postal_code" class="form-control form-control-border" placeholder="XXXX" required>
                </div>
    
                <!-- Second Row: 4-4 Column Layout -->
                <div class="col-md-6">
                    <label class="custom-label">{{ __('messages.Billing Address') }}</label>
                    <input type="text" name="billing_addresss" class="form-control form-control-border" placeholder="XXXXXXXXXXXXXXXXXXXX" required>
                </div>
                
                <div class="col-md-12">
                    <button type="submit" class="btn-order-book btn-orange-clr mt-4"><i class="fa-solid fa-cart-shopping"></i> {{ __('messages.Process to checkout') }} </button>
                </div>            
            </div>
</div>
</form>


@endsection