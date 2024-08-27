@extends('layout')

@section('title')
    Edit User
@endsection

@section('content')
    <h1>Update User</h1>
    <form class="container" action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="user_name mb-3">
            <label for="name" class="form-label">Name:</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>
        <div class="user_email mb-3">
            <label for="email" class="form-label">Email:</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>
        <button class="btn btn-primary"type="submit">Update User</button>
    </form>
@endsection