@extends('layouts.register')

@section('content')
<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    {{ csrf_field() }}
    
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="name" class="control-label">Nome</label>
            <input id="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
        </div>
        <div class="col-lg-6">
            <label for="email" class="control-label">Email</label>
            <input id="email" type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <label for="password" class="control-label">Senha</label>
            <input id="password" type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
        </div>
        <div class="col-lg-6">
            <label for="password_confirmation" class="control-label">Repita a senha</label>
            <input id="password_confirmation" type="password" class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-5">
            <label for="cpf" class="control-label">CPF</label>
            <input id="cpf" type="text" class="form-control {{ $errors->has('cpf') ? ' is-invalid' : '' }}" name="cpf" value="{{ old('cpf') }}" required autofocus>
        </div>
        <div class="col-lg-4">
            <label for="rg" class="control-label">RG</label>
            <input id="rg" type="text" class="form-control {{ $errors->has('rg') ? ' is-invalid' : '' }}" name="rg" value="{{ old('rg') }}" required autofocus>
        </div>
        <div class="col-lg-3">
            <label for="org_emitter" class="control-label">Org. Emissor</label>
            <input id="org_emitter" type="text" class="form-control {{ $errors->has('org_emitter') ? ' is-invalid' : '' }}" name="org_emitter" value="{{ old('org_emitter') }}" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-5">
            <label for="birth_day" class="control-label">Data de nascimento</label>
            <input id="birth_day" type="text" class="form-control {{ $errors->has('birth_day') ? ' is-invalid' : '' }}" name="birth_day" value="{{ old('birth_day') }}" required autofocus>
        </div>
        <div class="col-lg-4">
            <label for="ctps" class="control-label">CTPS</label>
            <input id="ctps" type="text" class="form-control {{ $errors->has('ctps') ? ' is-invalid' : '' }}" name="ctps" value="{{ old('ctps') }}" required autofocus>
        </div>
        <div class="col-lg-3">
            <label for="ctps_serie" class="control-label">Série CTPS</label>
            <input id="ctps_serie" type="text" class="form-control {{ $errors->has('ctps_serie') ? ' is-invalid' : '' }}" name="ctps_serie" value="{{ old('ctps_serie') }}" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-5">
            <label for="role_id" class="control-label">Função</label>
            <input id="role_id" type="text" class="form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" name="role_id" value="{{ old('role_id') }}" required autofocus>
        </div>
        <div class="col-lg-4">
            <label for="pis" class="control-label">PIS</label>
            <input id="pis" type="text" class="form-control {{ $errors->has('pis') ? ' is-invalid' : '' }}" name="pis" value="{{ old('pis') }}" required autofocus>
        </div>
        <div class="col-lg-3">
            <label for="oab" class="control-label">OAB</label>
            <input id="oab" type="text" class="form-control {{ $errors->has('oab') ? ' is-invalid' : '' }}" name="oab" value="{{ old('oab') }}" required autofocus>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-lg-6">
            <a href="/" class="btn btn-light col">
                Voltar
            </a>
        </div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-primary col">
                Solicitar Cadastro
            </button>
        </div>    
    </div>
</form>
@endsection
