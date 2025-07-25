<style>
    .custom-ml-15 {
        margin-left: 15px;
    }
</style>

<?php
if (Auth::check()) {
    $role = Auth::user()->role;
    $userId = auth()->id();
}
$owner = EmployeeOwner($userId);
?>

<div class="left-side-menu">

    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">{{ __('messages.navigation') }}</li>
                @if(can('dashboard','view'))
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span>{{ __('messages.dashboards') }}</span>
                        </a>
                    </li>
                @endif

                {{-- <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> {{ __('messages.dashboards') }} </span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('dashboard') }}">
                                    <i class="mdi mdi-wallet"></i>
                                    {{ __('messages.earnings') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                
                <li class="menu-title mt-2"> {{ trans_choice('messages.app', 2) }}</li>

                @if ($role == 'admin')
                    <li>
                        <a href="{{ route('users') }}">
                            <i class="mdi mdi-account-circle-outline"></i>
                            <span> {{ __('messages.admins') }} </span>
                        </a>
                    </li>
                @endif
                @if ($role == 'admin' || $role == 'company')
                    <li>
                        <a href="{{ route('employee') }}">
                            <i class="mdi mdi-account-circle-outline"></i>
                            <span> {{ __('messages.employees') }} </span>
                            <span class="badge ms-2"
                                style="background-color: #f06115; color: white; font-weight: bold;">
                                {{ getEmployeeCount() }}
                            </span>
                        </a>
                    </li>
                @endif
               
                
                
                @if (can('customer_accounts', 'view'))
                    <li>
                        <a href="{{ route('usersignup') }}">
                            <i class="mdi mdi-account-plus"></i>
                            <span>{{ __('messages.Sign-up') }}</span>
                        </a>
                    </li>
                @endif
                @if ($role == 'admin')
                    <li>
                        <a href="#sub_menu_company_listing" data-bs-toggle="collapse">
                            <i class="mdi mdi-hexagon-multiple"></i>
                            <span> {{ __('messages.companies') }} </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sub_menu_company_listing">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('createCompany') }}">
                                        <i class="mdi mdi-creation"></i>
                                        <span class="custom-ml-15">{{ __('messages.create') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('companies') }}"> 
                                        <i class="mdi mdi-image-filter-none"></i>
                                        <span class="custom-ml-15">{{ __('messages.active') }}</span>
                                        <span class="badge ms-2"
                                            style="background-color: #f06115; color: white; font-weight: bold;">
                                            {{ getCompaniesCount('1') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('pending') }}"> 
                                        <i class="mdi mdi-clock"></i>
                                        <span class="custom-ml-15">{{ __('messages.pending') }}</span>
                                        <span class="badge ms-2"
                                            style="background-color: #f06115; color: white; font-weight: bold;">
                                            {{ getCompaniesCount('0') }}
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('deactivatedCompanies') }}">
                                        <i class="mdi mdi-account-off"></i>
                                        <span class="custom-ml-15">{{ __('messages.deactivated') }}</span>
                                        <span class="badge ms-2"
                                            style="background-color: #f06115; color: white; font-weight: bold;">
                                            {{ getCompaniesCount('2') }}
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if(can('vehicles','view'))
                    <li>
                        <a href="#sub_menu_car_listing" data-bs-toggle="collapse"
                            class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="mdi mdi-car-side"></i>
                                <span class="ms-2">{{ __('messages.vehicles') }}</span>
                                <span class="badge ms-2"
                                    style="background-color: #f06115; color: white; font-weight: bold;">
                                    {{ getVehicleCount() }}
                                </span>
                            </div>
                            <span class="menu-arrow ms-2"></span>
                        </a>
                        <div class="collapse" id="sub_menu_car_listing">
                            <ul class="nav-second-level">
                                @if (can('vehicles', 'edit'))
                                    <li>
                                        <a href="{{ route('createCar') }}"> <i class="mdi mdi-creation"></i><span
                                                class="custom-ml-15">{{ __('messages.add') }}</span></a>
                                    </li>
                                @endif
                                <li>
                                    <a href="{{ route('carListings') }}"> <i class="mdi mdi-image-filter-none"></i>
                                        <span class="custom-ml-15">{{ __('messages.listings') }}</span>
                                        <span class="badge ms-2"
                                            style="background-color: #f06115; color: white; font-weight: bold;">
                                            {{ getVehicleCount() }}
                                        </span>
                                    </a>
                                </li>
                                @if (can('brands', 'view'))
                                    <li>
                                        <a href="{{ route('carBrands') }}"> <i class="mdi mdi-car-sports"></i>
                                            <span class="custom-ml-15">{{ __('messages.brands') }}</span></a>
                                    </li>
                                @endif
                                @if (can('categories', 'view'))
                                    <li>
                                        <a href="{{ route('carCategories') }}"> <i class="mdi mdi-car"></i>
                                            <span class="custom-ml-15">{{ __('messages.categories') }}</span></a>
                                    </li>
                                @endif
                                @if (can('features', 'view'))
                                    <li>
                                        <a href="{{ route('carFeatures') }}"> <i class="mdi mdi-car"></i><span
                                                class="custom-ml-15">{{ __('messages.features') }}</span></a>
                                    </li>
                                @endif
                                @if (can('models', 'view'))
                                    <li>
                                        <a href="{{ route('carModels') }}"> <i class="mdi mdi-car-estate"></i><span
                                                class="custom-ml-15">{{ __('messages.models') }}</span></a>
                                    </li>
                                @endif
                                @if (can('locations', 'view'))
                                    <li>
                                        <a href="{{ route('carLocations') }}"> <i
                                                class="mdi mdi-map-marker-radius"></i><span
                                                class="custom-ml-15">{{ __('messages.locations') }}</span></a>
                                    </li>
                                @endif
                                @if (can('cities', 'view'))
                                    <li>
                                        <a href="{{ route('cities') }}"> <i class="mdi mdi-map-marker-radius"></i><span
                                                class="custom-ml-15">{{ __('messages.cities') }}</span></a>
                                    </li>
                                @endif
                                @if (can('featured_vehicles', 'view'))
                                    <li>
                                        <a href="#">
                                            <i class="mdi mdi-car-side"></i>
                                            <span> {{ __('messages.featured_vehicles') }} </span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif              
                {{-- @if (can('Analytics', 'view')) --}}
                @if ($role == 'admin' || !empty($owner) && $owner->role == 'admin')
                    @if(can('analytics', 'view'))
                        <li>
                            <a href="{{ route('Analytics') }}">
                                <i class="mdi mdi-chart-bar"></i>
                                <span> {{ __('messages.analytics') }} </span>
                            </a>
                        </li>
                    @endif
                @endif
                @if (can('calendar', 'view'))
                    <li>
                        <a href="{{ route('calendar') }}">
                            <i class="mdi mdi-calendar-range"></i>
                            <span> {{ __('messages.calendar') }} </span>
                        </a>
                    </li>
                @endif
                @if (can('bookings', 'view'))
                    <li>
                        <a href="{{ route('bookingDashboard') }}"
                            class="d-flex align-items-center justify-content-between">
                            <span>
                                <i class="mdi mdi-calendar-multiple-check"></i>
                                {{ __('messages.bookings') }}
                            </span>
                            <span class="badge" style="color: white; background-color: #f06115; font-weight: bold;">
                                {{ getBookingCount() }}
                            </span>
                        </a>
                    </li>
                @endif
                @if (can('financials', 'view'))
                    <li>
                        <a href="{{ route('earningSummary') }}">
                            <i class="mdi mdi-cash-multiple"></i>
                            <span>{{ __('messages.financials') }}</span>
                        </a>
                    </li>
                @endif
                @if (can('refunds', 'view'))
                    <li>
                        <a href="{{ route('refundableBookings') }}">
                            <i class="mdi mdi-cash-multiple"></i>
                            <span>{{ __('messages.refunds') }}</span>
                        </a>
                    </li>
                @endif
                @if (can('clients', 'view'))
                    <li>
                        <a href="{{ route('client') }}" class="d-flex align-items-center justify-content-between">
                            <span>
                                <i class="mdi mdi-account-group"></i>
                                {{ trans_choice('messages.client', 2) }}
                            </span>
                            <span class="badge" style="color: white; background-color: #f06115; font-weight: bold;">
                                {{ getCustomerBookingCount() }}
                            </span>
                        </a>
                    </li>
                @endif
                @if (can('reminders', 'view'))
                    <li>
                        <a href="{{ route('reminder') }}">
                            <i class="mdi mdi-bell-outline"></i>
                            <span> {{ __('messages.reminder') }} </span>
                        </a>
                    </li>
                @endif
                @if ($role == 'admin')
                    <li>
                        <a href="{{ route('ipAddresses') }}">
                            <i class="mdi mdi-network"></i>
                            <span> {{ __('messages.users') }} IP </span>
                        </a>
                    </li>
                    {{-- Added by Farhan  --}}
                    <li>
                        <a href="#sub_menu_blog" data-bs-toggle="collapse">
                            <i class="mdi mdi-book-open-page-variant"></i>
                            <span> {{ trans_choice('messages.blog', 2) }} </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sub_menu_blog">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('blogs.createBlog') }}">
                                        <i class="mdi mdi-format-list-bulleted"></i>
                                        <span class="custom-ml-15">{{ __('messages.create') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('blogs.blogDetail') }}">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="custom-ml-15">{{ __('messages.details') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                @if (can('reviews', 'view'))
                    <li>
                        <a href="#sub_menu_review" data-bs-toggle="collapse">
                            <i class="mdi mdi-comment-text-multiple-outline"></i>
                            <span>{{ trans_choice('messages.review', 2) }}</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sub_menu_review">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('reviews.vehicle') }}">
                                        <i class="mdi mdi-comment-eye-outline"></i>
                                        <span class="custom-ml-15">{{ __('messages.vehicle_reviews') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('customerReview') }}">
                                        <i class="mdi mdi-account-circle-outline"></i>
                                        <span class="custom-ml-15">{{ __('messages.user_reviews') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
                {{-- end by Farhan  --}}
                @if (can('activity_logs', 'view'))
                    <li>
                        <a href="{{ route('activityLogs') }}">
                            <i class="bi bi-journal-text"></i>
                            <span>{{ __('messages.activity_logs') }} </span>
                        </a>
                    </li>
                @endif
                @if ($role == 'admin' || !empty($owner) && $owner->role == 'admin' )
                    @if(can('contact', 'view'))
                        <li>
                            <a href="{{ route('contact.received') }}"
                                class="d-flex align-items-center justify-content-between">
                                <span>
                                    <i class="mdi mdi-email"></i>
                                    {{ __('messages.contact') }}
                                </span>
                                <span class="badge"
                                    style="color: white; background-color: #f06115; font-weight: bold;">
                                    {{ getContactCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
                    @if(can('country', 'view'))
                        <li>
                            <a href="{{ route('countries.index') }}"
                                class="d-flex align-items-center justify-content-between">
                                <span>
                                    <i class="mdi mdi-earth"></i>
                                    {{ __('messages.country') }}
                                </span>
                            </a>
                        </li>
                    @endif
                @endif

                @if ($role == 'admin')
                    <li>
                        <a href="#sub_menu_settings" data-bs-toggle="collapse">
                            <i class="mdi mdi-cog"></i>
                            <span>{{ __('messages.settings') }} </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sub_menu_settings">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('general-module.create') }}">
                                        <i class="mdi mdi-tools"></i>
                                        <span class="custom-ml-15">{{ __('messages.general_module') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#sub_menu_permissions" data-bs-toggle="collapse">
                                        <i class="mdi mdi-creation"></i>
                                        <span class="custom-ml-15">{{ __('messages.permissions') }}</span>
                                    </a>
                                    <div class="collapse" id="sub_menu_permissions">
                                        <ul class="nav-third-level">
                                            <li>
                                                <a href="{{ route('permissions', 'admin') }}">
                                                    <i class="mdi mdi-account-star"></i>
                                                    <span class="custom-ml-15">{{ __('messages.admin') }}</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('permissions', 'company') }}">
                                                    <i class="mdi mdi-account"></i>
                                                    <span class="custom-ml-15">{{ __('messages.company') }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="{{ route('paymentGateway') }}">
                                        <i class="mdi mdi-plus-circle"></i>
                                        <span class="custom-ml-15">{{ __('messages.payment-module') }}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-map-marker-multiple"></i>
                                        <span class="custom-ml-15">{{ __('messages.google-map-module') }}</span>
                                    </a>
                                </li>
                                @if (can('Currencies', 'view'))
                                    <li>
                                        <a href="{{ route('currencies') }}">
                                            <i class="mdi mdi-currency-sign"></i>
                                            <span class="custom-ml-15">{{ __('messages.currencies') }}</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @elseif($role == 'company')
                    <li>
                        <a href="#sub_menu_settings" data-bs-toggle="collapse">
                            <i class="mdi mdi-cog"></i>
                            <span>{{ __('messages.settings') }} </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sub_menu_settings">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="{{ route('permissions', 'selfCompany') }}">
                                        <i class="mdi mdi-creation"></i>
                                        <span class="custom-ml-15">{{ __('messages.permissions') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
