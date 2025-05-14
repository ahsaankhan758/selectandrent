@extends('admin.layouts.Master')

@section('title') {{ __('messages.permissions') }} @endsection

@section('content')

<div class="container mt-5">
    <h4 class="mb-4">{{ __('messages.assign') }} {{ __('messages.permissions') }}</h4>
        <!-- Role Selector -->
        <form method="POST" action="{{ route('storePermissions') }}" id="permissions">
        @csrf
            @method('PUT')
        <div class="row mb-4">
            <input type="hidden" name="role" class="form-control">
            {{-- <div class="col-md-3">
                <div class="form-group">
                    <label for="role">{{ __('messages.') }}Role</label>
                    <select id="role" name="role" class="form-control">
                        <option value="" disabled selected>Select</option>
                        <option value="admin">Admin</option>
                        <option value="company">Company User</option>
                    </select>
                </div>
            </div> --}}
        
            <div class="col-md-3" id="nameList" >
                <div class="form-group">
                <label for="name">User</label>
                <select id="getUserName" name="name" class="form-control">
                    <option value="" disabled selected>Select</option>
                    @foreach ($usersList as $user)
                        <option value={{ $user->id }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            </div>
        </div>
        <div id="checkAll" class="mb-2 d-none d-flex justify-content-end">
            <div>
                <input type="checkbox" id="masterCheckbox">
                <label for="masterCheckbox">Check/Uncheck All</label>
            </div>
        </div>
        <!-- Permissions Table -->
        
        <table class="table table-bordered text-center d-none" id="permissionsTable">
            
        </table>

        <button class="btn btn-primary mt-3 d-none" type="submit" id="savePermissionsBtn">{{ __('messages.set') }} {{ __('messages.permissions') }}</button>
    </form>
</div>

@endsection
