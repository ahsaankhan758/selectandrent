@extends('website.layout.master')
@section('title')
    {{ __('messages.vehicle_booking') }} 
@endsection

@section('content')
    <!-- load ajax for remove cart -->
    <script src="{{ asset('/frontend-assets/assets/Js/getDifferenceDays.js') }}"></script>
    <script src="{{ asset('/frontend-assets/assets/Js/cartRmoveItems.js') }}"></script>
    <script src="{{ asset('/frontend-assets/assets/Js/bookings.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    <script src="{{ asset('/frontend-assets/assets/Js/order.js') }}"></script>

    <div class="container py-2">
        <div class="progress-container">
            <div class="progress-line"></div>
            <div class="progress-bar-filled update-line-progress-bar"></div>

            <!-- Step 1 -->
            <div class="progress-step active">
                <span class="step-number">1</span>
                <span class="step-text">{{ __('messages.booking') }}</span>
            </div>

            <!-- Step 2 -->
            <div class="progress-step progress_step_active">
                <span class="step-number">2</span>
                <span class="step-text">{{ __('messages.confirmation') }}</span>
            </div>

            <!-- Step 3 -->
            <div class="progress-step">
                <span class="step-number">3</span>
                <span class="step-text">{{ __('messages.checkout') }}</span>
            </div>
        </div>
        @if (session('success'))
            <div id="div1" class="alert alert-success text-center mt-3 text-capitalize">{{ session('success') }}</div>
        @endif
        @if (session('message'))
            <div id="div1" class="alert alert-danger text-center mt-3 text-capitalize">{{ session('message') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops! There were some problems with your input:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container booking-render-page">
        @include('website.bookings.include.car-bookings')
    </div>

@endsection
