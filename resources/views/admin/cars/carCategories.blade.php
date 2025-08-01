@extends('admin.layouts.Master')
@section('title') {{ __('messages.vehicle') }} {{ __('messages.category') }}@endsection
@section('content')
    @if (can('categories', 'view'))
        <div class="col-10">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.vehicle') }} {{ __('messages.categories') }}</h4>
                    <div class="mt-3 float-end">
                        @if(can('categories','edit') && auth()->user()->role != 'company' )
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                {{ __('messages.create') }}
                            </button>
                        @endif
                    </div>
                    
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                        <div class="modal-content">
                    
                            <div class="modal-header">
                            <h4 class="modal-title">{{ __('messages.create') }} {{ __('messages.category') }}</h4>
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                    
                            <div class="modal-body">
                                <form action="{{ route('addCarCategory') }}" method="POST" id="addForm">
                                    @csrf
                                    <input type="text" name="name" class="form-control" placeholder="Enter Category">
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
                            @if(can('categories','edit') && auth()->user()->role != 'company' )
                                <th scope="col">{{ __('messages.action') }}</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($categories))
                                @foreach ($categories as $categoryData)
                                    <tr>
                                        <td>{{ ucfirst(strtolower($categoryData->name)) }}</td>
                                        @if(can('categories','edit') && auth()->user()->role != 'company' )
                                            <td>
                                                <a href="{{ route('deleteCarCategory',$categoryData->id) }}"  class="btn-delete">
                                                    <i class="fa-sharp fa-solid fa-trash" style="color: red"></i>
                                                </a>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        {{ $categories->links() }}
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

