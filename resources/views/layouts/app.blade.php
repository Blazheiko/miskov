<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="z-index: 99999999">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Вихід') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>

        </nav>


        <div class="container-fluid">
            <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-info">
                <a class="navbar-brand" href="#">Меню</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1" aria-controls="navbar1" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar1">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="">Головна <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('personnel') }}">Кадри</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('workingShift') }}">Зміни</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('specialty') }}">Спеціальності</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Зарплата</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('product') }}">Продукція</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Покупці</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Замовлення</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('storage') }}">Склад</a>
                        </li>
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Склад</a>--}}
{{--                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1">--}}
{{--                                <a class="dropdown-item" href="#">Всі склади</a>--}}
{{--                                <a class="dropdown-item" href="#">Склад №1</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="#">Склад №2</a>--}}
{{--                                <a class="dropdown-item" href="#">Склад №3</a>--}}
{{--                                <div class="dropdown-divider"></div>--}}
{{--                                <a class="dropdown-item" href="#">Склад №4</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
                    </ul>
{{--                    <form class="form-inline my-2 my-lg-0">--}}
{{--                        <input class="form-control mr-sm-2" type="search" placeholder="Пошук" aria-label="Search">--}}
{{--                        <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Пошук</button>--}}
{{--                    </form>--}}
                </div>
            </nav>

        </div>




        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
