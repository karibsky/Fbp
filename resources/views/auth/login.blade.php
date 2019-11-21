@extends('layout.layout')

@section('content')
<div class="container-small-content">
    <form method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

        <div class="register-title"><h2>Вход на сайт</h2></div>
        <div class="register">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Пароль">

            <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
            <center>
                <p>Нет аккаунта? <a href="/application" class="myButton">Подать заявку</a></p>
                <a href="{{ route('password.request') }}">Забыли пароль?</a>
            </center>
        </form>
        @if($errors->any())
        <br>
        <div class="alert alert-danger"><h5><i class="fa fa-exclamation-circle" aria-hidden="true">&nbsp;</i>{{$errors->first()}}</h5>
        </div>
        @endif
    </div>
</div>

<style>
form {
    position: absolute; 
    top: 40%; 
    left: 50%;
    width: 50%;
    transform: translate(-50%, -50%);
}
</style>
@endsection
