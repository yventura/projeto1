<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Noturno;
use Illuminate\Support\Facades\Redirect;

class NoturnoController extends Controller
{

    private $objNoturno;

    public function __construct()
    {
        $this->objNoturno = new Noturno();
    }

    public function index()
    {

        $noturno = $this->objNoturno->paginate(5);
        $datas_unicas = array();
        $soma_diaria = array();
        $noturnoTotal = null;
        $error = 0;

        // Começo do Salvamento das datas de forma Unica
        foreach ($noturno as $note) {
            $somente_data = date('d/m/Y', strtotime($note->data));

            if (!in_array($somente_data, $datas_unicas)) {
                $datas_unicas[] = $somente_data;
            }
        }
        // Fim do Salvamente das datas
        // Inicio Somatoria Datas
        foreach ($datas_unicas as $data) {
            // Seta as variaveis de soma em 0
            $paralisacao_evento = 0;
            $atendimento_denuncia = 0;
            $comercio_ambulante = 0;
            $atendimento_processos = 0;

            foreach ($noturno as $note) {
                $somente_data = date('d/m/Y', strtotime($note->data));

                if ($somente_data == $data) {
                    $paralisacao_evento += $note->paralisacao_evento;
                    $atendimento_denuncia += $note->atendimento_denuncia;
                    $comercio_ambulante += $note->comercio_ambulante;
                    $atendimento_processos += $note->atendimento_processos;

                    $soma_diaria[$somente_data] = array(
                        'paralisacao_evento' => $paralisacao_evento,
                        'atendimento_denuncia' => $atendimento_denuncia,
                        'comercio_ambulante' => $comercio_ambulante,
                        'atendimento_processos' => $atendimento_processos
                    );
                }
            }
        }
        // Fim Somatoria Datas
        //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
        foreach ($soma_diaria as $data => $dados) {
            //Cria um array de objetos
            $noturnoTotal[] = (object)[
                'data' => $data,
                'paralisacao_evento' => $dados['paralisacao_evento'],
                'atendimento_denuncia' => $dados['atendimento_denuncia'],
                'comercio_ambulante' => $dados['comercio_ambulante'],
                'atendimento_processos' => $dados['atendimento_processos']
            ];
        }


        return view(('noturno.index'), compact('noturno'))->with('noturnoTotal', $noturnoTotal);
    }

    public function create()
    {
        return view('noturno.add');
    }

    public function store(Request $request)
    {
        $cad = $this->objNoturno->create([
            'data' => $request->data,
            'paralisacao_evento' => $request->paralisacao_evento,
            'atendimento_denuncia' => $request->atendimento_denuncia,
            'comercio_ambulante' => $request->comercio_ambulante,
            'atendimento_processos' => $request->atendimento_processos
        ]);
        if ($cad) {
            return redirect('noturno');
        }
    }

    public function semanal()
    {

        $noturno = null;
        if (!empty($Request)) {
            $noturno = $this->objNoturno->Model::query()->paginate(5);
            //dd($request);
            die();
        }
        return view("noturno.index", compact('noturno'));
    }

    public function Sem()
    {
        $noturno = $this->objNoturno->Model::query()->paginate(5);

        return view("noturno", compact('noturno'));
    }

    protected function semanalApi(Request $request)
    {
        $inicio = $request->inicio;
        $fim = $request->fim . " 23:59:00";

        $retorno = array();

        $noturno = $this->objNoturno
            ->select('*')
            ->whereBetween('data', [$inicio, $fim])
            ->orderBy('data', 'asc')
            ->get();

        $paralisacao_evento = 0;
        $atendimento_denuncia = 0;
        $comercio_ambulante = 0;
        $atendimento_processos = 0;
        $data_noturna = null;

        foreach ($noturno as $note) {
            $paralisacao_evento += $note->paralisacao_evento;
            $atendimento_denuncia += $note->atendimento_denuncia;
            $comercio_ambulante += $note->comercio_ambulante;
            $atendimento_processos += $note->atendimento_processos;


            if (date('d/m/Y', strtotime($note->data)) == $data_noturna) {
                foreach ($retorno as $key => $ret) {
                    if (date('d/m/Y', strtotime($note->data)) == $ret->data) {


                        $retorno[$key] = (object)[
                            'data' => date('d/m/Y', strtotime($note->data)),
                            'paralisacao_evento' => $note->paralisacao_evento + $ret->paralisacao_evento,
                            'atendimento_denuncia' => $note->atendimento_denuncia + $ret->atendimento_denuncia,
                            'comercio_ambulante' => $note->comercio_ambulante + $ret->comercio_ambulante,
                            'atendimento_processos' => $note->atendimento_processos + $ret->atendimento_processos
                        ];
                    }
                }
            } else {
                $data_noturna = date('d/m/Y', strtotime($note->data));

                $retorno[] = (object)[
                    'data' => $data_noturna,
                    'paralisacao_evento' => $note->paralisacao_evento,
                    'atendimento_denuncia' => $note->atendimento_denuncia,
                    'comercio_ambulante' => $note->comercio_ambulante,
                    'atendimento_processos' => $note->atendimento_processos
                ];
            }
        }

        $retorno[] = (object)[
            'data' => 'Total',
            'paralisacao_evento' => $paralisacao_evento,
            'atendimento_denuncia' => $atendimento_denuncia,
            'comercio_ambulante' => $comercio_ambulante,
            'atendimento_processos' => $atendimento_processos
        ];

        return json_encode($retorno);
    }

    public function createPDF(Request $request)
    {
        $inicio = $request->data1;
        $fim = $request->data2 . " 23:59:00";

        $retorno = array();
        $datas_unicas = array();
        $soma_diaria = array();

        $noturno = $this->objNoturno
            ->select('*')
            ->whereBetween('data', [$inicio, $fim])
            ->orderBy('data', 'asc')
            ->get();

        foreach ($noturno as $note) {
            $somente_data = date('d/m/Y', strtotime($note->data));

            if (!in_array($somente_data, $datas_unicas)) {
                $datas_unicas[] = $somente_data;
            }
        }

        foreach ($datas_unicas as $data) {
            if (count($noturno) > 0) {
                $paralisacao_evento = 0;
                $atendimento_denuncia = 0;
                $comercio_ambulante = 0;
                $atendimento_processos = 0;
                $data_noturna = null;


                foreach ($noturno as $note) {
                    if (date('d/m/Y', strtotime($note->data)) == $data_noturna) {
                        foreach ($retorno as $key => $ret) {
                            if (date('d/m/Y', strtotime($note->data)) == $ret->data) {
                                $retorno[$key] = (object)[
                                    'data' => date('d/m/Y', strtotime($note->data)),
                                    'paralisacao_evento' => $note->paralisacao_evento + $ret->paralisacao_evento,
                                    'atendimento_denuncia' => $note->atendimento_denuncia + $ret->atendimento_denuncia,
                                    'comercio_ambulante' => $note->comercio_ambulante + $ret->comercio_ambulante,
                                    'atendimento_processos' => $note->atendimento_processos + $ret->atendimento_processos
                                ];
                            }
                        }
                    } else {
                        $data_noturna = date('d/m/Y', strtotime($note->data));
                        $retorno[] = (object)[

                            'data' => $data_noturna,
                            'paralisacao_evento' => $note->paralisacao_evento,
                            'atendimento_denuncia' => $note->atendimento_denuncia,
                            'comercio_ambulante' => $note->comercio_ambulante,
                            'atendimento_processos' => $note->atendimento_processos
                        ];
                    }

                    $paralisacao_evento += $note->paralisacao_evento;
                    $atendimento_denuncia += $note->atendimento_denuncia;
                    $comercio_ambulante += $note->comercio_ambulante;
                    $atendimento_processos += $note->atendimento_processos;
                }

                $retorno[] = (object)[
                    'data' => 'Total',
                    'paralisacao_evento' => $paralisacao_evento,
                    'atendimento_denuncia' => $atendimento_denuncia,
                    'comercio_ambulante' => $comercio_ambulante,
                    'atendimento_processos' => $atendimento_processos
                ];

                $pdf = PDF::loadView('noturno.pdf_noturno', compact('noturnoTotal', 'retorno'));

                return $pdf->setPaper('A4', 'landscape')->stream('Relatorio_Fisc_Noturna.pdf');
            } else {
                return Redirect::Back()->withErrors(['Nenhum registro para a(s) data(s) selecionada(s)']);
            }
        }
    }
}
