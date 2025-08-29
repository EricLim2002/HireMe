<footer class="mt-auto py-2 border-top w-100 footer-bar">
  <div class="container-fluid footer-container">
    <div class="row align-items-center text-center text-md-start justify-content-center g-2 footer-content">
      <!-- Left -->
      <div class="col-md-4 mb-2 mb-md-0 text-center text-md-start">
        <small>&copy; {{ __('web.footer.copyright') }} — All rights reserved</small>
      </div>

      <!-- Middle -->
      <div class="col-md-4 mb-2 mb-md-0 text-center">
        <a href="{{ url('/') }}" class="footer-link mx-2">{{ __('web.footer.links.home') }}</a>
        <a href="{{ url('/about') }}" class="footer-link mx-2">{{ __('web.footer.links.about') }}</a>
        <a href="{{ url('/contact') }}" class="footer-link mx-2">{{ __('web.footer.links.contact') }}</a>
        <a href="{{ url('/showcase') }}" class="footer-link mx-2">{{ __('web.navigation.showcase') }}</a>
        <a href="{{ url('/documentation') }}" class="footer-link mx-2">{{ __('web.navigation.documentation') }}</a>
      </div>

      <!-- Right -->
      <div class="col-md-4 text-center text-md-end">
        <a href="mailto:{{ __('web.profile.email') }}" class="footer-link mx-2">{{ __('web.profile.email') }}</a>
        <span class="mx-2 d-block d-md-inline">{{ __('web.profile.phone') }}</span>
        <a href="{{ __('web.profile.linkedin') }}" target="_blank" class="footer-link mx-2">{{ __('web.personal.linkedin') }}</a>
        <a href="{{ __('web.profile.github') }}" target="_blank" class="footer-link mx-2">{{ __('web.personal.github') }}</a>
      </div>
    </div>
  </div>
</footer>
