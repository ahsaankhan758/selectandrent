@php
    // Restructure userPermissions to make lookup easier
    $storedPermissions = [];
    foreach ($userPermissions as $perm) {
        $key = strtolower(str_replace(' ', '_', $perm->module));
        $storedPermissions[$key][$perm->key] = $perm->value;
    }

    if ($user_role == 'admin' || $ownerRole == 'admin') {
        $modules = ['Users', 'Companies', 'Vehicle', 'Brands', 'Categories', 'Features', 'Models', 'Locations', 'Featured Vehicles', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Earning Summary', 'Transaction History', 'Clients', 'User IP', 'Blogs', 'Activity Log', 'Contacts', 'Currencies'];
        $vehicleSubmodules = ['Brands', 'Categories', 'Features', 'Models', 'Locations', 'Featured Vehicles'];
    } else {
        $modules = ['Vehicle', 'Locations', 'Featured Vehicles', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Earning Summary', 'Transaction History', 'Clients', 'Activity Log'];
        $vehicleSubmodules = ['Locations', 'Featured Vehicles'];
    }

    $actions = ['view', 'edit'];
    $financialSubmodules = ['Earning Summary', 'Transaction History'];
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
            $isFinancialSubmodule = in_array($module, $financialSubmodules);
        @endphp

        {{-- Skip rendering submodules here, we’ll render them after their parent --}}
        @if ($isVehicleSubmodule || $isFinancialSubmodule)
            @continue
        @endif

        {{-- Main module row --}}
        <tr data-module="{{ $key }}" class="{{ in_array($key, ['vehicle', 'financial']) ? $key . '-parent-row clickable' : '' }}">
            <td>
                @if (in_array($key, ['vehicle', 'financial']))
                    <span class="toggle-arrow" style="cursor: pointer;">▼</span>
                @endif
                {!! in_array($key, ['vehicle', 'financial']) ? '<strong>' . $module . '</strong>' : e($module) !!}
            </td>

            @foreach ($actions as $action)
                <td>
                    @php
                        $showCheckbox = !($key === 'calendar' && $action === 'edit')
                                        && !($key === 'bookings' && $action === 'edit' && $user_role !== 'admin');
                    @endphp

                    <input type="hidden" name="permissions[{{ $key }}][{{ $action }}]" value="0">
                    @if ($showCheckbox)
                        <input type="checkbox"
                            class="permission-checkbox"
                            data-row="{{ $key }}"
                            name="permissions[{{ $key }}][{{ $action }}]"
                            value="1"
                            {{ (isset($storedPermissions[$key][$action]) && $storedPermissions[$key][$action] == 1) ? 'checked' : '' }}>
                    @else
                        <span class="text-muted"> </span>
                    @endif
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
                    <td>
                        <input type="checkbox" class="row-checkbox" data-row="{{ $subKey }}">
                    </td>
                </tr>
            @endforeach
        @endif

        {{-- Financial Submodules --}}
        @if ($key === 'financial')
            @foreach ($financialSubmodules as $submodule)
                @php $subKey = strtolower(str_replace(' ', '_', $submodule)); @endphp
                <tr class="financial-submodule ml-4" data-parent="financial" data-submodule="{{ $subKey }}" style="background-color: #f0f0f0;">
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
                    <td>
                        <input type="checkbox" class="row-checkbox" data-row="{{ $subKey }}">
                    </td>
                </tr>
            @endforeach
        @endif
    @endforeach
</tbody>
