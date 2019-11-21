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
<li ><a href="/admin/stats">Статистика</a></li>
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
<div class="container">
<div class="card" style="padding: 15px 0;">
<div class="card-header">
<h2 style="text-align:center;">Количество заказов</h2>
</div>
<div class="card-body">
<canvas id="users_chart"></canvas>
</div>
</div>
<div class="row" height="10vh">
<div class="card" style="padding: 15px 0;">
<div class="card-header">
<h2 style="text-align:center;">Цены</h2>
</div>
<div class="card-body">
<canvas id="prices_chart"></canvas>
</div>
</div>
</div>
<div class="card" style="padding: 15px 0;">
<div class="card-header">
<h2 style="text-align:center;">Товаров в категории</h2>
</div>
<div class="card-body">
<canvas id="categories_chart"></canvas>
</div>
</div>
</div>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
<script>
$.ajax({
  url: "stats/get/orders",
  dataType: 'json',
  success: function(data){
    var ctx = document.getElementById('users_chart').getContext('2d');
    new Chart(ctx, {
      type: 'line',
      label: '',
      data: {
        labels: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
        datasets: [{
          data: [data[0]['orders'], data[1]['orders'], data[2]['orders'], data[3]['orders'], data[4]['orders'], data[5]['orders'], data[6]['orders'], data[7]['orders'], data[8]['orders'], data[9]['orders'], data[10]['orders'], data[11]['orders']],
          backgroundColor: 'transparent', 
          borderColor: 'rgba(0, 99, 132, 1)',
        }],
      },
      options: {
        elements: {
          line: {
            tension: 0, 
          }
        },
        legend: {
          display: false
        }
      }
    });
  }
}); 
$.ajax({
  url: "stats/get/prices",
  dataType: 'json',
  success: function(data){
    var ctx = document.getElementById('prices_chart').getContext('2d');
    new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ['Минимальная цена', 'Максимальная цена', 'Средняя цена'],
        datasets: [{
          data: [data.min, data.max, data.avg],
          backgroundColor: ['#ffcd56', '#ff6384', '#36a2eb'], 
          borderColor: 'rgba(0, 99, 132, 1)',
        }],
      },
      options: {
        legend: {
          display: true,
          labels: {
            fontColor: 'rgb(255, 99, 132)'
          }
        }
      }
    });
  }
});    
$.ajax({
  url: "stats/get/cats",
  dataType: 'json',
  success: function(data){
    var ctx = document.getElementById('categories_chart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Услуги программиста', 'Услуги по автоматизации', 'Кассы', 'Коробки с программой'],
        datasets: [{
          data: [data[0]['count'], data[1]['count'], data[2]['count'], data[3]['count']],
          backgroundColor: ['#ffcd56', '#ff6384', '#36a2eb', '#9933FF'], 
          borderColor: 'rgba(0, 99, 132, 1)',
        }],
      },
      options: {
        legend: {
          display: false
        },
        scales: {
          yAxes: [{
            display: true,
            ticks: {
              beginAtZero: true,
              max: 10,
              min: 0
            }
          }]
        },
      }
    });
  }
}); 
</script>
</body>