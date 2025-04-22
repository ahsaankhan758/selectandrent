@extends('admin.layouts.Master')

@section('title') Permissions @endsection

@section('content')

<div class="container mt-5">
    <h4 class="mb-4">Assign Permissions</h4>
        <!-- Role Selector -->
        <form method="POST" action="{{ route('storePermissions') }}">
        @csrf

        <div class="form-group mb-4">
            <label for="role">Select Role:</label>
            <select id="role" name="role" class="form-control w-25" >
                <option value="admin" >Admin</option>
                <option value="company" >Company User</option>
            </select>
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
