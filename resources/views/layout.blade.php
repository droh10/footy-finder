<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Footy Finder</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    @include('layouts.partials._header')

    <section class="container mt-4 pb-3">
        @yield('content')
    </section>
    {{-- @include('layouts.partials._footer') --}}
    @vite(['resources/js/app.js'])
</body>
</html>