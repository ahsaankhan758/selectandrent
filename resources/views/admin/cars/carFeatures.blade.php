@extends('admin.layouts.Master')
@section('title') {{ __('messages.vehicle') }} {{ __('messages.features') }} @endsection
@section('content')
    @if (can('features', 'view'))
        <div class="col-10">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.vehicle') }} {{ __('messages.features') }}</h4>
                    <div class="mt-3 float-end">
                        @if(can('features','edit') && auth()->user()->role != 'company')
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                {{ __('messages.create') }}
                            </button>
                        @endif
                    </div>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">
                    
                            <div class="modal-header">
                            <h4 class="modal-title">{{ __('messages.create') }} {{ __('messages.feature') }}</h4>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                    
                            <div class="modal-body">
                                <form action="{{ route('addCarFeature') }}" method="POST" id="addFeatureForm">
                                    @csrf
                                    <input type="text" name="name" class="form-control" placeholder="Enter Feature Name">
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
                            @if(can('features','edit') && auth()->user()->role != 'company')
                                <th scope="col">{{ __('messages.action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($features))
                                @foreach ($features as $featureData)
                                    <tr>
                                        <td>{{ ucfirst(strtolower($featureData->name)) }}</td>
                                        @if(can('features','edit') && auth()->user()->role != 'company')
                                            <td>
                                                <a href="{{ route('deleteCarFeature',$featureData->id) }}"  class="btn-delete">
                                                    <i class="fa-sharp fa-solid fa-trash" style="color: red"></i>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        {{ $features->links() }}
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

