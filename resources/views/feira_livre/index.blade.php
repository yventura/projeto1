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
                    <h4 class="card-title">Feira Livre</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text">
                        <tr>
                            <th>Data</th>
                            <th>Localidade</th>
                            <th>Orientação Covid</th>
                            <th>Orientação Ambulantes Irregulares</th>
                            <th>Orientação Veículos (consumidor)</th>
                            <th>Ret. de Veículos em Local Irregular (feirante)</th>
                            <th>Processos</th>
                            <th>Vistorias, Ciências, Plantão</th>
                            <th>Apoio Ditran</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($feira_livre as $feira)
                                <tr>
                                    <td>{{date('d/m/Y', strtotime($feira->data))}}</td>
                                    <td>{{$feira->Desc01($feira->desc_01)}}</td>
                                    <td>{{$feira->valor_fl_02}}</td>
                                    <td>{{$feira->valor_fl_03}}</td>
                                    <td>{{$feira->valor_fl_04}}</td>
                                    <td>{{$feira->valor_fl_05}}</td>
                                    <td>{{$feira->valor_fl_06}}</td>
                                    <td>{{$feira->Desc06($feira->desc_06)}}{{$feira->desc_06}}</td>
                                    <td>{{$feira->valor_fl_07}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text">
                        <tr>
                            <th>Data</th>
                            <th>Localidade</th>
                            <th>Orientação Covid</th>
                            <th>Orientação Ambulantes Irregulares</th>
                            <th>Orientação Veículos (consumidor)</th>
                            <th>Ret. de Veículos em Local Irregular (feirante)</th>
                            <th>Processos</th>
                            <th>Vistorias, Ciências, Plantão</th>
                            <th>Apoio Ditran</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($feira_livreTotal as $feira)
                            <tr>
                                <td>{{$feira->data}}</td>
                                <td>{{$feira->valor_fl_01}}</td>
                                <td>{{$feira->valor_fl_02}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
