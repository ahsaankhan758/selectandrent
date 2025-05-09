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
            <h5 class="brand-title">{{ __('messages.All Brands ') }}({{ $totalCars }})</h5>
            
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