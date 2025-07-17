@extends('website.layout.master')
@section('title')
    {{ __('messages.vehicle_listing') }} 
@endsection

@section('content')
   

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
                                <option value="">{{ __('messages.all_vehicles') }}</option>
                                <option value="auto">{{ __('messages.auto') }}</option>
                                <option value="manual">{{ __('messages.manual') }}</option>
                            </select>
                        </div>
                        <div class="car-listing-dropdown">
                            <span class="sort-icon">≡</span>
                            <select id="sort-filter" class="car-listing-form-select">
                                <option value="">{{ __('messages.sort_by') }}</option>
                                <option value="low_to_high">{{ __('messages.price_(low_to_high)') }}</option>
                                <option value="high_to_low">{{ __('messages.price_(high_to_low)') }}</option>
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
                            {{ __('messages.load_more') }}
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
