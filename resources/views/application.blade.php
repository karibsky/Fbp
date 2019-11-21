@extends('layout.layout')

@section('content')
<div class="container">
  <div class="row">
    <form action="/application/new" method="POST">                                                 
      @if($errors->any())
      <div class="alert alert-danger"><h5><i class="fa fa-exclamation-circle" aria-hidden="true">&nbsp;</i>{{$errors->first()}}</h5>
      </div>
      @endif
      {{ csrf_field() }}
      <div class="register-title"><h2>Заявка на регистрацию пользователя</h2></div>
      <div class="register">
        <input id="lastname" type="text" class="form-control" name="lastname" placeholder="Фамилия" required="required" value="{{old('lastname')}}">
        <input id="name" type="text" class="form-control" name="name" placeholder="Имя" required="required" value="{{old('name')}}">
        <input id="patronymic" type="text" class="form-control" name="patronymic" placeholder="Отчество" required="required" value="{{old('patronymic')}}">
        <input id="email" type="email" class="form-control" name="email" placeholder="Email" required="required" value="{{old('email')}}">
        <input id="password" type="password" class="form-control" name="password" placeholder="Пароль" required="required" value="{{old('password')}}">
        <input id="phone" type="text" class="form-control" name="phone" placeholder="Телефон" required="required" value="{{old('phone')}}">
        <input id="organisation" type="text" class="form-control" name="organisation" placeholder="Название организации" required="required" value="{{old('organisation')}}">
        <div class="tips"> 
          <h4> Выбор программы: </h4>
          <span>Версия <a id="btn-tooltip" title="Нажмите на программу, которую вы используйте, введите рег. номер программы и поставьте галочку для выбора программы"><i class="fa fa-question-circle" aria-hidden="true"></i></a>&nbsp;</th></span>
          <span>Рег. номер <a id="btn-tooltip1" title="Регистрационный номер программы 1С, обычно указан на коробке или руководстве пользователя. Если вы не знаете рег. номер - оставьте поле пустым.">
            <i class="fa fa-question-circle" aria-hidden="true"></i></a> &nbsp;</span>
          </div>
          <br>
          <!-- Сюда аккордеон втыкай -->
          <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
          <script>
            $( function() {
              $( "#accordion" ).accordion({
                collapsible: true
              });
            } );
          </script>
          <div id="accordion">
            @foreach ($programs as $program)
            <h5>{{$program->name}}</h5>
            <div>
              <center>

                <input type="text" name="regnumber[]" placeholder="Рег.номер" style="width: 70%;">&nbsp;&nbsp;&nbsp;
                <input type="checkbox" name="IDversion[]" value="{{$program->id}}" id="check">  
                <label>Отметить</label> 
                <label>Артикул: {{$program->article}}</label>
              </center>
            </div>
            @endforeach
          </div>
          <!-- Здесь аккордеону конец -->
          <div class="button-test"><button class="btn btn-block ok" type="submit">Подать заявку</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="{{asset('js/maskedinput.js')}}"></script>
  <script>
    $('#btn-tooltip').tooltip();
    $('#btn-tooltip1').tooltip();
    $("#phone").mask("+7 (999) 999-99-99");
  </script>
  <style type="text/css">.ok {background-color:#000; color: #fff;} .ok:hover {color: #ffd700;} .ui-accordion-header{background:black; color: #fff;} #accordion h5 {outline: none; border: 0;} .ui-widget-content{background:#fff;} #accordion input[type="text"] {
   border: 1px solid black;
   padding:5px;
   border-radius: 5px;
 }
 @media(max-width: 767px) {#accordion label {display: none;}}
</style>
@endsection