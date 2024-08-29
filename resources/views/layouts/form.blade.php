<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('includes.plugins')
    @vite('resources/css/app.css', 'resources/js/app.js')
</head>
<body>
    <header class="">
        @include('includes.header')
    </header>
    <main class="">
        @yield('content')
    </main>
    <footer class="">
        @include('includes.footer')
    </footer>
</body>
</html>