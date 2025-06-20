@extends('website.layout.master')
@section('title')
    {{ __('messages.Car Listing') }} | {{ __('messages.Select and Rent') }}
@endsection

@section('content')
    <style>
        #addressDropdown {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

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
            pointer-events: none;
        }

        .position-relative {
            position: relative;
        }
    </style>

    <!-- add to cart js -->
    <script src="{{ asset('/frontend-assets/assets/Js/addtocart.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-toaster@5.2.0-beta1.1/dist/umd/bootstrap-toaster.min.js"></script>

    <div class="container">
        <div class="row">
            @include('website.car-listing.car-listing-filters.vehiclefilterlist')
            <!-- Main Content -->
            <div class="col-md-9">
                <!-- Sorting & Filtering -->
                <div class="filter-bar static-display-flex justify-content-between align-items-center my-3 mt-5">
                    <div class="static-display-flex align-items-center">
                        <span class="menu-icon">☰</span>
                        <span class="results">
                            8 {{ __('messages.of') }} <span id="current-count">{{ $totalCars }}</span>
                            {{ __('messages.results') }}
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
                    @if ($totalCars > 8)
                        <button class="load-more-btn btn btn-orange-clr text-white" data-target="car-list"
                            data-url="{{ route('load.more.cars') }}" data-offset="8" data-total="{{ $totalCars }}"
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
