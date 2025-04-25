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
            <div class="col-md-3">
                <div class="form-group">
                    <label for="role">{{ __('messages.') }}Role</label>
                    <select id="role" name="role" class="form-control">
                        <option value="" disabled selected>Select</option>
                        <option value="admin">Admin</option>
                        <option value="company">Company User</option>
                    </select>
                </div>
            </div>
        
            <div class="col-md-3 d-none" id="nameList" >
            </div>
        </div>
        
        <!-- Permissions Table -->
        <table class="table table-bordered text-center d-none" id="permissionsTable">
            
        </table>

        <button class="btn btn-primary mt-3 d-none" type="submit" id="savePermissionsBtn">{{ __('messages.set') }} {{ __('messages.permissions') }}</button>
    </form>
</div>

@endsection
