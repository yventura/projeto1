@extends('layouts.app', ['activePage' => 'livreIndex', 'titlePage' => __(' ')])

@section('content')
    <br>
    <br>
    <div>
        <div class ="text-center mt-3 mb-4">
            <a href="{{url('feira_livre/create')}}">
                <button class="btn btn-success">Novo Relatorio</button>
            </a>
        </div>
        <div class="col-lg-12 col-md-20">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Praias</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text">
                        <tr>
                            <th>Data</th>
                            <th>Localidade</th>
                            <th>Orientação retirada de cadeiras</th>
                            <th>Orientação retirada de animais</th>
                            <th>Orientação retirada de bicicletas</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
