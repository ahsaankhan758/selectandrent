@if ($cartItems->count() > 0)
    <div class="container">
        <a class="text-right" href="{{ route('clear.cart') }}">{{ __('messages.Clear_Cart') }} ({{ $cartItemsCount }})</a>
    </div>
    <!-- Order Confirmation form -->
    <form id="bookingForm" action="{{ route('booking.confirmation') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @foreach ($cartItems as $cart)
            <div class="container mt-4 row cart-item" data-row-id="{{ $cart->rowId }}" data-price="{{ $cart->price }}" data-rent-type="{{ $cart->options->rent_type }}">

                <div class="row g-3">
                    <!-- Pickup Location -->
                    <div class="col-md-3">
                        <label class="form-label">{{ __('messages.Pickup Location') }}</label>

                        @php
                            $selectedPickup = $cart->options->vehicle_pickup_location ?? null;
                            $selectedLocationId = null;

                            if (!empty($vehicleLocation) && $selectedPickup) {
                                foreach ($vehicleLocation as $location) {
                                    if ($location->area_name === $selectedPickup) {
                                        $selectedLocationId = $location->id;
                                        break;
                                    }
                                }
                            }
                        @endphp

                        <select name="pickup_location[]" class="form-select validate-pickup"
                            @if ($selectedPickup) disabled @endif>
                            <option disabled {{ !$selectedPickup ? 'selected' : '' }}>
                                {{ __('messages.Select Location') }}
                            </option>

                            @foreach ($vehicleLocation ?? [] as $location)
                                <option value="{{ $location->id }}"
                                    {{ $selectedPickup === $location->area_name ? 'selected' : '' }}>
                                    {{ $location->area_name }}
                                </option>
                            @endforeach
                        </select>

                        @if ($selectedPickup && $selectedLocationId)
                            <input type="hidden" name="pickup_location[]" value="{{ $selectedLocationId }}">
                        @endif
                    </div>



                    <!-- Dropoff Location -->
                    <div class="col-md-3">
                        <label class="form-label">{{ __('messages.Dropoff Location') }}</label>
                        <select name="dropoff_location[]" class="form-select">
                            <option selected disabled>{{ __('messages.Select Location') }}</option>
                            @if (isset($vehicleLocation) && !empty($vehicleLocation))
                                @foreach ($vehicleLocation as $location)
                                    <option value="{{ $location->id }}">{{ $location->area_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>


                    <!-- Pickup Date & Time -->
                    <div class="col-md-3">
                        <label class="form-label">{{ __('messages.Pickup_Date_time') }}</label>
                        <div class="input-group">
                            <input type="datetime-local" name="pickup_datetime[]"
                                class="form-control time-input pickup-time">
                        </div>
                    </div>

                    <!-- Drop-off Date & Time -->
                    <div class="col-md-3">
                        <label class="form-label">{{ __('messages.Drop-off_Date_time') }}</label>
                        <div class="input-group">
                            <input type="datetime-local" name="dropoff_datetime[]"
                                class="form-control time-input dropoff-time">
                        </div>
                    </div>

                    <!-- data for submit -->
                    <input type="hidden" name="vehicleId[]" value="{{ $cart->id }}">
                    <input type="hidden" class="get-price-{{ $cart->rowId }}" name="item_price[]"
                        value="{{ $cart->subtotal }}">
                    <input type="hidden" name="price_per_day[]" value="{{ convertPrice($cart->price,0,0) }}">
                    <input type="hidden" class="get-duration-{{ $cart->rowId }}" name="duration[]"
                        value="{{ $cart->qty }}">
                    <!-- end form submit -->
                    <!-- Display Difference -->
                    <!-- <div class="col-md-3 mt-3">
                <p class="time-difference"></p>
                <p class="calculated-price"></p>
            </div> -->


                </div>

            </div>
            <!-- CAR DETAIL -->
            <div class="container py-3">
                <div class="vehicle-card d-flex mobile-car">
                    <ul class="col-md-6">{{ __('messages.Vehicle Info') }}</ul>
                    <ul class="col-md-2">{{ __('messages.Price') }}</ul>
                    <ul class="col-md-2">@if($cart->options->rent_type == 'day')
                                            {{ __('messages.Days') }}
                                        @else
                                            {{ __('messages.hours') }}
                                        @endif
                                        </ul>
                    <ul class="col-md-2">{{ __('messages.action') }}</ul>
                </div>
            </div>
            <div class="container">
                <div class="row d-flex py-2">
                    <div class="col-md-3">

                        <img src="{{ asset(Storage::url($cart->options->thumbnail)) }}" class="car-order-img"
                            alt="{{ $cart->options->car_model ?? 'thumbnail' }}">

                    </div>
                    <div class="col-md-3 align-items-center">
                        <div class="stars text-warning">
                            @for ($i = 1; $i <= 5; $i++)
                                @if ($i <= floor($averageRating))
                                    <i class="fas fa-star text-warning"></i>
                                @elseif ($i == ceil($averageRating) && fmod($averageRating, 1) != 0)
                                    <i class="fas fa-star-half-alt text-warning"></i>
                                @else
                                    <i class="far fa-star text-warning"></i>
                                @endif
                            @endfor
                        </div>
                        <span class="vehicle-title text-capitalize">{{ $cart->options->car_brand }}
                            {{ $cart->name }}</span>
                        <p class="car-model-text text-capitalize">{{ $cart->options->year }},
                            {{ $cart->options->car_category }}</p>

                        <p class="fw-bold text-capitalize">{{ $cart->options->vehicle_city }}</p>
                        <p class="fw-bold text-capitalize">{{ convertPrice($cart->price, 0) }} / {{ ucfirst($cart->options->rent_type) }}</p>


                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
            </div>
            <div class="container py-2">
                <div class="row d-flex">
                    <div class="col-md-6">
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.Seats') }}:</strong>
                            {{ $cart->options->seats }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.weight') }}:</strong>
                            {{ $cart->options->weight }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.Doors') }}:</strong>
                            {{ $cart->options->doors }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.Mileage') }}:</strong>
                            {{ $cart->options->mileage }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.Vehicle Id') }}:</strong>
                            {{ $cart->options->lisence_plate }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.Postal Code') }}:</strong>
                            {{ $cart->options->postal_code }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.transmission') }}:</strong>
                            {{ $cart->options->transmission }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.engine size') }}:</strong>
                            {{ $cart->options->engine_size }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.Exterior Color') }}:</strong>
                            {{ $cart->options->exterior_color }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.Interior Color') }}:</strong>
                            {{ $cart->options->interior_color }}</div>
                        <div class="mb-2 text-capitalize"><strong>{{ __('messages.radius') }}:</strong><span
                                id="getRadius{{ $cart->rowId }}">0M</span></div>
                        <!-- Checkbox -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="confirmOrderCheck">
                            <label class="form-check-label" for="confirmOrderCheck">
                                {{ __('messages.min') }} {{ $cart->options->min_age }}
                            </label>
                        </div>
                    </div>
                    <div class="col-md-2 mobile-car">
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-2 text-capitalize d-flex">
                            <h6 class="showNewPrice{{ $cart->rowId }}">
                                {{ convertPrice($cart->price * $cart->qty, 0) }}</h6>
                        </div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"> </div>
                    </div>
                    <div class="col-md-2 mobile-car">
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-2 d-flex">
                            <h6 class="showDuration{{ $cart->rowId }}">{{ $cart->qty }}</h6>
                            <h6>
                                @if($cart->options->rent_type == 'day')
                                    {{ __('messages.Days') }}
                                @else
                                    {{ __('messages.hours') }}
                                @endif
                            </h6>
                        </div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"></div>
                    </div>
                    <div class="col-md-2 mobile-car">
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-3 empty-box"> </div>
                        <div class="mb-2"><a href="javascript::void();" class="remove-btn"
                                data-rowid="{{ $cart->rowId }}"><i class="fa fa-trash text-danger"></i></a></div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"> </div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"></div>
                        <div class="mb-2 empty-box"></div>
                    </div>
                </div>
            </div>
        @endforeach

        <input type="hidden" name="subtotal[]" class="get-subtotal" value="{{ $subtotal }}">
        <input type="hidden" name="tax[]" class="get-tax" value="{{ $tax }}">
        <input type="hidden" name="total[]" class="get-total" value="{{ $totalPriceIncludingTax }}">
        <div class="container my-3">
            <div class="row justify-content-center align-items-center g-3">
                <!-- Subtotal Box -->
                <div class="col-md-3 col-6">
                    <div class="box">
                        <div><strong>{{ __('messages.Subtotal') }}</strong></div>
                        <div class="price-car calculate-subtotal">{{ convertPrice($subtotal, 0) }}</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="box">
                        <div><strong>{{ __('messages.tax') }}</strong></div>
                        <div class="price-car calculate-tax">{{ convertPrice($tax, 0) }}</div>
                    </div>
                </div>
                <!-- Total Box -->
                <div class="col-md-3 col-6">
                    <div class="box">
                        <div><strong>{{ __('messages.Total') }}</strong></div>
                        <div class="price-car calculate-total">{{ convertPrice($totalPriceIncludingTax, 0) }}</div>
                    </div>
                </div>
                <!-- Order Confirmation form -->
                <div class="col-md-3 col-12">
                    {{-- @if (auth()->check())
            <button id="submitBtn" class="btn-order btn-orange-clr">
                {{ __('messages.Order Confirmation') }}
            </button>
        @else
        <a href="javascript::void(0)" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn-order btn-orange-clr">
                {{ __('messages.Order Confirmation') }}
        </a>
        @endif --}}
                    <!-- Order Confirmation Button -->
                    @if (auth()->check())
                        <button id="submitBtn" class="btn-order btn-orange-clr opacity-50" disabled>
                            {{ __('messages.Order Confirmation') }}
                        </button>
                    @else
                        <a href="javascript:void(0);" id="submitBtn"
                            class="btn-order btn-orange-clr mt-3 opacity-50 disabled-link" data-bs-toggle="modal"
                            data-bs-target="#loginModal" style="text-decoration: none; pointer-events: none;">
                            {{ __('messages.Order Confirmation') }}
                        </a>
                    @endif
                </div>
            </div>
        </div>

    </form>
@else
    <div class="row">
        <div class="col-md-12 text-center pt-5 bp-5">
            <p>{{ __('messages.No_car_found_in_your_cart') }}</p>
            <a href="{{ route('car.listing') }}"
                class="btn btn-orange-clr text-white">{{ __('messages.Car_Listing') }}</a>
        </div>
    </div>

@endif
<!-- END CAR DETAIL -->
<div class="container py-3">
    <div class="row">
        <!--book Section -->
        <div class="col-md-12 mb-4">
            <h4 class="section-title"><span></span>{{ __('messages.A Special Note to Our Car Rental Partners') }}</h4>
            <p class="text-size">
                {{ __('messages.At SelectandRent, we value our partnership with car rental companies like yours. Together, we aim to redefine the car rental experience for customers worldwide. Our platform is built to support your growth, offering tools to showcase your fleet, connect with a broader audience, and streamline your operations') }}.<br>
                {{ __('messages.Your success is our priority, and we’re here to help you reach new heights with innovative technology, insightful analytics, and dedicated support. Thank you for trusting us to be a part of your journey. Let’s drive forward, together') }}
                !</p>
        </div>
    </div>
</div>
<script>
    // Prepare cars from backend (Blade)
    const cartCars = [
        @foreach ($cartItems as $cart)
            {
                rowId: '{{ $cart->rowId }}',
                lat: {!! json_encode($cart->options->vehicle_latitude) !!},
                lon: {!! json_encode($cart->options->vehicle_longitude) !!}
            }
            @if (!$loop->last)
                ,
            @endif
        @endforeach
    ];

    // Get user's location
    navigator.geolocation.getCurrentPosition(handleLocationSuccess, handleLocationError);

    function handleLocationSuccess(position) {
        const userLat = position.coords.latitude;
        const userLon = position.coords.longitude;

        cartCars.forEach(car => {
            fetchRouteDistance(userLat, userLon, car.lat, car.lon, car.rowId);
        });
    }

    function handleLocationError(err) {
        console.error("Geolocation error:", err);
    }

    function fetchRouteDistance(userLat, userLon, carLat, carLon, rowId) {
        const apiKey = '5b3ce3597851110001cf6248c2f382b55a5c4f1c8b1c0d73ff71a65e';
        const url = 'https://api.openrouteservice.org/v2/directions/driving-car/geojson';

        const requestBody = {
            coordinates: [
                [userLon, userLat], // Origin
                [carLon, carLat] // Destination
            ]
        };

        fetch(url, {
                method: 'POST',
                headers: {
                    'Authorization': apiKey,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(requestBody)
            })
            .then(response => response.json())
            .then(data => {
                const distanceMeters = data?.features?.[0]?.properties?.summary?.distance || 0;
                const distanceKm = (distanceMeters / 1000).toFixed(2);
                console.log(`Distance to car ${rowId}: ${distanceKm} KM`);
                document.getElementById(`getRadius${rowId}`).innerHTML = `${distanceKm} KM`;
            })
            .catch(error => {
                console.error(`Error fetching route for car ${rowId}:`, error);
            });
    }
</script>
<style>
    .opacity-50 {
        opacity: 0.5;
        pointer-events: none;
    }

    .opacity-100 {
        opacity: 1;
        pointer-events: auto;
    }
</style>
<script>
    $(document).ready(function() {
        const checkbox = $('#confirmOrderCheck');
        const submitBtn = $('#submitBtn');

        checkbox.on('change', function() {
            if (this.checked) {
                submitBtn.removeClass('opacity-50').addClass('opacity-100');
                submitBtn.prop('disabled', false);
                submitBtn.css('pointer-events', 'auto'); 
            } else {
                submitBtn.removeClass('opacity-100').addClass('opacity-50');
                submitBtn.prop('disabled', true);
                submitBtn.css('pointer-events', 'none');
            }
        });
    });
</script>
