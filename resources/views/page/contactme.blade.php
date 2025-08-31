@extends('layouts.app')

@section('title', __('web.general.hireme'))

{{-- Optional: add a custom class to <html> or

<body> --}}
    @section('body-class', 'text-white')

    @section('content')
        <div class=" d-flex flex-column min-vh-100 small-container contact-card justify-content-center">
            <h2 class="text-center mb-4">{{__('web.navigation.contact')}}</h2>

            <div class="contact-item">
                <i class="bi bi-globe"></i>
                <a href="{{ __('web.profile.name') }}" target="_blank">
                    {{ __('web.profile.name') }}
                </a>
            </div>

            <div class="contact-item">
                <i class="bi bi-envelope"></i>
                <a href="mailto:{{ __('web.profile.email') }}">
                    {{ __('web.profile.email') }}
                </a>
            </div>

            <div class="contact-item">
                <i class="bi bi-geo-alt"></i>
                <a href="https://www.google.com/maps/search/{{ urlencode(__('web.profile.location')) }}" target="_blank">
                    {{ __('web.profile.location') }}
                </a>
            </div>

            <div class="contact-item">
                <i class="bi bi-telephone"></i>
                <a href="tel:{{ __('web.profile.phone') }}">
                    {{ __('web.profile.phone') }}
                </a>
            </div>

            <div class="contact-item">
                <i class="bi bi-linkedin"></i>
                <a href="{{ __('web.profile.linkedin') }}" target="_blank">
                    {{ __('web.profile.linkedin') }}
                </a>
            </div>

            <div class="contact-item">
                <i class="bi bi-github"></i>
                <a href="{{ __('web.profile.github') }}" target="_blank">
                    {{ __('web.profile.github') }}
                </a>
            </div>
              <p class="contact-footer mt-4">
    {{ __('web.profile.contact_msg') }}
  </p>
        </div>

        @push('scripts')
            <script>

            </script>
        @endpush
    @endsection