<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset=utf-8>
    <title>1С-ФБП</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="SHORTCUT ICON" href="{{asset('public/img/logoicon2.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('public/css/bootstrap.css')}}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/css/admin.css')}}" type="text/css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="shortcut icon" href="{{asset('public/img/logoicon2.png')}}" type="image/x-icon">
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
            <a class="navbar-brand" href="/"><img style="width: 160px;" src="{{asset('public/img/logo01.png')}}" alt="Logotip"></a>
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
                <table id="example" class="table table-striped table-bordered" style="width:100%; margin-top:20px">
        <thead>
            <tr>
                <th>ID пользователя</th>
                <th>ID товара</th>
                <th>Количество</th>
                <th>Статус заказа</th>
                <th>Дата создания</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->userid}}</td>
                <td>{{$order->versionid}}</td>
                <td>{{$order->qty}}</td>
                <td>{{$order->status}}</td>
                <td>{{$order->created_at}}</td>
            </tr>
          @endforeach
        <tfoot>
            <tr>
            <th>ID пользователя</th>
                <th>ID товара</th>
                <th>Количество</th>
                <th>Статус заказа</th>
                <th>Дата создания</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('public/js/jquery.js')}}"></script>
<script src="{{asset('public/js/bootstrap.js')}}"></script>
</body>