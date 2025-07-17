@extends('website.layout.master')
@section('title')
    {{ __('messages.register') }} 
@endsection
<style>
    .form-control {
        border-radius: 10px;
        height: 50px;
    }

    textarea.form-control {
        height: 100px;
    }

    .contact-info i {
        color: #FFA843;
        font-size: 24px;
        margin-right: 10px;
    }

    .static-width {
        width: 95% !important;
    }

    .contact-info h3 {
        font-weight: bold;
        margin-bottom: 15px;
    }

    .info-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 15px;
    }

    .info-item img {
        width: 30px;
        height: auto;
    }

    .info-text {
        display: flex;
        flex-direction: column;
    }

    .info-text span {
        font-size: 14px;
        color: #666;
    }

    .info-text p {
        margin: 0;
        font-size: 16px;
        color: #000;
    }
</style>
@section('content')
    <script>
        window.registerRoute = "{{ route('website.register') }}";
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    <script src="{{ asset('/frontend-assets/assets/Js/companyregister.js') }}"></script>
    <div class="container">
        <div class="text-center mb-4 mt-4">
            <img src="{{ asset('/') }}frontend-assets/icons/select-and-rent-logo-3.png" alt="Logo" width="100">
            <h2 class="fw-bold mb-5">{{ __('messages.register_with_select_and_rent') }}</h2>
        </div>

        <div class="row">
            <div class="col-md-6 mb-2">
                <form id="registerForm" action="{{ route('website.register') }}" method="POST">
                    @csrf
                    {{-- user detail --}}
                    <input type="text" class="form-control mb-3 form-control-border static-width"
                        placeholder="{{ __('messages.full_name') }}" name="name">
                    <input type="email" class="form-control mb-3 form-control-border static-width"
                        placeholder="{{ __('messages.email_address') }}" name="email">
                    <input type="password" class="form-control mb-3 form-control-border static-width"
                        placeholder="{{ __('messages.password') }}" name="password">
                    {{-- company detail --}}
                    <input type="text" class="form-control mb-3 form-control-border static-width"
                        placeholder="{{ __('messages.company_name') }}" name="companyName">
                    <input type="email" class="form-control mb-3 form-control-border static-width"
                        placeholder="{{ __('messages.company_email') }}" name="companyEmail">
                    <input type="text" class="form-control mb-3 form-control-border static-width"
                        placeholder="{{ __('messages.company_phone') }}" name="phone">
                    <input type="text" class="form-control mb-3 form-control-border static-width"
                        placeholder="{{ __('messages.company_website') }}" name="website">
                    <select class="form-control mb-3 p-3 form-control-border static-width" name="country_id" required>
                        <option value="" disabled selected>{{ __('messages.select_country') }}</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-orange-clr rounded-pill text-white">
                        {{ __('messages.submit') }}
                    </button>
                </form>
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <h3>{{ __('messages.contact_info') }}</h3>

                    <div class="info-item">
                        <img src="{{ asset('/') }}frontend-assets/icons/phone.png" alt="Phone Icon">
                        <div class="info-text">
                            <span>{{ __('messages.phone') }}</span>
                            <p>+92 324 4469929</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <img src="{{ asset('/') }}frontend-assets/icons/mail.png" alt="Email Icon">
                        <div class="info-text">
                            <span>{{ __('messages.email') }}</span>
                            <p>hello@sparkodic.com</p>
                        </div>
                    </div>

                    <div class="info-item mb-4">
                        <img src="{{ asset('/') }}frontend-assets/icons/home.png" alt="Home Icon">
                        <div class="info-text">
                            <span>{{ __('messages.address') }}</span>
                            <p>Kington, United Kingdom</p>
                        </div>
                    </div>

                </div>
                <div class="mb-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0256397597124!2d-122.43129778468144!3d37.75970377975939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e21dbf32c1d%3A0x1f9c0e9f5e4bcb60!2sNoe%20Valley%2C%20San%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1638461972851!5m2!1sen!2sus"
                        style="border-radius: 5px;" width="100%" height="250" style="border:0;" allowfullscreen=""
                        loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection
