@extends('layouts.app', ['activePage' => 'equipamentosAdd', 'titlePage' => __(' ')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    <form method="post" action="{{ route('laudos.store') }}" autocomplete="off" class="form-horizontal">
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
                  <div class="form-group{{ $errors->has('data') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" id="input-data" type="date" max='{{ date("Y-m-d") }}' required="true" />
                      @if ($errors->has('data'))
                        <span id="data-error" class="error text-danger" for="input-data">{{ $errors->first('data') }}</span>
                      @endif
                    </div>
                </div>
                 
                    <label class="col-sm-2 col-form-label">{{ __('Vistoria Processos') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('vistoria') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('vistoria') ? ' is-invalid' : '' }}" name="vistoria" id="input-vistoria" type="number" placeholder="{{ __('Vistoria Processos') }}" />
                      @if ($errors->has('vistoria'))
                        <span id="vistoria-error" class="error text-danger" for="input-vistoria">{{ $errors->first('vistoria') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Vistoria VRE') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('vistoriavre') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('vistoriavre') ? ' is-invalid' : '' }}" name="vistoriavre" id="input-vistoriavre" type="number" placeholder="{{ __('Vistoria VRE') }}" />
                      @if ($errors->has('vistoriavre'))
                        <span id="vistoriavre-error" class="error text-danger" for="input-vistoriavre">{{ $errors->first('vistoriavre') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Viabilidade VRE') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('viabilidade') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('viabilidade') ? ' is-invalid' : '' }}" name="viabilidade" id="input-viabilidade" type="number" placeholder="{{ __('Viabilidade VRE') }}" />
                      @if ($errors->has('viabilidade'))
                        <span id="viabilidade-error" class="error text-danger" for="input-viabilidade">{{ $errors->first('viabilidade') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Ciencia') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('ciencia') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('ciencia') ? ' is-invalid' : '' }}" name="ciencia" id="input-ciencia" type="number" placeholder="{{ __('Ciencia') }}" />
                      @if ($errors->has('ciencia'))
                        <span id="ciencia-error" class="error text-danger" for="input-ciencia">{{ $errors->first('ciencia') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Intimacao') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('intimacao') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('intimacao') ? ' is-invalid' : '' }}" name="intimacao" id="input-intimacao" type="number" placeholder="{{ __('Intimacao') }}" />
                      @if ($errors->has('intimacao'))
                        <span id="intimacao-error" class="error text-danger" for="input-intimacao">{{ $errors->first('intimacao') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Plantao Interno') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('plantao') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('plantao') ? ' is-invalid' : '' }}" name="plantao" id="input-plantao" type="number" placeholder="{{ __('Plantao Interno') }}" />
                      @if ($errors->has('plantao'))
                        <span id="plantao-error" class="error text-danger" for="input-plantao">{{ $errors->first('plantao') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Atendimento Guiche') }}</label>
                  <div class="col-sm-2">
                    <div class="form-group{{ $errors->has('guiche') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('guiche') ? ' is-invalid' : '' }}" name="guiche" id="input-guiche" type="number" placeholder="{{ __('Atendimento Guiche') }}" />
                      @if ($errors->has('guiche'))
                        <span id="guiche-error" class="error text-danger" for="input-guiche">{{ $errors->first('guiche') }}</span>
                      @endif
                    </div>
                  </div>
                </div>      
 
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Observacao') }}</label>
                  <div class="col-lg-6">
                    <div class="form-group{{ $errors->has('observacao') ? ' has-danger' : '' }}">
                      <textarea class="form-control{{ $errors->has('observacao') ? ' is-invalid' : '' }}" name="observacao" id="textarea-observacao" type="text" placeholder="{{ __('Observacao') }}" />
                      </textarea>
                      @if ($errors->has('observacao'))
                        <span id="observacao-error" class="error text-danger" for="input-observacao">{{ $errors->first('observacao') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                
                <div class="card-footer ml-auto mr-auto">
                  <button type="submit" class="btn btn-success">{{ __('Insere Equipamento') }}</button>
                </div>
                <!-- Fim Dados -->
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection