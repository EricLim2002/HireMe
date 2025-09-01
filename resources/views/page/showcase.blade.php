@extends('layouts.app')

@section('title', __('web.general.hireme'))

{{-- Optional: add a custom class to <html> or

<body> --}}
    @section('body-class', 'text-white')

    @section('content')
        <div class=" d-flex flex-column min-vh-100 justify-content-center">
            <h2 class='text-center'>{{__('web.general.comming_soon')}}<h2>

        </div>

        @push('scripts')
            <script>

            </script>
        @endpush
    @endsection