<!-- for payment gateways -->
<script src="{{ asset('/frontend-assets/assets/Js/payment-gateways/ActivePaymentRadioButtons.js') }}"></script>
<script src="{{ asset('/frontend-assets/assets/Js/terms-check.js') }}"></script>
<!-- end for payment gateways -->
<style>
    .payment-card {
        transition: 0.3s ease-in-out;
        border: 2px solid transparent;
    }

    #OrderSubmitBtn:disabled {
        opacity: 0.6;
        /* Light/faded effect */
        cursor: not-allowed;
        /* Optional: shows it's not clickable */
    }

    .payment-card.active-payment {
        border-color: #000;
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
<form method="post" id="orderBookingFormSubmit" action="{{ route('booking.payment') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="checkoutData" value="<?= htmlspecialchars($encodedData) ?>">
    <div class="container cvv-card py-3 mb-3">
        <div class="mb-4">
            @if (count($paymentGateways) > 0)
                <ul class="list-unstyled d-flex flex-wrap gap-3">
                    @foreach ($paymentGateways as $index => $gateway)
                        @php

                            $gatewayValue = preg_replace('/[^a-z0-9\-]/', '', strtolower(trim($gateway->name)));
                            $gatewayImage = '';

                            if (in_array($gatewayValue, ['stripe', 'paypal'])) {
                                $gatewayImage = url(
                                    asset('/frontend-assets/assets/Js/payment-gateways/images') .
                                        '/' .
                                        $gatewayValue .
                                        '.svg',
                                );
                            }
                        @endphp

                        <li>
                            @if (Auth::check())
                                <input type="radio" name="paymentMethod" id="paymentOption_{{ $gatewayValue }}"
                                    value="{{ $gatewayValue }}" class="d-none payment-radio"
                                    {{ $index === 0 ? 'checked' : '' }} required>
                            @else
                                <input type="radio" name="paymentMethod" id="paymentOption_{{ $gatewayValue }}"
                                    class="d-none payment-radio" data-bs-toggle="modal" data-bs-target="#loginModal"
                                    {{ $index === 0 ? 'checked' : '' }} required />
                            @endif

                            <label for="paymentOption_{{ $gatewayValue }}" onclick="paymentRadio()"
                                class="{{ $index === 0 ? 'active-payment' : '' }} payment-card border rounded p-3 d-flex align-items-center gap-2 cursor-pointer"
                                style="min-width: 200px;"
                                @unless (Auth::check()) onclick="showLoginModal()" @endunless>
                                @if ($gatewayImage)
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
        <div class="container text-start fw-bold">{{ __('messages.') }}</div>
    </div>
    <div class="container cvv-card py-3">

        <div class="row g-3">

            <div class="col-md-6">
                <label for="firstName" class="form-label fw-bold">{{ __('messages.First Name') }}</label>
                @if (auth()->check())
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
                <div class="input-group">
                    <input type="text" name="firstName" class="form-control " id="firstName"
                        value="{{ $first_name ?? '' }}" placeholder="Enter your first name">
                </div>
            </div>
            <div class="col-md-6">
                <label for="lastName" class="form-label fw-bold">{{ __('messages.Last Name') }}</label>
                <div class="input-group">
                    <input type="text" name="lastName" class="form-control" id="lastName"
                        value="{{ $last_name ?? '' }}" placeholder="Enter your last name">
                </div>
                <input type="hidden" name="user_id" value="{{ $user_id ?? '' }}" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label fw-bold">{{ __('messages.Email Address') }}</label>
                <div class="input-group">
                    <input type="email" name="email" class="form-control" id="email"
                        value="{{ $email ?? '' }}" placeholder="Enter your email address" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label fw-bold">{{ __('messages.Phone Number') }}</label>
                <div class="input-group">
                    <input type="tel" name="phonenumber" class="form-control" id="phone"
                        value="{{ $phone ?? '' }}" placeholder="Enter your phone number">
                </div>
            </div>
            <!-- First Row: 4 Inputs (Card Number, Expiration Month, Expiration Year, CVV) -->
            <div class="col-md-6">
                <label class="custom-label">{{ __('messages.city') }}</label>
                <div class="input-group">
                    <input type="text" name="city" class="form-control" placeholder="Enter your city">
                </div>
            </div>
            <div class="col-md-6">
                <label class="custom-label">{{ __('messages.Country') }}</label>
                <div class="input-group">
                    <input type="text" name="country" class="form-control" placeholder="Enter your country">
                </div>
            </div>
            <div class="col-md-6">
                <label class="custom-label">{{ __('messages.Postal Code') }}</label>
                <div class="input-group">
                    <input type="text" name="postal_code" class="form-control" placeholder="XXXX">
                </div>
            </div>

            <!-- Second Row: 4-4 Column Layout -->
            <div class="col-md-6">
                <label class="custom-label">{{ __('messages.Billing Address') }}</label>
                <div class="input-group">
                    <input type="text" name="billing_addresss" class="form-control"
                        placeholder="XXXXXXXXXXXXXXXXXXXX">
                </div>
            </div>
            <!-- reference number -->
            <input type="hidden" name="reference_number" value="{{ 'SR-' . rand(1000, 10000) }}">
            {{-- <div class="col-md-12">
                    @if (auth()->check())
                    <button type="submit" id="OrderSubmitBtn" class="btn-order-book btn-orange-clr mt-4"><i class="fa-solid fa-cart-shopping"></i> {{ __('messages.Process to checkout') }} </button>
                    @else
                    <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn-order-book btn-orange-clr mt-4"><i class="fa-solid fa-cart-shopping"></i> {{ __('messages.Process to checkout') }} </button>
                    @endif
                </div>             --}}
            <div class="col-md-12">
                <!-- Terms and Conditions Checkbox -->
                <div class="form-check mt-3">
                    <input class="form-check-input" type="checkbox" id="agreeTerms">
                    <label class="form-check-label" for="agreeTerms">
                        I agree to the <a href="{{ url('/terms&conditions') }}" style="text-decoration: none;">Terms
                            and Conditions</a>
                    </label>
                </div>

                <!-- Submit Button -->
                @if (auth()->check())
                    <button type="submit" id="OrderSubmitBtn" class="btn-order-book btn-orange-clr mt-4" disabled>
                        <i class="fa-solid fa-cart-shopping"></i> {{ __('messages.Process to checkout') }}
                    </button>
                @else
                    <button data-bs-toggle="modal" data-bs-target="#loginModal" id="OrderSubmitBtn"
                        class="btn-order-book btn-orange-clr mt-4" disabled>
                        <i class="fa-solid fa-cart-shopping"></i> {{ __('messages.Process to checkout') }}
                    </button>
                @endif
            </div>
        </div>
    </div>
</form>
