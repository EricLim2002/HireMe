<div
  class="custom-textarea scrollable-text mx-auto p-2"
  style="width:90%; overflow-y:auto; height: {{ $Height }};"
>
  @if($content === 'experience' && $contentName === 'about')
    @foreach($paragraphs as $exp)
      <section class="fade-text mb-4">
          <p class="mb-0">
            <strong>{{ $exp['company'] }}</strong> —
            <strong>{{ $exp['role'] }}</strong>
          </p>
          <p class="mb-0"><em>{{ $exp['period'] }}</em></p>

        @if(!empty($exp['points']))
          <ul class="ms-3 mb-0">
            @foreach($exp['points'] as $point)
              <li>{{ $point }}</li>
            @endforeach
          </ul>
        @endif
      </section>
    @endforeach

  @elseif($content === 'education' && $contentName === 'about')
    @foreach($paragraphs as $edu)
      <section class="fade-text mb-4">

          <p class="mb-0">
            <strong>{{ $edu['institution'] }}</strong> —
            <strong>{{ $edu['degree'] }}</strong>
            @if(isset($edu['result']))
              <span class="ms-1"><em>{{ $edu['result'] }}</em></span>
            @endif
          </p>
          <p class="mb-0"><em>{{ $edu['period'] }}</em></p>

        @if(!empty($edu['points']))
          <ul class="ms-3 mb-0">
            @foreach($edu['points'] as $point)
              <li>{{ $point }}</li>
            @endforeach
          </ul>
        @endif
      </section>
    @endforeach

  @elseif($content === 'skills' && $contentName === 'about')
    <div class="row g-3">
      @foreach($paragraphs as $category => $skills)
        <div class="col-12 col-md-6">
          <div class="p-3 rounded-3 shadow-sm fade-text h-100"
               style="background-color: var(--secondary-color);">
            <h5 class="mb-3 text-uppercase fw-bold no-shadow"
                style="color: var(--main-theme);">
              {{ str_replace('_', ' ', $category) }}
            </h5>

            @foreach($skills as $subcat => $levels)
              <div class="mb-3">
                <h6 class="fw-semibold mb-2 text-white">
                  {{ str_replace('_', ' ', $subcat) }}
                </h6>

                @foreach($levels as $level => $skillList)
                  <p class="mb-1 text-white">
                    <span class="badge text-uppercase small me-1"
                          style="background-color: var(--main-theme); color: var(--text-color);">
                      {{ $level }}
                    </span>
                    @if(is_array($skillList))
                      {{ implode(', ', $skillList) }}
                    @else
                      {{ $skillList }}
                    @endif
                  </p>
                @endforeach
              </div>
            @endforeach
          </div>
        </div>
      @endforeach
    </div>

  @elseif($content === 'languages' && $contentName === 'about')
    <div class="row g-3">
      @foreach($paragraphs as $category => $languages)
        <div class="col-12 col-md-6">
          <div class="p-3 rounded-3 shadow-sm fade-text h-100"
               style="background-color: var(--secondary-color);">
            <h5 class="mb-3 text-uppercase fw-bold no-shadow"
                style="color: var(--main-theme);">
              {{ str_replace('_', ' ', $category) }}
            </h5>

            <ul class="list-unstyled mb-0">
              @foreach($languages as $language => $level)
                <li class="d-flex flex-wrap justify-content-between align-items-center mb-2">
                  <span class="fw-semibold text-white">{{ $language }}</span>
                  <span class="badge"
                        style="background-color: var(--main-theme); color: var(--text-color);">
                    {{ $level }}
                  </span>
                </li>
              @endforeach
            </ul>
          </div>
        </div>
      @endforeach
    </div>

  @else
    @foreach($paragraphs as $paragraph)
      <p class="fade-text mb-2">{{ $paragraph }}</p>
    @endforeach
  @endif
</div>

@push('scripts')
<script>
  function fadeInOnLoad(selector) {
    const elements = document.querySelectorAll(selector);
    elements.forEach((el, i) => {
      setTimeout(() => el.classList.add("show"), i * 120); // slightly quicker, feels snappier
    });
  }

  document.addEventListener("livewire:load", () => {
    fadeInOnLoad(".fade-text");
    if (window.initFadeScroll) initFadeScroll(".scrollable-text", ".fade-text");
  });

  Livewire.hook('message.processed', () => {
    fadeInOnLoad(".fade-text");
    if (window.initFadeScroll) initFadeScroll(".scrollable-text", ".fade-text");
  });
</script>
@endpush
