@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cliente
                    <div class="pull-right">
                        <a href="#" type="button" class="btn btn-primary btn-sm">Editar</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($client->clientType->id = 2)
                    <div class="row">
                            <div class="col-lg-3">
                                <label>Tipo Cliente</label>
                                <p>{{$client->clientType->name}}</p>
                            </div>
                            <div class="col-lg-3">
                                <label>Orgão Público</label>
                                <p>{{$client->public_agencu}}</p>
                            </div>
                            <div class="col-lg-6">
                                <label id="label_cpf_cnpj">CPF</label>
                                <input class="form-control" type="text" id="cpf_cnpj" name="cpf_cnpj">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label id="label_name">Nome</label>
                                <input class="form-control" type="text" id="name" name="name">
                            </div>
                            <div class="col-lg-6">
                                <label id="label_social_name">Nome Social</label>
                                <input class="form-control" type="text" id="social_name" name="social_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label id="label_birth_day">Data de Nascimento</label>
                                <input class="form-control" type="text" id="birth_day" name="birth_day">
                            </div>
                            <div class="col-lg-3" id="box_gender">
                                <label>Gênero</label>
                                <p>{{$client->gender}}</p>
                            </div>
                            <div class="col-lg-3" id="box_marital_status">
                                <label>Estado Civíl</label>
                                <p>{{$client->maritalStatus}}</p>
                            </div>
                            <div class="col-lg-3" id="box_titulo_eleitor">
                                <label>Titulo de Eleitor</label>
                                <input class="form-control" type="text" id="titulo_eleitor" name="titulo_eleitor">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" id="box_rg">
                                <label>RG</label>
                                <input class="form-control" type="text" id="rg" name="rg">
                            </div>
                            <div class="col-lg-3" id="box_date_emission">
                                <label>Data de Emissão</label>
                                <input class="form-control" type="text" id="date_emission" name="date_emission">
                            </div>
                            <div class="col-lg-3" id="box_org_emitter">
                                <label>Orgão Emissor</label>
                                <input class="form-control" type="text" id="org_emitter" name="org_emitter">
                            </div>
                            <div class="col-lg-3" id="box_nib">
                                <label>NIB</label>
                                <input class="form-control" type="text" id="nib" name="nib">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" id="box_ctps">
                                <label>CTPS</label>
                                <input class="form-control" type="text" id="ctps" name="ctps">
                            </div>
                            <div class="col-lg-3" id="box_ctps_serie">
                                <label>Série</label>
                                <input class="form-control" type="text" id="ctps_serie" name="ctps_serie">
                            </div>
                            <div class="col-lg-3" id="box_pis">
                                <label>PIS</label>
                                <input class="form-control" type="text" id="pis" name="pis">
                            </div>
                            <div class="col-lg-3" id="box_nit">
                                <label>NIT</label>
                                <input class="form-control" type="text" id="nit" name="nit">
                            </div>
                        </div>
                    @endif
                        <div class="row">
                        <div class="col-lg-12" style="margin-top: 10px">
                                <a class="btn btn-secondary" href="/clients">Cancelar</a>
                                <button type="submit" class="btn btn-primary pull-right">Adicionar Cliente</button>
                            </div>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Contatos
                    <div class="pull-right">
                        <a href="#" type="button" class="btn btn-primary btn-sm">Adicionar</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Endereços
                    <div class="pull-right">
                        <a href="#" type="button" class="btn btn-primary btn-sm">Adicionar</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Dados bancários
                    <div class="pull-right">
                        <a href="#" type="button" class="btn btn-primary btn-sm">Adicionar</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Documentos
                    <div class="pull-right">
                        <a href="#" type="button" class="btn btn-primary btn-sm">Adicionar</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Financeiro
                    <div class="pull-right">
                        <a href="#" type="button" class="btn btn-primary btn-sm">Adicionar</a>
                    </div>
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
