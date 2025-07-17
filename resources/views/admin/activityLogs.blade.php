@extends('admin.layouts.Master')
@section('title'){{__('messages.activity_logs') }} @endsection
@section('content')
    @if (can('activity_logs', 'view'))
        <div class="col">
            <form action="{{ route('deleteAcvtivityLogs') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>{{__('messages.activity_logs') }}</h4>
                        <div class="float-end">
                            @if(can('Activity Log','edit'))
                                <button type="submit" class="btn btn-delete-logs btn-danger" id="delete-btn-activity">{{__('messages.delete') }}</button>
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="myTable">
                            <thead class="align-text-center">
                            <tr>
                                <th scope="col">{{__('messages.user') }}</th>
                                <th scope="col">{{__('messages.activity') }}</th>
                                <th scope="col">{{__('messages.module') }}</th>
                                <th scope="col">{{__('messages.description') }}</th>
                                <th scope="col">{{__('messages.date') }}</th>
                                <th scope="col"><input type="checkbox" name="selectAllLogs" id="selectAllLogs"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($activityLogs))
                                    @foreach ( $activityLogs as $activityLog)
                                        <tr>
                                            <td>{{ $activityLog->users ? $activityLog->users->name : ' ' }}</td>
                                            <td>{{ $activityLog->action }}</td>
                                            <td>{{ $activityLog->module }}</td>
                                            <td>{{ unserialize($activityLog->description) }}</td>
                                            <td>{{ $activityLog->created_at->diffForHumans() }}</td>
                                            <td><input class="logCheckbox" type="checkbox" name="activityLogs[]" value="{{ $activityLog->id }}"></td>                                   
                                        </tr>
                                    @endforeach 
                                @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            {{ $activityLogs->links() }}
                        </div>
                    </div> 
                </div>
            </form> 
        </div>
        <script>
            const selectAll = document.getElementById('selectAllLogs');
            const checkboxes = document.querySelectorAll('.logCheckbox');
            const deleteButton = document.querySelector('.btn-delete-logs');
            if(document.getElementById('delete-btn-activity'))
                document.getElementById('delete-btn-activity').disabled = true;

            function toggleDeleteButton() {
                let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                deleteButton.disabled = !anyChecked;
            }

            selectAll.addEventListener('change', function() {
                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                toggleDeleteButton();
            });

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', toggleDeleteButton);
            });
        </script>
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection



