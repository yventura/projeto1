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
                      <input class="form-control" name="data" id="input-data" type="date" value="{{ date('Y-m-d') }}" readonly/>
                  </div>
               </div>
            </div>

            <div class="row">
               <label class="col-sm-2 col-form-label">{{ __('Vistoria Processos') }}</label>
               <div class="col-sm-2">
                  <div class="form-group">
                       <input class="form-control" name="valor_cf_01" id="input-valor_cf_01" placeholder="{{ __('Vistoria Processos') }}" />
                  </div>
               </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Vistoria VRE') }}</label>
                <div class="col-sm-2">
                    <div class="form-group">
                      <input class="form-control" name="valor_cf_02" id="input-valor_cf_02" placeholder="{{ __('Vistoria VRE') }}" />
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Viabilidade VRE') }}</label>
                <div class="col-sm-2">
                   <div class="form-group">
                     <input class="form-control" name="valor_cf_03" id="input-valor_cf_03" placeholder="{{ __('Viabilidade VRE') }}" />
                   </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Ciencia') }}</label>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" name="valor_cf_04" id="input-valor_cf_04" placeholder="{{ __('Ciencia') }}" />
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Intimacao') }}</label>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" name="valor_cf_05" id="input-valor_cf_05" placeholder="{{ __('Intimacao') }}" />
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Plantao Interno') }}</label>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" name="valor_cf_06" id="input-valor_cf_06" placeholder="{{ __('Plantao Interno') }}" />
                    </div>
                </div>
            </div>

            <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Atendimento Guiche') }}</label>
                <div class="col-sm-2">
                    <div class="form-group">
                        <input class="form-control" name="valor_cf_07" id="input-valor_cf_07" placeholder="{{ __('Atendimento Guiche') }}" />
                    </div>
                </div>
            </div>



                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Triagem/ Pesquisa/ Despachos') }}</label>
                    <div class="form-group">
                        <input class="form-control" name="valor_cf_08" id="input-valor_cf_08" placeholder="{{ __('Triagem/Pesquisa/Despachos') }}" />
                    </div>
                    <div class="col-sm-2">
                       <div class="form-group">
                           <select class="form-control" name="desc_08" id="desc_08" required>
                               <option value="">Selecione</option>
                               <option value="1">Despachos</option>
                               <option value="2">Pesquisas</option>
                               <option value="3">Infração</option>
                           </select>
                       </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Procedimento Administrativo') }}</label>
                    <div class="form-group">
                      <input class="form-control" name="valor_cf_09" id="input-valor_cf_09" placeholder="{{ __('Atendimento Guiche') }}" />
                    </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <select class="form-control" name="desc_09" id="desc_09" required>
                        <option value="">Selecione</option>
                        <option value="1">Ex - Oficio</option>
                      </select>
                    </div>
                  </div>
                </div>
    <!--
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Observacao') }}</label>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <textarea class="form-control" name="observacao" id="textarea-observacao" type="text" placeholder="{{ __('Observacao') }}"></textarea>
                    </div>
                  </div>
                </div>
    -->

                <div class="text-center mt-3 mb-4">
                  <button type="submit" class="btn btn-success ">{{ __('Gerar Ocorrencia') }}</button>
                </div>
                <!-- Fim Dados -->
        </div>
      </div>
    </div>
  </div>
@endsection
