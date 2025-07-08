
@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} {{ __('messages.currency') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.create') }} {{ __('messages.currency') }}</h4>
                    <a href=" {{ route('currencies') }}" class="btn float-end" style="background-color: #f06115; color: white " >{{__('messages.back') }} </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('storeCurrency') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('messages.name') }}</label>
                                    <input type="text" name="name" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">    
                                <div class="form-group mb-3">
                                    <label for="symbol">{{ __('messages.symbol') }} </label>
                                    <input type="text" name="symbol" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="code">{{ __('messages.code') }}</label>
                                    <input type="text" name="code" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">    
                                <div class="form-group mb-3">
                                    <label for="rate">{{ __('messages.rate') }} </label>
                                    <input type="number" name="rate" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="decimals">{{ __('messages.decimals') }}</label>
                                    <input type="number" name="decimals" class="form-control" >
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="primary_order">{{ __('messages.primary_order') }}</label>
                                    <input type="text" name="primary_order" class="form-control" >
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="symbol_placement">{{ __('messages.symbol_placement') }}</label>
                                    <select name="symbol_placement" class="form-control">
                                        <option disabled selected>Select</option>
                                        <option value="before">Before</option>
                                        <option value="after">After</option>
                                    </select>                                
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="is_active">{{ __('messages.is_active') }}</label>
                                    <select name="is_active" class="form-control">
                                        <option disabled selected>Select</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>                                
                                </div>
                            </div>
                        </div>
                        <div class="row float-end">
                            <div class="form-group mb-3 ">
                                <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
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


