<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
@extends('website.layout.master')
@section('title')
{{ __('messages.Home Page') }} | {{ __('messages.Select and Rent') }}
@endsection

@section('content')
<div class="container text-center mt-5">
    <!-- Centered Heading -->
    <h5 class="display-6 fw-bold mb-3">{{ __('messages.Browse By Categories') }}</h5>
    <!-- Bottom Paragraph -->
    <p class="lead text-muted">
        {{ __('messages.Rapidiously enable stand-alone e-markets whereas multifunctional') }} <br>{{ __('messages.channels enterprise-wide meta-services') }} .
    </p>
</div>

<!-- Bootstrap 5.3 Double Row Layout with Centered Cars and Sharp Box -->
<div class="container py-3">
    <div class="row g-3 justify-content-center">
        <!-- Cards - First Row -->
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/sedan-red.svg.png" alt="Sedan" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sedan</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/pickup-red.svg.png" alt="Pickup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Pickup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/compas.png" alt="Compact" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Compact</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/coup-red.svg.png" alt="Coup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Coup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/coup-red.svg.png" alt="Sport-Coupe" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sport-Coupe</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/family-mpv.png" alt="Family-MPV" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Family-MPV</h6>
            </div>
        </div>

        <!-- Cards - Second Row -->
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/sedan-red.svg.png" alt="Sedan" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sedan</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/pickup-red.svg.png" alt="Pickup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Pickup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/compas.png" alt="Compact" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Compact</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/coup-red.svg.png" alt="Coup" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Coup</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/coup-red.svg.png" alt="Sport-Coupe" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Sport-Coupe</h6>
            </div>
        </div>
        <div class="col-md-2 col-sm-4 col-6">
            <div class="card text-center p-3 border-0 shadow-sm">
                <img src="{{asset('/')}}company-assets/icons/family-mpv.png" alt="Family-MPV" class="img-fluid mx-auto d-block" width="75px">
                <h6 class="mt-2">Family-MPV</h6>
            </div>
        </div>
    </div>
</div>
<div class="container py-3">
<div class="container bg-white p-4 mt-3 border border-1 mb-3 rounded-3">
    <div class="row g-2 justify-content-center hyundai">
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}company-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 1" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}company-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 2" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}company-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 3" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}company-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 4" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}company-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 5" width="80px">
        </div>
        <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
            <img src="{{asset('/')}}company-assets/icons/ced58c1352d3f320715c25ebf43a6e80.png" class="img-fluid hyundai-img mx-auto" alt="Image 6" width="80px">
        </div>
    </div>
</div>
</div>



<!-- chose section -->
<div class="container-fluid bg-white chose-bg-img mt-4">
    <!-- Mobile Section -->
    <div class="container mobile text-center py-5 d-block d-md-none">
        <h4 class="text-chose fw-bold"{{ __('messages.Why we choose us') }}></h4>
        <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }} <br>
            {{ __('messages.Customer Experience') }}</h3>

        <div class="mt-4">
            <div class="mb-4">
                <img src="{{asset('/')}}company-assets/icons/Vector.png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Affordable Pricing') }}</h5>
                <p class="text-muted">{{ __('messages.Enjoy low daily rates without compromising on quality') }}.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}company-assets/icons/Vector (1).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Perfect for Short Trips') }}</h5>
                <p class="text-muted">{{ __('messages.Ideal for city drives, quick errands, or budget travel') }}.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}company-assets/icons/Vector (2).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Fuel Efficiency') }}</h5>
                <p class="text-muted">{{ __('messages.Save on gas with cars designed for maximum mileage') }}.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}company-assets/icons/Vector (3).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Wide Selection') }}</h5>
                <p class="text-muted">{{ __('messages.Choose from compact, mid-sized, and family-friendly models') }}.</p>
            </div>
        </div>
    </div>

    <!-- Desktop Section -->
    <div class="container Desktop  text-center py-5 d-none d-md-block">
        <h4 class="text-chose fw-bold">{{ __('messages.Why we choose us') }}</h4>
        <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }} <br>
            {{ __('messages.Customer Experience') }}</h3>

        <div class="row align-items-center mt-4">
            <!-- Left Side (Icons Last) -->
            <div class="col-lg-4 text-end">
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Most Flexible Payment') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}company-assets/icons/Vector.png" class="ms-3 img-fixed" alt="">
                </div>
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Valuable Insights') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}company-assets/icons/Vector (1).png" class="ms-3 img-fixed" alt="">
                </div>
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Non-Stop Innovation') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}company-assets/icons/Vector (2).png" class="ms-3 img-fixed" alt="">
                </div>
            </div>

            <!-- Center Image -->
            <div class="col-lg-4 text-center">
                <img src="{{asset('/')}}company-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
            </div>

            <!-- Right Side (Icons First) -->
            <div class="col-lg-4 text-start">
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}company-assets/icons/Vector (3).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Online Car Appraisal') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}company-assets/icons/Vector (4).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Personalized Search') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}company-assets/icons/Vector (5).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Consumer–First Mentality') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->
    <!-- tab -->
    <div class="container tab text-center py-5 d-none d-sm-block d-md-none">
        <h4 class="text-chose fw-bold">{{ __('messages.Why we choose us') }}</h4>
        <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }} <br>
            {{ __('messages.Customer Experience') }}</h3>
    
        <div class="row align-items-center mt-4">
            <!-- Left Side (First Three Icons) -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">{{ __('messages.Online Car Appraisal') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}company-assets/icons/Vector (3).png" class="ml-3 img-fixed" alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">{{ __('messages.Personalized Search') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}company-assets/icons/Vector (4).png" class="ml-3 img-fixed" alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">{{ __('messages.Consumer-First Mentality') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}company-assets/icons/Vector (5).png" class="ml-3 img-fixed" alt="">
                </div>
            </div>
    
            <!-- Center Image -->
            <div class="col-md-4 text-center mb-4">
                <img src="{{asset('/')}}company-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
            </div>
    
            <!-- Right Side (Last Three Icons) -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}company-assets/icons/Vector.png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">{{ __('messages.Most Flexible Payment') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}company-assets/icons/Vector (1).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">{{ __('messages.Valuable Insights') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}company-assets/icons/Vector (2).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">{{ __('messages.Non-Stop Innovation') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
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
            <h2 class="fw-bold">{{ __('messages.Choose The Car You Need') }}</h2>
        </div>
        <!-- Button (Center on Mobile, End on Larger Screens) -->
        <div class="col-12 col-md-6 text-center text-md-end mt-3 mt-md-0">
            <button class="btn rounded-pill text-white btn-orange-clr"
                onclick="window.location.href='{{ url('/carlisting') }}'">
                {{ __('messages.View All') }}
                <img src="{{ asset('/') }}company-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
            </button>
        </div>
        
    </div>
</section>

<!-- cars view -->
<div class="container py-4">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            @foreach($cars as $car)
                <div class="swiper-slide">
                    <div class="custom-card2">
                        <img src="{{ Storage::url($car->thumbnail) }}" class="custom-card-img" alt="Car Image">
        
                        <div class="card-content">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class="car-price">${{ $car->rent }}/{{ __('messages.') }}day</h6>
                                <button class="book-btn" onclick="window.location.href='{{ url('/cardetail/' . $car->id) }}'">{{ __('messages.Book') }}</button>
                            </div>
        
                            <h5 class="text-muted mt-3">{{ $car->car_models->name ?? 'Unknown Model' }}</h5>
        
                            <div class="d-flex justify-content-between mt-4">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}company-assets/icons/Iconly.png" alt="Car" width="20px">
                                    {{ $car->weight }} {{ __('messages.kg') }}
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}company-assets/icons/Iconly-v.png" alt="Car" width="20px">
                                    {{ $car->mileage }} {{ __('messages.km') }}
                                </div>
                            </div>
        
                            <div class="d-flex justify-content-between mt-2">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}company-assets/icons/Iconly-u.png" alt="Car" width="20px">
                                    {{ $car->seats }} {{ __('messages.Seater') }}
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}company-assets/icons/Iconly-s.png" alt="Car" width="20px">
                                    {{ ucfirst($car->transmission) }}
                                </div>
                            </div>

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
                                <img src="{{asset('/')}}company-assets/icons/orange-icon.png" alt="Progress" class="progress-img">
                                <div class="progress-text position-absolute top-50 start-50 translate-middle percentage">
                                    <h2 class="mb-0 text-warning" id="progress-value">0%</h2>
                                    <p class="mb-0 text-white">{{ __('messages.Satisfaction') }}</p>
                                </div>
                            </div>
                        </div> 
                    <!-- Partner Program Text -->
                    <div class="col-md-8">
                        <div class="d-flex align-items-end">
                            <img src="{{asset('/')}}company-assets/icons/Vector 7777.png" alt="Icon" class="icon1 me-2">
                            <h5 class="text-warning fw-bold text-uppercase mb-0">{{ __('messages.JOIN US') }}</h5>
                        </div>                      
                        <h2 class="fw-bold text-start mt-2">{{ __('messages.Join our partner program') }}</h2>
                        <p class="text-light text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    
                </div>
            
                <!-- Image Section -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <img src="{{asset('/')}}company-assets/assets\image 588254621.png" class="img-fluid rounded" alt="Yellow Car">
                    </div>
                    <div class="col-md-6">
                        <img src="{{asset('/')}}company-assets/assets\image 588254622.png" class="img-fluid rounded" alt="Red Car">
                    </div>
                </div>
            </div>            
        </div>
        <div class="col-md-4 text-white text-start position-relative">
            <img src="{{asset('/')}}company-assets/assets\Rectangle 161124402.png" alt="Right Image" class="rounded book">
            <button class="btn btn-orange-clr rounded-pill laptop-book-button  text-white d-flex align-items-center px-2 py-2 position-absolute bottom-0 end-0 mt-2 me-4">
                {{ __('messages.Book Now') }} 
                <img src="{{asset('/')}}company-assets/icons/Frame-1707482121.png" class="ms-3" width="30" height="30" alt="">
            </button>
            <!-- <div class="text-end"> -->
                <button class="btn btn-orange-clr rounded-pill tab-book-button text-white px-1 py-1">
                    {{ __('messages.Book Now') }}
                    <img src="{{asset('/')}}company-assets/icons/Frame-1707482121.png" class="ms-2" width="25" height="25" alt="">
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
                <img src="{{asset('/')}}company-assets/icons/orange-icon.png" alt="Progress" class="progress-img">
                <div class="progress-text">
                    <h2 class="text-warning">98%</h2>
                    <p class="text-light">{{ __('messages.Satisfaction') }}</p>
                </div>
            </div>

            <!-- Join Us Text -->
            <div class="text-start ps-3">
                <div class="icon-a">
                    <img src="{{asset('/')}}company-assets/icons/Vector 7777.png" alt="Icon" class="icon1">
                    <h5 class="text-warning text-uppercase join-us">{{ __('messages.') }}Join Us</h5>
                </div>
                <h2 class="program">{{ __('messages.Join our partner program') }}</h2>
                <p class="join-text">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
            </div>
        </div>
        <div class="text-end">
            <button class="btn btn-orange-clr rounded-pill text-white px-2 py-2">
                {{ __('messages.Book Now') }} 
                <img src="{{asset('/')}}company-assets/icons/Frame-1707482121.png" class="ms-2" width="25" height="25" alt="">
            </button>
        </div>
        <div class="mt-3">
            <img src="{{asset('/')}}company-assets/assets/mobile.png" class="img-fluid rounded" alt="People with Car">
        </div>
        <!-- Images -->
        <div class="row mt-3">
            <div class="col-6">
                <img src="{{asset('/')}}company-assets/assets\image 588254621.png" class="img-fluid rounded" alt="Yellow Car">
            </div>
            <div class="col-6">
                <img src="{{asset('/')}}company-assets/assets\image 588254622.png" class="img-fluid rounded" alt="Red Car">
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
                <h2 class="fw-bold">{{ __('messages.Any questions') }}?</h2>
                <h2 class="fw-bold">{{ __('messages.We got you') }}.</h2>
                <p class="text-muted questions">{{ __('messages.Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company') }}.</p>
            </div>
            <!-- Right Side Accordion -->
            <div class="col-md-6">
                <div class="accordion" id="faqAccordion">
                    
                    <!-- First Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ __('messages.Frequently asked questions') }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company. You’ll also receive guidance from our business advising team, who will help you with all aspects of building your business credit') }}.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                {{ __('messages.Frequently asked questions') }}
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company. You’ll also receive guidance from our business advising team, who will help you with all aspects of building your business credit') }}.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Third Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ __('messages.Frequently asked questions') }}
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Our cutting-edge Business Finance Suite provides you with a personalized experience to obtain credit and financing for your company. You’ll also receive guidance from our business advising team, who will help you with all aspects of building your business credit') }}.
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
                768: {
                    slidesPerView: 4
                },
                480: {
                    slidesPerView: 1
                }
            }
        });
    });
</script>
@endsection