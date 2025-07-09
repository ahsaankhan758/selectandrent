@extends('website.layout.master')
@section('title')
{{ __('messages.Join') }}   
@endsection

@section('content')
 <!-- parther -->
 <div class="container desktop-view my-5">
    <h2 class="text-center mb-5">{{ __('messages.Why Partner with Select and Rent') }}</h2>
    <!-- Part 1 -->
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-3">
            <h4 class="fw-bold">{{ __('messages.Our Personal Coach') }} </h4>
            <p class="text-muted text-font">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }} .</p>
            <ul class="list-unstyled">
                <li class="mb-1"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">{{ __('messages.Passive Income') }}  </li>
                <li class="mb-1"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.Reduced Costs') }} </li>
                <li class="mb-1"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">{{ __('messages.Peace of Mind') }}  </li>
                <li class="mb-1"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security">{{ __('messages.Flexibility') }}  </li>
            </ul>
        </div>

        <div class="col-lg-4 col-md-4 text-center">
            <img src="{{asset('/')}}frontend-assets/assets/jointeam.png" class="img-fluid custom-join-img rounded" alt="Join Our Team">
        </div>

        <div class="col-lg-5 col-md-5">
            <p class="custom-text-heading fw-bold">{{ __('messages.Become a Partner and Grow Your Business') }} </p>
            <h3 class="fw-bold heading-text-font">{{ __('messages.Earn extra income, reduce costs, enjoy peace of mind') }} </h3>
            <p class="text-muted text-font">{{ __('messages.Connect with like-minded individuals and contribute to sustainable mobility. Customize your rental schedule to fit your lifestyle. Professional management and insurance coverage') }} .</p>
        </div>
    </div>

    <!-- Part 2 -->
    <div class="row mt-3 align-items-center">
        <div class="col-lg-4 col-md-4">
        <div class="custom-col">
            <p class="custom-title">{{ __('messages.Speaking Good') }} <span class="custom-success">99%</span></p>
            <div class="custom-progress">
                <div class="custom-progress-bar custom-progress-success" style="width: 99%;"></div>
            </div>
        
            <p class="custom-title mt-3">{{ __('messages.Skills Have') }} <span class="custom-danger">97%</span></p>
            <div class="custom-progress">
                <div class="custom-progress-bar custom-progress-danger" style="width: 97%;"></div>
            </div>
        </div>
    </div>

        <div class="col-lg-4 col-md-4 text-center">
            <img src="{{asset('/')}}frontend-assets/assets/jointeam2.png" class="img-fluid custom-join-img2 rounded" alt="Car Image">
        </div>

        <div class="col-lg-4 col-md-4 ps-lg-4 mb-3">
            <ul class="list-unstyled">
                <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> <strong>{{ __('messages.Best Choicing') }}</strong></li>
                <p class="text-muted ">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}</p>

                <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> <strong>{{ __('messages.Good People') }}</strong></li>
                <p class="text-muted ">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}</p>
            </ul>
            <button class="btn btn-orange-clr rounded-pill text-white">
                {{ __('messages.View All') }}   <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
            </button> 
        </div>
    </div>
</div>
<!-- mobile view -->
<div class="mobile-container">
    <h2 class="mobile-heading">{{ __('messages.Why Partner with SelectandRent') }} </h2>
    <p class="mobile-subheading">{{ __('messages.Become a Partner and Grow Your Business') }} </p>
    <p class="mobile-text">
        {{ __('messages.Earn extra income, reduce costs, enjoy peace of mind. Connect with like-minded individuals and contribute to sustainable mobility') }}  .
    </p>


    <div class="mobile-image">
        <img src="{{asset('/')}}frontend-assets/assets/jointeam.png" alt="Join Our Team">
    </div>

    <div class="mobile-box">
        <p class="mobile-check"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.Best Choicing') }}</p>
        <p class="mobile-text">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}</p>
    </div>

    <div class="mobile-box">
        <p class="mobile-check"><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.Good People') }}</p>
        <p class="mobile-text">{{ __('messages.Uniquely revolutionize manufactured products for interactive customer service') }}.</p>
    </div>

    <button class="btn btn-orange-clr rounded-pill text-white">
        {{ __('messages.View All') }} <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
    </button>

    <div class="mobile-image mt-2">
        <img src="{{asset('/')}}frontend-assets/assets/jointeam2.png" alt="Car Image">
    </div>  

    <h3 class="mobile-title">{{ __('messages.Our Personal Coach') }}</h3>
    <ul class="mobile-list">
        <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.Passive Income') }}</li>
        <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.Reduced Costs') }}</li>
        <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.Peace of Mind') }}</li>
        <li><img src="{{asset('/')}}frontend-assets/icons/Security2.png" alt="security"> {{ __('messages.Flexibility') }}</li>
    </ul>

    <p class="mobile-progress-title">{{ __('messages.Speaking Good') }}  <span class="progress-success">99%</span></p>
    <div class="mobile-progress">
        <div class="mobile-progress-bar success" style="width: 99%;"></div>
    </div>

    <p class="mobile-progress-title">{{ __('messages.Skills Have') }} <span class="progress-danger">97%</span></p>
    <div class="mobile-progress">
        <div class="mobile-progress-bar danger" style="width: 97%;"></div>
    </div>
</div>

  <!-- parther -->
 <!-- benefits -->
 <div class="container desktop-benefits">
    <h2 class="text-center mb-5">{{ __('messages.Key Benefits of Partnering') }}</h2>
    <div class="row custom-benefit-container">
        <div class="col-md-3 text-center custom-benefit-step">
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/1.png" class="custom-icon-circle" alt="Easy Signup">
            </div>
            <h5 class="mt-3">{{ __('messages.Easy signup process') }}</h5>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
        </div>
        <div class="col-md-3 text-center custom-benefit-step">
            <h5 class="mt-3">{{ __('messages.Flexible terms') }}</h5>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/2.png" class="custom-icon-circle" alt="Flexible Terms">
            </div>
        </div>
        <div class="col-md-3 text-center custom-benefit-step">
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/1(1).png" class="custom-icon-circle" alt="High Earning Potential">
            </div>
            <h5 class="mt-3">{{ __('messages.High earning potential') }}</h5>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
        </div>
        <div class="col-md-3 text-center custom-benefit-step">
            <h5 class="mt-3">{{ __('messages.24/7 support') }}</h5>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
            <div>
                <img src="{{asset('/')}}frontend-assets/icons/2(1).png" class="custom-icon-circle" alt="24/7 Support">
            </div>
        </div>
    </div>
</div>
<!-- mobile view -->
<div class="benefits-container mobile-benefits">
    <h2 class="benefits-heading">{{ __('messages.Key Benefits of Partnering') }}</h2>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/1.png" alt="Icon"></div>
        <!-- <div class="line"></div> -->
        <div class="content">
            <h3>{{ __('messages.Flexible terms') }}</h3>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
        </div>
    </div>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/2.png" alt="Icon"></div>
        <!-- <div class="line"></div> -->
        <div class="content">
            <h3>{{ __('messages.Easy signup process') }}</h3>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
        </div>
    </div>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/1(1).png" alt="Icon"></div>
        <!-- <div class="line"></div> -->
        <div class="content">
            <h3>{{ __('messages.Easy signup process') }}</h3>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
        </div>
    </div>

    <div class="benefit-item">
        <div class="icon"><img src="{{asset('/')}}frontend-assets/icons/2(1).png" alt="Icon"></div>
        <div class="content">
            <h3>{{ __('messages.Easy signup process') }}</h3>
            <p>{{ __('messages.In a free hour, when our power of choice is untrammeled and...') }}</p>
        </div>
    </div>
</div>
  <!-- end benefits -->
 <!-- Work -->
 <div class="container py-5">
    <h2 class="text-center text-warning mb-4"><h2 class="text-center text-warning mb-4">{{ __('messages.How It Works') }}</h2></h2>
    <p class="text-center">{{ __('messages.Loripsome is a  Finance Suite provides you with a personalized experience to obtain credit and financing for your company. You’ll also receive guidance from our business advising team, who will help you with all') }}.</p>
    <div class="steps">
        <div class="step-item reverse">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.Register Your Business') }}</h4>
                <p>{{ __('messages.Sign up on our platform and provide your company details') }}.</p>
            </div>
        </div>

        <div class="step-item">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.List Your Cars') }}</h4>
                <p>{{ __('messages.Easily add your vehicles with features like license plate scanning for quick data entry') }}.</p>
            </div>
        </div>
        <div class="step-item reverse">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.Set Pricing & Availability') }}</h4>
                <p>{{ __('messages.Use our intuitive calendar to update car availability and pricing') }}.</p>
            </div>
        </div>

        <div class="step-item">
            <div class="icon-wrap"><img src="{{asset('/')}}frontend-assets/icons/handshake.png" alt="Step Icon"></div>
            <div class="step-content">
                <h4>{{ __('messages.Connect with Renters') }}</h4>
                <p>{{ __('messages.Communicate directly with renters to answer queries and confirm bookings') }}.</p>
            </div>
        </div>
    </div>
    <div class=" text-center">
        <button class="btn btn-orange-clr rounded-pill text-white"
        data-bs-toggle="modal" 
        data-bs-target="#carRentalModal">
        {{ __('messages.Fill the registration form') }}
    <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
</button>

</div>
</div> 
 <!-- work end -->
 <!-- price -->
 <div class="container py-5">
    <h2 class="text-center mb-4">{{ __('messages.Pricing Plans and Features') }}</h2>
    <div class="row g-4">
        <div class="col-lg-4 col-md-6">
            <div class="pricing-card p-4">
                <div class="container-fluid slanted-box">
                    <h5>{{ __('messages.STUDENT PACKAGE') }}</h5>
                    <p class="price">$250 <span class="price">/{{ __('messages.Month') }}</span></p>
                </div>
                <img src="{{asset('/')}}frontend-assets/icons/price-tag.png" class="price-icon" alt="Price Tag"> 
                <ul class="feature-list">
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 02 {{ __('messages.Passengers') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 5 km {{ __('messages.km Distance Only') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.No Extra Charges') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.Free Book NO Advance') }}</li>
                </ul>
                <button class="btn rounded-pill text-white d-flex align-items-center px-3 py-2 custom-btn">
                    {{ __('messages.Purchase Now') }}
                <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
                </button> 
            </div>
        </div>        
        <div class="col-lg-4 col-md-6">
            <div class="pricing-card p-4">
                <div class="container-fluid slanted-box">
                <h5>{{ __('messages.MEDICAL PACKAGE') }}</h5>
                <p class="price">$250 <span class="price">/{{ __('messages.Month') }}</span></p>
                </div>
                <img src="{{asset('/')}}frontend-assets/icons/price-tag.png" class="price-icon" alt="Price Tag"> 
                <ul class="feature-list">
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 02 {{ __('messages.Passengers') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 5 km {{ __('messages.km Distance Only') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.No Extra Charges') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.Free Book NO Advance') }}</li>
                </ul>
                <button class="btn rounded-pill text-white d-flex align-items-center px-3 py-2 custom-btn">
                    {{ __('messages.Purchase Now') }}
                    <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
                </button> 
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="pricing-card p-4">
                <div class="container-fluid slanted-box">
                    <h5>{{ __('messages.BUSINESS PACKAGE') }}</h5>
                    <p class="price">$250 <span class="price">/{{ __('messages.Month') }}</span></p>
                </div>
                <img src="{{asset('/')}}frontend-assets/icons/price-tag.png" class="price-icon" alt="Price Tag"> 
                <ul class="feature-list">
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 02 {{ __('messages.Passengers') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> 5 {{ __('messages.km Distance Only') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.No Extra Charges') }}</li>
                    <hr>
                    <li><img src="{{asset('/')}}frontend-assets/icons/security.png" alt="security"> {{ __('messages.Free Book NO Advance') }}</li>
                </ul>
                <button class="btn rounded-pill text-white d-flex align-items-center px-3 py-2 custom-btn">
                    {{ __('messages.Purchase Now') }}
                    <img src="{{asset('/')}}frontend-assets/icons/Frame-1707482121.png" class="ms-2" width="20" height="20" alt="">
                </button> 
            </div>
        </div>
    </div>
</div>
  <!-- end price -->
    <!-- testimonals -->
    <div class="container py-5">
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
                                {{ __('messages.Economical cars are typically compact or mid-sized vehicles with low rental and fuel costs') }}
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
@endsection