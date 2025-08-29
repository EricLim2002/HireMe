<div class="custom-textarea scrollable-text mx-auto p-2 fw-bold" style="overflow-y:auto;">
  <dl class="row g-2 mb-0">

    <dt class="col-4 col-md-3 fade-text shadow-text">{{ __('web.personal.name') }}:</dt>
    <dd class="col-8 col-md-9 fade-text">
      <a href="#" class="text-white text-decoration-none">
        {{ __('web.profile.name') }}
      </a>
    </dd>

    <dt class="col-4 col-md-3 fade-text shadow-text">{{ __('web.personal.age') }}:</dt>
    <dd class="col-8 col-md-9 fade-text">
      <a href="#" class="text-white text-decoration-none">
        {{ \Carbon\Carbon::parse(__('web.profile.birthday'))->age }}
      </a>
    </dd>

    <dt class="col-4 col-md-3 fade-text shadow-text">{{ __('web.personal.email') }}:</dt>
    <dd class="col-8 col-md-9 fade-text">
      <a href="mailto:{{ __('web.profile.email') }}" class="text-white text-decoration-none">
        {{ __('web.profile.email') }}
      </a>
    </dd>

    <dt class="col-4 col-md-3 fade-text shadow-text">{{ __('web.personal.phone') }}:</dt>
    <dd class="col-8 col-md-9 fade-text">
      <a href="tel:{{ __('web.profile.phone') }}" class="text-white text-decoration-none">
        {{ __('web.profile.phone') }}
      </a>
    </dd>

    <dt class="col-4 col-md-3 fade-text shadow-text">{{ __('web.personal.location') }}:</dt>
    <dd class="col-8 col-md-9 fade-text">
      <a href="https://www.google.com/maps/search/{{ urlencode(__('web.profile.location')) }}"
         target="_blank"
         class="text-white text-decoration-none">
        {{ __('web.profile.location') }}
      </a>
    </dd>

    <dt class="col-4 col-md-3 fade-text shadow-text">{{ __('web.personal.linkedin') }}:</dt>
    <dd class="col-8 col-md-9 fade-text">
      <a href="tel:{{ __('web.profile.linkedin') }}" class="text-white text-decoration-none">
        {{ __('web.profile.linkedin') }}
      </a>
    </dd>

    <dt class="col-4 col-md-3 fade-text shadow-text">{{ __('web.personal.github') }}:</dt>
    <dd class="col-8 col-md-9 fade-text">
      <a href="tel:{{ __('web.profile.github') }}" class="text-white text-decoration-none">
        {{ __('web.profile.github') }}
      </a>
    </dd>

  </dl>
</div>
