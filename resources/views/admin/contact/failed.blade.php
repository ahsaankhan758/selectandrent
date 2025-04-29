@extends('admin.layouts.Master')
@section('title')
Failed Emails
@endsection

@section('content')
<div class="col">
    <form action="{{ route('deleteFailedContact') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="card mt-4">
            <div class="card-header">
                <h4>Failed Emails</h4>
                <div class="float-end">
                    @if(can('Contacts','delete')) 
                        <button type="submit" class="btn btn-danger" id="delete-btn-failed" disabled>Delete</button>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="myTable">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Message</th>
                            <th scope="col">Date</th>
                            <th><input type="checkbox" id="selectAllFailed"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($failedContacts))
                            @foreach ($failedContacts as $failed)
                                <tr>
                                    <td>{{ $failed->first_name }}</td>
                                    <td>{{ $failed->last_name }}</td>
                                    <td>{{ $failed->email }}</td>
                                    <td>{{ $failed->phone }}</td>
                                    <td>{{ Str::limit($failed->message, 50) }}</td>
                                    <td>{{ $failed->created_at->format('d M Y h:i A') }}</td>
                                    <td><input type="checkbox" name="selected_ids[]" value="{{ $failed->id }}" class="failedCheckbox"></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No failed emails found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="mt-3">
                    {{ $failedContacts->links() }}
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    const selectAllFailed = document.getElementById('selectAllFailed');
    const failedCheckboxes = document.querySelectorAll('.failedCheckbox');
    const deleteFailedButton = document.getElementById('delete-btn-failed');

    function toggleFailedDeleteButton() {
        let anyChecked = Array.from(failedCheckboxes).some(checkbox => checkbox.checked);
        deleteFailedButton.disabled = !anyChecked;
    }

    if (selectAllFailed) {
        selectAllFailed.addEventListener('change', function () {
            failedCheckboxes.forEach(checkbox => checkbox.checked = this.checked);
            toggleFailedDeleteButton();
        });
    }

    failedCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleFailedDeleteButton);
    });

    toggleFailedDeleteButton();
</script>
@endsection
