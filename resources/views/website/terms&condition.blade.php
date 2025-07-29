@extends('website.layout.master')

@section('title')
    {{ __('messages.terms') }}
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-2 d-none d-lg-block"></div>

            <div class="col-lg-8 col-12">
                <h2 class="mb-4">{{ __('messages.terms_title') }}</h2>

                <p>{{ __('messages.terms_intro1') }}</p>
                <p>{{ __('messages.terms_intro2') }}</p>

                <h4>{{ __('messages.terms_eligibility_title') }}</h4>
                <p>{{ __('messages.terms_eligibility_desc') }}</p>

                <h4>{{ __('messages.terms_info_title') }}</h4>
                <p>{{ __('messages.terms_info_desc') }}</p>

                <h4>{{ __('messages.terms_vehicle_condition_title') }}</h4>
                <p>{{ __('messages.terms_vehicle_condition_desc') }}</p>

                <h4>{{ __('messages.terms_deposit_title') }}</h4>
                <p>{{ __('messages.terms_deposit_desc') }}</p>

                <h4>{{ __('messages.terms_fuel_title') }}</h4>
                <p>{{ __('messages.terms_fuel_desc') }}</p>

                <h4>{{ __('messages.terms_cancellation_title') }}</h4>
                <p>{{ __('messages.terms_cancellation_desc') }}</p>

                <h4>{{ __('messages.terms_usage_title') }}</h4>
                <p>{{ __('messages.terms_usage_desc') }}</p>

                <h4>{{ __('messages.terms_late_return_title') }}</h4>
                <p>{{ __('messages.terms_late_return_desc') }}</p>

                <h4>{{ __('messages.terms_damage_title') }}</h4>
                <p>{{ __('messages.terms_damage_desc') }}</p>

                <h4>{{ __('messages.terms_liability_title') }}</h4>
                <p>{{ __('messages.terms_liability_desc') }}</p>

            </div>

            <div class="col-lg-2 d-none d-lg-block"></div>
        </div>
    </div>
@endsection
