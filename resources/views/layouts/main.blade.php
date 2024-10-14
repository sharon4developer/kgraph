<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>K-Graph</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="">
        <link rel="shortcut icon" href="{{ asset('admin/theme/assets/images/favicon.ico') }}">

        @vite('resources/css/app.css')
        {{-- font installation --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    </head>
    <body style="overflow-x: hidden !important;">
        @include('frontend.Common.navbar')
        <input type="hidden" id="base-route" value="{{ url('/') }}">
        <main class="content-container h-full w-full">
            @yield('content')
        </main>

        @include('frontend.Common.footer')
    </body>
</html>
