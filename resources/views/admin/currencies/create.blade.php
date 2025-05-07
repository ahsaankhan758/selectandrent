
@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} {{ __('messages.currency') }} @endsection
@section('content')

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
                                <lable for="name">{{ __('messages.name') }}</lable>
                                <input type="text" name="name" class="form-control" >
                            </div>
                        </div>
                        <div class="col-6">    
                            <div class="form-group mb-3">
                                <lable for="symbol">{{ __('messages.symbol') }} </lable>
                                <input type="text" name="symbol" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <lable for="code">{{ __('messages.code') }}</lable>
                                <input type="text" name="code" class="form-control" >
                            </div>
                        </div>
                        <div class="col-6">    
                            <div class="form-group mb-3">
                                <lable for="rate">{{ __('messages.rate') }} </lable>
                                <input type="text" name="rate" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <lable for="decimals">{{ __('messages.decimals') }}</lable>
                                <input type="text" name="decimals" class="form-control" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <lable for="primary_order">{{ __('messages.primary_order') }}</lable>
                                <input type="text" name="primary_order" class="form-control" >
                            </div>
                        </div>  
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <lable for="symbol_placement">{{ __('messages.symbol_placement') }}</lable>
                                <select name="symbol_placement" class="form-control">
                                    <option disabled selected>Select</option>
                                    <option value="before">Before</option>
                                    <option value="after">After</option>
                                </select>                                
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <lable for="is_active">{{ __('messages.is_active') }}</lable>
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
@endsection


