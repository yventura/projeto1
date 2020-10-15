@extends('layouts.app', ['activePage' => 'comerciofixoSemanal', 'titlePage' => __(' ')])

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
            <form action="{{ route('comerciofixo.semanal') }}" method="post" id="formGerar">
                {{ csrf_field() }}
                <div class="row">
                    <label class="col-sm-2 col-form-label">{{ __('Data Inicial:') }}</label>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input class="form-control" name="data" id="input-data-inicial" type="date" max="{{ date('Y-m-d') }}" />
                        </div>
                    </div>

                    <label class="col-sm-2 col-form-label">{{ __('Data Final:') }}</label>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <input class="form-control" name="data" id="input-data-final" type="date" max="{{ date('Y-m-d') }}" />
                        </div>
                    </div>

                    <button type="button" id="gerarRelatorio" class="btn btn-success">Gerar Relatorio</button>
                </div>
            </form>
        </div>
    </div>
          <div class="row">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header card-header-primary">
                          <h4 class="card-title ">Relatorio Semanal</h4>
                      </div>
                      <div class="card-body">
                          <div class="table-responsive">
                              <table class="table" id="tableRetorno">
                                  <thead class=" text-primary">
                                  <th>Vistorias Processos</th>
                                  <th>Vistoria VRE       </th>
                                  <th>Viabilidade VRE    </th>
                                  <th>Ciências           </th>
                                  <th>Intimações         </th>
                                  <th>Plantão Interno    </th>
                                  <th>Atendimento Guichê </th>
                                  </thead>
                                  <tbody>
                                  @if(!empty($comerciosFixos))
                                      @foreach( $comerciosFixos as $comercio)
                                          <tr>
                                              <td scope="row">{{$comercio->vistoria_processos}}</td>
                                              <td scope="row">{{$comercio->vistoria_vre}}      </td>
                                              <td scope="row">{{$comercio->viabilidade_vre}}   </td>
                                              <td scope="row">{{$comercio->ciencia}}           </td>
                                              <td scope="row">{{$comercio->intimacao}}         </td>
                                              <td scope="row">{{$comercio->plantao_interno}}   </td>
                                              <td scope="row">{{$comercio->atendimento_guiche}}</td>
                                          </tr>
                                      @endforeach
                                  @else
                                      <th class="semResultado" colspan="8" style="text-align: center">Selecione um Periodo para Visualizar</th>
                                  @endif
                                  </tbody>
                              </table>
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
                url:"{{ route('api.semanal') }}",
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
                error: function(){
                    alert("Erro");
                }
            })
        }
    });

    function adicionaRow(data) {
        var newRow = $('<tr class="resultado">');
        var cols = '';

        cols += '<td>' + data[0].vistoria_processos + '</td>';
        cols += '<td>' + data[0].vistoria_vre + '</td>';
        cols += '<td>' + data[0].viabilidade_vre + '</td>';
        cols += '<td>' + data[0].ciencia + '</td>';
        cols += '<td>' + data[0].intimacao + '</td>';
        cols += '<td>' + data[0].plantao_interno + '</td>';
        cols += '<td>' + data[0].atendimento_guiche + '</td>';


        newRow.append(cols);
        $(".semResultado").remove();
        $(".resultado").remove();
        $("#tableRetorno").append(newRow);
    }
</script>
@endsection
