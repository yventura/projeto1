@extends('layouts.app', ['activePage' => 'laudoEdit', 'titlePage' => __('Criar Laudo')])

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
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $laudo->email_solicitante) }}" />
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
                      <input class="form-control{{ $errors->has('chamado') ? ' is-invalid' : '' }}" name="chamado" id="input-chamado" type="chamado" placeholder="{{ __('Nº Chamado') }}" value="{{ old('num_chamado', $laudo->num_chamado) }}" required="true" />
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
                            <option value="PAT" selected>Patrimônio</option>
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
                        <input class="form-control{{ $errors->has('identificacao') ? ' is-invalid' : '' }}" name="identificacao" id="input-identificacao" type="text" placeholder="{{ __('Identificacao') }}" value="{{ old('identificacao', $laudo->identificacao) }}" required />
                        @if ($errors->has('identificacao'))
                            <span id="name-error" class="error text-danger" for="input-identificacao">{{ $errors->first('identificacao') }}</span>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer ml-auto mr-auto">
                    <button type="button" data-toggle="modal" data-target="#adicionarProblema" class="btn btn-primary">{{ __('Adicionar Problema') }}</button>
                </div>


                <div class="row">
                    <div class="col-sm-11">
                        <div class="table-responsive">
                            <table class="table" id="problemasTable">
                                <thead class="text-primary">
                                    <th>Descrição</th>
                                    <th>Componente</th>
                                    <th>Solução</th>
                                    <th>Ações</th>
                                </thead>
                                <tbody id="hardwares">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              </div>
              <div style="display: none;">
                <textarea name="problemas" id="input-problemas" id="input-problemas"></textarea>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" onClick="adicionarInput()" class="btn btn-success">{{ __('Criar Laudo') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Componentes Modal Adicionar Problema -->
  <div class="modal fade" id="adicionarProblema" tabindex="-1" role="dialog" aria-labelledby="adicionarProblemaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Adicionar Problema</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <label class="col-sm-12 col-form-label">{{ __('Componente') }} <small>Placa-mae, Memoria Ram, Fonte ETC.</small></label>
              <div class="col-sm-12">
                <div class="form-group{{ $errors->has('componente') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('componente') ? ' is-invalid' : '' }}" name="componente" id="input-componente" type="text" placeholder="{{ __('Placa-mae B450') }}" value="" required />
                @if ($errors->has('componente'))
                  <span id="name-error" class="error text-danger" for="input-componente">{{ $errors->first('componente') }}</span>
                @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label class="col-sm-12 col-form-label">{{ __('Descrição') }} <small>Descrição do Defeito</small></label>
              <div class="col-sm-12">
                <div class="form-group{{ $errors->has('descricao') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('descricao') ? ' is-invalid' : '' }}" name="descricao" id="input-descricao" type="text" placeholder="{{ __('Intermitente') }}" value="" required />
                @if ($errors->has('descricao'))
                  <span id="name-error" class="error text-danger" for="input-descricao">{{ $errors->first('descricao') }}</span>
                @endif
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <label class="col-sm-12 col-form-label">{{ __('Solução') }} <small>Resolução do problema</small></label>
              <div class="col-sm-12">
                <div class="form-group{{ $errors->has('solucao') ? ' has-danger' : '' }}">
                <input class="form-control{{ $errors->has('solucao') ? ' is-invalid' : '' }}" name="solucao" id="input-solucao" type="text" placeholder="{{ __('Troca do componente') }}" value="" required />
                @if ($errors->has('solucao'))
                  <span id="name-error" class="error text-danger" for="input-solucao">{{ $errors->first('solucao') }}</span>
                @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="button" onClick="adicionarProblema()" class="btn btn-primary">Adicionar Problema</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim Componente Modal -->

  <script type="text/javascript">
    //Sobe variaveis "globais"
    var problemas = [];
    var excluir = [];
    var quantidade_linhas = 0;
    var linhas_excluidas = 0;

    //Cria funcões "globais" da pagina
    lcspmg = {
      showNotification: function(from, align) {
        //types ['', 'info', 'danger', 'success', 'warning', 'rose', 'primary'];

        $.notify({
          icon: "add_alert",
          message: "teste"

        }, {
          type: 'danger',
          timer: 4000,
          placement: {
            from: from,
            align: align
          }
        });
      },
    }
  </script>
  <script type="text/javascript">
    function adicionarProblema() {
      var errors = 0;
      //Puxa os dados
      componente = document.getElementById('input-componente').value;
      descricao = document.getElementById('input-descricao').value;
      solucao = document.getElementById('input-solucao').value;

      if (componente.trim() == "" || descricao.trim() == "" || solucao.trim() == "") {
        errors++;
        alert('ets');
      }

      if (!errors) {
        problemas[quantidade_linhas] = [componente, descricao, solucao];
        
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td>'+ descricao +'</td>';
        cols += '<td>'+ componente +'</td>';
        cols += '<td>'+ solucao +'</td>';
        cols += '<td><a href="#" onClick="removerProblema(this, '+ quantidade_linhas +')" class="btn btn-sm btn-danger"><i class="material-icons">delete</i></a></td>';
        
        newRow.append(cols);
        $("#problemasTable").append(newRow);
        
        quantidade_linhas++;

        $('#adicionarProblema').modal('hide');
      }
    }

    function removerProblema(item, id) {
      var pergunta = false;

      pergunta = confirm('Tem certeza que deseja deletar esse problema?' + id);

      if (pergunta) {
        var tr = $(item).closest('tr');

        tr.fadeOut(400, function() {
          tr.remove();  
        });

        excluir[linhas_excluidas] = id;
        linhas_excluidas++;
      }
    }

    function adicionarInput() {
      $('#input-problemas').val(JSON.stringify(problemas));
    }
  </script>
@endsection