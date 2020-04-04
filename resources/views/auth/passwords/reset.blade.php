@extends('layouts.authentication')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif

<form method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}

    <input type="hidden" name="token" value="{{ $token }}">

    <div class="logo-container d-flex justify-content-center mb-2">
        <img class="logo" src="{{ asset('img/logo.png')}}">
    </div>
    <h4 class="text-center">
        Modificar Senha
    </h4>
    
    <div class="form-group row">
        <div class="col-md-12">
            <label for="email" class="col-form-label">Email</label>
            <input id="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
            
            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-12">
            <label for="password" class="col-form-label">Nova Senha</label>
            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $password or old('password') }}" required autofocus>
            
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
    <div class="form-group row">
        <div class="col-md-12">
            <label for="password_confirm" class="col-form-label">Repita a nova Senha</label>
            <input id="password_confirm" type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required>
            
            @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
        </div>
    </div>
    
     <div class="form-group row mb-2">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary col">
                Mudar Senha
            </button>
        </div>
    </div>
    
</form>
@endsection
