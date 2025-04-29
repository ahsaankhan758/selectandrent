@extends('admin.layouts.Master')
@section('title')
Received Emails
@endsection

@section('content')
<div class="col">
    <form action="{{ route('deleteContact') }}" method="POST">
        @csrf
        @method('DELETE')
        <div class="card mt-4">
            <div class="card-header">
                <h4>Received Emails</h4>
                <div class="float-end">
                    @if(can('Contacts','delete')) 
                        <button type="submit" class="btn btn-delete-logs btn-danger" id="delete-btn-recieve" disabled>Delete</button>
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
                            <th><input type="checkbox" id="selectAllLogs"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($contacts))
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->first_name }}</td>
                                    <td>{{ $contact->last_name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ Str::limit($contact->message, 50) }}</td>
                                    <td>{{ $contact->created_at->format('d M Y h:i A') }}</td>
                                    <td><input type="checkbox" name="selected_ids[]" value="{{ $contact->id }}" class="logCheckbox"></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">No received emails found.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

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
        selectAll.addEventListener('change', function () {
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            toggleDeleteButton();
        });
    }

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', toggleDeleteButton);
    });

    toggleDeleteButton();
</script>
@endsection
