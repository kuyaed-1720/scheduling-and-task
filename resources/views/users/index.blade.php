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
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <div class="none">No users yet</div>
            @endif
        </tbody>
    </table>
@endsection