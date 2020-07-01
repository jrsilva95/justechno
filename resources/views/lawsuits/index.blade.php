@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Processos
                    <div class="pull-right">
                        <a href="/lawsuits/create" type="button" class="btn btn-primary btn-sm">Novo Processo</a>
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
                                <th scope="col">ID</th>
                                <th scope="col">Partes</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($lawsuits) > 0)
                                @foreach($lawsuit as $lawsuits)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{$lawsuit->name}}</td>
                                        <td>{{$lawsuit->email}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <p>Nunhum processo foi encontrado</p>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @if(count($lawsuits) > 0)
                        {{$lawsuits->links()}}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
