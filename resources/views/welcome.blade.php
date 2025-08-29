@extends('layouts.app')

@section('title', __('web.general.hireme'))

{{-- Optional: add a custom class to <html> or <body> --}}
@section('body-class', 'text-white welcome-page')

@section('content')
    <!-- Foreground Content -->
    <div class="overlay-content container welcome-page mt-5" id="container" style="height:85vh !important;">
        <h1 class="text-3xl font-bold draggable runaway">
            <a href="/about" class="no-underline text-inherit">
                {{ __('web.general.helloworld') }}
            </a>
        </h1>
    </div>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            makeRunawayText('container');
            gsap.from(".overlay-content h1", {
                duration: 2.5,
                y: -200,
                ease: "bounce.out",
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
    @endpush
@endsection
