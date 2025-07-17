{{-- @foreach($cars as $car)
    <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
        <div class="car-listing-card">

            @php
                $path = public_path('storage/' . $car->thumbnail);
                $imageExists = $car->thumbnail && file_exists($path);
            @endphp

            @if ($imageExists)
                <img src="{{ asset('storage/' . $car->thumbnail) }}" alt="{{ $car->car_models->name ?? 'Car Image' }}" class="listing-car-image mb-2">
            @else
                <img src="{{ asset('images/no-image.png') }}" class="listing-car-image mb-2" alt="No Image Available">
            @endif

            @if ($car->is_booked == 1)
                <div style="position: absolute;top: 0; left: 0;background: var(--text-orange);color: white;padding: 5px 10px;font-weight: bold;font-size: 14px;z-index: 10;">{{__('messages.currently_booked')}}</div>
            @endif
           
            
            <div class="car-info">
                <div class="d-flex justify-content-between bg-light align-items-center rounded">
                     <h6 class="car-price">{{ convertPrice($car->rent, 0)  }}/{{ __('messages.day') }}</h6>
                    @if(auth()->check())
                    <button class="book-btn" data-carid="{{ $car->id }}" id="car-booking-btn">{{ __('messages.Book') }}</button>
                    @else
                    <button class="book-btn" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                    @endif
                </div>
                
                <h5 class="car-name">{{ $car->car_models->name ?? 'Unknown Model' }}</h5>
                
                <div class="car-details">
                    <div class="detail-item">
                        <img src="{{ asset('/') }}frontend-assets/icons/Iconly.png" alt="Car Image" width="20px">
                        {{ $car->weight }}  {{ __('messages.kg') }}
                    </div>
                    <div class="detail-item">
                        <img src="{{ asset('/') }}frontend-assets/icons/Iconly-v.png" alt="Car Image" width="20px">
                        {{ $car->seats }} {{ __('messages.seats') }} 
                    </div>
                    <div class="detail-item">
                        <img src="{{ asset('/') }}frontend-assets/icons/Iconly-u.png" alt="Car Image" width="20px">
                        {{ $car->mileage }} {{ __('messages.km') }}
                    </div>
                    <div class="detail-item">
                        <img src="{{ asset('/') }}frontend-assets/icons/Iconly-s.png" alt="Car Image" width="20px">
                        {{ ucfirst($car->transmission) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach --}}
@foreach($cars as $car)
<div class="col-sm-6 col-md-6 col-lg-6 mb-4">
    <div class="custom-card2 p-3 shadow-sm rounded">
        <a href="{{ url('/cardetail/' . $car->id) }}" class="link text-decoration-none">
            <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img-2 img-fluid mb-2 rounded" alt="Car Image">
        </a>
        <div class="card-content">
            <div class="d-flex justify-content-between align-items-start mb-2">
                <div>
                    <h5 class="card_orange_clr mb-1" style="font-weight: 600;">
                        {{ $car->car_models->car_brands->name ?? '' }}
                        {{ $car->car_models->name ?? '' }}
                        {{ $car->year ?? '' }}
                    </h5>
                    <h6 class="text-muted mb-0" style="font-size: 12px;">
                        {{ __('messages.engine') }} {{ $car->engine_size }}
                        {{ __('messages.cc') }} | {{ ucfirst($car->transmission) }} | {{ $car->fuel_type }}
                    </h6>
                </div>
                <div class="ms-2">
                    @php
                        $companyProfile = $car->users->companies->company_profile ?? null;
                    @endphp
                    <img src="{{ asset($companyProfile ?? 'frontend-assets/assets/customeruser.png') }}" alt="Company Logo" title="{{ optional($car->users->companies)->name ?? optional($car->users)->name }}"
                         width="40" height="40" class="rounded-circle" style="object-fit: cover;">
                </div>
            </div>

            <hr class="my-2">

            <div class="d-flex justify-content-between text-center mb-2">
                <div class="flex-fill">
                    <h6 class="mb-1" style="font-size: 13px;">{{ __('messages.mileage') }}</h6>
                    <p class="mb-0" style="font-size: 14px;"><i class="fas fa-tachometer-alt me-1"></i>{{ $car->mileage }}</p>
                </div>
                <div class="flex-fill">
                    <h6 class="mb-1" style="font-size: 13px;">{{ __('messages.deposit') }}</h6>
                    <p class="mb-0" style="font-size: 14px;">{{ convertPrice($car->advance_deposit, 0) }}</p>
                </div>
                <div class="flex-fill">
                    <h6 class="mb-1" style="font-size: 13px;">{{ __('messages.min') }}</h6>
                    <p class="mb-0" style="font-size: 14px;"><i class="fa-solid fa-user me-1"></i>{{ $car->min_age }}</p>
                </div>
            </div>

            <hr class="my-2">

            <div class="d-flex justify-content-between align-items-center bg-light rounded px-2 py-1">
                <h6 class="card_orange_clr mb-0">{{ convertPrice($car->rent, 0) }}/{{ucfirst($car->rent_type)}}</h6>
                @if (auth()->check())
                    <button class="book-btn" data-carid="{{ $car->id }}" id="car-booking-btn">{{ __('messages.Book') }}</button>
                @else
                    <button class="book-btn" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach