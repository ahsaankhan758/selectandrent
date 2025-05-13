
@if(count($cars) == 0)
    <p class="text-center">No cars found in this category.</p>
@else

<div class="row">
    @foreach ($cars as $car)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4 car-card-item" data-category="{{ $car->car_category_id }}">
            <div class="custom-card2">
                <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
                    <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img" alt="Car Image">
                </a>
                <div class="card-content">
                    <div class="d-flex justify-content-between bg-light align-items-center rounded">
                        <h6 class="car-price">{{ convertPrice($car->rent, 0) }}/{{ __('messages.Day') }}</h6>
                        @if(auth()->check())
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
        </div>
    @endforeach
    </div>
    @endif
    
