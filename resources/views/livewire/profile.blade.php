<div class="custom-textarea scrollable-text mx-auto p-2" style="overflow-y:auto;font-weight:bold !important;">
    <p class="fade-text mb-2"><strong>{{ __('web.personal.name') }}:</strong> {{ __('web.profile.name') }}</p>
    <p class="fade-text mb-2"><strong>{{ __('web.personal.age') }}:</strong> {{ \Carbon\Carbon::parse(__('web.profile.birthday'))->age }}</p>
    <p class="fade-text mb-2"><strong>{{ __('web.personal.email') }}:</strong> {{ __('web.profile.email') }}</p>
    <p class="fade-text mb-2"><strong>{{ __('web.personal.phone') }}:</strong> {{ __('web.profile.phone') }}</p>
    <p class="fade-text mb-2"><strong>{{ __('web.personal.location') }}:</strong> {{ __('web.profile.location') }}</p>
</div>