<!-- for payment gateways -->
<script src="{{asset('/frontend-assets/assets/Js/payment-gateways/ActivePaymentRadioButtons.js')}}"></script>
<!-- end for payment gateways -->
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
  <!-- billing -->
<div class="container heading-background py-3 mb-3">
    <div class="container text-start fw-bold">{{ __('messages.PaymentMethod') }}</div>
</div>
<?php $encodedData = base64_encode(serialize($checkoutData)); ?>
<form method="post" id="bookingFormSubmit" action="{{route('booking.payment')}}" enctype="multipart/form-data">
    @csrf
  <input type="hidden" name="checkoutData" value="<?= htmlspecialchars($encodedData) ?>">
  <div class="container cvv-card py-3 mb-3">
  <div class="mb-4">
  @if(count($paymentGateways) > 0)
        <ul class="list-unstyled d-flex flex-wrap gap-3">
            @foreach($paymentGateways as $index => $gateway)
            @php 
                
                $gatewayValue = preg_replace('/[^a-z0-9\-]/', '', strtolower(trim($gateway->name)));
                $gatewayImage = '';

                if (in_array($gatewayValue, ['stripe', 'paypal'])) {
                    $gatewayImage = url(asset('/frontend-assets/assets/Js/payment-gateways/images').'/'.$gatewayValue.'.svg'); 
                }
            @endphp

                <li>
                    @if(Auth::check())
                        <input type="radio" name="paymentMethod" id="paymentOption_{{ $gatewayValue }}" value="{{ $gatewayValue }}" class="d-none payment-radio"
                            {{ $index === 0 ? 'checked' : '' }} required>
                    @else
                        {{-- Dummy radio for unauthenticated users to intercept click --}}
                        <input type="radio" name="paymentMethod" id="paymentOption_{{ $gatewayValue }}" class="d-none payment-radio" data-bs-toggle="modal" data-bs-target="#loginModal" {{ $index === 0 ? 'checked' : '' }} required/>
                    @endif

                    <label for="paymentOption_{{ $gatewayValue }}" onclick="paymentRadio()" class="{{ $index === 0 ? 'active-payment' : '' }} payment-card border rounded p-3 d-flex align-items-center gap-2 cursor-pointer"
                        style="min-width: 200px;" 
                        @unless(Auth::check()) onclick="showLoginModal()" @endunless>
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
                    @if(auth()->check())
                        @php
                            $full_name = auth()->user()->name;
                            $name_parts = explode(' ', $full_name);
                            $first_name = $name_parts[0] ?? '';
                            $last_name = $name_parts[1] ?? '';
                            $email = auth()->user()->email;
                            $phone = auth()->user()->phone;
                            $user_id = auth()->user()->id;
                        @endphp
                    @endif

                    <input type="text" name="firstName" class="form-control form-control-border" id="firstName" value="{{ $first_name ?? '' }}" placeholder="Enter your first name" required>
                </div>
                <div class="col-md-6">
                    <label for="lastName" class="form-label fw-bold">{{ __('messages.Last Name') }}</label>
                    <input type="text" name="lastName" class="form-control form-control-border" id="lastName" value="{{ $last_name ?? '' }}" placeholder="Enter your last name" required>
                    <input type="hidden" name="user_id" value="{{ $user_id ?? '' }}" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label fw-bold">{{ __('messages.Email Address') }}</label>
                    <input type="email" name="email" class="form-control form-control-border" id="email" value="{{ $email ?? '' }}" placeholder="Enter your email address" readonly required>
                </div>
                <div class="col-md-6">
                    <label for="phone" class="form-label fw-bold">{{ __('messages.Phone Number') }}</label>
                    <input type="tel" name="phonenumber" class="form-control form-control-border" id="phone" value="{{ $phone ?? '' }}" placeholder="Enter your phone number" required>
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
                    @if(auth()->check())
                    <button type="submit" class="btn-order-book btn-orange-clr mt-4"><i class="fa-solid fa-cart-shopping"></i> {{ __('messages.Process to checkout') }} </button>
                    @else
                    <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn-order-book btn-orange-clr mt-4"><i class="fa-solid fa-cart-shopping"></i> {{ __('messages.Process to checkout') }} </button>
                    @endif
                </div>            
            </div>
</div>
</form>
