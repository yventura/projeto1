@extends('layouts.app', ['activePage' => 'noturnoAdd', 'titlePage' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('noturno.store') }}" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">

                    @csrf
                    <!-- Comercio Fixo - Processos Físicos e via rápida empresa redesim -->
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Fiscalização Noturna') }}</h4>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Data') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-data"></label><input class="form-control" name="data" id="input-data" type="date" value="{{ date('Y-m-d') }}" readonly/>
                                        </div>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{ __('Localidade') }}</label>
                                    <div class="col-sm-2">
                                        <label for="input-localidade"></label><select class="form-control" name="localidade" id="input-localidade">
                                            <option value="1">Pitangueiras</option>
                                            <option value="2">Astúrias</option>
                                            <option value="3">Enseada</option>
                                        </select>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{ __('Orientação Ret. Cadeiras') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-cadeiras"></label><input class="form-control" name="cadeiras" id="input-cadeiras" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Orientação Ret. Animais') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-animais"></label><input class="form-control" name="animais" id="input-animais"/>
                                        </div>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{ __('Orientação Ret. Bicicletas') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-bicicletas"></label><input class="form-control" name="bicicletas" id="input-bicicletas" />
                                        </div>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{ __('Orientação Ret. Guarda Sol') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-guardasol"></label><input class="form-control" name="guardasol" id="input-guardasol" />
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-3 mb-4">
                                    <button type="submit" class="btn btn-success ">{{ __('Gerar Ocorrencia') }}</button>
                                </div>
                                <!-- Fim Dados -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection
