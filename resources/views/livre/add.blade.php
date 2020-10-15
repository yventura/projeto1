@extends('layouts.app', ['activePage' => 'livreAdd', 'titlePage' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('livre.store') }}" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">

                    @csrf
                    <!-- Comercio Fixo - Processos Físicos e via rápida empresa redesim -->
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Feira Livre') }}</h4>
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
                                    <label class="col-sm-2 col-form-label">{{ __('Orientação Ret. Camping') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-camping"></label><input class="form-control" name="camping" id="input-camping" />
                                        </div>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{__('Orientação Churrasco')}}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-churrasco"></label><input class="form-control" name="churrasco" id="input-churrasco" />
                                        </div>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{ __('Licenças Vistoriadas') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-vistoriadas"></label><input class="form-control" name="vistoriadas" id="input-vistoriadas" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Ambulante Irregular') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-irregulares"></label><input class="form-control" name="irregulares" id="input-irregulares" />
                                        </div>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{ __('Orientação Covid-19') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-covid"></label><input class="form-control" name="covid" id="input-covid" />
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
