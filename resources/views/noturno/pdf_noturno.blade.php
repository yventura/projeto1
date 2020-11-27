
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Novas tags de estrutura em HTML5</title>
        <style>
            table {
                border-collapse: collapse;
                border: 1px solid black;
            }

            th,td {
                border: 1px solid black;
            }
            table {
                table-layout: auto;
                width: 100%;
            }
        </style>
    </head>

    <body>
        <header>
            <h4 style="text-align: center;">SECRETARIA DE FINANÇAS</h4>
            <h4 style="text-align: center;">Diretoria de Operações Especiais e Fiscalização de Taxas</h4>
            <h5 style="text-align: center;">FISCALIZAÇÃO NOTURNA</h5>
        </header>
        <table>
            <tr>
                <th>Data</th>
                <th>Paralisação de eventos esportivos</th>
                <th>Denuncias recebidas no COPOM</th>
                <th>Despacho de processos</th>
                <th>Trabalho de coibição, inibição e manutenção de comercio ambulante irregular</th>
            </tr>
            <tbody id="tableRetorno">
                @foreach($retorno as $noturno)
                    <tr>
                        <td>{{ $noturno->data }}</td>
                        <td>{{ $noturno->paralisacao_evento }}</td>
                        <td>{{ $noturno->comercio_ambulante }}</td>
                        <td>{{ $noturno->atendimento_processos }}</td>
                        <td>{{ $noturno->atendimento_denuncia }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <footer>
            <p style="text-align: left">Assinatura _________________________</p>
            <p style="text-align: left">Data __/__/____</p>
        </footer>
    </body>
</html>




{{--<script type="text/javascript">--}}
{{--    $("#gerarRelatorio").click(function() {--}}
{{--        let data_inicial = document.getElementById('input-data-inicial').value;--}}
{{--        let data_final = document.getElementById('input-data-final').value;--}}
{{--        let error = 0;--}}

{{--        if (data_inicial == "" || data_final == "") {--}}
{{--            alert("Data inicial ou final não selecionada!");--}}
{{--            error++;--}}
{{--        }--}}

{{--        if (data_final < data_inicial) {--}}
{{--            alert("Data Final deve ser maior que a data inicial");--}}
{{--            error++;--}}
{{--        }--}}

{{--        if (!error) {--}}
{{--            $.ajax({--}}
{{--                type:'POST',--}}
{{--                header: {--}}
{{--                    'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')--}}
{{--                },--}}
{{--                url:"{{ route('api.note') }}",--}}
{{--                dataType: 'JSON',--}}
{{--                data: {--}}
{{--                    _token: "{{ csrf_token() }}",--}}
{{--                    inicio: data_inicial,--}}
{{--                    fim: data_final--}}
{{--                },--}}
{{--                success: function(data) {--}}
{{--                    if (data.length > 0) {--}}
{{--                        console.log(data);--}}
{{--                        adicionaRow(data);--}}
{{--                    }--}}
{{--                },--}}
{{--                error: function(data) {--}}
{{--                    console.log(data);--}}
{{--                    //alert("Erro");--}}
{{--                }--}}
{{--            })--}}
{{--        }--}}
{{--    });--}}

{{--    function adicionaRow(data) {--}}
{{--        $(".semResultado").remove();--}}
{{--        $(".resultado").remove();--}}

{{--        for (let k in data) {--}}
{{--            var newRow = $('<tr class="resultado">');--}}
{{--            var cols = '';--}}

{{--            cols += '<td>' + data[k].data + '</td>';--}}
{{--            cols += '<td>' + data[k].paralisacao_evento + '</td>';--}}
{{--            cols += '<td>' + data[k].atendimento_denuncia + '</td>';--}}
{{--            cols += '<td>' + data[k].atendimento_processos + '</td>';--}}
{{--            cols += '<td>' + data[k].comercio_ambulante + '</td>';--}}


{{--            newRow.append(cols);--}}
{{--            $("#tableRetorno").append(newRow);--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
