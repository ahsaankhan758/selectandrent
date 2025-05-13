@extends('website.layout.master')
@section('title')

{{ __('messages.Car Detail') }} | {{ __('messages.Select and Rent') }}

@endsection

@section('content')
<!-- car image section -->
@php
    $images = unserialize($car->images);
@endphp
<!-- add to cart js -->
<script src="{{asset('/frontend-assets/assets/Js/addtocart.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
<div class="row container mt-5">
    <div class="col-12">
        <!-- Carousel Wrapper -->
        <div id="carCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <!-- Slides -->
            <div class="carousel-inner mb-4">
                <!-- Thumbnail Image (Initially Active) -->
                <div class="carousel-item active">
                    <img src="{{ asset(Storage::url($car->thumbnail)) }}"
                         class="d-block w-100 rounded shadow"
                         style="max-height: 100%; height: 400px; object-fit: cover;"
                         alt="{{ $car->car_models->name ?? 'Car Image' }}">
                </div>

                @if(is_array($images) && count($images) > 0)
                    @foreach($images as $key => $image)
                        <div class="carousel-item">
                            <img src="{{ asset(Storage::url($image)) }}"
                                 class="d-block w-100 rounded shadow"
                                 style="max-height: 100%; height: 400px; object-fit: cover;"
                                 alt="Car Image">
                        </div>
                    @endforeach
                @endif
            </div>
            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('messages.Previous') }}</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">{{ __('messages.Next') }}</span>
            </button>
        </div>
    </div>
</div>

<!-- Thumbnails -->
@if(is_array($images) && count($images) > 0)
    <div class="row justify-content-center mt-3">
        <div class="col-lg-2 col-md-3 col-sm-4 col-6">
            <!-- Thumbnail as First Slide -->
            <button type="button" class="btn p-0 border-0" data-bs-target="#carCarousel" data-bs-slide-to="0">
                <img src="{{ asset(Storage::url($car->thumbnail)) }}"
                     class="img-fluid rounded shadow w-100"
                     style="height: 100px; object-fit: cover;">
            </button>
        </div>
        @foreach($images as $key => $image)
            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <button type="button" class="btn p-0 border-0" data-bs-target="#carCarousel" data-bs-slide-to="{{ $key + 1 }}">
                    <img src="{{ asset(Storage::url($image)) }}"
                         class="img-fluid rounded shadow w-100"
                         style="height: 100px; object-fit: cover;">
                </button>
            </div>
        @endforeach
    </div>
@endif


<!-- Car Details Section -->
<div class="container py-3">
    <div class="row g-4">
        <!-- Left Column: Car Info -->
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div>
                <h2 class="fw-bold bmw-text-color text-capitalize">{{ $car->car_models->car_brands->name ?? ' ' }} {{ $car->car_models->name ?? ' ' }} {{ $car->year ?? ' ' }}</h2>
                <p class="bmw-text">{{ $car->detail }}</p>
                
                <h4 class="mt-4">{{ __('messages.features') }}</h4>
                <div class="row">
                    @php $features = unserialize($car->features); @endphp
                    @foreach(array_chunk($features, ceil(count($features)/3)) as $chunk)
                        <div class="col-md-4">
                            @foreach($chunk as $feature)
                                <p><img src="{{ asset('frontend-assets/icons/Security2.png') }}" alt="Feature"> {{ $feature }}</p>
                            @endforeach
                        </div>
                    @endforeach
                </div>

            </div>
        </div>

        <!-- Right Column: Rental Price and Details -->
        
        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="rental-card p-4 shadow rounded">
                <div class="price-box d-flex justify-content-between align-items-center p-3 text-white rounded-top">
                    <h5 class="mb-0 py-3">{{ __('messages.Rental Price') }}</h5>
                    <h3 class="fw-bold py-3 mb-0">{{ convertPrice($car->rent, 0) }} <span class="fs-6">/ Day</span></h3>
                </div>
                <ul class="list-unstyled px-3 py-2">
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Seats') }}</strong> <span>{{ $car->seats }} </span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Doors') }}</strong> <span>{{ $car->doors }} </span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Luggage') }}</strong> <span>{{ $car->luggage }}</span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Drive') }}</strong> <span>{{ $car->drive }}</span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Fuel Economy') }}</strong> <span>{{ $car->fuel_economy }}</span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Fuel Type') }}</strong> <span>{{ $car->fuel_type }}</span></li>

                    <li class="d-flex justify-content-between"><strong>{{ __('messages.engine') }}</strong> <span>{{ $car->engine_size }} cc</span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.year') }}</strong> <span>{{ $car->year }}</span></li>

                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Mileage') }}</strong> <span>{{ $car->mileage }}</span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Transmission') }}</strong> <span>{{ ucfirst($car->transmission) }}</span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Exterior Color') }}</strong> <span>{{ ucfirst($car->exterior_color) }}</span></li>
                    <li class="d-flex justify-content-between"><strong>{{ __('messages.Interior Color') }}</strong> <span>{{ ucfirst($car->interior_color) }}</span></li>
                    <li class="d-flex justify-content-between">
                        <strong>{{ __('messages.location') }}</strong>
                        <span>{{ ucfirst(optional(optional($car->car_locations)->city)->name) }}</span>
                    </li>


                </ul>
                <!-- for add to cart  -->
                <button data-carid="{{ $car->id }}" id="car-booking-btn" class="btn btn-purchase w-100 rounded-pill mt-3">{{ __('messages.Book Now') }}</button>
                <!-- end add to cart -->
            </div>
        </div>
        
    </div>
</div>

<!-- end bmw -->
 <!-- start accordian and map -->
 <div class="container">
    <div class="col-md-12 col-lg-12 col-12">
        <h5 class="fw-bold question-heading">{{ __('messages.General Question') }}</h5>
    </div>
    <div class="row g-4">
        <!-- FAQ Section -->
        <div class="col-lg-7 col-md-7 col-sm-7 py-4">
            <div class="faq-box flex-fill">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ __('messages.How to Search and Book a Car') }}
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                {{ __('messages.Payment Methods and Security') }} 
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ __('messages.Refund and Cancellation Policy') }}
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingfour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                {{ __('messages.Refund and Cancellation Policy') }}
                            </button>
                        </h2>
                        <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Location Section -->
        <div class="col-lg-5 col-md-5 col-sm-5 location-card-clr">
            <div class="location-box flex-fill d-flex flex-column">
                <h5 class="fw-bold">{{ __('messages.Location') }}</h5>
                <div class="map-container flex-grow-1">
                    <!-- map -->
                <iframe id="mapIframe" width="600" height="450" style="border:0;" loading="lazy" allowfullscreen></iframe>
                <script>
                    // Example dynamic coordinates (replace with your actual dynamic variables)
                    const latitude = `{{$car->car_locations}}`;
                    const longitude = `{{$car->car_locations}}`;
                    const mapSrc = `https://maps.google.com/maps?q=${latitude},${longitude}&z=14&output=embed`;
                    // Apply to the iframe
                    document.getElementById('mapIframe').src = mapSrc;
                </script>
                </div>
                <div class="help-box mt-3">
                    <div class="help-content">
                        <div class="help-text-1">{{$car->users->companies->name}}</div>
                        <p class="help-number">{{$car->users->companies->email}}</p>
                    </div>
                    <img src="http://127.0.0.1:8000/frontend-assets/icons/phone.png" alt="24-hour support">
                </div>
                <div class="help-box mt-3">
                    <div class="help-content">
                        <div class="help-text">{{ __('messages.Need Any Help') }}?</div>
                        <p class="help-number">{{$car->users->companies->phone}}</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/phone.png" alt="24-hour support">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end map -->
<section class="container py-4 mt-5">
    <div class="row align-items-center">
        <!-- Heading (Always on Left) -->
        <div class="col-12 col-md-6 text-center text-md-start">
            <h2 class="fw-bold">{{ __('messages.Choose The Car You Need') }}</h2>
        </div>
        <!-- Button (Center on Mobile, End on Larger Screens) -->
        <div class="col-12 col-md-6 text-center text-md-end mt-3 mt-md-0">
            <button class="btn  rounded-pill text-white btn-orange-clr" data-bs-toggle="modal" data-bs-target="#carRentalModal">
                {{ __('messages.View All') }} <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
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
                        <img src="{{  asset(Storage::url($car->thumbnail)) }}" class="custom-card-img" alt="Car Image">
        
                        <div class="card-content">
                            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                <h6 class="car-price">${{ $car->rent }}/{{ __('messages.Day') }}</h6>
                                <button class="book-btn" onclick="window.location.href='{{ url('/cardetail/' . $car->id) }}'">{{ __('messages.Book') }}</button>
                            </div>
        
                            <h5 class="text-muted mt-3">{{ $car->car_models->name ?? 'Unknown Model' }}</h5>
        
                            <div class="d-flex justify-content-between mt-4">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly.png" alt="Car" width="20px">
                                    {{ $car->weight }} {{ __('messages.kg') }}
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-v.png" alt="Car" width="20px">
                                    {{ $car->mileage }} {{ __('messages.km') }}
                                </div>
                            </div>
        
                            <div class="d-flex justify-content-between mt-2">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-u.png" alt="Car" width="20px">
                                    {{ $car->seats }} {{ __('messages.Seater') }}
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-s.png" alt="Car" width="20px">
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


<!-- end -->
<div class="container-fluid bg-white">
<div class="review-container mb-3">
    <h2>{{ __('messages.Rate & Reviews') }}</h2>
    <div class="container">
        <div class="row d-flex align-items-start gap-3">
            <!-- Rating Summary Box -->
            <div class="col-md-4 col-12 text-center p-4 rating-box">
                <h3 class="mt-4">4.95 / 5</h3>
                <p class="text-muted">{{ __('messages.(762 Reviews)') }}</p>
                <div class="stars text-warning">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
    
            <!-- Rating Details -->
            <div class="col-md-7 col-12">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-between">
                        <span class="fw-bold">{{ __('messages.Price') }}</span>
                        <span>4.8/5</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 80%;"></div>
                    </div>
    
                    <div class="d-flex justify-content-between mt-2">
                        <span class="fw-bold">{{ __('messages.Services') }}</span>
                        <span>4.3/5</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 60%;"></div>
                    </div>
    
                    <div class="d-flex justify-content-between mt-2">
                        <span class="fw-bold">{{ __('messages.Safety') }}</span>
                        <span>4.5/5</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 90%;"></div>
                    </div>
    
                    <div class="d-flex justify-content-between mt-2">
                        <span class="fw-bold">{{ __('messages.Entertainment') }}</span>
                        <span>4.7/5</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 75%;"></div>
                    </div>
    
                    <div class="d-flex justify-content-between mt-2">
                        <span class="fw-bold">{{ __('messages.Accessibility') }}</span>
                        <span>5/5</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 100%;"></div>
                    </div>
    
                    <div class="d-flex justify-content-between mt-2">
                        <span class="fw-bold">{{ __('messages.Support') }}</span>
                        <span>4.8/5</span>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" style="width: 85%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- User Reviews -->
    <div class="mt-4">
        <div class="review-card">
            <div class="review-header d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="User">
                <div>
                    <h5>Sarah Johnson</h5>
                    <p class="text-muted">December 4, 2024 at 3:12 pm</p>
                </div>
                <div class="stars destop-star ms-auto">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <hr class="Reviews-hr">
            <div class="stars mobile-star ms-auto">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>We had a fantastic time on The High Roller. The views were amazing, and the ride was very smooth. It’s a great way to see Las Vegas from a different perspective. The staff were friendly and helpful. Definitely worth it! The High Roller was one of the highlights of our Las Vegas trip.</p>
        </div>
        <div class="review-card">
            <div class="review-header d-flex align-items-center">
                <img src="https://randomuser.me/api/portraits/women/50.jpg" alt="User">
                <div>
                    <h5>Sarah Johnson</h5>
                    <p class="text-muted">December 4, 2024 at 3:12 pm</p>
                </div>
                <div class="stars destop-star ms-auto">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            <hr class="Reviews-hr">
            <div class="stars mobile-star ms-auto">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <p>We had a fantastic time on The High Roller. The views were amazing, and the ride was very smooth. It’s a great way to see Las Vegas from a different perspective. The staff were friendly and helpful. Definitely worth it! The High Roller was one of the highlights of our Las Vegas trip.</p>
        </div>        
    </div>

    <!-- Review Form -->
    <div class="mt-4">
        <h4>{{ __('messages.Rate & Reviews') }}</h4>
        <div class="row">
            <div class="col-md-4 col-12 d-flex align-items-center mb-2">
            <div class="col-md-5">
            <span>{{ __('messages.Price') }}</span>
            </div>
            <div class="col-md-5">
                <div class="stars ms-3">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
            </div>
            </div>
            <div class="col-md-4 col-12 d-flex align-items-center mb-2">
                <div class="col-md-5">
                    <span>{{ __('messages.Services') }}</span>
                    </div>
                    <div class="col-md-5">
                        <div class="stars ms-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 col-12 d-flex align-items-center mb-2">
                <div class="col-md-5">
                    <span>{{ __('messages.Safety') }}</span>
                    </div>
                    <div class="col-md-5">
                        <div class="stars ms-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
            </div>
        </div>
    
        <div class="row mt-2">
            <div class="col-md-4 col-12 d-flex align-items-center mb-2">
                <div class="col-md-5">
                    <span>{{ __('messages.Entertainment') }}</span>
                    </div>
                    <div class="col-md-5">
                        <div class="stars ms-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 col-12 d-flex align-items-center mb-2">
                <div class="col-md-5">
                    <span>{{ __('messages.Accessibility') }}</span>
                    </div>
                    <div class="col-md-5">
                        <div class="stars ms-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 col-12 d-flex align-items-center mb-2">
                <div class="col-md-5">
                    <span>{{ __('messages.Support') }}</span>
                    </div>
                    <div class="col-md-5">
                        <div class="stars ms-3">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
            </div>
        </div>
        <div class="row">
        <div class="col-md-6 mb-2">
            <input type="text" class="form-control form-control-border" placeholder="{{ __('messages.Email') }}">
        </div>
        <div class="col-md-6 mb-2">
            <input type="text" class="form-control form-control-border" placeholder="{{ __('messages.Phone') }}">
        </div>
    </div>
        <div class="col-md-12 mb-2">
            <textarea class="form-control form-control-border" rows="4" placeholder="{{ __('messages.Your Comment') }}"></textarea>
        </div>
        <div class="text-end">
            <button class="btn btn-warning btn-orange-clr rounded-pill text-white px-4 py-2">
                {{ __('messages.Submit') }}
            </button>
        </div>           
    </div>
</div>
</div>
<!-- Include Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  var swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
        delay: 3000, // 3 sec
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".carousel-control-prev-custom",
        prevEl: ".carousel-control-next-custom",
    },
    breakpoints: {
        320: { slidesPerView: 1, spaceBetween: 10 }, // Mobile
        768: { slidesPerView: 3, spaceBetween: 15 }, // Tablet
        1024: { slidesPerView: 4, spaceBetween: 20 }, // Desktop
    },
});

</script>
@endsection