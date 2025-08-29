@extends('layouts.app')

@section('title', __('web.general.hireme'))

@section('body-class', 'text-white')

@section('content')
    <div class="row d-flex overlay-content container mx-auto mt-5 mb-5 p-5">
        <div class="col-5 mb-3 document-listing justify-content-start">
            <a href="javascript:void(0);" 
               data-path="{{ asset('download/Eric_resume_082025.png') }}" 
               data-alt="resume" 
               onclick="updatePreview(this)">
                {{ __('web.document.resume') }}
            </a>

        </div>
        <div class="col-6 justify-content-start">
            <div class="scrollable-image-s">
                <img id="preview" src="{{ asset('download/Eric_resume_082025.png') }}" alt="Resume">
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function updatePreview(el) {
                // Get values from clicked element
                const path = el.getAttribute('data-path');
                const alt = el.getAttribute('data-alt');

                // Update preview image
                const preview = document.getElementById('preview');
                preview.src = path;
                preview.alt = alt;
            }
        </script>
    @endpush
@endsection
