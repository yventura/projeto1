@extends('layouts.app', ['activePage' => 'comercio_ambulante_Index', 'titlePage' => __(' ')])

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Comercio Ambulante</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="text-primary">
                                        <th>Data</th>
                                        <th>Ort. Ret. de cadeiras<br> e Guarda-Sóis</th>
                                        <th>Ort. Ret. <br>de Animais</th>
                                        <th>Ort. Ret. tendas, <br>camping, churrasco</th>
                                        <th>Ort. Som<br> Abusivo</th>
                                        <th>Ort. Paralisação<br> Esporte</th>
                                        <th>Ort. Ambulante<br> Irregular - Praias e VC</th>
                                        <th>Vist/Cient/Apreensão<br> - Praias</th>
                                        <th>Vist/Cient/Apreensão<br> - VC</th>
                                        <th>Denuncias</th>
                                    </thead>
                                    <tbody>
                                        @if(!empty($comercio_ambulante))
                                            @foreach($comercio_ambulante as $comercio)
                                                <tr>
                                                    <td scope="row">{{date('d/m/Y', strtotime($comercio->data))}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_01}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_02}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_03}} </td>
                                                    <td scope="row">{{$comercio->valor_ca_04}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_05}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_06}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_07}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_08}}</td>
                                                    <td scope="row">{{$comercio->valor_ca_09}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                                {{ $comercio_ambulante->links() }}
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
                            <form action="{{ route('comercio_ambulante.createPDF') }}" method="POST">
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
                                            <input class="form-control" name="data2" id="input-data-final" type="date" max="{{ date('Y-m-d') }}" required />
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
                                        <th>Ort. Ret. de cadeiras<br> e Guarda-Sóis</th>
                                        <th>Ort. Ret. <br>de Animais</th>
                                        <th>Ort. Ret. tendas, <br>camping, churrasco</th>
                                        <th>Ort. Som<br> Abusivo</th>
                                        <th>Ort. Paralisação<br> Esporte</th>
                                        <th>Ort. Ambulante<br> Irregular - Praias e VC</th>
                                        <th>Vist/Cient/Apreensão<br> - Praias</th>
                                        <th>Vist/Cient/Apreensão - VC</th>
                                        <th>Denuncias</th>
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
                    url:"{{ route('api.ambulante') }}",
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
                var desc_03 = data[k].desc_03;
                var str_desc_03 = "";

                for (var m in desc_03) {
                    str_desc_03 += '</br>' + m + ': ' + desc_03[m] + '</br>';

                    console.log(str_desc_03);
                }

                cols += '<td>' + data[k].data + '</td>';
                cols += '<td>' + data[k].valor_ca_01 + '</td>';
                cols += '<td>' + data[k].valor_ca_02 + '</td>';
                cols += '<td>' + data[k].valor_ca_03 + str_desc_03 + '</td>';
                cols += '<td>' + data[k].valor_ca_04 + '</td>';
                cols += '<td>' + data[k].valor_ca_05 + '</td>';
                cols += '<td>' + data[k].valor_ca_06 + '</td>';
                cols += '<td>' + data[k].valor_ca_07 + '</td>';
                cols += '<td>' + data[k].valor_ca_08 + '</td>';
                cols += '<td>' + data[k].valor_ca_09 + '</td>';

                newRow.append(cols);
                $("#tableRetorno").append(newRow);
            }
        }
    </script>
@endsection
