<footer class="py-2 border-top w-100"
    style="background-color: var(--secondary-color); color: white; height: 55px; font-size: 0.85rem;">
    <div class="container footer-container" >
        <div class="row align-items-center text-center text-md-start justify-content-center">
            <!-- Left -->
            <div class="col-md-4 mb-1 mb-md-0 text-center text-md-start">
                <small>&copy; {{ __('web.footer.copyright') }} — All rights reserved</small>
            </div>
            <!-- Middle -->
            <div class="col-md-4 mb-1 mb-md-0 text-center">
                <a href="{{ url('/') }}" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.footer.links.home') }}
                </a>
                <a href="{{ url('/about') }}" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.footer.links.about') }}
                </a>
                <a href="{{ url('/contact') }}" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.footer.links.contact') }}
                </a>
                <a href="{{ url('/showcase') }}" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.navigation.showcase') }}
                </a>
                <a href="{{ url('/documentation') }}" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.navigation.documentation') }}
                </a>
            </div>
            <!-- Right -->
            <div class="col-md-4 text-center text-md-end">
                <a href="mailto:{{ __('web.profile.email') }}" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.profile.email') }}
                </a>
                <span class="mx-1" style="font-size: 0.85rem;">{{ __('web.profile.phone') }}</span>
                <a href="{{ __('web.profile.linkedin') }}" target="_blank" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.personal.linkedin') }}
                </a>
                <a href="{{ __('web.profile.github') }}" target="_blank" class="text-decoration-none mx-1" style="color: white; font-size: 0.85rem;">
                    {{ __('web.personal.github') }}
                </a>
            </div>
        </div>
    </div>
</footer>
