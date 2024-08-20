<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (Route::currentRouteName('schedule'))
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
        {{-- <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js'></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>

    {{-- header and title --}}
    <header class="navbar bg-body-tertiary">
        <h3>Scheduling and Task Management System</h3>
        <div class="container-fluid">
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