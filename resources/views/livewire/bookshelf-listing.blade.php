@php
    $uid = Str::slug($title) . '-' . uniqid();
@endphp

<div class="accordion-item">
    <h2 class="accordion-header" id="heading-{{ $uid }}">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#collapse-{{ $uid }}" aria-expanded="false" aria-controls="collapse-{{ $uid }}">
            {{ __($title) }}
        </button>
    </h2>
    <div id="collapse-{{ $uid }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $uid }}"
        data-bs-parent="#documentAccordion">
        <div class="accordion-body">
            @foreach ($processDoc as $doc)
                <a href="javascript:void(0)" onclick="updatePreview(this)" data-preview="{{ $doc['preview'] }}"
                    data-download="{{ $doc['download'] }}" data-alt="{{ __($doc['title']) }}" data-public="{{ __($doc['publicFlag']) }}">
                    {{ __($doc['title']) }}
                </a><br>
            @endforeach
        </div>
    </div>
</div>