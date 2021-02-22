<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Document</title>
</head>
<style>
    body{
        background: #76b852; /* fallback for old browsers */
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    .emp-profile{
        padding: 3%;
        margin-top: 3%;
        margin-bottom: 3%;
        border-radius: 0.5rem;
        background: #fff;
    }
    .profile-img{
        text-align: center;
    }
    .profile-img img{
        width: 70%;
        height: 100%;
    }
    .profile-img .file {
        position: relative;
        overflow: hidden;
        margin-top: -20%;
        width: 70%;
        border: none;
        border-radius: 0;
        font-size: 15px;
        background: #212529b8;
    }
    .profile-img .file input {
        position: absolute;
        opacity: 0;
        right: 0;
        top: 0;
    }
    .profile-head h5{
        color: #333;
    }
    .profile-head h6{
        color: #0062cc;
    }
    .proile-rating span{
        color: #495057;
        font-size: 15px;
        font-weight: 600;
    }
    .profile-head .nav-tabs{
        margin-bottom:5%;
    }
    .profile-head .nav-tabs .nav-link{
        font-weight:600;
        border: none;
    }
    .profile-head .nav-tabs .nav-link.active{
        border: none;
        border-bottom:2px solid #0062cc;
    }

    .profile-tab label{
        font-weight: 600;
    }
    .profile-tab p{
        font-weight: 600;
        color: #0062cc;
    }
</style>
<body>
@if ($info = session('info'))
    <div class="alert alert-danger">
        <p>{{ $info }}</p>
    </div>
@endif
@foreach($all_user as $us)

    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4 col-xs-10">
                <div class="profile-img">
                    <img src="{{ \Illuminate\Support\Facades\Auth::user()->getAvatarsPath($us->id) . $us->avatar }}" alt="Foto">
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <hr>
                    <a href="{{ route('user', ["id"=>$us->id]) }}"><b>{{ $us->firstname }} {{ $us->lastname }}</b></a>
                    <hr>
                </div>
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Имя</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->firstname }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Фамилия</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->lastname }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Email</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Номер телефона</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->phone_number }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Пол</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->sex }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Дата рождения</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->day }}
                                    {{ $us->month }}
                                    {{ $us->year }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Права</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->roles->pluck("name") }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Статус</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $us->status }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <hr>
@endforeach
</body>
</html>
