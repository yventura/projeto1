@extends('layouts.app', ['activePage' => 'equipamentosIndex', 'titlePage' => __('Listagem dos Laudos')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Laudos</h4>
            <p class="card-category"> Listagem contendo todos os laudos criados</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Nº Laudo
                  </th>
                  <th>
                    Nº Chamado
                  </th>
                  <th>
                   Tipo de Laudo
                  </th>
                  <th>
                    Situação
                  </th>
                  <th>
                    Ações
                  </th>
                </thead>
                <tbody>
                  <tr>
                  <td>
                        2
                    </td>
                    <td>
                        02/2020
                    </td>
                    <td>
                        56002
                    </td>
                    <td>
                        Perda Total
                    </td>
                    <td>
                        Aguardando
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                    </td>
                  </tr>
                  <tr>
                  <td>
                        3
                    </td>
                    <td>
                        03/2020
                    </td>
                    <td>
                        56003
                    </td>
                    <td>
                        Perda Total
                    </td>
                    <td>
                        Teste
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection