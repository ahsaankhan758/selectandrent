@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.country') }}
@endsection
@section('content')
    @if(can('country', 'view'))
        <div class="col-10">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{ __('messages.country') }}</h4>
                    <div class="mt-1 float-end">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#countryModal">
                            {{ __('messages.create') }}
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal" id="countryModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">{{ __('messages.create') }} {{ __('messages.country') }}</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('countries.store') }}" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="country_name" class="form-label">{{ __('messages.Country') }}</label>
                                            <input type="text" name="name" class="form-control" placeholder="Country Name"
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="country_code" class="form-label">{{ __('messages.Country') }} {{ __('messages.code') }}</label>
                                            <input type="text" name="code" class="form-control"
                                                placeholder="Country Code (e.g., PK, US)" required>
                                        </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">{{ __('messages.create') }}</button>
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">{{ __('messages.close') }}</button>
                                    </form> <!-- Close form here -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Table -->
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('messages.name') }}</th>
                                <th>{{ __('messages.code') }}</th>
                                <th>{{ __('messages.status') }}</th>
                                <th>{{ __('messages.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($countries as $country)
                                <tr>
                                    <td>{{ $country->name }}</td>
                                    <td>{{ $country->code }}</td>
                                    <td>
                                        {{ $country->status ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td>
                                        <a href="{{ route('countries.edit', $country->id) }}"
                                            style="margin-right: 8px; color: #ffc107;">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('countries.destroy', $country->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                style="border: none; background: none; padding: 0; color: red;">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $countries->links() }}
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection
