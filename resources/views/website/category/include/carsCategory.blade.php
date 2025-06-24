@if(count($cars) == 0)
    <p class="text-center">No cars found in this category.</p>
@else
    @foreach($cars as $car)
        <div class="col-md-4 col-lg-3 car-card-item" data-category="{{ $car->car_category_id }}">
            <div class="car-card">
                <a href="{{ route('car.detail', $car->id) }}" class="link position-relative" style="display: inline-block;">
                    @php
                        $path = public_path('storage/' . $car->thumbnail);
                        $imageExists = $car->thumbnail && file_exists($path);
                    @endphp

                    @if ($imageExists)
                        <img src="{{ asset('storage/' . $car->thumbnail) }}" class="custom-card-img" alt="Car Image">
                    @else
                        <img src="{{ asset('images/no-image.png') }}" class="custom-card-img" alt="No Image Available">
                    @endif

                    @if ($car->is_booked == 1)
                        <div style="position: absolute;top: 0; left: 0;background: var(--text-orange);color: white;padding: 5px 10px;font-weight: bold;font-size: 14px;z-index: 10;">{{__('messages.currently_booked')}}</div>
                    @endif
                </a>
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
