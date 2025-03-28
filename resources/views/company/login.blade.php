@extends('loginLayout')
@section('title')Company Login @endsection
@section('content')
    <body class="auth-fluid-pages pb-0">

        <div class="auth-fluid">
            <!--Auth fluid left content -->
            <div class="auth-fluid-form-box">
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
                        
                        <p class="text-muted mb-4">Enter your email address and password to access account.</p>

                        <!-- form -->
                        <form method="POST" action="{{ route('companyLogin') }}">
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
                        <!-- end form-->

                        <!-- Footer-->
                        <footer class="footer footer-alt">
                            <p class="text-muted">Don't have an account? <a href="auth-register-2.html" class="text-muted ms-1"><b>Sign Up</b></a></p>
                        </footer>

                    </div> <!-- end .card-body -->
                </div> <!-- end .align-items-center.d-flex.h-100-->
            </div>
            <!-- end auth-fluid-form-box-->

            <!-- Auth fluid right content -->
            <div class="auth-fluid-right text-center">
                <div class="auth-user-testimonial">
                    <h2 class="mb-3 text-white">I love the color!</h2>
                    <p class="lead"><i class="mdi mdi-format-quote-open"></i> I've been using your theme from the previous developer for our web app, once I knew new version is out, I immediately bought with no hesitation. Great themes, good documentation with lots of customization available and sample app that really fit our need. <i class="mdi mdi-format-quote-close"></i>
                    </p>
                    <h5 class="text-white">
                        - Fadlisaad (Ubold Admin User)
                    </h5>
                </div> <!-- end auth-user-testimonial-->
            </div>
            <!-- end Auth fluid right content -->
        </div>
        <!-- end auth-fluid-->

       
    </body>
@endsection