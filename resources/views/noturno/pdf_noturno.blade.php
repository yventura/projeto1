<!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<html>
    <head>
        <title>Fiscalização Noturna</title>
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
            <tbody>

                @foreach($noturnoTotal as $noturno)
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
