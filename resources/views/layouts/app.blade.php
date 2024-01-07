<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'BMKG Geofisika Yogyakarta')</title>

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">

    @yield('styles')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="relative">
            {{ $slot }}

            <a href="{{ route('kontak') }}"
                class="group fixed bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded shadow-xl bottom-5 right-5 transition duration-200">
                <i class="fa-regular fa-circle-question"></i>
                Ada pertanyaan?
            </a>
        </main>
    </div>

    {{-- Font Awesome --}}
    <script src="https://kit.fontawesome.com/1191ef92be.js" crossorigin="anonymous"></script>

    @yield('scripts')
</body>

</html>
