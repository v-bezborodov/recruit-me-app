<header class="pb-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="/img/slawek.jpeg" width="30" height="30" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-uppercase">
                <li class="nav-item active">
                    <a class="nav-link" href="https://slawek.dev">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{route('recrutation')}}">Recrutation
                        <div class="recrutation-counter position-absolute"><p>14</p></div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('download')}}">Download CV</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About APP</a>
                </li>

                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
{{--                        {{ Auth::user()->name }} --}}
                        <span class="caret"></span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">logout</a>
                </li>

    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link disabled" href="#">Disabled</a>--}}
    {{--            </li>--}}
            </ul>
        </div>
    </nav>
</header>