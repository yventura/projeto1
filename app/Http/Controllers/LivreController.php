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

    public function index()
    {
        $feira_livre = $this->objFeira->all();
        $datas_unicas = array();
        $localidade_unicas = array();
        $soma_diaria = array();
        $erro = 0;

        //Salva as datas de forma unica
        foreach ($feira_livre as $feira){
            $somente_data = date('d/m/Y', strtotime($feira->data));

            if(!in_array($somente_data, $datas_unicas)){
                $datas_unicas[] = $somente_data;
            }
        }

        //Faz a somatoria com base na data
        foreach ($datas_unicas as $data) {
            $desc_01 = 0;
            $valor_fl_a2 = 0;
            $valor_fl_02 = 0;
            $valor_fl_03 = 0;
            $valor_fl_04 = 0;
            $valor_fl_05 = 0;
            $valor_fl_06 = 0;
            $valor_fl_06_1 = 0;
            $valor_fl_06_2 = 0;
            $valor_fl_06_3 = 0;
            $valor_fl_07 = 0;

           foreach ($feira_livre as $feira) {
               $somente_data = date('d/m/Y', strtotime($feira->data));
               $somente_01 = $feira->desc_01;
               $somente_02 = $feira->desc_06;


               if ($somente_data == $data and $somente_01 == $feira->desc_01) {


                   $valor_fl_02 += $feira->valor_fl_02;
                   $valor_fl_03 += $feira->valor_fl_03;
                   $valor_fl_04 += $feira->valor_fl_04;
                   $valor_fl_05 += $feira->valor_fl_05;
                   $valor_fl_07 += $feira->valor_fl_07;

                   if ($somente_02 == '1' and $somente_02 != '0') {
                       $valor_fl_06_1 += $feira->valor_fl_06;

                   } else if ($somente_02 == '2' and $somente_02 != '0') {
                       $valor_fl_06_2 += $feira->valor_fl_06;

                   } else if ($somente_02 == '3' and $somente_02 != '0') {
                       $valor_fl_06_3 += $feira->valor_fl_06;

                   }

//                   foreach ()
//                   switch ($somente_01){
//                       case 2:
//                       case 1:
//                           $desc_01 = $somente_01;
//                           break;
//
//                   }

                   $soma_diaria[$somente_data] = array(
                       'data' => $data,
                       'somente_01' => $desc_01,
                       'valor_fl_02' => $valor_fl_02,
                       'valor_fl_03' => $valor_fl_03,
                       'valor_fl_04' => $valor_fl_04,
                       'valor_fl_05' => $valor_fl_05,
                       'valor_fl_06_1' => $valor_fl_06,
                       'valor_fl_06_2' => $valor_fl_06,
                       'valor_fl_06_3' => $valor_fl_06,
                       'valor_fl_07' => $valor_fl_07
                   );
               }
           }
        }

        //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
        foreach ($soma_diaria as $data => $dados) {
            //Cria um array de objetos
            $feira_livreTotal[] = (object)[
                'data' => $data,
                'somente_01' => $dados['somente_01'],
                'valor_fl_02' => $dados['valor_fl_02'],
                'valor_fl_03' => $dados['valor_fl_03'],
                'valor_fl_04' => $dados['valor_fl_04'],
                'valor_fl_05' => $dados['valor_fl_05'],
                'valor_fl_06_1' => $dados['valor_fl_06_1'],
                'valor_fl_06_2' => $dados['valor_fl_06_2'],
                'valor_fl_06_3' => $dados['valor_fl_06_3'],
                'valor_fl_07' => $dados['valor_fl_07'],

            ];
        }

        return view('feira_livre.index', compact('feira_livre'))->with('feira_livreTotal', $feira_livreTotal);
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
            'desc_01'=>$request->desc_01,
            'valor_fl_02'=>$request->valor_fl_02,
            'valor_fl_03'=>$request->valor_fl_03,
            'valor_fl_04'=>$request->valor_fl_04,
            'valor_fl_05'=>$request->valor_fl_05,
            'valor_fl_06'=>$request->valor_fl_06,
            'desc_06'=>$request->desc_06,
            'valor_fl_07'=>$request->valor_fl_07
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
