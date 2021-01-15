@extends('layouts.app', ['activePage' => 'livreIndex', 'titlePage' => __(' ')])

@section('content')
    <br>
    <br>
    <div>
        <div class="col-lg-12 col-md-20">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Feira Livre</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text">
                            <tr>
                                <th>Data</th>
                                <th>Localidade</th>
                                <th>Informação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($feira_livre))
                                @foreach ($feira_livre as $feira)
                                    <tr>
                                        <td>{{date('d/m/Y', strtotime($feira->data))}}</td>
                                        <td>{{$feira->Desc01($feira->valor_fl_01)}}</td>
                                        <td>{{$feira->valor_fl_02}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $feira_livre->links() }}
                </div>
            </div>
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Gera Relatorio</h4>
                </div>
                <div class="card-body table-responsive">
                    @if($errors->any())
                        <h4 style="color: red;">Erro: {{$errors->first()}}</h4>
                    @endif
                    <form action="{{ route('livre.createPDF') }}" method="POST">
                    @csrf
                        <div class="row">
                            <label class="col-sm-2 col-form-label">{{ __('Data Inicio:') }}</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input class="form-control" name="data1" id="input-data-inicial" type="date" required />
                                </div>
                            </div>

                            <label class="col-sm-2 col-form-label">{{ __('Data Fim:') }}</label>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <input class="form-control" name="data2" id="input-data-final" type="date" required />
                                </div>
                            </div>

{{--                            <button type="button" id="gerarRelatorio" class="btn btn-success">Filtrar</button>--}}

                            <button type="submit" id="imprimirRelatorio" class="btn btn-warning">Imprimir</button>
                        </div>
                    </form>
{{--                    <table class="table table-hover">--}}
{{--                        <thead class="text">--}}
{{--                            <tr>--}}
{{--                                <th>Data</th>--}}
{{--                                <th>Localidade</th>--}}
{{--                                <th>Informação</th>--}}
{{--                            </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody id="tableRetorno">--}}
{{--                            @if(!empty($feira_livreTotal))--}}
{{--                                @foreach($feira_livreTotal as $feira)--}}
{{--                                    @foreach($feira->informacoes as $local => $informacoes)--}}
{{--                                        <tr>--}}
{{--                                            <td>{{$feira->data}}</td>--}}
{{--                                            <td>{{App\Livre::Desc01($local)}}</td>--}}
{{--                                            <td>{{ implode('', $informacoes) }}</td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
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
                    url:"{{ route('api.livre') }}",
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
                cols += '<td>' + data[k].valor_fl_01 + '</td>';
                cols += '<td>' + data[k].valor_fl_02 + '</td>';

                newRow.append(cols);
                $("#tableRetorno").append(newRow);
            }
        }
    </script>
@endsection
