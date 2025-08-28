<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="welcome-page">

<head>
    <meta charset="utf-8">
    <title>{{ __('web.general.hireme') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/generalFunction.js'])
    @livewireStyles
</head>

<body class="text-white">

    @livewire('header')

    <!-- Foreground Content -->
    <div class="overlay-content container mt-5" id="container" style="height:87vh !important;">
        <h1 class="text-3xl font-bold draggable runaway">
            <a href="/about" class="no-underline text-inherit">
                {{ __('web.general.hireme') }}
            </a>
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

            document.querySelectorAll('.dropdown').forEach(dropdown => {
                dropdown.addEventListener('mouseenter', () => {
                    const toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
                    const bsDropdown = bootstrap.Dropdown.getOrCreateInstance(toggle);
                    bsDropdown.show();
                });

                dropdown.addEventListener('mouseleave', () => {
                    const toggle = dropdown.querySelector('[data-bs-toggle="dropdown"]');
                    const bsDropdown = bootstrap.Dropdown.getOrCreateInstance(toggle);
                    bsDropdown.hide();
                });
            });
        });


    </script>

</body>

</html>