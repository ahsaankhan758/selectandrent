@extends('website.layout.master')
@section('title')
Car Listing | Select and Rent
@endsection

@section('content')

<div class="container">
    <div class="row">
        <!-- car-listing-sidebar -->
        <div class="col-md-3 car-listing-sidebar">
            <div class="filters p-3">
                <div class="filter-section">
                    <div class="position-relative">
                        <input type="text" id="addressFilter" class="form-control car-input-box" placeholder="Address">
                        <ul id="addressDropdown" class="dropdown-menu w-100" style="display: none; position: absolute;"></ul>
                    </div>
                                        
                    <div class="position-relative">
                        <div id="carModelDropdownBtn" class="form-control car-input-box">Select a Car Model</div>
                        <div id="carModelDropdownMenu" class="dropdown-menu w-100" style="display: none; max-height: 250px; overflow-y: auto; position: absolute;">
                            <input type="text" id="carModelSearch" class="form-control" placeholder="Search Car Model..." style="margin: 5px;">
                            <ul id="carModelList" class="list-unstyled mb-0">
                                <li class="dropdown-item text-muted">Loading...</li>
                            </ul>
                        </div>
                    </div>
                
                    <input type="date" id="dateFilter" class="form-control car-input-box">
                    <input type="time" id="timeFilter" class="form-control car-input-box" step="1">
                </div>
                
                <!-- Car Listing Container -->
               
                
                <div class="brand-section">
                    <h5 class="brand-title">All Brands ({{ $totalCars }})</h5>
                <div class="brand-list">
                    @foreach ($categories as $category)
                        <button class="brand-btn">{{ $category->name }} ({{ $category->cars_count }})</button>
                    @endforeach
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
                    <span id="current-count">8</span> of {{ $totalCars }} results
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
        Load More
        </button>
    
        @endif
        </div>  
                  
            
        </div>
    </div>
</div>


<script>
    var carListingRoute = "{{ route('car.listing') }}";
    var carListingFilterRoute = "{{ route('get.car.models') }}";
</script>
<script>
    $(document).ready(function () {
    $("#addressFilter").on("keyup", function () {
        let query = $(this).val(); // Get user input

        if (query.length > 0) {
            $.ajax({
                url: "{{ route('search.locations') }}",
                method: "GET",
                data: { query: query },
                success: function (response) {
                    let dropdown = $("#addressDropdown");
                    dropdown.empty(); // Clear previous results

                    if (response.length > 0) {
                        response.forEach(location => {
                            dropdown.append(`<li class="dropdown-item" data-id="${location.id}">${location.city}</li>`);
                        });
                        dropdown.show(); // Show dropdown
                    } else {
                        dropdown.append('<li class="dropdown-item text-muted">No results found</li>');
                        dropdown.show();
                    }
                }
            });
        } else {
            $("#addressDropdown").hide(); // Hide dropdown if input is empty
        }
    });

    // Select city from dropdown
    $(document).on("click", "#addressDropdown .dropdown-item", function () {
        let selectedText = $(this).text();
        let selectedId = $(this).attr("data-id");

        $("#addressFilter").val(selectedText); // Set input value
        $("#addressFilter").attr("data-selected", selectedId); // Store ID
        $("#addressDropdown").hide(); // Hide dropdown
        filterCars(); // Trigger filtering
    });

    // Hide dropdown when clicking outside
    $(document).on("click", function (e) {
        if (!$(e.target).closest(".position-relative").length) {
            $("#addressDropdown").hide();
        }
    });
});

</script>
@endsection