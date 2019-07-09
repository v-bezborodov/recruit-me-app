<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>@yield('meta_title')</title>
<meta name="description" content="@yield('meta_description')" />
{{--<script src="/js/app.js"></script>--}}

{{--<script src="{{ asset('js/app.js') }}" ></script>--}}
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset(elixir('css/style.css', '')) }}" />
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">

<link  href="http://127.0.0.1:8000/fonts/font-awesome/fontawesome.css" rel="stylesheet">
<link  href="http://127.0.0.1:8000/fonts/font-awesome/brands.css" rel="stylesheet">
<link  href="http://127.0.0.1:8000/fonts/font-awesome/solid.css" rel="stylesheet">




