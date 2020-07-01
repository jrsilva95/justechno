@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Clientes
                    <div class="pull-right">
                        <a href="/clients/create" type="button" class="btn btn-primary btn-sm">Novo Cliente</a>
                    </div>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">CPF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($clients) > 0)
                                @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->email}}</td>
                                        <td>{{$client->cpf}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <p>Nunhum cliente foi encontrado</p>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if(count($clients) > 0)
                        {{$clients->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
