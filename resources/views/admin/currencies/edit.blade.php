
@extends('admin.layouts.Master')
@section('title') {{ __('messages.update') }} {{ __('messages.currency') }} @endsection
@section('content')
    @if(auth()->user()->role == 'admin')
        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.update') }} {{ __('messages.currency') }}</h4>
                    <a href=" {{ route('currencies') }}" class="btn float-end" style="background-color: #f06115; color: white " >{{__('messages.back') }} </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('updateCurrency', $currency->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <lable for="name">{{ __('messages.name') }}</lable>
                                    <input type="text" name="name" class="form-control" value="{{ $currency->name ?? '' }}">
                                </div>
                            </div>
                            <div class="col-6">    
                                <div class="form-group mb-3">
                                    <lable for="symbol">{{ __('messages.symbol') }} </lable>
                                    <input type="text" name="symbol" class="form-control" value="{{ $currency->symbol ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <lable for="code">{{ __('messages.code') }}</lable>
                                    <input type="text" name="code" class="form-control" value="{{ $currency->code ?? '' }}">
                                </div>
                            </div>
                            <div class="col-6">    
                                <div class="form-group mb-3">
                                    <lable for="rate">{{ __('messages.rate') }} </lable>
                                    <input type="text" name="rate" class="form-control" value="{{ $currency->rate ?? '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <lable for="decimals">{{ __('messages.decimals') }}</lable>
                                    <input type="text" name="decimals" class="form-control" value="{{ $currency->decimals ?? '' }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <lable for="primary_order">{{ __('messages.primary_order') }}</lable>
                                    <input type="text" name="primary_order" class="form-control" value="{{ $currency->primary_order ?? '' }}">
                                </div>
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <lable for="symbol_placement">{{ __('messages.symbol_placement') }}</lable>
                                    <select name="symbol_placement" class="form-control">
                                        <option disabled {{ empty($currency->symbol_placement) ? 'selected' : '' }}>Select</option>
                                        <option value="before" {{ $currency->symbol_placement == 'before' ? 'selected' : '' }}>Before</option>
                                        <option value="after" {{ $currency->symbol_placement == 'after' ? 'selected' : '' }}>After</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <lable for="is_active">{{ __('messages.is_active') }}</lable>
                                    <select name="is_active" class="form-control">
                                        <option disabled {{ empty($currency->is_active) ? 'selected' : '' }}>Select</option>
                                        <option value="Yes" {{ $currency->is_active == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $currency->is_active == 'No' ? 'selected' : '' }}>No</option>
                                    </select>                             
                                </div>
                            </div>  
                        </div>
                        <div class="row float-end">
                            <div class="form-group mb-3 ">
                                <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
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


