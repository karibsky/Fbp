@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="container-small-content">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">

                {{ csrf_field() }}

                <div class="register-title"><h2>Восстановление пароля</h2></div>
                <div class="register">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <div class="button-test">
                        <button class="btn btn-primary btn-block" type="submit">Восстановить</button>
                    </div>
                </div>
            </form>
        </div>
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
