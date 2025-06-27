@php
    $storedPermissions = [];
    foreach ($userPermissions as $perm) {
        $key = strtolower(str_replace(' ', '_', $perm->module));
        $storedPermissions[$key][$perm->key] = $perm->value;
    }

    if ($user_role == 'admin' || $ownerRole == 'admin') {
        $modules = ['Users', 'Employees', 'User Signup', 'Companies', 'Vehicle', 'Brands', 'Categories', 'Features', 'Models', 'Locations', 'City', 'Featured Vehicles',
                    'Analytics', 'Calendar', 'Bookings', 'Financial', 'Refunds', 'Clients', 'Reminders', 'User IP', 'Blogs', 'Reviews', 'Activity Log', 'Contacts', 'Country',
                    'Settings', 'General Module', 'Permissions', 'Payment Modules' , 'Googel Map Modules', 'Currencies'];
        $vehicleSubmodules = ['Brands', 'Categories', 'Features', 'Models', 'Locations', 'City', 'Featured Vehicles'];
    } else {
        $modules = ['Vehicle', 'Locations', 'Featured Vehicles', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Refunds', 'Clients', 'Reminders', 'User IP',
                    'Blogs', 'Reviews', 'Activity Log', 'Contacts', 'Country', 'Settings', 'General Module', 'Permissions', 'Payment Modules' , 'Googel Map Modules', 'Currencies'];
        $vehicleSubmodules = ['Locations', 'Featured Vehicles'];
    }

    $actions = ['view', 'edit'];
    $settingSubmodules = ['General Module', 'Permissions', 'Payment Modules' , 'Googel Map Modules', 'Currencies'];
@endphp

<thead class="thead-dark">
    <tr>
        <th>{{ __('messages.module') }}</th>
        @foreach ($actions as $action)
            <th>{{ ucfirst($action) }}</th>
        @endforeach
        <th>Check/Uncheck Module</th>
    </tr>
</thead>

<tbody>
    @foreach ($modules as $module)
        @php
            $key = strtolower(str_replace(' ', '_', $module));
            $isVehicleSubmodule = in_array($module, $vehicleSubmodules);
            $isSettingSubmodule = in_array($module, $settingSubmodules);
        @endphp

        @if ($isVehicleSubmodule || $isSettingSubmodule)
            @continue
        @endif

        <tr data-module="{{ $key }}" class="{{ in_array($key, ['vehicle', 'settings']) ? $key . '-parent-row clickable' : '' }}">
            <td>
                @if (in_array($key, ['vehicle', 'settings']))
                    <span class="toggle-arrow" style="cursor: pointer;">▼</span>
                @endif
                {!! in_array($key, ['vehicle', 'settings']) ? '<strong>' . $module . '</strong>' : e($module) !!}
            </td>

            @foreach ($actions as $action)
                <td>
                    <input type="hidden" name="permissions[{{ $key }}][{{ $action }}]" value="0">
                    <input type="checkbox"
                        class="permission-checkbox"
                        data-row="{{ $key }}"
                        name="permissions[{{ $key }}][{{ $action }}]"
                        value="1"
                        {{ (isset($storedPermissions[$key][$action]) && $storedPermissions[$key][$action] == 1) ? 'checked' : '' }}>
                </td>
            @endforeach
            <td>
                <input type="checkbox" class="row-checkbox" data-row="{{ $key }}">
            </td>
        </tr>

        {{-- Vehicle Submodules --}}
        @if ($key === 'vehicle')
            @foreach ($vehicleSubmodules as $submodule)
                @php $subKey = strtolower(str_replace(' ', '_', $submodule)); @endphp
                <tr class="vehicle-submodule ml-4" data-parent="vehicle" data-submodule="{{ $subKey }}" style="background-color: #f0f0f0;">
                    <td> ↳ {{ $submodule }}</td>
                    @foreach ($actions as $action)
                        <td>
                            <input type="hidden" name="permissions[{{ $subKey }}][{{ $action }}]" value="0">
                            <input type="checkbox"
                                class="permission-checkbox"
                                data-row="{{ $subKey }}"
                                name="permissions[{{ $subKey }}][{{ $action }}]"
                                value="1"
                                {{ (isset($storedPermissions[$subKey][$action]) && $storedPermissions[$subKey][$action] == 1) ? 'checked' : '' }}>
                        </td>
                    @endforeach
                    <td><input type="checkbox" class="row-checkbox" data-row="{{ $subKey }}"></td>
                </tr>
            @endforeach
        @endif

        {{-- Settings Submodules --}}
        @if ($key === 'settings')
            @foreach ($settingSubmodules as $submodule)
                @php $subKey = strtolower(str_replace(' ', '_', $submodule)); @endphp
                <tr class="settings-submodule ml-4" data-parent="settings" data-submodule="{{ $subKey }}" style="background-color: #f0f0f0;">
                    <td> ↳ {{ $submodule }}</td>
                    @foreach ($actions as $action)
                        <td>
                            <input type="hidden" name="permissions[{{ $subKey }}][{{ $action }}]" value="0">
                            <input type="checkbox"
                                class="permission-checkbox"
                                data-row="{{ $subKey }}"
                                name="permissions[{{ $subKey }}][{{ $action }}]"
                                value="1"
                                {{ (isset($storedPermissions[$subKey][$action]) && $storedPermissions[$subKey][$action] == 1) ? 'checked' : '' }}>
                        </td>
                    @endforeach
                    <td><input type="checkbox" class="row-checkbox" data-row="{{ $subKey }}"></td>
                </tr>
            @endforeach
        @endif
    @endforeach
</tbody>
