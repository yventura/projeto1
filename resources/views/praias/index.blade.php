@extends('layouts.app', ['activePage' => 'praiasIndex', 'titlePage' => __(' ')])

@section('content')
    <br>
    <br>
<div>
    <div class ="text-center mt-3 mb-4">
        <a href="{{url('praias/create')}}">
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
                    <th>Orientação Guarda-Sol</th>
                    <th>Orientação desmonte camping</th>
                    <th>Orientação sobre churrasco</th>
                    <th>Licenças vistoriadas</th>
                    <th>Ambulantes irregulares</th>
                    <th>Orientação Covid-19</th>
                </tr>
                    </thead>
                    <tbody>
                    @foreach($praias as $praia)
                <tr>
                    <th>{{date('d/m/Y', strtotime($praia->data))}}</th>
                    <th>{{$praia->Localidade($praia->localidade)}}</th>
                    <th>{{$praia->cadeiras}}</th>
                    <th>{{$praia->animais}}</th>
                    <th>{{$praia->bicicletas}}</th>
                    <th>{{$praia->guardasol}}</th>
                    <th>{{$praia->camping}}</th>
                    <th>{{$praia->churrasco}}</th>
                    <th>{{$praia->vistoriadas}}</th>
                    <th>{{$praia->irregulares}}</th>
                    <th>{{$praia->covid}}</th>
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
                                <th>Localidade</th>
                                <th>Orientação retirada de cadeiras</th>
                                <th>Orientação retirada de animais</th>
                                <th>Orientação retirada de bicicletas</th>
                                <th>Orientação Guarda-Sol</th>
                                <th>Orientação desmonte camping</th>
                                <th>Orientação sobre churrasco</th>
                                <th>Licenças vistoriadas</th>
                                <th>Ambulantes irregulares</th>
                                <th>Orientação Covid-19</th>
                            </tr>
                            </thead>
                            <tbody>

                            @if(!empty($praiasTotal))
                                @foreach($praiasTotal as $praiax)
                                    <tr>
                                        <th>{{$praiax->data}}</th>
                                        @foreach($praias as $praia)
                                            <th>{{$praia->Localidade($praia->localidade)}}</th>
                                        @endforeach
                                        <th>{{$praiax->cadeiras}}</th>
                                        <th>{{$praiax->animais}}</th>
                                        <th>{{$praiax->bicicletas}}</th>
                                        <th>{{$praiax->guardasol}}</th>
                                        <th>{{$praiax->camping}}</th>
                                        <th>{{$praiax->churrasco}}</th>
                                        <th>{{$praiax->vistoriadas}}</th>
                                        <th>{{$praiax->irregulares}}</th>
                                        <th>{{$praiax->covid}}</th>
                                    </tr>
                                @endforeach
                            @else
                                <th class="semResultado" colspan="8" style="text-align: center">Selecione um Periodo para Visualizar</th>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
