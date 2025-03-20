@extends('website.layout.master')
@section('title')
Faqs | Select and Rent
@endsection

@section('content')
<!-- accordian faq -->
<div class="container py-5">
    <div class="row">
        <!-- Renters Section -->
        <div class="col-lg-6 mb-4">
            <h4 class="section-title"><span></span>For Renters</h4>
            <div class="accordion" id="accordionRenters">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            How to Search and Book a Car
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
                            Payment Methods and Security
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
                            Insurance and Coverage
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
                            Cancellation and Refunds
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
            <h4 class="section-title"><span></span>For Car Rental Companies</h4>
            <div class="accordion" id="accordionCompanies">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive">
                            How to Join SelectandRent
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
                            Listing and Managing Cars
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
                            Pricing and Commission Details
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
                            Featured Listings and Promotions
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
    <h3 class="text-center mb-4">General Questions</h3>
    <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#question1">
                    How to Search and Book a Car
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
                    Supported Languages and Regions
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
                    Account Management and Login Issues
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
                    Privacy and Data Protection Policies
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
                <h3 class="faq">Can’t Find Answer?</h3>
                <h1 class="fw-bold"><span class="faq">Submit</span> Your Queries</h1>
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
                            <label class="form-label">Query Type</label>
                            <select class="form-select">
                                <option selected>Car Rental</option>
                                <option>General Inquiry</option>
                                <option>Support</option>
                            </select>
                        </div>

                        <!-- Existing Customer -->
                        <div class="col-md-6">
                            <label class="form-label">Are you an existing customer?</label>
                            <select class="form-select">
                                <option selected>Yes</option>
                                <option>No</option>
                            </select>
                        </div>

                        <!-- Name -->
                        <div class="col-md-4">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control form-control-border" placeholder="John Doe">
                        </div>

                        <!-- Email -->
                        <div class="col-md-4">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control form-control-border" placeholder="hello@example.com">
                        </div>

                        <!-- Phone Number -->
                        <div class="col-md-4">
                            <label class="form-label">Phone Number</label>
                            <input type="tel" class="form-control form-control-border" placeholder="+92 324 4469929">
                        </div>

                        <!-- Message -->
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control form-control-border" rows="2" placeholder="Write here..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-12 text-end">
                            <button class="btn btn-orange-clr rounded-pill text-white px-4">
                                Submit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection