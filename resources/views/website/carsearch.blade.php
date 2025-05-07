@extends('website.layout.master')
@section('title')
{{ __('messages.Car_Search') }} | {{ __('messages.Select and Rent') }}
@endsection

@section('content')
<script src="{{ asset('/frontend-assets/assets/Js/carSearch.js') }}"></script>
<div class="container">
    <div class="row">
        <!-- car-listing-sidebar -->
        <div class="col-md-3 car-listing-sidebar">
            <div class="filters p-3">
                <div class="brand-section">
                <input type="text" class="form-control car-input-box" placeholder="From address">
                <input type="text" class="form-control car-input-box" placeholder="To Address">
                <select class="form-control car-input-box">
                    <option>{{ __('messages.Select') }}</option>
                </select>
                <input type="date" class="form-control car-input-box">
                <input type="time" class="form-control car-input-box">
                </div>
                <div class="brand-section">
                    <h5 class="brand-title">{{ __('messages.All Brands') }} (2376)</h5>
                    <div class="brand-list">
                        <button class="brand-btn active">Toyota (123)</button>
                        <button class="brand-btn">Nissan (23)</button>
                        <button class="brand-btn">Mercedes (467)</button>
                        <button class="brand-btn">Hyundai (467)</button>
                        <button class="brand-btn">Audi (123)</button>
                        <button class="brand-btn">Datsun (23)</button>
                    </div>

                    <button class="btn find-car-btn btn-dark-blue-clr">{{ __('messages.Find_Car') }}</button>

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
                    {{-- <span id="current-count">8</span> of {{ $totalCars }} results --}}
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
            <div class="row">
                @foreach ($cars as $car)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-4 mb-4 car-card-item" data-category="{{ $car->car_category_id }}">
                        <div class="custom-card2">
                            <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                                <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img" alt="Car Image">
                            </a>
                            <div class="card-content">
                                <div class="d-flex justify-content-between bg-light align-items-center rounded">
                                    <h6 class="car-price">${{ $car->rent }}/{{ __('messages.Day') }}</h6>
                                    <button class="book-btn" data-carid="{{ $car->id }}" id="car-booking-btn">{{ __('messages.Book') }}</button>
                                </div>
                                <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                                    <h6 class="text-dark mt-2">{{ $car->car_categories->name ?? 'Unknown Category' }}</h6>
                                    <h5 class="text-muted mt-1">{{ $car->car_models->name ?? 'Unknown Model' }}</h5>
                                    <div class="d-flex justify-content-between mt-4">
                                        <div class="icon-text" style="font-size: 12px;">
                                            <img src="{{ asset('/') }}frontend-assets/icons/Iconly.png" alt="Car" width="20px">
                                            {{ $car->weight ?? 'N/A' }} {{ __('messages.kg') }}
                                        </div>
                                        <div class="icon-text" style="font-size: 12px;">
                                            <img src="{{ asset('/') }}frontend-assets/icons/Iconly-v.png" alt="Car" width="20px">
                                            {{ $car->mileage ?? 'N/A' }} {{ __('messages.km') }}
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <div class="icon-text" style="font-size: 12px;">
                                            <img src="{{ asset('/') }}frontend-assets/icons/Iconly-u.png" alt="Car" width="20px">
                                            {{ $car->seats ?? 'N/A' }} {{ __('messages.Seater') }}
                                        </div>
                                        <div class="icon-text" style="font-size: 12px;">
                                            <img src="{{ asset('/') }}frontend-assets/icons/Iconly-s.png" alt="Car" width="20px">
                                            {{ ucfirst($car->transmission ?? 'N/A') }}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>    
        </div>
    </div>
</div>

<script>
    var carListingRoute = "{{ route('car.listing') }}";
</script>

@endsection