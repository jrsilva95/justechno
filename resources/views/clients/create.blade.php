@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Cliente
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['action' => 'ClientsController@store', 'method' => 'POST']) !!}
                    <div class="row">
                        <div class="form-group col-md-6">
                            {{Form::label('client_type', 'Tipo Cliente')}}
                            {{Form::select('client_type', $clientTypes, null, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('public_agency', 'Orgão Público')}}
                            {{Form::select('public_agency', ['Não', 'Sim'], null, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('name', 'Nome')}}
                            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nome Completo'])}}
                        </div>
                        <div class="form-group col-md-6">
                            {{Form::label('social_name', 'Nome Social')}}
                            {{Form::text('social_name', '', ['class' => 'form-control', 'placeholder' => 'Nome Social'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('birth_day', 'Data de Nascimento')}}
                            {{Form::date('birth_day', '', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('gender_id', 'Gênero')}}
                            {{Form::select('gender_id', $genders, null,['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('marital_status_id', 'Estado Civíl')}}
                            {{Form::select('marital_status_id', $maritalStatuses, null, ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('cpf_cnpj', 'CPF')}}
                            {{Form::text('cpf_cnpj', '', ['class' => 'form-control', 'placeholder' => 'CPF'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('rg', 'RG')}}
                            {{Form::text('rg', '', ['class' => 'form-control', 'placeholder' => 'RG'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('date_emission', 'Data de Emissão')}}
                            {{Form::date('date_emission', '', ['class' => 'form-control'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('org_emitter', 'Orgão Emissor')}}
                            {{Form::text('org_emitter', '', ['class' => 'form-control', 'placeholder' => 'Orgão Emissor'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('titulo_eleitor', 'Título Eleitor')}}
                            {{Form::text('titulo_eleitor', '', ['class' => 'form-control', 'placeholder' => 'Título Eleitor'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('ctps', 'CTPS')}}
                            {{Form::text('ctps', '', ['class' => 'form-control', 'placeholder' => 'CTPS'])}}
                        </div>
                        <div class="form-group col-md-2">
                            {{Form::label('ctps_serie', 'Serie')}}
                            {{Form::text('ctps_serie', '', ['class' => 'form-control', 'placeholder' => 'Serie'])}}
                        </div>
                        <div class="form-group col-md-3">
                            {{Form::label('pis', 'PIS')}}
                            {{Form::text('pis', '', ['class' => 'form-control', 'placeholder' => 'PIS'])}}
                        </div>
                        <div class="form-group col-md-2">
                            {{Form::label('nit', 'NIT')}}
                            {{Form::text('nit', '', ['class' => 'form-control', 'placeholder' => 'NIT'])}}
                        </div>
                        <div class="form-group col-md-2">
                            {{Form::label('nit', 'NIB')}}
                            {{Form::text('nit', '', ['class' => 'form-control', 'placeholder' => 'NIB'])}}
                        </div>
                    </div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="btn btn-default" id="nav-home-tab" data-toggle="tab" href="#addresses" role="tab" aria-controls="nav-home" aria-selected="true">Endereços</a>
                            <a class="btn btn-default" id="nav-profile-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="nav-profile" aria-selected="false">Contatos</a>
                            <a class="btn btn-default" id="nav-contact-tab" data-toggle="tab" href="#bank-data" role="tab" aria-controls="nav-contact" aria-selected="false">Dados Bancários</a>
                            <a class="btn btn-default" id="nav-contact-tab" data-toggle="tab" href="#documents" role="tab" aria-controls="nav-contact" aria-selected="false">Documentos</a>
                            <!--
                            <a class="btn btn-default" id="nav-contact-tab" data-toggle="tab" href="#finantial" role="tab" aria-controls="nav-contact" aria-selected="false">Financeiro</a>
                            <a class="btn btn-default" id="nav-contact-tab" data-toggle="tab" href="#history" role="tab" aria-controls="nav-contact" aria-selected="false">Histórico</a>
                            -->
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade active" id="addresses" role="tabpanel" aria-labelledby="nav-home-tab">
                            <div id="addresses-form">
                                
                            </div>
                            {{Form::button('Adicionar Endereço', ['class' => 'btn btn-secondary'])}}
                        </div>
                        <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="nav-profile-tab">Contatos</div>
                        <div class="tab-pane fade" id="bank-data" role="tabpanel" aria-labelledby="nav-contact-tab">Dados Bancarios</div>
                        <div class="tab-pane fade" id="documents" role="tabpanel" aria-labelledby="nav-contact-tab">Documentos</div>
                        <!--
                        <div class="tab-pane fade" id="finantial" role="tabpanel" aria-labelledby="nav-contact-tab">Financeiro</div>
                        <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="nav-contact-tab">Histórico</div>
                        -->
                    </div>
                </div>
            </div>
                    {{Form::button('Cancelar'), ['class' => 'btn btn-secondary']}}
                    {{Form::submit('Cadastrar', ['class' => 'btn btn-primary pull-right'])}}
                    {!! Form::close() !!}
        </div>
    </div>
@endsection
