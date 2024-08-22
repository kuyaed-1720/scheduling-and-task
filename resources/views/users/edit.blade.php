@extends('layout')

@section('title')
    Edit User
@endsection

@section('content')
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="user_name">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
        </div>
        <div class="user_email">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
        </div>
        <div class="user_pwd">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="user_confrm">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <button class="create-btn"type="submit">Update User</button>
    </form>
@endsection