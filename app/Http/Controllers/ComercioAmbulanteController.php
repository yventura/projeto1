<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\ComercioAmbulante;
use Illuminate\Support\Facades\Redirect;

class ComercioAmbulanteController extends Controller
{

    private $objComercioAmbulante;

    public function __construct()
    {
        $this->objComercioAmbulante = new ComercioAmbulante();
    }

    public function index()
    {
        $comercio_ambulante = $this->objComercioAmbulante->paginate(5);

        return view('comercio_ambulante.index', compact('comercio_ambulante'));
    }


    public function create()
    {
        return view('comercio_ambulante.add');
    }

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
        $data_ambulante = null;
        $desc = null;

        foreach($comercio_ambulante as $ambulante){
            $valor_ca_01 += $ambulante->valor_ca_01;
            $valor_ca_02 += $ambulante->valor_ca_02;
            $valor_ca_03 += $ambulante->valor_ca_03;
            $valor_ca_04 += $ambulante->valor_ca_04;
            $valor_ca_05 += $ambulante->valor_ca_05;
            $valor_ca_06 += $ambulante->valor_ca_06;
            $valor_ca_07 += $ambulante->valor_ca_07;
            $valor_ca_08 += $ambulante->valor_ca_08;
            $valor_ca_09 += $ambulante->valor_ca_09;

            if (date('d/m/Y', strtotime($ambulante->data)) == $data_ambulante) {
                foreach ($retorno as $key => $ret) {
                    if (date('d/m/Y', strtotime($ambulante->data)) == $ret->data) {
                        // Insere um identificador sobre o que é o dado
//                        if ($ambulante->desc_03 == 1) {
//                            $desc[date('d/m/Y', strtotime($ambulante->data))]['praia'] += 1;
//                        } else if($ambulante->desc_03 == 2) {
//                            $desc[date('d/m/Y', strtotime($ambulante->data))]['camping'] += 1;
//                        } else {
//                            $desc[date('d/m/Y', strtotime($ambulante->data))]['tendas'] += 1;
//                        }


                        $retorno[$key] = (object)[
                            'data' => date('d/m/Y', strtotime($ambulante->data)),
                            'valor_ca_01' => $ambulante->valor_ca_01 + $ret->valor_ca_01,
                            'valor_ca_02' => $ambulante->valor_ca_02 + $ret->valor_ca_02,
                            'valor_ca_03' => $ambulante->valor_ca_03 + $ret->valor_ca_03,
                            'desc_03' => $desc[date('d/m/Y', strtotime($ambulante->data))],
                            'valor_ca_04' => $ambulante->valor_ca_04 + $ret->valor_ca_04,
                            'valor_ca_05' => $ambulante->valor_ca_05 + $ret->valor_ca_05,
                            'valor_ca_06' => $ambulante->valor_ca_06 + $ret->valor_ca_06,
                            'valor_ca_07' => $ambulante->valor_ca_07 + $ret->valor_ca_07,
                            'valor_ca_08' => $ambulante->valor_ca_08 + $ret->valor_ca_08,
                            'valor_ca_09' => $ambulante->valor_ca_09 + $ret->valor_ca_09
                        ];
                    }
                }
            } else {
                $data_ambulante = date('d/m/Y', strtotime($ambulante->data));

//                if ($ambulante->desc_03 == 1) {
//                    $desc[$data_ambulante] = array(
//                        'praia' => 1,
//                        'camping' => 0
//                    );
//                } else {
//                    $desc[$data_ambulante] = array(
//                        'praia' => 0,
//                        'camping' => 1
//                    );
//                }

                $retorno[] = (object)[
                    'data' => $data_ambulante,
                    'valor_ca_01' => $ambulante->valor_ca_01,
                    'valor_ca_02' => $ambulante->valor_ca_02,
                    'valor_ca_03' => $ambulante->valor_ca_03,
                    'desc_03' => $ambulante->desc_03,
                    'valor_ca_04' => $ambulante->valor_ca_04,
                    'valor_ca_05' => $ambulante->valor_ca_05,
                    'valor_ca_06' => $ambulante->valor_ca_06,
                    'valor_ca_07' => $ambulante->valor_ca_07,
                    'valor_ca_08' => $ambulante->valor_ca_08,
                    'valor_ca_09' => $ambulante->valor_ca_09
                ];
            }
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
        $datas_unicas = array();
        $soma_diaria = array();

        $comercio_ambulante = $this->objComercioAmbulante
            ->select('*')
            ->whereBetween('data', [$inicio, $fim])
            ->orderBy('data', 'asc')
            ->get();

        foreach ($comercio_ambulante as $ambulante){
            $somente_data = date('d/m/Y', strtotime($ambulante->data));

            if(!in_array($somente_data, $datas_unicas)){
                $datas_unicas[] = $somente_data;
            }
        }

        foreach ($datas_unicas as $data) {
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
                $data_ambulante = null;

                foreach ($comercio_ambulante as $ambulante) {
                    if (date('d/m/Y', strtotime($ambulante->data)) == $data_ambulante) {
                        foreach ($retorno as $key => $ret) {
                            if (date('d/m/Y', strtotime($ambulante->data)) == $ret->data) {
                                $retorno[$key] = (object)[
                                    'data' => date('d/m/Y', strtotime($ambulante->data)),
                                    'valor_ca_01' => $ambulante->valor_ca_01 + $ret->valor_ca_01,
                                    'valor_ca_02' => $ambulante->valor_ca_02 + $ret->valor_ca_02,
                                    'valor_ca_03' => $ambulante->valor_ca_03 + $ret->valor_ca_03,
                                    'valor_ca_04' => $ambulante->valor_ca_04 + $ret->valor_ca_04,
                                    'valor_ca_05' => $ambulante->valor_ca_05 + $ret->valor_ca_05,
                                    'valor_ca_06' => $ambulante->valor_ca_06 + $ret->valor_ca_06,
                                    'valor_ca_07' => $ambulante->valor_ca_07 + $ret->valor_ca_07,
                                    'valor_ca_08' => $ambulante->valor_ca_08 + $ret->valor_ca_08,
                                    'valor_ca_09' => $ambulante->valor_ca_09 + $ret->valor_ca_09
                                ];
                            }
                        }
                    } else {
                        $data_ambulante = date('d/m/Y', strtotime($ambulante->data));
                        $retorno[] = (object)[
                            'data' => $data_ambulante,
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
                    }


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
}
