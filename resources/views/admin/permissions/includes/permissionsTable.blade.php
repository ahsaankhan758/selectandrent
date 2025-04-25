@php
    // Restructure userPermissions to make lookup easier
    $storedPermissions = [];
    foreach ($userPermissions as $perm) {
        $key = strtolower(str_replace(' ', '_', $perm->module));
        $storedPermissions[$key][$perm->key] = $perm->value;
    }

    $modules = ['Users', 'Companies', 'Vehicle', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Clients', 'User IP', 'Blogs', 'Activity Log'];
    $actions = ['view', 'add', 'edit', 'delete'];
@endphp

<thead class="thead-dark">
    <tr>
        <th>{{ __('messages.module') }}</th>
        @foreach ($actions as $action)
            <th>{{ ucfirst($action) }}</th>
        @endforeach
    </tr>
</thead>
<tbody>
    @foreach ($modules as $module)
        @php
            $key = strtolower(str_replace(' ', '_', $module));
        @endphp
        <tr>
            <td>{{ $module }}</td>
            @foreach ($actions as $action)
                <td>
                    <input type="hidden" name="permissions[{{ $key }}][{{ $action }}]" value="0">
                    <input type="checkbox"
                        name="permissions[{{ $key }}][{{ $action }}]"
                        value="1"
                        {{ (isset($storedPermissions[$key][$action]) && $storedPermissions[$key][$action] == 1) ? 'checked' : '' }}>
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody>
