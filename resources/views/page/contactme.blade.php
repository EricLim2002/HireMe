@extends('layouts.app')

@section('title', __('web.general.hireme'))

{{-- Optional: add a custom class to <html> or

<body> --}}
    @section('body-class', 'text-white')

    @section('content')
       <div class=" d-flex flex-column min-vh-100">


        </div>

        @push('scripts')
            <script>

            </script>
        @endpush
    @endsection