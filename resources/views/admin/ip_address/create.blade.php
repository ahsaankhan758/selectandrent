@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} {{ __('messages.user IP') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="col-6">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.create') }} {{ __('messages.user IP') }}</h4>
                    <a href=" {{ route('ipAddresses') }}" class="btn btn-primary float-end" >{{ __('messages.back') }}</a>
                </div>
                <div class="card-body">
                <form action="{{ route('storeIpAddress')}}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <lable for="user_name">{{ __('messages.user') }} {{ __('messages.name') }}</lable>
                        <input type="text" name="user_name" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <lable for="ip_address">IP Address</lable>
                        <input type="text" name="ip_address"  class="form-control" value="">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('messages.create') }}</button>
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

                                                
                                                
