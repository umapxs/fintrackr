<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'FinTrackr') }}</title>

        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="/images/favicon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}

            @if(session('success'))
                <div class="bg-green-500 text-white px-4 py-2 mb-4">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="bg-red-500 text-white px-4 py-2 mb-4">{{ session('error') }}</div>
            @endif
        </div>
    </body>
</html>
