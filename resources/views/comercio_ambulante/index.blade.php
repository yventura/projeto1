@extends('layouts.app', ['activePage' => 'comercio_ambulante_Index', 'titlePage' => __(' ')])

@section('content')
    <br>
    <br>
<div>
    <div class ="text-center mt-3 mb-4">
        <a href="{{url('comercio_ambulante/create')}}">
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
                    <th>Ort. Ret. de cadeiras<br> e Guarda-Sóis</th>
                    <th>Ort. Ret. <br>de Animais</th>
                    <th>Ort. Ret. tendas, <br>camping, churrasco</th>
                    <th>Ort. Som<br> Abusivo</th>
                    <th>Ort. Paralisação<br> Esporte</th>
                    <th>Ort. Ambulante<br> Irregular - Praias e VC</th>
                    <th>Vist/Cient/Apreensão<br> - Praias</th>
                    <th>Vist/Cient/Apreensão<br> - VC</th>
                    <th>Denuncias</th>
                </tr>
                    </thead>
                    <tbody>
                    @foreach($comercio_ambulante as $comercio)
                        <tr>
                            <td scope="row">{{date('d/m/Y', strtotime($comercio->data))}}</td>
                            <td scope="row">{{$comercio->valor_ca_01}}</td>
                            <td scope="row">{{$comercio->valor_ca_02}}</td>
                            <td scope="row">{{$comercio->Desc03($comercio->desc_03)}}  {{$comercio->valor_ca_03}} </td>
                            <td scope="row">{{$comercio->valor_ca_04}}</td>
                            <td scope="row">{{$comercio->valor_ca_05}}</td>
                            <td scope="row">{{$comercio->Desc06($comercio->desc_06)}}  {{$comercio->valor_ca_06}}</td>
                            <td scope="row">{{$comercio->Desc07($comercio->desc_07)}}  {{$comercio->valor_ca_07}}</td>
                            <td scope="row">{{$comercio->Desc08($comercio->desc_08)}}  {{$comercio->valor_ca_08}}</td>
                            <td scope="row">{{$comercio->valor_ca_09}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Relatorio Semanal</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Data Inicial:') }}</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="input-data-inicial"></label><input class="form-control" name="data" id="input-data-inicial" type="date" max="{{ date('Y-m-d') }}" />
                            </div>
                        </div>

                        <label class="col-sm-2 col-form-label">{{ __('Data Final:') }}</label>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label for="input-data-final"></label><input class="form-control" name="data" id="input-data-final" type="date" max="{{ date('Y-m-d') }}" />
                            </div>
                        </div>
                        <button type="button" id="gerarRelatorio" class="btn btn-success">Filtrar</button>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text">
                            <tr>
                                <th>Data</th>
                                <th>Orientação Retirada de cadeiras e Guarda-Sóis</th>
                                <th>Orientação Retirada de Animais</th>
                                <th>Orientação Retirada tendas, camping, churrasco</th>
                                <th>Orientação Som Abusivo</th>
                                <th>Orientação Paralisação Esporte</th>
                                <th>Orientação Ambulante Irregular - Praias e VC</th>
                                <th>Vistoria/Cientificação/Apreensão - Praias</th>
                                <th>Vistoria/Cientificação/Apreensão - VC</th>
                                <th>Denuncias</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($comercio_ambulanteTotal as $comercio )
                                <tr>
                                        <td scope="row">{{$comercio->data}}</td>
                                        <td scope="row">{{$comercio->valor_ca_01}}</td>
                                        <td scope="row">{{$comercio->valor_ca_02}}</td>
                                        <td scope="row">Tendas - {{$comercio->valor_ca_03_1}}<br>Camping - {{$comercio->valor_ca_03_2}}<br>Churrasco - {{$comercio->valor_ca_03_3}}</td>
                                        <td scope="row">{{$comercio->valor_ca_04}}</td>
                                        <td scope="row">{{$comercio->valor_ca_05}}</td>
                                        <td scope="row">Praias - {{$comercio->valor_ca_06_1}}<br>VC - {{$comercio->valor_ca_06_2}}</td>
                                        <td scope="row">Vistoria - {{$comercio->valor_ca_07_1}}<br>Cientificação - {{$comercio->valor_ca_07_2}}<br>Apreensão - {{$comercio->valor_ca_07_3}}</td>
                                        <td scope="row">Vistoria - {{$comercio->valor_ca_08_1}}<br>Cientificação - {{$comercio->valor_ca_08_2}}<br>Apreensão - {{$comercio->valor_ca_08_3}}</td>
                                        <td scope="row">{{$comercio->valor_ca_09}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
