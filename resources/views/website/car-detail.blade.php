@extends('website.layout.master')
@section('title')
    {{ __('messages.vehicle_detail') }} 
@endsection

@section('content')
    <!-- add to cart js -->
    <script src="{{ asset('/frontend-assets/assets/Js/addtocart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <!-- Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

    <div class="container">
        <h2 class="fw-bold bmw-text-color text-capitalize">{{ $vehicle->car_models->car_brands->name ?? ' ' }}
            {{ $vehicle->car_models->name ?? ' ' }} {{ $vehicle->year ?? ' ' }}</h2>
        <p>{{ $vehicle->engine_size }} cc | {{ $vehicle->drive }} | {{ ucfirst($vehicle->transmission) }} |
            {{ $vehicle->lisence_plate }}</p>
        <div class="d-flex flex-wrap gap-2 mt-3">
            <div class="custom-badge-2">
                <i class="fa-solid fa-user me-2"></i> {{ $vehicle->min_age }} {{ __('Min. age') }}
            </div>
            <div class="custom-badge-2">
                <i class="fa-solid fa-gauge-high me-2"></i> {{ $vehicle->mileage }} {{ __('km by the day') }}
            </div>
            <div class="custom-badge-2">
                {{ convertPrice($vehicle->advance_deposit, 0) }} {{ __('Deposit') }}
            </div>
            <div class="custom-badge-2">
                <i class="fa-solid fa-location-dot me-2"></i> {{ $vehicle->car_locations->area_name }}
                {{ ucfirst(optional(optional($vehicle->car_locations)->city)->name) }}
            </div>
        </div>
    </div>
    @php
        $images = unserialize($vehicle->images);
    @endphp

    <div class="container mt-5">
        <div class="car-gallery">
            <!-- Main Image (clickable, opens carousel at index 0) -->
            <div class="main-image">
                <a data-fancybox="gallery" href="{{ asset(Storage::url($vehicle->thumbnail)) }}"
                    data-caption="Main Car Image" data-index="0">
                    @if(!empty($vehicle->thumbnail))
                        <img src="{{ asset(Storage::url($vehicle->thumbnail)) }}" alt="Main Car Image">
                    @else 
                        <img src="{{ asset('images/no-image.png') }}" alt="No Car Image Available">
                    @endif
                </a>
            </div>

            <!-- Side Images -->
            <div class="side-images">
                @if (is_array($images))
                    @foreach ($images ?? [] as $key => $image)
                        <div class="image-wrapper">
                            <a data-fancybox="gallery" href="{{ asset(Storage::url($image)) }}"
                                data-caption="Car Image {{ $key + 1 }}" data-index="{{ $key + 1 }}">
                                <img src="{{ asset(Storage::url($image)) }}" alt="Car Image {{ $key + 1 }}">
                            </a>
                        </div>
                    @endforeach
               
                @endif
            </div>
        </div>
    </div>


    <!-- Car Details Section -->
    <div class="container py-3">
        <div class="row g-4">
            <!-- Left Column: Car Info -->
            <div class="col-lg-8 col-md-8 col-sm-8">
                <div>

                    <p class="bmw-text">{{ $vehicle->detail }}</p>

                    <h4 class="mt-4">{{ __('messages.features') }}</h4>
                    <div class="row">
                        @php
                            $features = unserialize($vehicle->features);
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
                        <h5 class="mb-0 py-3">{{ __('messages.rental_price') }}</h5>
                        <h3 class="fw-bold py-3 mb-0">{{ convertPrice($vehicle->rent, 0) }} <span class="fs-6">/
                                Day</span>
                        </h3>
                    </div>
                    <ul class="list-unstyled px-3 py-2">
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.seats') }}</strong>
                            <span>{{ $vehicle->seats }} </span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.doors') }}</strong>
                            <span>{{ $vehicle->doors }} </span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.luggage') }}</strong>
                            <span>{{ $vehicle->luggage }}</span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.drive') }}</strong>
                            <span>{{ $vehicle->drive }}</span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.fuel_economy') }}</strong>
                            <span>{{ $vehicle->fuel_economy }}</span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.fuel_type') }}</strong>
                            <span>{{ $vehicle->fuel_type }}</span>
                        </li>

                        <li class="d-flex justify-content-between"><strong>{{ __('messages.engine') }}</strong>
                            <span>{{ $vehicle->engine_size }} cc</span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.year') }}</strong>
                            <span>{{ $vehicle->year }}</span>
                        </li>

                        <li class="d-flex justify-content-between"><strong>{{ __('messages.mileage') }}</strong>
                            <span>{{ $vehicle->mileage }}</span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.transmission') }}</strong>
                            <span>{{ ucfirst($vehicle->transmission) }}</span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.exterior_color') }}</strong>
                            <span>{{ ucfirst($vehicle->exterior_color) }}</span>
                        </li>
                        <li class="d-flex justify-content-between"><strong>{{ __('messages.interior_color') }}</strong>
                            <span>{{ ucfirst($vehicle->interior_color) }}</span>
                        </li>
                        <li class="d-flex justify-content-between">
                            <strong>{{ __('messages.location') }}</strong>
                            <span>{{ ucfirst(optional(optional($vehicle->car_locations)->city)->name) }}</span>
                        </li>


                    </ul>
                    <!-- for add to cart  -->
                    @if (auth()->check())
                        <button data-carid="{{ $vehicle->id }}" id="car-booking-btn"
                            class="btn btn-purchase w-100 rounded-pill mt-3">{{ __('messages.book_now') }}</button>
                    @else
                        <button class="btn btn-purchase w-100 rounded-pill mt-3" data-bs-toggle="modal"
                            data-bs-target="#loginModal">{{ __('messages.book_now') }}</button>
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
            <h5 class="fw-bold question-heading">{{ __('messages.general_question') }}</h5>
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
                                    {{ __('messages.how_to_search') }}
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
                                    {{ __('messages.payment_methods_and_security') }}
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
                                    {{ __('messages.refund_and_cancellation') }}
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
                                    {{ __('messages.refund_and_cancellation') }}
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
                    <h5 class="fw-bold">{{ __('messages.location') }}</h5>
                    <div class="map-container flex-grow-1">
                        <!-- map -->
                        <iframe id="mapIframe" width="600" height="450" style="border:0;" loading="lazy"
                            allowfullscreen></iframe>
                        <script>
                            // Example dynamic coordinates (replace with your actual dynamic variables)
                            const latitude = `{{ $vehicle->car_locations->latitude }}`;
                            const longitude = `{{ $vehicle->car_locations->longitude }}`;
                            const mapSrc = `https://maps.google.com/maps?q=${latitude},${longitude}&z=14&output=embed`;
                            // Apply to the iframe

                            document.getElementById('mapIframe').src = mapSrc;
                        </script>
                    </div>
                    {{-- First Card: Show only if name and email exist --}}
                    @if (optional(optional($vehicle->users)->companies)->name && optional(optional($vehicle->users)->companies)->email)
                        <div class="help-box mt-3">
                            <div class="help-content">
                                <div class="help-text-1">{{ optional(optional($vehicle->users)->companies)->name }}</div>
                                <p class="help-number">{{ optional(optional($vehicle->users)->companies)->email }}</p>
                            </div>
                            <i class="fa-solid fa-building"
                                style="font-size: 36px; color: #f06115; width: 45px; margin-left: 15px;"></i>
                        </div>
                    @endif

                    {{-- Second Card: Show only if phone exists --}}
                    @if (optional(optional($vehicle->users)->companies)->phone)
                        <div class="help-box mt-3">
                            <div class="help-content">
                                <div class="help-text">{{ __('messages.need_any_help') }}?</div>
                                <p class="help-number">{{ optional(optional($vehicle->users)->companies)->phone }}</p>
                            </div>
                            <img src="{{ asset('/') }}frontend-assets/icons/phone.png" alt="24-hour support">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end map -->
    <section class="container py-4 mt-5">
        <div class="row align-items-center">
            <!-- Heading (Always on Left) -->
            <div class="col-12 col-md-6 text-center text-md-start">
                <h2 class="fw-bold">{{ __('messages.choose_the_vehicle') }}</h2>
            </div>
            <!-- Button (Center on Mobile, End on Larger Screens) -->
            <div class="col-12 col-md-6 text-center text-md-end mt-3 mt-md-0">
                <button class="btn rounded-pill text-white btn-orange-clr"
                    onclick="window.location.href='{{ url('/carlisting') }}'">
                    {{ __('messages.view_all') }}
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
                @foreach ($vehicles as $vehicle)
                    <div class="swiper-slide mb-2">
                        <div class="custom-card2">
                            <a href="{{ route('car.detail', $vehicle->id) }}" class="link position-relative"
                                style="display: inline-block;">
                                @php
                                    $path = public_path('storage/' . $vehicle->thumbnail);
                                    $imageExists = $vehicle->thumbnail && file_exists($path);
                                @endphp

                                @if ($imageExists)
                                    <img src="{{ asset('storage/' . $vehicle->thumbnail) }}" class="custom-card-img"
                                        alt="Car Image">
                                @else
                                    <img src="{{ asset('images/no-image.png') }}" class="custom-card-img"
                                        alt="No Image Available">
                                @endif

                                @if ($vehicle->is_booked == '1')
                                    <div
                                        style="position: absolute;top: 0; left: 0;background: var(--text-orange);color: white;padding: 5px 10px;font-weight: bold;font-size: 14px;z-index: 10;">
                                        {{ __('messages.currently_booked') }}</div>
                                @endif
                            </a>
                            <div class="card-content">
                                <a href="{{ url('/cardetail/' . $vehicle->id) }}" class="link">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div>
                                            <h5 class="text-muted card_orange_clr">
                                                {{ $vehicle->car_models->car_brands->name ?? ' ' }}
                                                {{ $vehicle->car_models->name ?? ' ' }}
                                                {{ $vehicle->year ?? ' ' }}
                                            </h5>
                                            <h6 class="text-muted" style="font-size: 12px;">{{ __('messages.engine') }}
                                                {{ $vehicle->engine_size }}
                                                {{ __('messages.cc') }} | {{ ucfirst($vehicle->transmission) }} |
                                                {{ $vehicle->fuel_type }}</h6>
                                        </div>
                                        <div>
                                            @php
                                                $companyProfile = $vehicle->users->companies->company_profile ?? null;
                                            @endphp

                                            @if ($companyProfile)
                                                <img src="{{ asset($companyProfile) }}" alt="Company Logo"
                                                    width="40" height="40"
                                                    style="object-fit: cover; border-radius: 50%;">
                                            @else
                                                <img src="{{ asset('frontend-assets/assets/customeruser.png') }}"
                                                    alt="Default Logo" width="40" height="40"
                                                    style="object-fit: cover; border-radius: 50%;">
                                            @endif
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="d-flex justify-content-between w-100">
                                        <div class="flex-fill text-center mx-2">
                                            <h6>{{ __('messages.mileage') }}</h6>
                                            <p><i class="fas fa-tachometer-alt"></i> {{ $vehicle->mileage }}</p>
                                        </div>
                                        <div class="flex-fill text-center mx-2">
                                            <h6>{{ __('messages.deposit') }}</h6>
                                            <p>{{ convertPrice($vehicle->advance_deposit, 0) }}</p>
                                        </div>
                                        <div class="flex-fill text-center mx-2">
                                            <h6>{{ __('messages.min') }}</h6>
                                            <p><i class="fa-solid fa-user"></i> {{ $vehicle->min_age }}</p>
                                        </div>
                                    </div>
                                    <hr>
                                    {{-- <div class="d-flex justify-content-between mt-4">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly.png" alt="Car" width="20px">
                                    {{ $vehicle->weight }} {{ __('messages.kg') }}
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-v.png" alt="Car" width="20px">
                                    {{ $vehicle->mileage }} {{ __('messages.km') }}
                                </div>
                            </div>
        
                            <div class="d-flex justify-content-between mt-2">
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-u.png" alt="Car" width="20px">
                                    {{ $vehicle->seats }} {{ __('messages.seater') }}
                                </div>
                                <div class="icon-text">
                                    <img src="{{ asset('/') }}frontend-assets/icons/Iconly-s.png" alt="Car" width="20px">
                                    {{ ucfirst($vehicle->transmission) }}
                                </div>
                            </div> --}}
                                </a>
                                <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                    <h6 class="card_orange_clr ms-2">
                                        {{ convertPrice($vehicle->rent, 0) }}/{{ __('messages.day') }}</h6>
                                    @if (auth()->check())
                                        <button class="book-btn" data-carid="{{ $vehicle->id }}"
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
    @if ($reviews->count() > 0)
        <div class="container-fluid bg-white">
            <div class="review-container mb-3">
                <h2>{{ __('messages.Rate_and_Reviews') }}</h2>
                <div class="container">
                    <div class="row d-flex align-items-start">
                        <!-- Rating Summary Box -->
                        <div class="col-md-4 col-12 text-left p-4 ">
                            <h3 class="mt-4">{{ $averageRating }} / 5</h3>
                            <p class="text-muted">{{ $reviews->count() }} {{ __('messages.reviews') }}</p>
                            <div class="stars text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= floor($averageRating))
                                        <i class="fas fa-star text-warning"></i>
                                    @elseif ($i == ceil($averageRating) && fmod($averageRating, 1) != 0)
                                        <i class="fas fa-star-half-alt text-warning"></i>
                                    @else
                                        <i class="far fa-star text-warning"></i>
                                    @endif
                                @endfor
                            </div>
                        </div>

                        <!-- Rating Details -->
                        <!-- <div class="col-md-7 col-12">
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <span class="fw-bold">{{ __('messages.price') }}</span>
                                    <span>4.8/5</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 80%;"></div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <span class="fw-bold">{{ __('messages.services') }}</span>
                                    <span>4.3/5</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 60%;"></div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <span class="fw-bold">{{ __('messages.safety') }}</span>
                                    <span>4.5/5</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 90%;"></div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <span class="fw-bold">{{ __('messages.entertainment') }}</span>
                                    <span>4.7/5</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 75%;"></div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <span class="fw-bold">{{ __('messages.accessibility') }}</span>
                                    <span>5/5</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 100%;"></div>
                                </div>

                                <div class="d-flex justify-content-between mt-2">
                                    <span class="fw-bold">{{ __('messages.support') }}</span>
                                    <span>4.8/5</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 85%;"></div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>

                <!-- User Reviews -->
                <div class="mt-4">
                    @foreach ($reviews as $review)
                        <div class="review-card">
                            <div class="review-header d-flex align-items-center">
                                <img src="{{ asset($review->user->profile_image) }}" alt="User">
                                <div>
                                    <h5>{{ ucfirst($review->user->name) }}</h5>
                                    <p class="text-muted">{{ $review->created_at->diffForHumans() }}</p>
                                </div>
                                <div class="stars destop-star ms-auto">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="far fa-star text-warning"></i>
                                        @endif
                                    @endfor
                                </div>

                            </div>
                            @if (!empty($review->comment))
                                <hr class="Reviews-hr">
                            @endif
                            <p>{{ ucfirst($review->comment) }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- Review Form -->
                <!-- <div class="mt-4">
                    <h4>{{ __('messages.Rate & Reviews') }}</h4>
                    <div class="row">
                        <div class="col-md-4 col-12 d-flex align-items-center mb-2">
                            <div class="col-md-5">
                                <span>{{ __('messages.price') }}</span>
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
                                <span>{{ __('messages.services') }}</span>
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
                                <span>{{ __('messages.safety') }}</span>
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
                                <span>{{ __('messages.entertainment') }}</span>
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
                                <span>{{ __('messages.accessibility') }}</span>
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
                                <span>{{ __('messages.support') }}</span>
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
                                placeholder="{{ __('messages.email') }}">
                        </div>
                        <div class="col-md-6 mb-2">
                            <input type="text" class="form-control form-control-border"
                                placeholder="{{ __('messages.phone') }}">
                        </div>
                    </div>
                    <div class="col-md-12 mb-2">
                        <textarea class="form-control form-control-border" rows="4" placeholder="{{ __('messages.your_comment') }}"></textarea>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-warning btn-orange-clr rounded-pill text-white px-4 py-2">
                            {{ __('messages.submit') }}
                        </button>
                    </div>
                </div> -->
            </div>
        </div>
    @endif
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
