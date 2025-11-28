@extends('website.layout.master')
@section('title')
    {{ __('messages.home_page') }}
@endsection

@section('content')
    <!-- add to cart js -->
    <script src="{{ asset('/frontend-assets/assets/Js/addtocart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    <div class="container text-center mobile-home-heading desktop-home-heading">
        <!-- Centered Heading -->
        <h5 class="display-6 fw-bold">{{ __('messages.browse_by_categories') }}</h5>
        <!-- Bottom Paragraph -->
        <!-- <p class="lead text-muted">
                    {{ __('messages.rapidiously_enable') }}
                    <br>{{ __('messages.channels_enterprise') }} .
                </p> -->
    </div>

    <div class="container py-5 mobile-category-home-cards">
        <div class="row g-3 justify-content-center">

            <!-- Sedan -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'Sedan')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/sedan-red.svg.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.sedan') }}</h6>
                </div>
            </div>

            <!-- Hatchback -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'Hatchback')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/hatchback.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.hatchback') }}</h6>
                </div>
            </div>

            <!-- SUV -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'SUV')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/SUV.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.suv') }}</h6>
                </div>
            </div>

            <!-- Crossover -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'Crossover')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/Crossover.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.crossover') }}</h6>
                </div>
            </div>

            <!-- Coupe -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'Coupe')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/coup-red.svg.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.coupe') }}</h6>
                </div>
            </div>

            <!-- Convertible -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'Convertible')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/Convertible.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.convertible') }}</h6>
                </div>
            </div>

            <!-- Minivan -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'Minivan')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/Minivan.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.minivan') }}</h6>
                </div>
            </div>

            <!-- Station Wagon -->
            <div class="col-md-3 col-sm-4 col-6">
                <div class="card text-center p-3 border-0 shadow-sm filter-btn"
                    data-category="{{ App\Models\CarCategory::where('name', 'Station Wagon')->value('id') }}">
                    <img src="{{ asset('/') }}frontend-assets/icons/station-wagon.png" width="75px">
                    <h6 class="mt-2">{{ __('messages.station_wagon') }}</h6>
                </div>
            </div>

        </div>
    </div>
   <div class="container py-5 mobile-append-custom" id="car-container">
    <div class="row g-3 justify-content-center">
        <div id="car-category-list"></div>

        <div class="col-lg-4 text-center text-load-more">
            <button id="load-more-btn" class="btn btn-primary" style="display:none;">
                Load More
            </button>
        </div>

    </div>
</div>

    <div class="container py-4 car-logo-mobile">
        <div class="container bg-white p-4 mt-3 border border-1 mb-3 rounded-3">
            <div class="row g-2 justify-content-center hyundai">
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
                    <img src="{{ asset('/') }}frontend-assets/icons/vehicle_brands_logo/Honda.png"
                        class="img-fluid hyundai-img mx-auto" alt="Image 1" width="80px">
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
                    <img src="{{ asset('/') }}frontend-assets/icons/vehicle_brands_logo/Toyota.png"
                        class="img-fluid hyundai-img mx-auto" alt="Image 2" width="80px">
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
                    <img src="{{ asset('/') }}frontend-assets/icons/vehicle_brands_logo/Lamborghini.png"
                        class="img-fluid hyundai-img mx-auto" alt="Image 3" width="80px">
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
                    <img src="{{ asset('/') }}frontend-assets/icons/vehicle_brands_logo/Aston_Martin.png"
                        class="img-fluid hyundai-img mx-auto" alt="Image 4" width="80px">
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
                    <img src="{{ asset('/') }}frontend-assets/icons/vehicle_brands_logo/Bentley.png"
                        class="img-fluid hyundai-img mx-auto" alt="Image 5" width="80px">
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 d-flex justify-content-center">
                    <img src="{{ asset('/') }}frontend-assets/icons/vehicle_brands_logo/Rolls_Royce.png"
                        class="img-fluid hyundai-img mx-auto" alt="Image 6" width="80px">
                </div>
            </div>
        </div>
    </div>
    @if (count($featuredVehicle) > 0)

        <section class="container py-5 card-logo-mobile">

            <div class="row align-items-center">
                <!-- Heading (Always on Left) -->
                <div class="col-12 col-md-6 text-center text-md-start">
                    <h2 class="fw-bold">{{ __('messages.featured_vehicle') }}</h2>
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
        <!--featured cars view -->
        <div class="container py-5 card-logo-mobile">
            <div class="swiper-container-wrapper">
                <div class="swiper featuredSwiper">
                    <div class="swiper-wrapper">
                        @forelse($featuredVehicle as $car)
                            <div class="swiper-slide mb-2">
                                <div class="custom-card2">
                                    <a href="{{ route('car.detail', $car->id) }}" class="link position-relative"
                                        style="display: inline-block;">
                                        @php
                                            $path = public_path('storage/' . $car->thumbnail);
                                            $imageExists = $car->thumbnail && file_exists($path);
                                        @endphp

                                        @if ($imageExists)
                                            <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img"
                                                alt="Car Image">
                                        @else
                                            <img src="{{ asset('images/no-image.png') }}" class="custom-card-img"
                                                alt="No Image Available">
                                        @endif

                                        @if ($car->is_booked == '1')
                                            <div
                                                style="position: absolute;top: 0; left: 0;background: var(--text-orange);color: white;padding: 5px 10px;font-weight: bold;font-size: 14px;z-index: 10;">
                                                {{ __('messages.currently_booked') }}</div>
                                        @endif
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
                                                    <h6 class="text-muted" style="font-size: 12px;">
                                                        {{ ucfirst($car->transmission) }}
                                                        | {{ ucfirst($car->fuel_type) }}
                                                        | {{ __('messages.engine') }}
                                                        {{ $car->engine_size }}{{ __('messages.cc') }}
                                                    </h6>
                                                </div>
                                                <div>
                                                    @php
                                                        $companyProfile =
                                                            $car->users->companies->company_profile ?? null;
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
                                                    <p><i class="fas fa-tachometer-alt"></i> {{ $car->mileage }}</p>
                                                </div>
                                                <div class="flex-fill text-center mx-2">
                                                    <h6>{{ __('messages.deposit') }}</h6>
                                                    <p>{{ convertPrice($car->advance_deposit, 0) }}</p>
                                                </div>
                                                <div class="flex-fill text-center mx-2">
                                                    <h6>{{ __('messages.min') }}</h6>
                                                    <p><i class="fa-solid fa-user"></i> {{ $car->min_age }}</p>
                                                </div>
                                            </div>
                                            <hr>
                                        </a>
                                        <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                            <h6 class="card_orange_clr ms-2">
                                                {{ convertPrice($car->rent, 0) }}/{{ ucfirst($car->rent_type) }}</h6>
                                            <a href="{{ route('car.detail', $car->id) }}" class="link position-relative"
                                                style="display: inline-block;">
                                                <button class="book-btn">{{ __('messages.Book') }}</button>
                                            </a>
                                            {{-- @if (auth()->check())
                                        <button class="book-btn" data-carid="{{ $car->id }}"
                                            id="car-booking-btn">{{ __('messages.Book') }}</button>
                                    @else
                                        <button class="book-btn" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                                    @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="16" class="text-center">{{ __('messages.no_vehicles') }}</td>
                            </tr>
                        @endforelse
                    </div>
                </div>

                <!-- Swiper Navigation -->

                <div class="d-flex justify-content-center mt-3 card-button-mobile">

                    <a class="carousel-control-prev-featured me-3">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                    <a class="carousel-control-next-featured">
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    @endif
    <section class="container py-5 card-logo-mobile">
        <div class="row align-items-center">
            <!-- Heading (Always on Left) -->
            <div class="col-12 col-md-6 text-center text-md-start">
                <h2 class="fw-bold">{{ __('messages.newArrival') }}</h2>
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
    <div class="container py-5 card-logo-mobile">
        <div class="swiper-container-wrapper">
            <div class="swiper newArrivalSwiper">
                <div class="swiper-wrapper">
                    @forelse ($newArrival as $car)
                        <div class="swiper-slide mb-2">
                            <div class="custom-card2">
                                <a href="{{ route('car.detail', $car->id) }}" class="link position-relative"
                                    style="display: inline-block;">
                                    @php
                                        $path = public_path('storage/' . $car->thumbnail);
                                        $imageExists = $car->thumbnail && file_exists($path);
                                    @endphp

                                    @if ($imageExists)
                                        <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img"
                                            alt="Car Image">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" class="custom-card-img"
                                            alt="No Image Available">
                                    @endif

                                    @if ($car->is_booked == '1')
                                        <div
                                            style="position: absolute;top: 0; left: 0;background: var(--text-orange);color: white;padding: 5px 10px;font-weight: bold;font-size: 14px;z-index: 10;">
                                            {{ __('messages.currently_booked') }}</div>
                                    @endif
                                </a>
                                <!--  -->
                                <div class="card-content">
                                    <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h5 class="text-muted card_orange_clr">
                                                    {{ $car->car_models->car_brands->name ?? ' ' }}
                                                    {{ $car->car_models->name ?? ' ' }}
                                                    {{ $car->year ?? ' ' }}
                                                </h5>
                                                <h6 class="text-muted" style="font-size: 12px;">
                                                    {{ ucfirst($car->transmission) }}
                                                    | {{ ucfirst($car->fuel_type) }}
                                                    | {{ __('messages.engine') }}
                                                    {{ $car->engine_size }}{{ __('messages.cc') }}
                                                </h6>
                                            </div>
                                            <div>
                                                @php
                                                    $companyProfile = $car->users->companies->company_profile ?? null;
                                                @endphp

                                                @if ($companyProfile)
                                                    <img src="{{ asset($companyProfile) }}" alt="Company Logo"
                                                        width="40" height="40"
                                                        style="object-fit: cover; border-radius: 50%;">
                                                @else
                                                    <img src="{{ asset('frontend-assets/assets/customeruser.png') }}"
                                                        alt="Default Logo"
                                                        title="{{ optional($car->users->companies)->name ?? optional($car->users)->name }}"
                                                        width="40" height="40"
                                                        style="object-fit: cover; border-radius: 50%;">
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
                                                <p>{{ convertPrice($car->advance_deposit, 0) }}</p>
                                            </div>
                                            <div class="flex-fill text-center mx-2">
                                                <h6>{{ __('messages.min') }}</h6>
                                                <p><i class="fa-solid fa-user"></i> {{ $car->min_age }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </a>
                                    <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                        <h6 class="card_orange_clr ms-2">
                                            {{ convertPrice($car->rent, 0) }}/{{ ucfirst($car->rent_type) }}</h6>
                                        <a href="{{ route('car.detail', $car->id) }}" class="link position-relative"
                                            style="display: inline-block;">
                                            <button class="book-btn">{{ __('messages.Book') }}</button>
                                        </a>
                                        {{-- @if (auth()->check())
                                        <button class="book-btn" data-carid="{{ $car->id }}"
                                            id="car-booking-btn">{{ __('messages.Book') }}</button>
                                    @else
                                        <button class="book-btn" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                                    @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="16" class="text-center">{{ __('messages.no_vehicles') }}</td>
                        </tr>
                    @endforelse
                </div>
            </div>

            <!-- Swiper Navigation -->
            <div class="d-flex justify-content-center mt-5 card-button-mobile">
                <a class="carousel-control-prev-newarrival me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <a class="carousel-control-next-newarrival">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

          <!-- chose section -->
          
       
    <div class="container chose-bg-img py-5 home-mobile-chose">
 <!-- Tablet & Mobile Section -->
<div class="container mobile text-center py-2 d-block d-lg-none">
    <h4 class="text-chose fw-bold">{{ __('messages.why_choose_us') }}</h4>
    <h3 class="fw-bold">{{ __('messages.we’re_committed_to_delivering') }} <br>
        {{ __('messages.the_best_experience') }}</h3>

    <div class="mt-4">
        <div class="mb-4">
            <img src="{{ asset('/') }}frontend-assets/icons/Vector.png" class="img-fluid mb-2" alt="">
            <h5 class="fw-bold">{{ __('messages.flexible_payment_options') }}</h5>
            <p class="text-muted">{{ __('messages.choose_from_a_variety') }}</p>
        </div>
        <div class="mb-4">
            <img src="{{ asset('/') }}frontend-assets/icons/Vector (1).png" class="img-fluid mb-2"
                alt="">
            <h5 class="fw-bold">{{ __('messages.valuable_insights') }}</h5>
            <p class="text-muted">{{ __('messages.access_personalized') }}</p>
        </div>
        <div class="mb-4">
            <img src="{{ asset('/') }}frontend-assets/icons/Vector (2).png" class="img-fluid mb-2"
                alt="">
            <h5 class="fw-bold">{{ __('messages.continuous_innovation') }}</h5>
            <p class="text-muted">{{ __('messages.we’re_always_evolving') }}</p>
        </div>
        <div class="mb-4">
            <img src="{{ asset('/') }}frontend-assets/icons/Vector (3).png" class="img-fluid mb-2"
                alt="">
            <h5 class="fw-bold">{{ __('messages.instant_online') }}</h5>
            <p class="text-muted">{{ __('messages.quickly_assess') }}</p>
        </div>
        <div class="mb-4">
            <img src="{{ asset('/') }}frontend-assets/icons/Vector (4).png" class="img-fluid mb-2"
                alt="">
            <h5 class="fw-bold">{{ __('messages.tailored_search') }}</h5>
            <p class="text-muted">{{ __('messages.effortlessly_find') }}</p>
        </div>
        <div class="mb-4">
            <img src="{{ asset('/') }}frontend-assets/icons/Vector (5).png" class="img-fluid mb-2"
                alt="">
            <h5 class="fw-bold">{{ __('messages.customer_first_approach') }}</h5>
            <p class="text-muted">{{ __('messages.your_satisfaction') }}</p>
        </div>
    </div>
</div>
        <!-- Desktop Section -->
        <div class="container Desktop  text-center py-3 d-none d-md-block">
            <h4 class="text-chose fw-bold mb-4">{{ __('messages.why_choose_us') }}</h4>
            <h3 class="fw-bold">{{ __('messages.we’re_committed_to_delivering') }} <br>
                {{ __('messages.the_best_experience') }}</h3>

            <div class="row align-items-center mt-4">
                <!-- Left Side (Icons Last) -->
                <div class="col-lg-4 text-end mt-3">
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.flexible_payment_options') }}</h5>
                            <p class="text-muted">{{ __('messages.choose_from_a_variety') }}</p>
                        </div>
                        <img src="{{ asset('/') }}frontend-assets/icons/Vector.png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.valuable_insights') }}</h5>
                            <p class="text-muted">{{ __('messages.access_personalized') }}</p>
                        </div>
                        <img src="{{ asset('/') }}frontend-assets/icons/Vector (1).png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.continuous_innovation') }}</h5>
                            <p class="text-muted">{{ __('messages.we’re_always_evolving') }}</p>
                        </div>
                        <img src="{{ asset('/') }}frontend-assets/icons/Vector (2).png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                </div>

                <!-- Center Image -->
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('/') }}frontend-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
                </div>

                <!-- Right Side (Icons First) -->
                <div class="col-lg-4 text-start">
                    <div class="mb-4 d-flex align-items-center justify-content-start">
                        <img src="{{ asset('/') }}frontend-assets/icons/Vector (3).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.instant_online') }}</h5>
                            <p class="text-muted">{{ __('messages.quickly_assess') }}</p>
                        </div>
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-start">
                        <img src="{{ asset('/') }}frontend-assets/icons/Vector (4).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.tailored_search') }}</h5>
                            <p class="text-muted">{{ __('messages.effortlessly_find') }}</p>
                        </div>
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-start">
                        <img src="{{ asset('/') }}frontend-assets/icons/Vector (5).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.customer_first_approach') }}</h5>
                            <p class="text-muted">{{ __('messages.your_satisfaction') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end chose section --}}

    <section class="container py-4 chose-mobile-car-heading">


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
  <div class="container py-5 card-text-mobile">
        <div class="swiper-container-wrapper">
            <div class="swiper chooseVehicleSwiper">
                <div class="swiper-wrapper">
                    @forelse ($cars as $car)
                        <div class="swiper-slide mb-2">
                            <div class="custom-card2">
                                <a href="{{ route('car.detail', $car->id) }}" class="link position-relative"
                                    style="display: inline-block;">
                                    @php
                                        $path = public_path('storage/' . $car->thumbnail);
                                        $imageExists = $car->thumbnail && file_exists($path);
                                    @endphp

                                    @if ($imageExists)
                                        <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img"
                                            alt="Car Image">
                                    @else
                                        <img src="{{ asset('images/no-image.png') }}" class="custom-card-img"
                                            alt="No Image Available">
                                    @endif

                                    @if ($car->is_booked == '1')
                                        <div
                                            style="position: absolute;top: 0; left: 0;background: var(--text-orange);color: white;padding: 5px 10px;font-weight: bold;font-size: 14px;z-index: 10;">
                                            {{ __('messages.currently_booked') }}</div>
                                    @endif
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
                                                <h6 class="text-muted" style="font-size: 12px;">
                                                    {{ __('messages.engine') }}
                                                    {{ ucfirst($car->transmission) }}
                                                    | {{ ucfirst($car->fuel_type) }}
                                                    | {{ __('messages.engine') }}
                                                    {{ $car->engine_size }}{{ __('messages.cc') }}
                                                </h6>
                                            </div>
                                            <div>
                                                @php
                                                    $companyProfile = $car->users->companies->company_profile ?? null;
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
                                                <p><i class="fas fa-tachometer-alt"></i> {{ $car->mileage }}</p>
                                            </div>
                                            <div class="flex-fill text-center mx-2">
                                                <h6>{{ __('messages.deposit') }}</h6>
                                                <p>{{ convertPrice($car->advance_deposit, 0) }}</p>
                                            </div>
                                            <div class="flex-fill text-center mx-2">
                                                <h6>{{ __('messages.min') }}</h6>
                                                <p><i class="fa-solid fa-user"></i> {{ $car->min_age }}</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </a>
                                    <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                        <h6 class="card_orange_clr ms-2">
                                            {{ convertPrice($car->rent, 0) }}/{{ ucfirst($car->rent_type) }}</h6>
                                        <a href="{{ route('car.detail', $car->id) }}" class="link position-relative"
                                            style="display: inline-block;">
                                            <button class="book-btn">{{ __('messages.Book') }}</button>
                                        </a>
                                        {{-- @if (auth()->check())
                                        <button class="book-btn" data-carid="{{ $car->id }}"
                                            id="car-booking-btn">{{ __('messages.Book') }}</button>
                                    @else
                                        <button class="book-btn" data-bs-toggle="modal"
                                            data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                                    @endif --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="16" class="text-center">{{ __('messages.no_vehicles') }}</td>
                        </tr>
                    @endforelse
                </div>
            </div>

            <!-- Swiper Navigation -->
            <div class="d-flex justify-content-center mt-5 card-button-mobile">
                <a class="carousel-control-prev-choosevehicle me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
                <a class="carousel-control-next-choosevehicle">
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
                        <!-- <div class="col-md-4 text-center position-relative">
                                    <div class="progress-circle position-relative">
                                        <img src="{{ asset('/') }}frontend-assets/icons/orange-icon.png" alt="Progress"
                                            class="progress-img">
                                        <div class="progress-text position-absolute top-50 start-50 translate-middle percentage">
                                            <h2 class="mb-0 text-warning" id="progress-value">0%</h2>
                                            <p class="mb-0 text-white">{{ __('messages.satisfaction') }}</p>
                                        </div>
                                    </div>
                                </div> -->
                        <!-- Partner Program Text -->
                        <div class="col-md-8">
                            <div class="d-flex align-items-end">
                                <!-- <img src="{{ asset('/') }}frontend-assets/icons/Vector 7777.png" alt="Icon"
                                            class="icon1 me-2"> -->
                                <h5 class="text-warning fw-bold text-uppercase mb-0">{{ __('messages.partner_with_us') }}
                                </h5>
                            </div>
                            <h2 class="fw-bold text-start mt-2">{{ __('messages.list_cars') }}</h2>
                            <p class="text-light text-start">
                                {{ __('messages.join_our_growing') }}.
                            </p>
                        </div>

                    </div>

                    <!-- Image Section -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}frontend-assets/assets\image 588254621.png"
                                class="img-fluid rounded" alt="Yellow Car">
                        </div>
                        <div class="col-md-6">
                            <img src="{{ asset('/') }}frontend-assets/assets\image 588254622.png"
                                class="img-fluid rounded" alt="Red Car">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-white text-start position-relative">
                <img src="{{ asset('/') }}frontend-assets/assets\Rectangle 161124402.png" alt="Right Image"
                    class="rounded book">
                <button onclick="window.location.href='{{ url('/join-our-program') }}'"
                    class="btn btn-orange-clr rounded-pill laptop-book-button  text-white d-flex align-items-center px-2 py-2 position-absolute bottom-0 end-0 mt-2 me-4">
                    {{ __('messages.become_partner') }}
                    <img src="{{ asset('/') }}frontend-assets/icons/Frame-1707482121.png" class="ms-3"
                        width="30" height="30" alt="">
                </button>
                <!-- <div class="text-end"> -->
                <button onclick="window.location.href='{{ url('/join-our-program') }}'"
                    class="btn btn-orange-clr rounded-pill tab-book-button text-white px-1 py-1">
                    {{ __('messages.become_partner') }}
                    <img src="{{ asset('/') }}frontend-assets/icons/Frame-1707482121.png" class="ms-2"
                        width="25" height="25" alt="">
                </button>
                <!-- </div> -->
            </div>
        </div>
    </section>
    <!-- MOBILE VIEW (Hidden on larger screens) -->
    <section class="mobile-view d-block d-md-none text-white partner-mobile">
        <div class="container py-4">

            <!-- Row: 98% Satisfaction + Join Us -->
            <div class="d-flex align-items-center justify-content-between">
                <!-- Satisfaction Progress -->
                <!-- <div class="progress-circle text-center">
                            <img src="{{ asset('/') }}frontend-assets/icons/orange-icon.png" alt="Progress"
                                class="progress-img">
                            <div class="progress-text">
                                <h2 class="text-warning">98%</h2>
                                <p class="text-light">{{ __('messages.satisfaction') }}</p>
                            </div>
                        </div> -->

                <!-- Join Us Text -->
                <div class="text-start ps-3">
                    <div class="icon-a">
                        <!-- <img src="{{ asset('/') }}frontend-assets/icons/Vector 7777.png" alt="Icon"
                                    class="icon1"> -->
                        <h5 class="text-warning text-uppercase join-us">{{ __('messages.partner_with_us') }}</h5>
                    </div>
                    <h2 class="program">{{ __('messages.list_cars') }}</h2>
                    <p class="join-text">
                        {{ __('messages.join_our_growing') }}
                    </p>
                </div>
            </div>
            <div class="text-center">
                <button onclick="window.location.href='{{ url('/join-our-program') }}'"
                    class="btn btn-orange-clr rounded-pill text-white">
                    {{ __('messages.become_partner') }}
                    <img src="{{ asset('/') }}frontend-assets/icons/Frame-1707482121.png" class="ms-2"
                        width="25" height="25" alt="">
                </button>
            </div>
            <div class="mt-3">
                <img width="100%" src="{{ asset('/') }}frontend-assets/assets/mobile.png"  class="img-fluid rounded"
                    alt="People with Car">
            </div>
            <!-- Images -->
            <div class="row mt-3">
                <div class="col-6">
                    <img src="{{ asset('/') }}frontend-assets/assets\image 588254621.png" class="img-fluid rounded"
                        alt="Yellow Car">
                </div>
                <div class="col-6">
                    <img src="{{ asset('/') }}frontend-assets/assets\image 588254622.png" class="img-fluid rounded"
                        alt="Red Car">
                </div>
            </div>
        </div>
    </section>

    <!-- Accordion Section -->
    <section class="container-fluid py-5 mt-5 questions-mobile">
        <div class="container">
            <div class="row">
                <!-- Left Side Text (4 columns) -->
                <div class="col-md-4 accordion-text">
                    <h2 class="fw-bold">{{ __('messages.any_questions') }}?</h2>
                    <h2 class="fw-bold">{{ __('messages.we_got_you') }}.</h2>
                    <p class="text-muted questions">
                        {{ __('messages.our_cutting-edge_home') }}
                    </p>
                </div>

                <!-- Middle Accordion (3 items) -->
                <div class="col-md-4">
                    <div class="accordion" id="faqAccordion1">
                        <!-- First Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingOne1">
                                <button class="accordion-button fw-bold shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="true"
                                    aria-controls="collapseOne1">
                                    {{ __('messages.Faq1') }}
                                </button>
                            </h2>
                            <div id="collapseOne1" class="accordion-collapse collapse show" aria-labelledby="headingOne1"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq1_answer') }}
                                </div>
                            </div>
                        </div>

                        <!-- Second Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingTwo1">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false"
                                    aria-controls="collapseTwo1">
                                    {{ __('messages.Faq2') }}
                                </button>
                            </h2>
                            <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwo1"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq2_answer') }}
                                </div>
                            </div>
                        </div>

                        <!-- Third Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingThree1">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false"
                                    aria-controls="collapseThree1">
                                    {{ __('messages.Faq3') }}
                                </button>
                            </h2>
                            <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq3_answer') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Accordion (3 more items) -->
                <div class="col-md-4">
                    <div class="accordion" id="faqAccordion2">
                        <!-- Fourth Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button fw-bold shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true"
                                    aria-controls="collapseFour">
                                    {{ __('messages.Faq4') }}
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse show" aria-labelledby="headingFour"
                                data-bs-parent="#faqAccordion2">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq4_answer') }}
                                </div>
                            </div>
                        </div>

                        <!-- Fifth Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    {{ __('messages.Faq5') }}
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#faqAccordion2">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq5_answer') }}
                                </div>
                            </div>
                        </div>

                        <!-- Sixth Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    {{ __('messages.Faq6') }}
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#faqAccordion2">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq6_answer') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End of Right Accordion -->
            </div>
        </div>
    </section>

    <!-- Swiper JS - Individual Initialization for Each Swiper -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Featured Vehicles Swiper
            var featuredSwiper = new Swiper(".featuredSwiper", {
                loop: true,
                slidesPerView: 3,
                spaceBetween: 10,
                centeredSlides: false,
                watchOverflow: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: ".carousel-control-next-featured",
                    prevEl: ".carousel-control-prev-featured",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    }
                }
            });

            // New Arrival Swiper
            var newArrivalSwiper = new Swiper(".newArrivalSwiper", {
                loop: true,
                slidesPerView: 3,
                spaceBetween: 10,
                centeredSlides: false,
                watchOverflow: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: ".carousel-control-next-newarrival",
                    prevEl: ".carousel-control-prev-newarrival",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    }
                }
            });

            // Choose Vehicle Swiper
            var chooseVehicleSwiper = new Swiper(".chooseVehicleSwiper", {
                loop: true,
                slidesPerView: 3,
                spaceBetween: 10,
                centeredSlides: false,
                watchOverflow: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false
                },
                navigation: {
                    nextEl: ".carousel-control-next-choosevehicle",
                    prevEl: ".carousel-control-prev-choosevehicle",
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 5
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 10
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 15
                    }
                }
            });
        });
        // car load in home page

        $(document).ready(function() {
            let isLoading = false;
            let categoryLastCarId = {};
            let currentCategory = null;

            $("#car-container").hide();
            $("#load-more-btn").hide();

            function loadCars(categoryId, append = false) {
                if (isLoading) return;
                isLoading = true;

                let offset = categoryLastCarId[categoryId] || 0;

                $.ajax({
                    url: "{{ route('home.cars.load') }}",
                    method: "GET",
                    data: {
                        car_category_id: categoryId,
                        offset: offset
                    },
                    success: function(response) {
                        if (!append) {
                            $("#car-category-list").html(response.cars);
                        } else {
                            $("#car-category-list").append(response.cars);
                        }

                        if ($("#car-category-list").children().length > 0) {
                            $("#car-container").show();
                        } else {
                            $("#car-container").hide();
                        }

                        categoryLastCarId[categoryId] = offset + 6;

                        if (response.hasMore) {
                            $("#load-more-btn").show();
                        } else {
                            $("#load-more-btn").hide();
                        }

                        isLoading = false;
                    },
                    error: function(err) {
                        console.error(err);
                        isLoading = false;
                    }
                });
            }

            $(document).on("click", ".filter-btn", function() {
                let selectedCategoryId = $(this).data("category");
                if (!selectedCategoryId) return;

                currentCategory = selectedCategoryId;
                categoryLastCarId[currentCategory] = 0;

                $("#car-container").hide();
                $("#load-more-btn").hide();

                loadCars(currentCategory, false);
            });

            $(document).on("click", "#load-more-btn", function() {
                if (currentCategory) {
                    loadCars(currentCategory, true);
                }
            });
        });

    </script>
@endsection
