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
                            What documents do I need to rent a car?  
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            To rent a car with Select and Rent, you'll need a valid driving license, your national ID or passport, and a debit or credit card for the security deposit.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            Can I book a car in advance? 
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, Select and Rent allows you to book your preferred vehicle in advance through our website or app. Advance bookings ensure availability and better pricing.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            Are there any mileage limits on rented vehicles?  
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Some vehicles may have mileage restrictions depending on the rental plan. Be sure to check the terms when selecting a car, or ask our support team for clarification.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                            What happens if I return the car late? 
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Late returns may incur additional charges based on hourly or daily rates. We recommend informing us ahead of time if you're expecting delays to avoid penalties.
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
                           How can I list my vehicles on Select and Rent? 
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            To list your vehicles, simply register as a partner on our platform, provide your company details, and upload your vehicle information along with photos and pricing. Our team will verify and approve your listings.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix">
                            Is there any fee to join as a rental partner?  
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Joining Select and Rent is completely free. We only charge a small commission on each successful booking, so you only pay when you earn.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven">
                            How do I manage bookings and availability? 
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            You’ll get access to a dedicated partner dashboard where you can update vehicle availability, confirm or decline bookings, and track your earnings in real-time.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight">
                            When do I receive payments for bookings? 
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Payments are processed after the rental is completed. You’ll receive your earnings (minus commission) directly to your registered bank account within 3–5 business days.
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
                    What is Select and Rent? 
                </button>
            </h2>
            <div id="question1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Select and Rent is an online platform that allows users to browse, compare, and rent vehicles from verified rental companies across different cities — all in one place.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question2">
                    How do I contact customer support? 
                </button>
            </h2>
            <div id="question2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    You can reach our support team via the "Contact Us" section on our website or app. We’re available via email, phone, and live chat to assist with your queries.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question3">
                    Is my information safe on Select and Rent? 
                </button>
            </h2>
            <div id="question3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Yes, we use secure encryption and follow strict privacy policies to ensure your personal and payment information remains protected at all times.
                </div>
            </div>
        </div>

        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question4">
                    How does the booking process work on Select and Rent? 
                </button>
            </h2>
            <div id="question4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                    Booking a vehicle is simple: choose your location, select a vehicle that fits your needs, pick your rental dates, and submit your booking request. Once confirmed by the rental company, you'll receive a booking confirmation with all the details.
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
                                <option selected>{{ __('messages.yes') }} </option>
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