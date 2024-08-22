<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


    {{-- bootstrapv cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    
    <title>@yield('title')</title>
</head>
<body>

    {{-- header and title --}}
    <header>
        <h3>Scheduling and Task Management System</h3>
        <div class=" ">
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><a class="search-btn" href="#!">Search</a></button> <!-- rickrolled! -->
            </form>
        </div>
    </header>
    
    <div class="main">
        {{-- navigation panel --}}
        <nav class="sidebar">
            <button class="btn btn-primary mb-2 nav-btn"><a href="/home"><i class="fa fa-home"></i>Home</a></button>
            <button class="btn btn-primary mb-2 nav-btn"><a href="/tasks"><i class="fa fa-list-check"></i>Task</a></button>
            <button class="btn btn-primary mb-2 nav-btn"><a href="/events"><i class="fa fa-calendar"></i>Events</a></button>
            <button class="btn btn-primary mb-2 nav-btn"><a href="/users"><i class="fa fa-user"></i>User</a></button>
            <button class="btn btn-primary mb-2 nav-btn"><a href="/settings"><i class="fa fa-gears"></i>Settings</a></button>
        </nav>

        {{-- main content --}}
        <main>
			{{-- back button --}}
            @if (!Request::is('/') && !Request::is('home'))
                <button class="btn" id="back" onclick="history.back()"><i class="fa fa-chevron-left"></i></button>
            @endif
            @yield('content')
        </main>

    </div>
</body>
</html>