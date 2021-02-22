@extends('main')
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Регистрация</title>


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

    form { margin: 0px 10px; }

    h2 {
        margin-top: 2px;
        margin-bottom: 2px;
    }

    .container { max-width: 360px; }

    .divider {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 5px;
    }

    .divider hr {
        margin: 7px 0px;
        width: 35%;
    }

    .left { float: left; }

    .right { float: right; }

</style>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@section('navbar')
    @parent
<div class="container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>
                                    <p>{{ $err }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="post" action="{{ route('auth.signup') }}">
                    @csrf
                    <div class="form-group">
                        <h2>Создание нового аккаунта</h2>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupName">Ваше имя</label>
                        <input type="text" name="firstname" id="firstname" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupEmail">Ваша фамилия</label>
                        <input type="text" name="lastname" id="lastname" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupEmail">Ваш номер телефона</label>
                        <input type="tel" name="phone_number" id="phone_number" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupEmail">Ваш пол</label>
                        <select name="sex" id="sex">
                            <option>Женский</option>
                            <option>Мужской</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupEmail">Дата рождения</label><br/>
                        <select name="day" id="day"></select>
                        <select name="month" id="month">
                            <option>января</option>
                            <option>февраля</option>
                            <option>марта</option>
                            <option>апреля</option>
                            <option>мая</option>
                            <option>июня</option>
                            <option>июля</option>
                            <option>августа</option>
                            <option>сентрября</option>
                            <option>октября</option>
                            <option>ноября</option>
                            <option>декабря</option>
                        </select>
                        <select name="year" id="year"></select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupEmailagain">Ваш email</label>
                        <input type="email" name="email" id="email" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupPassword">Пароль</label>
                        <input type="password" name="password" id="password" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="signupPasswordagain">Повторный пароль</label>
                        <input type="password" name="passwordagain" id="passwordagain" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info btn-block">Создать новый аккаунт</button>
                    </div>
                    <p style="text-align: center">Уже имеется аккаунт?</p>
                    <p style="text-align: center"><a href="{{ route('auth.signin') }}">Войти</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    for (let year = 1940; year <= 2021; year++) {
        let options = document.createElement("OPTION");
        document.getElementById("year").appendChild(options).innerHTML = year;
    }
    for (let day = 1; day <= 31; day++) {
        let options = document.createElement("OPTION");
        document.getElementById("day").appendChild(options).innerHTML = day;
    }
</script>
@endsection


</html>
