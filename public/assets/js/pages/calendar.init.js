

// !function(l){"use strict";function e(){this.$body=l("body"),this.$modal=l("#event-modal"),this.$calendar=l("#calendar"),this.$formEvent=l("#form-event"),this.$btnNewEvent=l("#btn-new-event"),this.$btnDeleteEvent=l("#btn-delete-event"),this.$btnSaveEvent=l("#btn-save-event"),this.$modalTitle=l("#modal-title"),this.$calendarObj=null,this.$selectedEvent=null,this.$newEventData=null}e.prototype.onEventClick=function(e){this.$formEvent[0].reset(),this.$formEvent.removeClass("was-validated"),this.$newEventData=null,this.$btnDeleteEvent.show(),this.$modalTitle.text("Edit Event"),this.$modal.show(),this.$selectedEvent=e.event,l("#event-title").val('Custom'),l("#event-category").val(this.$selectedEvent.classNames[0])},e.prototype.onSelect=function(e){this.$formEvent[0].reset(),this.$formEvent.removeClass("was-validated"),this.$selectedEvent=null,this.$newEventData=e,this.$btnDeleteEvent.hide(),this.$modalTitle.text("Add New Event"),this.$modal.show(),this.$calendarObj.unselect()},e.prototype.init=function(){this.$modal=new bootstrap.Modal(document.getElementById("event-modal"),{keyboard:!1});var e=new Date(l.now());new FullCalendar.Draggable(document.getElementById("external-events"),{itemSelector:".external-event",eventData:function(e){return{title:e.innerText,className:l(e).data("class")}}});var t=[{title:"Meeting with Mr. Shreyu",start:new Date(l.now()+158e6),end:new Date(l.now()+338e6),className:"bg-warning"},{title:"Interview - Backend Engineer",start:e,end:e,className:"bg-success"},{title:"Phone Screen - Frontend Engineer",start:new Date(l.now()+168e6),className:"bg-info"},{title:"Buy Design Assets",start:new Date(l.now()+338e6),end:new Date(l.now()+4056e5),className:"bg-primary"}],a=this;a.$calendarObj=new FullCalendar.Calendar(a.$calendar[0],{slotDuration:"00:15:00",slotMinTime:"08:00:00",slotMaxTime:"19:00:00",themeSystem:"bootstrap",bootstrapFontAwesome:!1,buttonText:{today:"Today",month:"Month",week:"Week",day:"Day",list:"List",prev:"Prev",next:"Next"},initialView:"dayGridMonth",handleWindowResize:!0,height:l(window).height()-200,headerToolbar:{left:"prev,next today",center:"title",right:"dayGridMonth,timeGridWeek,timeGridDay,listMonth"},initialEvents:t,editable:!0,droppable:!0,selectable:!0,dateClick:function(e){a.onSelect(e)},eventClick:function(e){a.onEventClick(e)}}),a.$calendarObj.render(),a.$btnNewEvent.on("click",function(e){a.onSelect({date:new Date,allDay:!0})}),a.$formEvent.on("submit",function(e){e.preventDefault();var t,n=a.$formEvent[0];n.checkValidity()?(a.$selectedEvent?(a.$selectedEvent.setProp("title",l("#event-title").val()),a.$selectedEvent.setProp("classNames",[l("#event-category").val()])):(t={title:l("#event-title").val(),start:a.$newEventData.date,allDay:a.$newEventData.allDay,className:l("#event-category").val()},a.$calendarObj.addEvent(t)),a.$modal.hide()):(e.stopPropagation(),n.classList.add("was-validated"))}),l(a.$btnDeleteEvent.on("click",function(e){a.$selectedEvent&&(a.$selectedEvent.remove(),a.$selectedEvent=null,a.$modal.hide())}))},l.CalendarApp=new e,l.CalendarApp.Constructor=e}(window.jQuery),function(){"use strict";window.jQuery.CalendarApp.init()}();
(function ($) {
    "use strict";

    function CalendarApp() {
        this.$body = $("body");
        this.$modal = $("#event-modal");
        this.$calendar = $("#calendar");
        this.$formEvent = $("#form-event");
        this.$btnNewEvent = $("#btn-new-event");
        this.$btnDeleteEvent = $("#btn-delete-event");
        this.$btnSaveEvent = $("#btn-save-event");
        this.$modalTitle = $("#modal-title");
        this.$calendarObj = null;
        this.$selectedEvent = null;
        this.$newEventData = null;
    }

    CalendarApp.prototype.onEventClick = function (event) {
        this.$formEvent[0].reset();
        this.$formEvent.removeClass("was-validated");
        this.$newEventData = null;
        this.$btnDeleteEvent.show();
        this.$modalTitle.text("Edit Event");
        this.$modal.show();
        this.$selectedEvent = event.event;
        $("#event-title").val(this.$selectedEvent.title);
        $("#event-category").val(this.$selectedEvent.classNames[0]);
    };

    CalendarApp.prototype.onSelect = function (event) {
        this.$formEvent[0].reset();
        this.$formEvent.removeClass("was-validated");
        this.$selectedEvent = null;
        this.$newEventData = event;
        this.$btnDeleteEvent.hide();
        this.$modalTitle.text("Add New Event");
        this.$modal.show();
        this.$calendarObj.unselect();
    };

    CalendarApp.prototype.init = function () {
        this.$modal = new bootstrap.Modal(document.getElementById("event-modal"), { keyboard: false });
        var currentDate = new Date($.now());

        new FullCalendar.Draggable(document.getElementById("external-events"), {
            itemSelector: ".external-event",
            eventData: function (eventEl) {
                return {
                    title: eventEl.innerText,
                    className: $(eventEl).data("class")
                };
            }
        });
       
        var events = function eventValues()
            {
                return new Promise((resolve) => {
                    $.ajax({
                            url: "/admin/getEvents", 
                            method: "GET",
                            dataType: "json",
                            success: function (response) {
                                console.log(response);
                                resolve(response);
                            },
                            error: function (xhr, status, error) {
                                console.error("Error fetching events:", xhr.responseText);
                            }
                            });
                });
                
            };
        // $.ajax({
        //     url: "/admin/storeEvents", // Ensure the correct route
        //     method: "POST",
        //     contentType: "application/json", // Set content type to JSON
        //     data: JSON.stringify({ events: events }), // Convert JavaScript object to JSON string
        //     dataType: "json",
        //     headers: {
        //         "X-CSRF-Token": $('meta[name="csrf-token"]').attr('content') // Retrieve CSRF token from meta tag
        //     },
        //         success: function (response) {
        //             var events = response.events; // Check if API returns { "events": [ {title, start, end, className} ] }
        //             // console.log("Fetched Events:", events); // Debugging output
        //             // self.initializeCalendar(events);
        //         },
        //         error: function (xhr, status, error) {
        //             console.error("Error fetching events:", xhr.responseText); // More detailed error logging
        //             if (typeof self.initializeCalendar === "function") {
        //                 self.initializeCalendar([]);
        //             }
        //         }
        //     });

        var self = this;
        this.$calendarObj = new FullCalendar.Calendar(this.$calendar[0], {
            slotDuration: "00:15:00",
            slotMinTime: "08:00:00",
            slotMaxTime: "19:00:00",
            themeSystem: "bootstrap",
            bootstrapFontAwesome: false,
            buttonText: {
                today: "Today",
                month: "Month",
                week: "Week",
                day: "Day",
                list: "List",
                prev: "Prev",
                next: "Next"
            },
            initialView: "dayGridMonth",
            handleWindowResize: true,
            height: $(window).height() - 200,
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
            },
            events: events,
            editable: true,
            droppable: true,
            selectable: true,
            dateClick: function (info) {
                self.onSelect(info);
            },
            eventClick: function (info) {
                self.onEventClick(info);
            }, 
            onSelect: function(info){
                console.log(info+"something");
            }
        });

        this.$calendarObj.render();
        
        this.$btnNewEvent.on("click", function () {
            self.onSelect({ date: new Date(), allDay: true });
        });

        this.$formEvent.on("submit", function (event) {
            event.preventDefault();
            var form = self.$formEvent[0];

            if (form.checkValidity()) {
                if (self.$selectedEvent) {
                    self.$selectedEvent.setProp("title", $("#event-title").val());
                    self.$selectedEvent.setProp("classNames", [$("#event-category").val()]);
                } else {
                    var newEvent = {
                        title: $("#event-title").val(),
                        start: self.$newEventData.date,
                        allDay: self.$newEventData.allDay,
                        className: $("#event-category").val()
                    };
                    self.$calendarObj.addEvent(newEvent);
                }
                self.$modal.hide();
            } else {
                event.stopPropagation();
                form.classList.add("was-validated");
            }
        });

        $(this.$btnDeleteEvent).on("click", function () {
            if (self.$selectedEvent) {
                self.$selectedEvent.remove();
                self.$selectedEvent = null;
                self.$modal.hide();
            }
        });
    };

    $.CalendarApp = new CalendarApp();
    $.CalendarApp.Constructor = CalendarApp;
})(window.jQuery);

(function () {
    "use strict";
    window.jQuery.CalendarApp.init();
})();
