@extends('layout')

@section('title')
    Users
@endsection

@section('content')
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            var form = event.target.form;
            if (confirm("Are you sure you want to delete this user?")) {
                form.submit();
            }
        }
    </script>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <h1>Users List</h1>
    <form action="{{ route('users.create') }}" method="GET">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-lg btn-primary mb-3"><i class="fa fa-plus"></i>Create New User</button>
    </form>
    <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="bg-secondary">ID</th>
                    <th class="bg-secondary">Name</th>
                    <th class="bg-secondary">Email</th>
                    <th class="bg-secondary">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.edit', $user->id) }}" method="GET" style="display: inline;">
                                @csrf
                                @method('GET')
                                <button class="btn btn-primary btn-sm">Edit</button>
                            </form>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection