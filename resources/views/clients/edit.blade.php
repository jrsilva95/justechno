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
                    <form id="form" action="/clients" method="post">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-lg-3">
                                <label>Tipo Cliente</label>
                                <select name="type_client" id="type_client">
                                    @foreach ($clientTypes as $clientType)
                                        <option value="{{$clientType->id}}">{{$clientType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3">
                                <label>Orgão Público</label>
                                <select name="public_agency" id="public_agency">
                                        <option value="0">Não</option>
                                        <option value="1">Sim</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label id="label_cpf_cnpj">CPF</label>
                                <input class="form-control" type="text" id="cpf_cnpj" name="cpf_cnpj" value="{{$client->cpf_cnpj}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label id="label_name">Nome</label>
                                <input class="form-control" type="text" id="name" name="name" value="{{$client->name}}">
                            </div>
                            <div class="col-lg-6">
                                <label id="label_social_name">Nome Social</label>
                                <input class="form-control" type="text" id="social_name" name="social_name" value="{{$client->social_name}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <label id="label_birth_day">Data de Nascimento</label>
                                <input class="form-control" type="text" id="birth_day" name="birth_day" value="{{$client->birth_day}}">
                            </div>
                            <div class="col-lg-3" id="box_gender">
                                <label>Gênero</label>
                                <select name="gender" id="gender" value="{{$client->gender->id}}">
                                    @foreach ($genders as $gender)
                                        <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3" id="box_marital_status">
                                <label>Estado Civíl</label>
                                <select name="marital_status" id="marital_status" value="{{$client->maritalStatus->id}}">
                                    @foreach ($maritalStatuses as $maritalStatus)
                                        <option value="{{$maritalStatus->id}}">{{$maritalStatus->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-3" id="box_titulo_eleitor">
                                <label>Titulo de Eleitor</label>
                                <input class="form-control" type="text" id="titulo_eleitor" name="titulo_eleitor" value="{{$client->titulo_eleitor}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" id="box_rg">
                                <label>RG</label>
                                <input class="form-control" type="text" id="rg" name="rg" value="{{$client->rg}}">
                            </div>
                            <div class="col-lg-3" id="box_date_emission">
                                <label>Data de Emissão</label>
                                <input class="form-control" type="text" id="date_emission" name="date_emission" value="{{$client->date_emission}}">
                            </div>
                            <div class="col-lg-3" id="box_org_emitter">
                                <label>Orgão Emissor</label>
                                <input class="form-control" type="text" id="org_emitter" name="org_emitter" value="{{$client->org_emitter}}">
                            </div>
                            <div class="col-lg-3" id="box_nib">
                                <label>NIB</label>
                                <input class="form-control" type="text" id="nib" name="nib" value="{{$client->nib}}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3" id="box_ctps">
                                <label>CTPS</label>
                                <input class="form-control" type="text" id="ctps" name="ctps" value="{{$client->ctps}}">
                            </div>
                            <div class="col-lg-3" id="box_ctps_serie">
                                <label>Série</label>
                                <input class="form-control" type="text" id="ctps_serie" name="ctps_serie" value="{{$client->ctps_serie}}">
                            </div>
                            <div class="col-lg-3" id="box_pis">
                                <label>PIS</label>
                                <input class="form-control" type="text" id="pis" name="pis" value="{{$client->pis}}">
                            </div>
                            <div class="col-lg-3" id="box_nit">
                                <label>NIT</label>
                                <input class="form-control" type="text" id="nit" name="nit" value="{{$client->nit}}">
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-12" style="margin-top: 10px">
                                <a class="btn btn-secondary" href="/clients">Cancelar</a>
                                <button type="submit" class="btn btn-primary pull-right">Adicionar Cliente</button>
                            </div>
                            
                        </div>
                    </form>
        </div>
    </div>
    <script>
        
        $(document).ready(function($){
            
            function updateTypeClient(value){
                //alert(value);
                if(value == 1){
                    updatePersonFisical();
                } else if (value == 2){
                    updatePersonJuridic();
                } else {
                    updatePersonOther();
                }
            }
            
            function getPersonJuridcInfo(){
                
                var cnpj = $('#cpf_cnpj').cleanVal();

                $.ajax({
                    url: '/cnpj/' + cnpj,
                    success: function(results) {
                        
                        $('#name').val(results.name_fantasy);
                        $('#social_name').val(results.name);
                        $('#birth_day').val(results.opened_date);
                        
                    },
                    error: function(results) {
                        console.error(results);
                    }
                })
                
            }
        
            function updatePersonFisical(){

                $('input[name="cpf_cnpj"]').mask('000.000.000-00');

                $("#label_cpf_cnpj").text("CPF");
                $("#label_name").text("Nome");
                $("#label_social_name").text("Nome Social");
                $("#label_birth_day").text("Data de Nascimento");

                $("#box_nit").show();
                $("#box_pis").show();
                $("#box_ctps_serie").show();
                $("#box_ctps").show();
                $("#box_nib").show();
                $("#box_org_emitter").show();
                $("#box_date_emission").show();
                $("#box_rg").show();
                $("#box_titulo_eleitor").show();
                $("#box_marital_status").show();
                $("#box_gender").show();
            }

            function updatePersonJuridic(){

                $('input[name="cpf_cnpj"]').mask('00.000.000/0000-00', {
                    onComplete: getPersonJuridcInfo
                });

                $("#label_cpf_cnpj").text("CNPJ");
                $("#label_name").text("Nome Fantasia");
                $("#label_social_name").text("Razão Social");
                $("#label_birth_day").text("Data de Abertura");

                $("#box_nit").hide();
                $("#box_pis").hide();
                $("#box_ctps_serie").hide();
                $("#box_ctps").hide();
                $("#box_nib").hide();
                $("#box_org_emitter").hide();
                $("#box_date_emission").hide();
                $("#box_rg").hide();
                $("#box_titulo_eleitor").hide();
                $("#box_marital_status").hide();
                $("#box_gender").hide();
            }

            function updatePersonOther(){
                $("#label_cpf_cnpj").text("CPF ou CPNJ");
                $("#label_name").text("Nome");
                $("#label_social_name").text("Nome Social");
                $("#label_birth_day").text("Data de Nascimento");

                $("#box_nit").show();
                $("#box_pis").show();
                $("#box_ctps_serie").show();
                $("#box_ctps").show();
                $("#box_nib").show();
                $("#box_org_emitter").show();
                $("#box_date_emission").show();
                $("#box_rg").show();
                $("#box_titulo_eleitor").show();
                $("#box_marital_status").show();
                $("#box_gender").show();
            }

            var selectTypeClient = $('#type_client').selectize({
                onChange : updateTypeClient
            });
            selectTypeClient[0].selectize.setValue({{$client->clientType->id}}, false);

            var selectPublicAgency = $('#public_agency').selectize();
            selectPublicAgency[0].selectize.setValue({{$client->public_agency}})
            
            var selectGender = $('#gender').selectize();
            selectGender[0].selectize.setValue({{$client->gender->id}}, false);
            
            var selectMatiralStatus = $('#marital_status').selectize();
            selectMatiralStatus[0].selectize.setValue({{$client->maritalStatus->id}}, false);

            $('#birth_day').mask("00/00/0000", {placeholder: "__/__/____"});
            $('#date_emission').mask("00/00/0000", {placeholder: "__/__/____"});

            $('input[name="cpf_cnpj"]').mask('000.000.000-00');

        });
    </script>
@endsection
