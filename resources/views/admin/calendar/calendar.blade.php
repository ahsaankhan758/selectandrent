@extends('admin.layouts.Master')
@section('title'){{__('messages.calendar') }} @endsection
@section('content')
{{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.15/index.global.min.js'></script> --}}

    <div class="row">
        <div class="col">
            <div class="page-title-box">
                <div id="success-message" class="alert alert-success d-none" role="alert"></div>
                <h4 class="page-title">Calendar</h4>
            </div>
        </div>
    </div>     
    <div class="row">   
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div id="external-events">
                        </div>
                        <div class="col">
                            <div id="calendar"></div>
                        </div> 
                    </div>  
                </div>
            </div> 
            <div class="modal fade" id="event-modal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            <h5 class="modal-title" id="modal-title">Event</h5>
                        </div>
                        <div class="modal-body px-4 pb-4 pt-0">
                            <form name="event-form" id="form-event">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Event Name</label>
                                            <input class="form-control" placeholder="Insert Event Name"
                                                type="text" name="title" id="event-title" required />
                                            <div class="invalid-feedback">Please provide a valid event name</div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label class="form-label">Category</label>
                                            <select class="form-select" name="category" id="event-category" required>
                                                <option value="bg-danger" selected>Danger</option>
                                                <option value="bg-success">Success</option>
                                                <option value="bg-primary">Primary</option>
                                                <option value="bg-info">Info</option>
                                                <option value="bg-dark">Dark</option>
                                                <option value="bg-warning">Warning</option>
                                            </select>
                                            <div class="invalid-feedback">Please select a valid event category</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <label class="form-label">Category</label>
                                            <select class="form-select" name="location" id="event-location">
                                                <option value="bg-danger" >Lahore</option>
                                                <option value="bg-success">Multan</option>
                                                <option value="bg-primary">Pindi</option>
                                                <option value="bg-info">karachi</option>
                                            </select>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-md-6 col-4">
                                        <button type="button" class="btn btn-danger" id="btn-delete-event" >Delete</button>
                                    </div>
                                    <div class="col-md-6 col-8 text-end">
                                        <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                        <button type="submit" class="btn btn-success" id="btn-edit-event">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div> 
            </div>
        </div>
    </div> 
<script>
    
</script>
{{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
    var calendarEl = document.getElementById("calendar");
    var eventModal = new bootstrap.Modal(document.getElementById("event-modal"));

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: "dayGridMonth",
        events: "{{ route('getEvents') }}", 
        dateClick: function (info) {
            eventModal.show();
        }
    });

    calendar.render();

    document.getElementById("form-event").addEventListener("submit", function (event) {
        event.preventDefault();

        var title = document.getElementById("event-title").value;
        var category = document.getElementById("event-category").value;
        var start = new Date().toISOString().slice(0, 19).replace("T", " "); 
        var allDay = false;

        fetch("{{ route('storeEvents') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                title: title,
                category: category,
                start: start,
                end: start,
                all_day: allDay,
            }),
        })
        .then(response => response.json())
        .then(data => {
            let messageDiv = document.getElementById("success-message");
            messageDiv.innerText = "✅ " + data.message;
            messageDiv.classList.remove("d-none");
            document.getElementById("form-event").reset();
            eventModal.hide();

            setTimeout(() => {
                messageDiv.style.transition = "opacity 1.5s ease"; 
                messageDiv.style.opacity = "0"; 

                setTimeout(() => {
                    messageDiv.classList.add("d-none"); 
                    messageDiv.style.opacity = "1";
                }, 1500); 
            }, 6000);

            // 🔄 Refresh calendar to show new event
            calendar.refetchEvents();
        })
        .catch(error => console.error("Error:", error));
    });
});

</script> --}}
@endsection
