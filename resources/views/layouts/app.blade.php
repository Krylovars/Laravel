<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
</head>

<body>

    @include('layouts.header')


    <div id="app">
        @yield('content')
    </div>

    @include('layouts.footer')


    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</body>

</html>
