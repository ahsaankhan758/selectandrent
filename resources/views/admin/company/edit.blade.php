
@extends('admin.layouts.Master')
@section('title') {{ __('messages.edit') }} {{ __('messages.company') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="col-6">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.update') }} {{ __('messages.company') }}</h4>
                    <a href=" {{ route('companies') }}" class="btn btn-primary float-end" >{{ __('messages.back') }}</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateCompany',$company->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <lable for="name">{{ __('messages.name') }}</lable>
                            <input type="text" name="name" class="form-control" value="{{ $company->name }}">
                        </div>
                        <div class="form-group mb-3">
                            <lable for="email">{{ __('messages.email') }}</lable>
                            <input type="email" name="email" class="form-control" value="{{ $company->email }}" >
                        </div>
                        <div class="form-group mb-3">
                            <lable for="phone">{{ __('messages.phone') }}</lable>
                            <input type="text" name="phone" class="form-control" value="{{ $company->phone }}">
                        </div>
                        <div class="form-group mb-3">
                            <lable for="website">{{ __('messages.website') }}</lable>
                            <input type="text" name="website" class="form-control" value="{{ $company->website }}">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection

