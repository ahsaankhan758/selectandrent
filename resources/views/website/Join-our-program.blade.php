@extends('website.layout.master')
@section('title')
    {{ __('messages.join') }}
@endsection

@section('content')
    <!-- parther -->
    <div class="container desktop-view my-5">
        <h2 class="text-center mb-5">{{ __('messages.why_partner') }}</h2>
        <p class="text-center mb-5 text-justify custom-width">{{ __('messages.maximize_your_vehicle') }}</p>
        <!-- Part 1 -->
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-3 custom-program-left-list">
                <h4 class="fw-bold">{{ __('messages.your_personal') }} </h4>
                <p class="text-muted text-font">{{ __('messages.get_expert_guidance') }} </p>
                <ul class="list-unstyled">
                    <li class="d-flex align-items-start custom-check-item">
                        <div class="custom-check-icon me-2">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <strong>{{ __('messages.passive_income') }}</strong>
                            <p class="text-muted m-0">{{ __('messages.earn_money') }}</p>
                        </div>
                    </li>

                    <li class="d-flex align-items-start mb-3">
                        <div class="custom-check-icon me-2">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <strong>{{ __('messages.peace_of_mind') }}</strong>
                            <p class="text-muted m-0">{{ __('messages.our_platform') }}</p>
                        </div>
                    </li>

                    <li class="d-flex align-items-start mb-3">
                        <div class="custom-check-icon me-2">
                            <i class="fa-solid fa-check"></i>
                        </div>
                        <div>
                            <strong>{{ __('messages.flexibility') }}</strong>
                            <p class="text-muted m-0">{{ __('messages.set_your_own') }}</p>
                        </div>
                    </li>

                </ul>
            </div>


            <div class="col-lg-4 col-md-4 text-center">
                <img src="{{ asset('/') }}frontend-assets/assets/jointeam.png" class="img-fluid custom-join-img rounded"
                    alt="Join Our Team">
            </div>


            <div class="col-lg-5 col-md-5 custom-program-become-partner">
                <p class="custom-text-heading fw-bold">{{ __('messages.become_a_partner') }} </p>
                <h3 class="fw-bold heading-text-font">{{ __('messages.earn_extra_income') }} </h3>
                <p class="text-muted text-font">{{ __('messages.collaborate_with_other') }} </p>

            </div>


            <!-- Part 2 -->
            <div class="row custom-program-become-partner2">
                <div class="col-lg-4 col-md-4 ps-lg-4">

                </div>
                <div class="col-lg-4 col-md-4 d-flex justify-content-center align-items-center">
                    <img src="{{ asset('/') }}frontend-assets/assets/jointeam2.png"
                        class="img-fluid custom-join-img2 rounded" alt="Car Image">
                </div>
                <div class="col-lg-4 col-md-4 ps-lg-4">
                    <div class="position-relative custom-program-list">
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start mb-3">
                                <div class="custom-check-icon me-2">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div>
                                    <strong>{{ __('messages.join_the_circle') }}</strong>
                                    <p class="text-muted m-0">{{ __('messages.connect_with') }}</p>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <div class="custom-check-icon me-2">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div>
                                    <strong>{{ __('messages.flexible_scheduling') }}</strong>
                                    <p class="text-muted m-0">{{ __('messages.customize_your') }}</p>
                                </div>
                            </li>

                            <li class="d-flex align-items-start mb-3">
                                <div class="custom-check-icon me-2">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div>
                                    <strong>{{ __('messages.effortless_income') }}</strong>
                                    <p class="text-muted m-0">{{ __('messages.enjoy_reliable') }}</p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile view -->
    <div class="mobile-container">
        <h2 class="mobile-heading">{{ __('messages.why_partner') }} </h2>
        <p class="mobile-text">
            {{ __('messages.maximize_your_vehicle') }}
        </p>
        <p class="mobile-subheading">{{ __('messages.become_a_partner') }} </p>
        <p class="mobile-text">
            {{ __('messages.earn_extra_collaborate') }}
        </p>


        <div class="mobile-image">
            <img src="{{ asset('/') }}frontend-assets/assets/jointeam.png" alt="Join Our Team">
        </div>

        <div class="mobile-box">
            <p class="mobile-check"><img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                {{ __('messages.join_the_circle') }}</p>
            <p class="mobile-text">{{ __('messages.connect_with') }}</p>
        </div>

        <div class="mobile-box">
            <p class="mobile-check"><img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                {{ __('messages.flexible_scheduling') }}</p>
            <p class="mobile-text">{{ __('messages.customize_your') }}.</p>
        </div>

        <div class="mobile-box">
            <p class="mobile-check"><img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                {{ __('messages.effortless_income') }}</p>
            <p class="mobile-text">{{ __('messages.enjoy_reliable') }}.</p>
        </div>

        <div class="mobile-image mt-2">
            <img src="{{ asset('/') }}frontend-assets/assets/jointeam2.png" alt="Car Image">
        </div>

        <h3 class="mobile-title mt-3">{{ __('messages.your_personal') }}</h3>
        <ul class="mobile-list">
            <li><img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                {{ __('messages.passive_income') }}</li>
            <p class="text-muted ">{{ __('messages.earn_money') }}</p>
            <li><img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                {{ __('messages.peace_of_mind') }}</li>
            <p class="text-muted ">{{ __('messages.our_platform') }}</p>
            <li><img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                {{ __('messages.flexibility') }}</li>
            <p class="text-muted ">{{ __('messages.set_your_own') }}</p>
        </ul>

    </div>

    <!-- parther -->
    <!-- benefits -->
    <div class="container desktop-benefits mt-5">
        <h2 class="text-center mb-5">{{ __('messages.key_benefits') }}</h2>
        <div class="row custom-benefit-container">
            <div class="col-md-3 text-center custom-benefit-step">
                <div>
                    <img src="{{ asset('/') }}frontend-assets/icons/1.png" class="custom-icon-circle" alt="Easy Signup">
                </div>
                <h5 class="mt-3">{{ __('messages.easy_signup') }}</h5>
                <p>{{ __('messages.In_a_free_hour') }}</p>
            </div>
            <div class="col-md-3 text-center custom-benefit-step">
                <h5 class="mt-3">{{ __('messages.flexible_terms') }}</h5>
                <p>{{ __('messages.flexible_terms_text') }}</p>
                <div>
                    <img src="{{ asset('/') }}frontend-assets/icons/2.png" class="custom-icon-circle"
                        alt="Flexible Terms">
                </div>
            </div>
            <div class="col-md-3 text-center custom-benefit-step">
                <div>
                    <img src="{{ asset('/') }}frontend-assets/icons/1(1).png" class="custom-icon-circle"
                        alt="High Earning Potential">
                </div>
                <h5 class="mt-3">{{ __('messages.high_earning') }}</h5>
                <p>{{ __('messages.high_earning_text') }}</p>
            </div>
            <div class="col-md-3 text-center custom-benefit-step">
                <h5 class="mt-3">{{ __('messages.24/7_support') }}</h5>
                <p>{{ __('messages.support_text') }}</p>
                <div>
                    <img src="{{ asset('/') }}frontend-assets/icons/2(1).png" class="custom-icon-circle"
                        alt="24/7 Support">
                </div>
            </div>
        </div>
    </div>
    <!-- mobile view -->
    <div class="benefits-container mobile-benefits">
        <h2 class="benefits-heading">{{ __('messages.key_benefits') }}</h2>

        <div class="benefit-item">
            <div class="icon"><img src="{{ asset('/') }}frontend-assets/icons/1.png" alt="Icon"></div>
            <!-- <div class="line"></div> -->
            <div class="content px-4">
                <h3>{{ __('messages.easy_signup') }}</h3>
                <p>{{ __('messages.In_a_free_hour') }}</p>
            </div>
        </div>

        <div class="benefit-item">
            <div class="icon"><img src="{{ asset('/') }}frontend-assets/icons/2.png" alt="Icon"></div>
            <!-- <div class="line"></div> -->
            <div class="content px-4">
                <h3>{{ __('messages.flexible_terms') }}</h3>
                <p>{{ __('messages.flexible_terms_text') }}</p>
            </div>
        </div>

        <div class="benefit-item">
            <div class="icon"><img src="{{ asset('/') }}frontend-assets/icons/1(1).png" alt="Icon"></div>
            <!-- <div class="line"></div> -->
            <div class="content px-4">
                <h3>{{ __('messages.high_earning') }}</h3>
                <p>{{ __('messages.high_earning_text') }}</p>
            </div>
        </div>

        <div class="benefit-item">
            <div class="icon"><img src="{{ asset('/') }}frontend-assets/icons/2(1).png" alt="Icon"></div>
            <div class="content px-4">
                <h3>{{ __('messages.24/7_support') }}</h3>
                <p>{{ __('messages.support_text') }}</p>
            </div>
        </div>
    </div>
    <!-- end benefits -->
    <!-- Work -->
    <div class="container">
        <h2 class="text-center text-warning mb-4">
            <h2 class="text-center text-warning mb-4">{{ __('messages.how_it_works') }}</h2>
        </h2>
        <p class="text-center">{{ __('messages.how_work_text') }}</p>
        <div class="steps">
            <div class="step-item reverse">
                <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.register_your_business') }}</h4>
                    <p>{{ __('messages.create_account') }}</p>
                </div>
            </div>

            <div class="step-item">
                <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.list_your_vehicles') }}</h4>
                    <p>{{ __('messages.list_text') }}</p>
                </div>
            </div>
            <div class="step-item reverse">
                <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.set_pricing') }}</h4>
                    <p>{{ __('messages.price_text') }}</p>
                </div>
            </div>

            <div class="step-item">
                <div class="icon-wrap"><img src="{{ asset('/') }}frontend-assets/icons/handshake.png"
                        alt="Step Icon"></div>
                <div class="step-content">
                    <h4>{{ __('messages.connect_with_renters') }}</h4>
                    <p>{{ __('messages.chat_text') }}</p>
                </div>
            </div>
        </div>
        <div class=" text-center">
            <button class="btn btn-orange-clr rounded-pill text-white" data-bs-toggle="modal"
                data-bs-target="#carRentalModal">
                {{ __('messages.fill_the_registration') }}
                <img src="{{ asset('/') }}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20"
                    height="20" alt="">
            </button>

        </div>
    </div>
    <!-- work end -->
    <!-- price -->
    {{-- <div class="container py-5">
    <h2 class="text-center mb-4">{{ __('messages.pricing_plans') }}</h2>
    <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="pricing-card p-4">
                <div class="container-fluid slanted-box">
                    <h5>{{ __('messages.studnet_packages') }}</h5>
                    <p class="price">$250 <span class="price">/{{ __('messages.month') }}</span></p>
                </div>
                <img src="{{asset('/')}}frontend-assets/icons/price-tag.png" class="price-icon" alt="Price Tag"> 
                <ul class="feature-list">
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 02 {{ __('messages.passengers') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 5 km {{ __('messages.km_distance_only') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.no_extra_charges') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.free_book_no') }}</li>
                </ul>
                <button class="btn rounded-pill text-white d-flex align-items-center px-3 py-2 custom-btn">
                    {{ __('messages.purchase_now') }}
                <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
                </button> 
            </div>
        </div>        
        <div class="col-lg-4 col-md-6">
            <div class="pricing-card p-4">
                <div class="container-fluid slanted-box">
                <h5>{{ __('messages.medical_package') }}</h5>
                <p class="price">$250 <span class="price">/{{ __('messages.month') }}</span></p>
                </div>
                <img src="{{asset('/')}}frontend-assets/icons/price-tag.png" class="price-icon" alt="Price Tag"> 
                <ul class="feature-list">
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 02 {{ __('messages.passengers') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 5 km {{ __('messages.km_distance_only') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.no_extra_charges') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.free_book_no') }}</li>
                </ul>
                <button class="btn rounded-pill text-white d-flex align-items-center px-3 py-2 custom-btn">
                    {{ __('messages.purchase_now') }}
                    <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
                </button> 
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="pricing-card p-4">
                <div class="container-fluid slanted-box">
                    <h5>{{ __('messages.business_package') }}</h5>
                    <p class="price">$250 <span class="price">/{{ __('messages.month') }}</span></p>
                </div>
                <img src="{{asset('/')}}frontend-assets/icons/price-tag.png" class="price-icon" alt="Price Tag"> 
                <ul class="feature-list">
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 02 {{ __('messages.passengers') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 5 {{ __('messages.km_distance_only') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.no_extra_charges') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.free_book_no') }}</li>
                </ul>
                <button class="btn rounded-pill text-white d-flex align-items-center px-3 py-2 custom-btn">
                    {{ __('messages.purchase_now') }}
                    <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
                </button> 
            </div>
        </div>
    </div>
</div> --}}
    <!-- end price -->
    <!-- testimonals -->
    <div class="container py-5">
        <h2 class="text-center fw-bold">{{ __('messages.testimonials') }}</h2>

        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h2 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h2>
                                <p class="text-primary secondary-text-size">{{ __('messages.most_of_our_user') }}.</p>
                                <div class="bg-light p-4 testimonial-box rounded shadow">
                                    {{-- <span class="text-warning">★★★★★1</span> <span class="text-primary">4.8</span> --}}
                                    <strong class="testimonial-text">“Smooth, Simple, and Profitable”</strong>
                                    <p class="mt-2 testimonial-text">“I listed two of my cars on Select and Rent, and
                                        within the first week, I had bookings lined up. The platform is user-friendly, and
                                        the team helped me set everything up. I now earn passive income without worrying
                                        about management.”</p>
                                    <strong class="testimonial-text">– Sarah M., Small Business Owner</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
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
                                <h2 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h2>
                                <p class="text-primary secondary-text-size">{{ __('messages.most_of_our_user') }}.</p>
                                <div class="bg-light p-4 testimonial-box rounded shadow">
                                    {{-- <span class="text-warning">★★★★★2</span> <span class="text-primary">4.8</span> --}}
                                    <strong class="testimonial-text">“Great Support, Every Step of the Way”</strong>
                                    <p class="mt-2 testimonial-text">“I was hesitant at first, but the Select and Rent team
                                        walked me through the process. They handled the insurance and gave me full control
                                        over my rental schedule. It’s a win-win!”</p>
                                    <strong class="testimonial-text">– Jason T., Independent Car Owner</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
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
                                <h2 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h2>
                                <p class="text-primary secondary-text-size">{{ __('messages.most_of_our_user') }}.</p>
                                <div class="bg-light p-4 testimonial-box rounded shadow">
                                    {{-- <span class="text-warning">★★★★★3</span> <span class="text-primary">4.8</span> --}}
                                    <strong class="testimonial-text">“Reliable Income Stream”</strong>
                                    <p class="mt-2 testimonial-text">“As a part-time Uber driver, I wanted to make the most
                                        of my car when I wasn’t using it. Select and Rent helped me earn extra income during
                                        my off-hours. It's flexible, safe, and efficient.”</p>
                                    <strong class="testimonial-text">– Ayesha R., Ride-Share Driver</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative mt-3 text-center">
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
                                <h2 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h2>
                                <p class="text-primary secondary-text-size">{{ __('messages.most_of_our_user') }}.</p>
                                <div class="bg-light p-4 testimonial-box rounded shadow">
                                    {{-- <span class="text-warning">★★★★★4</span> <span class="text-primary">4.9</span> --}}
                                    <strong class="testimonial-text">“Fleet Management Made Easy”</strong>
                                    <p class="mt-2 testimonial-text">“Managing a fleet used to be time-consuming. Now, with
                                        Select and Rent, I can monitor everything from a single dashboard. Their pricing
                                        tools and calendar features are especially helpful.”</p>
                                    <strong class="testimonial-text">– Luis D., Rental Fleet Manager</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
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
                                <h2 class="fw-bold testimonial-text">{{ __('messages.our_most_satisfied') }}!</h2>
                                <p class="text-primary secondary-text-size">{{ __('messages.most_of_our_user') }}.</p>
                                <div class="bg-light p-4 testimonial-box rounded shadow">
                                    {{-- <span class="text-warning">★★★★★5</span> <span class="text-primary">5.0</span> --}}
                                    <strong class="testimonial-text">“Hassle-Free Experience”</strong>
                                    <p class="mt-2 testimonial-text">“From listing my car to receiving my first payment,
                                        the process was seamless. The renters were verified, the car was returned in perfect
                                        condition, and the payout was on time.”</p>
                                    <strong class="testimonial-text">– Michelle K., First-Time Host</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
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
    <section class="container-fluid py-5">
        <div class="container">
            <div class="row">
                <!-- Left Side Text (4 columns) -->
                <div class="col-md-4 accordion-text">
                    <h2 class="fw-bold">{{ __('messages.any_questions') }}?</h2>
                    <h2 class="fw-bold">{{ __('messages.we_got_you') }}.</h2>
                    <p class="text-muted questions">
                        {{ __('messages.our_cutting-edge') }}.
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
                </div>
            </div>
        </div>
    </section>
    <!-- end accordian -->
@endsection
