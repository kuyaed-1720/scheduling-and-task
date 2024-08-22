<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>

    {{-- header and title --}}
    <header>
        <h3>Scheduling and Task Management System</h3>
        <div class="">
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><a href="https://youtu.be/dQw4w9WgXcQ">Search</a></button> <!-- rickrolled! -->
            </form>
        </div>
    </header>
    
    <div class="main">
        {{-- navigation panel --}}
        <nav class="sidebar">
            <a class="nav-btn" href="/home">Home</a>
            <a class="nav-btn" href="/tasks">Task</a>
            <a class="nav-btn" href="/events">Events</a>
            <a class="nav-btn" href="/users">User</a>
            <a class="nav-btn" href="/settings">Settings</a>
        </nav>

        {{-- main content --}}
        <main>
			{{-- back button --}}
            @if (!Request::is('/') && !Request::is('home'))
                <button id="back" onclick="history.back()">Go Back</button>
            @endif
            @yield('content')
        </main>

    </div>
</body>
</html>