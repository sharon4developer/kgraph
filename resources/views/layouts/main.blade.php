<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- <title>K-Graph</title> --}}
    @include('layouts.partials.seo')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="">
    <link rel="shortcut icon" href="{{ asset('assets/KgraphLogo.png') }}">

    @vite('resources/css/app.css')
    {{-- font installation --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    {{-- slick --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css" />

</head>

<body style="overflow-x: hidden !important; margin: 0; padding: 0;">
    @include('frontend.Common.navbar')
    <input type="hidden" id="base-route" value="{{ url('/') }}">
    <main class="content-container h-full w-full">
        @yield('content')
    </main>

    @include('frontend.Common.footer')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
</body>


<style>
    .error {
        color: red !important;
        /* padding-top: 15px; */
        font-size: 14px;
        padding-bottom: 10px;
    }
</style>

</html>
