
<link href="{{asset('/')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<script src="{{ asset('/frontend-assets/assets/Js/carSearch.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
@if (request()->is('/') || request()->is('carsearch'))
<div class="hero-header">
@else
<div class="hero-header-2">
@endif
  <!-- Desktop Header (Visible on Large Screens) -->
  <header class="header-container d-none d-md-block">
      <div class="container">
          <div class="row align-items-center">
              <!-- Logo -->
              <div class="col-6 col-md-2">
                  <a href="">
                      <img src="{{asset('/')}}frontend-assets/logo/select-and-rent--jpg 2.png" alt="Logo" width="150">
                  </a>
              </div>
              <!-- Navbar -->
              @if(Cart::instance('cart')->content()->count() > 0 )
              <div class="col-6">
              @else
              <div class="col-7">
              @endif
                  <nav class="navbar navbar-expand-md" style="white-space: nowrap;">
                      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                          <ul class="navbar-nav">
                              <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('/categories') }}">{{ __('messages.categories') }}</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('/join-our-program') }}">{{ __('messages.our') }} {{ __('messages.program') }}</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">{{ __('messages.blogs') }}</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}">{{ __('messages.about us') }}</a></li>
                              <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">{{ __('messages.contact') }}</a></li>
                          </ul>
                      </div>
                  </nav>
              </div>

              <!-- Multi Lingual -->
              <div class="col-md-1 text-end">
                <ul class="list-unstyled topnav-menu float-end mb-0">
                    @php
                        $languages = [
                            'en' => ['name' => 'English', 'flag' => 'gb'],
                            'fr' => ['name' => 'Français', 'flag' => 'fr'],
                            'ar' => ['name' => 'عربي', 'flag' => 'sa'],
                            'nl' => ['name' => 'Dutch', 'flag' => 'nl'],
                        ];
                        $currentLocale = Session::get('locale');
                        if(!isset($currentLocale))
                            {
                                $currentLocale = app()->getLocale();
                            }
                    @endphp
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            <span class="flag-icon flag-icon-{{ $languages[$currentLocale]['flag'] }}"></span>  {{ $languages[$currentLocale]['name'] }}
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($languages as $langCode => $lang)
                                <li>
                                    <a class="dropdown-item" href="{{ route('change.language', $langCode) }}">
                                        <span class="flag-icon flag-icon-{{ $lang['flag'] }}"></span> <span>{{ $lang['name'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            @if(Cart::instance('cart')->content()->count() > 0 )
                <div class="col-md-1">
                    <div class="col-md-1 text-end position-relative">
                        <a href="{{route('car.booking')}}" class="px-3 text-white position-relative d-inline-block">
                            <i class="fa-solid fa-car fs-4"></i>
                            <span class="car-count-badge">{{Cart::instance('cart')->content()->count()}}</span>
                        </a>
                    </div> 
                </div>
            @endif
              <!-- Get Started Button -->

              @if(Auth::check() && Auth::user()->role == 'user')

                <div class="col-md-2 text-end">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        <li class="dropdown notification-list topbar-dropdown">
                            <a title="{{ Auth::user()->name }}" class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-account-circle-outline theme-color text-white"  style="font-size: 25px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-view-dashboard-outline theme-color"></i>
                                    <span> {{ __('messages.dashboard') }} </span>
                                </a>
                                
                                
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <span class="mdi mdi-account theme-color"></span>
                                    <span> {{ __('messages.edit') }} {{ __('messages.profile') }}</span>
                                </a>
            
                                <!-- item-->
                                <a href="{{route('website.booking')}}" class="dropdown-item notify-item">
                                    <span class="mdi mdi-book-multiple theme-color"></span>
                                    <span>{{ __('messages.bookings') }} </span>
                                </a>
            
                                <div class="dropdown-divider"></div>
            
                                <!-- item-->
                                <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="mdi mdi-logout theme-color"></span>
                                    {{ __('messages.logout') }}
                                </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
            
                            </div>
                        </li>
                    </ul>
                </div>
            @else
                <div class="col-md-2 text-end" id="getStartedButton">
                    <a href="#" class="btn ms-3 rounded-pill px-3 text-white btn-orange-clr" data-bs-toggle="modal" data-bs-target="#registerModal">
                    {{ __('messages.get') }} {{ __('messages.started') }}<i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            @endif
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
                      <img src="{{asset('/')}}frontend-assets/logo/select-and-rent--jpg 2.png" alt="Logo" width="100">
                  </a>
              </div>


              @if(Auth::check() && Auth::user()->role == 'user')

                <div class="col-md-2 text-end">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        <li class="dropdown notification-list topbar-dropdown">
                            <a title="{{ Auth::user()->name }}" class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light text-white" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-account-circle-outline theme-color text-white"  style="font-size: 25px;"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="mdi mdi-view-dashboard-outline theme-color"></i>
                                    <span> {{ __('messages.dashboard') }} </span>
                                </a>
            
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <span class="mdi mdi-account theme-color"></span>
                                    <span> {{ __('messages.edit') }} {{ __('messages.profile') }}</span>
                                </a>
            
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <span class="mdi mdi-book-multiple theme-color"></span>
                                    <span>{{ __('messages.bookings') }} </span>
                                </a>
            
                                <div class="dropdown-divider"></div>
            
                                <!-- item-->
                                <a class="dropdown-item" href="{{ url('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="mdi mdi-logout theme-color"></span>
                                    {{ __('messages.logout') }}
                                </a>
                                <form id="logout-form" action="{{ url('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
            
                            </div>
                        </li>
                    </ul>
                </div>
            @else
            <!-- Get Started Button (Smaller) -->
                <div class="col-md-2 text-end" id="getStartedButtonMobile">
                    <a href="#" class="btn rounded-pill px-2 py-1 text-white btn-orange-clr" data-bs-toggle="modal" data-bs-target="#registerModal" style="font-size: 10px;">{{ __('messages.get') }} {{ __('messages.started') }} </a>
                </div>
            @endif
              
              
          </div>
  
          <!-- Mobile Collapsible Menu -->
          <div class="collapse mt-2" id="mobileNavbar">
              <ul class="navbar-nav text-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/categories') }}">{{ __('messages.categories') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/join-our-program') }}">{{ __('messages.our') }} {{ __('messages.program') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">{{ __('messages.blogs') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about-us') }}">{{ __('messages.about us') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">{{ __('messages.contact') }}</a></li>
                <li class="nav-item">
                    <ul class="list-unstyled topnav-menu mb-0">
                        @php
                            $languages = [
                                'en' => ['name' => 'English', 'flag' => 'gb'],
                                'fr' => ['name' => 'Français', 'flag' => 'fr'],
                                'ar' => ['name' => 'عربي', 'flag' => 'sa'],
                                'nl' => ['name' => 'Dutch', 'flag' => 'nl'],
                            ];
                            $currentLocale = Session::get('locale');
                            if(!isset($currentLocale))
                                {
                                    $currentLocale = app()->getLocale();
                                }
                        @endphp
                        <li class="nav-item dropdown text-center">
                            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                                <span class="flag-icon flag-icon-{{ $languages[$currentLocale]['flag'] }}"></span>  {{ $languages[$currentLocale]['name'] }}
                            </a>
                            <ul class="dropdown-menu">
                                @foreach ($languages as $langCode => $lang)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('change.language', $langCode) }}">
                                            <span class="flag-icon flag-icon-{{ $lang['flag'] }}"></span> <span>{{ $lang['name'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </li>
              </ul>
          </div>
      </div>
  </header>

  <!-- Hero Section Start -->
  @if (request()->is('/') || request()->is('carsearch'))
  <div class="hero-section text-center text-white">
      <h1 class="display-5 fw-bold">
          <span class="custom-bg-warning">{{ __('messages.rent') }}</span> {{ __('messages.a car') }}, {{ __('messages.anytime') }},
      </h1>   
      <h1 class="display-5 fw-bold">{{ __('messages.anywhere') }}</h1>
      
      <div class="tabpanel-form mx-auto">
        <form id="carSearchForm" action="{{ route('car.search') }}" method="POST" enctype="multipart/form-data" class="row g-2">
            @csrf        
            <div class="col-md-12">
                <div class="row g-2">
                    <div class="col-md-3 col-6">
                        <select id="brandDropdown" name="brand" class="form-select" data-url="{{ route('car.brands') }}">
                            <option disabled selected>{{ __('messages.brand') }}</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3 col-6">
                        <select id="modelDropdown" name="model" class="form-select">
                            <option disabled selected>{{ __('messages.all') }} {{ __('messages.models') }}</option>
                        </select>
                    </div>                    
                    <div class="col-md-3 col-6">
                        <select id="beamDropdown" name="beam" class="form-select">
                            <option disabled selected>{{ __('messages.beam') }}</option>
                        </select>
                    </div>                    
                    <div class="col-md-3 col-6">
                        <select id="transmissionDropdown" name="transmission" class="form-select">
                            <option disabled selected>{{ __('messages.transmission') }}</option>
                        </select>
                    </div>
                </div>
                <div class="row g-2 mt-1">
                    <div class="col-md-3 col-6">
                        <select class="form-select" id="radiusDropdown" name="radius">
                            <option disabled selected>{{ __('messages.radius') }}</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3 col-6">
                        <select class="form-select" id="minMileageDropdown" name="minimum">
                            <option disabled selected hidden>Min</option>
                            <option disabled style="font-weight:bold;">Mileage</option>
                            <option value="1000">1000 km</option>
                            <option value="5000">5000 km</option>
                            <option value="10000">10000 km</option>
                            <option value="20000">20000 km</option>
                            <option value="40000">40000 km</option>
                            <option value="60000">60000 km</option>
                            <option value="80000">80000 km</option>
                            <option value="100000">100000 km</option>
                        </select>
                    </div>
                    
                    <div class="col-md-3 col-6">
                        <select class="form-select" id="maxMileageDropdown" name="maximum">
                            <option disabled selected hidden>Max</option>
                            <option disabled style="font-weight:bold;">Mileage</option>
                            <option value="1000">1000 km</option>
                            <option value="5000">5000 km</option>
                            <option value="10000">10000 km</option>
                            <option value="20000">20000 km</option>
                            <option value="40000">40000 km</option>
                            <option value="60000">60000 km</option>
                            <option value="80000">80000 km</option>
                            <option value="100000">100000 km</option>
                        </select>
                    </div>
        
                    <div class="col-md-3 col-6">
                        <select class="form-select" name="year" id="year">
                            <option value="" disabled selected>Year</option>
                            <?php
                                $currentYear = date("Y");
                                for ($year = 1990; $year <= $currentYear; $year++) {
                                    echo "<option value=\"$year\">$year</option>";
                                }
                            ?>
                        </select>
                    </div>                    
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-orange-clr w-100 d-flex justify-content-center text-white align-items-center">
                    {{ __('messages.search') }} <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>
                </button>
            </div>                                    
        </form>        
      </div>
      <img src="{{asset('/')}}frontend-assets/assets/apps-bg-1-300x123.png" alt="Car" class="car-image">

      
  </div>
  @else
    <!-- Start -->
     <section class="join-program text-center text-white position-relative">
          <div class="container text-height">
            @if(request()->is('carlisting'))
            <h2 class="fw-bold">{{ __('messages.Search Result Page') }}</h2>
            <p>{{ __('messages.List of available cars based on user search filters (location, date, type, etc.)') }}</p>
              @elseif(request()->is('carbooking') || request()->is('confirmation'))
              <h2 class="fw-bold">{{ __('messages.Car Booking') }}</h2>
              @elseif(request()->is('checkout'))
              <h2 class="fw-bold">{{ __('messages.Your Trusted Partner for 24/7 Taxi Services') }}</h2>
              <p>{{ __('messages.Reliable and Round-the-Clock Taxi Services in the Heart of New York') }}</p>
              @elseif(request()->is('categories'))
              <h2 class="fw-bold">{{ __('messages.categories') }}</h2>
              <p>{{ __('messages.Find the Perfect Ride: Explore Our Wide Range of Car Categories') }}</p>
              @elseif(request()->is('join-our-program'))
              <h2 class="fw-bold">{{ __('messages.join') }}{{ __('messages.our') }}{{ __('messages.program') }}</h2>
              <p>"{{ __('messages.An easy way to rent out your cars quickly and efficiently') }}"</p>
              @elseif(request()->is('about-us'))
              <h2 class="fw-bold">{{ __('messages.about us') }}</h2>
              <p>{{ __('messages.Your Friendly Car Rental Provider') }}</p>
              @elseif(request()->is('cardetail'))
              <h2 class="fw-bold">{{ __('messages.Car Details') }}</h2>
              <p>{{ __('messages.Find the Perfect Ride for Your Journey') }} – {{ __('messages.Explore, Compare, and Book Effortlessly!') }}</p>
              @elseif(request()->is('blog'))
              <h2 class="fw-bold">{{ __('messages.blog') }}</h2>
              @elseif(request()->is('blog-detail/*'))
              <h2 class="fw-bold">{{ __('messages.Blog') }}</h2>
              @elseif(request()->is('booking'))
              <h2 class="fw-bold">Bookings</h2>
              @elseif(request()->is('dashboard'))
              <h2 class="fw-bold">Dashboard</h2>
              @elseif(request()->is('booking-detail/*'))
              <h2 class="fw-bold">Booking Detail</h2>
              @elseif(request()->is('faqs'))
              <h2 class="fw-bold">{{ __('messages.FAQ') }}</h2>
              <p>{{ __('messages.Got Questions? We’ve Got Answers') }}</p>
              @elseif(request()->is('contact'))
              <h2 class="fw-bold">{{ __('messages.contact us') }}</h2>
              @elseif(request()->is('register-car-rental'))
              <h2 class="fw-bold">{{ __('messages.Company Register') }}</h2>
              @elseif(request()->is('cardetail/*'))
              <h2 class="fw-bold">{{ __('messages.Car Details') }}</h2>
              <p>{{ __('messages.Find the Perfect Ride for Your Journey') }} – {{ __('messages.Explore, Compare, and Book Effortlessly!') }}</p>
              @endif
          </div>
          <!-- Background Curve -->
          <div class="curve-bg"></div>
      </section>
  @endif
  </div>



   

      <!-- Register modal and Login modal for web view  -->


  <!-- Register Modal -->
  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content p-4">
        <div class="modal-header border-0 text-center">
          <h2 class="modal-title w-100" id="registerModalLabel">{{ __('messages.register') }}</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">{{ __('messages.Already have an account?') }} <a href="#" class="login-link-text" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('messages.login') }}</a></p>

          <form action="{{ route('user.signup') }}" id="usersignup">

            @csrf
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-user icon-size"></i></span>

                <input id="name" type="text" class="form-control" placeholder="{{ __('messages.Enter name') }}">

              </div>
            </div>
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-envelope icon-size"></i></span>

                <input id="email" type="email" class="form-control" placeholder="{{ __('messages.Enter email') }}">

              </div>
            </div>
            <div class="mb-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fa fa-phone icon-size"></i></span>
  
                  <input id="phone" class="form-control" placeholder="{{ __('messages.phone') }}">
  
                </div>
              </div>
            <div class="mb-3">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>

                <input id="password" type="password" class="form-control" placeholder="{{ __('messages.Enter password') }}">

              </div>
            </div>
            <div class="mb-4">
              <div class="input-group">
                <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>

                <input id="password_confirmation" type="password" class="form-control" placeholder="{{ __('messages.Confirm password') }}">

              </div>
            </div>
            <button type="submit" class="btn w-100 btn-color">{{ __('messages.SIGN UP NOW') }}</button>             
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
          <h2 class="modal-title w-100" id="loginModalLabel">{{ __('messages.log In') }}</h2>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p class="text-center">{{ __("messages.Don't have an account?") }} <a href="#" class="login-link-text" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a></p>
          <form action="{{ route('user.signin') }}" id="usersignin">
            @csrf
                <div class="mb-3">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-envelope icon-size"></i></span>
                    <input type="email" id="get-email" class="form-control" placeholder="{{ __('messages.Enter email') }}">
                </div>
                </div>
                <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>
                    <input type="password" id="get-password" class="form-control" placeholder="{{ __('messages.Enter password') }}">
                </div>
                </div>
                <button type="submit" class="btn w-100 btn-color">{{ __('messages.Login') }}</button>
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
                <img src="{{asset('/')}}frontend-assets/icons/rental-modal-popup-img.png" alt="Illustration" class="rental-header-img">
                <button class="rental-register-btn" onclick="window.location.href='{{ url('/register-car-rental') }}'">
                    <img src="{{asset('/')}}frontend-assets/icons/car-rental-register-btn-icon.png" class="rental-btn-icon" alt="Register">
                    {{ __('messages.Register with car rental') }}
                </button>
                
                <button class="rental-login-btn" onclick="window.location.href='{{ url('/company/login') }}'">
                    <img src="{{asset('/')}}frontend-assets/icons/car-rental-login-btn-icon.png" class="rental-btn-icon" alt="Login">
                    {{ __('messages.Login with car rental') }}
                </button>
            </div>
        </div>
    </div>
</div>

 <!-- end -->