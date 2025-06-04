
@extends('admin.layouts.Master')
@section('title') {{ __('messages.create') }} {{ __('messages.employee') }} @endsection
@section('content')
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
                    <button class="tablinks active" onclick="openForm(event, 'information')">Information</button>
                    <button class="tablinks" onclick="openForm(event, 'permissions'); loadPermissions()">Permissions</button>
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
                                    <label for="password-confirm" >{{ __('messages.confirm password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <lable for="role">{{ __('messages.role') }}</lable>
                                    <select name="role" class="form-control">
                                        <option disabled selected>{{ __('messages.select') }}</option>
                                        <option value="Role1">Role1</option>
                                        <option value="Role2">Role2</option>
                                        <option value="Role3">Role3</option>
                                        <option value="Role4">Role4</option>
                                    </select>
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
                            <label for="masterCheckbox">Check/Uncheck All</label>
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
                                    $modules = ['Users', 'Companies', 'Vehicle', 'Brands', 'Categories', 'Features', 'Models', 'Locations', 'Featured Vehicles', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Earning Summary', 'Transaction History', 'Clients', 'User IP', 'Blogs', 'Activity Log', 'Contacts', 'Currencies'];
                                    $vehicleSubmodules = ['Brands', 'Categories', 'Features', 'Models', 'Locations', 'Featured Vehicles'];
                                } else {
                                    $modules = ['Vehicle', 'Locations', 'Featured Vehicles', 'Analytics', 'Calendar', 'Bookings', 'Financial', 'Earning Summary', 'Transaction History', 'Clients', 'Activity Log'];
                                    $vehicleSubmodules = ['Locations', 'Featured Vehicles'];
                                }
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
                            @if(isset($modules))
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
                                                                    && !($key === 'bookings' && $action === 'edit' && $owner_role !== 'admin');
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
                            @endif
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
            handleFinancialParentAutoCheck();
            bindVehicleSubmenuEvents();
            bindFinancialSubmenuEvents();

            // Toggle for Vehicle
            $('.vehicle-parent-row .toggle-arrow').on('click', function () {
                const $arrow = $(this);
                const subRows = $('.vehicle-submodule');

                const isCollapsed = subRows.hasClass('d-none');

                if (isCollapsed) {
                    subRows.removeClass('d-none');
                    $arrow.text('▼');
                } else {
                    subRows.addClass('d-none');
                    $arrow.text('►');
                }
            });

            // Toggle for Financial
            $('.financial-parent-row .toggle-arrow').on('click', function () {
                const $arrow = $(this);
                const subRows = $('.financial-submodule');

                const isCollapsed = subRows.hasClass('d-none');

                if (isCollapsed) {
                    subRows.removeClass('d-none');
                    $arrow.text('▼');
                } else {
                    subRows.addClass('d-none');
                    $arrow.text('►');
                }
            });


            $('#savePermissionsBtn').removeClass('d-none');
            $('#checkAll').removeClass('d-none');

            updateMasterCheckboxState();
            updateRowCheckboxes();
            updateVehicleSubmodulesVisibility();
            updateFinancialSubmodulesVisibility();
            handleVehicleParentAutoCheck();
            handleFinancialParentAutoCheck();

            $(`input[name="permissions[vehicle][view]"],
                input[name="permissions[vehicle][edit]"],
                .row-checkbox[data-row="vehicle"]`).on('change', function () {
                updateVehicleSubmodulesVisibility();
            });

            $(`input[name="permissions[financial][view]"],
                input[name="permissions[financial][edit]"],
                .row-checkbox[data-row="financial"]`).on('change', function () {
                updateFinancialSubmodulesVisibility();
            });
        }
    </script>
@endsection


