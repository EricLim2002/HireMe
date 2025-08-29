@extends('layouts.app')

@section('title', __('web.general.hireme'))

{{-- Optional: add a custom class to <html> or <body> --}}
@section('body-class', 'text-white welcome-page')

@section('content')


    @push('scripts')

    @endpush
@endsection
