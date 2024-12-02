<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data x-cloak>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600&display=swap" rel="stylesheet" />

    <title>{{ $title ?? config('app.name') }}</title>
</head>

<body class="">

    {{-- {{ $slot }} -> lo userò poi con i componenti Livewire --}}
    @yield('content')

    @vite('resources/js/app.js')
</body>
</html>
