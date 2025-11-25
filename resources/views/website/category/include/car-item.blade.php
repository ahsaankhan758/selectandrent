@if (count($cars) == 0)
    <p class="text-center">No cars found in this category.</p>
@else
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4">
                <div class="custom-card2 p-3 shadow-sm rounded position-relative">
                    <a href="{{ route('car.detail', $car->id) }}" class="stretched-link"></a>
                    @php
                        $path = public_path('storage/' . $car->thumbnail);
                        $imageExists = $car->thumbnail && file_exists($path);
                    @endphp
                    <div class="position-relative">
                        <img src="{{ $imageExists ? asset('storage/' . $car->thumbnail) : asset('images/no-image.png') }}"
                            class="custom-card-img-2" alt="Car Image">
                        @if ($car->is_booked == 1)
                            <div
                                style="position: absolute; top: 0; left: 0; background: var(--text-orange); color: white; padding: 5px 10px; font-weight: bold; font-size: 14px; z-index: 10;">
                                {{ __('messages.currently_booked') }}
                            </div>
                        @endif
                    </div>

                    <div class="card-content">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <h5 class="card_orange_clr mb-1" style="font-weight: 600;">
                                    {{ $car->car_models->car_brands->name ?? '' }}
                                    {{ $car->car_models->name ?? '' }}
                                    {{ $car->year ?? '' }}
                                </h5>
                                <h6 class="text-muted mb-0" style="font-size: 12px;">
                                    {{ ucfirst($car->transmission) }}
                                    | {{ $car->fuel_type }}
                                    | {{ __('messages.engine') }} {{ $car->engine_size }}
                                    {{ __('messages.cc') }}  
                                </h6>
                            </div>

                            <div class="ms-2 position-relative" style="z-index: 10;">
                                @php
                                    $companyProfile = $car->users->companies->company_profile ?? null;
                                @endphp
                                <img src="{{ asset($companyProfile ?? 'frontend-assets/assets/customeruser.png') }}"
                                    alt="Company Logo" width="40" height="40" class="rounded-circle"
                                    style="object-fit: cover; cursor: default;">
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

                        <div class="d-flex justify-content-between align-items-center bg-light rounded px-2 py-1 position-relative"
                            style="z-index: 10;">
                            <h6 class="card_orange_clr mb-0">
                                {{ convertPrice($car->rent, 0) }}/{{ ucfirst($car->rent_type) }}
                            </h6>
                            <a href="{{ route('car.detail', $car->id) }}" class="link position-relative" style="display: inline-block;">
                                        <button class="book-btn">{{ __('messages.Book') }}</button>
                                        </a>
                            {{-- @if (auth()->check())
                                <button class="book-btn" data-carid="{{ $car->id }}" id="car-booking-btn">
                                    {{ __('messages.Book') }}
                                </button>
                            @else
                                <button class="book-btn" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    {{ __('messages.Book') }}
                                </button>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
