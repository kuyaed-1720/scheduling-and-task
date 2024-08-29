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
    <header class="row">
        @include('includes.header')
    </header>
    <div class="row">
        <nav class="col">
            @include('includes.sidebar')
        </nav>
        <main class="col">
            @yield('content')
        </main>
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
</body>
</html>