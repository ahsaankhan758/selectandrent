@extends('website.layout.master')
@section('title')
    {{ __('messages.Car Detail') }} | {{ __('messages.Select and Rent') }}
@endsection

@section('content')
<!-- add to cart js -->
<script src="{{asset('/frontend-assets/assets/Js/addtocart.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<div class="container">
<h2 class="fw-bold bmw-text-color text-capitalize">{{ $car->car_models->car_brands->name ?? ' ' }} {{ $car->car_models->name ?? ' ' }} {{ $car->year ?? ' ' }}</h2>
<p>{{ $car->engine_size }} cc | {{ $car->drive }} | {{ ucfirst($car->transmission) }} | {{$car->lisence_plate}}</p>
<div class="d-flex flex-wrap gap-2 mt-3">
    <div class="custom-badge-2">
        <i class="fa-solid fa-user me-2"></i> {{ $car->min_age }} {{ __('Min. age') }}
    </div>
    <div class="custom-badge-2">
        <i class="fa-solid fa-gauge-high me-2"></i> {{ $car->mileage }} {{ __('km by the day') }}
    </div>
    <div class="custom-badge-2">
         {{ convertPrice($car->advance_deposit, 0) }} {{ __('Deposit') }}
    </div>
    <div class="custom-badge-2">
       <i class="fa-solid fa-location-dot me-2"></i> {{ $car->car_locations->area_name }} {{ ucfirst(optional(optional($car->car_locations)->city)->name) }}
    </div>
</div>
</div>
@php
    $images = unserialize($car->images);
@endphp

<div class="container mt-5">
    <div class="car-gallery">
        <!-- Main Image (clickable, opens carousel at index 0) -->
        <div class="main-image">
            <a data-fancybox="gallery" href="{{ asset(Storage::url($car->thumbnail)) }}" data-caption="Main Car Image" data-index="0">
                <img src="{{ asset(Storage::url($car->thumbnail)) }}" alt="Main Car Image">
            </a>
        </div>

        <!-- Side Images -->
        <div class="side-images">
            @foreach ($images ?? [] as $key => $image)
                <div class="image-wrapper">
                    <a data-fancybox="gallery" href="{{ asset(Storage::url($image)) }}" data-caption="Car Image {{ $key + 1 }}" data-index="{{ $key + 1 }}">
                        <img src="{{ asset(Storage::url($image)) }}" alt="Car Image {{ $key + 1 }}">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>


    <!-- Car Details Section -->
    <div class="container py-3">
        <div class="row g-4">
            <!-- Left Column: Car Info -->
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div>
                    
                    <p class="bmw-text">{{ $car->detail }}</p>

                    <h4 class="mt-4">{{ __('messages.features') }}</h4>
                    <div class="row">
                        @php
                            $features = unserialize($car->features);
                        @endphp

                        @if (is_array($features) && count($features) > 0)
                            @foreach (array_chunk($features, ceil(count($features) / 3)) as $chunk)
                                <div class="col-md-4">
                                    @foreach ($chunk as $feature)
                                        <p><img src="{{ asset('frontend-assets/icons/Security2.png') }}" alt="Feature">
                                            {{ $feature }}</p>
                                    @endforeach
                                </div>
                            @endforeach
                        @else
                            <p>No Features Found</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Column: Rental Price and Details -->

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="rental-card p-4 shadow rounded">
                    <div class="price-box d-flex justify-content-between align-items-center p-3 text-white rounded-top">
                        <h5 class="mb-0 py-3">{{ __('messages.Rental Price') }}</h5>
                        <h3 class="fw-bold py-3 mb-0">{{ convertPrice($car->rent, 0) }} <span class="fs-6">/ Day</span>
                        </h3>
                    </div>
                    <ul class="list-unstyled px-3 py-2">
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Seats') }}</strong>
                            <span>{{ $car->seats }} </span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Doors') }}</strong>
                            <span>{{ $car->doors }} </span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Luggage') }}</strong>
                            <span>{{ $car->luggage }}</span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Drive') }}</strong>
                            <span>{{ $car->drive }}</span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Fuel Economy') }}</strong>
                            <span>{{ $car->fuel_economy }}</span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Fuel Type') }}</strong>
                            <span>{{ $car->fuel_type }}</span></li>

                        <li class="d-flex justify-content-between"><strong>{{ __('messages.engine') }}</strong>
                            <span>{{ $car->engine_size }} cc</span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.year') }}</strong>
                            <span>{{ $car->year }}</span></li>

                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Mileage') }}</strong>
                            <span>{{ $car->mileage }}</span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Transmission') }}</strong>
                            <span>{{ ucfirst($car->transmission) }}</span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Exterior Color') }}</strong>
                            <span>{{ ucfirst($car->exterior_color) }}</span></li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.Interior Color') }}</strong>
                            <span>{{ ucfirst($car->interior_color) }}</span></li>
                        <li class="d-flex justify-content-between">
                            <strong>{{ __('messages.location') }}</strong>
                            <span>{{ ucfirst(optional(optional($car->car_locations)->city)->name) }}</span>
                        </li>


                    </ul>
                    <!-- for add to cart  -->
                    @if (auth()->check())
                        <button data-carid="{{ $car->id }}" id="car-booking-btn"
                            class="btn btn-purchase w-100 rounded-pill mt-3">{{ __('messages.Book Now') }}</button>
                    @else
                        <button class="btn btn-purchase w-100 rounded-pill mt-3" data-bs-toggle="modal"
                            data-bs-target="#loginModal">{{ __('messages.Book Now') }}</button>
                    @endif
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
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    {{ __('messages.How to Search and Book a Car') }}
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet,
                                    consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    {{ __('messages.Payment Methods and Security') }}
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    {{ __('messages.Refund and Cancellation Policy') }}
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingfour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    {{ __('messages.Refund and Cancellation Policy') }}
                                </button>
                            </h2>
                            <div id="collapsefour" class="accordion-collapse collapse" aria-labelledby="headingfour"
                                data-bs-parent="#faqAccordion">
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
                        <iframe id="mapIframe" width="600" height="450" style="border:0;" loading="lazy"
                            allowfullscreen></iframe>
                        <script>
                            // Example dynamic coordinates (replace with your actual dynamic variables)
                            const latitude = `{{ $car->car_locations->latitude }}`;
                            const longitude = `{{ $car->car_locations->longitude }}`;
                            const mapSrc = `https://maps.google.com/maps?q=${latitude},${longitude}&z=14&output=embed`;
                            // Apply to the iframe

                            document.getElementById('mapIframe').src = mapSrc;
                        </script>
                    </div>
                    <div class="help-box mt-3">
                        <div class="help-content">
                            <div class="help-text-1">{{ optional(optional($car->users)->companies)->name }}</div>
                            <p class="help-number">{{ optional(optional($car->users)->companies)->email }}</p>

                        </div>
                        <img src="http://127.0.0.1:8000/frontend-assets/icons/phone.png" alt="24-hour support">
                    </div>
                    <div class="help-box mt-3">
                        <div class="help-content">
                            <div class="help-text">{{ __('messages.Need Any Help') }}?</div>
                            <p class="help-number">{{ optional(optional($car->users)->companies)->phone }}</p>
                        </div>
                        <img src="{{ asset('/') }}frontend-assets/icons/phone.png" alt="24-hour support">
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
                <button class="btn rounded-pill text-white btn-orange-clr"
                    onclick="window.location.href='{{ url('/carlisting') }}'">
                    {{ __('messages.View All') }}
                    <img src="{{ asset('/') }}frontend-assets/icons/Frame-1707482121.png" class="ms-2"
                        width="20" height="20" alt="">
                </button>
            </div>

        </div>
    </section>

    <!-- cars view -->
    <div class="container py-4">
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($cars as $car)
                    <div class="swiper-slide mb-2">
                        <div class="custom-card2">
                            <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                                <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img"
                                    alt="Car Image">
                            </a>
                            <div class="card-content">
                                <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="text-muted card_orange_clr">
                                                {{ $car->car_models->car_brands->name ?? ' ' }}
                                                {{ $car->car_models->name ?? ' ' }}
                                                {{ $car->year ?? ' ' }}
                                            </h5>
                                            <h6 class="text-muted" style="font-size: 12px;">{{ __('messages.engine') }} {{ $car->engine_size }}
                                                {{ __('messages.cc') }} | {{ ucfirst($car->transmission) }} | {{$car->fuel_type}}</h6>
                                        </div>
                                        <div>
                                        @php
                                            $companyProfile = $car->users->companies->company_profile ?? null;
                                        @endphp

                                        @if($companyProfile)
                                            <img src="{{ asset($companyProfile) }}" alt="Company Logo" width="40" height="40" style="object-fit: cover; border-radius: 50%;">
                                        @else
                                            <img src="{{ asset('frontend-assets/assets/customeruser.png') }}" alt="Default Logo" width="40" height="40" style="object-fit: cover; border-radius: 50%;">
                                        @endif
                                    </div>
                                    </div>

                                    <hr>
                                    <div class="d-flex justify-content-between w-100">
                                        <div class="flex-fill text-center mx-2">
                                            <h6>{{ __('messages.mileage') }}</h6>
                                            <p><i class="fas fa-tachometer-alt"></i> {{ $car->mileage }}</p>
                                        </div>
                                        <div class="flex-fill text-center mx-2">
                                            <h6>{{ __('messages.deposit') }}</h6>
                                            <p>{{convertPrice($car->advance_deposit,0)}}</p>
                                        </div>
                                        <div class="flex-fill text-center mx-2">
                                            <h6>{{ __('messages.min') }}</h6>
                                            <p><i class="fa-solid fa-user"></i> {{$car->min_age}}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- <div class="d-flex justify-content-between mt-4">
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
                            </div> --}}
                                </a>
                                <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                    <h6 class="card_orange_clr ms-2">
                                        {{ convertPrice($car->rent, 0) }}/{{ __('messages.Day') }}</h6>
                                    @if (auth()->check())
                                        <button class="book-btn" data-carid="{{ $car->id }}"
                                            id="car-booking-btn">{{ __('messages.Book') }}</button>
                                    @else
                                        <button class="book-btn" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Swiper Navigation -->
        <div class="d-flex justify-content-center mt-3">
            <a class="carousel-control-prev-custom me-3">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a class="carousel-control-next-custom">
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
                    <p>We had a fantastic time on The High Roller. The views were amazing, and the ride was very smooth.
                        It’s a great way to see Las Vegas from a different perspective. The staff were friendly and helpful.
                        Definitely worth it! The High Roller was one of the highlights of our Las Vegas trip.</p>
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
                    <p>We had a fantastic time on The High Roller. The views were amazing, and the ride was very smooth.
                        It’s a great way to see Las Vegas from a different perspective. The staff were friendly and helpful.
                        Definitely worth it! The High Roller was one of the highlights of our Las Vegas trip.</p>
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
                        <input type="text" class="form-control form-control-border"
                            placeholder="{{ __('messages.Email') }}">
                    </div>
                    <div class="col-md-6 mb-2">
                        <input type="text" class="form-control form-control-border"
                            placeholder="{{ __('messages.Phone') }}">
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
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                }, // Mobile
                768: {
                    slidesPerView: 3,
                    spaceBetween: 15
                }, // Tablet
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }, // Desktop
            },
        });
    </script>
@endsection
