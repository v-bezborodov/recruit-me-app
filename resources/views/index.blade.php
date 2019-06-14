@extends('layouts.root')

@section('meta_title')
   Recruitment process- web developer Slawek.dev
@stop


@section('meta_description')
    Recruitment List of Slawek Bezborodov
@stop

@section('content')
            <div id="table-app">
                <table-component data="{{ $recruitments }}"></table-component>
            </div>
@stop

{{--@section('script')--}}
{{--<script>--}}
{{--    --}}{{--window.data = {!! json_encode($recruitments) !!};--}}
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}
{{--</script>--}}
{{--@stop--}}








