@extends('admin.layouts.Master')
@section('title') {{ __('messages.user IP') }} @endsection
@section('content')
   
    <style>
        .disabled-link {
        pointer-events: none; /* Prevents clicking */
        opacity: 0.5; /* Makes it look disabled */
            }
    </style>
    
    <div class="col-8 mt-4">
        <label>{{ __('messages.user IP') }}</label>
        {{$current_user_ip}}
        <label>Internet {{ __('messages.user IP') }}</label>
        {{$internet_ip}}
        <div class="card">
            <div class="card-header">
                <h4>{{ __('messages.user IP') }}</h4>
                <a href=" {{ route('createIpAddress') }}" class="btn btn-primary float-end" >{{ __('messages.create') }}</a>
            </div>
            <div class="card-body">
                <table class="table table-dark" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('messages.user') }} {{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.registered') }} IP</th>
                            <th scope="col">{{ __('messages.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($all_IP))
                            @foreach ($all_IP as $IP_Data)
                                <tr>
                                    <td>{{ $IP_Data->id }}</td>
                                    <td>{{ $IP_Data->user_name }}</td>
                                    <td>{{ $IP_Data->ip_address }}</td>
                                    @if ( $IP_Data->user_name == $current_user)
                                        <td>
                                            <a href="{{ route('deleteIpAddresses', $IP_Data->id) }}" class="disabled-link">
                                                <i class="fa-sharp fa-solid fa-trash" style="color: red"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td>
                                            <a href="{{ route('deleteIpAddresses', $IP_Data->id) }}" class="btn-delete">
                                                <i class="fa-sharp fa-solid fa-trash" style="color: red"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {{ $all_IP->links() }}
                </table>
            </div>
        </div>
    </div>
@endsection