<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Favicon --}}
    <link href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/img/favicon.png') }}" rel="icon">
    <link href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/img/favicon.png') }}" rel="apple-touch-icon">

    {{-- Styles --}}
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/icofont/icofont.min.css') }} ">
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/boxicons/css/boxicons.min.css') }} ">
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/remixicon/remixicon.css') }} ">
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/venobox/venobox.css') }} ">
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/owl.carousel/assets/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/aos/aos.css') }} ">
    <link rel="stylesheet" href="{{ secure_asset(env('APP_URL') . 'vendor/onepage/css/style.min.css') }} ">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.x/dist/alpine.min.js" defer></script>

    {{-- Trix Editor --}}
    <link rel="stylesheet" href="https://unpkg.com/trix@1.3.1/dist/trix.css">

    {{-- Website Title --}}
    <title>
        @yield('title') - Reformasi Birokrasi
    </title>

    {{-- Custom Style --}}
    @yield('styles')

    <style>
        .img-wrap { position: relative; }
        .img-wrap .close {
            position: absolute;
            top: 2px;
            right: 2px;
            z-index: 100;
        }
    </style>

    {{-- Livewire Style --}}
    @livewireStyles
</head>
<body>
    <div id="app">
        {{ $slot }}
    </div>

    {{-- Livewire Script --}}
    @livewireScripts

    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/jquery/jquery.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/jquery.easing/jquery.easing.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/php-email-form/validate.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/waypoints/jquery.waypoints.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/counterup/counterup.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/venobox/venobox.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/owl.carousel/owl.carousel.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/isotope-layout/isotope.pkgd.min.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/vendor/aos/aos.js') }} "></script>
    <script src="{{ secure_asset(env('APP_URL') . 'vendor/onepage/js/main.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="https://unpkg.com/trix@1.3.1/dist/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/mcstudios/glightbox/dist/js/glightbox.min.js"></script>
    <script>
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });
    </script>

    {{-- Custom Script --}}
    @stack('scripts')
</body>
</html>
