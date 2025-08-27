<div class="custom-textarea scrollable-text mx-auto p-2" style="width:90%; overflow-y:auto;">
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
        @endforeach
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