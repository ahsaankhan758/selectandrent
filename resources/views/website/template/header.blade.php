@if(request()->is('/'))
<div class="hero-header">
  <!-- Desktop Header (Visible on Large Screens) -->
  <header class="header-container d-none d-md-block">
      <div class="container">
          <div class="row align-items-center">
              <!-- Logo -->
              <div class="col-6 col-md-2">
                  <a href="">
                      <img src="{{asset('/')}}company-assets/logo/select-and-rent--jpg 2.png" alt="Logo" width="150">
                  </a>
              </div>
              <!-- Navbar -->
              <div class="col-md-7">
                  <nav class="navbar navbar-expand-md" style="white-space: nowrap;">
                      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                          <ul class="navbar-nav">
                              <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('/carlisting') }}">Car Listing</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('/categories') }}">Categories</a></li>
              
                              <!-- Dropdown for General -->
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      General
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/join-our-program') }}">join our program</a></li>
                                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/about-us') }}">About Us</a></li>
                                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/blog') }}">Blogs</a></li>
                                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/faqs') }}">FAQ</a></li>
                                  </ul>
                              </li>
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      Booking Order
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/carbooking') }}">Car Booking</a></li>
                                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/confirmation') }}">Order Confirmation</a></li>
                                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/checkout') }}">Check out</a></li>
                                  </ul>
                              </li>
              
                              <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                          </ul>
                      </div>
                  </nav>
              </div>
              
  
  
              <!-- Get Started Button -->
              <div class="col-md-3 text-end">
                  <a href="#" class="btn ms-3 rounded-pill px-3 text-white btn-orange-clr" data-bs-toggle="modal" data-bs-target="#registerModal">
                      Get Started <i class="fa-solid fa-arrow-right"></i>
                  </a>
              </div>
              
              
          </div>
      </div>
  </header>
  
  <!-- Mobile Header (Visible on Mobile Screens) -->
  <header class="header-container d-md-none">
      <div class="container">
          <div class="d-flex justify-content-between align-items-center">
              <!-- Navbar Toggle Button (Left Side) -->
              <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNavbar"
                  aria-controls="mobileNavbar" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
  
              <!-- Logo (Center) -->
              <div class="flex-grow-1 text-center">
                  <a href="home.html">
                      <img src="{{asset('/')}}company-assets/logo/select-and-rent--jpg 2.png" alt="Logo" width="100">
                  </a>
              </div>
  
              <!-- Get Started Button (Smaller) -->
              <a href="#" class="btn rounded-pill px-2 py-1 text-white btn-orange-clr" data-bs-toggle="modal" data-bs-target="#registerModal" style="font-size: 10px;">Get Started <i class="fa-solid fa-arrow-right"></i></a>
          </div>
  
          <!-- Mobile Collapsible Menu -->
          <div class="collapse mt-2" id="mobileNavbar">
              <ul class="navbar-nav text-center">
                  <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('/carlisting') }}">Car Listing</a></li>
                  <li class="nav-item"><a class="nav-link" href="{{ url('/categories') }}">Categories</a></li>
  
                  <!-- Dropdown for General -->
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          General
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                          <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/join-our-program') }}">join our program</a></li>
                          <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/about-us') }}">About Us</a></li>
                          <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/blog') }}">Blogs</a></li>
                          <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/faqs') }}">FAQ</a></li>
                      </ul>
                  </li>
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Booking Order
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                          <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/carbooking') }}">Car Booking</a></li>
                          <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/confirmation') }}">Order Confirmation</a></li>
                          <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/checkout') }}">Check out</a></li>
                      </ul>
                  </li>
  
                  <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
              </ul>
          </div>
      </div>
  </header>
  
  
  
  <!-- Hero Section Start -->
  <div class="hero-section text-center text-white">
      <h1 class="display-5 fw-bold">
          <span class="custom-bg-warning">Rent</span> a Car, Anytime,
      </h1>   
      <h1 class="display-5 fw-bold">Anywhere</h1>
      
      <div class="tabpanel-form mx-auto">
          <form class="row g-2">
              <div class="col-md-12">
                  <div class="row g-2">
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>Brand</option>
                              <option value="Toyota">Toyota</option>
                          </select>
                      </div>
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>All Models</option>
                              <option value="Corolla">Corolla</option>
                          </select>
                      </div>
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>Beam</option>
                              <option value="Toyota Beam">Toyota Beam</option>
                          </select>
                      </div>
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>Transmission</option>
                              <option value="Auto">Auto</option>
                              <option value="Manual">Manual</option>
                          </select>
                      </div>
                  </div>
                  <div class="row g-2 mt-1">
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>Radius</option>
                              <option value="2">2</option>
                              <option value="5">5</option>
                          </select>
                      </div>
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>Min</option>
                              <option value="2">2</option>
                          </select>
                      </div>
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>Max</option>
                              <option value="10">10</option>
                          </select>
                      </div>
                      <div class="col-md-3 col-6">
                          <select class="form-select">
                              <option disabled selected>Postal Code</option>
                              <option value="54000">54000</option>
                              <option value="64000">64000</option>
                          </select>
                      </div>
                  </div>
              </div>
              <div class="col-md-12">
                  <button class="btn btn-orange-clr w-100 d-flex justify-content-center text-white align-items-center">
                      Search <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>
                  </button>
              </div>                                    
          </form>
      </div>
      <img src="{{asset('/')}}company-assets/assets/apps-bg-1-300x123.png" alt="Car" class="car-image">
  </div>
  </div>
  {{-- header 2 --}}
  @else

  <div class="hero-header-2">
    <!-- Desktop Header (Visible on Large Screens) -->
<header class="header-container d-none d-md-block">
  <div class="container">
      <div class="row align-items-center">
          <!-- Logo -->
          <div class="col-6 col-md-2">
              <a href="">
                  <img src="{{asset('/')}}company-assets/logo/select-and-rent--jpg 2.png" alt="Logo" width="150">
              </a>
          </div>

          <!-- Navbar -->
          <div class="col-md-7">
              <nav class="navbar navbar-expand-md">
                  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                      <ul class="navbar-nav">
                          <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{ url('/carlisting') }}">Car Listing</a></li>
                          <li class="nav-item"><a class="nav-link" href="{{ url('/categories') }}">Categories</a></li>
          
                          <!-- Dropdown for General -->
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  General
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                                  <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/join-our-program') }}">join our program</a></li>
                                  <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/about-us') }}">About Us</a></li>
                                  <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/blog') }}">Blogs</a></li>
                                  <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/faqs') }}">FAQ</a></li>
                              </ul>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Booking Order
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                                  <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/carbooking') }}">Car Booking</a></li>
                                  <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/confirmation') }}">Order Confirmation</a></li>
                                  <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/checkout') }}">Check out</a></li>
                              </ul>
                          </li>
          
                          <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
                      </ul>
                  </div>
              </nav>
          </div>
          


          <!-- Get Started Button -->
          <div class="col-md-3 text-end">
              <a href="#" class="btn ms-3 rounded-pill px-3 text-white btn-orange-clr" data-bs-toggle="modal" data-bs-target="#registerModal">
                  Get Started <i class="fa-solid fa-arrow-right"></i>
              </a>
          </div>
          
          
      </div>
  </div>
</header>

<!-- Mobile Header (Visible on Mobile Screens) -->
<header class="header-container d-md-none">
  <div class="container">
      <div class="d-flex justify-content-between align-items-center">
          <!-- Navbar Toggle Button (Left Side) -->
          <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileNavbar"
              aria-controls="mobileNavbar" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <!-- Logo (Center) -->
          <div class="flex-grow-1 text-center">
              <a href="home.html">
                  <img src="logo/select-and-rent--jpg 2.png" alt="Logo" width="100">
              </a>
          </div>

          <!-- Get Started Button (Smaller) -->
          <a href="#" class="btn rounded-pill px-2 py-1 text-white btn-orange-clr" data-bs-toggle="modal" data-bs-target="#registerModal" style="font-size: 10px;">Get Started <i class="fa-solid fa-arrow-right"></i></a>
      </div>

      <!-- Mobile Collapsible Menu -->
      <div class="collapse mt-2" id="mobileNavbar">
          <ul class="navbar-nav text-center">
              <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/carlisting') }}">Car Listing</a></li>
              <li class="nav-item"><a class="nav-link" href="{{ url('/categories') }}">Categories</a></li>

              <!-- Dropdown for General -->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      General
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/join-our-program') }}">join our program</a></li>
                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/about-us') }}">About Us</a></li>
                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/blog') }}">Blogs</a></li>
                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/faqs') }}">FAQ</a></li>
                  </ul>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="generalDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Booking Order
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="generalDropdown">
                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/carbooking') }}">Car Booking</a></li>
                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/confirmation') }}">Order Confirmation</a></li>
                      <li class="nav-item"><a class="nav-dropdown mb-1" href="{{ url('/checkout') }}">Check out</a></li>
                  </ul>
              </li>

              <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>
          </ul>
      </div>
  </div>
</header>
      
      <!-- Start -->
      <section class="join-program text-center text-white position-relative">
          <div class="container text-height">
            @if(request()->is('carlisting'))
              <h2 class="fw-bold">Search Result Page</h2>
              <p>List of available cars based on user search filters (location, date, type, etc.)</p>
              @elseif(request()->is('carbooking') || request()->is('confirmation'))
              <h2 class="fw-bold">Porche Turbo 6.0</h2>
              @elseif(request()->is('checkout'))
              <h2 class="fw-bold">Your Trusted Partner for 24/7 Taxi Services</h2>
              <p>Reliable and Round-the-Clock Taxi Services in the Heart of New York</p>
              @elseif(request()->is('categories'))
              <h2 class="fw-bold">Categories</h2>
              <p>Find the Perfect Ride: Explore Our Wide Range of Car Categories</p>
              @elseif(request()->is('join-our-program'))
              <h2 class="fw-bold">Join Our Program</h2>
              <p>"An easy way to rent out your cars quickly and efficiently"</p>
              @elseif(request()->is('about-us'))
              <h2 class="fw-bold">About us</h2>
              <p>Your Friendly Car Rental Provider</p>
              @elseif(request()->is('blog'))
              <h2 class="fw-bold">Blog</h2>
              @elseif(request()->is('faqs'))
              <h2 class="fw-bold">Faq's</h2>
              <p>Got Questions? We’ve Got Answers</p>
              @elseif(request()->is('contact'))
              <h2 class="fw-bold">Contact Us</h2>
              @endif
          </div>
          <!-- Background Curve -->
          <div class="curve-bg"></div>
      </section>
      </div>
      <!-- end header -->

  {{-- end header 2 --}}
  @endif


      <!-- Register modal and Login modal for web view  -->


  <!-- Register Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header border-0 text-center">
          <h2 class="modal-title w-100" id="registerModalLabel">Register</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">Already have an account? <a href="#" class="login-link-text" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a></p>
          <form>
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-user icon-size"></i></span>
                <input type="text" class="form-control" placeholder="Enter name">
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-envelope icon-size"></i></span>
                <input type="email" class="form-control" placeholder="Enter email">
              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>
                <input type="password" class="form-control" placeholder="Enter password">
              </div>
            </div>
            <div class="mb-4">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>
                <input type="password" class="form-control" placeholder="Confirm password">
              </div>
            </div>
            <button type="submit" class="btn w-100 btn-color">SIGN UP NOW</button>             
         </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Login Modal -->
  <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header border-0 text-center">
          <h2 class="modal-title w-100" id="loginModalLabel">Log In</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">Don't have an account? <a href="#" class="login-link-text" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></p>
          <form>
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-envelope icon-size"></i></span>
                <input type="email" class="form-control" placeholder="Enter email">
              </div>
            </div>
            <div class="mb-4">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>
                <input type="password" class="form-control" placeholder="Enter password">
              </div>
            </div>
            <button type="submit" class="btn w-100 btn-color">Login</button>
          </form>
        </div>
      </div>
    </div>
  </div>

 <!-- End Register modal and Login modal for web view  -->


 <!-- car rental register and login button modal -->
 <div class="modal fade" id="carRentalModal" tabindex="-1" aria-labelledby="carRentalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rental-custom-modal">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;padding-bottom: 0;">
                <button class="back-arrow" data-bs-dismiss="modal" aria-label="Close">
                    ←
                </button>
            </div>
            <div class="modal-body renteal-body">
                <img src="icons/rental-modal-popup-img.png" alt="Illustration" class="rental-header-img">
                <button class="rental-register-btn" onclick="window.location.href='register-car-rental.html'">
                    <img src="icons/car-rental-register-btn-icon.png" class="rental-btn-icon" alt="Register">
                    Register with car rental
                </button>
                
                <button class="rental-login-btn">
                    <img src="icons/car-rental-login-btn-icon.png" class="rental-btn-icon" alt="Login">
                    Login with car rental
                </button>
            </div>
        </div>
    </div>
</div>

 <!-- end -->