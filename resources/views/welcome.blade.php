<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
        @livewire('header')
</head>
<body>
    {{-- Use Livewire header --}}

    <main class="max-w-7xl mx-auto p-6">
        <title>HireMe</title>
        <h1 class="text-3xl font-bold">Welcome Page</h1>
    </main>

    @livewireScripts
</body>
</html>