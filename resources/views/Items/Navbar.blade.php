<nav class="navbar navbar-expand-lg bg-none navbar-dark text-light "
     style="border-bottom: solid 2px mediumorchid;">
    <div class="container-fluid container">
        <a class="navbar-brand" href="{{ route('mainpage') }}">Главная</a>
        <button class="navbar-toggler" style="margin-right: auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('shop') }}">Shop</a>
                </li>
            </ul>
        </div>
{{--        @guest()--}}
            <li class="navbar-nav mb-lg-0">
                <a href="" class="nav-link size-50 link-light">Войти</a>
            </li>
{{--        @endguest--}}
{{--        @auth()--}}
{{--            <li class="navbar-nav nav-item dropdown">--}}
{{--                <a class="nav-link link-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                    {{ Auth::user()->name }}--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu dropdown-menu-end">--}}

{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{ route('home') }}">Личный кабинет</a>--}}
{{--                    </li>--}}

{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">--}}
{{--                            Выйти--}}
{{--                        </a>--}}
{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                    </li>--}}

{{--                </ul>--}}
{{--            </li>--}}
{{--        @endauth--}}
    </div>
</nav>
