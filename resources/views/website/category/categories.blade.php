@extends('website.layout.master')
@section('title', 'Category | Select and Rent')
@section('content')
    <div class="container py-4 mt-5">
        <h2 class="text-center mb-3">Select a Category</h2>
        <!-- 🔹 Category Buttons -->
        <!-- 🔹 Tabs Buttons -->
        <div class="container text-center my-3">
            <div class="d-flex flex-wrap justify-content-center gap-2">
                <button class="btn btn-primary filter-btn" data-category="All">All</button>
                @foreach ($categories as $category)
                    <button class="btn btn-dark filter-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </div>
        </div>

        <!-- 🔹 Cars List -->
        <div class="container mt-5">
            <div class="row g-4" id="car-list">
                @include('website.category.include.car-item', ['cars' => $cars])
            </div>

            <!-- 🔹 Load More for "All" Category -->
            <div class="text-center mt-4">
                <button id="load-more-category" class="btn btn-primary" style="display: none;">Load More</button>
            </div>

            <!-- 🔹 Load More for Selected Category -->
            <div class="text-center mt-4">
                <button id="load-tab-more" class="btn btn-success" style="display: none;">Load More</button>
            </div>
        </div>
        

        <!-- View All Button -->
        <div class="d-flex justify-content-center mt-4">
            <button class="btn  rounded-pill text-white btn-orange-clr" data-bs-toggle="modal"
                data-bs-target="#carRentalModal">
                View All <img src="{{ asset('/') }}company-assets/icons/Frame-1707482121.png" class="ms-2"
                    width="20" height="20" alt="">
            </button>
        </div>
    </div>


    <!-- Work -->
    <div class="container py-5">
        <h2 class="text-center work-text-clr mb-4">How It Works</h2>
        <p class="text-center work-subtitle">Booking an economical car with SelectandRent is simple</p>
        <div class="steps">
            <div class="step-item reverse">
                <div class="icon-wrap"><img src="{{ asset('/') }}company-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>Browse</h4>
                    <p>Explore our selection of economical cars.</p>
                </div>
            </div>

            <div class="step-item ">
                <div class="icon-wrap"><img src="{{ asset('/') }}company-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>Filter & Select</h4>
                    <p> Use our filters to narrow down your choices and select your preferred car.</p>
                </div>
            </div>
            <div class="step-item reverse">
                <div class="icon-wrap"><img src="{{ asset('/') }}company-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>Book</h4>
                    <p>Use our intuitive calendar to update car availability and pricing.</p>
                </div>
            </div>

            <div class="step-item">
                <div class="icon-wrap"><img src="{{ asset('/') }}company-assets/icons/work-handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>Pick Up & Drive</h4>
                    <p>Collect your car and start your journey.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- work end -->

    <!-- tip section -->
    <div class="container text-center my-5">
        <h2 class="mb-4">Tips for Renting</h2>

        <div class="row justify-content-center">
            <!-- Plan Ahead -->
            <div class="col-md-4">
                <div class="tip-card text-center p-3">
                    <div class="icon-container mb-2">
                        <img src="{{ asset('/') }}company-assets/icons/tip-img-1.png" alt="Plan Ahead" class="img-fluid">
                    </div>
                    <h5 class="tip-title">Plan Ahead</h5>
                    <p class="tip-description">
                        Economical cars are in high demand; book early for better availability.
                    </p>
                </div>
            </div>

            <!-- Verify Features -->
            <div class="col-md-4">
                <div class="tip-card active text-center p-3">
                    <div class="icon-container mb-2">
                        <img src="{{ asset('/') }}company-assets/icons/tip-img-2.png" alt="Verify Features"
                            class="img-fluid">
                    </div>
                    <h5 class="tip-title">Verify Features</h5>
                    <p class="tip-description">
                        Double-check fuel efficiency and included features before booking.
                    </p>
                </div>
            </div>

            <!-- Longer Rentals -->
            <div class="col-md-4">
                <div class="tip-card text-center p-3">
                    <div class="icon-container mb-2">
                        <img src="{{ asset('/') }}company-assets/icons/tip-img-3.png" alt="Longer Rentals"
                            class="img-fluid">
                    </div>
                    <h5 class="tip-title">Longer Rentals</h5>
                    <p class="tip-description">
                        Consider weekly or monthly rentals for additional savings.
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
            <h4 class="text-warning fw-bold">Why we choose us</h4>
            <h3 class="fw-bold">We Are Ensuring the Best <br> Customer Experience</h3>

            <div class="mt-4">
                <div class="mb-4">
                    <img src="{{ asset('/') }}company-assets/icons/Vector.png" class="img-fluid mb-2" alt="">
                    <h5 class="fw-bold">Affordable Pricing</h5>
                    <p class="text-muted">Enjoy low daily rates without compromising on quality.</p>
                </div>
                <div class="mb-4">
                    <img src="{{ asset('/') }}company-assets/icons/Vector (1).png" class="img-fluid mb-2"
                        alt="">
                    <h5 class="fw-bold">Perfect for Short Trips</h5>
                    <p class="text-muted">Ideal for city drives, quick errands, or budget travel.</p>
                </div>
                <div class="mb-4">
                    <img src="{{ asset('/') }}company-assets/icons/Vector (2).png" class="img-fluid mb-2"
                        alt="">
                    <h5 class="fw-bold">Fuel Efficiency</h5>
                    <p class="text-muted">Save on gas with cars designed for maximum mileage.</p>
                </div>
                <div class="mb-4">
                    <img src="{{ asset('/') }}company-assets/icons/Vector (3).png" class="img-fluid mb-2"
                        alt="">
                    <h5 class="fw-bold">Wide Selection</h5>
                    <p class="text-muted">Choose from compact, mid-sized, and family-friendly models.</p>
                </div>
            </div>
        </div>

        <!-- Desktop Section -->
        <div class="container Desktop  text-center py-5 d-none d-md-block">
            <h4 class="text-warning fw-bold">Why we choose us</h4>
            <h3 class="fw-bold">We Are Ensuring the Best <br> Customer Experience</h3>

            <div class="row align-items-center mt-4">
                <!-- Left Side (Icons Last) -->
                <div class="col-lg-4 text-end">
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">Most Flexible Payment</h5>
                            <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer
                                service.</p>
                        </div>
                        <img src="{{ asset('/') }}company-assets/icons/Vector.png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">Valuable Insights</h5>
                            <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer
                                service.</p>
                        </div>
                        <img src="{{ asset('/') }}company-assets/icons/Vector (1).png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                    <div class="mb-4 d-flex align-items-center justify-content-end">
                        <div>
                            <h5 class="fw-bold mb-1">Non-Stop Innovation</h5>
                            <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer
                                service.</p>
                        </div>
                        <img src="{{ asset('/') }}company-assets/icons/Vector (2).png" class="ms-3 img-fixed"
                            alt="">
                    </div>
                </div>

                <!-- Center Image -->
                <div class="col-lg-4 text-center">
                    <img src="{{ asset('/') }}company-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
                </div>

                <!-- Right Side (Icons First) -->
                <div class="col-lg-4 text-start">
                    <div class="mb-4 d-flex align-items-center">
                        <img src="{{ asset('/') }}company-assets/icons/Vector (3).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">Online Car Appraisal</h5>
                            <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer
                                service.</p>
                        </div>
                    </div>
                    <div class="mb-4 d-flex align-items-center">
                        <img src="{{ asset('/') }}company-assets/icons/Vector (4).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">Personalized Search</h5>
                            <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer
                                service.</p>
                        </div>
                    </div>
                    <div class="mb-4 d-flex align-items-center">
                        <img src="{{ asset('/') }}company-assets/icons/Vector (5).png" class="me-3 img-fixed"
                            alt="">
                        <div>
                            <h5 class="fw-bold mb-1">Consumer–First Mentality</h5>
                            <p class="text-muted">Uniquely revolutionize manufactured products for interactive customer
                                service.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tab -->
    <div class="container tab text-center py-5 d-none d-sm-block d-md-none">
        <h4 class="text-warning fw-bold">Why we choose us</h4>
        <h3 class="fw-bold">We Are Ensuring the Best <br> Customer Experience</h3>

        <div class="row align-items-center mt-4">
            <!-- Left Side (First Three Icons) -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">Online Car Appraisal</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive
                            customer service.</p>
                    </div>
                    <img src="{{ asset('/') }}company-assets/icons/Vector (3).png" class="ml-3 img-fixed"
                        alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">Personalized Search</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive
                            customer service.</p>
                    </div>
                    <img src="{{ asset('/') }}company-assets/icons/Vector (4).png" class="ml-3 img-fixed"
                        alt="">
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <div>
                        <h5 class="fw-bold mb-1 custom-tab text-start">Consumer-First Mentality</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive
                            customer service.</p>
                    </div>
                    <img src="{{ asset('/') }}company-assets/icons/Vector (5).png" class="ml-3 img-fixed"
                        alt="">
                </div>
            </div>

            <!-- Center Image -->
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('/') }}company-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
            </div>

            <!-- Right Side (Last Three Icons) -->
            <div class="col-md-4 mb-4 d-flex flex-column align-items-center">
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{ asset('/') }}company-assets/icons/Vector.png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">Most Flexible Payment</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive
                            customer service.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{ asset('/') }}company-assets/icons/Vector (1).png" class="me-3 img-fixed"
                        alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">Valuable Insights</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive
                            customer service.</p>
                    </div>
                </div>
                <div class="d-flex align-items-center justify-content-center mb-4">
                    <img src="{{ asset('/') }}company-assets/icons/Vector (2).png" class="me-3 img-fixed"
                        alt="">
                    <div>
                        <h5 class="fw-bold custom-tab text-start mb-1">Non-Stop Innovation</h5>
                        <p class="text-muted text-start">Uniquely revolutionize manufactured products for interactive
                            customer service.</p>
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
                    <h5 class="faq">FAQ</h5>
                    <div>
                        <h1 class="fw-bold">Here are some common questions about renting economical cars:"</h1>
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
                                    What is considered an economical car?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Economical cars are typically compact or mid-sized vehicles with low rental and fuel
                                    costs.
                                </div>
                            </div>
                        </div>

                        <!-- Second Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Are economical cars suitable for long drives?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Economical cars are typically compact or mid-sized vehicles with low rental and fuel
                                    costs.
                                </div>
                            </div>
                        </div>

                        <!-- Third Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button fw-bold collapsed shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Can I add insurance to my rental?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Economical cars are typically compact or mid-sized vehicles with low rental and fuel
                                    costs.
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
    let categoryLastCarId = {}; // Store last car ID for each category
    let currentCategory = "All";
    let isLoading = false; // Prevent multiple clicks

    function loadCars(categoryId, append = false) {
        if (isLoading) return; // Prevent multiple clicks
        isLoading = true; 

        let lastCarId = categoryLastCarId[categoryId] || 0; // Get last car ID or default to 0

        console.log(`Loading cars for category: ${categoryId}, Last Car ID: ${lastCarId}`); // Debugging

        $.ajax({
            url: "{{ route('cars.categorize') }}",
            method: "GET",
            data: {
                car_category_id: categoryId,
                last_car_id: lastCarId // Send last car ID instead of offset
            },
            success: function(response) {
                if (!append) {
                    $("#car-list").html(response.cars); // Replace content
                } else {
                    $("#car-list").append(response.cars); // Append new data
                }

                // Update last car ID if new cars exist
                let newCars = $(response.cars).find(".car-item"); // Assuming each car has class `.car-item`
                if (newCars.length > 0) {
                    let lastLoadedCar = newCars.last().data("car-id"); // Get last car ID
                    categoryLastCarId[categoryId] = lastLoadedCar; // Update tracking
                    console.log(`Updated Last Car ID for ${categoryId}: ${lastLoadedCar}`); // Debugging
                }

                isLoading = false; // Reset flag
            },
            error: function(xhr, status, error) {
                console.log("AJAX error:", error);
                isLoading = false; // Reset flag on error
            }
        });
    }

    categoryLastCarId["All"] = 0;
    loadCars("All", false);

    $(document).on("click", ".filter-btn", function() {
        $(".filter-btn").removeClass("btn-primary").addClass("btn-dark");
        $(this).removeClass("btn-dark").addClass("btn-primary");

        let selectedCategory = $(this).data("category");

        if (selectedCategory !== currentCategory) {
            currentCategory = selectedCategory;
            categoryLastCarId[currentCategory] = 0; // Reset last car ID when category changes
        }

        $("#load-tab-more").hide();
        loadCars(currentCategory, false);
    });

    $(document).on("click", "#load-tab-more", function() {
        loadCars(currentCategory, true); 
    });
});

    </script>
@endsection
