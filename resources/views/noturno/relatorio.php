<?php
include './mpdf60/mpdf.php';

$mpdf=new mPDF();

$noturno =
    "
        <html>
            <body>
                <h1>TESTANDO</h1>
                <ul>
                    <li>Teste1</li>
                    <li>Teste2</li>
                </ul>
            </body>
        </html>
    ";


$noturno = "teste.pdf";



$mpdf->WriteHTML($noturno);

$mpdf->Output($noturno, 'I');

exit;
