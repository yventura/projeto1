<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\ComercioFixo;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class ComercioFixoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    private $objComercio_Fixo;



    public function __construct()
    {
        $this->objComercio_Fixo = new ComercioFixo();
    }

    public function index()
    {
        //$comerciofixo = $this->objFixo->paginate(5);

        $comerciofixo = $this->objComercio_Fixo->all();
        $datas_unicas = array();
        $soma_diaria = array();

        //Salva as datas de forma unica
        foreach ($comerciofixo as $comercio) {
            $somente = date('d/m/Y', strtotime($comercio->data));

            if (!in_array($somente, $datas_unicas)) {
                $datas_unicas[] = $somente;
            }
        }

        //Faz a somatoria com base na data
        foreach ($datas_unicas as $data) {
            //Seta as variaveis de soma em 0
            $valor_cf_01 = 0;
            $valor_cf_02 = 0;
            $valor_cf_03 = 0;
            $valor_cf_04 = 0;
            $valor_cf_05 = 0;
            $valor_cf_06 = 0;
            $valor_cf_07 = 0;
            $valor_cf_08_1 = 0;
            $valor_cf_08_2 = 0;
            $valor_cf_08_3 = 0;
            $valor_cf_09_1 = 0;

            foreach ($comerciofixo as $comercio) {
                $somente = date('d/m/Y', strtotime($comercio->data));
                $somente_08 = $comercio->desc_08;
                $somente_09 = $comercio->desc_09;

                if ($somente == $data) {
                    $valor_cf_01 += $comercio->valor_cf_01;
                    $valor_cf_02 += $comercio->valor_cf_02;
                    $valor_cf_03 += $comercio->valor_cf_03;
                    $valor_cf_04 += $comercio->valor_cf_04;
                    $valor_cf_05 += $comercio->valor_cf_05;
                    $valor_cf_06 += $comercio->valor_cf_06;
                    $valor_cf_07 += $comercio->valor_cf_07;

                    if($somente_08 == '1' && $somente_08 != '0') {
                        $valor_cf_08_1 += $comercio->valor_cf_08;

                    } else if($somente_08 == '2' && $somente_08 != '0'){
                        $valor_cf_08_2 += $comercio->valor_cf_08;

                    } else if($somente_08 == '3' && $somente_08 != '0'){
                        $valor_cf_08_3 += $comercio->valor_cf_08;

                    }

                    if($somente_09 == '1' && $somente_09 != '0') {
                        $valor_cf_09_1 += $comercio->valor_cf_09;
                    }

                    $soma_diaria[$somente] = array(
                        'valor_cf_01' => $valor_cf_01,
                        'valor_cf_02' => $valor_cf_02,
                        'valor_cf_03' => $valor_cf_03,
                        'valor_cf_04' => $valor_cf_04,
                        'valor_cf_05' => $valor_cf_05,
                        'valor_cf_06' => $valor_cf_06,
                        'valor_cf_07' => $valor_cf_07,
                        'valor_cf_08_1' => $valor_cf_08_1,
                        'valor_cf_08_2' => $valor_cf_08_2,
                        'valor_cf_08_3' => $valor_cf_08_3,
                        'valor_cf_09_1' => $valor_cf_09_1
                    );
                }
            }
        }



        //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
        foreach ($soma_diaria as $data => $dados) {
            //Cria um array de objetos
            $comercio_FixoTotal[] = (object)[
                'data' => $data,
                'valor_cf_01' => $dados['valor_cf_01'],
                'valor_cf_02' => $dados['valor_cf_02'],
                'valor_cf_03' => $dados['valor_cf_03'],
                'valor_cf_04' => $dados['valor_cf_04'],
                'valor_cf_05' => $dados['valor_cf_05'],
                'valor_cf_06' => $dados['valor_cf_06'],
                'valor_cf_07' => $dados['valor_cf_07'],
                'valor_cf_08_1' => $dados['valor_cf_08_1'],
                'valor_cf_08_2' => $dados['valor_cf_08_2'],
                'valor_cf_08_3' => $dados['valor_cf_08_3'],
                'valor_cf_09_1' => $dados['valor_cf_09_1']
            ];
        }
        return view('comerciofixo.index', compact('comerciofixo'))->with('comercio_FixoTotal', $comercio_FixoTotal);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        return view('comerciofixo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $cad=$this->objComercio_Fixo->create([
            'date'=>$request->date,
            'valor_cf_01'=>$request->valor_cf_01,
            'valor_cf_02'=>$request->valor_cf_02,
            'valor_cf_03'=>$request->valor_cf_03,
            'valor_cf_04'=>$request->valor_cf_04,
            'valor_cf_05'=>$request->valor_cf_05,
            'valor_cf_06'=>$request->valor_cf_06,
            'valor_cf_07'=>$request->valor_cf_07,
            'valor_cf_08'=>$request->valor_cf_08,
            'desc_08'=>$request->desc_08,
            'valor_cf_09'=>$request->valor_cf_09,
            'desc_09'=>$request->desc_09
        ]);
        if($cad){return redirect('comerciofixo');}
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
        //
    }

    public function semanal() {

        $comerciofixo = null;
        if (!empty($Request)) {
            $comerciofixo = $this->objComercio_Fixo->Model::query()->paginate(5);
            //dd($request);
            die();
        }
        return view("comerciofixo.index", compact('comerciofixo'));
    }

    public function Sem() {
        $comerciofixo  = $this->objComercio_Fixo->Model::query()->paginate(5);

        return view("comerciofixo", compact('comerciofixo'));
    }

    protected function semanalApi(Request $request){
        $inicio = $request->inicio;
        //$inicio = '2020-11-01 00:01:00';
        //$fim = '2020-11-20 23:59:00';
        $fim = $request->fim." 23:59:00";

        $retorno = array();

        $comerciofixo = $this->objComercio_Fixo
            ->select('*')
            ->whereBetween('data', [$inicio, $fim])
            ->orderBy('data', 'asc')
            ->get();

        $valor_cf_01 = 0;
        $valor_cf_02 = 0;
        $valor_cf_03 = 0;
        $valor_cf_04 = 0;
        $valor_cf_05 = 0;
        $valor_cf_06 = 0;
        $valor_cf_07 = 0;
        $valor_cf_08 = 0;
        $valor_cf_09 = 0;


        foreach($comerciofixo as $fixo){
            $retorno[] = (object)[
                'data' => date('d/m/Y', strtotime($fixo->data)),
                'valor_cf_01' => $fixo->valor_cf_01,
                'valor_cf_02' => $fixo->valor_cf_02,
                'valor_cf_03' => $fixo->valor_cf_03,
                'valor_cf_04' => $fixo->valor_cf_04,
                'valor_cf_05' => $fixo->valor_cf_05,
                'valor_cf_06' => $fixo->valor_cf_06,
                'valor_cf_07' => $fixo->valor_cf_07,
                'valor_cf_08' => $fixo->valor_cf_08,
                'valor_cf_09' => $fixo->valor_cf_09
            ];

            $valor_cf_01 += $fixo->valor_cf_01;
            $valor_cf_02 += $fixo->valor_cf_02;
            $valor_cf_03 += $fixo->valor_cf_03;
            $valor_cf_04 += $fixo->valor_cf_04;
            $valor_cf_05 += $fixo->valor_cf_05;
            $valor_cf_06 += $fixo->valor_cf_06;
            $valor_cf_07 += $fixo->valor_cf_07;
            $valor_cf_08 += $fixo->valor_cf_08;
            $valor_cf_09 += $fixo->valor_cf_09;
        }

        $retorno[] = (object)[
            'data' => 'Total',
            'valor_cf_01' => $valor_cf_01,
            'valor_cf_02' => $valor_cf_02,
            'valor_cf_03' => $valor_cf_03,
            'valor_cf_04' => $valor_cf_04,
            'valor_cf_05' => $valor_cf_05,
            'valor_cf_06' => $valor_cf_06,
            'valor_cf_07' => $valor_cf_07,
            'valor_cf_08' => $valor_cf_08,
            'valor_cf_09' => $valor_cf_09
        ];
        return json_encode($retorno);
    }
}
