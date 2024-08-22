@extends('layout')

@section('title')
    Completed Tasks
@endsection

@section('content')
    <div class="container">
        <h1>Comlpeted Tasks</h1>
        <table class="table table-bordered">
            <thead>
                <th>Title</th>
                <th>Description</th>
                <th>Completion Date</th>
            </thead>
            <tbody>
                @foreach ($completedTasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->completed_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection