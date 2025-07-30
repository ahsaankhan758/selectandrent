@extends('website.layout.master')
@section('title')
{{ __('messages.join') }}   
@endsection

@section('content')
 <!-- parther -->
 <div class="container desktop-view my-5">
    <h2 class="text-center mb-5">{{ __('messages.why_partner') }}</h2>
    <!-- Part 1 -->
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-3 custom-program-left-list">
            <h4 class="fw-bold">{{ __('messages.your_personal') }} </h4>
            <p class="text-muted text-font">{{ __('messages.get_expert_guidance') }} </p>
            <ul class="list-unstyled">
                <li class="mb-1"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> <strong>{{ __('messages.passive_income') }}</strong>  </li>
                <p class="text-muted ">{{ __('messages.earn_money') }}</p>
                <li class="mb-1"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> <strong>{{ __('messages.peace_of_mind') }} </strong> </li>
                <p class="text-muted ">{{ __('messages.our_platform') }}</p>
                <li class="mb-1"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> <strong>{{ __('messages.flexibility') }} </strong> </li>
                <p class="text-muted ">{{ __('messages.set_your_own') }}</p>
            </ul>
        </div>

        <div class="col-lg-4 col-md-4 text-center">
            <img src="{{asset('/')}}frontend-assets/assets/jointeam.png" class="img-fluid custom-join-img rounded" alt="Join Our Team">
        </div>

        <div class="col-lg-5 col-md-5 custom-program-become-partner">
            <p class="custom-text-heading fw-bold">{{ __('messages.become_a_partner') }} </p>
            <h3 class="fw-bold heading-text-font">{{ __('messages.earn_extra_income') }} </h3>
            <p class="text-muted text-font">{{ __('messages.collaborate_with_other') }} </p>
        </div>
    </div>

    <!-- Part 2 -->
     <div class="row custom-program-become-partner2">
        <div class="col-lg-4 col-md-4 ps-lg-4">
        
        </div>
        <div class="col-lg-4 col-md-4 d-flex justify-content-center align-items-center">
            <img src="{{ asset('/') }}frontend-assets/assets/jointeam2.png" class="img-fluid custom-join-img2 rounded" alt="Car Image">
        </div>
        <div class="col-lg-4 col-md-4 ps-lg-4">
            <div class="position-relative custom-program-list">
                <ul class="list-unstyled">
                    <li>
                        <img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                        <strong>{{ __('messages.join_the_circle') }}</strong>
                    </li>
                    <p class="text-muted">{{ __('messages.connect_with') }}</p>
    
                    <li>
                        <img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                        <strong>{{ __('messages.flexible_scheduling') }}</strong>
                    </li>
                    <p class="text-muted">{{ __('messages.customize_your') }}</p>

                    <li>
                        <img src="{{ asset('/') }}frontend-assets/icons/Security2.png" alt="security">
                        <strong>{{ __('messages.effortless_income') }}</strong>
                    </li>
                    <p class="text-muted">{{ __('messages.enjoy_reliable') }}</p>
                </ul>
    
            </div>
        </div>
</div>
</div>
<!-- mobile view -->
<div class="mobile-container">
    <h2 class="mobile-heading">{{ __('messages.why_partner') }} </h2>
    <p class="mobile-subheading">{{ __('messages.become_a_partner') }} </p>
    <p class="mobile-text">
        {{ __('messages.earn_extra_collaborate') }}  
    </p>


    <div class="mobile-image">
        <img src="{{asset('/')}}frontend-assets/assets/jointeam.png" alt="Join Our Team">
    </div>

    <div class="mobile-box">
        <p class="mobile-check"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.join_the_circle') }}</p>
        <p class="mobile-text">{{ __('messages.connect_with') }}</p>
    </div>

    <div class="mobile-box">
        <p class="mobile-check"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.flexible_scheduling') }}</p>
        <p class="mobile-text">{{ __('messages.customize_your') }}.</p>
    </div>

    <div class="mobile-box">
        <p class="mobile-check"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.effortless_income') }}</p>
        <p class="mobile-text">{{ __('messages.enjoy_reliable') }}.</p>
    </div>

    <div class="mobile-image mt-2">
        <img src="{{asset('/')}}frontend-assets/assets/jointeam2.png" alt="Car Image">
    </div>  

    <h3 class="mobile-title mt-3">{{ __('messages.your_personal') }}</h3>
    <ul class="mobile-list">
        <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.passive_income') }}</li>
        <p class="text-muted ">{{ __('messages.earn_money') }}</p>
        <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.peace_of_mind') }}</li>
        <p class="text-muted ">{{ __('messages.our_platform') }}</p>
        <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.flexibility') }}</li>
        <p class="text-muted ">{{ __('messages.set_your_own') }}</p>
    </ul>

</div>

  <!-- parther -->
 <!-- benefits -->
 <div class="container desktop-benefits">
    <h2 class="text-center mb-5">{{ __('messages.key_benefits') }}</h2>
    <div class="row custom-benefit-container">
        <div class="col-md-3 text-center custom-benefit-step">
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/1.png" class="custom-icon-circle" alt="Easy Signup">
            </div>
            <h5 class="mt-3">{{ __('messages.easy_signup') }}</h5>
            <p>{{ __('messages.In_a_free_hour') }}</p>
        </div>
        <div class="col-md-3 text-center custom-benefit-step">
            <h5 class="mt-3">{{ __('messages.flexible_terms') }}</h5>
            <p>{{ __('messages.In_a_free_hour') }}</p>
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/2.png" class="custom-icon-circle" alt="Flexible Terms">
            </div>
        </div>
        <div class="col-md-3 text-center custom-benefit-step">
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/1(1).png" class="custom-icon-circle" alt="High Earning Potential">
            </div>
            <h5 class="mt-3">{{ __('messages.high_earning') }}</h5>
            <p>{{ __('messages.In_a_free_hour') }}</p>
        </div>
        <div class="col-md-3 text-center custom-benefit-step">
            <h5 class="mt-3">{{ __('messages.24/7_support') }}</h5>
            <p>{{ __('messages.In_a_free_hour') }}</p>
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/2(1).png" class="custom-icon-circle" alt="24/7 Support">
            </div>
        </div>
    </div>
</div>
<!-- mobile view -->
<div class="benefits-container mobile-benefits">
    <h2 class="benefits-heading">{{ __('messages.key_benefits') }}</h2>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/1.png" alt="Icon"></div>
        <!-- <div class="line"></div> -->
        <div class="content">
            <h3>{{ __('messages.flexible_terms') }}</h3>
            <p>{{ __('messages.In_a_free_hour') }}</p>
        </div>
    </div>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/2.png" alt="Icon"></div>
        <!-- <div class="line"></div> -->
        <div class="content">
            <h3>{{ __('messages.easy_signup') }}</h3>
            <p>{{ __('messages.In_a_free_hour') }}</p>
        </div>
    </div>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/1(1).png" alt="Icon"></div>
        <!-- <div class="line"></div> -->
        <div class="content">
            <h3>{{ __('messages.easy_signup') }}</h3>
            <p>{{ __('messages.In_a_free_hour') }}</p>
        </div>
    </div>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/2(1).png" alt="Icon"></div>
        <div class="content">
            <h3>{{ __('messages.easy_signup') }}</h3>
            <p>{{ __('messages.In_a_free_hour') }}</p>
        </div>
    </div>
</div>
  <!-- end benefits -->
 <!-- Work -->
 <div class="container py-5">
    <h2 class="text-center text-warning mb-4"><h2 class="text-center text-warning mb-4">{{ __('messages.how_it_works') }}</h2></h2>
    <p class="text-center">{{ __('messages.loripsome_is') }}.</p>
    <div class="steps">
        <div class="step-item reverse">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.register_your_business') }}</h4>
                <p>{{ __('messages.sign_up_on') }}.</p>
            </div>
        </div>

        <div class="step-item">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.list_your_vehicles') }}</h4>
                <p>{{ __('messages.easily_add_your') }}.</p>
            </div>
        </div>
        <div class="step-item reverse">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.set_pricing') }}</h4>
                <p>{{ __('messages.use_our_intuitive') }}.</p>
            </div>
        </div>

        <div class="step-item">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.connect_with_renters') }}</h4>
                <p>{{ __('messages.communicate_directly') }}.</p>
            </div>
        </div>
    </div>
    <div class=" text-center">
        <button class="btn btn-orange-clr rounded-pill text-white"
        data-bs-toggle="modal" 
        data-bs-target="#carRentalModal">
        {{ __('messages.fill_the_registration') }}
    <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
</button>

</div>
</div> 
 <!-- work end -->
 <!-- price -->
 <div class="container py-5">
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
</div>
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
                                    <span class="text-warning">★★★★★</span> <span class="text-primary">4.8</span>
                                    <p class="mt-2 testimonial-text">I like Vault more and more each day because it makes my life a lot easier. Just what I was looking for. I was amazed at the quality of Vault.</p>
                                    <strong class="testimonial-text">Quality & Cost: 5.00</strong>
                                </div>                            
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
                            <div class="testimonial-bg"></div>
                            <img src="{{asset('/')}}frontend-assets/icons/testimonials.png" class="testimonial-img img-fluid" alt="Customer">
                        </div>
                    </div>
                </div>
    
                <!-- Slide 2 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h2 class="fw-bold testimonial-text">Our Most Satisfied Customer says about us!</h2>
                                <p class="text-primary secondary-text-size">Most of our user give us feedback regarding our services. You can see their comments on bellow</p>
                                <div class="bg-light p-4 testimonial-box rounded shadow">
                                    <span class="text-warning">★★★★★</span> <span class="text-primary">4.8</span>
                                    <p class="mt-2 testimonial-text">I like Vault more and more each day because it makes my life a lot easier. Just what I was looking for. I was amazed at the quality of Vault.</p>
                                    <strong class="testimonial-text">Quality & Cost: 5.00</strong>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-6 position-relative text-center">
                            <div class="testimonial-bg"></div>
                            <img src="{{asset('/')}}frontend-assets/icons/testimonials.png" class="testimonial-img img-fluid" alt="Customer">
                        </div>                    
                    </div>
                </div>
    
                <!-- Slide 3 -->
                <div class="carousel-item">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h2 class="fw-bold testimonial-text">Our Most Satisfied Customer says about us!</h2>
                                <p class="text-primary secondary-text-size">Most of our user give us feedback regarding our services. You can see their comments on bellow.</p>
                                <div class="bg-light p-4 testimonial-box rounded shadow">
                                    <span class="text-warning">★★★★★</span> <span class="text-primary">4.8</span>
                                    <p class="mt-2 testimonial-text">I like Vault more and more each day because it makes my life a lot easier. Just what I was looking for. I was amazed at the quality of Vault.</p>
                                    <strong class="testimonial-text">Quality & Cost: 5.00</strong>
                                </div> 
                            </div>
                        </div>
                        <div class="col-md-6 position-relative mt-3 text-center">
                            <div class="testimonial-bg"></div>
                            <img src="{{asset('/')}}frontend-assets/icons/testimonials.png" class="testimonial-img img-fluid" alt="Customer">
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
<section class="container-fluid bg-white py-5">
    <div class="container">
        <div class="row">
            <!-- Left Side Text -->
            <div class="col-md-6 ml-1 accordion-text">
                <h5 class="faq">{{ __('messages.FAQ') }}</h5>
                <div>
                <h1 class="fw-bold">{{ __('messages.here_are_some') }}:"</h1>
                </div>
            </div>
            <!-- Right Side Accordion -->
            <div class="col-md-6">
                <div class="accordion" id="faqAccordion">
                    
                    <!-- First Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ __('messages.what_is_considered') }}?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.economical_vehicle_are') }}.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                {{ __('messages.are_economical_vehicles') }}?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.economical_vehicle_are') }}
                            </div>
                        </div>
                    </div>
                    
                    <!-- Third Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ __('messages.can_I_add_insurance') }}?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.economical_vehicle_are') }}.
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