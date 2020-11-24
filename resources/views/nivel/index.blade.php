@extends('layouts.app', ['activePage' => 'nivelIndex', 'titlePage' => __('Gerenciamento Niveis de Acesso')])

@section('content')
    <br>
    <br>
    <div class ="text-center mt-3 mb-4">
        <a href="{{url('nivel/create')}}">
            <button class="btn btn-success">Novo Nivel</button>
        </a>
    </div>
    <div class="col-lg-12 col-md-20">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Niveis Cadastrados</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($niveisAcesso))
                            @foreach ($niveisAcesso as $nivel)
                            <tr>
                                <td>{{ $nivel->id }}</td>
                                <td>{{ $nivel->nome}}</td>
                                <td>
                                    <a href="{{url('nivel/'.$nivel->id.'/edit')}}">
                                        <button class="btn btn-sm btn-primary ">Editar</button>
                                    </a>
                                </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
