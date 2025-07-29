  @if (request()->is('carbooking') || request()->is('checkout') || request()->is('confirmation'))
      {{-- footer 2 for booking , confirm booking and checkout opages --}}
    <div class="container-fluid inner-footer py-5">
        <div class="container">
            <div class="col-md-12 d-flex flex-column flex-md-row text-center text-md-start">
                <div class="col-md-6 col-12 text-white  ">
                    <h5>{{ __('messages.want_to_know') }}?</h5>
                    <h4>{{ __('messages.subscribe_our_newsletter') }}</h4>
                </div>
                <div class="col-md-6 col-12 mt-3 mt-md-0 d-flex justify-content-center justify-content-md-end">
                    <div class="subscribe-box rounded-pill">
                        <input type="email" placeholder="Your Email...">
                        <button>{{ __('messages.subscribe') }}</button>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="">
                    <img src="{{ asset('/') }}frontend-assets/logo/select-and-rent--jpg 2.png" alt="Logo"
                        class="logo-inner-footer">
                </a>
            </div>
            <div class="container py-4">
                <div class="row text-center text-white align-items-center">
                    <div class="col-md-2">
                        <img src="{{ asset('/') }}frontend-assets/icons/call 1.png" class="mb-2 icons-inner-footer"
                            alt="call">
                        <p class="mb-0 text-inner-footer">0 (550) 680-34-12</p>
                        <small class="text-inner-footer">{{ __('messages.round_the_clock') }}</small>
                    </div>
                    <div class="col-md-1 d-none d-md-block border-custom"></div>
                    <div class="d-block d-md-none border-custom mt-2 mb-2"></div>
                    <div class="col-md-2">
                        <img src="{{ asset('/') }}frontend-assets/icons/maps-and-flags 1.png"
                            class="mb-2 icons-inner-footer" alt="call">
                        <p class="mb-0 text-inner-footer">1353 Locust St, Kansas City,</p>
                        <small class="text-inner-footer">MO 64106</small>
                    </div>
                    <div class="col-md-1 d-none d-md-block border-custom"></div>
                    <div class="d-block d-md-none border-custom mt-2 mb-2"></div>
                    <div class="col-md-2">
                        <img src="{{ asset('/') }}frontend-assets/icons/mail (1) 1.png"
                            class="mb-2 icons-inner-footer" alt="call">
                        <p class="mb-0 text-inner-footer">hello@sparkodic.com</p>
                    </div>
                    <div class="col-md-1 d-none d-md-block border-custom"></div>
                    <div class="d-block d-md-none border-custom mt-2 mb-2"></div>
                    <div class="col-md-2">
                        <img src="{{ asset('/') }}frontend-assets/icons/clock (5) 1.png"
                            class="mb-2 icons-inner-footer" alt="call">
                        <p class="mb-0 text-inner-footer">Mo-Sa: 07:00 - 22:00</p>
                        <small class="text-inner-footer">Su: 07:00 - 16:00</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
  @else
      {{-- end footer 2 --}}
      <div class="container">
          <div class="contact-section">
              <h2 class="ready-start">{{ __('messages.ready_to_start_this') }}?</h2>
              <p>{{ __("messages.it's_easy") }}!</p>

              <div class="d-flex justify-content-center text-white flex-wrap">
                  <div class="text-center">
                      <a href="tel:0123456789" class="contact-btn"><i class="fas fa-phone"></i> 0300-XXXXX90</a>
                      <p><i class="fas fa-phone"></i> {{ __('messages.24/7_service') }}</p>
                  </div>
                  <div class="text-center">
                      <a href="mailto:hello@sparkodic.com" class="contact-btn"><i class="fas fa-envelope"></i>
                          hello@sparkodic.com</a>
                      <p><i class="fas fa-clock"></i> {{ __('messages.monday_saturday') }}
                          <br>{{ __('messages.sunday') }}</p>
                  </div>
              </div>
          </div>
      </div>
      <div class="footer-container text-white">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 col-12 text-start">
                      <img src="{{ asset('/') }}frontend-assets/logo/select-and-rent--jpg 2.png" alt="Logo"
                          width="120px" height="120px">
                      <p>{{ __('messages.whether_you_need') }}.
                      </p>
                      <div class="social-icons-footer mt-2 mb-5">
                          <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                          <a href="#" class="icon"><i class="fab fa-twitter"></i></a>
                          <a href="#" class="icon"><i class="fab fa-youtube"></i></a>
                      </div>
                  </div>
                  <div class="col-md-3 col-6">
                      <h5>{{ __('messages.quick_links') }}</h5>
                      <div class="d-flex gap-2">
                          <hr class="hr-yellow">
                          <hr class="hr-white">
                      </div>
                      <ul class="list-unstyled footer-links">
                          {{-- <li><a href="{{ url('/') }}">{{ __('messages.home') }}</a></li> --}}
                          <li><a href="{{ url('/about-us') }}">{{ __('messages.about') }}</a></li>
                          <li><a href="{{ url('/carlisting') }}">{{ __('messages.vehicles') }}</a></li>
                          <li><a href="{{ url('/join-our-program') }}">{{ __('messages.pricing') }}</a></li>
                          <li><a href="{{ url('/faqs') }}">{{ __('messages.FAQ') }}</a></li>
                          <li><a href="{{ url('/contact') }}">{{ __('messages.contact') }}</a></li>
                          <li><a href="{{ url('/terms&conditions') }}">{{ __('messages.terms') }}</a></li>
                          <li><a href="{{ url('/privacy-policy') }}">{{ __('messages.privacy') }}</a></li>
                      </ul>
                  </div>
                  <div class="col-md-3 col-6">
                      <h5>{{ __('messages.vehicle') }} {{ __('messages.type') }} </h5>
                      <div class="d-flex gap-2">
                          <hr class="hr-yellow">
                          <hr class="hr-white">
                      </div>
                      <ul class="list-unstyled footer-links">
                          <li><a href="#">{{ __('messages.sedan') }}</a></li>
                          <li><a href="#">{{ __('messages.hatchback') }}</a></li>
                          <li><a href="#">{{ __('messages.suv') }}</a></li>
                          <li><a href="#">{{ __('messages.crossover') }}</a></li>
                          <li><a href="#">{{ __('messages.coupe') }}</a></li>
                          <li><a href="#">{{ __('messages.convertible') }}</a></li>
                          <li><a href="#">{{ __('messages.minivan') }}</a></li>
                          <li><a href="#">{{ __('messages.station_wagon') }}</a></li>
                      </ul>
                  </div>
                  
              </div>
              <div class="footer-bottom py-3">
                ©<?= date('Y') ?> Select And Rent. {{ __('messages.all_right_reserved') }}
              </div>
          </div>
      </div>
  @endif
