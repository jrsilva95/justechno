@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Novo Processo
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="form" action="/clients" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Número Interno</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>Descrição</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-3">
                                <label>Número do Processo</label>
                                <input class="form-control" type="text" id="cpf_cnpj" name="cpf_cnpj">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label id="label_name">Pasta do Processo</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-2">
                                <label>Data do Processo</label>
                                <input class="form-control" type="text" id="social_name">
                            </div>
                            <div class="col-lg-2">
                                <label>Data da Distribuição</label>
                                <input class="form-control" type="text" id="social_name">
                            </div>
                            <div class="col-lg-2">
                                <label>Data Encerramento</label>
                                <input class="form-control" type="text" id="social_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Status</label>
                                <select id="lawsuit_status">
                                    @foreach ($lawsuitsSatuses as $lawsuitStatus)
                                        <option value="{{$lawsuitStatus->id}}">{{$lawsuitStatus->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Tipo</label>
                                <select id="lawsuit_type">
                                    @foreach ($lawsuitsTypes as $lawsuitType)
                                        <option value="{{$lawsuitType->id}}">{{$lawsuitType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label>Juiz(a) / Ministro(a)</label>
                                <select id="judges">
                                    @foreach ($judges as $judge)
                                        <option value="{{$judge->id}}">{{$judge->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Vara</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-3">
                                <label>Tipo Juizado</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>Enstância / Turma</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Períto</label>
                                <input class="form-control" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>Valor Solicitado</label>
                                <input class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="margin-top: 10px">
                                <a class="btn btn-secondary" href="/clients">Cancelar</a>
                                <button type="submit" class="btn btn-primary pull-right">Adicionar Processo</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function($){
            
            $('#lawsuit_status').selectize();
            $('#lawsuit_type').selectize();
            $('#judges').selectize();

        });
    </script>
@endsection
