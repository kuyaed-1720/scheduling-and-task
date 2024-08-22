@extends('layout')

@section('title')
	Edit Task
@endsection

@section('content')
	<div class="container">
		<h1>Edit Task</h1>
		<form action="{{ route('tasks.update', $task->id) }}" method="post">
			@csrf
			@method('PUT')
			<<div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $task->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <select name="priority" id="priority" class="form-control" required>
                    <option value="low" @if ($task->priority == "low") selected	@endif>Low</option>
                    <option value="medium" @if ($task->priority == "medium") selected	@endif>Medium</option>
                    <option value="high" @if ($task->priority == "high") selected	@endif>High</option>
                </select>
            </div>
            <div class="form-group">
                <label for="due">Due</label>
                <input type="date" class="form-control" id="due" name="due" value="{{ $task->due }}">
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
		</form>
	</div>
@endsection