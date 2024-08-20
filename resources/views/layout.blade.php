<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>

    {{-- header and title --}}
    <header class="">
        <h3>Scheduling and Task Management System</h3>
        <div class="">
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </header>
    
    <div class="main">
        {{-- navigation panel --}}
        <nav class="sidebar">
            <a href="/home">Home</a>
            <a href="/tasks">Task</a>
            <a href="/schedule">Schedule</a>
            <a href="/users">User</a>
            <a href="/settings">Settings</a>
        </nav>

        {{-- main content --}}
        <main>
            @if (!Request::is('/') && !Request::is('home'))
                <button onclick="history.back()">Go Back</button>
            @endif
            @yield('content')
        </main>

    </div>
</body>
</html>