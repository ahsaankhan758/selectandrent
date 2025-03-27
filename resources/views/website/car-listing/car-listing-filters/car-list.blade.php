@foreach($cars as $car)
<div class="col-sm-6 col-md-6 col-lg-4 mb-5 car-item">
    <div class="car-listing-card">
        <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
        <img src="{{ asset('storage/' . $car->thumbnail) }}" alt="{{ $car->car_models->name ?? 'Car Image' }}" class="listing-car-image mb-2">
        </a>
        <div class="car-info">
            <div class="d-flex justify-content-between bg-light align-items-center rounded">
                <h6 class="car-price">${{ $car->rent }}/day</h6>
                <button class="book-btn" onclick="window.location.href='#'">Book</button>
            </div>
            <a href="{{ url('/cardetail/' . $car->id) }}" class="link">
            <h5 class="car-name">{{ $car->car_models->name ?? 'Unknown Model' }}</h5>
            
            <div class="car-details">
                <div class="detail-item">
                    <img src="{{ asset('/') }}company-assets/icons/Iconly.png" alt="Car Image" width="20px">
                    {{ $car->weight }} kg
                </div>
                <div class="detail-item">
                    <img src="{{ asset('/') }}company-assets/icons/Iconly-v.png" alt="Car Image" width="20px">
                    {{ $car->seats }} Sitze
                </div>
                <div class="detail-item">
                    <img src="{{ asset('/') }}company-assets/icons/Iconly-u.png" alt="Car Image" width="20px">
                    {{ $car->mileage }} km
                </div>
                <div class="detail-item">
                    <img src="{{ asset('/') }}company-assets/icons/Iconly-s.png" alt="Car Image" width="20px">
                    {{ ucfirst($car->transmission) }}
                </div>
            </div>
        </a>
            {{-- <button onclick="window.location.href='{{ url('/cardetail/' . $car->id) }}'" class="details-btn rounded-pill">
                Details
            </button>             --}}
        </div>
    </div>
</div>
@endforeach