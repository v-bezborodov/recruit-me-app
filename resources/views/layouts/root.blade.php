<!doctype html>
<html lang="en">
<head>

    @include('layouts.head')

{{--    @yield('style')--}}
</head>
<body>
@include('includes.header', ['class'=>isset($class)?$class:''])

@if (\Route::currentRouteName() != 'home')
    <div class="header-bg-container"></div>
@endif

@yield('content')

@if(session('flash'))
    <div class="container alert-messages">
        <div class="alert alert-success alert-dismissible in">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ session('flash') }}
        </div>
    </div>
@endif

@include('layouts.footer')



{{--@yield('script')--}}
</body>
</html>