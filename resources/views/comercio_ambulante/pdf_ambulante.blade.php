<!DOCTYPE html>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

<html>
    <head>
        <title>Comercio Ambulante</title>
    </head>

    <body>
        <header>
            <h4 style="text-align: center;">SECRETARIA DE FINANÇAS</h4>
            <h4 style="text-align: center;">Diretoria de Operações Especiais e Fiscalização de Taxas</h4>
            <h5 style="text-align: center;">COMERCIO AMBULANTE</h5>
        </header>

        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Ort. Ret. de cadeiras e Guarda-Sóis</th>
                    <th>Ort. Ret. de Animais</th>
                    <th>Ort. Ret. tendas, camping, churrasco</th>
                    <th>Ort. Som Abusivo</th>
                    <th>Ort. Paralisação Esporte</th>
                    <th>Ort. Ambulante Irregular - Praias e VC</th>
                    <th>Vist/Cient/Apreensão - Praias</th>
                    <th>Vist/Cient/Apreensão - VC</th>
                    <th>Denuncias</th>
                </tr>
            </thead>

            <tbody>
                @foreach($retorno as $ambulante)
                    <tr>
                        <td>{{ $ambulante->data }}</td>
                        <td>{{ $ambulante->valor_ca_01 }}</td>
                        <td>{{ $ambulante->valor_ca_02 }}</td>
                        <td>{{ $ambulante->valor_ca_03 }}</td>
                        <td>{{ $ambulante->valor_ca_04 }}</td>
                        <td>{{ $ambulante->valor_ca_05 }}</td>
                        <td>{{ $ambulante->valor_ca_06 }}</td>
                        <td>{{ $ambulante->valor_ca_07 }}</td>
                        <td>{{ $ambulante->valor_ca_08 }}</td>
                        <td>{{ $ambulante->valor_ca_09 }}</td>
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

