@php
    // Restructure userPermissions to make lookup easier
    $storedPermissions = [];
    foreach ($userPermissions as $perm) {
        $key = strtolower(str_replace(' ', '_', $perm->module));
        $storedPermissions[$key][$perm->key] = $perm->value;
    }
    if($user_role == 'admin')
        $modules = ['Users', 'Companies', 'Vehicle', 'Brands', 'Categories', 'Features', 'Models', 'Locations', 'Featured Vehicles', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Clients', 'User IP', 'Blogs', 'Activity Log', 'Contacts', 'Currencies'];
    else
        $modules = ['Vehicle', 'Locations', 'Featured Vehicles', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Clients', 'Activity Log'];
    $actions = ['view', 'edit'];
@endphp


<thead class="thead-dark">
    <tr>
        <th>
            {{ __('messages.module') }}
        </th>
        @foreach ($actions as $action)
            <th>{{ ucfirst($action) }}</th>
        @endforeach
        <th>Check/Uncheck Module</th>
    </tr>
</thead>
@php
    $vehicleSubmodules = [
        'Brands',
        'Categories',
        'Features',
        'Models',
        'Locations',
        'Featured Vehicles'
    ];
@endphp

<tbody>
    @foreach ($modules as $module)
        @php
            $key = strtolower(str_replace(' ', '_', $module));
            $isSubmodule = in_array($module, $vehicleSubmodules);
        @endphp

        {{-- Skip rendering submodules here, we’ll render them after "Vehicle" --}}
        @if ($isSubmodule)
            @continue
        @endif

        {{-- Main module row --}}
        <tr data-module="{{ $key }}" class="{{ $key === 'vehicle' ? 'vehicle-parent-row clickable' : '' }}">
            <td>
                @if ($key === 'vehicle')
                    <span class="toggle-arrow" style="cursor: pointer;">►</span>
                @endif
                {!! $key === 'vehicle' ? '<strong>' . $module . '</strong>' : e($module) !!}
            </td>

                @foreach ($actions as $action)
                    <td>
                        @php
                            $showCheckbox = true;

                            if ($key === 'calendar' && $action === 'edit') {
                                $showCheckbox = false;
                            }

                            if ($key === 'bookings' && $action === 'edit' && $user_role !== 'admin') {
                                $showCheckbox = false;
                            }
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


        {{-- If current module is "Vehicle", render submodules --}}
        @if ($key === 'vehicle')
            @foreach ($vehicleSubmodules as $submodule)
                @php
                    $subKey = strtolower(str_replace(' ', '_', $submodule));
                @endphp
                <tr class="vehicle-submodule d-none ml-4" data-parent="vehicle" data-submodule="{{ $subKey }}" style="background-color: #f0f0f0;">
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





    
