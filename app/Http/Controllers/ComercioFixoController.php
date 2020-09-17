<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ComercioFixo;
use App\User;
use PhpParser\Node\Expr\Cast\Object_;

class ComercioFixoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objFixo;
    private $objUser;



    public function __construct()
    {
        $this->objFixo = new ComercioFixo();
        $this->objUser = new User();
    }

    public function index()
    {
        $comerciofixo = $this->objFixo->paginate(5);
        $comerciosDiarios = $this->objFixo->all();
        $comerciosTotal = null;
        $datas_unicas = array();
        $soma_diaria = array();
        $error = 0;

        //Salva as datas de forma unica
        foreach ($comerciosDiarios as $comercio) {
            $somente_data = date('d/m/Y', strtotime($comercio->data));
            if (!in_array($somente_data, $datas_unicas)) {
                $datas_unicas[] = $somente_data;
            }
        }

        //Faz a somatoria com base na data
        foreach ($datas_unicas as $data) {
            //Seta as variaveis de soma em 0
            $vistoria_processos = 0;
            $vistoria_vre = 0;
            $viabilidade_vre = 0;
            $ciencia = 0;
            $intimacao = 0;
            $plantao_interno = 0;
            $atendimento_guiche = 0;

            foreach ($comerciofixo as $comercio) {
                $somente_data = date('d/m/Y', strtotime($comercio->data));
                if ($somente_data == $data) {
                    $vistoria_processos += $comercio->vistoria_processos;
                    $vistoria_vre += $comercio->vistoria_vre;
                    $viabilidade_vre += $comercio->viabilidade_vre;
                    $ciencia += $comercio->ciencia;
                    $intimacao += $comercio->intimacao;
                    $plantao_interno += $comercio->plantao_interno;
                    $atendimento_guiche += $comercio->atendimento_guiche;

                    $soma_diaria[$somente_data] = array(
                        'vistoria_processos' => $vistoria_processos,
                        'vistoria_vre' => $vistoria_vre,
                        'viabilidade_vre' => $viabilidade_vre,
                        'ciencia' => $ciencia,
                        'intimacao' => $intimacao,
                        'plantao_interno' => $plantao_interno,
                        'atendimento_guiche' => $atendimento_guiche
                    );
                }
            }
        }

        //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
        foreach ($soma_diaria as $data => $dados) {
            //Cria um array de objetos
            $comerciosTotal[] = (object)[
                'data' => $data,
                'vistoria_processos' => $dados['vistoria_processos'],
                'vistoria_vre' => $dados['vistoria_vre'],
                'viabilidade_vre' => $dados['viabilidade_vre'],
                'ciencia' => $dados['ciencia'],
                'intimacao' => $dados['intimacao'],
                'plantao_interno' => $dados['plantao_interno'],
                'atendimento_guiche' => $dados['atendimento_guiche']
            ];
        }
        return view('comerciofixo.index', compact('comerciofixo'))->with('comerciosTotal', $comerciosTotal);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comerciofixo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cad=$this->objFixo->create([
            'date'=>$request->date,
            'vistoria_processos'=>$request->vistoria,
            'vistoria_vre'=>$request->vistoriavre,
            'viabilidade_vre'=>$request->viabilidade,
            'ciencia'=>$request->ciencia,
            'intimacao'=>$request->intimacao,
            'plantao_interno'=>$request->plantao,
            'atendimento_guiche'=>$request->guiche,
            'observacao'=>$request->observacao
        ]);
        if($cad){return redirect('comerciofixo');}
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

        $comerciosFixos = null;
        if (!empty($Request)) {
            $comercioFixos = $this->objFixo->paginate(5);
            dd($request);
            die();
        }

        return view("comerciofixo.semanal", compact($comerciosFixos));
    }

    public function Sem() {
        $comerciofixo  = $this->objFixo->paginate(5);

        return view("comerciofixo", compact($comerciofixo));
    }

    protected function semanalApi(Request $request) {
        $inicio = $request->inicio;
        $fim = $request->fim." 23:59:00";

        //Valores manuais

        /*
        $inicio = "2020-09-01";
        $fim = "2020-09-02 23:59:00";
        */

        $retorno = array();

        $comerciosFixos = $this->objFixo->whereBetween('data', [$inicio, $fim])->get();

        //Seta as variaveis de soma em 0
        $vistoria_processos = 0;
        $vistoria_vre = 0;
        $viabilidade_vre = 0;
        $ciencia = 0;
        $intimacao = 0;
        $plantao_interno = 0;
        $atendimento_guiche = 0;

        foreach ($comerciosFixos as $comercio) {
            $vistoria_processos += $comercio->vistoria_processos;
            $vistoria_vre += $comercio->vistoria_vre;
            $viabilidade_vre += $comercio->viabilidade_vre;
            $ciencia += $comercio->ciencia;
            $intimacao += $comercio->intimacao;
            $plantao_interno += $comercio->plantao_interno;
            $atendimento_guiche += $comercio->atendimento_guiche;
        }

        $retorno[] = (object)[
            'vistoria_processos' => $vistoria_processos,
            'vistoria_vre' => $vistoria_vre,
            'viabilidade_vre' => $viabilidade_vre,
            'ciencia' =>$ciencia,
            'intimacao' => $intimacao,
            'plantao_interno' => $plantao_interno,
            'atendimento_guiche' => $atendimento_guiche
        ];

        return json_encode($retorno);
    }
}
