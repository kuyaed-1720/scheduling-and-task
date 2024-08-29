<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('includes.plugins')
    <link rel="stylesheet" href="{{ asset('css/login-signup.css') }}">
    @vite('resources/css/login-signup.css', 'resources/js/app.js')
</head>
<body class="login-signup">
    <header>
        <h2>Scheduling and Task Management System</h2>
    </header>
    <main>
        @yield('content')
    </main>
    <footer>
        @include('includes.footer')
    </footer>
</body>
</html>