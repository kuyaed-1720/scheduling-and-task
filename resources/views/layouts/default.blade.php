<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @include('includes.plugins')
</head>
<body>
    <header>@include('includes.header')</header>
    <div>
        @include('includes.sidebar')
        <main>@yield('content')</main>
    </div>
    <footer>@include('includes.footer')</footer>
</body>
</html>