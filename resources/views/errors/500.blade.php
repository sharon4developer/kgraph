@extends('layouts.main')
@section('content')
    <style>
        .services-grade {
            background: linear-gradient(22deg, #FFFFFF 0%, rgba(255, 255, 255, 0) 100%);
        }

        .section {
            margin: 0;
            padding: 0;
            text-align: center;
            font-family: sans-serif;
            background-color: #fff;
        }

        h1,
        a {
            margin: 0;
            padding: 0;
            text-decoration: none;
        }

        .section {
            padding: 4rem 2rem;
        }

        .section .error-code {
            text-shadow:
                1px 1px 1px #2563eb, 2px 2px 1px #2563eb, 3px 3px 1px #2563eb, 4px 4px 1px #2563eb, 5px 5px 1px #2563eb, 6px 6px 1px #2563eb, 7px 7px 1px #2563eb, 8px 8px 1px #2563eb, 25px 25px 8px rgba(0, 0, 0, 0.2);
            font-size: 13rem;
        }

        .page {
            margin: 2rem 0;
            font-size: 20px;
            font-weight: 600;
            color: #444;
        }

        .back-home {
            display: inline-block;
            border: 2px solid #222;
            color: #fff;
            text-transform: uppercase;
            font-weight: 600;
            padding: 0.75rem 1rem 0.6rem;
            transition: all 0.2s linear;
            box-shadow: 0 15px 15px -11px rgba(0, 0, 0, 0.4);
            background: #051b3b;
            border-radius: 6px;
        }

        .back-home:hover {
            background: #222;
            color: #ddd;
        }

        .error-code {
            color: #051b3b !important;
            padding-top: 15px;
            padding-bottom: 10px;
        }
    </style>
    <link rel="shortcut icon" href="{{ asset('admin/theme/assets/images/favicon.ico') }}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('admin/theme/assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    {{-- <link href="{{ asset('admin/theme/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
    <!-- Icons Css -->
    <link href="{{ asset('admin/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admin/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('common/theme/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('common/theme/css/common.css') }}" rel="stylesheet" type="text/css" />
    @include('frontend.Common.whatsapplogo')
    <div class="section">
        <h1 class="error-code">500</h1>
        <div class="page">Internal Server Error. Please visit us again shortly</div>
        <a class="back-home" href="{{url('/')}}">Back to home</a>
    </div>

    @include('frontend.Common.getintouch')
@endsection
