@extends('website.layout.master')
@section('title')
About-us | Select and Rent
@endsection

@section('content')
<style>
    .masked-text {
     font-size: 64px;
     font-weight: 700;
     text-transform: uppercase;

     background: url('/company-assets/icons/getintouch.png') no-repeat;
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
                <h3 class="get-desktop masked-text">Get In <br> Touch</h3>
                <h2 class="get-mobile  text-center masked-text ">Get In Touch</h2>
                
                <ul class="list-unstyled custom-contact-list">
                    <li>
                        <img src="{{asset('/')}}company-assets/icons/phone.png" alt="Phone Icon">
                        <div>
                            <h6>Phone</h6>
                            <div class="fw-bold">+92 3244469929</div>
                        </div>
                    </li>
                    <li>
                        <img src="{{asset('/')}}company-assets/icons/mail.png" alt="Email Icon">
                        <div>
                            <h6>Email</h6>
                            <div class="fw-bold">hello@sparkodic.com</div>
                        </div>
                    </li>
                    <li>
                        <img src="{{asset('/')}}company-assets/icons/home.png" alt="Home Icon">
                        <div>
                            <h6>Address</h6>
                            <div class="fw-bold">United Kingdom</div>
                        </div>
                    </li>
                </ul>

                <p class="custom-follow-us">Follow Us</p>
                <div class="custom-social-icons">
                    <a href="#"><img src="{{asset('/')}}company-assets/icons/socials(3).png" alt=""></a>
                    <a href="#"><img src="{{asset('/')}}company-assets/icons/socials.png" alt=""></a>
                    <a href="#"><img src="{{asset('/')}}company-assets/icons/socials(1).png" alt=""></a>
                    <a href="#"><img src="{{asset('/')}}company-assets/icons/socials(2).png" alt=""></a>
                </div>
            </div>
            <!-- Right Side: Contact Form -->
            <div class="col-lg-7 col-md-7">
                <div class="custom-contact-form mt-2">
                    <h3>Contact Form</h3>
                    <p>Enter your details. And you can feel free to contact us for any kind of information.</p>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-3" placeholder="First Name">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control mb-3" placeholder="Last Name">
                            </div>
                        </div>
                        <input type="email" class="form-control mb-3" placeholder="Email">
                        <input type="tel" class="form-control mb-3" placeholder="Phone">
                        <textarea class="form-control mb-3" placeholder="Messages" rows="4"></textarea>
                        <div class="text-end">
                            <button class="btn btn-orange-clr rounded-pill text-white px-4 py-2">
                                Submit Now
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
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>
</div>
<!-- end contact map -->
@endsection