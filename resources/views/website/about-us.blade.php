@extends('website.layout.master')
@section('title')
    {{ __('messages.about_us') }}
@endsection

@section('content')
    <!-- contact js -->
    <script src="{{ asset('/frontend-assets/assets/Js/contact.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>
    {{-- <div class="container py-4 mt-4">
            <div class="row g-3">
                <div class="col-lg-4 col-md-4 position-relative">
                    <img src="{{asset('/')}}frontend-assets/icons/about1.png" class="img-fluid rounded" alt="Industry Expert">
                    <div class="info-box">{{ __('messages.86_industry_experts') }}</div>
                </div>
                <div class="col-lg-4 col-md-4 position-relative">
                    <img src="{{asset('/')}}frontend-assets/icons/about2.png" class="img-fluid rounded" alt="Business Experience">
                </div>
                <div class="col-lg-4 col-md-4 d-flex flex-column justify-content-between">
                    <div class="text-white d-flex p-4 rounded equal-height">
                        <div class="fw-bold display-3 me-1">25</div>
                        <div class="h3">{{ __('messages.years_in_business') }}</div>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/about3.png" class="img-fluid rounded equal-height mt-3" alt="Luxury Car">
                </div>
            </div>
        </div> --}}
    <!-- mission section -->
    <section class="container py-5 mobile-mission-rent">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="fw-bold new-design">{{ __('messages.rent_a_vehicle') }}</h4>
                <p class="new-design py-3">{{ __('messages.our_mission_detail') }}.</p>

                <ul class="custom-list ps-0">
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.to_create') }}.</span>
                    </li>
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.leverage_innovation') }}.</span>
                    </li>
                    {{-- <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.simplifying_rentals') }}.</span>
                    </li> --}}
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.support_every_step') }}.</span>
                    </li>
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.transparent_pricing') }}.</span>
                    </li>

                </ul>

                {{-- <a href="#" class="btn btn-orange-clr rounded-pill px-3 text-white mt-3" data-bs-toggle="modal"
                    data-bs-target="#registerModal" aria-label="Get Started">
                    {{ __('messages.get_started') }} <i class="fa-solid fa-arrow-right"></i>
                </a> --}}
            </div>

            <div class="col-lg-6 col-md-12 text-center custom_image-wrapper position-relative">
                <img src="{{ asset('/') }}frontend-assets/icons/big.webp"
                    class="img-fluid rounded custom_about_main-image" alt="Businessman near car">
                {{-- <img src="{{ asset('/') }}frontend-assets/icons/car-commitment.png"
                    class="img-fluid rounded custom_about_overlay-image position-absolute" alt="Happy customer in car"> --}}
            </div>
        </div>
    </section>

    <div class="container custom_commitment-section py-5 about_image-wrapper">
        <div class="row">
            <div class="col-lg-6 col-md-12 custom_image-wrapper  position-relative">
                <img src="{{ asset('/') }}frontend-assets/icons/big-2.webp" class="img-fluid rounded custom_main-image"
                    alt="Businessman near car">
                {{-- <img src="{{ asset('/') }}frontend-assets/icons/car-commitment.png"
                    class="img-fluid rounded custom_overlay-image position-absolute" alt="Happy customer in car"> --}}
            </div>
            <div class="col-lg-6 col-md-12 custom_commitment-text">
                {{-- <span class="badge custom_badge">
                    <h1 class="custom_heading" style="margin-bottom: 0px;">{{ __('messages.our_commitment') }}</h1>
                </span> --}}
                <h4 class="fw-bold new-design">{{ __('messages.our_promise') }}</h4>
                <p class="new-design py-3">
                    {{ __('messages.at_selectandrent') }}
                </p>
                <ul class="custom-list ps-0">
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.dedicated_to_excellence') }}</span>
                    </li>
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.your_journey') }}</span>
                    </li>
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.building_trust') }}</span>
                    </li>
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <span class="ms-2">{{ __('messages.empowering_freedom') }}</span>
                    </li>
                </ul>
                <div class="py-3 about-button">
                    <a href="#" class="btn btn-orange-clr rounded-pill px-3 text-white" data-bs-toggle="modal"
                        data-bs-target="#registerModal">
                        {{ __('messages.get_started') }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


        <!-- chose section -->
    <div class="container chose-bg-img py-5">
       <!-- Tablet & Mobile Section -->
<div class="container mobile text-center chose-mobile py-2 d-block d-lg-none">
    <h4 class="text-chose fw-bold">{{ __('messages.why_choose_us') }}</h4>
    <h3 class="fw-bold">{{ __('messages.we’re_committed_to_delivering_about') }} <br>
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
            <h3 class="fw-bold">{{ __('messages.we’re_committed_to_delivering_about') }} <br>
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

    <!-- testimonals -->
    <div class="container py-5 mobile-testimonial-about">
        <h3 class="fw-bold text-center">{{ __('messages.customer_reviews') }}</h3>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h4 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h4>
                                <div class="bg-light p-4 testimonial-box rounded shadow mt-5">
                                    <strong class="testimonial-text">“Smooth, Simple, and Profitable”</strong>
                                    <p class="mt-2 testimonial-text">“I listed two of my cars on Select and Rent, and
                                        within the first week, I had bookings lined up. The platform is user-friendly, and
                                        the team helped me set everything up. I now earn passive income without worrying
                                        about management.”</p>
                                    <h class="testimonial-text">– Sarah M., Small Business Owner</h>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center mobile-testimonial-img">
                            <div class="testimonial-bg"></div>
                            <img src="{{ asset('/') }}frontend-assets/icons/customer1.png"
                                class="testimonial-img img-fluid" alt="Customer">
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h4 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h4>
                                <div class="bg-light p-4 testimonial-box rounded shadow mt-5">
                                    <strong class="testimonial-text">“Great Support, Every Step of the Way”</strong>
                                    <p class="mt-2 testimonial-text">“I was hesitant at first, but the Select and Rent team
                                        walked me through the process. They handled the insurance and gave me full control
                                        over my rental schedule. It’s a win-win!”</p>
                                    <h6 class="testimonial-text">– Jason T., Independent Car Owner</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center mobile-testimonial-img">
                            <div class="testimonial-bg"></div>
                            <img src="{{ asset('/') }}frontend-assets/icons/customer2.png"
                                class="testimonial-img img-fluid" alt="Customer">
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h4 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h4>
                                <div class="bg-light p-4 testimonial-box rounded shadow mt-5">
                                    <strong class="testimonial-text">“Reliable Income Stream”</strong>
                                    <p class="mt-2 testimonial-text">“As a part-time Uber driver, I wanted to make the most
                                        of my car when I wasn’t using it. Select and Rent helped me earn extra income during
                                        my off-hours. It's flexible, safe, and efficient.”</p>
                                    <h6 class="testimonial-text">– Ayesha R., Ride-Share Driver</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative mt-3 text-center mobile-testimonial-img">
                            <div class="testimonial-bg"></div>
                            <img src="{{ asset('/') }}frontend-assets/icons/customer4.png"
                                class="testimonial-img img-fluid" alt="Customer">
                        </div>
                    </div>
                </div>
                <!-- Slide 4 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h4 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h4>
                                <div class="bg-light p-4 testimonial-box rounded shadow mt-5">
                                    <strong class="testimonial-text">“Fleet Management Made Easy”</strong>
                                    <p class="mt-2 testimonial-text">“Managing a fleet used to be time-consuming. Now, with
                                        Select and Rent, I can monitor everything from a single dashboard. Their pricing
                                        tools and calendar features are especially helpful.”</p>
                                    <h6 class="testimonial-text">– Luis D., Rental Fleet Manager</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center mobile-testimonial-img">
                            <div class="testimonial-bg"></div>
                            <img src="{{ asset('/') }}frontend-assets/icons/customer3.png"
                                class="testimonial-img img-fluid" alt="Customer">
                        </div>
                    </div>
                </div>

                <!-- Slide 5 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h4 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h4>
                                <div class="bg-light p-4 testimonial-box rounded shadow mt-5">
                                    <strong class="testimonial-text">“Hassle-Free Experience”</strong>
                                    <p class="mt-2 testimonial-text">“From listing my car to receiving my first payment,
                                        the process was seamless. The renters were verified, the car was returned in perfect
                                        condition, and the payout was on time.”</p>
                                    <h6 class="testimonial-text">– Michelle K., First-Time Host</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center mobile-testimonial-img">
                            <div class="testimonial-bg"></div>
                            <img src="{{ asset('/') }}frontend-assets/icons/customer5.png"
                                class="testimonial-img img-fluid" alt="Customer">
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- Carousel Controls -->
        <div class="d-flex justify-content-center mt-3">
            <a class="carousel-control-prev-custom me-3" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <a class="carousel-control-next-custom" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- end testimonials -->

    <!-- Accordion Section -->
    <section class="container-fluid py-5 mobile-join-accordion">
        <div class="container">
            <div class="row">
                <!-- Left Side Text (4 columns) -->
                <div class="col-md-4 accordion-text">
                    <h4 class="fw-bold new-design">{{ __('messages.any_questions') }}?</h4>
                    <h4 class="fw-bold new-design">{{ __('messages.we_got_you') }}</h4>
                    <p class="text-muted questions">
                        {{ __('messages.streamlines_about') }}
                    </p>
                </div>

                <!-- Middle Accordion (3 items) -->
                <div class="col-md-4">
                    <div class="accordion" id="faqAccordion1">
                        <!-- First Item -->
                        <div class="accordion-item border-0 border-bottom">
                            <h4 class="accordion-header" id="headingOne1">
                                <button class="accordion-button fw-bold shadow-none" type="button"
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

    <!-- contact sections -->
    <div class="container contact-container mobile-contact-space py-3">
        <div class="row g-4">
            <!-- Left Side -->
            <div class="col-md-4 about-contact-center">
                <h4 class="faq">{{ __('messages.can’t_find_answer') }}?</h4>
                <h3 class="fw-bold"><span>{{ __('messages.submit') }}</span> {{ __('messages.your_queries') }} </h3>
                <p>{{ __('messages.contect_text') }}</p>
                <button class="btn btn-orange-clr rounded-pill text-white">
                    <i class="fa-solid fa-phone"></i> +44xxxxxxxxxx
                </button>
            </div>

            <!-- Right Side -->
            <div class="col-md-8">
                <div class="contact-right">
                    <form method="POST" id="sendEmailContact" action="{{ route('website.contact') }}">
                        @csrf
                        <div class="row g-3">
                            <!-- Query Type -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.query_type') }}</label>
                                <select class="form-control form-control-border" name="subject">
                                    <option selected>{{ __('messages.vehicle_rental') }}</option>
                                    <option value="General">{{ __('messages.general') }}</option>
                                    <option value="Refund">{{ __('messages.refund') }}</option>
                                    <option value="Complaint">{{ __('messages.complaint') }}</option>
                                    <option value="Issues about company">{{ __('messages.issues_about_company') }}</option>
                                    <option value="Hire me">{{ __('messages.hire_me') }}</option>
                                </select>
                            </div>

                            <!-- Existing Customer -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.are_you_an_existing') }}?</label>
                                <select class="form-control form-control-border" name="existing_customer">
                                    <option selected>{{ __('messages.yes') }}</option>
                                    <option>{{ __('messages.no') }}</option>
                                </select>
                            </div>

                            <!-- Name -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.first_name') }}</label>
                                <input type="text" name="first_name" class="form-control form-control-border" placeholder="{{ __('messages.first_name') }}">
                            </div>

                            <!-- Name -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.last_name') }}</label>
                                <input type="text" name="last_name" class="form-control form-control-border" placeholder="{{ __('messages.last_name') }}">
                            </div>

                            <!-- Email -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.email_address') }}</label>
                                <input type="email" name="email" class="form-control form-control-border" placeholder="{{ __('messages.email') }}">
                            </div>

                            <!-- Phone Number -->
                            <div class="col-md-6">
                                <label class="form-label">{{ __('messages.phone_number') }}</label>
                                <input type="tel" name="phone" class="form-control form-control-border" placeholder="{{ __('messages.phone') }}">
                            </div>

                            <!-- Message -->
                            <div class="col-12">
                                <label class="form-label">{{ __('messages.message') }}</label>
                                <textarea class="form-control form-control-border" name="message" placeholder="{{ __('messages.messages') }}" rows="3"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-12 text-end mobile-button-contact">
                                <button id="submitBtn" class="btn btn-orange-clr rounded-pill text-white px-4">
                                    {{ __('messages.submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- end contact section -->
@endsection
