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
            {{ sessio('success') }}
        </div>
    @endif

    {{-- Task container --}}
@endsection