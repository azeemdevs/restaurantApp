<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    {{-- Bootstrap Style and Font Awesomes --}}
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/td.min.css') }}"> --}}

    {{-- Scripts FontAwesome and bootstrap --}}
    {{-- <script src="{{ asset('assets/js/moment.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    {{-- <script src="{{ asset('assets/js/popper.js') }}"></script>
    <script src="{{ asset('assets/js/td.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/all.min.js') }}" defer></script>

</head>

<body>

    @include('layouts.navigation')
    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

</body>

</html>
