@extends('website.layout.master')
@section('title')
{{ __('messages.Car Booking ') }}| {{ __('messages.Select and Rent') }}
@endsection

@section('content')
<div class="container py-2">
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
<div class="container cvv-card py-3">
    <form>
        <div class="row g-3">
            <div class="col-md-3">
                <label for="firstName" class="form-label fw-bold">{{ __('messages.First Name') }}</label>
                <input type="text" class="form-control form-control-border" id="firstName" placeholder="Enter your first name">
            </div>
            <div class="col-md-3">
                <label for="lastName" class="form-label fw-bold">{{ __('messages.Last Name') }}</label>
                <input type="text" class="form-control form-control-border" id="lastName" placeholder="Enter your last name">
            </div>
            <div class="col-md-3">
                <label for="email" class="form-label fw-bold">{{ __('messages.Email Address') }}</label>
                <input type="email" class="form-control form-control-border" id="email" placeholder="Enter your email address">
            </div>
            <div class="col-md-3">
                <label for="phone" class="form-label fw-bold">{{ __('messages.Phone Number') }}</label>
                <input type="tel" class="form-control form-control-border" id="phone" placeholder="Enter your phone number">
            </div>
        </div>
    </form>
</div>
<!-- end form -->
<!-- heading -->
<div class="container-fluid heading-background py-3 mb-3">
    <div class="container text-start fw-bold">{{ __('messages.Payment Information') }}</div>
</div>
    <div class="container cvv-card py-3 mb-3">
        <!-- Card Type Section -->
        <div class="mb-3">
            <label class="custom-label">{{ __('messages.CARD TYPE') }}</label>
            <div class="d-flex custom-card-icons">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
                <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa">
            </div>
        </div>
    
        <!-- Payment Form -->
        <form>
            <div class="row g-3">
                <!-- First Row: 4 Inputs (Card Number, Expiration Month, Expiration Year, CVV) -->
                <div class="col-md-4">
                    <label class="custom-label">{{ __('messages.Card Number') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="XXXXXXXXXXXXXXXXXXXX">
                </div>
                <div class="col-md-2">
                    <label class="custom-label"></label>
                    <select class="form-control form-control-border">
                        <option>01</option>
                        <option>02</option>
                        <option>03</option>
                        <option>04</option>
                        <option>05</option>
                        <option>06</option>
                        <option>07</option>
                        <option>08</option>
                        <option>09</option>
                        <option>10</option>
                        <option>11</option>
                        <option>12</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="custom-label">{{ __('messages.Expiration Year') }}</label>
                    <select class="form-control form-control-border">
                        <option>2024</option>
                        <option>2025</option>
                        <option>2026</option>
                        <option>2027</option>
                        <option>2028</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="custom-label">CVV</label>
                    <input type="text" class="form-control form-control-border" placeholder="XXXX">
                </div>
    
                <!-- Second Row: 4-4 Column Layout -->
                <div class="col-md-4">
                    <label class="custom-label">{{ __('messages.Name on Card') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="XXXXXXXXXXXXXXXXXXXX">
                </div>
                <div class="col-md-4">
                    <label class="custom-label">{{ __('messages.') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="XXXXXXXXXXXXXXXXXXXX">
                </div>
            </div>
        </form>
    </div>
<!-- end heading -->
<!-- billing -->
<div class="container-fluid heading-background py-3 mb-3">
    <div class="container text-start fw-bold">{{ __('messages.Billing Address') }}</div>
</div>
    <div class="container cvv-card py-3 mb-3">
        <!-- Payment Form -->
        <form>
            <div class="row g-3">
                <!-- First Row: 4 Inputs (Card Number, Expiration Month, Expiration Year, CVV) -->
                <div class="col-md-4">
                    <label class="custom-label">{{ __('messages.city') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="Enter your city">
                </div>
                <div class="col-md-4">
                    <label class="custom-label">{{ __('messages.Country') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="Enter your country">
                </div>
                <div class="col-md-2">
                    <label class="custom-label">{{ __('messages.Postal Code') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="XXXX">
                </div>
    
                <!-- Second Row: 4-4 Column Layout -->
                <div class="col-md-4">
                    <label class="custom-label">{{ __('messages.Billing Address') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="XXXXXXXXXXXXXXXXXXXX">
                </div>
                <div class="col-md-4">
                    <label class="custom-label">{{ __('messages.Billing Address 2 (optional)') }}</label>
                    <input type="text" class="form-control form-control-border" placeholder="XXXXXXXXXXXXXXXXXXXX">
                </div>
                <div class="container row text-end mt-2">
                    <div class="col-md-10">
                        <button class="btn-order-book btn-orange-clr btn-sm"><i class="fa-solid fa-cart-shopping"></i>{{ __('messages.Process to checkout') }} </button>
                    </div>
                </div>                
            </div>
        </form>
    </div>

@endsection