@extends('layouts.app', ['activePage' => 'comerciofixoIndex', 'titlePage' => __(' ')])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Comercio Fixo</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Data</th>
                                        <th>Vistorias Processos</th>
                                        <th>Vistoria VRE</th>
                                        <th>Viabilidade VRE</th>
                                        <th>Ciências</th>
                                        <th>Intimações</th>
                                        <th>Plantão Interno</th>
                                        <th>Atendimento Guichê</th>
                                        <th>Triagem/ Pesquisas/ Despacho</th>
                                        <th>Procedimento Administrativo</th>
                                    </thead>
                                    <tbody>
                                        @if (!empty($comerciofixo))
                                            @foreach( $comerciofixo as $comerciof)
                                                <tr>
                                                    <td scope="row">{{date('d/m/Y', strtotime($comerciof->data))}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_01}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_02}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_03}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_04}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_05}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_06}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_07}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_08}}</td>
                                                    <td scope="row">{{$comerciof->valor_cf_09}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                {{ $comerciofixo->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Relatorio Dinâmico</h4>
                        </div>
                        <div class="card-body">
                            @if($errors->any())
                                <h4 style="color: red;">Erro: {{$errors->first()}}</h4>
                            @endif
                            <form action="{{ route('comerciofixo.createPDF') }}" method="POST">
                            @csrf
                                <div class="row">
                                    <label class="col-sm-2 col-form-label">{{ __('Data Inicial:') }}</label>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <input class="form-control" name="data1" id="input-data-inicial" type="date" max="{{ date('Y-m-d') }}" required />
                                        </div>
                                    </div>

                                    <label class="col-sm-2 col-form-label">{{ __('Data Final:') }}</label>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <input class="form-control" name="data2" id="input-data-final" type="date" max="{{ date('Y-m-d') }}" required/>
                                        </div>
                                    </div>
                                    <button type="button" id="gerarRelatorio" class="btn btn-success">Filtrar</button>

                                    <button type="submit" id="imprimirRelatorio" class="btn btn-warning">Imprimir</button>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>Data</th>
                                        <th>Vistorias Processos</th>
                                        <th>Vistoria VRE</th>
                                        <th>Viabilidade VRE</th>
                                        <th>Ciências</th>
                                        <th>Intimações</th>
                                        <th>Plantão Interno</th>
                                        <th>Atendimento Guichê</th>
                                        <th>Triagem/ Pesquisas/ Despacho</th>
                                        <th>Procedimento Administrativo</th>
                                    </thead>
                                    <tbody id="tableRetorno">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script type="text/javascript">
      $("#gerarRelatorio").click(function() {
          let data_inicial = document.getElementById('input-data-inicial').value;
          let data_final = document.getElementById('input-data-final').value;
          let error = 0;

          if (data_inicial == "" || data_final == "") {
              alert("Data inicial ou final não selecionada!");
              error++;
          }

          if (data_final < data_inicial) {
              alert("Data Final deve ser maior que a data inicial");
              error++;
          }

          if (!error) {
              $.ajax({
                  type:'POST',
                  header: {
                      'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                  },
                  url:"{{ route('api.fixo') }}",
                  dataType: 'JSON',
                  data: {
                      _token: "{{ csrf_token() }}",
                      inicio: data_inicial,
                      fim: data_final
                  },
                  success: function(data) {
                      if (data.length > 0) {
                          console.log(data);
                          adicionaRow(data);
                      }
                  },
                  error: function(data) {
                      console.log(data);
                      //alert("Erro");
                  }
              })
          }
      });

      function adicionaRow(data) {
          $(".semResultado").remove();
          $(".resultado").remove();

          for (let k in data) {
              var newRow = $('<tr class="resultado">');
              var cols = '';

              cols += '<td>' + data[k].data + '</td>';
              cols += '<td>' + data[k].valor_cf_01 + '</td>';
              cols += '<td>' + data[k].valor_cf_02 + '</td>';
              cols += '<td>' + data[k].valor_cf_03 + '</td>';
              cols += '<td>' + data[k].valor_cf_04 + '</td>';
              cols += '<td>' + data[k].valor_cf_05 + '</td>';
              cols += '<td>' + data[k].valor_cf_06 + '</td>';
              cols += '<td>' + data[k].valor_cf_07 + '</td>';
              cols += '<td>' + data[k].valor_cf_08 + '</td>';
              cols += '<td>' + data[k].valor_cf_09 + '</td>';


              newRow.append(cols);
              $("#tableRetorno").append(newRow);
          }
      }
  </script>
@endsection
