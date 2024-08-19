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
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection