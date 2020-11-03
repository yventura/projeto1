@extends('layouts.app', ['activePage' => 'noturnoIndex', 'titlePage' => __(' ')])

@section('content')

    <div>
        <div class ="text-center mt-3 mb-4">
            <a href="{{url('noturno/create')}}">
                <button class="btn btn-success">Novo Relatorio</button>
            </a>
        </div>
        <div class="col-lg-12 col-md-20">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Relatorio - Diario - Fiscalização Noturna</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text">
                        <tr>
                            <th>Data</th>
                            <th>Paralisação de eventos esportivos</th>
                            <th>Denuncias recebidas no COPOM</th>
                            <th>Despacho de processos</th>
                            <th>Trabalho de coibição, inibição e<br> manutenção de comercio ambulante irregular</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($noturno as $noturna)
                            <tr>
                                <td>{{date('d/m/Y', strtotime($noturna->data))}}</td>
                                <td>{{$noturna->paralisacao_evento}}</td>
                                <td>{{$noturna->atendimento_denuncia}}</td>
                                <td>{{$noturna->atendimento_processos}}</td>
                                <td>{{$noturna->comercio_ambulante}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Relatorio - Semanal</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text">
                        <tr>
                            <th>Data</th>
                            <th>Paralisação de eventos esportivos</th>
                            <th>Denuncias recebidas no COPOM</th>
                            <th>Despacho de processos</th>
                            <th>Trabalho de coibição, inibição e<br> manutenção de comercio ambulante irregular</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($noturnoTotal as $noturna)
                            <tr>
                                <td>{{$noturna->data}}</td>
                                <td>{{$noturna->paralisacao_evento}}</td>
                                <td>{{$noturna->atendimento_denuncia}}</td>
                                <td>{{$noturna->atendimento_processos}}</td>
                                <td>{{$noturna->comercio_ambulante}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Relatorio - Semanal</h4>
                </div>
                <div class="card-body table-responsive">
                    <div class="card-body">
                        <form action="{{route('noturno.index')}}" method="post" id="formGerar">
                            {{ csrf_field() }}
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Data Inicial:') }}</label>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                       <input class="form-control" name="data-ini" id="input-data-ini" type="date" max="{{ date('Y-m-d') }}" />
                                    </div>
                                </div>

                                <label class="col-sm-2 col-form-label">{{ __('Data Final:') }}</label>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                       <input class="form-control" name="data-fin" id="input-data-fin" type="date" max="{{ date('Y-m-d') }}" />
                                    </div>
                                </div>
                                <button type="button" id="geraRelatorio" class="btn btn-success">Gerar Relatorio</button>
                            </div>
                        </form>
                    </div>
                    <table class="table table-hover">
                        <thead class="text">
                        <tr>
                            <th>Paralisação de eventos esportivos</th>
                            <th>Denuncias recebidas no COPOM</th>
                            <th>Despacho de processos</th>
                            <th>Trabalho de coibição, inibição e<br> manutenção de comercio ambulante irregular</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($noturnos))
                        @foreach($noturnos as $noturna)
                            <tr>
                                <td>{{$noturna->paralisacao_evento}}</td>
                                <td>{{$noturna->atendimento_denuncia}}</td>
                                <td>{{$noturna->atendimento_processos}}</td>
                                <td>{{$noturna->comercio_ambulante}}</td>
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


    <script type="text/javascript">
        $("#geraRelatorio").click(function() {
            let data_ini = document.getElementById('input-data-ini').value;
            let data_fin = document.getElementById('input-data-fin').value;
            let error = 0;

            if (data_ini == "" || data_fin == "") {
                alert("Data inicial ou final não selecionada!");
                error++;
            }

            if (data_fin < data_ini) {
                alert("Data Final deve ser maior que a data inicial");
                error++;
            }

            if (!error) {
                $.ajax({
                    type:'POST',
                    header: {
                        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
                    },
                    url:"{{ route('api.index') }}",
                    dataType: 'JSON',
                    data: {
                        _token: "{{ csrf_token() }}",
                        inicio: data_ini,
                        fim: data_fin
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
                });
            }
        });

        function adicionaRow(data) {
            var newRow = $('<tr class="resultado">');
            var cols = '';

            cols += '<td>' + data[0].paralisacao_evento + '</td>';
            cols += '<td>' + data[0].atendimento_denuncia + '</td>';
            cols += '<td>' + data[0].atendimento_processos + '</td>';
            cols += '<td>' + data[0].comercio_ambulante + '</td>';

            newRow.append(cols);
            $(".semResultado").remove();
            $(".resultado").remove();
            $("#tableRetorno").append(newRow);
        }
    </script>
@endsection

