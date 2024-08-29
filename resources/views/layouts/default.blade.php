<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('includes.plugins')
</head>
<body class="text-center">
    <header class="row">
        <div class="col">
            @include('includes.header')
        </div>
    </header>
    <div class="row">
        <div class="col">
            @include('includes.sidebar')
        </div>
        <div class="col">
            <main>@yield('content')</main>
        </div>
    </div>
    <footer class="row">
        <div class="col">
            @include('includes.footer')
        </div>
    </footer>
</body>
</html>