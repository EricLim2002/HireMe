<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="@yield('html-class', '')">

<head>
    <meta charset="utf-8">
    <title>@yield('title', __('web.general.helloworld'))</title>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/generalFunction.js'])
    @yield('style')
    @livewireStyles
</head>

<body class="@yield('body-class', '')">

    @livewire('header')

    <main>
        @yield('content')
    </main>


        @livewire('footer')


    @livewireScripts

    {{-- Scripts pushed from pages --}}
    @stack('scripts')
</body>

</html>