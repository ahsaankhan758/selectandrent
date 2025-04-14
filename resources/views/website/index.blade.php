@extends('website.layout.master')
@section('title')
Home Page | Select and Rent
@endsection

@section('content')
<div class="container text-center mt-5">
    <!-- Centered Heading -->
    <h5 class="display-6 fw-bold mb-3">Browse By Categories</h5>
    <!-- Bottom Paragraph -->
    <p class="lead text-muted">
        Rapidiously enable stand-alone e-markets whereas multifunctional <br> channels enterprise-wide meta-services.
    </p>
</div>

<!-- Bootstrap 5.3 Double Row Layout with Centered Cars and Sharp Box -->
<div class="container py-3">
    <div class="row g-3 justify-content-center">
        <!-- Cards - First Row -->
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/sedan-red.svg.png" alt="Sedan" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sedan</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/pickup-red.svg.png" alt="Pickup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Pickup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/compas.png" alt="Compact" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Compact</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/coup-red.svg.png" alt="Coup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Coup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/coup-red.svg.png" alt="Sport-Coupe" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sport-Coupe</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/family-mpv.png" alt="Family-MPV" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Family-MPV</h6>
            </div>
        </div>

        <!-- Cards - Second Row -->
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/sedan-red.svg.png" alt="Sedan" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sedan</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/pickup-red.svg.png" alt="Pickup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Pickup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/compas.png" alt="Compact" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Compact</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/coup-red.svg.png" alt="Coup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Coup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/coup-red.svg.png" alt="Sport-Coupe" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sport-Coupe</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}frontend-assets/icons/family-mpv.png" alt="Family-MPV" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Family-MPV</h6>
            </div>
        </div>
    </div>
</div>
<div class="container py-3">
<div class="container bg-white p-4 mt-3 border border-1 mb-3 rounded-3">
    <div class="row g-2 justify-content-center hyundai">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}frontend-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 1" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}frontend-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 2" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}frontend-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 3" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}frontend-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 4" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}frontend-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 5" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}frontend-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 6" width="80px">
        </div>
    </div>
</div>
</div>



<!-- chose section -->
<div class="container-fluid bg-white chose-bg-img mt-4">
    <!-- Mobile Section -->
    <div class="container mobile text-center py-5 d-block d-md-none">
        <h4 class="text-chose fw-bold">Why we choose us</h4>
        <h3 class="fw-bold">We Are Ensuring the Best <br>
            Customer Experience</h3>

        <div class="mt-4">
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector.png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">Affordable Pricing</h5>
                <p class="text-muted">Enjoy low daily rates without compromising on quality.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">Perfect for Short Trips</h5>
                <p class="text-muted">Ideal for city drives, quick errands, or budget travel.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">Fuel Efficiency</h5>
                <p class="text-muted">Save on gas with cars designed for maximum mileage.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">Wide Selection</h5>
                <p class="text-muted">Choose from compact, mid-sized, and family-friendly models.</p>
            </div>
        </div>
    </div>

    <!-- Desktop Section -->
    <div class="container Desktop  text-center py-5 d-none d-md-block">
        <h4 class="text-chose fw-bold">Why we choose us</h4>
        <h3 class="fw-bold">We Are Ensuring the Best <br>
            Customer Experience</h3>

        <div class="row align-items-center mt-4">
            <!-- Left Side (Icons Last) -->
            <div class="col-lg-4 text-end">
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">Most Flexible Payment</h5>
                        <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector.png" class="ms-3 img-fixed" alt="">
                </div>
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">Valuable Insights</h5>
                        <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="ms-3 img-fixed" alt="">
                </div>
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">Non-Stop Innovation</h5>
                        <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="ms-3 img-fixed" alt="">
                </div>
            </div>

            <!-- Center Image -->
            <div class="col-lg-4 text-center">
                <img src="{{asset('/')}}frontend-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
            </div>

            <!-- Right Side (Icons First) -->
            <div class="col-lg-4 text-start">
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">Online Car Appraisal</h5>
                        <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (4).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">Personalized Search</h5>
                        <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (5).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">Consumer–First Mentality</h5>
                        <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- tab -->
    <div class="container tab text-center py-5 d-none d-sm-block d-md-none">
        <h4 class="text-chose fw-bold">Why we choose us</h4>
        <h3 class="fw-bold">We Are Ensuring the Best <br>
            Customer Experience</h3>
    
        <div class="row align-items-center mt-4">
            <!-- Left Side (First Three Icons) -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">Online Car Appraisal</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="ml-3 img-fixed" alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">Personalized Search</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (4).png" class="ml-3 img-fixed" alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">Consumer-First Mentality</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (5).png" class="ml-3 img-fixed" alt="">
                </div>
            </div>
    
            <!-- Center Image -->
            <div class="col-md-4 text-center mb-4">
                <img src="{{asset('/')}}frontend-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
            </div>
    
            <!-- Right Side (Last Three Icons) -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector.png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">Most Flexible Payment</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">Valuable Insights</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">Non-Stop Innovation</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>

<section class="container py-4 mt-5">
    <div class="row align-items-center">
        <!-- Heading (Always on Left) -->
        <div class="col-12 col-md-6 text-center text-md-start">
            <h2 class="fw-bold">Choose The Car You Need</h2>
        </div>
        <!-- Button (Center on Mobile, End on Larger Screens) -->
        <div class="col-12 col-md-6 text-center text-md-end mt-3 mt-md-0">
            <button class="btn rounded-pill text-white btn-orange-clr"
                onclick="window.location.href='{{ url('/carlisting') }}'">
                View All 
                <img src="{{ asset('/') }}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
            </button>
        </div>
        
    </div>
</section>

<!-- cars view -->
<div class="container py-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach($cars as $car)
                <div class="swiper-slide mb-2">
                    <div class="custom-card2">
                    <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                        {{-- old path {{ Storage::url($car->thumbnail) }} --}}
                        <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img" alt="Car Image">
                    </a>
                        <div class="card-content">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class="car-price">${{ $car->rent }}/day</h6>
                                <button class="book-btn" onclick="window.location.href='#'">Book</button>
                            </div>
                            <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
        
                            <h5 class="text-muted mt-3">{{ $car->car_models->name ?? 'Unknown Model' }}</h5>
        
                            <div class="d-flex justify-content-between mt-4">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly.png" alt="Car" width="20px">
                                    {{ $car->weight }} kg
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-v.png" alt="Car" width="20px">
                                    {{ $car->mileage }} km
                                </div>
                            </div>
        
                            <div class="d-flex justify-content-between mt-2">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-u.png" alt="Car" width="20px">
                                    {{ $car->seats }} Seater
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-s.png" alt="Car" width="20px">
                                    {{ ucfirst($car->transmission) }}
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        </div>

        <!-- Swiper Navigation -->
        <div class="d-flex justify-content-center mt-3">
            <a class="carousel-control-prev-custom me-3" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a class="carousel-control-next-custom" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

 <!-- book now -->
 <section class="container-fluid join py-5">
    <div class="container d-flex align-items-center justify-content-between">
        <div class="col-lg-8 text-white text-center">
            <div class="container py-5">
                <div class="row align-items-center">
                    <!-- 80% Satisfaction Circle -->
                        <div class="col-md-4 text-center position-relative">
                            <div class="progress-circle position-relative">
                                <img src="{{asset('/')}}frontend-assets/icons/orange-icon.png" alt="Progress" class="progress-img">
                                <div class="progress-text position-absolute top-50 start-50 translate-middle percentage">
                                    <h2 class="mb-0 text-warning" id="progress-value">0%</h2>
                                    <p class="mb-0 text-white">Satisfaction</p>
                                </div>
                            </div>
                        </div> 
                    <!-- Partner Program Text -->
                    <div class="col-md-8">
                        <div class="d-flex align-items-end">
                            <img src="{{asset('/')}}frontend-assets/icons/Vector 7777.png" alt="Icon" class="icon1 me-2">
                            <h5 class="text-warning fw-bold text-uppercase mb-0">JOIN US</h5>
                        </div>                      
                        <h2 class="fw-bold text-start mt-2">Join our partner program</h2>
                        <p class="text-light text-start">Uniquely revolutionize manufactured products for interactive customer service.</p>
                    </div>
                    
                </div>
            
                <!-- Image Section -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <img src="{{asset('/')}}frontend-assets/assets\image 588254621.png" class="img-fluid rounded" alt="Yellow Car">
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('/')}}frontend-assets/assets\image 588254622.png" class="img-fluid rounded" alt="Red Car">
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-md-4 text-white text-start position-relative">
            <img src="{{asset('/')}}frontend-assets/assets\Rectangle 161124402.png" alt="Right Image" class="rounded book">
            <button  onclick="window.location.href='{{ url('/join-our-program') }}'" class="btn btn-orange-clr rounded-pill laptop-book-button  text-white d-flex align-items-center px-2 py-2 position-absolute bottom-0 end-0 mt-2 me-4">
                Book Now 
                <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-3" width="30" height="30" alt="">
            </button>
            <!-- <div class="text-end"> -->
                <button  onclick="window.location.href='{{ url('/join-our-program') }}'" class="btn btn-orange-clr rounded-pill tab-book-button text-white px-1 py-1">
                    Book Now 
                    <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="25" height="25" alt="">
                </button>
            <!-- </div> -->
        </div>
    </div>
</section>
<!-- MOBILE VIEW (Hidden on larger screens) -->
<section class="mobile-view d-block d-md-none text-white">
    <div class="container py-4">

        <!-- Row: 98% Satisfaction + Join Us -->
        <div class="d-flex align-items-center justify-content-between">
            <!-- Satisfaction Progress -->
            <div class="progress-circle text-center">
                <img src="{{asset('/')}}frontend-assets/icons/orange-icon.png" alt="Progress" class="progress-img">
                <div class="progress-text">
                    <h2 class="text-warning">98%</h2>
                    <p class="text-light">Satisfaction</p>
                </div>
            </div>

            <!-- Join Us Text -->
            <div class="text-start ps-3">
                <div class="icon-a">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector 7777.png" alt="Icon" class="icon1">
                    <h5 class="text-warning text-uppercase join-us">Join Us</h5>
                </div>
                <h2 class="program">Join our partner program</h2>
                <p class="join-text">Uniquely revolutionize manufactured products for interactive customer service.</p>
            </div>
        </div>
        <div class="text-end">
            <button onclick="window.location.href='{{ url('/join-our-program') }}'" class="btn btn-orange-clr rounded-pill text-white px-2 py-2">
                Book Now 
                <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="25" height="25" alt="">
            </button>
        </div>
        <div class="mt-3">
            <img src="{{asset('/')}}frontend-assets/assets/mobile.png" class="img-fluid rounded" alt="People with Car">
        </div>
        <!-- Images -->
        <div class="row mt-3">
            <div class="col-6">
                <img src="{{asset('/')}}frontend-assets/assets\image 588254621.png" class="img-fluid rounded" alt="Yellow Car">
            </div>
            <div class="col-6">
                <img src="{{asset('/')}}frontend-assets/assets\image 588254622.png" class="img-fluid rounded" alt="Red Car">
            </div>
        </div>
    </div>
</section>

<!-- Accordion Section -->
<section class="container-fluid bg-white py-5">
    <div class="container">
        <div class="row">
            <!-- Left Side Text -->
            <div class="col-md-6 ml-1 accordion-text">
                <h2 class="fw-bold">Any questions?</h2>
                <h2 class="fw-bold">We got you.</h2>
                <p class="text-muted questions">Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company.</p>
            </div>
            <!-- Right Side Accordion -->
            <div class="col-md-6">
                <div class="accordion" id="faqAccordion">
                    
                    <!-- First Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Frequently asked questions
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company. You’ll also receive guidance from our business advising team, who will help you with all aspects of building your business credit.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Frequently asked questions
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company. You’ll also receive guidance from our business advising team, who will help you with all aspects of building your business credit.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Third Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Frequently asked questions
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company. You’ll also receive guidance from our business advising team, who will help you with all aspects of building your business credit.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
   document.addEventListener("DOMContentLoaded", function () {
    var swiper = new Swiper(".mySwiper", {
        loop: true,
        slidesPerView: 3,
        spaceBetween: 10,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".carousel-control-next-custom",
            prevEl: ".carousel-control-prev-custom",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            320: {
                slidesPerView: 1
            },
            768: { 
                slidesPerView: 3
            },
            1024: { 
                slidesPerView: 4
            }
        }
    });
});
</script>
@endsection