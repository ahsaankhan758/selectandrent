<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.4.6/css/flag-icon.min.css">
@extends('loginLayout')
@section('title'){{ __('messages.employee') }} {{ __('messages.login') }} @endsection
@section('content')
    <body class="auth-fluid-pages pb-0">

        <div class="auth-fluid">
            
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
                <ul class="list-unstyled topnav-menu float-end mb-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                           @php
                                $isLoggedIn = auth()->check();
                                $sessionLangName = session('langName');
                                $sessionLangFlag = session('langFlagCode');

                                $langToShow = null;
                                $flagToShow = null;

                                // If user is not logged in and session lang is set
                                if (!$isLoggedIn && !empty($sessionLangName)) {
                                    $langToShow = (object)['name' => $sessionLangName, 'flag_code' => $sessionLangFlag];
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

                            @if($langToShow && !empty($langToShow->flag_code))
                                <span class="flag-icon flag-icon-{{ $langToShow->flag_code }}"></span> {{ $langToShow->name }}
                            @endif

                        </a>
                        <ul class="dropdown-menu">
                            @if(!empty($languages))
                                @foreach ($languages as $lang)
                                    <li>
                                        <a class="dropdown-item" href="{{ route('change.language', $lang) }}">
                                            <span class="flag-icon flag-icon-{{ $lang['flag_code'] }}"></span> <span>{{ $lang['name'] }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                    </li>
                </ul>
                <div class="align-items-center d-flex h-100">
                    
                    <div class="p-3">

                        <!-- Logo -->
                        <div class="auth-brand text-center text-lg-start">
                           
                            <div class="auth-logo">
                                <span class="logo-lg">
                                    <img src="{{asset('/')}}assets/images/select-and-rent-logo-blue.png" alt="" height="150">
                                </span>
                                
                            </div>
                        </div>

                        <!-- title-->
                        
                        <p class="text-muted mt-4"></p>

                        <!-- form -->
                        <form method="POST" action="{{ route('employeeLogin') }}">
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
                                        {{ __('messages.remember_me') }}
                                    </label>
                                </div>
                            </div>

                            <div class="text-center d-grid">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('messages.login') }}
                                </button>

                                <!-- @if (Route::has('password.request'))
                                    <a class="btn-link mt-3" href="{{ route('password.request') }}">
                                        {{ __('messages.forgot_your_password?') }}
                                    </a>
                                @endif -->
                            </div>

                        </form>
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt"></footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3 text-white">Select and Rent Employee</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <!-- <h5 class="text-white">
                        - Fadlisaad (Ubold Admin User)
                    </h5> -->
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

       
    </body>
@endsection