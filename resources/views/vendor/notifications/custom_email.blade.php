{{-- resources/views/vendor/mail/new_project.blade.php --}}

@extends('layouts.email')

@section('content')
    {{-- Your custom HTML content here --}}
    <h1>{{ $greeting }}</h1>
    <p>{{ $introLines[0] }}</p>
    {{-- Add your logo here --}}
    <img src="{{ asset('dist/img/systemAIRCoDeLogo.png') }}" alt="AIRCoDe Logo">

    @isset($actionText)
        <a href="{{ $actionUrl }}">{{ $actionText }}</a>
    @endisset

    {{-- Your custom HTML content here --}}
@endsection
