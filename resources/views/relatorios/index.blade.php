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
                    Nome
                  </th>
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
                  <tr>
                    <td>
                        Joao Miguel da Cruz
                    </td>
                    <td>
                        02/2020
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        21
                    </td>
                    <td>
                        4
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        5
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        1
                    </td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="material-icons">visibility</i></a>
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
