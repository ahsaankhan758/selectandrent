@extends('website.layout.master')
@section('title')
{{ __('messages.FAQ') }}   
@endsection

@section('content')
<!-- accordian faq -->
<div class="container py-5">
    <div class="row">
        <!-- Renters Section -->
        <div class="col-lg-6 mb-4">
            <h4 class="section-title"><span></span>{{ __('messages.for_renters') }} </h4>
            <div class="accordion" id="accordionRenters">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            {{ __('messages.how_to_search') }}  
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            {{ __('messages.payment_methods_and_security') }} 
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            {{ __('messages.insurance_and_coverage') }}  
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                            {{ __('messages.cancellation_and_refunds') }} 
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Car Rental Companies Section -->
        <div class="col-lg-6">
            <h4 class="section-title"><span></span>{{ __('messages.for_vehicle_rental_companies') }} </h4>
            <div class="accordion" id="accordionCompanies">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                            {{ __('messages.how_to_join') }} 
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                            {{ __('messages.listing_and_managing') }}  
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                            {{ __('messages.pricing_and_commission') }} 
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                            {{ __('messages.featured_listings') }} 
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <!-- end accordian faq -->
  <!-- questions accordian -->
  <div class="container py-3">
    <h3 class="text-center mb-4">{{ __('messages.general_questions') }} </h3>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question1">
                    {{ __('messages.how_to_search') }} 
                </button>
            </h2>
            <div id="question1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question2">
                    {{ __('messages.supported_languages') }}  
                </button>
            </h2>
            <div id="question2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question3">
                    {{ __('messages.account_management') }} 
                </button>
            </h2>
            <div id="question3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question4">
                    {{ __('messages.privacy_and_data') }} 
                </button>
            </h2>
            <div id="question4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </div>
            </div>
        </div>
    </div>
</div>
   <!-- end questions according -->

 <!-- contact sections -->
 <div class="container contact-container">
    <div class="row g-4">
        <!-- Left Side -->
        <div class="col-md-4">
                <h3 class="faq">{{ __('messages.can’t_find_answer') }} ?</h3>
                <h1 class="fw-bold"><span class="faq">{{ __('messages.submit') }} </span> {{ __('messages.your_queries') }} </h1>
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
                            <label class="form-label">{{ __('messages.query_type') }} </label>
                            <select class="form-select">
                                <option selected>{{ __('messages.vehicle_rental') }} </option>
                                <option>{{ __('messages.general_inquiry') }} </option>
                                <option>{{ __('messages.support') }} </option>
                            </select>
                        </div>

                        <!-- Existing Customer -->
                        <div class="col-md-6">
                            <label class="form-label">{{ __('messages.are_you_an_existing') }} ?</label>
                            <select class="form-select">
                                <option selected>{{ __('messages.Yes') }} </option>
                                <option>{{ __('messages.no') }} </option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.your_name') }} </label>
                            <input type="text" class="form-control form-control-border" placeholder="John Doe">
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.email_address') }} </label>
                            <input type="email" class="form-control form-control-border" placeholder="hello@example.com">
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <label class="form-label">{{ __('messages.phone_number') }} </label>
                            <input type="tel" class="form-control form-control-border" placeholder="+92 324 4469929">
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <label class="form-label">{{ __('messages.message') }} </label>
                            <textarea class="form-control form-control-border" rows="2" placeholder="Write here..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end">
                            <button class="btn btn-orange-clr rounded-pill text-white px-4">
                                {{ __('messages.submit') }} 
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection