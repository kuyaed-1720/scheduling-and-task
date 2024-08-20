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
          events: @json($events)
      });
      calendar.render();
  });
</script>
<div id="calendar"></div>
@endsection