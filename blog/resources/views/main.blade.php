<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Главная страница</title>
</head>
<style>
    body {
        background: #76b852; /* fallback for old browsers */
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>
<body>
@section('navbar')
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ route('home') }}">FriendClub</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{ route('home') }}">Главная</a></li>
            <li class="active"><a href="#">Новости</a></li>
            @if (\Illuminate\Support\Facades\Auth::check())
                @if(Illuminate\Support\Facades\Auth::user()->status_check())
                    <li class="active"><a href="{{ route('home') }}">Друзья</a></li>
                    <li class="active"><a href="{{ route('profile', ['firstname'=>\Illuminate\Support\Facades\Auth::user()->getName()])}}">Мой профиль</a></li>
                    <li class="active"><a href="{{ route('home') }}">{{ \Illuminate\Support\Facades\Auth::user()->getNameandLastname() }}</a></li>
                    @if(Illuminate\Support\Facades\Auth::user()->admin_check())
                        <li class="active"><a href="{{ route('admin') }}">Админ-панель</a></li>
                    @endif
                @else
                    <h5 style="color: red" >Вы забанены</h5>
                @endif
            @endif
        </ul>

        @if (\Illuminate\Support\Facades\Auth::check())
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('auth.signout') }}"><span class="glyphicon glyphicon-log-out"></span> Выход</a></li>
                @else
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ route('auth.signin') }}"><span class="glyphicon glyphicon-user"></span> Вход</a></li>
                <li><a href="{{ route('auth.signup') }}"><span class="glyphicon glyphicon-log-in"></span> Регистрация</a></li>
            </ul>
        @endif
    </div>
</nav>
@show




</body>
</html>
