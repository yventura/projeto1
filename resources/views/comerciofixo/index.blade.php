@extends('layouts.app', ['activePage' => 'comerciofixoIndex', 'titlePage' => __(' ')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Comercio Fixo</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    Data
                  </th>
                  <th>
                    Vistorias Processos
                  </th>
                  <th>
                   Vistoria VRE
                  </th>
                  <th>
                    Viabilidade VRE
                  </th>
                  <th>
                    Ciências
                  </th>
                  <th>
                    Intimações
                  </th>
                  <th>
                    Plantão Interno
                  </th>
                  <th>
                    Atendimento Guichê
                  </th>
                  <th>
                    Observação
                  </th>
                </thead>
                <tbody>
                @foreach( $comerciofixo as $comerciof)
                    <tr>
                            <td scope="row">
                                {{$comerciof->data}}
                            </td>
                            <td scope="row">
                                {{$comerciof->vistoria_processos}}
                            </td>
                            <td scope="row">
                                {{$comerciof->vistoria_vre}}
                            </td>
                            <td scope="row">
                                {{$comerciof->viabilidade_vre}}
                            </td>
                            <td scope="row">
                                {{$comerciof->ciencia}}
                            </td>
                            <td scope="row">
                                {{$comerciof->intimacao}}
                            </td>
                            <td scope="row">
                                {{$comerciof->plantao_interno}}
                            </td>
                            <td scope="row">
                                {{$comerciof->atendimento_guiche}}
                            </td>
                            <td scope="row">
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="button" data-toggle="modal" data-target="#adicionarProblema" class="btn btn-primary">{{ __('Observação') }}</button>
                                </div>

                    <!-- Componentes Modal Adicionar Problema -->
                        <div class="modal fade" id="adicionarProblema" tabindex="-1" role="dialog" aria-labelledby="adicionarProblemaLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Observação</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                    <div class="form-group">
                                                        {{$comerciof->observacao}}
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fim Componente Modal -->
                         </td>
                        @endforeach

                  </tr>
                </tbody>
              </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
