@extends('layouts.app', ['activePage' => 'laudosIndex', 'titlePage' => __('Criar Laudo')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Dados do Laudo') }}</h4>
                <p class="card-category">{{ __('Dados do Laudo') }} <b>{{ str_pad($laudo->num_laudo, 2, '0', STR_PAD_LEFT) .'/'. $laudo->ano_laudo }}</b></p>
              </div>
              <div class="card-body ">
              <!-- Secretaria e departamento -->
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Secretaria') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('secretaria') ? ' has-danger' : '' }}">
                      {{ $laudo->secretaria_id }}
                    </div>
                  </div>

                  <label class="col-sm-2 col-form-label">{{ __('Departamento') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('departamento') ? ' has-danger' : '' }}">
                      {{ $laudo-> departamento_id }}
                    </div>
                  </div>
                </div>
                <!-- /Fim Secretaria e Departamento -->
                <!-- Dados do Laudo (Chamado, Tipo, Email Solicitante) -->
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email solicitante') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      {{ $laudo->email_solicitante }}
                    </div>
                  </div>
                </div>

                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Numero do Chamado') }}</label>
                  <div class="col-sm-4">
                    <div class="form-group{{ $errors->has('chamado') ? ' has-danger' : '' }}">
                      {{ $laudo->num_chamado }}
                    </div>
                  </div>
                  <label class="col-sm-2 col-form-label">{{ __('Tipo de Laudo') }}</label>
                  <div class="col-sm-3">
                    <div class="form-group{{ $errors->has('tipo_laudo') ? ' has-danger' : '' }}">
                      {{ $laudo->tipo_laudo_nome }} | {{ $laudo->tipo_laudo_sigla }}
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
                            {{ $laudo->tipo_identificacao }}
                        </div>
                    </div>
                    <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Identificação') }}</label>
                    <div class="col-sm-5">
                        <div class="form-group{{ $errors->has('identificacao') ? ' has-danger' : '' }}">
                            {{ $laudo->identificacao }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-11">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>Descrição</th>
                                    <th>Componente</th>
                                    <th>Solução</th>
                                    <th>Adicionado em</th>
                                </thead>
                                <tbody>
                                @foreach ($equipamentos as $equipamento)
                                <tr>
                                    <td>{{ $equipamento['descricao'] }}</td>
                                    <td>{{ $equipamento['componente']['tipo_equipamento'] }} {{ $equipamento['componente']['modelo'] }} {{ $equipamento['componente']['nome'] }} </td>
                                    <td>{{ $equipamento['solucao'] }}</td>
                                    <td>10/06/2020 as 17:00</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-success">{{ __('#') }}</button>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection