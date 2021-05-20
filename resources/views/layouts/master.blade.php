<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} : @yield('title')</title>


    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('index') }}">{{ config('app.name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('index') }}">Все товары</a></li>
                <li><a href="{{ route('categories') }}">Категории</a>
                </li>
                <li><a href="{{ route('basket') }}">В корзину</a></li>
                {{--<li><a href="{{ route('sbros') }}">Сброс сессии</a></li>--}}
            <!--<li><a href="{{ route('index') }}">Сбросить проект в начальное состояние</a></li>
                <li><a href="/locale/en">en</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">₽<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/currency/RUB">₽</a></li>
                        <li><a href="/currency/USD">$</a></li>
                        <li><a href="/currency/EUR">€</a></li>
                    </ul>
                </li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest
                    <li><a href="{{ route('login') }}">Вход</a></li>
                    <li><a href="{{ route('register') }}">Регистрация</a></li>
                @endguest
                @auth
                    <li><a href="{{ route('home') }}">Панель управления</a></li>
                    <li><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выход</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
            </ul>

        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">
        @if(session()->has('success'))
            <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if(session()->has('warning'))
            <p class="alert alert-danger">{{ session('warning') }}</p>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>
