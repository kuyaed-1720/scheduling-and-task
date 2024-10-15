@extends('layout')

@section('title')
	Schedule
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
	
	<div id="calendar"></div>
	<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
	<div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form id="eventForm" action="{{ route('events.store') }}" method="POST" style="display: inline;">
					@csrf
					<div class="modal-header">
						<h1 class="modal-title">Add Event</h1>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="title">Event Title</label>
							<input type="text" class="form-control" id="title" name="title" required>
						</div>
						<div class="form-group">
							<label for="start">Start Date</label>
							<input type="date" class="form-control" id="start" name="start" required>
						</div>
						<div class="form-group">
							<label for="end">End Date</label>
							<input type="date" class="form-control" id="end" name="end">
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
	document.addEventListener('DOMContentLoaded', function(){

		var calendarEl = document.getElementById('calendar');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			headerToolbar: {
				start: 'prev today dayGridMonth',
				center: 'title',
				end: 'timeGridWeek timeGridDay listWeek next',
			},
			locale: 'en',
			initialView: 'dayGridMonth',
			editable: true,
			selectable: true,
			eventColor: 'green',
			businessHours: { 
				daysOfWeek: [1, 2, 3, 4, 5],
				title: this.title,
				start: '8:00',
				end: '17:00',
				allday:false,
			},
			selectAllow: function(selectInfo){
				var day = selectInfo.start.getUTCDay();
				if (day === 5 || day === 6){
					
					return false;
				}
				return true;
			},
			eventDrop: function(info){
				var day = info.event.start.getUTCDay();
				if (day === 5 || day === 6){
					info.revert();
				}
			},
			eventReceive: function(info){
				var day = info.event.start.getUTCDay();
				if (day === 5 || day === 6){
					info.revert();
				}
			},
			eventClick: function(info){
				info.event.remove();
			},
			dateClick: function (info) {
				var day = info.date.getUTCDay();
				if (day != 5 && day != 6){
					$('#eventModal').modal('show');
				}
			},
			weekends: true,
		});
		calendar.render();
	 
	});
	</script>
@endsection