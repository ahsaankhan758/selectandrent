@extends('website.layout.master')
@section('title')
Car Search | Select and Rent
@endsection

@section('content')

<div class="container">
    <div class="row">
        <!-- car-listing-sidebar -->
        <div class="col-md-3 car-listing-sidebar">
            <div class="filters p-3">
                <div class="brand-section">
                <input type="text" class="form-control car-input-box" placeholder="From address">
                <input type="text" class="form-control car-input-box" placeholder="To Address">
                <select class="form-control car-input-box">
                    <option>Select</option>
                </select>
                <input type="date" class="form-control car-input-box">
                <input type="time" class="form-control car-input-box">
                </div>
                <div class="brand-section">
                    <h5 class="brand-title">All Brands (2376)</h5>
                    <div class="brand-list">
                        <button class="brand-btn active">Toyota (123)</button>
                        <button class="brand-btn">Nissan (23)</button>
                        <button class="brand-btn">Mercedes (467)</button>
                        <button class="brand-btn">Hyundai (467)</button>
                        <button class="brand-btn">Audi (123)</button>
                        <button class="brand-btn">Datsun (23)</button>
                    </div>

                    <button class="btn find-car-btn btn-dark-blue-clr">Find Car</button>

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
                        <option value="">All Cars</option>
                        <option value="auto">Auto</option>
                        <option value="manual">Manual</option>
                    </select>
                    
                </div>
                <div class="car-listing-dropdown">
                    <span class="sort-icon">≡</span>
                    <select id="sort-filter" class="car-listing-form-select">
                        <option value="">Sort By</option>
                        <option value="low_to_high">Price (Low to High)</option>
                        <option value="high_to_low">Price (High to Low)</option>
                    </select>
                </div>
            </div>
        </div>


        <!-- Car Listing Grid -->
        <div class="row" id="car-list">
            {{-- @include('website.car-listing.car-listing-filters.car-list', ['cars' => $cars]) --}}
        </div>
        <div class="text-center mb-5">

        {{-- @if($totalCars > 8)
        <button class="load-more-btn btn btn-orange-clr text-white" 
        data-target="car-list" 
        data-url="{{ route('load.more.cars') }}" 
        data-offset="8" 
        data-total="{{ $totalCars }}" 
        data-model="Car">
        Load More
        </button>
    
        @endif --}}
        </div>  
                  
            
        </div>
    </div>
</div>

<script>
    var carListingRoute = "{{ route('car.listing') }}";
</script>

@endsection