
@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} {{ __('messages.car') }} @endsection
@section('content')

    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ __('messages.create') }} {{ __('messages.car') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('storeCar') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-4 form-group mb-3">
                            <label for="model">{{ __('messages.model') }}</label>
                            <select name="model" id="model" class="form-control " data-live-search = "true">
                                <option disabled selected>{{ __('messages.select a model') }}</option>
                                @if(isset($models))
                                    @foreach ( $models as $modelData)
                                        <option value="{{ $modelData->id }}">{{ ucfirst(strtolower($modelData->name)) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-4 form-group mb-3">
                            <lable for="category">{{ __('messages.category') }}</lable>
                            <select name="category" class="form-control" data-live-search = "true">
                                <option disabled selected>{{ __('messages.select') }} </option>
                                @if(isset($categories))
                                    @foreach ( $categories as $categoryData)
                                        <option value="{{ $categoryData->id }}">{{ ucfirst(strtolower($categoryData->name)) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="col-4 form-group mb-3">
                            <lable for="location">{{ __('messages.city') }}</lable>
                            <select name="location" class="form-control">
                                <option disabled selected>{{ __('messages.select') }}</option>
                                @if(isset($locations))
                                    @foreach ( $locations as $locationData)
                                        <option value="{{ $locationData->id }}">{{ ucfirst(strtolower($locationData->city)) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group mb-3">
                            <lable for="fuel_type">{{ __('messages.fuel type') }}</lable>
                            <select name="fuel_type" class="form-control">
                                <option disabled selected>{{ __('messages.select') }}</option>
                                <option value="electric">Electric</option>
                                <option value="hybrid">Hybrid</option>
                                <option value="petrol">Petrol</option>
                                <option value="diesel">Diesel</option>
                                <option value="gasoline">Gasoline</option>
                                <option value="LPG">LPG</option>
                            </select>
                        </div>
                        <div class="col-4 form-group mb-3">
                            <lable for="transmission">{{ __('messages.transmission') }}</lable>
                            <select name="transmission" class="form-control">
                                <option disabled selected>{{ __('messages.select') }}</option>
                                <option value="auto">Auto</option>
                                <option value="manual">Manual</option>
                            </select>
                        </div>
                        <div class="col-4 form-group mb-3">
                            <label for="drive">{{ __('messages.drive') }}</label>
                            <select type="text" name="drive" class="form-control" >
                                <option disabled selected>{{ __('messages.select') }}</option>
                                <option value="2 Wheel">2 Wheel</option>
                                <option value="4 Wheel">4 Wheel</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group mb-3">
                            <lable for="weight">{{ __('messages.weight') }}</lable>
                            <input type="text" name="weight" class="form-control">
                        </div>
                        <div class="col-4 form-group mb-3">
                            <lable for="doors">{{ __('messages.doors') }}</lable>
                            <input type="text" name="doors" class="form-control">
                        </div>
                        <div class="col-4 form-group mb-3">
                            <label for="year">{{ __('messages.year') }}</label>
                            <select name="year" class="form-control" >
                                <option selected>{{ __('messages.select') }}</option> 
                                @for($year = 1980; $year <= date('Y'); $year++)
                                    <option value="{{ $year }}">{{ $year }}</option> 
                                @endfor
                            </select>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-4 form-group mb-3">
                            <lable for="engine_size">{{ __('messages.engine size') }}</lable>
                            <input type="text" name="engine_size" class="form-control">
                        </div>
                        <div class="col-4 form-group mb-3">
                            <lable for="luggage">{{ __('messages.luggage') }}</lable>
                            <input type="text" name="luggage" class="form-control">
                        </div>
                        <div class="col-4 form-group mb-3">
                            <label for="seats">{{ __('messages.seats') }}</label>
                            <input type="text" name="seats" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group mb-3">
                            <lable for="fuel_economy">{{ __('messages.fuel economy') }}</lable>
                            <input type="text" name="fuel_economy" class="form-control">
                        </div>
                        <div class="col-4 form-group mb-3">
                            <lable for="beam">{{ __('messages.beam') }}</lable>
                            <input type="text" name="beam" class="form-control">
                        </div>
                        
                        <div class="col-4 form-group mb-3">
                            <label for="exterior_color">{{ __('messages.exterior color') }}</label>
                            <input type="text" name="exterior_color" class="form-control" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group mb-3">
                            <lable for="interior_color">{{ __('messages.interior color') }}</lable>
                            <input type="text" name="interior_color" class="form-control">
                        </div>
                        <div class="col-4 form-group mb-3">
                            <lable for="lisence_plate">{{ __('messages.lisence plate') }}</lable>
                            <input type="text" name="lisence_plate" class="form-control">
                        </div>
                        <div class="col-4 form-group mb-3">
                            <label for="rent">{{ __('messages.rent') }}</label>
                            <input type="text" name="rent" class="form-control" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4 form-group mb-3">
                            <label for="mileage">{{ __('messages.mileage') }}</label>
                            <input type="text" name="mileage" class="form-control" >
                        </div>
                        <div class="col-8 form-group mb-3">
                            <lable for="detail">{{ __('messages.detail') }}</lable>
                            <textarea name="detail" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 form-group mb-3">
                            <label for="thumbnail">{{ __('messages.thumbnail') }}</label>
                            <input type="file" name="thumbnail" class="form-control"  id="thumbnail" onchange="PreviewThumbnail();">
                            <div class="mt-1">
                                <img id="uploadThumbnailPreview" style="width: 100px; height: 100px; display: none;" />
                            </div>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label for="images">{{ __('messages.images') }}</label>
                            <input type="file" name="images[]" class="form-control" id="images" onchange="PreviewImages()" multiple>
                            <div class="mt-1" id="uploadImagePreview">
                            </div>
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
                    url: '/search-models', // API route to get models dynamically
                    dataType: 'json',
                    delay: 250, // Delay to avoid too many requests
                    data: function(params) {
                        return {
                            search: params.term // Search input from the user
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
    
@endsection


