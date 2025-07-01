@php
    $storedPermissions = [];
    foreach ($userPermissions as $perm) {
        $key = strtolower(str_replace(' ', '_', $perm->module));
        $storedPermissions[$key][$perm->key] = $perm->value;
    }

    if ($user_role == 'admin' || $ownerRole == 'admin') {
        $modules = ['Dashboard', 'Customer Accounts', 'Vehicles', 'Brands', 'Categories', 'Features', 'Models', 'Locations', 'Cities', 'Featured Vehicles',
                    'Analytics', 'Calendar', 'Bookings', 'Financials', 'Refunds', 'Clients', 'Reminders', 'Reviews', 'Activity Logs', 'Contact', 'Country',];
        $vehicleSubmodules = ['Brands', 'Categories', 'Features', 'Models', 'Locations', 'Cities', 'Featured Vehicles'];
        $viewOnlyModules = ['dashboard', 'customer_accounts', 'analytics', 'financials', 'clients', 'activity_logs'];
        $viewOnlyVehicleSubModules = [];
    } else {
        $modules = ['Dashboard', 'Customer Accounts', 'Vehicles', 'Brands', 'Categories', 'Features', 'Models', 'Locations', 'Cities', 'Featured Vehicles', 
                    'Calendar', 'Bookings', 'Financials', 'Refunds', 'Clients', 'Reminders', 'Reviews', 'Activity Logs',];
        $vehicleSubmodules = ['Brands', 'Categories', 'Features', 'Models', 'Locations', 'Cities', 'Featured Vehicles'];
        $viewOnlyModules = ['dashboard', 'customer_accounts', 'financials', 'clients', 'activity_logs'];
        $viewOnlyVehicleSubModules = ['brands', 'categories', 'features', 'models', 'locations', 'cities', 'featured_vehicles'];
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

        <tr data-module="{{ $key }}" class="{{ in_array($key, ['vehicles', 'settings']) ? $key . '-parent-row clickable' : '' }}">
            <td>
                @if (in_array($key, ['vehicles', 'settings']))
                    <span class="toggle-arrow" style="cursor: pointer;">▼</span>
                @endif
                {!! in_array($key, ['vehicles', 'settings']) ? '<strong>' . $module . '</strong>' : e($module) !!}
            </td>

            @foreach ($actions as $action)
                @if ($action === 'edit' && in_array($key, $viewOnlyModules))
                    <td></td> {{-- Leave empty cell if edit not allowed --}}
                @else
                    <td>
                        <input type="hidden" name="permissions[{{ $key }}][{{ $action }}]" value="0">
                        <input type="checkbox"
                            class="permission-checkbox"
                            data-row="{{ $key }}"
                            name="permissions[{{ $key }}][{{ $action }}]"
                            value="1"
                            {{ (isset($storedPermissions[$key][$action]) && $storedPermissions[$key][$action] == 1) ? 'checked' : '' }}>
                    </td>
                @endif
            @endforeach

            <td>
                <input type="checkbox" class="row-checkbox" data-row="{{ $key }}">
            </td>
        </tr>

        {{-- Vehicle Submodules --}}
        @if ($key === 'vehicles')
            @foreach ($vehicleSubmodules as $submodule)
                @php $subKey = strtolower(str_replace(' ', '_', $submodule)); @endphp
                <tr class="vehicles-submodule ml-4" data-parent="vehicles" data-submodule="{{ $subKey }}" style="background-color: #f0f0f0;">
                    <td> ↳ {{ $submodule }}</td>
                    @foreach ($actions as $action)
                        @if ($action === 'edit' && in_array($subKey, $viewOnlyVehicleSubModules))
                            <td></td> {{-- Leave empty cell if edit not allowed --}}
                        @else
                            <td>
                                <input type="hidden" name="permissions[{{ $subKey }}][{{ $action }}]" value="0">
                                <input type="checkbox"
                                    class="permission-checkbox"
                                    data-row="{{ $subKey }}"
                                    name="permissions[{{ $subKey }}][{{ $action }}]"
                                    value="1"
                                    {{ (isset($storedPermissions[$subKey][$action]) && $storedPermissions[$subKey][$action] == 1) ? 'checked' : '' }}>
                            </td>
                        @endif
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
