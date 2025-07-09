@extends('admin.layouts.Master')
@section('title') {{ __('messages.models') }} @endsection
@section('content')
    @if (can('models', 'view'))
        <div class="col-10">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.models') }}</h4>
                    <div class="mt-3 float-end">
                        @if(can('models','edit') && auth()->user()->role != 'company')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                {{ __('messages.create') }}
                            </button>
                        @endif
                    </div>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title">{{ __('messages.create') }}</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('addCarModel') }}" method="POST" id="addBrandForm">
                                    @csrf
                                    <label for="name">{{ __('messages.model') }} {{ __('messages.name') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Model Name">
                                    <label for="car_brand_id" class="mt-3">{{ __('messages.brand') }}</label>
                                    <select name="car_brand_id" class="form-control" >
                                        @if(isset($brands))    
                                            @foreach ($brands as $brandData)
                                                <option value="{{ $brandData->id }}"> {{  ucfirst(strtolower($brandData->name)) }}</option>
                                            @endforeach
                                        @endif
                                    </select>
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
                        <thead class="align-text-center">
                        <tr>
                            <th scope="col">{{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.brand') }}</th>
                            @if(can('models','edit') && auth()->user()->role != 'company')
                                <th scope="col">{{ __('messages.action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($models))
                                @foreach ($models as $modelData)
                                    <tr>
                                        <td>{{ ucfirst(strtolower($modelData->name)) }}</td>
                                        <td>{{ ucfirst(strtolower($modelData->car_brands->name)) }}</td>
                                        @if(can('models','edit') && auth()->user()->role != 'company')
                                            <td>
                                                <a href="{{ route('deleteCarModel',$modelData->id) }}"  class="btn-delete">
                                                    <i class="fa-sharp fa-solid fa-trash" style="color: red"></i>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $models->links() }}
                    </div>                
                </div> 
            </div> 
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection



