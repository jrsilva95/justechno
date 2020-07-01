@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Editar Escritório
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form id="form" action="/settings/business/store" method="post">
                        {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$business->id}}">
                            <div class="row">
                                <div class="col-lg-6">
                                <label>Nome do Escritório</label>
                                <input class="form-control" value="{{$business->name}}" name="name" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>Telefone do Escritório</label>
                                <input class="form-control" value="{{$business->phone->getFormatted()}}" type="text" name="phone" data-mask="(00) 00000-0000">
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label>CEP</label>
                                <input class="form-control" id="cep" value="{{$business->address->postal_code}}" type="text" name="cep">
                            </div>
                            <div class="col-lg-6">
                                <label>Rua</label>
                                <input class="form-control" value="{{$business->address->street}}" type="text" name="street">
                            </div>
                            <div class="col-lg-2">
                                <label>Número</label>
                                <input class="form-control" value="{{$business->address->number}}" type="text" name="number">
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-4">
                                <label>Estado</label>
                                <select id="select-state">
                                    @foreach($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>Cidade</label>
                                <select id="select-city">
                                    <option>Selecione um estado</option>
                                </select>
                            </div>
                            <div class="col-lg-4">
                                <label>Bairro</label>
                                <input class="form-control" value="{{$business->address->neighborhood}}" type="text" name="neighborhood">
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Latitude</label>
                                    <input class="form-control" value="{{$business->address->latitude}}" type="text" name="latitude">
                                </div>
                                <div class="col-lg-6">
                                    <label>Longitude</label>
                                    <input class="form-control" value="{{$business->address->longitude}}" type="text" name="longitude">
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div id='map' style='width: 100%; height: 150px; margin-top: 10px'></div>
                            </div>
                            
                        </div>
                            <div class="col-lg-12" style="margin-top: 10px">
                                <a class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary pull-right">Salvar</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        
        $(document).ready(function($){
            
            $('input[name="latitude"]').mask('Z99.99AAAAAA', {
                translation: {
                    'Z': {
                        pattern: /[-]/,
                        optional: true
                    },
                    'A' : {
                        pattern: /[0-9]/,
                        optional: true
                    }
                },
                onChange: updateMap
            });
            $('input[name="longitude"]').mask('Z99.99AAAAAA', {
                translation: {
                    'Z': {
                        pattern: /[-]/,
                        optional: true
                    },
                    'A' : {
                        pattern: /[0-9]/,
                        optional: true
                    }
                },
                onChange: updateMap
            });

            var SPMaskBehavior = function (val) {
              return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
            },

            spOptions = {
              onKeyPress: function(val, e, field, options) {
                  field.mask(SPMaskBehavior.apply({}, arguments), options);
                }
            };

            $('input[name="phone"]').mask(SPMaskBehavior, spOptions);

            function buscarCep(){

                var cep = $('input[name="cep"]').cleanVal();

                $.ajax({
                    url: '/address/cep/' + cep,
                    success: function(results) {
                        
                        $('input[name="street"]').val(results.street);
                        $('input[name="neighborhood"]').val(results.neighborhood);
                        $('input[name="latitude"]').val(results.latitude);
                        $('input[name="longitude"]').val(results.longitude);
                        
                        setStateAndCity(results.city.state_id.toString(), results.city.id.toString());
                        
                        updateMap();
                        
                    },
                    error: function(results) {
                        console.error(results);
                    }
                })
            }

            $('input[name="cep"]').mask('00000-000', {onComplete: buscarCep});
        
        });
        
        var xhr;
        var select_state, $select_state;
        var select_city, $select_city;
        
        $select_city = $('#select-city').selectize({
            valueField: 'id',
            labelField: 'name',
            searchField: ['name']
        });
        
        function setStateAndCity(state, city){
            select_state.setValue(state);
            drawSelectCities(state.toString(), city.toString());
        }
        
        function drawSelectCities(state, city){
            if (!state.length) return;
                select_city.disable();
                select_city.clearOptions();
                select_city.load(function(callback) {
                    xhr && xhr.abort();
                    xhr = $.ajax({
                        url: '/address/state/' + state + '/cities',
                        success: function(results) {
                            select_city.enable();
                            callback(results);
                            
                            if(city){
                                select_city.setValue(city);
                            }
                            
                        },
                        error: function() {
                            callback();
                        }
                    })
                });
        }
        
        function updateMap(){
            
            var latitude = Number($('input[name="latitude"]').val());
            var longitude = Number($('input[name="longitude"]').val());
            
            marker.setLngLat([longitude, latitude]);
            map.setCenter([longitude, latitude]);
            
        }
        
        mapboxgl.accessToken = 'pk.eyJ1Ijoic2lnbWF0ZWNub2xvZ2lhIiwiYSI6ImNrYW4ydzJibzFjaHYyeWxibTV4OGZldm4ifQ.wTJ_zvYqdVHFhmhVdjr7XA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [{{$business->address->longitude}}, {{$business->address->latitude}}],
            zoom: 14
        });

        var marker = new mapboxgl.Marker()
            .setLngLat([{{$business->address->longitude}}, {{$business->address->latitude}}])
            .addTo(map);

        $select_state = $('#select-state').selectize({
            onChange: drawSelectCities
        });
        
        select_city  = $select_city[0].selectize;
        select_state = $select_state[0].selectize;

        select_city.disable();
        
        setStateAndCity({{$business->address->city->state->id}}, {{$business->address->city->id}});
        
        $("#form").submit(function( event ) {
            
            var input = $("<input>")
                .attr("type", "hidden")
                .attr("name", "city_id").val(select_city.getValue());
            
            $('#form').append(input);
            
          //event.preventDefault();
        });

    </script>
@endsection
