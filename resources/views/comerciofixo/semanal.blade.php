@extends('layouts.app', ['activePage' => 'comerciofixoSemanal', 'titlePage' => __(' ')])

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
                                            <td scope="row">{{$comerciof->Desc08($comerciof->desc_08)}}{{$comerciof->valor_cf_08}}</td>
                                            <td scope="row">{{$comerciof->Desc09($comerciof->desc_09)}}{{$comerciof->valor_cf_09}}</td>
                                        <!--
                        <td scope="row">
                             <div class="card-footer ml-auto mr-auto">
                                <button type="button" data-toggle="modal" data-target="#modal{{$comerciof->id}}" class="btn btn-primary">{{ __('Observação') }}</button>
                             </div>
                        </td>

                         Componentes Modal Adicionar Problema
                        <div class="modal fade" id="modal{{$comerciof->id}}" tabindex="-1" role="dialog" aria-labelledby="adicionarObservacaoLabel" aria-hidden="true">
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
                     Fim Componente Modal -->
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Relatorio Semanal</h4>
                                </div>
                                <div class="card-body">
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
                                        <button type="button" id="gerarRelatorio" class="btn btn-success">Filtrar</button>
                                    </div>
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
                                            <tbody>
                                            @foreach($comercio_FixoTotal as $comercio)
                                                <tr>
                                                    <td scope="row">{{$comercio->data}}</td>
                                                    <td scope="row">{{$comercio->valor_cf_01}}</td>
                                                    <td scope="row">{{$comercio->valor_cf_02}}</td>
                                                    <td scope="row">{{$comercio->valor_cf_03}}</td>
                                                    <td scope="row">{{$comercio->valor_cf_04}}</td>
                                                    <td scope="row">{{$comercio->valor_cf_05}}</td>
                                                    <td scope="row">{{$comercio->valor_cf_06}}</td>
                                                    <td scope="row">{{$comercio->valor_cf_07}}</td>
                                                    <td scope="row">Triagem - {{$comercio->valor_cf_08_1}}<br>Pesquisas - {{$comercio->valor_cf_08_2}}<br>Despacho - {{$comercio->valor_cf_08_3}}</td>
                                                    <td scope="row">Ex_Oficio - {{$comercio->valor_cf_09_1}}</td>
                                                </tr>
                                            @endforeach
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

                            cols += '<td>' + data[0].valor_cf_01 + '</td>';
                            cols += '<td>' + data[0].valor_cf_02 + '</td>';
                            cols += '<td>' + data[0].valor_cf_03 + '</td>';
                            cols += '<td>' + data[0].valor_cf_04 + '</td>';
                            cols += '<td>' + data[0].valor_cf_05 + '</td>';
                            cols += '<td>' + data[0].valor_cf_06 + '</td>';
                            cols += '<td>' + data[0].valor_cf_07 + '</td>';


                            newRow.append(cols);
                            $(".semResultado").remove();
                            $(".resultado").remove();
                            $("#tableRetorno").append(newRow);
                        }
                    </script>
@endsection
