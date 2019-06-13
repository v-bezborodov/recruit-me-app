<!doctype html>
<html lang="en">
<head>
    @include('layouts.head')

{{--    @yield('style')--}}
</head>
<body>
    @include('layouts.header')


    @yield('content')


    @include('layouts.footer')


{{--@yield('script')--}}
</body>
</html>