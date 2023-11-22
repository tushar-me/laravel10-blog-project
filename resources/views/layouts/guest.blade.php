<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Explorer - Navigating the World</title>

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
        
        {{-- Favicon --}}
        <link rel="shortcut icon" href="{{ asset('images/fav.png') }}" type="image/x-icon">

        {{-- Slic Slider Css --}}
        <link rel="stylesheet" href="{{ asset('vendor/slick-slider/slick.css') }}">

        {{-- Jqery --}}
        <script src="{{ asset('vendor/jquery/jquery-3.6.0.min.js') }}"></script>

        {{-- Scripts --}}
        @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">

            {{-- Page Content --}}
            <main>
                {{ $slot }}
            </main>

        </div>

        {{-- Slick Slider Js --}}
        <script src="{{ asset('vendor/slick-slider/slick.js') }}"></script>

        {{-- Custom Js --}}
        <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>
