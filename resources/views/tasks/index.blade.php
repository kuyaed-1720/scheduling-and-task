@extends('layout')

@section('title')
    Tasks
@endsection

@section('content')
    <h1>Task List</h1>

    {{-- show success notif --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Task container --}}
    <div class="container">
        <form action="{{ route('tasks.create') }}" method="GET" style="display: inline;">
            @csrf
            @method('GET')
            <button class="btn btn-primary mb-3 btn-lg">Create New Task</button>
        </form>
        <form action="{{ route('tasks.tasksshow') }}" method="GET" style="display: inline;">
            @csrf
            @method('GET')
            <button class="btn btn-warning mb-3 btn-lg">Completed Tasks</button>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary">Title</th>
                    <th class="bg-secondary">Description</th>
                    <th class="bg-secondary">Priority</th>
                    <th class="bg-secondary">Due</th>
                    <th class="bg-secondary">Action</th>
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
                            <form action="{{ route('tasks.edit', $task->id) }}" method="GET" style="display: inline;">
                                @csrf
                                @method('GET')
                                <button class="btn btn-primary btn-sm">Edit</button>
                            </form>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
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