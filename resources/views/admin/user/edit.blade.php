
@extends('admin.layouts.Master')
@section('title') {{__('messages.update') }} {{__('messages.admin') }}@endsection
@section('content')

    <div class="col-6">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{__('messages.update') }} {{__('messages.Admin') }}</h4>
                <a href=" {{ route('users') }}" class="btn btn-primary float-end" >{{__('messages.back') }}</a>
            </div>
            <div class="card-body">
            <form action="{{ route('updateUser',$user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <lable for="name">{{__('messages.name') }}</lable>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group mb-3">
                    <lable for="email">{{__('messages.email') }}</lable>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" readonly>
                </div>
                <div class="form-group mb-3">
                    <lable for="password">{{__('messages.password') }}</lable>
                    <input type="text" name="password" class="form-control" value="Password Can be Change in Change Password Option">
                </div>
                <div class="form-group mb-3">
                    <lable for="role">{{__('messages.choose role') }}</lable>
                    <select name="role" class="form-control">
                        @if ($user->role == 'admin')
                            {
                                <option value="{{ $user->role }}">Admin</option>
                                <option value="user">User</option>
                            }
                        @else 
                            {
                                <option value="{{ $user->role }}">User</option>
                                <option value="admin">Admins</option>   
                            }
                        @endif
                    </select>
                </div>
                <div class="form-group mb-3">
                    <lable for="status">{{__('messages.status') }}</lable>
                    <input type="checkbox" name="status" {{ $user->status == 1 ? 'checked':'' }}> Inactive-1 / Active-0 
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">{{__('messages.update') }}</button>
                </div>
            </form>
            </div> 
        </div>
    </div>
       
@endsection

