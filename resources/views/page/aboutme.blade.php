<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ __('web.general.hireme') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/generalFunction.js'])
    @livewireStyles
</head>

<body>
    @livewire('header')
    @livewire('long-text-content', ['contentName' => 'aboutme'])
    @livewire('footer')
    @livewireScripts
    <script>

    <script>
</body>

</html>