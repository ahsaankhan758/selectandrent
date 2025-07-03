@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.create') }} {{ __('messages.reminder') }}
@endsection
@section('content')
    @if (can('reminders', 'edit'))
        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.create') }} {{ __('messages.reminder') }}</h4>
                    <a href=" {{ route('reminder') }}" class="btn btn-primary float-end" >{{__('messages.back') }}</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('reminders.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="name">{{ __('messages.name') }}</label>
                                        <input type="text" name="name" class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group mb-3">
                                        <label for="description">{{ __('messages.description') }}</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 text-end">
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
