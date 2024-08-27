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

    <form class="container" action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="user_name mb-3">
            <label for="name">Name:</label>
            <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="user_email mb-3">
            <label for="email">Email:</label>
            <input class="form-control" type="email" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="user_pwd mb-3">
            <label for="password">Password:</label>
            <input class="form-control" type="password" id="password" name="password">
        </div>
        <div class="user_confrm mb-3">
            <label for="password_confirmation">Confirm Password:</label>
            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation">
        </div>
        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
    </form>
@endsection