@extends('layout.layout')

@section('content')
<div class="container-small-content">           
    <form method="POST" action="{{ route('password.request') }}">

        @if($errors->any())
        <h4 class="bg-success text-white">{{ $errors->first() }}</h4>
        @endif

        {{ csrf_field() }}

        <div class="register-title"><h2>Вход на сайт</h2></div>
        <input type="hidden" name="token" value="{{ $token }}">

        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus placeholder="Email">

        @if ($errors->has('email'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif

        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Пароль">

        @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Повторите пароль">
        <div class="button-test">
            <button class="btn btn-primary btn-block" type="submit">Изменить пароль</button>
        </div>
    </form>
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
