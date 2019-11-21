<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset=utf-8>
    <title>1С-ФБП</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="SHORTCUT ICON" href="{{asset('img/logoicon2.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="shortcut icon" href="{{asset('img/logoicon2.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="https://1c-fbp.ru/img/logoicon2.png">
    <meta name="keywords" content="1C,Автоматизация ,фабрика бизнес процессов,бизнес-процессы,кассы купить, 1с купить, программы 1с , автоматизация бизнеса , обслуживание 1с ,1с отчетность">
    <meta name="description" content="Бухгалтерские программы,Автоматизация бизнес-процессов,Автоматизация производственных процессов,автоматизация розничной торговли.">
</head>
<body>
 <nav class="navbar navbar-custom navbar-sticky-top">
    <div class="container">
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
                <li><a href="/">Главная</a></li>
                <li ><a href="/catalog">Каталог</a></li>
                <li><a class="contact-link" href="#">Контакты</a></li>
                <li><a href="/promo">Акции</a></li>
                @guest
                <li><a href="{{url('login')}}">Войти</a></li>
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} {{ Auth::user()->patronymic }}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user()->isAdmin)
                        <li> 
                            <a class="dropdown-item" href="/admin/stats">Админ Меню</a>
                        </li>  
                        <li>
                            <a class="dropdown-item" href="{{ url('/cart') }}">Корзина</a>
                        </li> 
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Выйти') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </li>     
                    @endif                     
                </ul>
            </li>
            @endguest 
        </ul>
    </div>
</div>
</nav>
<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>
@yield('content')
<div class="footer-content">
    <div class="container-fluid content-1">
        <div class="col-md-4">
            <div class="n-img-responsive1">
                <img style="width: 180px;" src="{{asset('img/logo01.png')}}" alt="Logotip">
            </div>
        </div>
        <div class="col-md-4">
            <p>
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                г. Челябинск <br>Северо-крымская, д. 91, оф.3 <br>
                <i class="fa fa-envelope-o" aria-hidden="true"></i>1c-fbp@mail.ru<br>
                <i class="fa fa-phone" aria-hidden="true"></i>+7 (351) 218-00-14<br>
                +7 (919) 319-4444
            </p>
        </div>
        <div class="col-md-4">
            <div class="developers-title" style="font-size:14px; color:#fff;">Мы в социальных сетях:</div>
            <a href="#" target="_blank">
                <i class="fa fa-facebook-official fa-2x" aria-hidden="true"></i> &nbsp;
            </a>
            <span class="icon">Facebook</span><br>
            <a href="#" target="_blank">
                <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i> &nbsp;
            </a>
            <span class="icon">WhatsApp</span><br>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".contact-link").click(function(){
        $('html, body').animate({scrollTop:$('.footer-content').position().top}, 2000);
    });
</script>
<script type="text/javascript">
            function show(state){
                    document.getElementById('window').style.display = state;
                    document.getElementById('wrap').style.display = state;
            }
            
        </script>
</body>
</html>
