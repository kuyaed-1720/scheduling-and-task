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
        <button class="btn btn-primary mb-3 btn-sm"><a href="{{ route('tasks.create') }}">Create Task</a></button>
        <button class="btn btn-warning mb-3 btn-sm"><a href="{{ route('tasks.tasksshow') }}">Completed Tasks</a></button>
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
                        <td>
                            @if ($task->description)
                                {{ $task->description }}
                            @else
                                <small>No description set</small>
                            @endif
                        </td>
                        <td>{{ $task->priority }}</td>
                        <td>{{ $task->due }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-s" type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                            @if (!$task->completed)
                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    <button class="btn btn-warning btn-sm" type="submit">Complete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection