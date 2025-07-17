@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.analytics_title') }}
@endsection
@section('content')
    <?php
        if (Auth::check()) {
            $role = Auth::user()->role;
            $userId = auth()->id();
        }
        $owner = EmployeeOwner($userId);
    ?>
    @if ($role == 'admin' || !empty($owner) && $owner->role == 'admin')
        @if(can('analytics', 'view'))
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="#">{{ __('messages.breadcrumb_analytics') }}</a></li>
                                <li class="breadcrumb-item active">{{ __('messages.breadcrumb_dashboard') }}</li>
                            </ol>
                        </div>
                        <h4 class="page-title">{{ __('messages.page_title') }}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow rounded-4 overflow-hidden">
                        <div class="row g-0">
                            {{-- Icon Section --}}
                            <div class="col-4 bg-primary d-flex align-items-center justify-content-center text-white">
                            <i class="fas fa-eye"></i>
                            </div>

                            {{-- Stats Section --}}
                            <div class="col-8 bg-light p-3">
                                <div class="mb-3 border-bottom pb-2">
                                    <h6 class="text-muted mb-1">{{ __('messages.home_page_clicks') }}</h6>
                                    <p class="mb-0 text-dark fs-5 fw-bold">{{ $homepageClicks }}</p>
                                    <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueHomepageClicks }}</small>
                                </div>
                                <div>
                                    <h6 class="text-muted mb-1">{{ __('messages.homepage_views') }}</h6>
                                    <p class="mb-0 text-dark fs-5 fw-bold">{{ $homepageViews }}</p>
                                    <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueHomepageViews }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Car Detail Views --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow rounded-4 overflow-hidden">
                        <div class="row g-0">
                            {{-- Icon Section --}}
                            <div class="col-4 bg-secondary d-flex align-items-center justify-content-center text-white">
                            <i class="fas fa-car"></i>
                            </div>

                            {{-- Stats Section --}}
                            <div class="col-8 bg-light p-3">
                                {{-- Booking Clicks --}}
                                <div class="mb-3 border-bottom pb-2">
                                    <h6 class="text-muted mb-1">{{ __('messages.vehicle_detail_clicks') }}</h6>
                                    <p class="mb-0 text-dark fs-5 fw-bold">{{ $carDetailClicks }}</p>
                                    <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueCarDetailClicks }}</small>
                                </div>

                                {{-- Booking Views --}}
                                <div>
                                    <h6 class="text-muted mb-1">{{ __('messages.vehicle_detail_views') }}</h6>
                                    <p class="mb-0 text-dark fs-5 fw-bold">{{ $carDetailViews }}</p>
                                    <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueCarDetailViews }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            {{-- Car Booking Statistics Card --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                    <div class="card border-0 shadow rounded-4 overflow-hidden">
                        <div class="row g-0">
                            {{-- Icon Section --}}
                            <div class="col-4 bg-success d-flex align-items-center justify-content-center text-white">
                                <i class="fas fa-mouse-pointer"></i>
                            </div>

                            {{-- Stats Section --}}
                            <div class="col-8 bg-light p-3">
                                {{-- Booking Clicks --}}
                                <div class="mb-3 border-bottom pb-2">
                                    <h6 class="text-muted mb-1">{{ __('messages.vehicle_booking_clicks') }}</h6>
                                    <p class="mb-0 text-dark fs-5 fw-bold">{{ $bookingClicks }}</p>
                                    <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueBookingClicks }}</small>
                                </div>

                                {{-- Booking Views --}}
                                <div>
                                    <h6 class="text-muted mb-1">{{ __('messages.vehicle_booking_views') }}</h6>
                                    <p class="mb-0 text-dark fs-5 fw-bold">{{ $carBookingViews }}</p>
                                    <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueCarBookingViews }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- Customer Dashboard Views --}}
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-danger d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-chart-line"></i> {{-- Dashboard Icon --}}
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        {{-- Dashboard Clicks --}}
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.customer_dashboard_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $dashboardClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueDashboardClicks }}</small>
                        </div>

                        {{-- Dashboard Views --}}
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.customer_dashboard_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $dashboardViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueDashboardViews }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                {{-- Customer Booking Views --}}
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-warning d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-chart-bar"></i> {{-- Keep the same icon --}}
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        {{-- Booking Page Clicks --}}
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.customer_booking_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $bookingPageClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueBookingPageClicks }}</small>
                        </div>

                        {{-- Booking Page Views --}}
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.customer_booking_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $bookingPageViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueBookingPageViews }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                {{-- Signup Views --}}
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-info d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-user-plus"></i>
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        {{-- Signup Clicks --}}
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.signup_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $signupPageClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueSignupPageClicks }}</small>
                        </div>

                        {{-- Signup Views --}}
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.signup_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $signupPageViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueSignupPageViews }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                {{-- Signin Views --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-secondary d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-right-to-bracket"></i>
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        {{-- Sign-in Clicks --}}
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.signin_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $loginPageClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueLoginPageClicks }}</small>
                        </div>

                        {{-- Sign-in Views --}}
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.signin_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $loginPageViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueLoginPageViews }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                {{-- Profile Updates --}}
                <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-dark d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-user-pen"></i>
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        {{-- Profile Clicks --}}
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.profile_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">0</p>
                            <small class="text-muted">{{ __('messages.unique') }} 0</small>
                        </div>

                        {{-- Profile Views --}}
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.profile_view') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">0</p>
                            <small class="text-muted">{{ __('messages.unique') }} 0</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>


                {{-- Password Reset Requests --}}
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-danger d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-unlock-keyhole"></i>
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.terms_page_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $termsPageClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueTermsPageClicks }}</small>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.terms_page_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $termsPageViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueTermsPageViews }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Contact Views --}}
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-primary d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-address-card"></i>
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.contact_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $contactPageViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueContactPageViews }}</small>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.contact_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $contactPageClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueContactPageClicks }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Blog Views --}}
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-dark d-flex align-items-center justify-content-center text-white">
                        <i class="fas fa-blog"></i>
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.blog_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $blogPageClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueBlogPageClicks }}</small>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.blog_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $blogPageViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueContactPageClicks }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Views --}}
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 shadow rounded-4 overflow-hidden">
                <div class="row g-0">
                    {{-- Icon Section --}}
                    <div class="col-4 bg-success d-flex align-items-center justify-content-center text-white">
                        {{-- You can add an icon here if needed --}}
                        <i class="fas fa-eye"></i>
                    </div>

                    {{-- Stats Section --}}
                    <div class="col-8 bg-light p-3">
                        <div class="mb-3 border-bottom pb-2">
                            <h6 class="text-muted mb-1">{{ __('messages.privacy_page_clicks') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $privacyPolicyClicks }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniquePrivacyPolicyClicks }}</small>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">{{ __('messages.privacy_page_views') }}</h6>
                            <p class="mb-0 text-dark fs-5 fw-bold">{{ $privacyPolicyViews }}</p>
                            <small class="text-muted">{{ __('messages.unique') }} {{ $uniquePrivacyPolicyViews }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Access Denied
            </div>
        @endif
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif    
@endsection


{{-- Homepage Views --}}
        {{-- <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card p-3">
                <div class="d-flex align-items-center">
                    <div class="me-3 fs-3 text-primary">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div>
                        <h6 class="text-muted mb-1">{{ __('messages.homepage_views') }}</h6>
                        <p class="mb-0 text-dark fs-5">{{ $homepageViews }}</p>
                        <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueHomepageViews }}</small>
                         <p class="mb-0 text-dark fs-5">{{ $homepageViews }}</p>
                        <small class="text-muted">{{ __('messages.unique') }} {{ $uniqueHomepageViews }}</small>
                    </div>
                </div>
            </div>
        </div> --}}