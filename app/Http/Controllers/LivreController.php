<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Livre;
use Illuminate\Support\Facades\Redirect;

class LivreController extends Controller
{
    private $objFeira;

    public function __construct()
    {
        $this->objFeira = new Livre();
    }

    public function index()
    {
        $feira_livre = $this->objFeira->paginate(5);
        $datas_unicas = array();
        $soma_diaria = array();
        $feira_livreTotal = array();
        $erro = 0;

        //Salva as datas de forma unica
        foreach ($feira_livre as $feira) {
            $somente_data = date('d/m/Y', strtotime($feira->data));

            if (!in_array($somente_data, $datas_unicas)) {
                $datas_unicas[] = $somente_data;
            }
        }

        //Faz a somatoria com base na data
        foreach ($datas_unicas as $data) {
            $valor_fl_01 = 0;
            $valor_fl_02 = "";

            foreach ($feira_livre as $feira) {
                $somente_data = date('d/m/Y', strtotime($feira->data));

                if ($somente_data == $data) {

                    $valor_fl_01 = $feira->valor_fl_01;
                    $valor_fl_02 = $feira->valor_fl_02;

                    $soma_diaria[$somente_data][] = array(
                        'data' => $data,
                        'valor_fl_01' => $valor_fl_01,
                        'valor_fl_02' => $feira->valor_fl_02
                    );
                }
            }
        }

        //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
        foreach ($soma_diaria as $data => $dados) {
            $informacoes = array();
            $feira_antiga = $dados[0]['valor_fl_01'];
            $i = 0;
            foreach ($dados as $dadoinf) {
                $informacoes[$dadoinf['valor_fl_01']][] = $dadoinf['valor_fl_02'] . '; ';
            }

            //Cria um array de objetos
            $feira_livreTotal[] = (object)[
                'data' => $data,
                'informacoes' => $informacoes
            ];
        }

        return view('feira_livre.index', compact('feira_livre', 'feira_livreTotal'))->withModel('Livre');
    }

    public function create()
    {
       return view('feira_livre.add');
    }

    public function store(Request $request)
    {
        $cad=$this->objFeira->create([
            'data'=>$request->data,
            'valor_fl_01'=>$request->valor_fl_01,
            'valor_fl_02'=>$request->valor_fl_02
        ]);
        if($cad){return redirect('feira_livre');}
    }

    public function semanal() {

        $feira_livre = null;
        if (!empty($Request)) {
            $feira_livre = $this->objFeira->Model::query()->paginate(5);
            //dd($request);
            die();
        }
        return view("feira_livre.index", compact('feira_livre'));
    }

    public function Sem() {
        $feira_livre  = $this->objFeira->Model::query()->paginate(5);

        return view("feira_livre", compact('feira_livre'));
    }

    protected function semanalApi(Request $request){
        $data = $request->inicio;
        $data2 = $request->fim." 23:59:00";

        $retorno = array();

        $feira_livre = $this->objFeira
            ->select('*')
            ->whereBetween('data', [$data, $data2])
            ->orderBy('data', 'asc')
            ->get();


        $valor_fl_01 = 0;
        $valor_fl_02 = "";

        foreach($feira_livre as $livre){
            $retorno[] = (object)[
                'data' => date('d/m/Y', strtotime($livre->data)),
                'valor_fl_01' => $livre->valor_fl_01,
                'valor_fl_02' => $livre->valor_fl_02
            ];

            $valor_fl_01 = $livre->valor_fl_01;
            $valor_fl_02 = $livre->valor_fl_02;
        }

        $retorno[] = (object)[
            'data' => 'Total',
            'valor_ca_01' => $valor_ca_01,
            'valor_ca_02' => $valor_ca_02
        ];

        return json_encode($retorno);
    }

    public function createPDF(Request $request) {
        $data = $request->data1;
        $data2 = $request->data2." 23:59:00";

        $feira_livre = $this->objFeira
            ->select('*')
            ->whereBetween('data', [$data, $data2])
            ->orderBy('data', 'asc')
            ->get();

        $datas_unicas = array();
        $soma_diaria = array();
        $feira_livreTotal = array();
        $erro = 0;

        if (count($feira_livre) > 0) {

            //Salva as datas de forma unica
            foreach ($feira_livre as $feira) {
                $somente_data = date('d/m/Y', strtotime($feira->data));

                if (!in_array($somente_data, $datas_unicas)) {
                    $datas_unicas[] = $somente_data;
                }
            }

            //Faz a somatoria com base na data
            foreach ($datas_unicas as $data) {
                $valor_fl_01 = 0;
                $valor_fl_02 = "";

                foreach ($feira_livre as $feira) {
                    $somente_data = date('d/m/Y', strtotime($feira->data));

                    if ($somente_data == $data) {

                        $valor_fl_01 = $feira->valor_fl_01;
                        $valor_fl_02 = $feira->valor_fl_02;

                        $soma_diaria[$somente_data][] = array(
                            'data' => $data,
                            'valor_fl_01' => $valor_fl_01,
                            'valor_fl_02' => $feira->valor_fl_02
                        );
                    }
                }
            }

            //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
            foreach ($soma_diaria as $data => $dados) {
                $informacoes = array();
                $feira_antiga = $dados[0]['valor_fl_01'];
                $i = 0;
                foreach ($dados as $dadoinf) {
                    $informacoes[$dadoinf['valor_fl_01']][] = $dadoinf['valor_fl_02'] . '; ';
                }

                //Cria um array de objetos
                $feira_livreTotal[] = (object)[
                    'data' => $data,
                    'informacoes' => $informacoes
                ];
            }

            $pdf = PDF::loadView('feira_livre.pdf_feiralivre', compact('feira_livreTotal'));
            return $pdf->setPaper('A4', 'landscape')->stream('Relatorio_Feira_Livre.pdf');
        } else {
            return Redirect::Back()->withErrors(['Nenhum registro para a data selecionada']);
        }
    }
}
