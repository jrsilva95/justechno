@extends('layouts.authentication')

@section('content')
<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="logo-container d-flex justify-content-center mb-2">
        <img class="logo" src="{{ asset('img/logo.png')}}">
    </div>
    <h4 class="text-center">
        Login
    </h4>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Senha</label>
        <input id="password" type="password" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="password" required autocomplete="password" autofocus>
        @if ($errors->has('pass'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group row">
        <div class="col-md-12">
            <div class="form-check" hidden>
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
            @if (Route::has('password.request'))
                <a class="btn btn-link col" href="{{ route('password.request') }}">
                    {{ __('Esqueçeu a senha?') }}
                </a>
            @endif
        </div>
    </div>

    <div class="form-group row mb-2">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary col">
                {{ __('Login') }}
            </button>
        </div>
    </div>
    <div class="form-group row mb-0">
        <div class="col-md-12">
            <a type="button" class="btn btn-light col" href="/register">Solicitar Cadastro</a>
        </div>
    </div>
    </form>
@endsection