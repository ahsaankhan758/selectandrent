@foreach ($cars as $car)
    <div class="col-md-4 col-lg-3 car-card-item" data-category="{{ $car->car_category_id }}">
        <div class="car-card">
            <img src="{{ Storage::url($car->thumbnail) }}" alt="image">
            <div class="card-body">
                <h6>{{ $car->car_categories->name }}</h6>
                <div class="d-flex align-items-center justify-content-between">
                    <p class="vehicles mb-0">{{ $car->car_models->name }}</p>
                    <div class="arrow-icon">
                        <i class="fa-solid fa-arrow-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

