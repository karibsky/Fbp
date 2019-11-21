@extends('layout.layout')
<link rel="stylesheet" href="{{asset('css/media.css')}}" type="text/css" media="all and (max-width:900px)">
@section('content')
<wrapper>
    <div id="dws-slider" class="carousel slide" data-ride="carousel">
        <!--Показатели-->
        <ol class="carousel-indicators">
            <li data-target="#dws-slider" data-slide-to="0" class="active"></li>
            <li data-target="#dws-slider" data-slide-to="1"></li>
            <li data-target="#dws-slider" data-slide-to="2"></li>
        </ol>

        <!--Обертка для слайдов-->
        <div class="carousel-inner" role="listbox">
            @foreach($sliders as $slider)
            <div class="{{$slider->active}}"><img src="/img/slider/{{$slider->image}}" alt="Картинка 1">
                <div class="carousel-caption">
                    <h3 class="text-uppercase">{{$slider->title}}</h3>
                    <p>{{$slider->text}}</p>
                </div>
            </div>
            @endforeach
        </div>

        <!--Элементы управления-->
        <a class="left carousel-control" href="#dws-slider" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#dws-slider" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</wrapper>
<div class="containerer content-services">
    <div class="services-title">
        <h1>
            Услуги
        </h1>
    </div>
    <div class="row services">
        <div class="col-md-12">
            <div id="news-slider" class="owl-carousel">
                @foreach($services as $service)
                <div class="post-slide">
                    <a class="one" href="{{ url('/application/'.$service->id) }}">
                        <div class="circle">
                            {{$service->name}}
                        </div>
                        <div class="post-img">
                            <img src="img/services/{{$service->icon}}" alt="">
                        </div>
                        <div class="post-review"><h3><a></a></h3><p></p></div>
                    </div>
                    @endforeach
                </div>
                <div class="slider_nav">
                    <span class="am-next"><i class='fa fa-chevron-left fa-2x'></i></span>
                    <span class="am-prev"><i class='fa fa-chevron-right fa-2x'></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="product2">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="product-title">
                    <h1>
                        Программное обеспечение компании «1С»
                    </h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-body">
                    <p>
                    Система программ "1С:Предприятие" предназначена для автоматизации управления и учета на предприятиях различных отраслей, видов деятельности и типов финансирования, и включает в себя решения для комплексной автоматизации производственных, торговых и сервисных предприятий, продукты для управления финансами холдингов и отдельных предприятий, ведения бухгалтерского учета, расчета зарплаты и управления кадрами, для учета в бюджетных учреждениях, разнообразные отраслевые и специализированные решения, разработанные самой фирмой "1С", ее партнерами и независимыми организациями. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view view-tenth">
                    <div class="n-img-responsive1">
                        <img src="img/product.png" />
                        <div class="mask">
                            <h2>Программное обеспечение компании «1С»</h2>
                            <p>Бизнес вариант (большой и средний бизнес).
                                Эконом вариант (для небольших магазинов).
                            </p>
                            <a href="{{ url('/catalog') }}" class="info">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product1">
        <div class="container-fluid">
            <div class="col-md-12">
                <div class="product-title">
                    <h1>
                        Торговое оборудование компании «АТОЛ»
                    </h1>
                </div>
            </div>
            <div class="col-md-6">
                <div class="view view-tenth2">
                    <div class="n-img-responsive2">
                        <img src="img/kassy.png" />
                        <div class="mask2">
                            <h2>Торговое оборудование компании «АТОЛ»</h2>
                            <p>Бизнес вариант (большой и средний бизнес).
                                Эконом вариант (для небольших магазинов).
                            </p>
                            <a href="{{ url('/catalog') }}" class="info">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-body">
                    <p>IT-Компания АТОЛ специализируется на автоматизации розничной торговли и в сфере услуг. Компания разрабатывает оборудование и программное обеспечение для автоматизации бизнеса: кафе, ресторанов, гостниц, сферы услуг. Их оборудование и программное обеспечение всегда соответствует последним изменениям законодательства.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container content-services">
        <div class="services-title">
            <h1>
                Клиенты
            </h1>
        </div>
        <div class="row services">
         <div class="col-md-12">
            <div id="news-slider2" class="owl-carousel owl-theme owl-loaded">
                @foreach($clients as $client)
                <div class="post-slide">
                    <div class="post-img2">
                        <a href="{{$client->url}}"target="_blank"><img src="img/clients/{{$client->logo}}" alt="">
                        <h4>{{$client->name}}</h4></a>
                    </div>
                    <div class="post-review"><h3><a></a></h3><p></p></div>
                </div>
                @endforeach
            </div>
            <div class="slider_nav">
                    <span class="am-next1"><i class='fa fa-chevron-left fa-2x'></i></span>
                    <span class="am-prev1"><i class='fa fa-chevron-right fa-2x'></i></span>
            </div>
        </div>
    </div>
</div>
<div id="back-to-top">
        <i class="fa fa-chevron-up"></i>
    </div>
<div id="map" style="width:100%; height:60vh;"></div>
<script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>
<script type="text/javascript">
 DG.then(function() {
    map = DG.map('map', {
        center: [55.185433, 61.362829],
        zoom: 18,
        dragging : true,
        touchZoom: false,
        scrollWheelZoom: false,
        doubleClickZoom: false,
        boxZoom: false,
        geoclicker: false,
        zoomControl: true,
        fullscreenControl: false
    });
    icon = DG.icon({
        iconUrl: "{{asset('img/logoicon1.png')}}",
        iconSize: [32, 45]
    });
    DG.marker([55.185555, 61.362829], {
        icon: icon
    }).addTo(map);
});     
</script>

<script>
    $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[767,1],
        pagination:false,
        transitionStyle:"fade",
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });
    $("#news-slider2").owlCarousel({
     items:5,
     itemsDesktop:[1199,3],
     itemsDesktopSmall:[1000,2],
     itemsMobile:[650,1],
     pagination:false,
     navigationText:false,
     autoPlay:true,
     autoplaySpeed:1000,
     dots:true,
     interval: 1000,
     navigation:true,
    navigationText: [$('.am-next1'),$('.am-prev1')]

 });
    $("#news-slider").owlCarousel({
        items:3,
        itemsDesktop:[1199,3],
        itemsDesktopSmall:[1000,2],
        itemsMobile:[650,1],
        pagination:false,
        autoPlay:true,
        navigation:true,
        navigationText: [$('.am-next'),$('.am-prev')]
    });
</script>
 <script type="text/javascript">
        var limit     = $(window).height()/11,
    $backToTop = $('#back-to-top');
        $(window).scroll(function () {
    if ( $(this).scrollTop() > limit ) {
        $backToTop.fadeIn();
    } else {
        $backToTop.fadeOut();
    }
        });
        $backToTop.click(function () {
    $('body,html').animate({
        scrollTop: 0
    }, 1500);
    return false;
});

</script>
@endsection
