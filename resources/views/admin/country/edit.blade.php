@extends('admin.layouts.Master')
@section('title', 'Edit Country')
@section('content')
    <?php
    if (Auth::check()) {
        $role = Auth::user()->role;
        $userId = auth()->id();
    }
    $owner = EmployeeOwner($userId);
    ?>
    @if ($role == 'admin' || !empty($owner) && $owner->role == 'admin' )
        @if(can('country', 'view'))
            <div class="col-10 mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('messages.edit') }}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('countries.update', $country->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label class="form-label">{{ __('messages.country') }}</label>
                                <input type="text" name="name" class="form-control" value="{{ $country->name }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">{{ __('messages.country') }} {{ __('messages.code') }}</label>
                                <input type="text" name="code" class="form-control" value="{{ $country->code }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">{{ __('messages.update') }}</button>
                            <a href="{{ route('countries.index') }}" class="btn btn-secondary">{{ __('messages.back') }}</a>
                        </form>
                    </div>
                </div>
            </div>
        @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection
