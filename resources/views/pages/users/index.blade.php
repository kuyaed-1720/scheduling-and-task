@extends('layouts.default')
@section('title')
    Manage Users
@endsection
@section('content')
    <div class="d-flex flex-row justify-content-between">
        <h1>Users</h1>
        <a href="/create-user" class="btn btn-primary mb-2" role="button"><i class="bi bi-plus"></i>Add New</a>
    </div>
    <table class="table table-bordered table-hover table-secondary">
        <thead class="text-center table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->first_name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->email }}</td>
                    <td></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection