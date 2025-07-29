@extends('website.layout.master')
@section('title')
    {{ __('messages.contact_us') }} 
@endsection

@section('content')
    <!-- contact js -->
    <script src="{{ asset('/frontend-assets/assets/Js/contact.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    <style>
        select.form-control:invalid {
            color: gray;
        }

        select.form-control option {
            color: grey;
        }

        .masked-text {
            font-size: 64px;
            font-weight: 700;
            text-transform: uppercase;
            background: url('{{ asset('frontend-assets/icons/getintouch.png') }}') no-repeat;
            background-size: cover;
            background-position: -106px center;
            -webkit-background-clip: text;
            background-clip: text;
            -moz-background-clip: text;
            color: transparent;
            display: inline-block;
        }
    </style>
    <section class="custom-contact-section py-4">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Side: Contact Info -->
                <div class="col-lg-5 col-md-5 custom-contact-info">
                    <h3 class="get-desktop masked-text">{{ __('messages.get_in') }} <br> {{ __('messages.touch') }}</h3>
                    <h2 class="get-mobile  text-center masked-text ">{{ __('messages.get_in_touch') }}</h2>

                    <ul class="list-unstyled custom-contact-list">
                        <li>
                            <img src="{{ asset('/') }}frontend-assets/icons/phone.png" alt="Phone Icon">
                            <div>
                                <h6>{{ __('messages.phone') }}</h6>
                                <div class="fw-bold">0300-XXXXX90</div>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('/') }}frontend-assets/icons/mail.png" alt="Email Icon">
                            <div>
                                <h6>{{ __('messages.email') }}</h6>
                                <div class="fw-bold">hello@sparkodic.com</div>
                            </div>
                        </li>
                        <li>
                            <img src="{{ asset('/') }}frontend-assets/icons/home.png" alt="Home Icon">
                            <div>
                                <h6>{{ __('messages.address') }}</h6>
                                <div class="fw-bold">United Kingdom</div>
                            </div>
                        </li>
                    </ul>

                    <p class="custom-follow-us">{{ __('messages.follow_us') }}</p>
                    <div class="custom-social-icons">
                        <a href="#"><img src="{{ asset('/') }}frontend-assets/icons/socials(3).png"
                                alt=""></a>
                        <a href="#"><img src="{{ asset('/') }}frontend-assets/icons/socials.png"
                                alt=""></a>
                        <a href="#"><img src="{{ asset('/') }}frontend-assets/icons/socials(1).png"
                                alt=""></a>
                        <a href="#"><img src="{{ asset('/') }}frontend-assets/icons/socials(2).png"
                                alt=""></a>
                    </div>
                </div>
                <!-- Right Side: Contact Form -->
                <div class="col-lg-7 col-md-7">
                    <div class="custom-contact-form mt-2">
                        <h3>{{ __('messages.contact_form') }}</h3>
                        <p>{{ __('messages.enter_your_detail') }}.
                        </p>
                        @if (session('success'))
                            <div class="alert alert-success mt-3">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" id="sendEmailContact" action="{{ route('website.contact') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-3" name="first_name"
                                        placeholder="{{ __('messages.first_name') }}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control mb-3" name="last_name"
                                        placeholder="{{ __('messages.last_name') }}">
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <select class="form-control" name="subject" required>
                                    <option value="" disabled selected hidden>{{ __('messages.query_type') }}</option>
                                    <option value="General">General</option>
                                    <option value="Refund">Refund</option>
                                    <option value="Complaint">Complaint</option>
                                    <option value="Issues about company">Issues about company</option>
                                    <option value="Hire me">Hire me</option>
                                </select>
                            </div>

                            <input type="email" class="form-control mb-3" name="email"
                                placeholder="{{ __('messages.email') }}">
                            <input type="tel" class="form-control mb-3" name="phone"
                                placeholder="{{ __('messages.phone') }}">
                            <textarea class="form-control mb-3" name="message" placeholder="{{ __('messages.messages') }}" rows="4"></textarea>
                            <div class="text-end">
                                <button id="submitBtn" class="btn btn-orange-clr rounded-pill text-white px-4 py-2">
                                    {{ __('messages.submit_now') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact end -->
    <!-- contact map -->
    <div class="container py-4 mb-4">
        <div class="map-container">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0256397597124!2d-122.43129778468144!3d37.75970377975939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e21dbf32c1d%3A0x1f9c0e9f5e4bcb60!2sNoe%20Valley%2C%20San%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1638461972851!5m2!1sen!2sus"
                allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>
    <!-- end contact map -->
@endsection
