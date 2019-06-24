<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')

{{--    @yield('style')--}}
</head>
<body>

        @include('layouts.header')
    <div id="app">
        @yield('content')

        @include('layouts.footer')

        @yield('script')
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>

</body>
</html>