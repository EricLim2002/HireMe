<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>HireMe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body>
    @livewire('header')


    <div id="particles-js"></div>
    <div class="overlay-content">
        <h1 class="text-3xl font-bold">{{ __('web.general.hireme') }}</h1>
    </div>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/tsparticles@3.9.1/tsparticles.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tsparticles/preset-links@3/tsparticles.preset.links.min.js"></script>

    <script>
        window.addEventListener("load", () => { // ensure everything loaded
            tsParticles.load("particles-js", {
                background: { color: { value: "transparent" } },
                particles: {
                    number: { value: 120 },
                    color: { value: "#ffffff" },
                    shape: { type: "circle" },
                    opacity: { value: 0.9 },
                    size: { value: { min: 3, max: 6 } }, // slightly bigger
                    move: { enable: true, speed: 2.5, direction: "none", outModes: "bounce" }
                },
                interactivity: {
                    events: {
                        onHover: { enable: true, mode: "repulse" },
                        onClick: { enable: true, mode: "push" }
                    },
                    modes: { repulse: { distance: 150 }, push: { quantity: 4 } }
                }
            });
            console.log("tsparticles loaded");
        });
    </script>

</body>

</html>