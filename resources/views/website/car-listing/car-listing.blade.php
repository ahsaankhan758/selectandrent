@extends('website.layout.master')
@section('title')
{{ __('messages.Car Listing') }} | {{ __('messages.Select and Rent') }}
@endsection

@section('content')

<style>
/* Ensure the dropdown appears correctly */
#addressDropdown {
    position: absolute;
    top: 100%; /* Position dropdown right below the input */
    left: 0;
    width: 100%; /* Full width of input field */
    max-height: 200px; /* Prevent too large dropdown */
    overflow-y: auto; /* Enable scrolling for long lists */
    background-color: #fff; /* Match form input */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    z-index: 1000; /* Ensure it appears above other elements */
    display: none; /* Initially hidden */
}

/* Show dropdown when results exist */
#addressDropdown.show {
    display: block;
}

/* Style dropdown items */
#addressDropdown .dropdown-item {
    padding: 8px 12px;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
}

/* Hover effect for dropdown items */
#addressDropdown .dropdown-item:hover {
    background-color: #f8f9fa;
}

/* Style for muted/no results */
#addressDropdown .text-muted {
    color: #6c757d;
    pointer-events: none; /* Disable selection */
}

/* Ensure input field has proper positioning */
.position-relative {
    position: relative;
}


</style>

<!-- add to cart js -->
<script src="{{asset('/frontend-assets/assets/Js/addtocart.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>

<div class="container">
    <div class="row">
        <!-- car-listing-sidebar -->
        <div class="col-md-3 car-listing-sidebar">
            <div class="filters p-3">
                <div class="filter-section">
                    <div class="position-relative">
                        <input type="text" id="addressFilter" class="form-control car-input-box" placeholder="{{ __('messages.Address') }}">
                        <ul id="addressDropdown" class="dropdown-menu w-100" style="display: none;"></ul>
                    </div>
                    
                    
                                        
                    <div class="car-listing-dropdown-container mb-2">
                        <div id="carModelDropdownBtn" class="dropdown-btn">
                            <span>{{ __('messages.Select a Car Model') }} </span>
                            <i class="dropdown-arrow fas fa-chevron-down"></i>
                        </div>
                        <div id="carModelDropdownMenu" class="dropdown-menu-custom">
                            <input type="text" id="carModelSearch" class="search-box" placeholder="{{ __('messages.Search Car Model') }}...">
                            <ul id="carModelList" class="list-unstyled mb-0">
                                <li class="dropdown-item-custom text-muted">{{ __('messages.Loading') }}...</li>
                            </ul>
                        </div>
                    </div>
                
                    <input type="date" id="dateFilter" class="form-control car-input-box">
                    <input type="time" id="timeFilter" class="form-control car-input-box" step="1">
                </div>
                
                <!-- Car Listing Container -->
               
                
                <div class="brand-section">
                    <h5 class="brand-title">{{ __('messages.All Brands') }}({{ $totalCars }})</h5>
                    
                    <div class="brand-list">
                        @foreach($categories->take(6) as $category)
                            <button class="brand-btn category-filter" data-category="{{ $category->id }}">
                                {{ $category->name }} ({{ $category->cars_count }})
                            </button>
                        @endforeach
                    </div>
                
                    @if($categories->count() > 6)
                
                        <div id="extraCategories" class="brand-list" style="display: none;">
                            @foreach($categories->skip(6) as $category)
                                <button class="brand-btn category-filter" data-category="{{ $category->id }}">
                                    {{ $category->name }} ({{ $category->cars_count }})
                                </button>
                            @endforeach
                        </div>
                        <button id="viewMoreCategories" class="brand-btn">{{ __('messages.View More') }}</button>

                    @endif
                
                    <button class="btn find-car-btn btn-dark-blue-clr">{{ __('messages.Find Car') }}</button>
                </div>
                
                
        
            </div>
        </div>
        

        <!-- Main Content -->
        <div class="col-md-9">
           <!-- Sorting & Filtering -->
        <div class="filter-bar static-display-flex justify-content-between align-items-center my-3 mt-5">
            <div class="static-display-flex align-items-center">
                <span class="menu-icon">☰</span>
                <span class="results">
                    <span id="current-count">8</span> {{ __('messages.of') }} {{ $totalCars }} {{ __('messages.results') }} 
                </span>
            </div>
            <div class="filter-options static-display-flex align-items-center">
                <div class="car-listing-dropdown">
                    <span class="filter-icon">⇅</span>
                    <select id="transmission-filter" class="car-listing-form-select">
                        <option value="">{{ __('messages.All Cars') }}</option>
                        <option value="auto">{{ __('messages.Auto') }}</option>
                        <option value="manual">{{ __('messages.Manual') }}</option>
                    </select>
                    
                </div>
                <div class="car-listing-dropdown">
                    <span class="sort-icon">≡</span>
                    <select id="sort-filter" class="car-listing-form-select">
                        <option value="">{{ __('messages.Sort By') }}</option>
                        <option value="low_to_high">{{ __('messages.Price (Low to High)') }}</option>
                        <option value="high_to_low">{{ __('messages.Price (High to Low)') }}</option>
                    </select>
                </div>
            </div>
        </div>

        
        <!-- Car Listing Grid -->
        <div class="row" id="car-list">
            @include('website.car-listing.car-listing-filters.car-list', ['cars' => $cars])
        </div>
        <div class="text-center mb-5">

        @if($totalCars > 8)
        <button class="load-more-btn btn btn-orange-clr text-white" 
        data-target="car-list" 
        data-url="{{ route('load.more.cars') }}" 
        data-offset="8" 
        data-total="{{ $totalCars }}" 
        data-model="Car">
        {{ __('messages.Load More') }}
        </button>
    
        @endif
        </div>  
                  
            
        </div>
    </div>
</div>


<script>
    var carListingRoute = "{{ route('car.listing') }}";
    var carListingFilterRoute = "{{ route('get.car.models') }}";
    var carListingAddressFilter = "{{ route('search.locations') }}";
</script>



@endsection