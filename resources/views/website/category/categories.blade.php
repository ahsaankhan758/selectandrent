@extends('website.layout.master')
@section('title', "{{ __('messages.Category') }} | {{ __('messages.Select and Rent') }}")
@section('content')
<!-- add to cart js -->
<script src="{{asset('/frontend-assets/assets/Js/addtocart.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    <div class="container py-4 mt-5">
        <h2 class="text-center mb-3">{{ __('messages.Select a Category') }}</h2>
        <!-- 🔹 Category Buttons -->
        <!-- 🔹 Tabs Buttons -->
        <div class="container text-center my-3">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <button class="btn btn-primary filter-btn" data-category="All">{{ __('messages.All') }}</button>
                @foreach ($categories as $category)
                    <button class="btn btn-dark filter-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>


       <!-- 🔹 Cars List -->

    <div class="container mt-5">
        <div class="row g-4" id="car-category-list">
            @include('website.category.include.car-item', ['cars' => $cars])
        </div>

    <!-- 🔹 Load More for "All" Category -->
    @if($totalCars > 8)
    <div class="text-center mt-4">
        <button id="load-more-btn" class="btn btn-orange-clr text-white" 
                data-url="{{ route('load.more.category.cars') }}" 
                data-target="car-category-list" 
                data-offset="8" 
                data-model="Car">
                {{ __('messages.Load More') }}
        </button>
    </div>
    @endif
</div>

        

        <!-- View All Button -->
        {{-- <div class="d-flex justify-content-center mt-4">

            <button class="btn  rounded-pill text-white btn-orange-clr" data-bs-toggle="modal"
                data-bs-target="#carRentalModal">
                View All <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2"
                    width="20" height="20" alt="">
            </button>

        </div> --}}

    </div>


    <!-- Work -->
    <div class="container py-5">
        <h2 class="text-center work-text-clr mb-4">{{ __('messages.How It Works') }}</h2>
        <p class="text-center work-subtitle">{{ __('messages.Booking an economical car with SelectandRent is simple') }}</p>
        <div class="steps">
            <div class="step-item reverse">
                <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.Browse') }}</h4>
                    <p>{{ __('messages.Explore our selection of economical cars') }}.</p>
                </div>
            </div>

            <div class="step-item ">
                <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.Filter & Select') }}</h4>
                    <p>{{ __('messages.Use our filters to narrow down your choices and select your preferred car') }} .</p>
                </div>
            </div>
            <div class="step-item reverse">
                <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.Book') }}</h4>
                    <p>{{ __('messages.Use our intuitive calendar to update car availability and pricing') }}.</p>
                </div>
            </div>

            <div class="step-item">
                <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.Pick Up & Drive') }}</h4>
                    <p>{{ __('messages.Collect your car and start your journey') }}.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- work end -->

    <!-- tip section -->
    <div class="container text-center my-5">
        <h2 class="mb-4">{{ __('messages.Tips for Renting') }}</h2>

        <div class="row justify-content-center">
            <!-- Plan Ahead -->
            <div class="col-md-4">
                <div class="tip-card text-center p-3">
                    <div class="icon-container mb-2">
                        <img src="{{asset('/')}}frontend-assets/icons/tip-img-1.png" alt="Plan Ahead" class="img-fluid">
                    </div>
                    <h5 class="tip-title">{{ __('messages.Plan Ahead') }}</h5>
                    <p class="tip-description">
                        {{ __('messages.Economical cars are in high demand; book early for better availability') }}.
                    </p>
                </div>
            </div>

            <!-- Verify Features -->
            <div class="col-md-4">
                <div class="tip-card active text-center p-3">
                    <div class="icon-container mb-2">
                        <img src="{{asset('/')}}frontend-assets/icons/tip-img-2.png" alt="Verify Features"
                            class="img-fluid">
                    </div>
                    <h5 class="tip-title">{{ __('messages.Verify Features') }}</h5>
                    <p class="tip-description">
                        {{ __('messages.Double-check fuel efficiency and included features before booking') }}.
                    </p>
                </div>
            </div>

            <!-- Longer Rentals -->
            <div class="col-md-4">
                <div class="tip-card text-center p-3">
                    <div class="icon-container mb-2">
                        <img src="{{asset('/')}}frontend-assets/icons/tip-img-3.png" alt="Longer Rentals"
                            class="img-fluid">
                    </div>
                    <h5 class="tip-title">{{ __('messages.Longer Rentals') }}</h5>
                    <p class="tip-description">
                        {{ __('messages.Consider weekly or monthly rentals for additional savings') }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end tip section -->

    <!-- chose section -->
    <div class="container-fluid bg-white chose-bg-img mt-4">

        <!-- Mobile Section -->
        <div class="container mobile text-center py-5 d-block d-md-none">
            <h4 class="text-warning fw-bold">{{ __('messages.Why we choose us') }}</h4>
            <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }} <br> {{ __('messages.Customer Experience') }} </h3>

            <div class="mt-4">
                <div class="mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector.png" class="img-fluid mb-2" alt="">
                    <h5 class="fw-bold">{{ __('messages.Affordable Pricing') }}</h5>
                    <p class="text-muted">{{ __('messages.Enjoy low daily rates without compromising on quality') }}.</p>
                </div>
                <div class="mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="img-fluid mb-2"
                        alt="">
                        <h5 class="fw-bold">{{ __('messages.Perfect for Short Trips') }}</h5>
                        <p class="text-muted">{{ __('messages.Ideal for city drives, quick errands, or budget travel') }}.</p>
                </div>
                <div class="mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="img-fluid mb-2"
                        alt="">
                        <h5 class="fw-bold">{{ __('messages.Fuel Efficiency') }}</h5>
                        <p class="text-muted">{{ __('messages.Save on gas with cars designed for maximum mileage') }}.</p>
                </div>
                <div class="mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="img-fluid mb-2"
                        alt="">
                        <h5 class="fw-bold">{{ __('messages.Wide Selection') }}</h5>
                        <p class="text-muted">{{ __('messages.Choose from compact, mid-sized, and family-friendly models') }}.</p>
                </div>
            </div>
        </div>

        <!-- Desktop Section -->
        <div class="container Desktop  text-center py-5 d-none d-md-block">
            <h4 class="text-warning fw-bold">{{ __('messages.Why we choose us') }}</h4>
            <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }}  <br> {{ __('messages.Customer Experience') }} </h3>

            <div class="row align-items-center mt-4">
                <!-- Left Side (Icons Last) -->
                <div class="col-lg-4 text-end">
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.Most Flexible Payment') }}</h5>
                            <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                                .</p>
                        </div>
                        <img src="{{asset('/')}}frontend-assets/icons/Vector.png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.Valuable Insights') }}</h5>
                            <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                                .</p>
                        </div>
                        <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.Non-Stop Innovation') }}</h5>
                            <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                                .</p>
                        </div>
                        <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                </div>

                <!-- Center Image -->
                <div class="col-lg-4 text-center">
                    <img src="{{asset('/')}}frontend-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
                </div>

                <!-- Right Side (Icons First) -->
                <div class="col-lg-4 text-start">
                    <div class="mb-4 d-flex align-items-center">
                        <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.Online Car Appraisal') }}</h5>
                            <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                                .</p>
                        </div>
                    </div>
                    <div class="mb-4 d-flex align-items-center">
                        <img src="{{asset('/')}}frontend-assets/icons/Vector (4).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.Personalized Search') }}</h5>
                            <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                                .</p>
                        </div>
                    </div>
                    <div class="mb-4 d-flex align-items-center">
                        <img src="{{asset('/')}}frontend-assets/icons/Vector (5).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">{{ __('messages.Consumer–First Mentality') }}</h5>
                            <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                               .</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tab -->
    <div class="container tab text-center py-5 d-none d-sm-block d-md-none">
        <h4 class="text-warning fw-bold">{{ __('messages.Why we choose us') }}</h4>
        <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }} <br> {{ __('messages.Customer Experience') }}</h3>

        <div class="row align-items-center mt-4">
            <!-- Left Side (First Three Icons) -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">{{ __('messages.Online Car Appraisal') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive
                            customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="ml-3 img-fixed"
                        alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">{{ __('messages.Personalized Search') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                        .</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (4).png" class="ml-3 img-fixed"
                        alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">{{ __('messages.Consumer-First Mentality') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                            .</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (5).png" class="ml-3 img-fixed"
                        alt="">
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
                        <h5 class="fw-bold custom-tab text-start mb-1">{{ __('messages.Most Flexible Payment') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                            .</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="me-3 img-fixed"
                        alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">{{ __('messages.Valuable Insights') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                            .</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="me-3 img-fixed"
                        alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">{{ __('messages.Non-Stop Innovation') }}</h5>
                        <p class="text-muted text-start">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}
                            .</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Choose Section End-->

    <!-- Accordion Section -->
    <section class="container-fluid bg-white py-5">
        <div class="container">
            <div class="row">
                <!-- Left Side Text -->
                <div class="col-md-6 ml-1 accordion-text">
                    <h5 class="faq">{{ __('messages.FAQ') }}</h5>
                    <div>
                        <h1 class="fw-bold">{{ __('messages.Here are some common questions about renting economical cars') }}:"</h1>
                    </div>
                </div>
                <!-- Right Side Accordion -->
                <div class="col-md-6">
                    <div class="accordion" id="faqAccordion">

                        <!-- First Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-bold shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    {{ __('messages.What is considered an economical car') }}?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Economical cars are typically compact or mid-sized vehicles with low rental and fuel costs') }}
                                    .
                                </div>
                            </div>
                        </div>

                        <!-- Second Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    {{ __('messages.Are economical cars suitable for long drives') }}?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Economical cars are typically compact or mid-sized vehicles with low rental and fuel costs') }}.
                                </div>
                            </div>
                        </div>

                        <!-- Third Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    {{ __('messages.Can I add insurance to my rental') }}?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Economical cars are typically compact or mid-sized vehicles with low rental and fuel costs') }}.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end accordian -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>

$(document).ready(function () {
    let categoryLastCarId = {}; // Store last car ID for each category
    let currentCategory = "All";
    let isLoading = false;

    function loadCars(categoryId, append = false) {
        if (isLoading) return;
        isLoading = true;

        let offset = categoryLastCarId[categoryId] || 0;
        let model = "Car";

        $.ajax({
            url: "{{ route('load.more.category.cars') }}",
            method: "GET",
            data: {
                model: model,
                car_category_id: categoryId,
                offset: offset
            },
            success: function (response) {
                if (!append) {
                    $("#car-category-list").html(response.cars);
                } else {
                    $("#car-category-list").append(response.cars);
                }

                // Check if there are no records
                if ($.trim(response.cars) === "") {
                    $("#car-category-list").html('<div class="text-center text-orange fw-bold mt-4">{{ __('messages.This category has no records') }}</div>');
                    $("#load-more-btn").hide(); // Hide Load More button
                } else {
                    // Update offset for the category
                    categoryLastCarId[categoryId] = offset + 8;

                    // Show Load More button for "All" category
                    if (categoryId === "All") {
                        $("#load-more-btn").show();
                    }

                    // Show/hide Load More button
                    if (!response.hasMore) {
                        $("#load-more-btn").hide();
                    } else {
                        $("#load-more-btn").show();
                    }
                }

                isLoading = false;
            },
            error: function () {
                isLoading = false;
            }
        });
    }

    // Default Load
    categoryLastCarId["All"] = 0;
    loadCars("All", false);

    // Category Change
    $(document).on("click", ".filter-btn", function () {

        $(".filter-btn").removeClass("btn-primary").addClass("btn-dark");
        $(this).removeClass("btn-dark").addClass("btn-primary");

        let selectedCategory = $(this).data("category");

        if (selectedCategory !== currentCategory) {
            currentCategory = selectedCategory;
            categoryLastCarId[currentCategory] = 0; // Reset offset for new category
        }

        $("#load-more-btn").hide(); // Hide Load More initially
        loadCars(currentCategory, false);
    });

    // Load More Button Click
    $(document).on("click", "#load-more-btn", function () {
        loadCars(currentCategory, true);
    });
});



    </script>
@endsection
