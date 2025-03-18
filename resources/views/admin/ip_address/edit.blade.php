@extends('admin.layouts.Master')
@section('title') {{ __('messages.edit') }} {{ __('messages.user IP') }} @endsection
@section('content')
    
    <div class="col-6">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ __('messages.update') }} {{ __('messages.user IP') }}</h4>
                <a href=" {{ route('ipAddresses') }}" class="btn btn-primary float-end" >Back</a>
            </div>
            <div class="card-body">
                <form action="{{ route('updateIpAddresses',$ip_address->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <lable for="user_name">{{ __('messages.user') }} {{ __('messages.name') }}</lable>
                        <input type="text" name="user_name" class="form-control" disabled value="{{ $ip_address->users->name }}">
                    </div>
                    <div class="form-group mb-3">
                        <lable for="ip_address">{{ __('messages.user IP') }}</lable>
                        <input type="text" name="ip_address"  class="form-control" value="{{ $ip_address->ip_address }}">
                    </div>
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">{{ __('messages.update') }}/button>
                    </div>
                </form>
            </div> 
        </div>
    </div>

@endsection

                                                
                                                
