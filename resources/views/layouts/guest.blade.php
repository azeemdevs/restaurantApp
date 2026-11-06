<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    {{-- Bootstrap Style and Font Awesomes --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    {{-- Scripts FontAwesome and bootstrap --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" defer></script>
    <script src="{{ asset('assets/js/all.min.js') }}" defer></script>
</head>

<body>
    <div class="container-fluid back-color">
        <div class="vh-100 d-flex align-items-center justify-content-center">
            <div class=" child-div">
                {{ $slot }}
            </div>
        </div>

    </div>
</body>

</html>
