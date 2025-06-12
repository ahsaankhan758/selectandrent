@extends('admin.layouts.Master')
@section('title')
    {{ __('messages.reminder') }}
@endsection
@section('content')

    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header">
                <h4>{{ __('messages.reminder') }}</h4>
                <a href="{{ route('reminders.create') }}" class="btn float-end"
                    style="background-color: #f06115; color: white ">{{ __('messages.create') }}
                    {{ __('messages.reminder') }}</a>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">{{ __('messages.name') }}</th>
                            <th scope="col">{{ __('messages.description') }}</th>
                            <th scope="col">{{ __('messages.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (isset($reminders))
                            @foreach ($reminders as $reminder)
                                <tr>
                                    <td>{{ $reminder->name }}</td>
                                    <td>{{ $reminder->description }}</td>
                                    <td>
                                        <a href="{{ route('reminders.edit', $reminder->id) }}">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        {{-- for delete --}}
                                        <a href="#"
                                            onclick="event.preventDefault(); document.getElementById('delete-form-{{ $reminder->id }}').submit();">
                                            <i class="fa-sharp fa-solid fa-trash" style="color: red;"></i>
                                        </a>

                                        <form id="delete-form-{{ $reminder->id }}"
                                            action="{{ route('reminders.destroy', $reminder->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                        {{-- end delete --}}
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2">No reminders found.</td>
                            </tr>
                        @endif
                    </tbody>

                    @if (isset($reminders))
                        {{ $reminders->links() }}
                    @endif
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
