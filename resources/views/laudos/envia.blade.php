@extends('layouts.app', ['activePage' => 'laudos/envia', 'titlePage' => __('Listagem dos Laudos')])

@section('content')
  <div class="content">
    <div class="container-fluid">
    <form method="post" action="{{ route('laudos.store') }}" autocomplete="off" class="form-horizontal">
      <div class="row">
        <div class="col-md-12">
          
            @csrf

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Dados do Laudo') }}</h4>
                <p class="card-category">{{ __('Dados para criação do laudo de um equipamento') }}</p>
              </div>
              <div class="card-body ">
              <!-- Secretaria e departamento -->
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Secretaria') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('secretaria') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('secretaria') ? ' is-invalid' : '' }}" name="secretaria" id="input-secretaria" required="true" aria-required="true">
                        <option value="1">Secretaria de Administração</option>
                        <option value="2">Secretaria de Saúde</option>
                        <option value="3">Secretaria de Finanças</option>
                      <select>
                      @if ($errors->has('secretaria'))
                        <span id="name-error" class="error text-danger" for="input-secretaria">{{ $errors->first('secretaria') }}</span>
                      @endif
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Departamento') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('departamento') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('departamento') ? ' is-invalid' : '' }}" name="departamento" id="input-departamento" required="true" aria-required="true">
                        <option value="1">Tecnologia da Informação</option>
                        <option value="2">Recursos Humanos</option>
                        <option value="3">Garagem</option>
                      <select>
                      @if ($errors->has('departamento'))
                        <span id="name-error" class="error text-danger" for="input-departamento">{{ $errors->first('departamento') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /Fim Secretaria e Departamento -->
                <!-- Dados do Laudo (Chamado, Tipo, Email Solicitante) -->
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email solicitante') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Numero do Chamado') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('chamado') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('chamado') ? ' is-invalid' : '' }}" name="chamado" id="input-chamado" type="chamado" placeholder="{{ __('Nº Chamado') }}" value="" required="true" />
                      @if ($errors->has('chamado'))
                        <span id="chamado-error" class="error text-danger" for="input-chamado">{{ $errors->first('chamado') }}</span>
                      @endif
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Tipo de Laudo') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('tipo_laudo') ? ' has-danger' : '' }}">
                      <select class="form-control{{ $errors->has('tipo_laudo') ? ' is-invalid' : '' }}" name="tipo_laudo" id="input-tipo_laudo" required="true" aria-required="true">
                        <option value="1">Tecnologia da Informação</option>
                        <option value="2">Recursos Humanos</option>
                        <option value="3">Garagem</option>
                      <select>
                      @if ($errors->has('tipo_laudo'))
                        <span id="name-error" class="error text-danger" for="input-tipo_laudo">{{ $errors->first('tipo_laudo') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <!-- /Fim Dados do Laudo -->
                
              </div>
            </div>
        </div>
      </div>

      <!-- Equipamentos -->
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Equipamentos') }}</h4>
                <p class="card-category">{{ __('Equipamentos com defeitos e a respectiva solução') }}</p>
              </div>
              <div class="card-body ">
                <div class="row">
                    <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Tipo de Identificação') }}</label>
                    <div class="col-sm-2">
                        <div class="form-group{{ $errors->has('tipo_identificacao') ? ' has-danger' : '' }}">
                        <select class="form-control{{ $errors->has('tipo_identificacao') ? ' is-invalid' : '' }}" name="tipo_identificacao" id="input-tipo_identificacao" required="true" aria-required="true">
                            <option value="NS">Numero de Serie</option>
                            <option value="PAT">Patrimônio</option>
                            <option value="NTI">NTI</option>
                        <select>
                        @if ($errors->has('tipo_identificacao'))
                            <span id="name-error" class="error text-danger" for="input-tipo_identificacao">{{ $errors->first('tipo_identificacao') }}</span>
                        @endif
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Identificação') }}</label>
                    <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('identificacao') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('identificacao') ? ' is-invalid' : '' }}" name="identificacao" id="input-identificacao" type="text" placeholder="{{ __('Identificacao') }}" value="" required />
                        @if ($errors->has('identificacao'))
                            <span id="name-error" class="error text-danger" for="input-identificacao">{{ $errors->first('identificacao') }}</span>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="button" class="btn btn-primary">{{ __('Adicionar Problema') }}</button>
                </div>


                <div class="row">
                    <div class="col-sm-11">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>Descrição</th>
                                    <th>Defeito</th>
                                    <th>Solução</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>Placa mãe intermitente</td>
                                    <td>Placa mãe b450 gaming</td>
                                    <td>Substituição por uma nova</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-danger" onClick="confirm('Tem certeza que deseja deletar esse problema?')"><i class="material-icons">delete</i></a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('Envia Laudo') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection