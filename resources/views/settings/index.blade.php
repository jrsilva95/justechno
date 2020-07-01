@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Escritório
                    <div class="pull-right">
                        <a href="/settings/business/edit" type="button" class="btn btn-primary btn-sm">Editar Escritório</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-3">
                            Logo do escritório
                        </div>
                        <div class="col-lg-4">
                            <p>{{$business->name}}</p>
                            <p>{{$business->phone->getFormatted()}}</p>
                            <p>{{$business->address->getLine1()}}</p>
                            <p>{{$business->address->getLine2()}}</p>
                        </div>
                        <div class="col-lg-5">
                            <div id='map' style='width: 100%; height: 135px;'></div>
                            <script>
                                mapboxgl.accessToken = 'pk.eyJ1Ijoic2lnbWF0ZWNub2xvZ2lhIiwiYSI6ImNrYW4ydzJibzFjaHYyeWxibTV4OGZldm4ifQ.wTJ_zvYqdVHFhmhVdjr7XA';
                                var map = new mapboxgl.Map({
                                    container: 'map',
                                    style: 'mapbox://styles/mapbox/streets-v11',
                                    center: [{{$business->address->longitude}}, {{$business->address->latitude}}],
                                    zoom: 14
                                });
                                
                                new mapboxgl.Marker()
                                    .setLngLat([{{$business->address->longitude}}, {{$business->address->latitude}}])
                                    .addTo(map);
                                
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Funcionários</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Funções</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">Processos</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Tipos de Processo</li>
                        <li class="list-group-item">Status do Processo</li>
                        <li class="list-group-item">Fases do Processo</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
