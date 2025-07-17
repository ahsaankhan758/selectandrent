
@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} {{ __('messages.employee') }} @endsection
@section('content')
    @if(in_array(auth()->user()->role, ['admin','company']))
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>


        /* Style the tab */
        .tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
        background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
        background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
        }
        </style>
        <div class="col">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.create') }} {{ __('messages.employee') }}</h4>
                    <a href=" {{ route('employee') }}" class="btn btn-primary float-end" >{{__('messages.back') }}</a>
                </div>
                <div class="card-body">
                    <div class="tab">
                        <button class="tablinks active" onclick="openForm(event, 'information')">{{ __('messages.information') }}</button>
                        <button class="tablinks" onclick="openForm(event, 'permissions'); loadPermissions()">{{ __('messages.permissions') }}</button>
                    </div>
                    <form action="{{ route('storeEmployee') }}" method="POST">
                        @csrf
                        <div id="information" class="tabcontent" style="display: block;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <lable for="name">{{ __('messages.name') }}</lable>
                                        <input type="text" name="name" class="form-control" value="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <lable for="email"> {{ __('messages.email') }}</lable>
                                        <input type="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <lable for="phone">{{ __('messages.phone') }}</lable>
                                        <input type="text" name="phone" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">{{ __('messages.password') }}</label>
                                        <input id="password" type="password" class="form-control" name="password" autocomplete="new-password">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password-confirm" >{{ __('messages.confirm_password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group mb-3">
                                        <lable for="designation">{{ __('messages.designation') }}</lable>
                                        <input type="text" name="designation" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <lable for="id_number">{{ __('messages.id_number') }} </lable>
                                        <input type="text" name="id_number" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <lable for="address">{{ __('messages.address') }} </lable>
                                        <input type="text" name="address" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <lable for="age">{{ __('messages.age') }} </lable>
                                        <input type="text" name="age" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 float-end">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.submit') }}</button>
                                </div>
                            </div>
                        </div>
                        <div id="permissions" class="tabcontent">
                            <div id="checkAll" class="mb-2 d-flex justify-content-end">
                            <div>
                                <input type="checkbox" id="masterCheckbox">
                                <label for="masterCheckbox">{{ __('messages.check') }}/{{ __('messages.uncheck') }} {{ __('messages.all') }} </label>
                            </div>
                        </div>
                        <table class="table table-bordered text-center " id="permissionsTable">
                            @php
                                // Restructure userPermissions to make lookup easier
                                if(isset($userPermissions)){
                                    $storedPermissions = [];
                                    foreach ($userPermissions as $perm) {
                                        $key = strtolower(str_replace(' ', '_', $perm->module));
                                        $storedPermissions[$key][$perm->key] = $perm->value;
                                    }
                                }
                                $owner_role = auth()->user()->role;
                                
                                
                                if(isset($owner_role)){
                                    if ($owner_role == 'admin') {
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
                                }
                                $actions = ['view', 'edit'];
                                $settingSubmodules = ['General Module', 'Permissions', 'Payment Modules' , 'Googel Map Modules', 'Currencies'];
                            @endphp

                            <thead class="thead-dark">
                                <tr>
                                    <th>{{ __('messages.module') }}</th>
                                    @foreach ($actions as $action)
                                        <th>{{ __('messages.' . $action) }}</th>
                                    @endforeach
                                    <th>{{ __('messages.check') }}/{{ __('messages.uncheck') }} {{ __('messages.module') }}</th>
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

                                    {{-- vehicles Submodules --}}
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
                        </table>
                        </div>
                    </form>
                </div> 
            </div> 
        </div>
        <script>
            function openForm(evt, tabName) {
                var i, tabcontent, tablinks;
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }
                document.getElementById(tabName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            function loadPermissions(){
                bindMasterCheckbox();
                bindVehicleSubmenuEvents();
                bindSettingsSubmenuEvents();

                // Toggle for vehicles
                $('.vehicles-parent-row .toggle-arrow').on('click', function () {
                    const $arrow = $(this);
                    const subRows = $('.vehicles-submodule');
                    const isCollapsed = subRows.hasClass('d-none');
                    subRows.toggleClass('d-none');
                    $arrow.text(isCollapsed ? '▼' : '►');
                });

                // Toggle for Settings
                $('.settings-parent-row .toggle-arrow').on('click', function () {
                    const $arrow = $(this);
                    const subRows = $('.settings-submodule');
                    const isCollapsed = subRows.hasClass('d-none');
                    subRows.toggleClass('d-none');
                    $arrow.text(isCollapsed ? '▼' : '►');
                });

                $('#savePermissionsBtn').removeClass('d-none');
                $('#checkAll').removeClass('d-none');

                updateMasterCheckboxState();
                updateRowCheckboxes();
                updateVehicleSubmodulesVisibility();

                $(`input[name="permissions[vehicles][view]"],
                    input[name="permissions[vehicles][edit]"],
                    .row-checkbox[data-row="vehicles"]`).on('change', function () {
                    updateVehicleSubmodulesVisibility();
                });

                $(`input[name="permissions[settings][view]"],
                    input[name="permissions[settings][edit]"],
                    .row-checkbox[data-row="settings"]`).on('change', function () {
                    $('.settings-submodule').removeClass('d-none');
                });
            }
        </script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection


