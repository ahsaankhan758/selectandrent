@if (count($cars) == 0)
    <p class="text-center">No cars found in this category.</p>
@else
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="custom-card2 p-3 shadow-sm rounded">
                    <a href="{{ url('/cardetail/' . $car->id) }}" class="link text-decoration-none">
                        <img src="{{ asset('storage/' . $car->thumbnail) }}"
                            class="custom-card-img img-fluid mb-2 rounded" alt="Car Image">
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
                                <img src="{{ asset($companyProfile ?? 'frontend-assets/assets/customeruser.png') }}"
                                    alt="Company Logo" width="40" height="40" class="rounded-circle"
                                    style="object-fit: cover;">
                            </div>
                        </div>

                        <hr class="my-2">

                        <div class="d-flex justify-content-between text-center mb-2">
                            <div class="flex-fill">
                                <h6 class="mb-1" style="font-size: 13px;">{{ __('messages.mileage') }}</h6>
                                <p class="mb-0" style="font-size: 14px;"><i
                                        class="fas fa-tachometer-alt me-1"></i>{{ $car->mileage }}</p>
                            </div>
                            <div class="flex-fill">
                                <h6 class="mb-1" style="font-size: 13px;">{{ __('messages.deposit') }}</h6>
                                <p class="mb-0" style="font-size: 14px;">{{ convertPrice($car->advance_deposit, 0) }}
                                </p>
                            </div>
                            <div class="flex-fill">
                                <h6 class="mb-1" style="font-size: 13px;">{{ __('messages.min') }}</h6>
                                <p class="mb-0" style="font-size: 14px;"><i
                                        class="fa-solid fa-user me-1"></i>{{ $car->min_age }}</p>
                            </div>
                        </div>

                        <hr class="my-2">

                        <div class="d-flex justify-content-between align-items-center bg-light rounded px-2 py-1">
                            <h6 class="card_orange_clr mb-0">
                                {{ convertPrice($car->rent, 0) }}/{{$car->rent_type}}</h6>
                            @if (auth()->check())
                                <button class="book-btn" data-carid="{{ $car->id }}"
                                    id="car-booking-btn">{{ __('messages.Book') }}</button>
                            @else
                                <button class="book-btn" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

{{-- old code --}}
{{-- <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 car-card-item" data-category="{{ $car->car_category_id }}">
            <div class="custom-card2">
                <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                    <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img" alt="Car Image">
                </a>
                <div class="card-content">
                    <div class="d-flex justify-content-between bg-light align-items-center rounded">
                        <h6 class="car-price">{{ convertPrice($car->rent, 0) }}/{{ __('messages.Day') }}</h6>
                        @if (auth()->check())
                        <button class="book-btn" data-carid="{{ $car->id }}" id="car-booking-btn">{{ __('messages.Book') }}</button>
                        @else
                        <button class="book-btn" data-bs-toggle="modal" data-bs-target="#loginModal">{{ __('messages.Book') }}</button>
                        @endif
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
        </div> --}}
