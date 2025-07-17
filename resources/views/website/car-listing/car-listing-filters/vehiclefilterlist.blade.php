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
<!-- car-listing-sidebar -->
<div class="col-md-3 car-listing-sidebar">
    <div class="filters p-3">
        <div class="filter-section">
            <div class="position-relative">
                <input type="text" id="addressFilter" class="form-control car-input-box" placeholder="{{ __('messages.address') }}">
                <ul id="addressDropdown" class="dropdown-menu w-100" style="display: none;"></ul>
            </div>
            
            <div class="car-listing-dropdown-container mb-2">
                <div id="carModelDropdownBtn" class="dropdown-btn">
                    <span>{{ __('messages.select_a_vehicle_model') }} </span>
                    <i class="dropdown-arrow fas fa-chevron-down"></i>
                </div>
                <div id="carModelDropdownMenu" class="dropdown-menu-custom">
                    <input type="text" id="carModelSearch" class="search-box" placeholder="{{ __('messages.search_vehicle_model') }}...">
                    <ul id="carModelList" class="list-unstyled mb-0">
                        <li class="dropdown-item-custom text-muted">{{ __('messages.loading') }}...</li>
                    </ul>
                </div>
            </div>
        
            <input type="date" id="dateFilter" class="form-control car-input-box">
            <input type="time" id="timeFilter" class="form-control car-input-box" step="1">
        </div>
        
        <!-- Car Listing Container -->
       
        
        <div class="brand-section">
            <h5 class="brand-title">{{ __('messages.all_brands') }} ({{ $totalCars }})</h5>
            
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
                <button id="viewMoreCategories" class="brand-btn">{{ __('messages.view_more') }}</button>
            @endif
            <!-- <button class="btn find-car-btn btn-dark-blue-clr">{{ __('messages.find_vehicle') }}</button> -->
        </div>
    </div>
</div>