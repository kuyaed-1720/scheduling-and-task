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
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="button" class="btn btn-primary btn-lg mb-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Create New User</button>
        
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form class="container" action="{{ route('users.store') }}" method="POST">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Create User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-hover">
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
                                <button class="btn btn-primary btn-sm mx-0">Edit</button>
                            </form>
                            <form class="" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm  mx-0" type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection