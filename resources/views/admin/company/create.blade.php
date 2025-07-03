
@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} {{ __('messages.company') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.create') }} {{ __('messages.company') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeCompany') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <h5>{{ __('messages.personal') }} {{ __('messages.information') }}</h5>
                                <div class="form-group mb-3">
                                    <lable for="name">{{ __('messages.user') }} {{ __('messages.name') }}</lable>
                                    <input type="text" name="name" class="form-control" value="">
                                </div>
                                <div class="form-group mb-3">
                                    <lable for="email">{{ __('messages.personal') }} {{ __('messages.email') }}</lable>
                                    <input type="email" name="email" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">{{ __('messages.password') }}</label>
                                    <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password-confirm" >{{ __('messages.confirm password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-6">
                                <h5>{{ __('messages.company') }} {{ __('messages.information') }}</h5>
                                <div class="form-group mb-3">
                                    <lable for="name">{{ __('messages.company') }} {{ __('messages.name') }}</lable>
                                    <input type="text" name="companyName" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <lable for="email">{{ __('messages.company') }} {{ __('messages.email') }}</lable>
                                    <input type="email" name="companyEmail" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <lable for="phone">{{ __('messages.company') }} {{ __('messages.phone') }}</lable>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <lable for="website">{{ __('messages.company') }} {{ __('messages.website') }}</lable>
                                    <input type="text" name="website" class="form-control">
                                </div>
                                <div class="form-group mb-3 float-end">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                                </div>
                            </div>
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


