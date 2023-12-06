<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BMKG Geofisika Yogyakarta')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600&display=swap" rel="stylesheet" />

    {{-- Tailwind --}}
    @vite('resources/css/app.css')

    <style>
        :root {
            font-family: 'Inter', sans-serif
        }
    </style>
</head>

<body>
    @include('components.nav')
    @yield('content')

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/1191ef92be.js" crossorigin="anonymous"></script>
</body>

</html>
