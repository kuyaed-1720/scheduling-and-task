<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>@yield('title')</title>
</head>
<body>
    <header class="navbar bg-body-tertiary">
        <h3>Scheduling and Task Management System</h3>
        <div class="container-fluid">
            <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </header>
    <nav class="sidebar">
        <a href="/home">Home</a>
        <a href="/task">Task</a>
    </nav>
    @yield('content')
</body>
</html>