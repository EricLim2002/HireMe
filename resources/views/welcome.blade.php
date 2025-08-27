<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ __('web.general.hireme') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/generalFunction.js'])
    @livewireStyles
</head>

<body class="text-white">

    @livewire('header')

    <!-- Foreground Content -->
    <div class="overlay-content container" id="container">
        <h1 class="text-3xl font-bold draggable runaway">
            {{ __('web.general.hireme') }}
        </h1>
    </div>

    @livewire('footer')

    @livewireScripts
    <script>
    
        document.addEventListener("DOMContentLoaded", function () {
            makeRunawayText('container');
            gsap.from(".overlay-content h1", {
                duration: 2.5,      // total animation time
                y: -200,            // start 200px above its final position
                ease: "bounce.out", // bounce effect
            });
        });
    </script>

</body>

</html>