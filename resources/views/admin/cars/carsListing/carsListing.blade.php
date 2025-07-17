@extends('admin.layouts.Master')
@section('title') {{ __('messages.vehicles') }}  {{ __('messages.lisitng') }} @endsection
@section('content')
    @if(can('vehicles','view'))
        {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script> --}}
        
        <div class="col-10">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.vehicles') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead class="align-text-center">
                        <tr>
                            <th scope="col">{{ __('messages.model') }}</th>
                            <th scope="col">{{ __('messages.lisence plate') }}</th>
                            <th scope="col">{{ __('messages.owner') }}</th>
                            <th scope="col">{{ __('messages.created_by') }} {{ __('messages.employee') }}</th>
                            <th scope="col">{{ __('messages.is_booked') }}</th>
                            <th scope="col">{{ __('messages.status') }}</th>
                            @if(can('vehicles','edit'))
                                <th scope="col">{{ __('messages.action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                                
                            <?php $counter = 0;?>
                            @if(isset($cars))
                                @foreach ($cars as $carData)
                                    <tr>
                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal{{ $carData->id }}">{{ ucfirst(strtolower($carData->car_models->name )) }}</a></td>
                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal{{ $carData->id }}">{{ $carData->lisence_plate }}</a></td>
                                        
                                        @if(isset($carData->users) && $carData->users->role == 'admin' || empty($carData->users->companies))
                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal{{ $carData->id }}">{{ $carData->users->name ?? 'N/A' }}</a></td>
                                        @else
                                            <td><a href="#" data-bs-toggle="modal" data-bs-target="#modal{{ $carData->id }}">{{ $carData->users->companies->name }}</a></td>
                                        @endif
                                        <td>
                                            {{ $carData->u_employees?->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ ($carData->is_booked == 1)? 'Yes' : 'No' }}
                                        </td>
                                        <td>
                                        {{ ($carData->status == 1)? 'Active' : 'Inactive' }} 
                                        </td>
                                        @if(can('vehicles','edit'))
                                            <td>
                                                <a href="{{ route('editCar', $carData->id) }}">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <a href="{{ route('deleteCar', $carData->id) }}" class="btn-delete">
                                                    <i class="fa-sharp fa-solid fa-trash text-danger"></i>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                    <div class="modal" id="modal{{ $carData->id }}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2><i class="fas fa-car"></i> {{ $carData->car_models->name }}</h2>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="row">   
                                                            <div class="col"> 
                                                                <div class="detail-item"><span>{{ $carData->detail }}</span></div>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="detail-item"><strong>{{ __('messages.lisence plate') }}:</strong> <span>{{ $carData->lisence_plate }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.brand') }}:</strong> <span>{{ $carData->car_models->car_brands->name }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.category') }}:</strong> <span>{{ $carData->car_categories->name }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.city') }}:</strong> <span>{{ isset($carData->car_locations->city->name) ? $carData->car_locations->city->name : '' }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.area_name') }}:</strong> <span>{{ isset($carData->car_locations->area_name) ? $carData->car_locations->area_name : 'Area name not available' }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.year') }}:</strong> <span>{{ $carData->year }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.beam') }}:</strong> <span>{{ $carData->beam }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.transmission') }}:</strong> <span>{{ $carData->transmission }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.rent') }}:</strong> <span>{{ $carData->rent }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.seats') }}:</strong> <span>{{ $carData->seats }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.weight') }}:</strong> <span>{{ $carData->weight }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.doors') }}:</strong> <span>{{ $carData->doors }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.mileage') }}:</strong> <span>{{ $carData->mileage }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.engine size') }}:</strong> <span>{{ $carData->engine_size }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.luggage') }}:</strong> <span>{{ $carData->luggage }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.drive') }}:</strong> <span>{{ $carData->drive }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.fuel economy') }}:</strong> <span>{{ $carData->fuel_economy }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.fuel type') }}:</strong> <span>{{ $carData->fuel_type }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.exterior color') }}:</strong> <span>{{ $carData->exterior_color }}</span></div>
                                                                <div class="detail-item"><strong>{{ __('messages.interior color') }}:</strong> <span>{{ $carData->interior_color }}</span></div>
                                                                @if($carData->is_featured == '1')
                                                                    <div class="detail-item"><strong>{{ __('messages.featured') }}:</strong> <span>{{ __('messages.yes') }}</span></div>
                                                                @else
                                                                    <div class="detail-item"><strong>{{ __('messages.featured') }}:</strong> <span>{{ __('messages.no') }}</span></div>
                                                                @endif

                                                                @if($carData->status == '1')
                                                                    <div class="detail-item"><strong>{{ __('messages.status') }}:</strong> <span>{{ __('messages.active') }}</span></div>
                                                                @else
                                                                    <div class="detail-item"><strong>{{ __('messages.status') }}:</strong> <span>{{ __('messages.inactive') }}</span></div>
                                                                @endif

                                                                <div class="detail-item"><strong>{{ __('messages.date') }} {{ __('messages.added') }}:</strong> <span>{{ $carData->date_added }}</span></div>
                                                            </div>
                                                        </div>
                                                        <h4 class="mt-3">{{ __('messages.features') }}</h4>
                                                        <div class="row mt-3">
                                                            <?php 
                                                                $car_data = isset($carData->features) && @unserialize($carData->features) !== false 
                                                                    ? unserialize($carData->features) 
                                                                    : [];
                                                            ?>
                                                            @if (isset($car_data) && $car_data)
                                                                @foreach ($car_data as $feature)
                                                                    <div class="col-3"><i class="mdi mdi-checkbox-marked-outline"></i>{{ $feature }}</div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                        <h4 class="mt-3">{{ __('messages.images') }}</h4>
                                                        <div class="row mt-3">
                                                            <div class="col">
                                                                @if (isset($carData->thumbnail))
                                                                    <a href="{{asset('/')}}storage/{{ $carData->thumbnail }}" data-lightbox="car-thumbnail{{ $carData->thumbnail }}">
                                                                        <img src="{{asset('/')}}storage/{{ $carData->thumbnail }}" class="thumbnail">
                                                                    </a>
                                                                    @endif
                                                                <?php 
                                                                    $counter++;
                                                                ?>
                                                                @if (isset($carData->images))
                                                                    @foreach ( unserialize($carData->images) as $image)
                                                                        <a href="{{asset('/')}}storage/{{ $image }}" data-lightbox="car-images{{ $counter }}">
                                                                        <img src="{{asset('/')}}storage/{{  $image }}" class="image">
                                                                        </a>
                                                                    @endforeach
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </tbody>
                        {{ $cars->links() }}
                    </table>
                </div> 
            </div> 
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection



