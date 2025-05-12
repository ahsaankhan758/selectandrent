@extends('admin.layouts.Master')
@section('title') {{__('messages.create') }}@endsection
@section('content')

    <div class="col-6">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{__('messages.register') }} / {{__('messages.create') }} {{__('messages.user') }}</h4>
                <a href=" {{ route('users') }}" class="btn btn-primary float-end" >{{__('messages.back') }}</a>
            </div>
            <div class="card-body">
                <form action="{{ route('storeUser') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <lable for="name">{{__('messages.name') }}</lable>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <lable for="email">{{__('messages.email') }}</lable>
                        <input type="email" name="email" class="form-control">
                    </div>    
                    {{-- <div class="form-group mb-3">
                        <label for="role">{{__('messages.choose role') }}</label>
                        <select id="role" class="form-control" name="role">
                            <option value="user">{{__('messages.user') }}</option>
                            <option value="admin">Admin</option>
                        </select>   
                    </div> --}}
                    <div class="form-group mb-3">
                        <label for="password">{{__('messages.password') }}</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                    </div>
                    <div class="form-group mb-3">
                            <label for="password-confirm" >{{__('messages.confirm password') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                        <div class="row mb-0">
                    <div class="form-group mb-3">
                        <button type="submit" class="btn btn-primary">{{__('messages.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection


