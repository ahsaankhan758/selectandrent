
@extends('admin.layouts.Master')
@section('title') {{ __('messages.add') }} {{ __('messages.vehicle') }} @endsection
@section('content')
    @if (can('vehicles', 'edit'))
        <script>
            window.oldCity = "{{ old('city') }}";
            window.oldLocation = "{{ old('location') }}";
        </script>
        <script src="{{ asset('assets/js/admin/locationArea.js') }}"></script>
        <style>
            .tooltip-icon {
            position: relative;
            cursor: pointer;
            }

            .tooltip-icon .tooltip-text {
            visibility: hidden;
            background-color: #f06115;
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
            .image-tooltip {
                display: none;
                position: absolute;
                background-color: #fff;
                border: 1px solid #ccc;
                padding: 8px;
                z-index: 9999;
                top: 100px; /* adjust as needed */
                left: 200px; /* adjust as needed */
                box-shadow: 0 4px 12px rgba(0,0,0,0.2);
                border-radius: 8px;
            }

            .image-tooltip img {
                max-width: 200px;
                height: auto;
                display: block;
            }
        </style>
        <script>
            window.getLocationsUrl = "{{ url('/get-locations') }}";
        </script>
        
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.add') }} {{ __('messages.vehicle') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeCar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <label for="model">{{ __('messages.model') }}</label>
                                <select name="model" id="model" class="form-control @error('model') is-invalid @enderror" data-live-search = "true">
                                    <option disabled selected>{{ __('messages.select_a_model') }}</option>
                                    @if(isset($models))
                                        @foreach ( $models as $modelData)
                                            <option value="{{ $modelData->id }}" {{ old('model') == $modelData->id ? 'selected' : '' }}>{{ ucfirst(strtolower($modelData->name)) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="category">{{ __('messages.category') }}</lable>
                                <select name="category" class="form-control @error('category') is-invalid @enderror" data-live-search = "true">
                                    <option disabled selected>{{ __('messages.select') }} </option>
                                    @if(isset($categories))
                                        @foreach ( $categories as $categoryData)
                                            <option value="{{ $categoryData->id }}" {{ old('category') == $categoryData->id ? 'selected' : '' }}>{{ ucfirst(strtolower($categoryData->name)) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        <div class="col-4 form-group mb-3">
                                <label for="location">{{ __('messages.city') }}</label>
                                <select name="city" class="form-control @error('city') is-invalid @enderror" id="city">
                                    <option disabled selected>{{ __('messages.select') }}</option>
                                    @if(isset($cities))
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city') == $city->id ? 'selected' : '' }}>{{ ucfirst(strtolower($city->name)) }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 form-group mb-3">
                                <label for="location">{{ __('messages.area_name') }}</label>
                                <select name="location" class="form-control @error('location') is-invalid @enderror" id="location">
                                    <option disabled selected>{{ __('messages.select') }}</option>
                                </select>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="fuel_type">{{ __('messages.fuel_type') }}</label>
                                <select name="fuel_type" class="form-control @error('fuel_type') is-invalid @enderror">
                                    <option disabled selected>{{ __('messages.select') }}</option>
                                    <option value="electric" {{ old('fuel_type') == 'electric' ? 'selected' : '' }}>{{ __('messages.electric') }}</option>
                                    <option value="hybrid" {{ old('fuel_type') == 'hybrid' ? 'selected' : '' }}>{{ __('messages.hybrid') }}</option>
                                    <option value="petrol" {{ old('fuel_type') == 'petrol' ? 'selected' : '' }}>{{ __('messages.petrol') }}</option>
                                    <option value="diesel" {{ old('fuel_type') == 'diesel' ? 'selected' : '' }}>{{ __('messages.diesel') }}</option>
                                    <option value="gasoline" {{ old('fuel_type') == 'gasoline' ? 'selected' : '' }}>{{ __('messages.gasoline') }}</option>
                                    <option value="LPG" {{ old('fuel_type') == 'LPG' ? 'selected' : '' }}>{{ __('messages.lpg') }}</option>
                                </select>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <lable for="transmission">{{ __('messages.transmission') }}</lable>
                                <select name="transmission" class="form-control @error('transmission') is-invalid @enderror">
                                    <option disabled selected>{{ __('messages.select') }}</option>
                                    <option value="auto"{{ old('transmission') == 'auto' ? 'selected' : '' }}>{{ __('messages.auto') }}</option>
                                    <option value="manual"{{ old('transmission') == 'manual' ? 'selected' : '' }}>{{ __('messages.manual') }}</option>
                                </select>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="drive">{{ __('messages.drive') }}</label>
                                <select type="text" name="drive" class="form-control @error('drive') is-invalid @enderror" >
                                    <option disabled selected>{{ __('messages.select') }}</option>
                                    <option value="2 Wheel"{{ old('drive') == '2 Wheel' ? 'selected' : '' }}>{{ __('messages.2_wheel') }}</option>
                                    <option value="4 Wheel"{{ old('drive') == '4 Wheel' ? 'selected' : '' }}>{{ __('messages.4_wheel') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <lable for="weight">{{ __('messages.weight') }}
                                    <span class="tooltip-icon">
                                    <i>ℹ️</i>
                                    <span class="tooltip-text">{{ __('messages.vehicle_max_weight') }}</span>
                                </span>
                                </lable>

                                <input type="text" name="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="doors">{{ __('messages.doors') }}</lable>
                                <input type="text" name="doors" class="form-control @error('doors') is-invalid @enderror" value="{{ old('doors') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="year">{{ __('messages.year') }}</label>
                                <select name="year" class="form-control @error('year') is-invalid @enderror">
                                    <option disabled selected>{{ __('messages.select') }}</option>
                                    @for($year = 1980; $year <= date('Y'); $year++)
                                        <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }}>
                                            {{ $year }}
                                        </option>
                                    @endfor
                                </select>

                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <lable for="engine_size">{{ __('messages.engine_size') }}</lable>
                                <input type="text" name="engine_size" class="form-control @error('engine_size') is-invalid @enderror" value="{{ old('engine_size') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="luggage">{{ __('messages.luggage') }}</lable>
                                <input type="text" name="luggage" class="form-control @error('luggage') is-invalid @enderror" value="{{ old('luggage') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="seats">{{ __('messages.seats') }}</label>
                                <input type="text" name="seats" class="form-control @error('seats') is-invalid @enderror" value="{{ old('seats') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <lable for="fuel_economy">{{ __('messages.fuel_economy') }}</lable>
                                <input type="text" name="fuel_economy" class="form-control @error('fuel_economy') is-invalid @enderror" value="{{ old('fuel_economy') }}">
                            </div>
                            
                            <div class="col-4 form-group mb-3">
                                <label for="exterior_color">{{ __('messages.exterior_color') }}</label>
                                <input type="text" name="exterior_color" class="form-control @error('exterior_color') is-invalid @enderror" value="{{ old('exterior_color') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <lable for="interior_color">{{ __('messages.interior_color') }}</lable>
                                <input type="text" name="interior_color" class="form-control @error('interior_color') is-invalid @enderror" value="{{ old('interior_color') }}">
                            </div>
                        </div>
                        <div class="row">
                        
                            <div class="col-4 form-group mb-3">
                                <lable for="lisence">{{ __('messages.license_plate') }}</lable>
                                <input type="text" name="lisence_plate" class="form-control @error('lisence_plate') is-invalid @enderror" value="{{ old('lisence_plate') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="rent">{{ __('messages.rent') }}</label>
                                <input type="text" name="rent" class="form-control @error('rent') is-invalid @enderror" value="{{ old('rent') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="currency">{{ __('messages.currency') }}</label>
                                <select name="currency" class="form-control @error('currency') is-invalid @enderror">
                                    <option selected disabled>{{ __('messages.select') }}</option>
                                    @foreach($currencies as $currency)
                                        <option value="{{ $currency->code }}" 
                                            {{ old('currency') == $currency->code ? 'selected' : '' }}>
                                            {{ $currency->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="mileage">{{ __('messages.mileage') }}</label>
                                <input type="text" name="mileage" class="form-control @error('mileage') is-invalid @enderror" oninput="formatMileage(this)" value="{{ old('mileage') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 form-group mb-3">
                                <label for="advance_deposit">{{ __('messages.deposit') }}</label>
                                <input type="number" name="advance_deposit" id="advance_deposit" class="form-control @error('advance_deposit') is-invalid @enderror" placeholder="Enter deposit amount" value="{{ old('advance_deposit') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="min_age">{{ __('messages.min') }}</label>
                                <input type="number" name="min_age" id="min_age" class="form-control @error('min_age') is-invalid @enderror" min="18" placeholder="Enter minimum age" value="{{ old('min_age') }}">
                            </div>
                            <div class="col-4 form-group mb-3">
                                <label for="rent_type">{{ __('messages.rent_type') }}</label>
                                <select name="rent_type" id="rent_type" class="form-control @error('rent_type') is-invalid @enderror">
                                    <option disabled>{{ __('messages.select') }}</option>
                                    <option value="day" selected>{{ __('messages.per_day') }}</option>
                                    <option value="hour">{{ __('messages.per_hour') }}</option>  
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group mb-3">
                                <lable for="detail">{{ __('messages.detail') }}</lable>
                                <textarea name="detail" class="form-control @error('detail') is-invalid @enderror">{{ old('detail') }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 form-group mb-3">
                                <label for="thumbnail">{{ __('messages.thumbnail') }}</label>
                                <input type="file" name="thumbnail" class="form-control"  id="thumbnail" onchange="PreviewThumbnail();">
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="images">
                                    {{ __('messages.images') }} 
                                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#uploadTemplate" class="ms-2">
                                        <i class="bi bi-info-circle"></i> 
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
                                                <img src="{{asset('/')}}assets/images/How_to_Upload_Pictures.png" class="img-fluid w-100">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="file" name="images[]" class="form-control" id="images" onchange="PreviewImages()" multiple>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="status">{{ __('messages.status') }}</label>
                                <select name="status" class="form-control">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                        {{ __('messages.active') }}
                                    </option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                        {{ __('messages.inactive') }}
                                    </option>
                                </select>
                            </div>
                            <div class="col-3 form-group mb-3">
                                <label for="drive">{{ __('messages.date') }} {{ __('messages.added') }}</label>
                                <input type="date" name="date_added" class="form-control" id="date_added" value="{{ old('date_added') }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="mt-1 col-3">
                                <img id="uploadThumbnailPreview" style="width: 100px; height: 100px; display: none;" />
                            </div>
                            <div class="mt-1 col-6" id="uploadImagePreview">
                            </div>
                        </div>
                        <h4 class="mt-3">{{ __('messages.features') }}</h4>
                        <div class="row mt-4">
                            @if(isset($features))
                                @foreach ($features as $feature)
                                    <div class="col-2">
                                        <input type="checkbox"
                                            name="features[]"
                                            value="{{ $feature->name }}"
                                            id="{{ $feature->id }}"
                                            {{ in_array($feature->name, old('features', [])) ? 'checked' : '' }}>
                                        <label for="{{ $feature->id }}">{{ $feature->name }}</label>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div class="row mt-4">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary" id="addCarBtn">{{ __('messages.submit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
        
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <!-- Select2 CSS & JS -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
        <script type="text/javascript">
            // Show Thumbnail
            function PreviewThumbnail() {
                    var reader = new FileReader();
                    reader.readAsDataURL(document.getElementById("thumbnail").files[0]);
                    reader.onload = function (oFREvent) {
                        document.getElementById("uploadThumbnailPreview").src = oFREvent.target.result;
                        $("#uploadThumbnailPreview").show();
                    };
                };
            function PreviewImages(){
                var previewContainer = document.getElementById("uploadImagePreview");
                previewContainer.innerHTML = ""; 
                var files = document.getElementById("images").files; 
                if (files.length > 0) {
                    for (let i = 0; i < files.length; i++) {
                        let reader = new FileReader();
                        reader.onload = function (oFREvent) {
                            let img = document.createElement("img");
                            img.src = oFREvent.target.result;
                            img.style.width = "100px";  
                            img.style.height = "100px"; 
                            img.style.margin = "5px";  
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(files[i]);
                    }
                }
            }
        </script>
        <script>
            $(document).ready(function() {
                
                $('#model').select2({
                    placeholder: "Search and select a model",
                    allowClear: true,
                    ajax: {
                        url: '/search-models', 
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return {
                                search: params.term 
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: $.map(data, function(item) {
                                    return {
                                        id: item.id,
                                        text: item.name
                                    };
                                })
                            };
                        },
                        cache: true
                    }
                });
            });
        </script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {

                let dateInput = document.getElementById("date_added");
                if (!dateInput.value) {
                    let today = new Date().toISOString().split('T')[0];
                    dateInput.value = today;
                }
            });
        </script>
        <script>
            function formatMileage(input) {
                // Remove all non-digit characters
                let value = input.value.replace(/,/g, '').replace(/\D/g, '');
                
                // Format with commas
                input.value = value.replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
        </script>

       
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection


