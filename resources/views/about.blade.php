@extends('layouts.root')

@section('meta_title')
    {{ config('app.name') }} - About
@stop


@section('meta_description')
    About application
@stop


@section('content')
    <section>
        <div class="container d-flex justify-content-center">
            <div class="card card-profile" style="width: 18rem;">
                <img src="./img/slawek.jpeg" class="card-img-top" alt="card image">
                <div class="card-body">
                    <p class="card-text">Hy my name is Slawek. Let me introduce small but useful app for facilitating my personal hiring process. If you was provided to that page most likely you're involved to lifecycle of recrutation processes. Whoever you was, feel free  problem solving</p>
                </div>
            </div>

        </div>
    </section>

@stop







