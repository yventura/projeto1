<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use App\Livre;
use Illuminate\View\View;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    private $objFeira;

    public function __construct()
    {
        $this->objFeira = new Livre();
    }

// EXIBE O VALOR DO DIA ( SEG, TEC, ETC )
//            if(date('w') == 0){
//
//            } elseif (date('w') == 1){
//            echo "Segunda";
//            }elseif (date('w') == 2){
//            echo "Terça";
//            }


    public function index()
    {
        $feira_livre = $this->objFeira->all();
        $datas_unicas = array();
        $soma_diaria = array();
        $feira_livreTotal = array();
        //$exibe = array();
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|void
     */
    public function create()
    {
       return view('feira_livre.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View|void
     */
    public function store(Request $request)
    {
        $cad=$this->objFeira->create([
            'data'=>$request->data,
            'valor_fl_01'=>$request->valor_fl_01,
            'valor_fl_02'=>$request->valor_fl_02
        ]);
        if($cad){return redirect('feira_livre');}
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
}
