@extends('admin.layouts.Master')
@section('title') {{ __('messages.car') }} {{ __('messages.location') }}@endsection
@section('content')

    <div class="col-10">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ __('messages.car') }} {{ __('messages.location') }}</h4>
                <div class="mt-3 float-end">
                    @if(can('vehicle_locations','add'))
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
                                <input type="text" name="city" class="form-control" placeholder="Enter Location"><br>
                                <input type="text" name="postal_code" class="form-control" placeholder="Postal Code">
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
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($locations))
                            @foreach ($locations as $locationData)
                                <tr>
                                    <td>{{ ucfirst(strtolower($locationData->city)) }}</td>
                                    <td>
                                        @if(can('vehicle_locations','delete'))
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
@endsection

