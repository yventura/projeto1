@extends('layouts.app', ['activePage' => 'laudoIndex', 'titlePage' => __('Listagem dos Laudos')])

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
                  @foreach ($laudos as $key => $laudo)
                  <tr>
                    <td>
                        {{ $laudo->id }}
                    </td>
                    <td>
                        {{ $laudo->num_laudo }}/{{ $laudo->ano_laudo }}
                    </td>
                    <td>
                        {{ $laudo->num_chamado }}
                    </td>
                    <td>
                        {{ $laudo->tipo_laudo_nome }} | {{ $laudo->tipo_laudo_sigla}}
                    </td>
                    <td>
                        {{ $laudo->situacao_id }}
                    </td> 
                    <td>
                        <a href="{{ route('laudos.show', ['laudo' => $laudo->id]) }}" class="btn btn-sm btn-primary"><i class="material-icons">visibility</i></a>
                        <a href="{{ route('laudos.show', ['laudo' => $laudo->id]) }}" class="btn btn-sm btn-primary"><i class="material-icons">edit</i></a>
                    </td>
                  </tr>
                  @endforeach
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