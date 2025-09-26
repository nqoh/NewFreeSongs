<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"  @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <title inertia>{{ config('app.name', 'NewFreeSongs') }}</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/favCon.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/animate.css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/dropdown/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/socicon/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/theme/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/mbr-additional.css') }}" type="text/css">

        @routes
        @vite(['resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        @inertiaHead

    </head>

    <body >
        @inertia
        <div id="scrollToTop" class="scrollToTop mbr-arrow-up">
          <a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a>
        </div>
    </body>

    <script src="{{ asset('assets/web/assets/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/smooth-scroll/smooth-scroll.js') }}"></script>
    <script src="{{ asset('assets/dropdown/js/script.min.js') }}"></script>
    <script src="{{ asset('assets/touch-swipe/jquery.touch-swipe.min.js') }}"></script>
    <script src="{{ asset('assets/theme/js/script.js') }}"></script>
</html>
