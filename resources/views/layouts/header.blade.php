<header class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">
            <img src="/img/slawek.jpeg" width="30" height="30" alt="">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto text-uppercase">

                <li class="nav-item">
                    <a class="nav-link position-relative" href="{{route('recrutation')}}">Recrutation Flow
                        @auth
                            <div class="recrutation-counter position-absolute"><p>{{\App\Recruitment::count()}}</p></div>
                        @endauth
                    </a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{route('download')}}">Download CV</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About APP</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="https://slawek.dev">Blog <span class="sr-only">(current)</span></a>
                </li>


    {{--            <li class="nav-item">--}}
    {{--                <a class="nav-link disabled" href="#">Disabled</a>--}}
    {{--            </li>--}}
            </ul>

            <ul class="navbar-nav navbar-right text-uppercase">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Hi, {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('profile.index') }}">My Profile</a>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
