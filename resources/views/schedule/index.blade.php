@extends('layout')

@section('title')
    Schedule
@endsection

@section('content')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: @json($events),
          dateClick: function(info) {
                var title = prompt('Enter Event Title:');
                var description = prompt('Enter Event Description:');
                if (title && description) {
                    var eventData = {
                        title: title,
                        description: description,
                        start: info.dateStr,
                        end: info.dateStr
                    };
                    calendar.addEvent(eventData);

                    // Save event to the database
                    $.ajax({
                        url: '/save-event',
                        method: 'POST',
                        data: eventData,
                        success: function(response) {
                            alert('Event saved successfully!');
                        },
                        error: function() {
                            alert('There was an error saving the event.');
                        }
                    });
                }
            }
      });
      calendar.render();
  });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

<div id="calendar"></div>
@endsection