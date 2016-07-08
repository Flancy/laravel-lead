<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="token" id="token" value="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/all.css">
</head>
<body id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="/">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if (!Auth::guest())
                    <ul class="nav navbar-nav">
                        <li><a href="/">Главная</a></li>
                    </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="/login">Войти</a></li>
                        <li><a href="/register">Зарегистрироваться</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                @role('company|admin')
                                    {{ Auth::user()->company->name }} <span class="caret"></span>
                                @else
                                    {{ Auth::user()->lead->name }} <span class="caret"></span>
                                @endrole
                            </a>

                            <ul class="dropdown-menu">
                                @role('company|admin')
                                    <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>Баланс: @{{ debit.userDebit }} р.</a></li>
                                @endrole
                                <li><a href="/logout"><i class="fa fa-btn fa-sign-out"></i>Выйти</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="/js/all.js"></script>
</body>
</html>
