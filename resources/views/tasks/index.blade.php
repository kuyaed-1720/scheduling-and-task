@extends('layout')

@section('title')
    Tasks
@endsection

@section('content')
    <h1>Task Management</h1>
    <h2>Task List</h2>

    {{-- show success notif --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Task container --}}
    <div class="container">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Create Task</a>
        {{-- <a href="{{ route('tasksshow') }}" class="btn btn-secondary mb-3">Show Completed Tasks</a> --}}
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Due</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->due }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                            {{-- @if (!$task->completed)
                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="btn btn-warning btn-sm" type="submit">Complete</button>
                                </form>
                            @endif --}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection