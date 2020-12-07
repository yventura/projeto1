
<!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<html>
    <head>
        <title>Feira Livre</title>
    </head>

    <body>
        <header>
            <h4 style="text-align: center;">SECRETARIA DE FINANÇAS</h4>
            <h4 style="text-align: center;">Diretoria de Operações Especiais e Fiscalização de Taxas</h4>
            <h5 style="text-align: center;">FEIRA LIVRE</h5>
        </header>

        <table>
            <tr>
                <th>Data</th>
                <th>Feira</th>
                <th>Informação</th>
            </tr>
            @foreach($feira_livreTotal as $feira)
                @foreach($feira->informacoes as $local => $informacoes)
                    <tr>
                        <td>{{$feira->data}}</td>
                        <td>{{App\Livre::Desc01($local)}}</td>
                        <td>{{ implode('', $informacoes) }}</td>
                    </tr>
                @endforeach
            @endforeach
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

