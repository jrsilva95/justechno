@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Usuários</div>

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
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->cpf}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <p>Nunhum usuário foi encontrado</p>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if(count($users) > 0)
                        {{$users->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
