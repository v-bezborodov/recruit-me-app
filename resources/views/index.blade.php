@extends('layouts.root')

@section('meta_title')
   Recruitment process- web developer Slawek.dev
@stop


@section('meta_description')
    Recruitment List of Slawek Bezborodov
@stop
{{--{{ $recruitments }}--}}
{{--{{print_r($recruitments)}}--}}
{{--@foreach($recruitments as $t)--}}
{{--{{$t->user->email}}--}}
{{--@endforeach--}}

@section('content')
    <section class="content">
        <recrutation-component>

        </recrutation-component>
    </section>
@stop


{{--@section('script')--}}
{{--<script>--}}
{{--    --}}{{--window.data = {!! json_encode($recruitments) !!};--}}
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--</script>--}}
{{--@stop--}}

{{--@section('script')--}}
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--@stop--}}






