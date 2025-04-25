<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
@extends('loginLayout')
@section('title') {{ __('messages.admin') }} {{ __('messages.Login') }} @endsection
@section('content')
    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">
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
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <span class="logo-lg">
                                            <img src="{{asset('/')}}assets/images/select-and-rent-logo-blue.png" alt="" height="150">
                                        </span>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="emailaddress" class="form-label">{{ __('messages.email')}} {{ __('messages.address')}}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">{{ __('messages.password')}}</label>
                                        <div class="input-group input-group-merge">
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <div class="input-group-text" data-password="false">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('messages.remember me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-center d-grid">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('messages.login') }}
                                        </button>
    
                                        @if (Route::has('password.request'))
                                            <a class="btn-link mt-3" href="{{ route('password.request') }}">
                                                {{ __('messages.forgot your password?') }}
                                            </a>
                                        @endif
                                    </div>

                                </form>

                                <div class="text-center">
                                    <h5 class="mt-3 text-muted">{{ __('messages.sign in with')}}</h5>
                                    <ul class="social-list list-inline mt-3 mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p> <a href="auth-recoverpw.html" class="text-white-50 ms-1">Forgot your password?</a></p>
                                <p class="text-white-50">Don't have an account? <a href="auth-register.html" class="text-white ms-1"><b>Sign Up</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2015 - <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a> 
        </footer>

        <!-- Vendor js -->
        <script src="{{asset('/')}}assets/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="{{asset('/')}}assets/js/app.min.js"></script>
        
    </body>
@endsection


