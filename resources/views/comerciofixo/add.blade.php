@extends('layouts.app', ['activePage' => 'ComercioFixoAdd', 'titlePage' => __(' ')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    <form method="post" action="{{ route('comerciofixo.store') }}" class="form-horizontal">
      <div class="row">
        <div class="col-md-12">

            @csrf
            <!-- Comercio Fixo - Processos Físicos e via rápida empresa redesim -->
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Comercio Fixo') }}</h4>
              </div>
              <div class="card-body">

            <div class="row">

                  <label class="col-sm-2 col-form-label">{{ __('Data') }}</label>
                <div class="col-sm-2">
                  <div class="form-group">
                      <input class="form-control" name="data" id="input-data" type="date" max='{{ date("Y-m-d") }}' required />
                  </div>
                </div>

                    <label class="col-sm-2 col-form-label">{{ __('Vistoria Processos') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="vistoria" id="input-vistoria" placeholder="{{ __('Vistoria Processos') }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Vistoria VRE') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="vistoriavre" id="input-vistoria_vre" placeholder="{{ __('Vistoria VRE') }}" />
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Viabilidade VRE') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="viabilidade" id="input-viabilidade" placeholder="{{ __('Viabilidade VRE') }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Ciencia') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="ciencia" id="input-ciencia" placeholder="{{ __('Ciencia') }}" />
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Intimacao') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="intimacao" id="input-intimacao" placeholder="{{ __('Intimacao') }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Plantao Interno') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="plantao" id="input-plantao" placeholder="{{ __('Plantao Interno') }}" />
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Atendimento Guiche') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="guiche" id="input-guiche" placeholder="{{ __('Atendimento Guiche') }}" />
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Observacao') }}</label>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <textarea class="form-control" name="observacao" id="textarea-observacao" type="text" placeholder="{{ __('Observacao') }}"></textarea>
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
