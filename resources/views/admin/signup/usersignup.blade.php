@extends('admin.layouts.Master')
@section('title'){{ __('messages.usersignup') }} @endsection

@section('content')
    @if (can('customer_accounts', 'view'))
        <div class="content-body">
            <div class="booking-container mt-4">
                <div class="booking-header-section">
                    <h2 class="mb-0">{{ __('messages.usersignup') }}</h2>
                </div>
            </div>

            <div class="table-responsive">
                <table id="myTable" class="table table-striped booking-table">
                    <thead class="text-nowrap">
                        <tr>
                            <th class="text-center">{{ __('messages.name') }}</th>
                            <th class="text-center">{{ __('messages.email') }}</th>
                            <th class="text-center">{{ __('messages.contact') }} {{ __('messages.number') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($users->count())
                            @foreach($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">{{ $user->phone }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2" class="text-center">No users found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    @else
    <div class="alert alert-danger" role="alert">
        Access Denied
    </div>
@endif  
@endsection
