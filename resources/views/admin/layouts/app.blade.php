@include('admin.layouts.includes.header')
@stack('style')
@include('admin.layouts.includes.sidebar')
@include('admin.layouts.includes.secondary-header')
<input type="hidden" id="route-for-user" value="{{ url('admin') }}">
<input type="hidden" id="base-route" value="{{ url('/') }}">
@yield('content')
@include('admin.layouts.includes.footer')
@stack('script')
