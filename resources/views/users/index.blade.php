@extends('layout')

@section('title')
    Users
@endsection

@section('content')
    <h3>Welcome to user's page!</h3>
    <button><a href="/users/create">Create New User</a></button>
    <h1>Users List</h1>
    <table style="border='1'">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @if ($userCount > 0)
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><button><a href="/users/edit">Edit</a></button></td>
                        <td><button><a href="/users/delete">Delete</a></button></td>
                    </tr>
                @endforeach
            @else
                <div class="none">No users yet</div>
            @endif
        </tbody>
    </table>
@endsection