
@extends('admin.layouts.Master')
@section('title') {{__('messages.employees') }} @endsection
@section('content')
    @if(in_array(auth()->user()->role, ['admin', 'company']))
        <div class="col-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4>{{__('messages.employees') }}</h4>
                    <!-- @if(can('users','edit')) -->
                        <a href=" {{ route('createEmployee') }}" class="btn float-end" style="background-color: #f06115; color: white " >{{__('messages.create') }} {{__('messages.employee') }}</a>
                    <!-- @endif -->
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead>
                        <tr>
                            <th scope="col">{{__('messages.name') }}</th>
                            <th scope="col">{{__('messages.email') }}</th>
                            <th scope="col">{{__('messages.designation') }}</th>
                            <th scope="col">{{__('messages.phone') }}</th>
                            <th scope="col">{{__('messages.id_number') }}</th>
                            <th scope="col">{{__('messages.age') }}</th>
                            <th scope="col">{{__('messages.address') }}</th>
                            <th scope="col">{{__('messages.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if(isset($employees))
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ $employee->employee->name }}</td>
                                        <td>{{ $employee->employee->email }}</td>
                                        <td> {{ $employee->designation }}</td>
                                        <td> {{ $employee->employee->phone }}</td>
                                        <td> {{ $employee->id_number }}</td>
                                        <td> {{ $employee->age }}</td>
                                        <td> {{ $employee->address }}</td>
                                        <td>
                                            <!-- @if(can('users','edit')) -->
                                                <a href="{{ route('editEmployee',$employee->id) }}"><i class="fa-solid fa-pen-to-square "></i></a>
                                            <!-- @endif
                                            @if(can('users','edit')) -->
                                                <a href="{{ route('deleteEmployee',$employee->e_user_id) }}"  class="btn-delete"><i class="fa-sharp fa-solid fa-trash" style="color: red"></i></a>
                                            <!-- @endif -->
                                        </td>    
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        {{ $employees->links() }}
                    </table>
                </div> 
            </div> 
        </div>
        <script>
            var translations = {
                search: "{{ __('messages.search') }}"
            };
        </script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif                          
@endsection

