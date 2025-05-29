
@extends('admin.layouts.Master')
@section('title') {{ __('messages.edit') }} {{ __('messages.employee') }} @endsection
@section('content')

    <div class="col">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ __('messages.edit') }} {{ __('messages.employee') }}</h4>
                <a href=" {{ route('employee') }}" class="btn btn-primary float-end" >{{__('messages.back') }}</a>
            </div>
            <div class="card-body">
                <form action="{{ route('updateEmployee',$employee->e_user_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <lable for="name">{{ __('messages.name') }}</lable>
                                <input type="text" name="name" class="form-control" value="{{ $employee->employee->name }}">
                            </div>
                            <div class="form-group mb-3">
                                <lable for="email"> {{ __('messages.email') }}</lable>
                                <input type="email" name="email" class="form-control" value="{{ $employee->employee->email }}">
                            </div>
                            <div class="form-group mb-3">
                                <lable for="phone">{{ __('messages.phone') }}</lable>
                                <input type="text" name="phone" class="form-control" value="{{ $employee->employee->phone }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">{{ __('messages.password') }}</label>
                                <input id="password" type="text" class="form-control" name="password" value="Secure" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group mb-3">
                                <lable for="role">{{ __('messages.role') }}</lable>
                                @php
                                    $currentRole = $employee->employee->role;
                                    $roles = ['Role1', 'Role2', 'Role3', 'Role4'];
                                @endphp

                                <select name="role" class="form-control">
                                    <option selected value="{{ $currentRole }}">{{ $currentRole }}</option>

                                    @foreach ($roles as $role)
                                        @if ($role !== $currentRole)
                                            <option value="{{ $role }}">{{ $role }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <lable for="id_number">{{ __('messages.id_number') }} </lable>
                                <input type="text" name="id_number" class="form-control" value="{{ $employee->id_number }}">
                            </div>
                            <div class="form-group mb-3">
                                <lable for="address">{{ __('messages.address') }} </lable>
                                <input type="text" name="address" class="form-control" value="{{ $employee->address }}">
                            </div>
                            <div class="form-group mb-3">
                                <lable for="age">{{ __('messages.age') }} </lable>
                                <input type="text" name="age" class="form-control" value="{{ $employee->age }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 float-end">
                            <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                        </div>
                    </div>
                </form>
            </div> 
        </div> 
    </div>
@endsection


