@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.usercontacts') }}
@endsection
@section('content')
    <?php
        if (Auth::check()) {
            $role = Auth::user()->role;
            $userId = auth()->id();
        }
        $owner = EmployeeOwner($userId);
    ?>
    @if ($role == 'admin' || !empty($owner) && $owner->role == 'admin' )
        @if(can('contact', 'view'))
            <div class="col">
                <form action="{{ route('deleteContact') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="card mt-4">
                        <div class="card-header">
                            <h4>{{ __('messages.usercontacts') }}</h4>
                            <div class="float-end">
                                @if (can('Contacts', 'edit'))
                                    <button type="submit" class="btn btn-delete-logs btn-danger" id="delete-btn-recieve"
                                        disabled>{{ __('messages.userdelete') }}</button>
                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="myTable">
                                    <thead class="text-center text-nowrap">


                                        <tr>
                                            <th><input type="checkbox" id="selectAllLogs"></th>
                                            <th scope="col">{{ __('messages.useremailsent') }}</th>
                                            <th scope="col">{{ __('messages.userfirst') }}</th>
                                            <th scope="col">{{ __('messages.userlast') }}</th>
                                            <th scope="col">{{ __('messages.useremail') }}</th>
                                            <th scope="col">{{ __('messages.userphone') }}</th>
                                            <th scope="col">{{ __('messages.Subject') }}</th>
                                            <th scope="col">{{ __('messages.usermessage') }}</th>
                                            <th scope="col">{{ __('messages.userdate') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (isset($contacts))
                                            @foreach ($contacts as $contact)
                                                <tr class="text-nowrap">
                                                    <td><input type="checkbox" name="selected_ids[]" value="{{ $contact->id }}"
                                                            class="logCheckbox"></td>
                                                    <td>
                                                        @if ($contact->status == 1)
                                                            <span class="badge bg-success">Yes</span>
                                                        @else
                                                            <span class="badge bg-danger">No</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $contact->first_name }}</td>
                                                    <td>{{ $contact->last_name }}</td>
                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->phone }}</td>
                                                    <td><b>{{ $contact->subject }}</b></td>
                                                    <td>{{ Str::limit($contact->message, 50) }}</td>
                                                    <td>{{ $contact->created_at->format('d M Y h:i A') }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="7" class="text-center">{{ __('messages.nomails') }}</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            <div class="mt-3">
                                {{ $contacts->links() }}
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <script>
                const selectAll = document.getElementById('selectAllLogs');
                const checkboxes = document.querySelectorAll('.logCheckbox');
                const deleteButton = document.getElementById('delete-btn-recieve');

                function toggleDeleteButton() {
                    let anyChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
                    deleteButton.disabled = !anyChecked;
                }

                if (selectAll) {
                    selectAll.addEventListener('change', function() {
                        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
                        toggleDeleteButton();
                    });
                }

                checkboxes.forEach(checkbox => {
                    checkbox.addEventListener('change', toggleDeleteButton);
                });

                toggleDeleteButton();
            </script>
        @else
            <div class="alert alert-danger" role="alert">
                Access Denied
            </div>
        @endif  
    @else
        <div class="alert alert-danger" role="alert">
            Access Denied
        </div>
    @endif  
@endsection
