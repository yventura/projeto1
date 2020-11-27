<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\ComercioAmbulante;
use Illuminate\Support\Facades\Redirect;

class ComercioAmbulanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objComercioAmbulante;

    public function __construct()
    {
        $this->objComercioAmbulante = new ComercioAmbulante();
    }

    public function index()
    {

        $comercio_ambulante = $this->objComercioAmbulante->paginate(5);
        /* $datas_unicas = array();
        $soma_diaria = array();
        $erro = 0;

        // Começo do Salvamento das datas de forma Unica
        foreach ($comercio_ambulante as $comercioA){
            $somente_data = date('d/m/Y', strtotime($comercioA->data));

            if(!in_array($somente_data, $datas_unicas)){
                $datas_unicas[] = $somente_data;
            }
        }
        // Inicio Somatoria Datas
        foreach ($datas_unicas as $data){
            $valor_ca_01 = 0;
            $valor_ca_02 = 0;
            $valor_ca_03_1 = 0;
            $valor_ca_03_2 = 0;
            $valor_ca_03_3 = 0;
            $valor_ca_04 = 0;
            $valor_ca_05 = 0;
            $valor_ca_06_1 = 0;
            $valor_ca_06_2 = 0;
            $valor_ca_07_1 = 0;
            $valor_ca_07_2 = 0;
            $valor_ca_07_3 = 0;
            $valor_ca_08_1 = 0;
            $valor_ca_08_2 = 0;
            $valor_ca_08_3 = 0;
            $valor_ca_09 = 0;

            foreach ($comercio_ambulante as $comercioA){
                $somente_data = date('d/m/Y', strtotime($comercioA->data));
                $somente_03 = $comercioA->desc_03;
                $somente_06 = $comercioA->desc_06;
                $somente_07 = $comercioA->desc_07;
                $somente_08 = $comercioA->desc_08;

            if($somente_data == $data){
                $valor_ca_01 += $comercioA->valor_ca_01;
                $valor_ca_02 += $comercioA->valor_ca_02;
                $valor_ca_04 += $comercioA->valor_ca_04;
                $valor_ca_05 += $comercioA->valor_ca_05;
                $valor_ca_09 += $comercioA->valor_ca_09;

                if($somente_03 == '1' && $somente_03 != '0') {
                    $valor_ca_03_1 += $comercioA->valor_ca_03;

                } else if($somente_03 == '2' && $somente_03 != '0'){
                    $valor_ca_03_2 += $comercioA->valor_ca_03;

                } else if($somente_03 == '3' && $somente_03 != '0'){
                    $valor_ca_03_3 += $comercioA->valor_ca_03;

                }

                if($somente_06 == '1' && $somente_06 != '0') {
                    $valor_ca_06_1 += $comercioA->valor_ca_06;

                } else if($somente_06 == '2' && $somente_06 != '0'){
                    $valor_ca_06_2 += $comercioA->valor_ca_06;

                }

                if($somente_07 == '1' && $somente_07 != '0') {
                    $valor_ca_07_1 += $comercioA->valor_ca_07;

                } else if($somente_07 == '2' && $somente_07 != '0'){
                    $valor_ca_07_2 += $comercioA->valor_ca_07;

                } else if($somente_07 == '3' && $somente_07 != '0'){
                    $valor_ca_07_3 += $comercioA->valor_ca_07;

                }

                if($somente_08 == '1' && $somente_08 != '0') {
                    $valor_ca_08_1 += $comercioA->valor_ca_08;

                } else if($somente_08 == '2' && $somente_08 != '0'){
                    $valor_ca_08_2 += $comercioA->valor_ca_08;

                } else if($somente_08 == '3' && $somente_08 != '0'){
                    $valor_ca_08_3 += $comercioA->valor_ca_08;

                }

                // Somando Descrição

                    $soma_diaria[$somente_data] = array(
                        'valor_ca_01' => $valor_ca_01,
                        'valor_ca_02' => $valor_ca_02,
                        'valor_ca_03_1' => $valor_ca_03_1,
                        'valor_ca_03_2' => $valor_ca_03_2,
                        'valor_ca_03_3' => $valor_ca_03_3,
                        'valor_ca_04' => $valor_ca_04,
                        'valor_ca_05' => $valor_ca_05,
                        'valor_ca_06_1' => $valor_ca_06_1,
                        'valor_ca_06_2' => $valor_ca_06_2,
                        'valor_ca_07_1' => $valor_ca_07_1,
                        'valor_ca_07_2' => $valor_ca_07_2,
                        'valor_ca_07_3' => $valor_ca_07_3,
                        'valor_ca_08_1' => $valor_ca_08_1,
                        'valor_ca_08_2' => $valor_ca_08_2,
                        'valor_ca_08_3' => $valor_ca_08_3,
                        'valor_ca_09' => $valor_ca_09
                    );
                }
            }
        }


        //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
        foreach ($soma_diaria as $data => $dados){
            $comercio_ambulanteTotal[] = (object)[
              'data' => $data,
              'valor_ca_01' => $dados['valor_ca_01'],
              'valor_ca_02' => $dados['valor_ca_02'],
              'valor_ca_03_1' => $dados['valor_ca_03_1'],
              'valor_ca_03_2' => $dados['valor_ca_03_2'],
              'valor_ca_03_3' => $dados['valor_ca_03_3'],
              'valor_ca_04' => $dados['valor_ca_04'],
              'valor_ca_05' => $dados['valor_ca_05'],
              'valor_ca_06_1' => $dados['valor_ca_06_1'],
              'valor_ca_06_2' => $dados['valor_ca_06_2'],
              'valor_ca_07_1' => $dados['valor_ca_07_1'],
              'valor_ca_07_2' => $dados['valor_ca_07_2'],
              'valor_ca_07_3' => $dados['valor_ca_07_3'],
              'valor_ca_08_1' => $dados['valor_ca_08_1'],
              'valor_ca_08_2' => $dados['valor_ca_08_2'],
              'valor_ca_08_3' => $dados['valor_ca_08_3'],
              'valor_ca_09' => $dados['valor_ca_09']
            ];
        }
        */
        //retirado ->with('comercio_ambulanteTotal', $comercio_ambulanteTotal)
        return view('comercio_ambulante.index', compact('comercio_ambulante'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('comercio_ambulante.add');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $cad=$this->objComercioAmbulante->create([
            'data'=>$request->data,
            'valor_ca_01'=>$request->valor_ca_01,
            'valor_ca_02'=>$request->valor_ca_02,
            'valor_ca_03'=>$request->valor_ca_03,
            'desc_03'=>$request->desc_03,
            'valor_ca_04'=>$request->valor_ca_04,
            'valor_ca_05'=>$request->valor_ca_05,
            'valor_ca_06'=>$request->valor_ca_06,
            'desc_06'=>$request->desc_06,
            'valor_ca_07'=>$request->valor_ca_07,
            'desc_07'=>$request->desc_07,
            'valor_ca_08'=>$request->valor_ca_08,
            'desc_08'=>$request->desc_08,
            'valor_ca_09'=>$request->valor_ca_09

        ]);
        if($cad){return redirect('comercio_ambulante');}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function semanal() {

        $comercio_ambulante = null;
        if (!empty($Request)) {
            $comercio_ambulante = $this->objComercioAmbulante->Model::query()->paginate(5);
            die();
        }
        return view("comercio_ambulante.index", compact('comercio_ambulante'));
    }

    public function Sem() {
        $comercio_ambulante  = $this->objComercioAmbulante->Model::query()->paginate(5);

        return view("comercio_ambulante", compact('comercio_ambulante'));
    }

    protected function semanalApi(Request $request){
        $inicio = $request->inicio;
        $fim = $request->fim." 23:59:00";

        $retorno = array();

        $comercio_ambulante = $this->objComercioAmbulante
            ->select('*')
            ->whereBetween('data', [$inicio, $fim])
            ->orderBy('data', 'asc')
            ->get();

        $valor_ca_01 = 0;
        $valor_ca_02 = 0;
        $valor_ca_03 = 0;
        $valor_ca_04 = 0;
        $valor_ca_05 = 0;
        $valor_ca_06 = 0;
        $valor_ca_07 = 0;
        $valor_ca_08 = 0;
        $valor_ca_09 = 0;

        foreach($comercio_ambulante as $ambulante){
            $retorno[] = (object)[
                'data' => date('d/m/Y', strtotime($ambulante->data)),
                'valor_ca_01' => $ambulante->valor_ca_01,
                'valor_ca_02' => $ambulante->valor_ca_02,
                'valor_ca_03' => $ambulante->valor_ca_03,
                'valor_ca_04' => $ambulante->valor_ca_04,
                'valor_ca_05' => $ambulante->valor_ca_05,
                'valor_ca_06' => $ambulante->valor_ca_06,
                'valor_ca_07' => $ambulante->valor_ca_07,
                'valor_ca_08' => $ambulante->valor_ca_08,
                'valor_ca_09' => $ambulante->valor_ca_09
            ];

            $valor_ca_01 += $ambulante->valor_ca_01;
            $valor_ca_02 += $ambulante->valor_ca_02;
            $valor_ca_03 += $ambulante->valor_ca_03;
            $valor_ca_04 += $ambulante->valor_ca_04;
            $valor_ca_05 += $ambulante->valor_ca_05;
            $valor_ca_06 += $ambulante->valor_ca_06;
            $valor_ca_07 += $ambulante->valor_ca_07;
            $valor_ca_08 += $ambulante->valor_ca_08;
            $valor_ca_09 += $ambulante->valor_ca_09;
        }

        $retorno[] = (object)[
            'data' => 'Total',
            'valor_ca_01' => $valor_ca_01,
            'valor_ca_02' => $valor_ca_02,
            'valor_ca_03' => $valor_ca_03,
            'valor_ca_04' => $valor_ca_04,
            'valor_ca_05' => $valor_ca_05,
            'valor_ca_06' => $valor_ca_06,
            'valor_ca_07' => $valor_ca_07,
            'valor_ca_08' => $valor_ca_08,
            'valor_ca_09' => $valor_ca_09
        ];

        return json_encode($retorno);
    }

    public function createPDF(Request $request) {
        $inicio = $request->data1;
        $fim = $request->data2." 23:59:00";

        $retorno = array();

        $comercio_ambulante = $this->objComercioAmbulante
            ->select('*')
            ->whereBetween('data', [$inicio, $fim])
            ->orderBy('data', 'asc')
            ->get();

        if (count($comercio_ambulante) > 0) {
            $valor_ca_01 = 0;
            $valor_ca_02 = 0;
            $valor_ca_03 = 0;
            $valor_ca_04 = 0;
            $valor_ca_05 = 0;
            $valor_ca_06 = 0;
            $valor_ca_07 = 0;
            $valor_ca_08 = 0;
            $valor_ca_09 = 0;

            foreach($comercio_ambulante as $ambulante){
                $retorno[] = (object)[
                    'data' => date('d/m/Y', strtotime($ambulante->data)),
                    'valor_ca_01' => $ambulante->valor_ca_01,
                    'valor_ca_02' => $ambulante->valor_ca_02,
                    'valor_ca_03' => $ambulante->valor_ca_03,
                    'valor_ca_04' => $ambulante->valor_ca_04,
                    'valor_ca_05' => $ambulante->valor_ca_05,
                    'valor_ca_06' => $ambulante->valor_ca_06,
                    'valor_ca_07' => $ambulante->valor_ca_07,
                    'valor_ca_08' => $ambulante->valor_ca_08,
                    'valor_ca_09' => $ambulante->valor_ca_09
                ];

                $valor_ca_01 += $ambulante->valor_ca_01;
                $valor_ca_02 += $ambulante->valor_ca_02;
                $valor_ca_03 += $ambulante->valor_ca_03;
                $valor_ca_04 += $ambulante->valor_ca_04;
                $valor_ca_05 += $ambulante->valor_ca_05;
                $valor_ca_06 += $ambulante->valor_ca_06;
                $valor_ca_07 += $ambulante->valor_ca_07;
                $valor_ca_08 += $ambulante->valor_ca_08;
                $valor_ca_09 += $ambulante->valor_ca_09;
            }

            $retorno[] = (object)[
                'data' => 'Total',
                'valor_ca_01' => $valor_ca_01,
                'valor_ca_02' => $valor_ca_02,
                'valor_ca_03' => $valor_ca_03,
                'valor_ca_04' => $valor_ca_04,
                'valor_ca_05' => $valor_ca_05,
                'valor_ca_06' => $valor_ca_06,
                'valor_ca_07' => $valor_ca_07,
                'valor_ca_08' => $valor_ca_08,
                'valor_ca_09' => $valor_ca_09
            ];

            $pdf = PDF::loadView('comercio_ambulante.pdf_ambulante', compact('retorno'));

            return $pdf->setPaper('A4', 'landscape')->stream('Relatorio_Comercio_Ambulante.pdf');
        } else {
            return Redirect::Back()->withErrors(['Nenhum registro para a(s) data(s) selecionada(s)']);
        }
    }
}
