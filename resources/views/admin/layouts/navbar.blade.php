<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">
            
            <li class="d-none d-lg-block">
                
                {{-- <form class="app-search">
                    <div class="app-search-box dropdown">
                        <div class="input-group">
                            <input type="search" class="form-control" placeholder="Search..." id="top-search">
                            <button class="btn input-group-text" type="submit">
                                <i class="fe-search"></i>
                            </button>
                        </div>
                        <div class="dropdown-menu dropdown-lg" id="search-dropdown">
                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h5 class="text-overflow mb-2">Found 22 results</h5>
                            </div>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-home me-1"></i>
                                <span>Analytics Report</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-aperture me-1"></i>
                                <span>How can I help you?</span>
                            </a>
                
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings me-1"></i>
                                <span>User profile settings</span>
                            </a>

                            <!-- item-->
                            <div class="dropdown-header noti-title">
                                <h6 class="text-overflow mb-2 text-uppercase">Users</h6>
                            </div>

                            <div class="notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex align-items-start">
                                        <img class="d-flex me-2 rounded-circle" src="{{asset('/')}}assets/images/users/user-2.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Erwin E. Brown</h5>
                                            <span class="font-12 mb-0">UI Designer</span>
                                        </div>
                                    </div>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="d-flex align-items-start">
                                        <img class="d-flex me-2 rounded-circle" src="{{asset('/')}}assets/images/users/user-5.jpg" alt="Generic placeholder image" height="32">
                                        <div class="w-100">
                                            <h5 class="m-0 font-14">Jacob Deo</h5>
                                            <span class="font-12 mb-0">Developer</span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>  
                    </div>
                </form> --}}
            </li>

            <li class="dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="fe-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                    <form class="p-3">
                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                    </form>
                </div>
            </li>
             
            {{-- @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                @else --}}
                @if (Auth::user()->role == 'company' || Auth::user()->role == 'employee')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->companies->name ?? Auth::user()->name }}
                        </a>
                        {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">My Profile</a></li>                            
                            <li><a class="dropdown-item" href="#">My Account</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul> --}}
                    </li>
                @endif
            {{-- @endguest --}}
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
            
            <li class="dropdown notification-list topbar-dropdown">
                  @php
                            $profileImage = Auth::user()->profile_image;
                            @endphp

                        <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light text-white"
                        data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false" title="">
                            @if ($profileImage && file_exists(public_path($profileImage)))
                                <img src="{{ asset($profileImage) }}" alt="Profile" width="30" height="30"
                                    class="rounded-circle object-fit-cover" style="object-fit: cover;">
                            @else
                                <i class="mdi mdi-account-circle-outline theme-color text-white" style="font-size: 25px;"></i>
                            @endif
                        </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown ">
                    <!-- item-->
                    <a class="dropdown-item notify-item">Welcome! {{ Auth::user()->name }}</a>

                    <!-- item-->
                    <a href="{{ route('admin.edit_profile', Auth::id()) }}" class="dropdown-item notify-item">
                        <i class="fe-user theme-color"></i>
                        <span>{{ __('messages.my') }} {{ __('messages.account') }} </span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings theme-color"></i>
                        <span>{{ __('messages.settings') }} </span>
                    </a>

                    <!-- item-->
                    <button class="dropdown-item notify-item" id="lock-screen">
                        <i class="fe-lock theme-color"></i>
                        {{ __('messages.lock screen') }} 
                    </button>

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
            <!-- notification start -->
           <li class="notification_list"></li>  
             <!-- end notifications -->
            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="fe-settings noti-icon theme-color"></i>
                </a>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            {{-- <a href="{{ route('dashboard') }}" class="logo logo-dark text-center">
                <span class="logo-sm">
                    <img src="{{asset('/')}}assets/images/select-and-rent-logo-blue.png" alt="" height="22">
                    <span class="logo-lg-text-light">UBold</span>
                </span>
                <span class="logo-lg">
                    <img src="{{asset('/')}}assets/images/select-and-rent-logo-blue.png" alt="" height="100">
                    <span class="logo-lg-text-light">U</span>
                </span>
            </a> --}}
            <a href="{{ route('dashboard') }}" class="logo logo-light text-center">
                <span class="logo-sm">
                    <img src="{{asset('/')}}assets/images/select-and-rent-logo-blue.png" alt="" height="70">
                </span>
                <span class="logo-lg">
                    <img src="{{asset('/')}}assets/images/select-and-rent-logo-blue.png" alt="" height="120" class="custom-logo">
                </span>
            </a>
        </div> 

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fe-menu theme-color"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a class="navbar-toggle nav-link" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>   

            

            
        </ul>
        
        <div class="clearfix"></div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('#lock-screen').on('click', function(e) {
        e.preventDefault();
        fetch('/lock-screen', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
            })
            .then(response => response.json())
            .then(data => console.log(data))
            .catch(error => console.error('Error:', error));

        });
    });
</script>
<script>
    var translations = {
        search: "{{ __('messages.search') }}"
    };
</script>