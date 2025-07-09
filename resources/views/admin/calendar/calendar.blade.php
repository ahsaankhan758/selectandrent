@extends('admin.layouts.Master')
@section('title'){{__('messages.calendar') }} @endsection
@section('content')
    @if (can('calendar', 'view'))
        <script src="{{ asset('assets/js/admin/locationArea.js') }}"></script>
        <script>
        window.getLocationsUrl = "{{ url('/get-locations') }}";
        </script>
        {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.15/index.global.min.js'></script> --}}
        <!-- Blade: Define baseUrl first -->
        @if(auth()->check() && auth()->user()->role == 'company')
            <script>
                window.baseUrl = "{{ url('/company') }}";
            </script>
        @else
            <script>
                window.baseUrl = "{{ url('/admin') }}";
            </script>
        @endif
            <div class="row">
                <div class="col">
                    <div class="page-title-box">
                        <div id="success-message" class="alert alert-success d-none" role="alert"></div>
                        <h4 class="page-title">{{ __('messages.calendar') }}</h4>
                    </div>
                </div>
            </div>     
            <div class="row">   
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div id="external-events">
                                </div>
                                <div class="col">
                                    <div id="calendar"></div>
                                </div> 
                            </div>  
                        </div>
                    </div> 
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5>{{ __('messages.create') }} </h5>
                                    <div id="error-message" class="alert alert-danger d-none"></div>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    {{-- <form name="event-form" id="form-event">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Name</label>
                                                    <input class="form-control" placeholder="Insert Event Name"
                                                        type="text" name="title" id="event-title" required />
                                                    <div class="invalid-feedback">Please provide a valid event name</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select" name="category" id="event-category" required>
                                                        <option value="bg-danger" selected>Danger</option>
                                                        <option value="bg-success">Success</option>
                                                        <option value="bg-primary">Primary</option>
                                                        <option value="bg-info">Info</option>
                                                        <option value="bg-dark">Dark</option>
                                                        <option value="bg-warning">Warning</option>
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event category</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <label class="form-label">Location</label>
                                                    <select class="form-select" name="location" id="event-location">
                                                        <option disabled selected >Select</option>
                                                        <option value="Lahore" >Lahore</option>
                                                        <option value="Multan">Multan</option>
                                                        <option value="Pindi">Pindi</option>
                                                        <option value="Karachi">karachi</option>
                                                    </select>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-4">
                                                <button type="button" class="btn btn-danger" id="btn-delete-event" >Delete</button>
                                            </div>
                                            <div class="col-md-6 col-8 text-end">
                                                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                <button type="submit" class="btn btn-success" id="btn-edit-event">Edit</button>
                                            </div>
                                        </div>
                                    </form> --}}
                                    <form name="event-form" id="form-event" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="vehicle_id" id="vehicle_id"> 
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
                                                <select name="category" id="category" class="form-control" data-live-search = "true">
                                                    <option disabled selected>{{ __('messages.select') }} </option>
                                                    @if(isset($categories))
                                                        @foreach ( $categories as $categoryData)
                                                            <option value="{{ $categoryData->id }}">{{ ucfirst(strtolower($categoryData->name)) }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        <div class="col-4 form-group mb-3">
                                                <label for="city">{{ __('messages.city') }}</label>
                                                <select name="city" class="form-control" id="city">
                                                    <option disabled selected>{{ __('messages.select') }}</option>
                                                    @if(isset($cities))
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id }}">{{ ucfirst(strtolower($city->name)) }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 form-group mb-3">
                                                <label for="location">{{ __('messages.area_name') }}</label>
                                                <select name="location" class="form-control" id="location" disabled>
                                                    <option disabled selected>{{ __('messages.select') }}</option>
                                                </select>
                                            </div>
                                            <div class="col-3 form-group mb-3">
                                                <lable for="fuel_type">{{ __('messages.fuel type') }}</lable>
                                                <select name="fuel_type" id="fuel_type" class="form-control">
                                                    <option disabled selected>{{ __('messages.select') }}</option>
                                                    <option value="electric">Electric</option>
                                                    <option value="hybrid">Hybrid</option>
                                                    <option value="petrol">Petrol</option>
                                                    <option value="diesel">Diesel</option>
                                                    <option value="gasoline">Gasoline</option>
                                                    <option value="LPG">LPG</option>
                                                </select>
                                            </div>
                                            <div class="col-3 form-group mb-3">
                                                <lable for="transmission">{{ __('messages.transmission') }}</lable>
                                                <select name="transmission" id="transmission" class="form-control">
                                                    <option disabled selected>{{ __('messages.select') }}</option>
                                                    <option value="auto">Auto</option>
                                                    <option value="manual">Manual</option>
                                                </select>
                                            </div>
                                            <div class="col-3 form-group mb-3">
                                                <label for="drive">{{ __('messages.drive') }}</label>
                                                <select type="text" name="drive" id="drive" class="form-control" >
                                                    <option disabled selected>{{ __('messages.select') }}</option>
                                                    <option value="2 Wheel">2 Wheel</option>
                                                    <option value="4 Wheel">4 Wheel</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group mb-3">
                                                <lable for="weight">{{ __('messages.weight') }}</lable>
                                                <input type="text" name="weight" id="weight" class="form-control">
                                            </div>
                                            <div class="col-4 form-group mb-3">
                                                <lable for="doors">{{ __('messages.doors') }}</lable>
                                                <input type="text" name="doors" id="doors" class="form-control">
                                            </div>
                                            <div class="col-4 form-group mb-3">
                                                <label for="year">{{ __('messages.year') }}</label>
                                                <select name="year" id="year" class="form-control" >
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
                                                <input type="text" name="engine_size" id="engine_size" class="form-control">
                                            </div>
                                            <div class="col-4 form-group mb-3">
                                                <lable for="luggage">{{ __('messages.luggage') }}</lable>
                                                <input type="text" name="luggage" id="luggage" class="form-control">
                                            </div>
                                            <div class="col-4 form-group mb-3">
                                                <label for="seats">{{ __('messages.seats') }}</label>
                                                <input type="text" name="seats" id="seats" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 form-group mb-3">
                                                <lable for="fuel_economy">{{ __('messages.fuel economy') }}</lable>
                                                <input type="text" name="fuel_economy" id="fuel_economy" class="form-control">
                                            </div>
                                            
                                            <div class="col-4 form-group mb-3">
                                                <label for="exterior_color">{{ __('messages.exterior color') }}</label>
                                                <input type="text" name="exterior_color" id="exterior_color" class="form-control" >
                                            </div>
                                            <div class="col-4 form-group mb-3">
                                                <lable for="interior_color">{{ __('messages.interior color') }}</lable>
                                                <input type="text" name="interior_color" id="interior_color" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                        
                                            <div class="col-4 form-group mb-3">
                                                <lable for="lisence_plate">{{ __('messages.lisence plate') }}</lable>
                                                <input type="text" name="lisence_plate" id="lisence_plate" class="form-control">
                                            </div>
                                            <div class="col-4 form-group mb-3">
                                                <label for="rent">{{ __('messages.rent') }}</label>
                                                <input type="text" name="rent" id="rent" class="form-control" >
                                            </div>
                                            <div class="col-4 form-group mb-3">
                                                <label for="mileage">{{ __('messages.mileage') }}</label>
                                                <input type="text" name="mileage" id="mileage" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 form-group mb-3">
                                                <lable for="detail">{{ __('messages.detail') }}</lable>
                                                <textarea name="detail" id="detail" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 form-group mb-3">
                                                <label for="thumbnail">{{ __('messages.thumbnail') }}</label>
                                                <input type="file" name="thumbnail" class="form-control" id="thumbnail" onchange="PreviewThumbnail();">
                                                <div class="mt-1" id="ThumbnailPreview">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-9 form-group mb-3">
                                            <label for="images">{{ __('messages.images') }}</label>
                                            <input type="file" name="images[]" class="form-control" id="images" onchange="PreviewImages();" multiple>
                                            <div class="mt-1" id="currentImagePreview">
                                            
                                            </div>
                                            <div class="mt-1" id="uploadImagePreview"></div>
                                        </div>
                                            <!-- <div class="col-3 form-group mb-3">
                                                {{-- <label for="drive">{{ __('messages.status') }}</label> --}}
                                                <select name="status" id="status" class="form-control">
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
                                                </select>
                                            </div> -->
                                            {{-- <div class="col-3 form-group mb-3">
                                                <label for="drive">{{ __('messages.date') }} {{ __('messages.added') }}</label>
                                                <input type="date" name="date_added" class="form-control" id="date_added">
                                            </div> --}}
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
                                    <div class="row mt-2">
                                        <div class="col-md-6 col-4">
                                            <button type="button" class="btn btn-danger" id="btn-delete-event" >{{ __('messages.delete') }}</button>
                                        </div>
                                        <div class="col-md-6 col-8 text-end">
                                            <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                            <button type="submit" class="btn btn-success" id="btn-save-event">{{ __('messages.save') }}</button>
                                            <button type="submit" class="btn btn-success" id="btn-edit-event">{{ __('messages.edit') }}</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div> 
            <script type="text/javascript">
                function PreviewThumbnail() {
                    const fileInput = document.getElementById("thumbnail");
                    const previewContainer = document.getElementById("ThumbnailPreview");

                    if (fileInput.files && fileInput.files[0]) {
                        const reader = new FileReader();

                        reader.onload = function (e) {
                            // Clear previous preview if any
                            previewContainer.innerHTML = "";

                            // Create new image element
                            const img = document.createElement("img");
                            img.src = e.target.result;
                            img.className = "thumbnail";
                            img.style.width = "100px";
                            img.style.margin = "5px";
                            img.alt = "Thumbnail Preview";
                            console.log(img);
                            // Append to the container
                            previewContainer.appendChild(img);
                        };

                        reader.readAsDataURL(fileInput.files[0]);
                    }
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
                
                
            </script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection












