@extends('admin.layouts.Master')

@section('title') {{ __('messages.permissions') }} @endsection

@section('content')
<style>
.tooltip-icon {
  position: relative;
  cursor: pointer;
}

.tooltip-icon .tooltip-text {
  visibility: hidden;
  background-color: #333;
  color: #fff;
  padding: 6px;
  border-radius: 4px;
  font-size: 12px;
  position: absolute;
  top: -5px;
  left: 20px;
  white-space: nowrap;
  z-index: 1;
}

.tooltip-icon:hover .tooltip-text {
  visibility: visible;
}
</style>
<div class="container mt-5">
    <h4 class="mb-4">
        {{ __('messages.assign') }} {{ __('messages.permissions') }}
    </h4>
        <!-- Role Selector -->
    <form method="POST" action="{{ route('storePermissions') }}" id="permissions">
        @csrf
            @method('PUT')
        <div class="row mb-4">
            <div class="col-md-3" id="nameList" >
                <div class="form-group">
                    @if($role == 'admin')
                        <label for="name">
                            {{ __('messages.employees') }}
                            <span class="tooltip-icon">
                                <i>ℹ️</i>
                                <span class="tooltip-text">Current Loggedin Admin Can See Their Own Employees In Dropdown</span>
                            </span>
                        </label>
                        <select id="getUserName" name="name" class="form-control">
                            <option value="" disabled selected>Select</option>
                            @foreach ($usersList as $user)
                                <option value="{{ $user->e_user_id }}">{{ $user->employee->name }}</option>
                            @endforeach
                        </select>
                    @elseif($role == 'company') 
                        <label for="name">{{ __('messages.companies') }}</label>
                        <select id="company" name="company" class="form-control">
                            <option value="" disabled selected>Select</option>
                            @foreach ($usersList as $company)
                                <option value="{{ $company->user_id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    @elseif($role == 'selfCompany')
                        <div class="form-group">
                            <label for="name">{{ __('messages.employees') }}</label>
                            <select id="getUserName" name="name" class="form-control">
                                <option value="" disabled selected>Select</option>
                                @foreach ($usersList as $user)
                                    <option value={{ $user->e_user_id }}>{{ $user->employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-3 d-none" id="employeeList">
                <!-- <div class="form-group">
                    <label for="role">{{ __('messages.') }}Employees</label>
                    <select id="companyEmployees" name="companyEmployees" class="form-control">
                        <option value="" disabled selected>Select</option>
                        <option value="admin">Admin</option>
                        <option value="company">Company User</option>
                    </select>
                </div> -->
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });
});
</script>
@endsection
