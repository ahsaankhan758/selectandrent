  @if(request()->is('carbooking') || request()->is('checkout') || request()->is('confirmation'))

  {{-- footer 2 for booking , confirm booking and checkout opages --}}

  <div class="container-fluid inner-footer py-5">
    <div class="container">
        <div class="col-md-12 d-flex flex-column flex-md-row text-center text-md-start">
            <div class="col-md-6 col-12 text-white  ">
                <h5>Want to know about our offers first?</h5>
                <h4>Subscribe our newsletter</h4>
            </div>
            <div class="col-md-6 col-12 mt-3 mt-md-0 d-flex justify-content-center justify-content-md-end">
                <div class="subscribe-box rounded-pill">
                    <input type="email" placeholder="Your Email...">
                    <button>Subscribe</button>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="">
                <img src="{{asset('/')}}company-assets/logo/select-and-rent--jpg 2.png" alt="Logo" class="logo-inner-footer">
            </a>
        </div>
        <div class="container py-4">
            <div class="row text-center text-white align-items-center">
                <div class="col-md-2">
                    <img src="{{asset('/')}}company-assets/icons/call 1.png" class="mb-2 icons-inner-footer" alt="call">
                    <p class="mb-0 text-inner-footer">0 (550) 680-34-12</p>
                    <small class="text-inner-footer">Round-the-clock</small>
                </div>
                <div class="col-md-1 d-none d-md-block border-custom"></div>
                <div class="d-block d-md-none border-custom mt-2 mb-2"></div>
                <div class="col-md-2">
                    <img src="{{asset('/')}}company-assets/icons/maps-and-flags 1.png" class="mb-2 icons-inner-footer" alt="call">
                    <p class="mb-0 text-inner-footer">1353 Locust St, Kansas City,</p>
                    <small class="text-inner-footer">MO 64106</small>
                </div>
                <div class="col-md-1 d-none d-md-block border-custom"></div>
                <div class="d-block d-md-none border-custom mt-2 mb-2"></div>
                <div class="col-md-2">
                    <img src="{{asset('/')}}company-assets/icons/mail (1) 1.png" class="mb-2 icons-inner-footer" alt="call">
                    <p class="mb-0 text-inner-footer">hello@sparkodic.com</p>
                </div>
                <div class="col-md-1 d-none d-md-block border-custom"></div>
                <div class="d-block d-md-none border-custom mt-2 mb-2"></div>
                <div class="col-md-2">
                    <img src="{{asset('/')}}company-assets/icons/clock (5) 1.png" class="mb-2 icons-inner-footer" alt="call">
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
      <h2 class="ready-start">Ready to Start This?</h2>
      <p>It's easy to get in contact with me. Either call or write!</p>

      <div class="d-flex justify-content-center text-white flex-wrap">
          <div class="text-center">
              <a href="tel:0123456789" class="contact-btn"><i class="fas fa-phone"></i> (012) 345 - 6789</a>
              <p><i class="fas fa-phone"></i> 24/7 service</p>
          </div>
          <div class="text-center">
              <a href="mailto:joseh@contact.com" class="contact-btn"><i class="fas fa-envelope"></i> joseh@contact.com</a>
              <p><i class="fas fa-clock"></i> Mon-Sat: 10am-6pm <br> Closed Monday</p>
          </div>
      </div>
  </div>
</div> 
<div class="footer-container text-white">
      <div class="container">
          <div class="row">
              <div class="col-md-3 col-6">
                  <h5>Quick Links</h5>
                  <div class="d-flex gap-2">
                      <hr class="hr-yellow">
                      <hr class="hr-white">
                  </div>
                  <ul class="list-unstyled footer-links">
                      <li><a href="{{ url('/') }}">Home</a></li>
                      <li><a href="{{ url('/about-us') }}">About</a></li>
                      <li><a href="#">Services</a></li>
                      <li><a href="{{ url('/carlisting') }}">Vehicles</a></li>
                      <li><a href="{{ url('/join-our-program') }}">Pricing</a></li>
                      <li><a href="{{ url('/faqs') }}">Faq's</a></li>
                      <li><a href="{{ url('/contact') }}">Contact</a></li>
                  </ul>                    
              </div>
              <div class="col-md-3 col-6">
                  <h5>Vehicle Type</h5>
                  <div class="d-flex gap-2">
                      <hr class="hr-yellow">
                      <hr class="hr-white">
                  </div>
                  <ul class="list-unstyled footer-links">
                      <li><a href="#">Pickup</a></li>
                      <li><a href="#">Coup</a></li>
                      <li><a href="#">Family MPV</a></li>
                      <li><a href="#">Sedan</a></li>
                      <li><a href="#">Sport Coupe</a></li>
                  </ul>                    
              </div>
              <div class="col-md-6 col-12 text-start">
              <img src="{{asset('/')}}company-assets/logo/select-and-rent--jpg 2.png" alt="Logo" width="60px" height="60px">
                  <p>Whether you need a compact car for city drives, a luxury vehicle for a special event, or a spacious SUV for a family trip, our rental service offers a wide range of options tailored to your needs.</p>
                  <div class="social-icons-footer mt-2 mb-5">
                      <a href="#" class="icon"><i class="fab fa-facebook-f"></i></a>
                      <a href="#" class="icon"><i class="fab fa-twitter"></i></a>
                      <a href="#" class="icon"><i class="fab fa-youtube"></i></a>
                  </div>
                  <div class="buttons">
                      <a href="{{ url('/contact') }}" class="contact-btn-ctn">CONTACT US</a>
                      <a href="{{ url('/contact') }}" class="arrow-btn"><img src="{{asset('/')}}company-assets/icons/arrow.png" class="img-icon rounded-pill p-1" alt=""></a>
                  </div>  
              </div>
          </div>
          <div class="footer-bottom">©2025 Nwlogics. All Right Reserved</div>
      </div>
  </div>
  @endif