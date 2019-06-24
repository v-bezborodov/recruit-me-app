@extends('layouts.root')

@section('meta_title')
    Download CV - web developer Slawek.dev
@stop


@section('meta_description')
    Recruitment List of Slawek Bezborodov
@stop


@section('content')
    <section>
        <div class="container d-flex justify-content-center">
            <div class="card card-download" style="width: 18rem;">
                <img src="./img/document-download.png" class="card-img-top" alt="download document">
                <div class="card-body justify-content-center">
                    <p class="card-text">Hy my name is Slawek. Let me introduce small but useful app for facilitating my personal hiring process. If you was provided to that page most likely you're involved to lifecycle of recrutation processes. Whoever you was, feel free  problem solving</p>
                    <a href="{{ asset('download_cv/test.php') }}" class="btn btn-outline-success btn-lg"><i class="glyphicon glyphicon-download-alt"></i> DOWNLOAD CV</a>
                    <a href="" class="btn btn-outline-info btn-lg"><i class="glyphicon glyphicon-info-sign"></i>Info</a>
                </div>
            </div>

        </div>
    </section>

@stop







