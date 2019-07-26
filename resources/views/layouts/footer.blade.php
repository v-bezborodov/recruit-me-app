<footer class="bg-dark pt-0 pt-5">

    <div class="row">
        <div class="col-4">
            <nav class="navbar navbar-footer text-white">
                <a class="navbar-brand" href="/">
                    <img src="/img/slawek.jpeg" width="30" height="30" alt="">
                </a>

                <div class="collapse navbar-collapse">
                    <ul class="">

                        <li class="nav-item">
                            <a class="nav-link position-relative" href="{{route('recrutation')}}">Recrutation Flow
                                @auth
                                    <div class="recrutation-counter position-absolute"><p>{{\App\Recruitment::count()}}</p></div>
                                @endauth
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('download')}}">Download CV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('about')}}">About APP</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="https://slawek.dev">Blog <span class="sr-only">(current)</span></a>
                        </li>
                    </ul>
                </div>
            </nav>


        </div>
        <div class="col-8">


        </div>

    </div>
</footer>