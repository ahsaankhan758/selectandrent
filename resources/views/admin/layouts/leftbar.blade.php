<style>
    .custom-ml-15{
        margin-left: 15px;
    }
</style>
<?php
    if(Auth::check()){
        $role = Auth::user()->role;
        $userId = auth()->id();
    }
?>

<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        {{-- <!-- User box -->
        <div class="user-box text-center">
            <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div> --}}

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">{{ __('messages.navigation') }}</li>
    
                <li>
                     <a href="#sidebarDashboards" data-bs-toggle="collapse">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        {{-- <span class="badge bg-success rounded-pill float-end">2</span> --}}
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
                            {{-- <li>
                                <a href="{{ route('bookingDashboard') }}">
                                    <i class="mdi mdi-calendar-multiple-check"></i>
                                    {{ __('messages.bookings') }}
                                 </a>
                            </li> --}}
                            {{-- <li>
                                <a href="dashboard-3.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="dashboard-4.html">Dashboard 4</a>
                            </li> --}}
                        </ul>
                    </div>  
                </li>

                <li class="menu-title mt-2"> {{ trans_choice('messages.app',2) }}</li>
               
                @if($role == 'admin')
                    @if(can('users','view'))
                        <li>
                            <a href="{{ route('users') }}">
                                <i class="mdi mdi-account-circle-outline"></i>
                                <span> {{ __('messages.admins') }} </span>
                            </a>
                        </li>
                    @endif
                    @if(can('users','view'))
                        <li>
                            <a href="{{ route('employee') }}">
                                <i class="mdi mdi-account-circle-outline"></i>
                                <span> {{ __('messages.employees') }} </span>
                            </a>
                        </li>
                    @endif
                @endif
                @if($role == 'admin' || ownerRole($userId) == 'admin')
                    <li>
                        <a href="{{ route('usersignup') }}">
                            <i class="mdi mdi-account-plus"></i>
                            <span>{{ __('messages.Sign-up') }}</span>
                        </a>
                    </li>
                    <li>
                        <a href="#sub_menu_company_listing" data-bs-toggle="collapse">
                            <i class="mdi mdi-hexagon-multiple"></i>
                            <span> {{ __('messages.companies') }} </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sub_menu_company_listing">
                            <ul class="nav-second-level">
                                @if(can('companies','edit'))
                                    <li>
                                        <a href="{{ route('createCompany') }}" > <i class="mdi mdi-creation"></i><span class="custom-ml-15">{{ __('messages.create') }} </span></a>
                                    </li>
                                @endif
                                @if(can('companies','view'))
                                    <li>
                                        <a href="{{ route('companies') }}" > <i class="mdi mdi-image-filter-none"></i><span class="custom-ml-15">{{ __('messages.active') }} </span></a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pending') }}"> <i class="mdi mdi-clock"></i><span class="custom-ml-15">{{ __('messages.pending') }}</a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </li>
                @endif

                <li>
                    <a href="#sub_menu_car_listing" data-bs-toggle="collapse">
                        <i class="mdi mdi-car-side"></i>
                        <span> {{ __('messages.vehicles') }} </span>
                        <span class="menu-arrow"></span>
                       
                    </a>
                    <div class="collapse" id="sub_menu_car_listing">
                        <ul class="nav-second-level">
                            @if(can('Vehicle','edit'))
                                <li>
                                    <a href="{{ route('createCar') }}" > <i class="mdi mdi-creation"></i><span class="custom-ml-15">{{ __('messages.create') }}</span></a>
                                </li>
                            @endif
                            @if(can('Vehicle','view'))
                                <li>
                                    <a href="{{ route('carListings') }}" > <i class="mdi mdi-image-filter-none"></i><span class="custom-ml-15">{{ __('messages.listings') }}</span></a>
                                </li>
                            @endif
                            @if($role == 'admin' || ownerRole($userId) == 'admin')
                                @if(can('brands','view'))
                                    <li>
                                        <a href="{{ route('carBrands') }}"> <i class="mdi mdi-car-sports"></i><span class="custom-ml-15">{{ __('messages.brands') }}</a>
                                    </li>
                                @endif
                                @if(can('categories','view'))
                                    <li>
                                        <a href="{{ route('carCategories') }}">   <i class="mdi mdi-car"></i><span class="custom-ml-15">{{ __('messages.categories') }}</a>
                                    </li>
                                @endif
                                @if(can('features','view'))
                                    <li>
                                        <a href="{{ route('carFeatures') }}">   <i class="mdi mdi-car"></i><span class="custom-ml-15">{{ __('messages.features') }}</a>
                                    </li>
                                @endif
                                @if(can('models','view'))
                                    <li>
                                        <a href="{{ route('carModels') }}">  <i class="mdi mdi-car-estate"></i><span class="custom-ml-15">{{ __('messages.models') }}</a>
                                    </li>
                                @endif
                            @endif    
                            @if(can('locations','view'))       
                                <li>
                                    <a href="{{ route('carLocations') }}">    <i class="mdi mdi-map-marker-radius"></i><span class="custom-ml-15">{{ __('messages.locations') }}</a>
                                </li>
                            @endif
                            <li>
                                <a href="{{ route('cities') }}">    <i class="mdi mdi-map-marker-radius"></i><span class="custom-ml-15">city</a>
                            </li>
                            @if(can('featured_vehicles','view')) 
                                <li>
                                    <a href="#">
                                        <i class="mdi mdi-car-side"></i>
                                        <span> {{ __('messages.featured vehicles') }} </span>
                                    </a>
                                </li>
                            @endif    

                        </ul>
                    </div>
                </li>

                 {{-- <li>
                    <a href="#" type="button" data-bs-toggle="collapse" data-bs-target="#sub_menu_car_listing"><i class="mdi mdi-car-side"></i>
                        <span> Cars<i id="car_list_open_close" class="mdi mdi-chevron-down"></i></span>
                    </a>
                </li> --}}
                {{-- <li id="sub_menu_car_listing" class="collapse">
                    <a class="dropdown-item custom-ml-15" href="{{ route('carListings') }}" > <i class="mdi mdi-image-filter-none"></i>Car Listngs</a>
                </li>
                <li id="sub_menu_car_listing" class="collapse">
                    <a class="dropdown-item custom-ml-15" href="{{ route('carBrands') }}"> <i class="mdi mdi-car-sports"></i>Car Brands</a>
                </li>
                <li id="sub_menu_car_listing" class="collapse">
                    <a class="dropdown-item custom-ml-15" href="{{ route('carCategories') }}">   <i class="mdi mdi-car"></i>Car Categories</a>
                </li>
                <li id="sub_menu_car_listing" class="collapse">
                    <a class="dropdown-item custom-ml-15" href="{{ route('carModels') }}">  <i class="mdi mdi-car-estate"></i>Car Models</a>
                </li>
                <li id="sub_menu_car_listing" class="collapse">
                    <a class="dropdown-item custom-ml-15" href="{{ route('carLocations') }}">    <i class="mdi mdi-map-marker-radius"></i>Car Locations</a>
                </li> --}}
                {{-- @if(can('Analytics','view')) --}}
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <li>
                        <a href="{{ route('Analytics') }}">
                            <i class="mdi mdi-chart-bar"></i>
                            <span> {{ __('messages.analytics') }} </span>
                        </a>
                    </li>
                @endif
                @if(can('Calendar','view'))
                    <li>
                        <a href="{{ route('calendar') }}">
                            <i class="mdi mdi-calendar-range"></i>
                            <span> {{ __('messages.calendar') }} </span>
                        </a>
                    </li>
                @endif
                @if(can('Bookings','view'))
                    <li>
                        <a href="{{ route('bookingDashboard') }}">
                            <i class="mdi mdi-calendar-multiple-check"></i>
                            <span>{{ __('messages.bookings') }} </span>
                        </a>
                    </li>
                @endif
                @if(can('Financial','view'))
                  <li>
                        <a href="{{ route('earningSummary')}}">
                            <i class="mdi mdi-cash-multiple"></i>
                            <span>{{ __('messages.financial') }}</span>
                        </a>
                    </li>
                @endif
                @if(can('Clients','view'))
                    <li>
                        <a href="{{ route('client') }}">
                            <i class="mdi mdi-account-group"></i>
                            <span>{{ trans_choice('messages.client',2) }}   </span>
                        </a>
                    </li>
                @endif
                
                @if($role == 'admin')
                    @if(can('User IP','view'))
                        <li>
                            <a href="{{ route('ipAddresses') }}">
                                <i class="mdi mdi-network"></i>
                                <span> {{ __('messages.users') }} IP  </span>
                            </a>
                        </li>
                    @endif
                    {{--Added by Farhan  --}}
                    @if(can('Blogs','view'))
                        <li>
                            <a href="#sub_menu_blog" data-bs-toggle="collapse">
                                <i class="mdi mdi-book-open-page-variant"></i>
                                <span> {{ trans_choice('messages.blog',2) }}   </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <div class="collapse" id="sub_menu_blog">
                                <ul class="nav-second-level">
                                    @if(can('Blogs','edit'))
                                        <li>
                                            <a href="{{ route('blogs.createBlog') }}"> 
                                                <i class="mdi mdi-format-list-bulleted"></i>
                                                <span class="custom-ml-15">{{ __('messages.create') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if(can('Blogs','view'))
                                        <li>
                                            <a href="{{ route('blogs.blogDetail') }}"> 
                                                <i class="mdi mdi-plus-circle"></i>
                                                <span class="custom-ml-15">{{ __('messages.details') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </li>
                    @endif
                @endif

                {{--end by Farhan  --}}
                @if(can('Activity_Log','view'))  
                    <li>
                        <a href="{{ route('activityLogs') }}">
                            <i class="bi bi-journal-text"></i>
                            <span>{{ __('messages.activity logs') }} </span>
                        </a>
                    </li>
                @endif
                @if($role == 'admin')
                    @if(can('Contacts','view')) 
                        <li>
                            <a href="{{ route('contact.received') }}">
                                <i class="mdi mdi-email"></i>
                                <span>{{ __('messages.contact') }}</span>
                            </a>
                        </li>
                    @endif
                @endif

                @if($role == 'admin')
                    <li>
                        <a href="#sub_menu_settings" data-bs-toggle="collapse">
                            <i class="mdi mdi-cog"></i>
                            <span>{{ __('messages.settings') }} </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sub_menu_settings">
                            <ul class="nav-second-level">
                                <li>
                                    <a href="#sub_menu_permissions" data-bs-toggle="collapse" > 
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
                                @if(can('Currencies','view'))
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
                        <a href="{{ route('permissions', 'selfCompany') }}"> 
                            <i class="mdi mdi-creation"></i>
                            <span class="custom-ml-15">{{ __('messages.permissions') }}</span>
                        </a>
                    </li>
                @endif
                {{-- <li>
                    <a href="apps-chat.html">
                        <i class="mdi mdi-forum-outline"></i>
                        <span> Chat </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Ecommerce </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ecommerce-dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="ecommerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="ecommerce-product-detail.html">Product Detail</a>
                            </li>
                            <li>
                                <a href="ecommerce-product-edit.html">Add Product</a>
                            </li>
                            <li>
                                <a href="ecommerce-customers.html">Customers</a>
                            </li>
                            <li>
                                <a href="ecommerce-orders.html">Orders</a>
                            </li>
                            <li>
                                <a href="ecommerce-order-detail.html">Order Detail</a>
                            </li>
                            <li>
                                <a href="ecommerce-sellers.html">Sellers</a>
                            </li>
                            <li>
                                <a href="ecommerce-cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="ecommerce-checkout.html">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCrm" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span> CRM </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCrm">
                        <ul class="nav-second-level">
                            <li>
                                <a href="crm-dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="crm-contacts.html">Contacts</a>
                            </li>
                            <li>
                                <a href="crm-opportunities.html">Opportunities</a>
                            </li>
                            <li>
                                <a href="crm-leads.html">Leads</a>
                            </li>
                            <li>
                                <a href="crm-customers.html">Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Email </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li>
                                <a href="email-inbox.html">Inbox</a>
                            </li>
                            <li>
                                <a href="email-read.html">Read Email</a>
                            </li>
                            <li>
                                <a href="email-compose.html">Compose Email</a>
                            </li>
                            <li>
                                <a href="email-templates.html">Email Templates</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="apps-social-feed.html">
                        <span class="badge bg-pink float-end">Hot</span>
                        <i class="mdi mdi-rss"></i>
                        <span> Social Feed </span>
                    </a>
                </li>

                <li>
                    <a href="apps-companies.html">
                        <i class="mdi mdi-domain"></i>
                        <span> Companies </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarProjects" data-bs-toggle="collapse">
                        <i class="mdi mdi-briefcase-check-outline"></i>
                        <span> Projects </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarProjects">
                        <ul class="nav-second-level">
                            <li>
                                <a href="project-list.html">List</a>
                            </li>
                            <li>
                                <a href="project-detail.html">Detail</a>
                            </li>
                            <li>
                                <a href="project-create.html">Create Project</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTasks" data-bs-toggle="collapse">
                        <i class="mdi mdi-clipboard-multiple-outline"></i>
                        <span> Tasks </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTasks">
                        <ul class="nav-second-level">
                            <li>
                                <a href="task-list.html">List</a>
                            </li>
                            <li>
                                <a href="task-details.html">Details</a>
                            </li>
                            <li>
                                <a href="task-kanban-board.html">Kanban Board</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarContacts" data-bs-toggle="collapse">
                        <i class="mdi mdi-book-account-outline"></i>
                        <span> Contacts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarContacts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="contacts-list.html">Members List</a>
                            </li>
                            <li>
                                <a href="contacts-profile.html">Profile</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTickets" data-bs-toggle="collapse">
                        <i class="mdi mdi-lifebuoy"></i>
                        <span> Tickets </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTickets">
                        <ul class="nav-second-level">
                            <li>
                                <a href="tickets-list.html">List</a>
                            </li>
                            <li>
                                <a href="tickets-detail.html">Detail</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="apps-file-manager.html">
                        <i class="mdi mdi-folder-star-outline"></i>
                        <span> File Manager </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Auth Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="auth-login.html">Log In</a>
                            </li>
                            <li>
                                <a href="auth-login-2.html">Log In 2</a>
                            </li>
                            <li>
                                <a href="auth-register.html">Register</a>
                            </li>
                            <li>
                                <a href="auth-register-2.html">Register 2</a>
                            </li>
                            <li>
                                <a href="auth-signin-signup.html">Signin - Signup</a>
                            </li>
                            <li>
                                <a href="auth-signin-signup-2.html">Signin - Signup 2</a>
                            </li>
                            <li>
                                <a href="auth-recoverpw.html">Recover Password</a>
                            </li>
                            <li>
                                <a href="auth-recoverpw-2.html">Recover Password 2</a>
                            </li>
                            <li>
                                <a href="auth-lock-screen.html">Lock Screen</a>
                            </li>
                            <li>
                                <a href="auth-lock-screen-2.html">Lock Screen 2</a>
                            </li>
                            <li>
                                <a href="auth-logout.html">Logout</a>
                            </li>
                            <li>
                                <a href="auth-logout-2.html">Logout 2</a>
                            </li>
                            <li>
                                <a href="auth-confirm-mail.html">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="auth-confirm-mail-2.html">Confirm Mail 2</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Extra Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="pages-starter.html">Starter</a>
                            </li>
                            <li>
                                <a href="pages-timeline.html">Timeline</a>
                            </li>
                            <li>
                                <a href="pages-sitemap.html">Sitemap</a>
                            </li>
                            <li>
                                <a href="pages-invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="pages-faqs.html">FAQs</a>
                            </li>
                            <li>
                                <a href="pages-search-results.html">Search Results</a>
                            </li>
                            <li>
                                <a href="pages-pricing.html">Pricing</a>
                            </li>
                            <li>
                                <a href="pages-maintenance.html">Maintenance</a>
                            </li>
                            <li>
                                <a href="pages-coming-soon.html">Coming Soon</a>
                            </li>
                            <li>
                                <a href="pages-gallery.html">Gallery</a>
                            </li>
                            <li>
                                <a href="pages-404.html">Error 404</a>
                            </li>
                            <li>
                                <a href="pages-404-two.html">Error 404 Two</a>
                            </li>
                            <li>
                                <a href="pages-404-alt.html">Error 404-alt</a>
                            </li>
                            <li>
                                <a href="pages-500.html">Error 500</a>
                            </li>
                            <li>
                                <a href="pages-500-two.html">Error 500 Two</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarLayouts" data-bs-toggle="collapse">
                        <i class="mdi mdi-cellphone-link"></i>
                        <span class="badge bg-blue float-end">New</span>
                        <span> Layouts </span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="layouts-horizontal.html">Horizontal</a>
                            </li>
                            <li>
                                <a href="layouts-detached.html">Detached</a>
                            </li>
                            <li>
                                <a href="layouts-two-column.html">Two Column Menu</a>
                            </li>
                            <li>
                                <a href="layouts-two-tone-icons.html">Two Tones Icons</a>
                            </li>
                            <li>
                                <a href="layouts-preloader.html">Preloader</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-title mt-2">Components</li>

                <li>
                    <a href="#sidebarBaseui" data-bs-toggle="collapse">
                        <i class="mdi mdi-black-mesa"></i>
                        <span> Base UI </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ui-buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="ui-cards.html">Cards</a>
                            </li>
                            <li>
                                <a href="ui-avatars.html">Avatars</a>
                            </li>
                            <li>
                                <a href="ui-portlets.html">Portlets</a>
                            </li>
                            <li>
                                <a href="ui-tabs-accordions.html">Tabs & Accordions</a>
                            </li>
                            <li>
                                <a href="ui-modals.html">Modals</a>
                            </li>
                            <li>
                                <a href="ui-progress.html">Progress</a>
                            </li>
                            <li>
                                <a href="ui-notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="ui-offcanvas.html">Offcanvas</a>
                            </li>
                            <li>
                                <a href="ui-placeholders.html">Placeholders</a>
                            </li>
                            <li>
                                <a href="ui-spinners.html">Spinners</a>
                            </li>
                            <li>
                                <a href="ui-images.html">Images</a>
                            </li>
                            <li>
                                <a href="ui-carousel.html">Carousel</a>
                            </li>
                            <li>
                                <a href="ui-list-group.html">List Group</a>
                            </li>
                            <li>
                                <a href="ui-video.html">Embed Video</a>
                            </li>
                            <li>
                                <a href="ui-dropdowns.html">Dropdowns</a>
                            </li>
                            <li>
                                <a href="ui-ribbons.html">Ribbons</a>
                            </li>
                            <li>
                                <a href="ui-tooltips-popovers.html">Tooltips & Popovers</a>
                            </li>
                            <li>
                                <a href="ui-general.html">General UI</a>
                            </li>
                            <li>
                                <a href="ui-typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="ui-grid.html">Grid</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExtendedui" data-bs-toggle="collapse">
                        <i class="mdi mdi-layers-outline"></i>
                        <span class="badge bg-info float-end">Hot</span>
                        <span> Extended UI </span>
                    </a>
                    <div class="collapse" id="sidebarExtendedui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="extended-nestable.html">Nestable List</a>
                            </li>
                            <li>
                                <a href="extended-range-slider.html">Range Slider</a>
                            </li>
                            <li>
                                <a href="extended-dragula.html">Dragula</a>
                            </li>
                            <li>
                                <a href="extended-animation.html">Animation</a>
                            </li>
                            <li>
                                <a href="extended-sweet-alert.html">Sweet Alert</a>
                            </li>
                            <li>
                                <a href="extended-tour.html">Tour Page</a>
                            </li>
                            <li>
                                <a href="extended-scrollspy.html">Scrollspy</a>
                            </li>
                            <li>
                                <a href="extended-loading-buttons.html">Loading Buttons</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="widgets.html">
                        <i class="mdi mdi-gift-outline"></i>
                        <span> Widgets </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i class="mdi mdi-bullseye"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="icons-material-symbols.html">Material Symbols Icons</a>
                            </li>
                            <li>
                                <a href="icons-two-tone.html">Two Tone Icons</a>
                            </li>
                            <li>
                                <a href="icons-feather.html">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icons-mdi.html">Material Design Icons</a>
                            </li>
                            <li>
                                <a href="icons-dripicons.html">Dripicons</a>
                            </li>
                            <li>
                                <a href="icons-font-awesome.html">Font Awesome 5</a>
                            </li>
                            <li>
                                <a href="icons-themify.html">Themify</a>
                            </li>
                            <li>
                                <a href="icons-simple-line.html">Simple Line</a>
                            </li>
                            <li>
                                <a href="icons-weather.html">Weather</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i class="mdi mdi-bookmark-multiple-outline"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="forms-elements.html">General Elements</a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">Advanced</a>
                            </li>
                            <li>
                                <a href="forms-validation.html">Validation</a>
                            </li>
                            <li>
                                <a href="forms-pickers.html">Pickers</a>
                            </li>
                            <li>
                                <a href="forms-wizard.html">Wizard</a>
                            </li>
                            <li>
                                <a href="forms-masks.html">Masks</a>
                            </li>
                            <li>
                                <a href="forms-quilljs.html">Quilljs Editor</a>
                            </li>
                            <li>
                                <a href="forms-file-uploads.html">File Uploads</a>
                            </li>
                            <li>
                                <a href="forms-x-editable.html">X Editable</a>
                            </li>
                            <li>
                                <a href="forms-image-crop.html">Image Crop</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse">
                        <i class="mdi mdi-table"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a href="tables-basic.html">Basic Tables</a>
                            </li>
                            <li>
                                <a href="tables-datatables.html">Data Tables</a>
                            </li>
                            <li>
                                <a href="tables-editable.html">Editable Tables</a>
                            </li>
                            <li>
                                <a href="tables-responsive.html">Responsive Tables</a>
                            </li>
                            <li>
                                <a href="tables-footables.html">FooTable</a>
                            </li>
                            <li>
                                <a href="tables-bootstrap.html">Bootstrap Tables</a>
                            </li>
                            <li>
                                <a href="tables-tablesaw.html">Tablesaw Tables</a>
                            </li>
                            <li>
                                <a href="tables-jsgrid.html">JsGrid Tables</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCharts" data-bs-toggle="collapse">
                        <i class="mdi mdi-poll"></i>
                        <span> Charts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCharts">
                        <ul class="nav-second-level">
                            <li>
                                <a href="charts-apex.html">Apex Charts</a>
                            </li>
                            <li>
                                <a href="charts-flot.html">Flot Charts</a>
                            </li>
                            <li>
                                <a href="charts-morris.html">Morris Charts</a>
                            </li>
                            <li>
                                <a href="charts-chartjs.html">Chartjs Charts</a>
                            </li>
                            <li>
                                <a href="charts-peity.html">Peity Charts</a>
                            </li>
                            <li>
                                <a href="charts-chartist.html">Chartist Charts</a>
                            </li>
                            <li>
                                <a href="charts-c3.html">C3 Charts</a>
                            </li>
                            <li>
                                <a href="charts-sparklines.html">Sparklines Charts</a>
                            </li>
                            <li>
                                <a href="charts-knob.html">Jquery Knob Charts</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i class="mdi mdi-map-outline"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html">Vector Maps</a>
                            </li>
                            <li>
                                <a href="maps-mapael.html">Mapael Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMultilevel" data-bs-toggle="collapse">
                        <i class="mdi mdi-share-variant"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                    Second Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Item 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarMultilevel3" data-bs-toggle="collapse">
                                    Third Level <span class="menu-arrow"></span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel3">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="#sidebarMultilevel4" data-bs-toggle="collapse">
                                                Item 2 <span class="menu-arrow"></span>
                                            </a>
                                            <div class="collapse" id="sidebarMultilevel4">
                                                <ul class="nav-second-level">
                                                    <li>
                                                        <a href="javascript: void(0);">Item 1</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript: void(0);">Item 2</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
 <!-- Check Car Listing submenu open or close  -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
    let submenu = document.getElementById('sub_menu_car_listing');

    submenu.addEventListener('show.bs.collapse', function () {
        $('#car_list_open_close').removeClass('mdi mdi-chevron-down');
        $('#car_list_open_close').addClass('mdi mdi-chevron-up');

    });

    submenu.addEventListener('hide.bs.collapse', function () {
        $('#car_list_open_close').removeClass('mdi mdi-chevron-up');
        $('#car_list_open_close').addClass('mdi mdi-chevron-down');
        
    });
});    
</script> --}}