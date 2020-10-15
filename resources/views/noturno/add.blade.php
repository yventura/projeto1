@extends('layouts.app', ['activePage' => 'noturnoAdd', 'titlePage' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <form method="post" action="{{ route('noturno.store') }}" class="form-horizontal">
                <div class="row">
                    <div class="col-md-12">
                    @csrf
                    <!-- Fiscalização Noturna-->
                        <div class="card ">
                            <div class="card-header card-header-primary">
                                <h4 class="card-title">{{ __('Fiscalização Noturna') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label class="col-sm-1 col-form-label">{{ __('Data') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="input-data"></label><input class="form-control" name="data" id="input-data" type="date" value="{{ date('Y-m-d') }}" readonly />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            Quantidade
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            Ações
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="input-paralisacao_evento"></label><input class="form-control" name="paralisacao_evento" id="input-paralisacao_evento" />
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            Paralisação de eventos esportivos, nas praias da Astúrias, Pitangueiras e Enseada
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="input-atendimento_denuncia"></label><input class="form-control" name="atendimento_denuncia" id="input-atendimento_denuncia" />
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            Atendimento de denúncias recebidas no COPOM
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="input-comercio_ambulante"></label><input class="form-control" name="comercio_ambulante" id="input-comercio_ambulante" />
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            Trabalho de coibição, inibição e manutenção de comércio ambulante irregular nas áreas das praias e calçadão
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="input-atendimento_processos"></label><input class="form-control" name="atendimento_processos" id="input-atendimento_processos" />
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            Atendimento de despacho de processos
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center mt-3 mb-4">
                                    <button type="submit" class="btn btn-success ">{{ __('Gerar Ocorrencia') }}</button>
                                </div>
                                <!-- Fim - Fiscalização Noturna -->
                            </div>
                        </div>
                    </div>
                </div>
@endsection

