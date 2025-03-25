@if(count($cars) == 0)
    <p class="text-center">No cars found in this category.</p>
@else
    @foreach($cars as $car)
        <div class="col-md-4 col-lg-3 car-card-item" data-category="{{ $car->car_category_id }}">
            <div class="car-card">
                <img src="{{ asset('storage/' . $car->thumbnail) }}" alt="image">
                <div class="card-body">
                    <h6>{{ $car->car_categories ? $car->car_categories->name : 'N/A' }}</h6>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="vehicles mb-0">{{ $car->car_models ? $car->car_models->name : 'N/A' }}</p>
                        <div class="arrow-icon">
                            <i class="fa-solid fa-arrow-right"></i>
                        </div>
                    </div>                                
                </div>
            </div>
        </div>
    @endforeach   
@endif
