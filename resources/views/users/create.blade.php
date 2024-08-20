@extends('layout')

@section('title')
    Create User
@endsection

@section('content')
    <h1>Create User</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="user_name">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="user_email">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="user_pwd">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password">
        </div>
        <div class="user_confrm">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <button class="create-btn" type="submit">Create User</button>
    </form>
@endsection