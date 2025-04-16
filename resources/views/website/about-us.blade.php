@extends('website.layout.master')
@section('title')
{{ __('messages.About-us') }} | {{ __('messages.Select and Rent') }}
@endsection

@section('content')
        <div class="container py-4 mt-4">
            <div class="row g-3">
                <div class="col-lg-4 col-md-4 position-relative">
                    <img src="{{asset('/')}}frontend-assets/icons/about1.png" class="img-fluid rounded" alt="Industry Expert">
                    <div class="info-box">{{ __('messages.86 Industry Experts') }}</div>
                </div>
                <div class="col-lg-4 col-md-4 position-relative">
                    <img src="{{asset('/')}}frontend-assets/icons/about2.png" class="img-fluid rounded" alt="Business Experience">
                </div>
                <div class="col-lg-4 col-md-4 d-flex flex-column justify-content-between">
                    <div class="text-white d-flex p-4 rounded equal-height">
                        <div class="fw-bold display-3 me-1">25</div>
                        <div class="h3">{{ __('messages.Years in Business') }}</div>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/about3.png" class="img-fluid rounded equal-height mt-3" alt="Luxury Car">
                </div>
            </div>
        </div>
        <!-- mission section -->
        <section class="container section-padding">
            <div class="row align-items-center">
                <div class="col-lg-5 mission-section">
                    <span class="custom-badge">{{ __('messages.Our Mission') }}</span>
                    <h2 class="mt-3 fw-bold">{{ __('messages.Rent a car at a fair price and enjoy') }}.</h2>
                    <p>{{ __("messages.Our mission is to make car rental easy, accessible, and affordable for everyone. We believe that renting a car should be a hassle-free experience, and we're dedicated to ensuring that every customer finds the perfect vehicle for their journey") }}.</p>
                    <ul class="custom-list">
                        <li>
                            <img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">
                            <span>{{ __('messages.To create a platform where anyone can easily find and book the perfect car, anytime and anywhere') }}.</span>
                        </li>
                        <li>
                            <img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">
                            <span>{{ __('messages.Leverage innovation to simplify rentals with digital contracts, real-time availability, and secure payments') }}.</span>
                        </li>
                        <li>
                            <img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">
                            <span>{{ __('messages.Simplifying rentals with digital contracts, real-time availability, and secure payments') }}.</span>
                        </li>
                    </ul>
                    
                    <a href="#" class="btn btn-orange-clr rounded-pill px-3 text-white" data-bs-toggle="modal" data-bs-target="#registerModal">
                        {{ __('messages.Get Started') }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 mobile-m">
                    <div class="image-grid">
                        <img src="{{asset('/')}}frontend-assets/icons/mission1.png" class="img-fluid" alt="Car rental experience">
                        <img src="{{asset('/')}}frontend-assets/icons/mission2.png" class="img-fluid" alt="Car maintenance">
                        <img src="{{asset('/')}}frontend-assets/icons/mission3.png" class="img-fluid" alt="Customer in car">
                        <img src="{{asset('/')}}frontend-assets/icons/mission4.png" class="img-fluid" alt="Business discussion">
                    </div>
                </div>                
            </div>
        </section>

        <div class="container custom_commitment-section py-5">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 text-center custom_image-wrapper position-relative">
                    <img src="{{asset('/')}}frontend-assets/icons/about1.png" class="img-fluid rounded custom_main-image" alt="Businessman near car">
                    <button class="custom_play-btn position-absolute">
                        <i class="fa-solid fa-play"></i>
                    </button>
                    <img src="{{asset('/')}}frontend-assets/icons/car-commitment.png" class="img-fluid rounded custom_overlay-image position-absolute" alt="Happy customer in car">
                </div>
                <div class="col-lg-6 col-md-12 custom_commitment-text">
                    <span class="badge custom_badge">{{ __('messages.Our Commitment') }}</span>
                    <h1 class="mt-3 custom_heading">{{ __('messages.Our Promise to You: Excellence and Trust in Every Journey') }}"</h1>
                    <p class="mt-3 custom_paragraph">
                        {{ __('messages.At SelectandRent, we are committed to creating a car rental experience that’s as smooth, reliable, and transparent as possible') }}.
                        {{ __("messages.Whether you're renting for business, leisure, or life’s special moments, we’re here to ensure every step of the process is effortless and enjoyable") }}.
                    </p>
                    <ul class="custom-list">
                        <li>
                            <img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">
                            <span>{{ __('messages.Dedicated to Excellence, Driven by Trust') }}"</span>
                        </li>
                        <li>
                            <img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">
                            <span>{{ __('messages.Your Journey, Our Promise') }}"</span>
                        </li>
                        <li>
                            <img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">
                            <span>{{ __('messages.Building Trust, One Rental at a Time') }}"</span>
                        </li>
                    </ul>
                    <div class="py-3">
                    <a href="#" class="btn btn-orange-clr rounded-pill px-3 text-white" data-bs-toggle="modal" data-bs-target="#registerModal">
                        {{ __('messages.Get Started') }} <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    
                </div>
                </div>
            </div>
        </div>
 

<!-- chose section -->
<div class="container-fluid bg-white chose-bg-img mt-4">

    <!-- Mobile Section -->
    <div class="container mobile text-center py-5 d-block d-md-none">
        <h4 class="text-chose fw-bold">{{ __('messages.Why we choose us') }}</h4>
        <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }} <br> {{ __('messages.Customer Experience') }}</h3>

        <div class="mt-4">
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector.png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Affordable Pricing') }}</h5>
                <p class="text-muted">{{ __('messages.Enjoy low daily rates without compromising on quality') }}.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Perfect for Short Trips') }}</h5>
                <p class="text-muted">{{ __('messages.Ideal for city drives, quick errands, or budget travel') }}.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Fuel Efficiency') }}</h5>
                <p class="text-muted">{{ __('messages.Save on gas with cars designed for maximum mileage') }}.</p>
            </div>
            <div class="mb-4">
                <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="img-fluid mb-2" alt="">
                <h5 class="fw-bold">{{ __('messages.Wide Selection') }}</h5>
                <p class="text-muted">{{ __('messages.Choose from compact, mid-sized, and family-friendly models') }}.</p>
            </div>
        </div>
    </div>

    <!-- Desktop Section -->
    <div class="container Desktop  text-center py-5 d-none d-md-block">
        <h4 class="text-chose fw-bold">{{ __('messages.Why we choose us') }}</h4>
        <h3 class="fw-bold">{{ __('messages.We Are Ensuring the Best') }} <br> {{ __('messages.Customer Experience') }}</h3>

        <div class="row align-items-center mt-4">
            <!-- Left Side (Icons Last) -->
            <div class="col-lg-4 text-end">
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Most Flexible Payment') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector.png" class="ms-3 img-fixed" alt="">
                </div>
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Valuable Insights') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (1).png" class="ms-3 img-fixed" alt="">
                </div>
                <div class="mb-4 d-flex align-items-center justify-content-end">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Non-Stop Innovation') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (2).png" class="ms-3 img-fixed" alt="">
                </div>
            </div>

            <!-- Center Image -->
            <div class="col-lg-4 text-center">
                <img src="{{asset('/')}}frontend-assets/assets/car-1.png" class="img-fluid" alt="Center Image">
            </div>

            <!-- Right Side (Icons First) -->
            <div class="col-lg-4 text-start">
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (3).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Online Car Appraisal') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (4).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Personalized Search') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
                <div class="mb-4 d-flex align-items-center">
                    <img src="{{asset('/')}}frontend-assets/icons/Vector (5).png" class="me-3 img-fixed" alt="">
                    <div>
                        <h5 class="fw-bold mb-1">{{ __('messages.Consumer–First Mentality') }}</h5>
                        <p class="text-muted">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="team-section">
        <h3 class="text-primary">{{ __('messages.Meet with our award-winning members') }}</h3>
        <h2 class="mb-5 fw-bold">{{ __('messages.Our Amazing Team') }}</h2>

        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="team-card">
                        <img src="{{asset('/')}}frontend-assets/icons/ameazing.png" alt="Wade Warren">
                        <div class="social-icons">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin-in"></a>
                        </div>
                        <div class="team-info">
                            <span class="badge bg-dark">{{ __('messages.in') }}</span>
                            <h6 class="m-0">{{ __('messages.Wade Warren') }}</h6>
                            <p class="m-0">{{ __('messages.Marketing') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="team-card">
                        <img src="{{asset('/')}}frontend-assets/icons/ameazing.png" alt="Wade Warren">
                        <div class="social-icons">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin-in"></a>
                        </div>
                        <div class="team-info">
                            <span class="badge bg-dark">{{ __('messages.in') }}</span>
                            <h6 class="m-0">{{ __('messages.Wade Warren') }}</h6>
                            <p class="m-0">{{ __('messages.Marketing') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="team-card">
                        <img src="{{asset('/')}}frontend-assets/icons/ameazing.png" alt="Wade Warren">
                        <div class="social-icons">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin-in"></a>
                        </div>
                        <div class="team-info">
                            <span class="badge bg-dark">{{ __('messages.in') }}</span>
                            <h6 class="m-0">{{ __('messages.Wade Warren') }}</h6>
                            <p class="m-0">{{ __('messages.Marketing') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center">
                    <div class="team-card">
                        <img src="{{asset('/')}}frontend-assets/icons/ameazing.png" alt="Wade Warren">
                        <div class="social-icons">
                            <a href="#" class="fab fa-facebook-f"></a>
                            <a href="#" class="fab fa-twitter"></a>
                            <a href="#" class="fab fa-linkedin-in"></a>
                        </div>
                        <div class="team-info">
                            <span class="badge bg-dark">{{ __('messages.in') }}</span>
                            <h6 class="m-0">{{ __('messages.Wade Warren') }}</h6>
                            <p class="m-0">{{ __('messages.Marketing') }}</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

     </div>  


    <!-- end team -->

    <!-- testimonals -->

    <div class="container py-2">
        <h2 class="text-center fw-bold">{{ __('messages.Testimonials') }}</h2>
    
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
    
                <!-- Slide 1 -->
                <div class="carousel-item active">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="p-4">
                                <h2 class="fw-bold testimonial-text">{{ __('messages.Our Most Satisfied Customer says about us') }}!</h2>
                                <p class="text-primary secondary-text-size">{{ __('messages.Most of our user give us feedback regarding our services. You can see their comments on bellow') }}.</p>
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
                <h1 class="fw-bold">{{ __('messages.Here are some common questions about renting economical cars') }}:"</h1>
                </div>
            </div>
            <!-- Right Side Accordion -->
            <div class="col-md-6">
                <div class="accordion" id="faqAccordion">
                    
                    <!-- First Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                {{ __('messages.What is considered an economical car') }}?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Economical cars are typically compact or mid-sized vehicles with low rental and fuel costs') }}.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Second Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                {{ __('messages.Are economical cars suitable for long drives') }}?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                {{ __('messages.Economical cars are typically compact or mid-sized vehicles with low rental and fuel costs') }}.
                            </div>
                        </div>
                    </div>
                    
                    <!-- Third Item -->
                    <div class="accordion-item border-0 border-bottom">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button fw-bold collapsed shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                {{ __('messages.Can I add insurance to my rental') }}?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
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

  <!-- contact sections -->
  <div class="container contact-container">
    <div class="row g-4">
        <!-- Left Side -->
        <div class="col-md-4">
                <h3 class="faq">{{ __('messages.Can’t Find Answer') }}?</h3>
                <h1 class="fw-bold"><span class="faq">{{ __('messages.submit') }}</span>{{ __('messages.Your Queries') }} </h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <button class="btn btn-orange-clr rounded-pill text-white">
                    <i class="fa-solid fa-phone"></i>   (012) 245-6789
                </button>
        </div>

        <!-- Right Side -->
        <div class="col-md-8">
            <div class="contact-right">
                <form>
                    <div class="row g-3">
                        <!-- Query Type -->
                        <div class="col-md-6">
                            <label class="form-label">{{ __('messages.Query Type') }}</label>
                            <select class="form-select">
                                <option selected>{{ __('messages.Car Rental') }}</option>
                                <option>{{ __('messages.General Inquiry') }}</option>
                                <option>{{ __('messages.Support') }}</option>
                            </select>
                        </div>

                        <!-- Existing Customer -->
                        <div class="col-md-6">
                            <label class="form-label">{{ __('messages.Are you an existing customer') }}?</label>
                            <select class="form-select">
                                <option selected>{{ __('messages.Yes') }}</option>
                                <option>{{ __('messages.No') }}</option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.Your Name') }}</label>
                            <input type="text" class="form-control form-control-border" placeholder="John Doe">
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.Email Address') }}</label>
                            <input type="email" class="form-control form-control-border" placeholder="hello@example.com">
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.Phone Number') }}</label>
                            <input type="tel" class="form-control form-control-border" placeholder="+92 324 4469929">
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <label class="form-label">{{ __('messages.Message') }}</label>
                            <textarea class="form-control form-control-border" rows="2" placeholder="Write here..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end">
                            <button class="btn btn-orange-clr rounded-pill text-white px-4">
                                {{ __('messages.Submit') }}
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