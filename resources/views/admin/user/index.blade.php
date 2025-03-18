
@extends('admin.layouts.Master')
@section('title') {{__('messages.users') }} @endsection
@section('content')

    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{__('messages.user') }}</h4>
                <a href=" {{ route('createUser') }}" class="btn float-end" >{{__('messages.create') }} {{__('messages.user') }}</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="myTable">
                    <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">{{__('messages.name') }}</th>
                        <th scope="col">{{__('messages.email') }}</th>
                        <th scope="col">{{__('messages.role') }}</th>
                        <th scope="col">{{__('messages.status') }}</th>
                        <th scope="col">{{__('messages.action') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                        @if(isset($users))
                            @foreach ($users as $userdata)
                                <tr>
                                    <td>{{ $userdata->id }}</td>
                                    <td>{{ $userdata->name }}</td>
                                    <td>{{ $userdata->email }}</td>
                                    <td>{{ $userdata->role }}</td>
                                    <td>{{ $userdata->status }}</td>
                                    @if($userdata->id == $current_user)
                                    <td>
                                        <a href="{{ route('editUser',$userdata->id) }}" class="disabled-link">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a href="{{ route('deleteUser',$userdata->id) }}"  class="btn-delete disabled-link">
                                            <i class="fa-sharp fa-solid fa-trash" style="color: red" disabled></i>
                                        </a>
                                    </td>    
                                @else
                                    <td>
                                        <a href="{{ route('editUser',$userdata->id) }}"><i class="fa-solid fa-pen-to-square "></i></a>
                                        <a href="{{ route('deleteUser',$userdata->id) }}"  class="btn-delete"><i class="fa-sharp fa-solid fa-trash" style="color: red"></i></a>
                                    </td>    
                                    @endif        
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                    {{ $users->links() }}
                </table>
            </div> 
        </div> 
    </div>
    <script>
        var translations = {
            search: "{{ __('messages.search') }}"
        };
    </script>
                            
@endsection

