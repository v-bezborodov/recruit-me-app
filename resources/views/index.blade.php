<!doctype html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @include('layouts.head')
        <title>Recruit Me - Home page</title>
{{--        <title>App Name - @yield('title')</title>--}}
</head>
<body>
{{--@section('sidebar')--}}
{{--    This is the master sidebar.--}}
{{--@show--}}

{{--<div class="container">--}}
{{--    @yield('content')--}}
{{--</div>--}}
<table class="table table-hover">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NAME</th>
            <th scope="col">COMPANY</th>
            <th scope="col">COUNTRY</th>
            <th scope="col">EMAIL</th>
            <th scope="col">PHONE</th>
            <th scope="col">REGISTERED</th>
            <th scope="col">LAST VISITED</th>
            <th scope="col">ACTION</th>
        </tr>
    </thead>

    <tbody>
        @foreach($recruitments as $recruitment)
            <tr>
                <td>{{$recruitment->id}}</td>
                <td>{{$recruitment->name}}</td>
                <td>{{$recruitment->company}}</td>
                <td>{{$recruitment->country}}</td>
                <td>{{$recruitment->email}}</td>
                <td>{{$recruitment->phone}}</td>
                <td>{{$recruitment->created_at}}</td>
                <td>{{$recruitment->updated_at}}</td>
                <td>{{'action'}}</td>
            </tr>
        @endforeach
    </tbody>

</table>
</body>
</html>