@foreach ($cars as $car)
    <div class="col-md-4 col-lg-3 car-card-item" data-category="{{ $car->car_category_id }}">
        <div class="car-card">
            <img src="{{ asset('storage/' . $car->thumbnail) }}" alt="image">
            <div class="card-body">
                <h6>{{ $car->car_categories->name }}</h6>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="vehicles mb-0">{{ $car->car_models->name }}</p>
                    <a href="{{ url('/cardetail/' . $car->id) }}" style="text-decoration: none; color:black;">
                        <div class="arrow-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </a>                    
                </div>
            </div>
        </div>
    </div>
@endforeach

