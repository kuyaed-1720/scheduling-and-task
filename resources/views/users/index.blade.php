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
        <div>{{ session('success') }}</div>
    @endif
    <form action="{{ route('users.create') }}" method="GET">
        @csrf
        @method('GET')
        <button type="submit">Create New User</button>
    </form>
    <h1>Users List</h1>
    <table class="user_table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($userCount > 0)
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td ondblclick="editCell(this, {{ $user->id }}, 'name')">{{ $user->name }}</td>
                        <td ondblclick="editCell(this, {{ $user->id }}, 'email')">{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.edit', $user->id) }}" method="POST">
                                @csrf
                                @method('GET')
                                <button type="submit">Edit</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user->id) }}" onclick="confirmDelete(event)" method="POST">
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

    <script>
        function editCell(cell, userId, field) {
            const originalContent = cell.innerHTML;
            cell.innerHTML = `<input type="text" value="${originalContent}" onblur="saveCell(this, ${userId}, '${field}', '${originalContent}')">`;
            cell.querySelector('input').focus();
        }

        function saveCell(input, userId, field, originalContent) {
            const newValue = input.value;
            const cell = input.parentElement;
            cell.innerHTML = newValue || originalContent;

            // Send AJAX request to update the value in the database
            fetch(`/update-cell`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id: userId,
                    field: field,
                    value: newValue
                })
            }).then(response => response.json())
              .then(data => {
                  if (!data.success) {
                      cell.innerHTML = originalContent; // Revert to original content if update fails
                  }
              });
        }
    </script>
@endsection