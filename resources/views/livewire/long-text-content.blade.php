<div class="custom-textarea scrollable-text mx-auto p-2" style="width:90%; overflow-y:auto; height: {{$Height}};">
    @if($content == 'experience' && $contentName == 'about')
        @foreach($paragraphs as $exp)
            <div class="fade-text mb-4">
                <p class="mb-1">
                    <strong>{{ $exp['company'] }}</strong> –
                    <strong>{{ $exp['role'] }}</strong><br>
                    <em>{{ $exp['period'] }}</em>
                </p>
                <ul class="ms-3">
                    @foreach($exp['points'] as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    @elseif($content == 'education' && $contentName == 'about')
        @foreach($paragraphs as $edu)
            <div class="mb-4 fade-text">
                <p class="mb-1">
                    <strong>{{ $edu['institution'] }}</strong> –
                    <strong>{{ $edu['degree'] }}</strong>
                    @if(isset($edu['result'])) - <em class="text-end">{{ $edu['result'] }}</em> @endif
                    <br><em>{{ $edu['period'] }}</em>
                </p>
                <ul class="ms-3">
                    @foreach($edu['points'] as $point)
                        <li>{{ $point }}</li>
                    @endforeach
                </ul>
            </div>
            <br>
        @endforeach
    @elseif($content == 'skills' && $contentName == 'about')
        <div class="row">
            @foreach($paragraphs as $category => $skills)
                <div class="col-md-6 mb-4">
                    <div class="p-3 rounded-3 shadow-sm fade-text h-100" style="background-color: #593392;">
                        <h5 class="mb-3 text-uppercase fw-bold" style="color:#9455f4;">
                            {{ str_replace('_', ' ', $category) }}
                        </h5>
                        @foreach($skills as $subcat => $levels)
                            <div class="mb-3">
                                <h6 class="fw-semibold mb-2" style="color:white;">
                                    {{ str_replace('_', ' ', $subcat) }}
                                </h6>
                                @foreach($levels as $level => $skillList)
                                    <p class="mb-1" style="color:white;">
                                        <span class="badge text-uppercase small" style="background-color:#9455f4; color:white;">
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
    @elseif($content == 'languages' && $contentName == 'about')
        <div class="row">
            @foreach($paragraphs as $category => $languages)
                <div class="col-md-6 mb-4">
                    <div class="p-3 rounded-3 shadow-sm fade-text h-100" style="background-color: #593392;">
                        <h5 class="mb-3 text-uppercase fw-bold" style="color:#9455f4;">
                            {{ str_replace('_', ' ', $category) }}
                        </h5>
                        <ul class="list-unstyled">
                            @foreach($languages as $language => $level)
                                <li class="d-flex justify-content-between align-items-center mb-2">
                                    <span class="fw-semibold" style="color:white;">{{ $language }}</span>
                                    <span class="badge" style="background-color:#9455f4; color:white;">
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
            <p class="fade-text mb-2">{{ $paragraph }}</p><br>
        @endforeach
    @endif
</div>

@push('scripts')
    <script>
        function fadeInOnLoad(selector) {
            const elements = document.querySelectorAll(selector);
            elements.forEach((el, i) => {
                setTimeout(() => {
                    el.classList.add("show");
                }, i * 150); // staggered fade-in
            });
        }

        document.addEventListener("livewire:load", () => {
            fadeInOnLoad(".fade-text");

            if (window.initFadeScroll) {
                initFadeScroll(".scrollable-text", ".fade-text");
            }
        });

        Livewire.hook('message.processed', () => {
            fadeInOnLoad(".fade-text");

            if (window.initFadeScroll) {
                initFadeScroll(".scrollable-text", ".fade-text");
            }
        });
    </script>
@endpush