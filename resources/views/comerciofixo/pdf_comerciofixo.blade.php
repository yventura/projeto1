
<!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<html>

    <head>
        <title>Comercio Fixo</title>
    </head>

    <body>

        <header>
            <h4 style="text-align: center;">SECRETARIA DE FINANÇAS</h4>
            <h4 style="text-align: center;">Diretoria de Operações Especiais e Fiscalização de Taxas</h4>
            <h5 style="text-align: center;">COMERCIO FIXO</h5>
        </header>

        <table>
            <tr>
                <th>Data</th>
                <th>Vistorias Processos</th>
                <th>Vistorias VRE</th>
                <th>Viabilidade VRE</th>
                <th>Ciências</th>
                <th>Informação</th>
                <th>Plantão Interno</th>
                <th>Atendimento Guiche</th>
                <th>Triagem/Pesquisas/Despacho</th>
                <th>Administrativo</th>
            </tr>

            <tbody>
            @foreach($retorno as $fixo)
                <tr>
                    <td>{{ $fixo->data }}</td>
                    <td>{{ $fixo->valor_cf_01 }}</td>
                    <td>{{ $fixo->valor_cf_02 }}</td>
                    <td>{{ $fixo->valor_cf_03 }}</td>
                    <td>{{ $fixo->valor_cf_04 }}</td>
                    <td>{{ $fixo->valor_cf_05 }}</td>
                    <td>{{ $fixo->valor_cf_06 }}</td>
                    <td>{{ $fixo->valor_cf_07 }}</td>
                    <td>{{ $fixo->valor_cf_08 }}</td>
                    <td>{{ $fixo->valor_cf_09 }}</td>
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

