<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>{{ __('web.general.hireme') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/generalFunction.js'])
    @livewireStyles
    @livewire('header')
</head>

<body id="scrollContainer" class="scrollable">
    <h2 class="text-center my-4">{{ __('web.navigation.about') }}</h2>
    <div class="container my-2">
        <div class="row d-flex">
            <div class=" col-6">
                <a href="/download/Eric_resume_082025.pdf" download class="bouncing-text">
                    ⬇ {{__('web.general.downloadme')}} ⬇
                </a>

            </div>
            <p class="col-6 text-center" style="color:white;font-weight: bold;">
                {{__('web.general.introduction')}}
            </p>
        </div>
        <div class="row">
            <!-- PDF Preview -->
            <div class="col-md-6 mb-3">
                <div class="scrollable-image">
                    <img src="{{ asset('download/Eric_resume_082025.png') }}" alt="Resume" style="width:100%;">
                </div>
            </div>

            <!-- About Me text -->
            <div class="col-md-6">
                @livewire('long-text-content', ['contentName' => 'about'])
            </div>
        </div>
    </div>

    <!-- More Content -->
    <div class="scroll-hint" id="scrollHint">⬇️ Scroll</div>
    <!-- Experience -->
    <div class="fade container" id="fadeSection">
        <h2 class="text-center my-4">{{ __('web.general.workingExperience') }}</h2>
        @livewire('long-text-content', ['contentName' => 'about', 'content' => 'experience'])
    </div>

    <!-- Education -->
    <div class="fade container" id="fadeSection2">
        <h2 class="text-center my-4">{{ __('web.general.education') }}</h2>
        @livewire('long-text-content', ['contentName' => 'about', 'content' => 'education'])
    </div>
    @livewire('footer')
    @livewireScripts
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const scrollHint = document.getElementById("scrollHint");
            const fadeSections = document.querySelectorAll(".fade"); // select by class

            window.addEventListener("scroll", function () {
                const scrollTop = window.scrollY || document.documentElement.scrollTop;

                // Hide the scroll hint once user scrolls
                if (scrollTop > 10) {
                    scrollHint.style.display = "none";
                } else {
                    scrollHint.style.display = "block";
                }

                // Loop through all fade sections
                fadeSections.forEach((section) => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;

                    // Trigger when section enters viewport
                    if (scrollTop + window.innerHeight > sectionTop + 100) {
                        section.classList.add("show");
                    } else {
                        section.classList.remove("show");
                    }
                });
            });
        });
    </script>
</body>

</html>