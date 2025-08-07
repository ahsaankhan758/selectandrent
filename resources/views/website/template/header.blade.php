<link href="{{ asset('/') }}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
<script src="{{ asset('/frontend-assets/assets/Js/carSearch.js') }}"></script>
{{-- location suggessions link google api --}}
<script src="{{ asset('/') }}assets/js/locationSuggestion.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
@if (request()->is('/'))
    <div class="hero-header">
    @elseif(request()->is('cardetail/*'))
        <style>
            .header-container {
                background-color: #07407B !important;
            }
        </style>
    @elseif(request()->is('carsearch'))
        <style>
            .header-container {
                background-color: #07407B !important;
            }

            .join-program {
                /* padding-top: 12rem; */
                padding-top: 0px;
            }
        </style>
   
    @else
        <div class="hero-header-2">
@endif
<!-- Desktop Header (Visible on Large Screens) -->
<header class="header-container d-none d-md-block">
    <div class="container">
        <div class="row align-items-center">
            <!-- Logo -->
            <div class="col-6 col-md-2">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('/') }}frontend-assets/logo/select-and-rent--jpg 2.png" alt="Logo"
                        width="150">
                </a>
            </div>
            <!-- Navbar -->
            @if (Cart::instance('cart')->content()->count() > 0)
                <div class="col-5">
                @else
                    <div class="col-6">
            @endif
            <nav class="navbar navbar-expand-md" style="white-space: nowrap;">
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('/') }}">{{ __('messages.home') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('/categories') }}">{{ __('messages.categories') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('/join-our-program') }}">{{ __('messages.program') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('/blog') }}">{{ __('messages.blogs') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('/about-us') }}">{{ __('messages.about') }}</a></li>
                        <li class="nav-item"><a class="nav-link"
                                href="{{ url('/contact') }}">{{ __('messages.contact') }}</a></li>
                    </ul>
                </div>
            </nav>
        </div>
        <style>
            .lang-tab .dropdown:hover > .dropdown-menu {
                display: block;
                margin-top: 0;
            }

            .lang-tab .dropdown-menu {
                margin-top: 0; 
            }
        </style>
        <!-- Multi Lingual -->
        <div class="col-md-1 text-end">
            <ul class="list-unstyled topnav-menu float-end mb-0 lang-tab">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button">
                        @php
                            $isLoggedIn = auth()->check();
                            $sessionLangName = session('langName');
                            $sessionLangFlag = session('langFlagCode');

                            $langToShow = null;
                            $flagToShow = null;

                            // If user is not logged in and session lang is set
                            if (!$isLoggedIn && !empty($sessionLangName)) {
                                $langToShow = (object) ['name' => $sessionLangName, 'flag_code' => $sessionLangFlag];
                                $flagToShow = $sessionLangFlag;
                            }

                            // If user is logged in and userDefaultLang is set
                            elseif ($isLoggedIn && !empty($userDefaultLang)) {
                                $langToShow = $userDefaultLang;
                                $flagToShow = $userDefaultLang->flag_code ?? '';
                            }

                            // Fallback to defaultLang if available
                            elseif (!empty($defaultLang)) {
                                $langToShow = $defaultLang;
                                $flagToShow = $defaultLang->flag_code ?? '';
                            }
                        @endphp

                        @if ($langToShow && !empty($langToShow->flag_code))
                            <span class="flag-icon flag-icon-{{ $langToShow->flag_code }}"></span>
                            {{ $langToShow->name }}
                        @endif

                    </a>
                    <ul class="dropdown-menu">
                        @if (!empty($languages))
                            @foreach ($languages as $lang)
                                <li>
                                    <a class="dropdown-item" href="{{ route('change.language', $lang) }}">
                                        <span class="flag-icon flag-icon-{{ $lang['flag_code'] }}"></span>
                                        <span>{{ $lang['name'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
        <?php
        $data = getActiveDefaultCurrency();
        
        $defaultCurrency = $data['defaultCurrency'];
        $activeCurrencies = $data['activeCurrencies'];
        ?>
        <div class="col-md-1">
            <ul class="list-unstyled topnav-menu float-end mb-0 lang-tab">
                <li class="nav-item dropdown">
                    @if (session('defaultCurrencyCode'))
                        <a class="nav-link dropdown-toggle text-white" href="#" id="currencyDropdown"
                            role="button" data-bs-toggle="dropdown">
                            {{ session('defaultCurrencyCode') }}
                        </a>
                    @elseif(isset($defaultCurrency))
                        <a class="nav-link dropdown-toggle text-white" href="#" id="currencyDropdown"
                            role="button" data-bs-toggle="dropdown">
                            {{ $defaultCurrency->code }}
                        </a>
                    @else
                        <a class="nav-link dropdown-toggle text-white" href="#" id="currencyDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <?php
                            setDefaultCurreny();
                            header('Location: ' . $_SERVER['REQUEST_URI']);
                            exit();
                            ?>
                        </a>
                    @endif
                    @if (isset($activeCurrencies) && isset($defaultCurrency))
                        <ul class="dropdown-menu">
                            @foreach ($activeCurrencies as $currency)
                                @if ($currency->name != $defaultCurrency->name)
                                    <li>
                                        <a class="dropdown-item"
                                            href=" {{ route('setDefaultCurreny', $currency->id) }}">
                                            <span>{{ $currency->name }}</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        {{-- @else
                            <ul class="dropdown-menu">
                                @foreach ($activeCurrencies as $currency)
                                    <li>
                                        <a class="dropdown-item" href=" {{ route('setDefaultCurreny', $currency->id) }}">
                                            <span>{{ $currency->name }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul> --}}
                    @endif
                </li>
            </ul>
        </div>
        @if (Cart::instance('cart')->content()->count() > 0)
            <div class="col-md-1">
                <div class="col-md-1 text-end position-relative">
                    <a href="{{ route('car.booking') }}" class="px-3 text-white position-relative d-inline-block">
                        <i class="fa-solid fa-car fs-4"></i>
                        <span class="car-count-badge">{{ Cart::instance('cart')->content()->count() }}</span>
                    </a>
                </div>
            </div>
        @endif
        <!-- Get Started Button -->

        @if (Auth::check() && Auth::user()->role == 'user')

            <div class="col-md-2 text-end">
                <ul class="list-unstyled topnav-menu float-end mb-0">
                    <li class="dropdown notification-list topbar-dropdown">
                        @php
                            $profileImage = Auth::user()->profile_image;
                        @endphp

                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light text-white"
                            data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                            aria-expanded="false" title="">
                            @if ($profileImage && file_exists(public_path($profileImage)))
                                <img src="{{ asset($profileImage) }}" alt="Profile" width="30" height="30"
                                    class="rounded-circle object-fit-cover" style="object-fit: cover;">
                            @else
                                <i class="mdi mdi-account-circle-outline theme-color text-white"
                                    style="font-size: 25px;"></i>
                            @endif
                        </a>

                        <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                            <a class="dropdown-item notify-item">{{ __('messages.welcome') }} {{ Auth::user()->name }}</a>
                            <!-- item-->
                            <a href="{{ route('website.dashboard') }}" class="dropdown-item notify-item">
                                <i class="mdi mdi-view-dashboard-outline theme-color"></i>
                                <span> {{ __('messages.dashboard') }} </span>
                            </a>


                            <!-- item-->
                            <a href="{{ route('website.edit_profile', Auth::id()) }}"
                                class="dropdown-item notify-item">
                                <span class="mdi mdi-account theme-color"></span>
                                <span> {{ __('messages.edit') }} {{ __('messages.profile') }}</span>
                            </a>

                            <!-- item-->
                            <a href="{{ route('website.booking') }}" class="dropdown-item notify-item">
                                <span class="mdi mdi-book-multiple theme-color"></span>
                                <span>{{ __('messages.bookings') }} </span>
                            </a>

                            <div class="dropdown-divider"></div>

                            <!-- item-->
                            <a class="dropdown-item" href="{{ url('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                <a href="#" class="btn ms-3 rounded-pill px-3 text-white btn-orange-clr button-font-tab" data-bs-toggle="modal"
                    data-bs-target="#registerModal">
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
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                data-bs-target="#mobileNavbar" aria-controls="mobileNavbar" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Logo (Center) -->
            <div class="flex-grow-1 text-center">
                <a href="home.html">
                    <img src="{{ asset('/') }}frontend-assets/logo/select-and-rent--jpg 2.png" alt="Logo"
                        width="100">
                </a>
            </div>


            @if (Auth::check() && Auth::user()->role == 'user')
                <div class="col-md-2 text-end">
                    <ul class="list-unstyled topnav-menu float-end mb-0">
                        <li class="dropdown notification-list topbar-dropdown">
                            <a title="{{ Auth::user()->name }}"
                                class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light text-white"
                                data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <i class="mdi mdi-account-circle-outline theme-color text-white"
                                    style="font-size: 25px;"></i>
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
                                <a class="dropdown-item" href="{{ url('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
                    <a href="#" class="btn rounded-pill px-2 py-1 text-white btn-orange-clr"
                        data-bs-toggle="modal" data-bs-target="#registerModal"
                        style="font-size: 10px;">{{ __('messages.get') }} {{ __('messages.started') }} </a>
                </div>
            @endif


        </div>

        <!-- Mobile Collapsible Menu -->
        <div class="collapse mt-2" id="mobileNavbar">
            <ul class="navbar-nav text-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">{{ __('messages.home') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('/categories') }}">{{ __('messages.categories') }}</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('/join-our-program') }}">{{ __('messages.our') }}
                        {{ __('messages.program') }}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/blog') }}">{{ __('messages.blogs') }}</a>
                </li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('/about-us') }}">{{ __('messages.about') }}</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ url('/contact') }}">{{ __('messages.contact') }}</a></li>
                <li class="nav-item">
                    <ul class="list-unstyled topnav-menu mb-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown">
                                @php
                                    $isLoggedIn = auth()->check();
                                    $sessionLangName = session('langName');
                                    $sessionLangFlag = session('langFlagCode');

                                    $langToShow = null;
                                    $flagToShow = null;

                                    // If user is not logged in and session lang is set
                                    if (!$isLoggedIn && !empty($sessionLangName)) {
                                        $langToShow = (object) [
                                            'name' => $sessionLangName,
                                            'flag_code' => $sessionLangFlag,
                                        ];
                                        $flagToShow = $sessionLangFlag;
                                    }

                                    // If user is logged in and userDefaultLang is set
                                    elseif ($isLoggedIn && !empty($userDefaultLang)) {
                                        $langToShow = $userDefaultLang;
                                        $flagToShow = $userDefaultLang->flag_code ?? '';
                                    }

                                    // Fallback to defaultLang if available
                                    elseif (!empty($defaultLang)) {
                                        $langToShow = $defaultLang;
                                        $flagToShow = $defaultLang->flag_code ?? '';
                                    }
                                @endphp

                                @if ($langToShow && !empty($langToShow->flag_code))
                                    <span class="flag-icon flag-icon-{{ $langToShow->flag_code }}"></span>
                                    {{ $langToShow->name }}
                                @endif

                            </a>
                            <ul class="dropdown-menu">
                                @if (!empty($languages))
                                    @foreach ($languages as $lang)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('change.language', $lang) }}">
                                                <span class="flag-icon flag-icon-{{ $lang['flag_code'] }}"></span>
                                                <span>{{ $lang['name'] }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <ul class="list-unstyled topnav-menu mb-0">
                        <li class="nav-item dropdown">
                            @if (isset($defaultCurrency->name))
                                <a class="nav-link dropdown-toggle text-white" href="#" id="currencyDropdown"
                                    role="button" data-bs-toggle="dropdown">
                                    {{ $defaultCurrency->name }}
                                </a>
                            @else
                                <a class="nav-link dropdown-toggle text-white" href="#" id="currencyDropdown"
                                    role="button" data-bs-toggle="dropdown">
                                    {{ __('messages.currency') }}
                                </a>
                            @endif
                            @if (isset($activeCurrencies) && isset($defaultCurrency))
                                <ul class="dropdown-menu">
                                    @foreach ($activeCurrencies as $currency)
                                        @if ($currency->name != $defaultCurrency->name)
                                            <li>
                                                <a class="dropdown-item"
                                                    href=" {{ route('setDefaultCurreny', $currency->id) }}">
                                                    <span>{{ $currency->name }}</span>
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <ul class="dropdown-menu">
                                    @foreach ($activeCurrencies as $currency)
                                        <li>
                                            <a class="dropdown-item"
                                                href=" {{ route('setDefaultCurreny', $currency->id) }}">
                                                <span>{{ $currency->name }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>

<!-- Hero Section Start -->
@if (request()->is('/'))
    <div class="hero-section text-center text-white">
        <h1 class="display-5 fw-bold">
            <span class="custom-bg-warning">{{ __('messages.rent') }}</span> {{ __('messages.a_vehicle') }},
            {{ __('messages.anytime') }},
        </h1>
        <h1 class="display-5 fw-bold">{{ __('messages.anywhere') }}</h1>
        {{-- <select id="locationDropdown" name="location_id" class="form-select"
            data-url="{{ route('car.locations') }}">
            <option disabled selected>{{ __('messages.select_location') }}</option>
            </select> --}}
        <div class="tabpanel-form mx-auto">
            <form id="carSearchForm" action="{{ route('car.search') }}" method="POST"
                enctype="multipart/form-data" class="row g-2">
                @csrf
                <div class="col-md-12">
                    <div class="row g-2">
                        <div class="col-md-6 col-12 position-relative">
                            <input type="text" id="area_name" name="area_name" class="form-control time-input pickup-time"

                                placeholder="{{ __('messages.select') }} {{ __('messages.location') }} " autocomplete="off">

                            <ul id="locationSuggestions" class="list-group position-absolute w-100"
                                style="z-index: 1000;"></ul>
                        </div>

                        <div class="col-md-6 col-12">
                            <input type="datetime-local" name="date" class="form-control time-input pickup-time"
                                placeholder="Select Date & Time">
                        </div>
                    </div>
                    <div class="row g-2 mt-1">
                        <div class="col-md-3 col-6">
                            <select id="brandDropdown" data-label="{{ __('messages.brand') }}" name="brand" class="form-select"
                                data-url="{{ route('car.brands') }}">
                                <option disabled selected>{{ __('messages.brands') }}</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-6">
                            <select id="modelDropdown" data-label="{{ __('messages.models') }}" name="model" class="form-select">
                                <option disabled selected>{{ __('messages.models') }}
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 col-6">
                            <select id="priceDropdown" name="Rent" class="form-select">
                                <option disabled selected>{{ __('messages.rent') }}</option>
                                <option value="0-500">0 - 500</option>
                                <option value="501-1000">501 - 1000</option>
                                <option value="1001-1500">1001 - 1500</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-6">
                            <select id="transmissionDropdown" data-label="{{ __('messages.transmission') }}" name="transmission" class="form-select">
                                <option disabled selected>{{ __('messages.transmission') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit"
                        class="btn btn-orange-clr w-100 d-flex justify-content-center text-white align-items-center">
                        {{ __('messages.search') }} <i class="fa-solid fa-magnifying-glass text-white ms-3"></i>
                    </button>
                </div>
            </form>
        </div>
        <img src="{{ asset('/') }}frontend-assets/assets/apps-bg-1-300x123.png" alt="Car" class="car-image">


    </div>
@else
    <!-- Start -->
    <section class="join-program text-center text-white position-relative">
        <?php
        $clsHeight = 'text-height';
        if (request()->is('cardetail/*')) {
            $clsHeight = '';
        }
        ?>
        <div class="container {{ $clsHeight }}">
            @if (request()->is('carlisting'))
                <h2 class="fw-bold">{{ __('messages.search_result_page') }}</h2>
            @elseif(request()->is('carbooking') || request()->is('confirmation'))
                <h2 class="fw-bold">{{ __('messages.booking') }}</h2>
            @elseif(request()->is('checkout'))
                <h2 class="fw-bold">{{ __('messages.your_trusted_partner') }}</h2>
                <p>{{ __('messages.reliable_and_round') }}</p>
            @elseif(request()->is('categories'))
                <h2 class="fw-bold">{{ __('messages.categories') }}</h2>
                <p>{{ __('messages.find_the_perfect_ride:') }}</p>
            @elseif(request()->is('join-our-program'))
                <h2 class="fw-bold">{{ __('messages.join') }} {{ __('messages.our') }} {{ __('messages.program') }}
                </h2>
                <p>{{ __('messages.an_easy_way') }}</p>
            @elseif(request()->is('about-us'))
                <h2 class="fw-bold">{{ __('messages.about_us') }}</h2>
                <p>{{ __('messages.your_friendly_vehicle') }}</p>
            @elseif(request()->is('cardetail'))
                <h2 class="fw-bold">{{ __('messages.vehicle_details') }}</h2>
                <p>{{ __('messages.find_the_perfect') }} –
                    {{ __('messages.explore_compare') }}</p>
            @elseif(request()->is('blog'))
                <h2 class="fw-bold">{{ __('messages.blog') }}</h2>
            @elseif(request()->is('blog-detail/*'))
                <h2 class="fw-bold">{{ __('messages.blog') }}</h2>
            @elseif(request()->is('booking'))
                <h2 class="fw-bold">{{ __('messages.header_booking') }}</h2>
            @elseif(request()->is('terms&conditions'))
                <h2 class="fw-bold">{{ __('messages.header_term') }}</h2>
            @elseif(request()->is('privacy-policy'))
                <h2 class="fw-bold">{{ __('messages.header_privacy') }}</h2>
            @elseif(request()->is('dashboard'))
                <h2 class="fw-bold">{{ __('messages.header_dash') }}</h2>
            @elseif(request()->is('booking-detail/*'))
                <h2 class="fw-bold">{{ __('messages.header_book_detail') }}</h2>
            @elseif(request()->is('edit-profile/*'))
                <h2 class="fw-bold">{{ __('messages.update_profile') }}</h2>
            @elseif(request()->is('faqs'))
                <h2 class="fw-bold">{{ __('messages.FAQ') }}</h2>
                <p>{{ __('messages.got_questions') }}</p>
            @elseif(request()->is('contact'))
                <style>
                    .text-height{
                    height: 165px!important;
                    }
                </style>
                <h2 class="fw-bold">{{ __('messages.contact_us') }}</h2>
            @elseif(request()->is('register-car-rental'))
                <h2 class="fw-bold">{{ __('messages.company_register') }}</h2>
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
                <p class="text-center">{{ __('messages.already_have_an_account') }} <a href="#"
                        class="login-link-text" data-bs-toggle="modal"
                        data-bs-target="#loginModal">{{ __('messages.login') }}</a></p>

                <form action="{{ route('user.signup') }}" id="usersignup">

                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-user icon-size"></i></span>

                            <input id="name" type="text" class="form-control"
                                placeholder="{{ __('messages.enter_name') }}">

                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope icon-size"></i></span>

                            <input id="email" type="email" class="form-control"
                                placeholder="{{ __('messages.enter_email') }}">

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

                            <input id="password" type="password" class="form-control"
                                placeholder="{{ __('messages.enter_password') }}">

                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>

                            <input id="password_confirmation" type="password" class="form-control"
                                placeholder="{{ __('messages.confirm_password') }}">

                        </div>
                    </div>
                    <button type="submit" class="btn w-100 btn-color">{{ __('messages.sign_up_now') }}</button>
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
                <h2 class="modal-title w-100" id="loginModalLabel">{{ __('messages.log_in') }}</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-center">{{ __("messages.don't_have_account") }} <a href="#"
                        class="login-link-text" data-bs-toggle="modal" data-bs-target="#registerModal">Register</a>
                </p>
                <form action="{{ route('user.signin') }}" id="usersignin" method="post">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-envelope icon-size"></i></span>
                            <input type="email" id="get-email" class="form-control"
                                placeholder="{{ __('messages.enter_email') }}">
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fa fa-lock icon-size"></i></span>
                            <input type="password" id="get-password" class="form-control"
                                placeholder="{{ __('messages.enter_password') }}">
                        </div>
                    </div>
                    <button type="submit" class="btn w-100 btn-color">{{ __('messages.login') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- End Register modal and Login modal for web view  -->


<!-- car rental register and login button modal -->
<div class="modal fade" id="carRentalModal" tabindex="-1" aria-labelledby="carRentalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered rental-custom-modal">
        <div class="modal-content">
            <div class="modal-header" style="border-bottom: none;padding-bottom: 0;">
                <button class="back-arrow" data-bs-dismiss="modal" aria-label="Close">
                    ←
                </button>
            </div>
            <div class="modal-body renteal-body">
                <img src="{{ asset('/') }}frontend-assets/icons/rental-modal-popup-img.png" alt="Illustration"
                    class="rental-header-img">
                <button class="rental-register-btn"
                    onclick="window.location.href='{{ url('/register-with-car-rental') }}'">
                    <img src="{{ asset('/') }}frontend-assets/icons/car-rental-register-btn-icon.png"
                        class="rental-btn-icon" alt="Register">
                    {{ __('messages.register_with_select_and_rental') }}
                </button>

                <button class="rental-login-btn" onclick="window.location.href='{{ url('/company/login') }}'">
                    <img src="{{ asset('/') }}frontend-assets/icons/car-rental-login-btn-icon.png"
                        class="rental-btn-icon" alt="Login">
                    {{ __('messages.login_with_select_and_rental') }}
                </button>
            </div>
        </div>
    </div>
</div>

<!-- end -->
