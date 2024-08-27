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
@endsection