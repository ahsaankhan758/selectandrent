
@extends('admin.layouts.Master')
@section('title') {{ __('messages.edit') }} {{ __('messages.vehicle') }} @endsection
@section('content')
    @if (can('vehicles', 'edit'))  
        <style>
            .tooltip-icon {
            position: relative;
            cursor: pointer;
            }

            .tooltip-icon .tooltip-text {
            visibility: hidden;
            background-color: #333;
            color: #fff;
            padding: 6px;
            border-radius: 4px;
            font-size: 12px;
            position: absolute;
            top: -5px;
            left: 20px;
            white-space: nowrap;
            z-index: 1;
            }

            .tooltip-icon:hover .tooltip-text {
            visibility: visible;
            }
        </style>
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.update') }}  {{ __('messages.vehicle') }}</h4>
                    <a href=" {{ route('carListings') }}" class="btn btn-primary float-end" >{{ __('messages.back') }}</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateCar',$car->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <lable for="model">{{ __('messages.model') }}</lable>
                                <select name="model" class="form-control">
                                    <option value="{{ $car->car_models->id }}" selected>{{ ucfirst(strtolower($car->car_models->name)) }}</option>
                                    @if(isset($models))
                                        @foreach ( $models as $modelData)
                                            @if( $modelData->name == $car->car_models->name)
                                            @else
                                                <option value="{{ $modelData->id }}">{{ ucfirst(strtolower($modelData->name)) }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="category">{{ __('messages.category') }}</lable>
                                <select name="category" class="form-control">
                                    <option value="{{ $car->car_categories->id }}" selected>{{ ucfirst(strtolower($car->car_categories->name)) }}</option>
                                    @if(isset($categories))    
                                        @foreach ( $categories as $categoryData)
                                            @if( $categoryData->name == $car->car_categories->name)
                                            @else
                                                <option value="{{ $categoryData->id }}">{{ ucfirst(strtolower($categoryData->name)) }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="location">{{ __('messages.city') }}</lable>
                                <select name="location" class="form-control">
                                    <option value="{{ $car->car_locations->city->id }}" selected>{{ ucfirst(strtolower($car->car_locations->city->name)) }}</option>
                                    @if(isset($locations))    
                                        @foreach ( $locations as $locationData)
                                            @if( $locationData->city->name != $car->car_locations->city->name)
                                                <option value="{{ $locationData->city->id }}">{{ ucfirst(strtolower($locationData->city->name)) }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 form-group mb-3">
                                <label for="location">{{ __('messages.area_name') }}</label>
                                <select name="location" id="location" class="form-control">
                                    @if(isset($locations))
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}"
                                                {{ $car->car_locations->id == $location->id ? 'selected' : '' }}>
                                                {{ ucfirst(strtolower($location->area_name)) }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-3 form-group mb-3">
                                <lable for="fuel_type">{{ __('messages.fuel_type') }}</lable>
                                <input type="text" name="fuel_type" class="form-control" value="{{ $car->fuel_type }}">
                            </div>
                            <div class="col-3 form-group mb-3">
                                <lable for="transmission">{{ __('messages.transmission') }}</lable>
                                <select name="transmission" class="form-control">
                                    @if ($car->transmission == 'auto')
                                        <option value="{{ $car->transmission }}" selected>{{ ucfirst(strtolower($car->transmission)) }}</option>
                                        <option value="manual">{{ __('messages.manual') }}</option>
                                    @else
                                        <option value="{{ $car->transmission }}" selected>{{ ucfirst(strtolower($car->transmission)) }}</option>
                                        <option value="auto">{{ __('messages.auto') }}</option>
                                    @endif
                                </select>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="seats">{{ __('messages.seats') }}</label>
                                <input type="text" name="seats" class="form-control" value="{{ $car->seats }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <lable for="weight">{{ __('messages.weight') }}
                                    <span class="tooltip-icon">
                                    <i >ℹ️</i>
                                    <span class="tooltip-text">{{ __('messages.vehicle_max_weight') }}</span>
                                </span>
                                </lable>
                                <input type="text" name="weight" class="form-control" value="{{ $car->weight }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="doors">{{ __('messages.doors') }}</lable>
                                <input type="text" name="doors" class="form-control" value="{{ $car->doors }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="year">{{ __('messages.year') }}</label>
                                <select name="year" class="form-control" >
                                    <option value="{{ $car->year }}">{{ $car->year }}</option>
                                    @for($year = 1980; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}">{{ $year }}</option> 
                                    @endfor
                                </select>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <lable for="engine_size">{{ __('messages.engine_size') }}</lable>
                                <input type="text" name="engine_size" class="form-control" value="{{ $car->engine_size }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="luggage">{{ __('messages.luggage') }}</lable>
                                <input type="text" name="luggage" class="form-control" value="{{ $car->luggage }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="drive">{{ __('messages.drive') }}</label>
                                <input type="text" name="drive" class="form-control" value="{{ $car->drive }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <lable for="fuel_economy">{{ __('messages.fuel_economy') }}</lable>
                                <input type="text" name="fuel_economy" class="form-control" value="{{ $car->fuel_economy }}">
                            </div>
                            
                            <div class="col-4 form-group mb-3">
                                <label for="exterior_color">{{ __('messages.exterior_color') }}</label>
                                <input type="text" name="exterior_color" class="form-control" value="{{ $car->exterior_color }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="interior_color">{{ __('messages.interior_color') }}</lable>
                                <input type="text" name="interior_color" class="form-control" value="{{ $car->interior_color }}">
                            </div>
                        </div>
                        <div class="row">
                            
                            <div class="col-4 form-group mb-3">
                                <lable for="lisence_plate">{{ __('messages.license_plate') }}</lable>
                                <input type="text" name="lisence_plate" class="form-control" value="{{ $car->lisence_plate }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="rent">{{ __('messages.rent') }}</label>
                                <input type="text" name="rent" class="form-control" value="{{ $car->rent }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="currency">{{ __('messages.currency') }}</label>
                                <select name="currency" class="form-control">
                                    <option value="">{{ __('Select') }}</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->code }}"
                                            @if(isset($car) && $car->currency == $currency->code) selected @endif>
                                            {{ $currency->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            
                        </div>
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <label for="mileage">{{ __('messages.mileage') }}</label>
                                <input type="text" name="mileage" class="form-control" value="{{ $car->mileage }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="advance_deposit">{{ __('messages.deposit') }}</label>
                                <input type="number" name="advance_deposit" id="advance_deposit" class="form-control" placeholder="Enter deposit amount" value="{{ $car->advance_deposit }}">
                            </div>
                            
                            <div class="col-4 form-group mb-3">
                                <label for="rent_type">{{ __('messages.rent_type') }}</label>
                                <select name="rent_type" id="rent_type" class="form-control">
                                    <option disabled {{ empty($car->rent_type) ? 'selected' : '' }}>{{ __('messages.select') }}</option>
                                    <option value="day" {{ (isset($car->rent_type) && $car->rent_type == 'day') ? 'selected' : '' }}>Per Day</option>
                                    <option value="hour" {{ (isset($car->rent_type) && $car->rent_type == 'hour') ? 'selected' : '' }}>Per Hour</option>  
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <label for="min_age">{{ __('messages.min') }}</label>
                                <input type="number" name="min_age" id="min_age" class="form-control" min="18" placeholder="Enter minimum age" value="{{ $car->min_age }}">
                            </div>
                            <div class="col-8 form-group mb-3">
                                <lable for="detail">{{ __('messages.detail') }}</lable>
                                <textarea name="detail" class="form-control">{{ $car->detail }}</textarea>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-3 form-group mb-3">
                                <label for="thumbnail">{{ __('messages.thumbnail') }}</label>
                                <input type="file" name="thumbnail" class="form-control" id="thumbnail" onchange="PreviewThumbnail();">
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="images">
                                    {{ __('messages.images') }} 
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#uploadTemplate" class="ms-2">
                                        <i class="bi bi-info-circle"></i> How to Upload Pictures
                                    </a>
                                </label>

                                <!-- The Modal -->
                                <div class="modal" id="uploadTemplate">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Template For Pictures</h4>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="{{asset('/')}}assets/images/How_to_Upload_Pictures.jpeg" class="img-fluid w-100">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="images[]" class="form-control" id="images" onchange="PreviewImages();" multiple>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="drive">{{ __('messages.status') }}</label>
                                <select name="status" class="form-control">
                                    
                                    @if($car->status == 1)
                                        <option value="1" selected>{{ __('messages.active') }}</option>
                                        <option value="0">{{ __('messages.inactive') }}</option>
                                    @else
                                        <option value="1">{{ __('messages.active') }}</option>
                                        <option value="0" selected>{{ __('messages.inactive') }}</option>
                                    @endif

                                </select>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="drive">{{ __('messages.date') }} {{ __('messages.added') }}</label>
                                <input type="date" name="date_added" class="form-control" id="date_added" value="{{ date('Y-m-d', strtotime($car->date_added)) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-1 col-3">
                                <img src="{{asset('/')}}storage/{{ $car->thumbnail }}" id="uploadThumbnailPreview" class="thumbnail" />
                            </div>
                            <div class="mt-1 col-6" id="currentImagePreview">
                                @if(isset($car->images))
                                    @foreach (unserialize($car->images) as $image)
                                        <img src="{{asset('/')}}storage/{{ $image }}" class="image" />
                                    @endforeach
                                @endif
                            </div>
                            <div class="mt-1 col-6" id="uploadImagePreview">
                                
                            </div>
                        </div>
                            <h4 class="mt-3">{{ __('messages.features') }}</h4>
                            <div class="row mt-4">
                                @if(isset($features))
                                    @foreach ($features as $feature)
                                        <div class="col-2">
                                            <input type="checkbox" name="features[]" value="{{ $feature->name }}" id="{{ $feature->id }}">  
                                            <label for="{{ $feature->id }}" >{{ $feature->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary" id="addCarBtn">{{ __('messages.update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        <script type="text/javascript">
            function PreviewThumbnail() {
                var reader = new FileReader();
                reader.readAsDataURL(document.getElementById("thumbnail").files[0]);
                reader.onload = function (oFREvent) {
                    var preview = document.getElementById("uploadThumbnailPreview");
                    preview.src = oFREvent.target.result;
                    preview.style.display = "block";
                };
            }

            function PreviewImages() {
                var previewContainer = document.getElementById("uploadImagePreview");
                previewContainer.innerHTML = ""; 
                var files = document.getElementById("images").files; 
                if (files.length > 0) {
                    document.getElementById("currentImagePreview").style.display = "none";
                    for (let i = 0; i < files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function (oFREvent) {
                            let img = document.createElement("img");
                            img.src = oFREvent.target.result;
                            img.style.width = "120px";  
                            img.style.height = "120px";
                            img.style.borderRadius = "8px";
                            img.style.margin = "5px";
                            img.style.boxShadow = "0 2px 5px rgba(0, 0, 0, 0.2)";
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(files[i]);
                    }
                }
            }
            document.addEventListener("DOMContentLoaded", function () {
                let features = @json(unserialize($car->features)); 

                features.forEach(feature => {
                    let checkbox = document.querySelector(`input[type="checkbox"][value="${feature}"]`);
                    if (checkbox) {
                        checkbox.checked = true;
                    }
                });
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection


