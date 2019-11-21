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
        
        <form action="/admin/promo/add/new" method="post" style="margin:30px 0;">
            {{ csrf_field() }}
            <div id="page-wrapper">
                <div class="container">
                    <div class="row" id="main">
                        <div class="col-sm-12 col-md-12" id="content">
                            <div class="form-group">
                                <label>Название</label>
                                <input type="text" class="form-control" placeholder="Скидка до 50% на кассы атол" name="title">
                            </div>
                            <div class="form-group">
                                <label>Описание</label>
                                <textarea class="form-control" name="text" style="height:200px; resize:none;" placeholder="В Акции принимают участие следующие программные продукты: 
                                1С:Бухгалтерия 8. Базовая версия. Электронная поставка 
                                1С:Зарплата и Управление Персоналом 8. Базовая версия. Электронная поставка
                                1С:Управление торговлей 8. Базовая версия. Электронная поставка"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Ссылка</label>
                                <input type="text" class="form-control" placeholder="https://www.youtube.com/embed/98ktoEBWni8" name="url"> 
                            </div>
                            <button type="submit" class="btn" style="background:#000; color:#fff;">Добавить</button>
                        </div>
                    </div>  
                    
                </div>
            </form>
        </div>
        <script src="{{asset('public/js/jquery.js')}}"></script>
        <script src="{{asset('public/js/bootstrap.js')}}"></script>
    </body>