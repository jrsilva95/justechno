@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Funcionários
                    <div class="pull-right">
                        <a href="/employees/create" type="button" class="btn btn-primary btn-sm">Novo Funcionário</a>
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
                            @if(count($employees) > 0)
                                @foreach($employees as $employee)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$employee->name}}</td>
                                        <td>{{$employee->email}}</td>
                                        <td>{{$employee->cpf}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <p>Nunhum funcionário foi encontrado</p>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if(count($employees) > 0)
                        {{$employees->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
