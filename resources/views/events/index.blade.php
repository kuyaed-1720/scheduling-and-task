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
							<input type="datetime-local" class="form-control" id="start" name="start" required>
						</div>
						<div class="form-group">
							<label for="end">End Date</label>
							<input type="datetime-local" class="form-control" id="end" name="end">
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
		$(document).ready(function () {
      
			/*------------------------------------------
			--------------------------------------------
			Get Site URL
			--------------------------------------------
			--------------------------------------------*/
			var SITEURL = "{{ url('/') }}";
			
			/*------------------------------------------
			--------------------------------------------
			CSRF Token Setup
			--------------------------------------------
			--------------------------------------------*/
			$.ajaxSetup({
					headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
			});
				
			/*------------------------------------------
			--------------------------------------------
			FullCalender JS Code
			--------------------------------------------
			--------------------------------------------*/
			var calendar = $('#calendar').fullCalendar({
							editable: true,
							events: SITEURL + "/fullcalender",
							displayEventTime: false,
							editable: true,
							eventRender: function (event, element, view) {
									if (event.allDay === 'true') {
													event.allDay = true;
									} else {
													event.allDay = false;
									}
							},
							selectable: true,
							selectHelper: true,
							select: function (start, end, allDay) {
									var title = prompt('Event Title:');
									if (title) {
											var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
											var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
											$.ajax({
													url: SITEURL + "/fullcalenderAjax",
													data: {
															title: title,
															start: start,
															end: end,
															type: 'add'
													},
													type: "POST",
													success: function (data) {
															displayMessage("Event Created Successfully");
	
															calendar.fullCalendar('renderEvent',
																	{
																			id: data.id,
																			title: title,
																			start: start,
																			end: end,
																			allDay: allDay
																	},true);
	
															calendar.fullCalendar('unselect');
													}
											});
									}
							},
							eventDrop: function (event, delta) {
									var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
									var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
	
									$.ajax({
											url: SITEURL + '/fullcalenderAjax',
											data: {
													title: event.title,
													start: start,
													end: end,
													id: event.id,
													type: 'update'
											},
											type: "POST",
											success: function (response) {
													displayMessage("Event Updated Successfully");
											}
									});
							},
							eventClick: function (event) {
									var deleteMsg = confirm("Do you really want to delete?");
									if (deleteMsg) {
											$.ajax({
													type: "POST",
													url: SITEURL + '/fullcalenderAjax',
													data: {
																	id: event.id,
																	type: 'delete'
													},
													success: function (response) {
															calendar.fullCalendar('removeEvents', event.id);
															displayMessage("Event Deleted Successfully");
													}
											});
									}
							}
	
					});
			});
				
			/*------------------------------------------
			--------------------------------------------
			Toastr Success Code
			--------------------------------------------
			--------------------------------------------*/
			function displayMessage(message) {
					toastr.success(message, 'Event');
			} 
	</script>
@endsection