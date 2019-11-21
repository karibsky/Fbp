<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset=utf-8>
    <title>1С-ФБП</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="SHORTCUT ICON" href="{{asset('img/logoicon2.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="shortcut icon" href="{{asset('img/logoicon2.png')}}" type="image/x-icon">
    <meta name="keywords" content="1C,Автоматизация ,фабрика бизнес процессов,бизнес-процессы,кассы купить, 1с купить, программы 1с , автоматизация бизнеса , обслуживание 1с ,1с отчетность">
    <meta name="description" content="Бухгалтерские программы,Автоматизация бизнес-процессов,Автоматизация производственных процессов,автоматизация розничной торговли.">
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-custom navbar-sticky-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Навигация</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><img style="width: 160px;" src="{{asset('img/logo01.png')}}" alt="Logotip"></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
            <li><a href="/admin/stats">Статистика</a></li>
                <li><a href="/admin">Товары</a></li>
                <li><a href="/admin/promo">Акции</a></li>
                <li><a href="/admin/users">Пользователи</a></li>
                <li><a href="/admin/orders">Заказы</a></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} {{ Auth::user()->patronymic }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                        <a class="dropdown-item" href="/">На главную</a>
                    </li>                             
                </ul>
            </li>
        </ul>
    </div>
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main">
                <div class="col-sm-12 col-md-12" id="content">
                <a type="button" class="btn add" href="/admin/user/add" style="background:#000; color:#fff;">Добавить пользователя</a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>Организация</th>
                <th>Роль</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->lastname}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->patronymic}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->organisation}}</td>
                <td>
                @if($user->isAdmin == 0)
                    Пользователь
                @elseif($user->isAdmin == 1)
                    Администратор
                @endif 
                </td>
                <td><a href="{{url('admin/user/update/'.$user->id)}}"><i class="fa fa-pencil-square fa-2x" aria-hidden="true" style="color:#000;"></i></a></td>
                <td><a href="{{url('admin/user/delete/'.$user->id)}}"><i class="fa fa-trash fa-2x" aria-hidden="true" style="color:#000;"></i></a></td>
            </tr>
          @endforeach
        <tfoot>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>E-mail</th>
                <th>Телефон</th>
                <th>Организация</th>
                <th>Роль</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{asset('js/notify.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/animate.css')}}" type="text/css">
@if($errors->any())
<input type="hidden" value="{{$errors->first()}}" id="message">
<script>
const msg = $('#message').val();
$.notify({
    icon: 'glyphicon glyphicon-warning-sign',
    message: msg
}, {
element: 'body',
    position: null,
    type: "success",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
        from: "bottom",
        align: "left"
    },
    offset: 20,
    spacing: 10,
    z_index: 1031,
    delay: 3000,
    timer: 1000,
    mouse_over: null,
    animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
    },
    onShow: null,
    onShown: null,
    onClose: null,
    onClosed: null,
    icon_type: 'class',
});
</script>
@endif
</body>