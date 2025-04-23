@extends('admin.layouts.Master')

@section('title') Permissions @endsection

@section('content')

<div class="container mt-5">
    <h4 class="mb-4">Assign Permissions</h4>
        <!-- Role Selector -->
        <form method="POST" action="{{ route('storePermissions') }}">
        @csrf

        <div class="row mb-4">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="role1">Select Role:</label>
                    <select id="role1" name="role1" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="company">Company User</option>
                    </select>
                </div>
            </div>
        
            <div class="col-md-3">
                <div class="form-group">
                    <label for="role2">Select Admin / Company</label>
                    <select id="role2" name="role2" class="form-control">
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
        </div>
        
        
        <!-- Permissions Table -->
        <table class="table table-bordered text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Module</th>
                    <th>View</th>
                    <th>Add</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $modules = ['Users', 'Companies', 'Vehicle', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Clients', 'User IP', 'Blogs', 'Activity Log'];
                    $actions = ['view', 'add', 'edit', 'delete'];
                @endphp

                @foreach ($modules as $module)
                <tr>
                    <td>{{ $module }}</td>
                    @foreach ($actions as $action)
                        @php
                            $key = strtolower(str_replace(' ', '_', $module));
                        @endphp
                        <td>
                            <input type="checkbox"
                                name="permissions[{{ $key }}][{{ $action }}]"
                                value="1"
                                {{ isset($permissions) && isset($permissions[$key][$action]) ? 'checked' : '' }}>
                        </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-primary mt-3" type="submit">Save Permissions</button>
    </form>
</div>

@endsection
