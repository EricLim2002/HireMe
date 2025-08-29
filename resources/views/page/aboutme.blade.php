@extends('layouts.app')

@section('title', __('web.general.hireme'))

@section('body-class', 'text-white')

@section('content')
    <div id="scrollContainer" class="scrollable" style="padding-top: 80px;">
        <h2 class="text-center my-4">{{ __('web.navigation.about') }}</h2>

        <div class="container my-2">
            <div class="col-md-12">
                @livewire('long-text-content', ['contentName' => 'about'])
            </div>

            <div class="row d-flex align-items-center mb-3">
                <div class="col-6 text-center">
                    <a href="/download/Eric_resume_082025.pdf" download class="bouncing-text">
                        ⬇ {{ __('web.general.downloadme') }} ⬇
                    </a>
                </div>
                <div class="col-6 text-center text-white fw-bold">
                    <h2>{{ __('web.general.introduction') }}</h2>
                </div>
            </div>

            <div class="row">
                <!-- PDF Preview -->
                <div class="col-md-6 mb-3">
                    <div class="scrollable-image">
                        <img src="{{ asset('download/Eric_resume_082025.png') }}" alt="Resume" style="width:100%;">
                    </div>
                </div>

                <!-- About Me text -->
                <div class="col-6">
                    @livewire('profile')
                </div>
            </div>
        </div>

        <!-- More Content -->
        <div class="scroll-hint hint" id="scrollHint">⬇ {{ __('web.general.scroll') }}</div>

        <!-- Skill -->
        <div class="fade container" id="fadeSection1">
            <h2 class="text-center my-4">{{ __('web.general.skill') }}</h2>
            @livewire('long-text-content', ['contentName' => 'about', 'content' => 'skills'])
        </div>

        <!-- Language -->
        <div class="fade container" id="fadeSection2">
            <h2 class="text-center my-4">{{ __('web.general.languages') }}</h2>
            @livewire('long-text-content', ['contentName' => 'about', 'content' => 'languages'])
        </div>

        <!-- Experience -->
        <div class="fade container" id="fadeSection3">
            <h2 class="text-center my-4">{{ __('web.general.workingExperience') }}</h2>
            @livewire('long-text-content', ['contentName' => 'about', 'content' => 'experience'])
        </div>

        <!-- Education -->
        <div class="fade container" id="fadeSection4">
            <h2 class="text-center my-4">{{ __('web.general.education') }}</h2>
            @livewire('long-text-content', [
                'contentName' => 'about',
                'content' => 'education',
                'option' => ['height' => 300]
            ])
        </div>
    </div>

    @livewire('top-button')
@endsection

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const scrollHint = document.getElementById("scrollHint");
    const fadeSections = document.querySelectorAll(".fade");

    window.addEventListener("scroll", function () {
        const scrollTop = window.scrollY || document.documentElement.scrollTop;

        scrollHint.style.display = scrollTop > 10 ? "none" : "block";

        fadeSections.forEach((section) => {
            const sectionTop = section.offsetTop;
            if (scrollTop + window.innerHeight > sectionTop + 100) {
                section.classList.add("show");
            } else {
                section.classList.remove("show");
            }
        });
    });
});

// Always start at the top on page load/refresh
window.history.scrollRestoration = "manual";
window.addEventListener("beforeunload", () => window.scrollTo(0, 0));
window.addEventListener("load", () => setTimeout(() => window.scrollTo(0, 0), 0));
</script>
@endpush
