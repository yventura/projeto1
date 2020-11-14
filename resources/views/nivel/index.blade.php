@extends('layouts.app', ['activePage' => 'nivelIndex', 'titlePage' => __(' ')])

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
                    <thead class="text-warning">
                        <th>Nome<th>
                        <th>Modal para editar as permissoes do nivel<th>
                    </thead>
                    <tbody>
                        <tr>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
