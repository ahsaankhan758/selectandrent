@extends('admin.layouts.Master')
@section('title')  {{ __('messages.car') }}  {{ __('messages.brand') }} @endsection
@section('content')

    <div class="col-10">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ __('messages.cars') }}  {{ __('messages.brand') }}</h4>
                <div class="mt-3 float-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        {{ __('messages.create') }}
                    </button>
                </div>
                
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                      <div class="modal-content">
                  
                        <div class="modal-header">
                          <h4 class="modal-title">{{ __('messages.create') }} {{ __('messages.brand') }}</h4>
                          
                          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                  
                        <div class="modal-body">
                            <form action="{{ route('addCarBrand') }}" method="POST" id="addBrandForm">
                                @csrf
                                <input type="text" name="name" class="form-control" placeholder="Enter Brand Name">
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
                        <th scope="col">{{ __('messages.name') }}</th>
                        <th scope="col">{{ __('messages.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($brands))    
                            @foreach ($brands as $brandData)
                                <tr>
                                    <td>{{ ucfirst(strtolower($brandData->name)) }}</td>
                                    <td><a href="{{ route('deleteCarBrand',$brandData->id) }}"  class="btn-delete">
                                        <i class="fa-sharp fa-solid fa-trash" style="color: red"></i>
                                    </a></td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {{ $brands->links() }}
                </table>
            </div> 
        </div> 
    </div>
    
@endsection

