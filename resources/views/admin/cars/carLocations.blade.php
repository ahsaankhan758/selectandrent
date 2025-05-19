@extends('admin.layouts.Master')
@section('title') {{ __('messages.car') }} {{ __('messages.location') }}@endsection
@section('content')

    <div class="col-10">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ __('messages.car') }} {{ __('messages.location') }}</h4>
                <div class="mt-3 float-end">
                    @if(can('vehicle_locations','edit'))
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                            {{ __('messages.create') }}
                        </button>
                    @endif
                </div>
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                
                            <div class="modal-header">
                                <h4 class="modal-title">{{ __('messages.create') }} {{ __('messages.location') }}</h4>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                
                            <div class="modal-body">
                                <form action="{{ route('addCarLocation') }}" method="POST" id="addForm">
                                    @csrf
                                    
                                    <select name="city" id="city" class="form-control">
                                        <option value="">-- Select City --</option>
                                        @foreach($city as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                                                        
                                    <div style="position: relative;">
                                    <input type="text" name="area_name" id="area_name" class="form-control mt-2" placeholder="Area Name" autocomplete="off">
                                    <ul id="locationSuggestions" class="list-group"></ul>

                                    </div>
                                    <input type="text" name="postal_code" class="form-control mt-2" placeholder="Postal Code">

                                    <input type="hidden" id="latitude" name="latitude" class="form-control mt-2" placeholder="Latitude">
                                    <input type="hidden" id="longitude" name="longitude" class="form-control mt-2" placeholder="Longitude">

                            </div>
                            
                
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">{{ __('messages.create') }}</button>
                                </form>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="myTable">
                    <thead>
                    <tr>
                        <th scope="col">City</th>
                        <th scope="col">Area Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($locations))
                            @foreach ($locations as $locationData)
                                <tr>

                                    <td>{{ ucfirst(strtolower(optional($locationData->city)->name)) }}</td>
                                    <td>{{ ucfirst(strtolower($locationData->area_name)) }}</td>
                                    <td>
                                    @if(can('vehicle_locations','edit'))
                                    <a href="{{ route('deleteCarLocation',$locationData->id) }}"  class="btn-delete">
                                        <i class="fa-sharp fa-solid fa-trash" style="color: red"></i>
                                    </a>
                                    @endif
                                    </td>

                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {{ $locations->links() }}
                </table>
            </div> 
        </div> 
    </div>

    <style>
        #locationSuggestions {
            position: absolute;
            z-index: 1000;
            width: 92%;
            max-height: 150px;
            overflow-y: auto;
            background: white;
            border: 1px solid #ddd;
            display: none; /* Hidden by default */
        }
    
        #locationSuggestions li {
            padding: 5px 10px;
            cursor: pointer;
        }
    
        #locationSuggestions li:hover {
            background: #f0f0f0;
        }
    </style>
    
    
    <script src="{{asset('/')}}assets/js/locationSuggestion.js"></script>
    
    
@endsection

