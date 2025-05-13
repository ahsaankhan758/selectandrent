@foreach($cars as $car)
    <div class="col-sm-6 col-md-6 col-lg-4 mb-5">
        <div class="car-listing-card">
            <img src="{{ asset('storage/' . $car->thumbnail) }}" alt="{{ $car->car_models->name ?? 'Car Image' }}" class="listing-car-image mb-2">
            
            <div class="car-info">
                <div class="d-flex justify-content-between bg-light align-items-center rounded">
                     <h6 class="car-price">{{ convertPrice($car->rent, 0)  }}/{{ __('messages.Day') }}</h6>
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
                        {{ $car->seats }} {{ __('messages.Seats') }} 
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
@endforeach
