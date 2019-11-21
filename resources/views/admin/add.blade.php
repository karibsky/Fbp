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

<form action="/admin/product/add/new" method="post" enctype="multipart/form-data" style="margin:30px 0;">
                {{ csrf_field() }}
    <div id="page-wrapper">
        <div class="container">
            <div class="row" id="main">
                <div class="col-sm-12 col-md-12" id="content">
                <div class="form-group">
    <label>Артикул</label>
    <input type="text" class="form-control" placeholder="460154" name="article">
  </div>
  <div class="form-group">
    <label>Название</label>
    <input type="text" class="form-control" placeholder="1С:Бухгалтерия 8. ПРОФ" name="name">
  </div>
  <div class="form-group">
    <label>Описание</label>
    <input type="text" class="form-control" placeholder="Коробка 1С:Бухгалтерия 8. ПРОФ" name="desc"> 
  </div>
  <div class="form-group">
    <label>Категория</label> <br>
    <select class="browser-default custom-select" id="category" name="category">
    <option selected disabled hidden>Выберите категорию</option>
      <option value="1">Услуги</option>
      <option value="2">Товары</option>
    </select>
  </div>
  <div class="form-group">
    <label>Подкатегория</label> <br>
    <select class="browser-default custom-select" id="subcategory" name="subcategory">
      <option value="1" id="one">Услуги программиста</option>
      <option value="2" id="two">Услуги по автоматизации</option>
      <option value="3" id="three">Кассы</option>
      <option value="4" id="four">Коробки с программой</option>
    </select>
  </div>
  <div class="form-group">
    <label>Цена</label>
    <input type="text" class="form-control" placeholder="13000" name="price"> 
  </div>
  <div class="form-group">
    <label>Изображение</label>
    <input type="file" name="file">
  </div>
  <div class="form-group">
    <label>Надпись красным</label>
    <input type="text" class="form-control" placeholder="Хит продаж" name="red"> 
  </div>
  <div class="form-group">
    <label>Надпись зеленым</label>
    <input type="text" class="form-control" placeholder="Акция" name="green"> 
  </div>
  <button type="submit" class="btn" style="background:#000; color:#fff;">Добавить</button>
            </div>
        </div>  
        
    </div>
    </form>
</div>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script>
  $('#category').change(function(){
  if($(this).val() == 1){ 
    $("#subcategory").val(1);
    $("#subcategory #three").hide();
    $("#subcategory #four").hide();
    $("#subcategory #one").show();
    $("#subcategory #two").show();
  }
  else if($(this).val() == 2){
    $("#subcategory").val(3);
    $("#subcategory #three").show();
    $("#subcategory #four").show();
    $("#subcategory #one").hide();
    $("#subcategory #two").hide();
  }
});
</script>
</body>