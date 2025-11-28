@extends('website.layout.master')
@section('title')
    {{ __('messages.category') }}
@endsection
@section('content')
    <!-- add to cart js -->
    <script src="{{ asset('/frontend-assets/assets/Js/addtocart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    <div class="container py-4 mt-5 category-heading-main">
        <h2 class="text-center fw-bold mb-3">{{ __('messages.select_a_category') }}</h2>

        <div class="container text-center my-5 category-heading-main">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <button class="btn btn-primary filter-btn" data-category="All">{{ __('messages.all') }}</button>
                @foreach ($categories as $category)
                    <button class="btn btn-dark filter-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>

        <div class="container py-5 category-car-main">
            <div class="row g-4" id="car-category-list">
                @include('website.category.include.car-item', ['cars' => $cars])
            </div>
            @if ($totalCars > 6)
                <div class="text-center text-load-more">
                    <button id="load-more-btn" class="btn btn-orange-clr text-white"
                        data-url="{{ route('load.more.category.cars') }}" data-target="car-category-list" data-offset="8"
                        data-model="Car">
                        {{ __('messages.load_more') }}
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
    <div class="container py-5 category-work-mobile">
        <h2 class="text-center fw-bold work-text-clr mb-4">{{ __('messages.how_it_works') }}</h2>
        <p class="text-center work-subtitle">{{ __('messages.booking_an_economical') }}</p>
        <div class="steps mobile-steps">
            <div class="step-item reverse">
                {{-- <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div> --}}
                <div class="step-content">
                    <h4>{{ __('messages.browse') }}</h4>
                    <p>{{ __('messages.explore_our_selection') }}</p>
                </div>
            </div>

            <div class="step-item ">
                {{-- <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div> --}}
                <div class="step-content">
                    <h4>{{ __('messages.filter_&_select') }}</h4>
                    <p>{{ __('messages.use_our_filters') }}</p>
                </div>
            </div>
            <div class="step-item reverse">
                {{-- <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div> --}}
                <div class="step-content">
                    <h4>{{ __('messages.Book') }}</h4>
                    <p>{{ __('messages.use_our_intuitive') }}.</p>
                </div>
            </div>

            <div class="step-item">
                {{-- <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/work-handshake.png"
                        alt="Step Icon"></div> --}}
                <div class="step-content">
                    <h4>{{ __('messages.pick_up_drive') }}</h4>
                    <p>{{ __('messages.collect_your_vehicle') }}.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- work end -->

    <!-- tip section -->
    <div class="container text-center py-5 mobile-tip-category">
        <h2 class="mb-4 fw-bold">{{ __('messages.tips_for_renting') }}</h2>

        <div class="row justify-content-center">
            <!-- Plan Ahead -->
            <div class="col-md-4 mobile-tip-category-card">
                <div class="tip-card text-center p-3">
                    <div class="mb-2">
                        <img src="{{ asset('/') }}frontend-assets/icons/tip-img-1.png" alt="Plan Ahead"
                            class="img-fluid">
                    </div>
                    <h5 class="tip-title mobile-tip-category-text">{{ __('messages.plan_ahead') }}</h5>
                    <p class="tip-description">
                        {{ __('messages.economical_vehicles') }}.
                    </p>
                </div>
            </div>

            <!-- Verify Features -->
            <div class="col-md-4 mobile-tip-category-card">
                <div class="tip-card active text-center p-3">
                    <div class="mb-2">
                        <img src="{{ asset('/') }}frontend-assets/icons/tip-img-2.png" alt="Verify Features"
                            class="img-fluid">
                    </div>
                    <h5 class="tip-title mobile-tip-category-text">{{ __('messages.verify_features') }}</h5>
                    <p class="tip-description">
                        {{ __('messages.double_check_fuel') }}.
                    </p>
                </div>
            </div>

            <!-- Longer Rentals -->
            <div class="col-md-4 mobile-tip-category-card">
                <div class="tip-card text-center p-3">
                    <div class="mb-2">
                        <img src="{{ asset('/') }}frontend-assets/icons/tip-img-3.png" alt="Longer Rentals"
                            class="img-fluid">
                    </div>
                    <h5 class="tip-title mobile-tip-category-text">{{ __('messages.longer_rental') }}</h5>
                    <p class="tip-description">
                        {{ __('messages.consider_weekly') }}.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- end tip section -->

        <!-- chose section -->
    <div class="container chose-bg-img py-5 category-mobile-chose">

        <!-- Mobile Section -->
        <div class="container mobile text-center py-2 d-block d-md-none">
            <h4 class="text-chose fw-bold">{{ __('messages.why_choose_us') }}</h4>
            <h3 class="fw-bold">{{ __('messages.we’re_committed_to_delivering_home') }} <br>
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
            <h3 class="fw-bold">{{ __('messages.we’re_committed_to_delivering_home') }} <br>
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

     <!-- Accordion Section -->
    <section class="container-fluid py-5 mobile-join-accordion-category">
        <div class="container">
            <div class="row">
                <!-- Left Side Text (4 columns) -->
                <div class="col-md-4 accordion-text">
                    <h4 class="fw-bold new-design">{{ __('messages.any_questions') }}?</h4>
                    <h4 class="fw-bold new-design">{{ __('messages.we_got_you') }}</h4>
                    <p class="text-muted questions">
                        {{ __('messages.our_cutting-edge') }}
                    </p>
                </div>

                <!-- Middle Accordion (3 items) -->
                <div class="col-md-4">
                    <div class="accordion" id="faqAccordion1">
                        <!-- First Item -->

                       <div class="accordion-item border-0 border-bottom">
                        <h4 class="accordion-header" id="headingOne1">
                            <button class="accordion-button collapsed fw-bold shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="false"
                                aria-controls="collapseOne1">
                                {{ __('messages.Faq1') }}
                            </button>
                        </h4>
                        <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1"
                            data-bs-parent="#faqAccordion1">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Faq1_answer') }}

                            </div>
                        </div>
                    </div>
                    
                        <!-- Second Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h4 class="accordion-header" id="headingTwo1">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo1" aria-expanded="false"
                                    aria-controls="collapseTwo1">
                                    {{ __('messages.Faq2') }}
                                </button>
                            </h4>
                            <div id="collapseTwo1" class="accordion-collapse collapse" aria-labelledby="headingTwo1"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq2_answer') }}
                                </div>
                            </div>
                        </div>

                        <!-- Third Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h4 class="accordion-header" id="headingThree1">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree1" aria-expanded="false"
                                    aria-controls="collapseThree1">
                                    {{ __('messages.Faq3') }}
                                </button>
                            </h4>
                            <div id="collapseThree1" class="accordion-collapse collapse" aria-labelledby="headingThree1"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body text-muted">
                                    {{ __('messages.Faq3_answer') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                <div class="accordion" id="faqAccordion2">

                    <!-- Fourth Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h4 class="accordion-header" id="headingFour">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                {{ __('messages.Faq4') }}
                            </button>
                        </h4>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#faqAccordion2">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Faq4_answer') }}
                            </div>
                        </div>
                    </div>

                    <!-- Fifth Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h4 class="accordion-header" id="headingFive">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false"
                                aria-controls="collapseFive">
                                {{ __('messages.Faq5') }}
                            </button>
                        </h4>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                            data-bs-parent="#faqAccordion2">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Faq5_answer') }}
                            </div>
                        </div>
                    </div>

                    <!-- Sixth Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h4 class="accordion-header" id="headingSix">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false"
                                aria-controls="collapseSix">
                                {{ __('messages.Faq6') }}
                            </button>
                        </h4>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                            data-bs-parent="#faqAccordion2">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Faq6_answer') }}
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
   $(document).ready(function() {
    let categoryLastCarId = {};
    let currentCategory = "All"; 
    let isLoading = false;

    function loadCars(categoryId, append = false) {
        if (isLoading) return;
        isLoading = true;
        let offset = categoryLastCarId[categoryId] || 0;

        $.ajax({
            url: "{{ route('load.more.category.cars') }}",
            method: "GET",
            data: {
                model: "Car",
                car_category_id: categoryId,
                offset: offset
            },
            success: function(response) {
                if (!append) {
                    $("#car-category-list").html(response.cars);
                } else {
                    $("#car-category-list").append(response.cars);
                }

                if ($.trim(response.cars) === "") {
                    $("#car-category-list").html('<div class="text-center text-orange fw-bold mt-4">{{ __("messages.This category has no records") }}</div>');
                    $("#load-more-btn").hide();
                } else {
                    categoryLastCarId[categoryId] = offset + 6;
                    $("#load-more-btn").toggle(response.hasMore);
                }

                isLoading = false;
            },
            error: function() {
                isLoading = false;
            }
        });
    }

    function getCategoryIdByName(name) {
        let id = null;
        $(".filter-btn").each(function() {
            if ($(this).text().trim() === name) {
                id = $(this).data("category");
            }
        });
        return id;
    }

    let categoryNameFromURL = new URLSearchParams(window.location.search).get("category") || "All";
    let initialCategoryId = categoryNameFromURL === "All" ? "All" : getCategoryIdByName(categoryNameFromURL);
    currentCategory = initialCategoryId;
    categoryLastCarId[currentCategory] = 0;

    $(".filter-btn").removeClass("btn-primary").addClass("btn-dark");
    $(".filter-btn").each(function() {
        if ($(this).data("category") == currentCategory) {
            $(this).removeClass("btn-dark").addClass("btn-primary");
        }
    });

    loadCars(currentCategory, false);

    $(document).on("click", ".filter-btn", function() {
        let selectedCategoryId = $(this).data("category");
        if (selectedCategoryId !== currentCategory) {
            currentCategory = selectedCategoryId;
            categoryLastCarId[currentCategory] = 0;
        }

        $(".filter-btn").removeClass("btn-primary").addClass("btn-dark");
        $(this).removeClass("btn-dark").addClass("btn-primary");

        $("#load-more-btn").hide();
        loadCars(currentCategory, false);
    });

    $(document).on("click", "#load-more-btn", function() {
        loadCars(currentCategory, true);
    });
});
</script>

@endsection
