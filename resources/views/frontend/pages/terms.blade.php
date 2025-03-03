@extends('layouts.main')
@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('quill/ql-front.css') }}">
    <style>



    </style>
    <link rel="shortcut icon" href="{{ asset('admin/theme/assets/images/favicon.ico') }}">

    <!-- preloader css -->
    <link rel="stylesheet" href="{{ asset('admin/theme/assets/css/preloader.min.css') }}" type="text/css" />

    <!-- Bootstrap Css -->
    {{-- <link href="{{ asset('admin/theme/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> --}}
    <!-- Icons Css -->
    <link href="{{ asset('admin/theme/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    {{-- <link href="{{ asset('admin/theme/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ asset('common/theme/css/alertify.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('common/theme/css/common.css') }}" rel="stylesheet" type="text/css" />
    @include('frontend.Common.whatsapplogo')
    {{-- services section --}}
    <div class="container mx-auto px-5 lg:px-12 h-full w-full py-8 md:pt-[15%] lg:py-[8%]">
        <div class="px-5 mx-auto md:px-28">
            <h2 class="text-3xl font-bold text-center md:text-4xl lg:text-5xl">Terms & Conditions</h2><br>

            <div class="relative items-start text-base pt-7 lg:pt-10 lg:text-lg textarea_content cm-editercontent">
               @if(isset($data)) {!! $data->description !!} @endif
            </div>
        </div>
    </div>

    {{-- @include('frontend.Common.getintouch') --}}
@endsection
