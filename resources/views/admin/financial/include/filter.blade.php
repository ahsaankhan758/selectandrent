@php
    $user = auth()->user();
    $owner = EmployeeOwner($user->id);
    $isAdmin = $user->role === 'admin' || (isset($owner) && $owner->role === 'admin');
@endphp

<div class="col-lg-3 justify-content-start {{ $isAdmin ? '' : 'd-none' }}">
    <select name="user_id" id="options-dropdown" class="form-control">
        <option value="">{{ __('messages.company') }}</option>
        @foreach ($companies as $id => $name)
            <option value="{{ $id }}" {{ request('user_id') == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-lg-3 justify-content-start {{ $isAdmin ? '' : 'd-none' }}">
    <select name="country_id" id="country-dropdown" class="form-control">
        <option value="">{{ __('messages.location') }}</option>
        @foreach ($countryNames as $id => $name)
            <option value="{{ $id }}" {{ request('country_id') == $id ? 'selected' : '' }}>
                {{ $name }}
            </option>
        @endforeach
    </select>
</div>

<div class="col-lg-3">
    <input type="date" id="startDate" class="form-control" placeholder="Start Date">
</div>

<div class="col-lg-3">
    <input type="date" id="endDate" class="form-control" placeholder="End Date">
</div>
