<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{csrf_token()}}">
<title>@yield('meta_title')</title>
<meta name="description" content="@yield('meta_description')" />
{{--<script src="/js/app.js"></script>--}}

<script src="{{ asset('js/app.js') }}"></script>
<link href="{{asset('css/app.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset(elixir('css/style.css', '')) }}" />



