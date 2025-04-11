@extends('website.layout.master')
@section('title')
Car-Register | Select and Rent
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
    .static-width{
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
   
    <div class="container">
        <div class="text-center mb-4 mt-4">
            <img src="{{asset('/')}}frontend-assets/icons/select-and-rent-logo-3.png" alt="Logo" width="100">
            <h2 class="fw-bold mb-5">Register With Car Rental</h2>
        </div>
        <div class="row">
            <div class="col-md-6 mb-2">
                <form action="{{ route('website.register') }}" method="POST">
                    @csrf
                    {{-- user detail --}}
                    <input type="text" class="form-control mb-3 form-control-border static-width" placeholder="Full Name" name="name">
                    <input type="email" class="form-control mb-3 form-control-border static-width" placeholder="Email Address" name="email">
                    <input type="password" class="form-control mb-3 form-control-border static-width" placeholder="Password" name="password">
                    {{-- company detail --}}
                    <input type="text" class="form-control mb-3 form-control-border static-width" placeholder="Company Name" name="companyName">
                    <input type="email" class="form-control mb-3 form-control-border static-width" placeholder="Company Email" name="companyEmail">
                    <input type="text" class="form-control mb-3 form-control-border static-width" placeholder="Company Phone" name="phone">
                    <input type="text" class="form-control mb-3 form-control-border static-width" placeholder="Company Website" name="website">
                    
                    <button class="btn btn-orange-clr rounded-pill text-white">
                        Submit Now
                    </button>
                </form>
                
            </div>
            <div class="col-md-6">
                <div class="contact-info">
                    <h3>Contact Info</h3>
            
                    <div class="info-item">
                        <img src="{{asset('/')}}frontend-assets/icons/phone.png" alt="Phone Icon">
                        <div class="info-text">
                            <span>Phone</span>
                            <p>+92 324 4469929</p>
                        </div>
                    </div>
            
                    <div class="info-item">
                        <img src="{{asset('/')}}frontend-assets/icons/mail.png" alt="Email Icon">
                        <div class="info-text">
                            <span>Email</span>
                            <p>hello@sparkodic.com</p>
                        </div>
                    </div>
            
                    <div class="info-item mb-4">
                        <img src="{{asset('/')}}frontend-assets/icons/home.png" alt="Home Icon">
                        <div class="info-text">
                            <span>Address</span>
                            <p>Kington, United Kingdom</p>
                        </div>
                    </div>
            
                </div>
                <div class="mb-4">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.0256397597124!2d-122.43129778468144!3d37.75970377975939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e21dbf32c1d%3A0x1f9c0e9f5e4bcb60!2sNoe%20Valley%2C%20San%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1638461972851!5m2!1sen!2sus" style="border-radius: 5px;" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
 @endsection