@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cliente
                    <div class="pull-right">
                        <a href="/clients/{{$client->id}}/edit" type="button" class="btn btn-primary btn-sm">Editar</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if ($client->clientType->id == 2)
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tipo Cliente</label>
                                <p>{{$client->clientType->name}}</p>
                            </div>
                            <div class="col-lg-3">
                                <label>Orgão Público</label>
                                <p>{{$client->public_agency}}</p>
                            </div>
                            <div class="col-lg-6">
                                <label id="label_cpf_cnpj">CNPJ</label>
                                <p>{{$client->cpf_cnpj}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <label id="label_name">Nome</label>
                                <p>{{$client->name}}</p>
                            </div>
                            <div class="col-lg-5">
                                <label id="label_social_name">Nome Social</label>
                                <p>{{$client->social_name}}</p>
                            </div>
                            <div class="col-lg-2">
                                <label id="label_birth_day">Data de Abertura</label>
                                <p>{{$client->birth_day}}</p>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tipo Cliente</label>
                                <p>{{$client->clientType->name}}</p>
                            </div>
                            <div class="col-lg-3">
                                <label>Orgão Público</label>
                                <p>{{$client->public_agency}}</p>
                            </div>
                            <div class="col-lg-6">
                                <label id="label_cpf_cnpj">CPF</label>
                                <p>{{$client->cpf_cnpj}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label id="label_name">Nome</label>
                                <p>{{$client->name}}</p>
                            </div>
                            <div class="col-lg-6">
                                <label id="label_social_name">Nome Social</label>
                                <p>{{$client->social_name}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label id="label_birth_day">Data de Nascimento</label>
                                <p>{{$client->birth_day}}</p>
                            </div>
                            <div class="col-lg-3" id="box_gender">
                                <label>Gênero</label>
                                <p>{{$client->gender->name}}</p>
                            </div>
                            <div class="col-lg-3" id="box_marital_status">
                                <label>Estado Civíl</label>
                                <p>{{$client->maritalStatus->name}}</p>
                            </div>
                            <div class="col-lg-3" id="box_titulo_eleitor">
                                <label>Titulo de Eleitor</label>
                                <p>{{$client->titulo_eleitor}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" id="box_rg">
                                <label>RG</label>
                                <p>{{$client->rg}}</p>
                            </div>
                            <div class="col-lg-3" id="box_date_emission">
                                <label>Data de Emissão</label>
                                <p>{{$client->date_emission}}</p>
                            </div>
                            <div class="col-lg-3" id="box_org_emitter">
                                <label>Orgão Emissor</label>
                                <p>{{$client->org_emitter}}</p>
                            </div>
                            <div class="col-lg-3" id="box_nib">
                                <label>NIB</label>
                                <p>{{$client->nib}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" id="box_ctps">
                                <label>CTPS</label>
                                <p>{{$client->ctps}}</p>
                            </div>
                            <div class="col-lg-3" id="box_ctps_serie">
                                <label>Série</label>
                                <p>{{$client->ctps_serie}}</p>
                            </div>
                            <div class="col-lg-3" id="box_pis">
                                <label>PIS</label>
                                <p>{{$client->pis}}</p>
                            </div>
                            <div class="col-lg-3" id="box_nit">
                                <label>NIT</label>
                                <p>{{$client->nit}}</p>
                            </div>
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
                    Contatos
                    <div class="pull-right">
                        <a href="#" type="button" class="btn btn-primary btn-sm">Adicionar</a>
                    </div>
                </div>
                <div class="panel-body">
                    <p>Nenhum dado de contato cadastrado</p>
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
                    <p>Nenhum endereço cadastrado</p>
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
                    <p>Nenhum dado bancário cadastrado</p>
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
                    <p>Nenhum documento cadastrado</p>
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
                    <p>Sem registors financeiros</p>
                </div>
            </div>
        </div>
    </div>
@endsection
