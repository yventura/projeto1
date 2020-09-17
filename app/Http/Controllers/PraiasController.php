<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Praias;

class PraiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objPraias;

    public function __construct()
    {
        $this->objPraias = new Praias();
    }

    public function index()
    {
        $praias = $this->objPraias->paginate(5);
        $praiaDiaria = $this->objPraias->all();
        $praiasTotal = null;
        $datas_unicas = array();
        $soma_diaria = array();
        $localidades_unicas = array();
        $error = 0;

        //Salva as datas de forma unica
        foreach ($praiaDiaria as $praiax){
           $somente_data = date('d/m/Y', strtotime($praiax->data));
           if(!in_array($somente_data, $datas_unicas)){
             $datas_unicas[] = $somente_data;
           }
        }


        //Salva as localidades de forma unica
        foreach ($praiaDiaria as $praia){
             $somente_local = $praia->localidade;
             if(!in_array($somente_local, $localidades_unicas)){
                $localidades_unicas[] = $somente_local;
             }
           }


           //Faz a somatoria com base na data
           foreach ($datas_unicas as $data) {
                //Seta as variaveis de soma em 0
                $cadeiras = 0;
                $animais = 0;
                $bicicletas = 0;
                $guardasol = 0;
                $camping = 0;
                $churrasco = 0;
                $vistoriadas = 0;
                $irregulares = 0;
                $covid = 0;

              foreach ($praias as $praiax) {
                    $somente_data = date('d/m/Y', strtotime($praiax->data));

                 if ($somente_data == $data) {
                    $cadeiras += $praiax->cadeiras;
                    $animais += $praiax->animais;
                    $bicicletas += $praiax->bicicletas;
                    $guardasol += $praiax->guardasol;
                    $camping += $praiax->camping;
                    $churrasco += $praiax->churrasco;
                    $vistoriadas += $praiax->vistoriadas;
                    $irregulares += $praiax->irregulares;
                    $covid += $praiax->covid;

                    $soma_diaria[$somente_data] = array(
                        'cadeiras' => $cadeiras,
                        'animais' => $animais,
                        'bicicletas' => $bicicletas,
                        'guardasol' => $guardasol,
                        'camping' => $camping,
                        'churrasco' => $churrasco,
                        'vistoriadas' => $vistoriadas,
                        'irregulares' => $irregulares,
                        'covid' => $covid
                    );
                 }
              }
           }

         //Faz a leitura dos dados diarios e adiciona a variavel final em forma de objeto
         foreach ($soma_diaria as $data => $dados) {
         //Cria um array de objetos
          $praiasTotal[] = (object)[
            'data' => $data,
            'cadeiras' => $dados['cadeiras'],
            'animais' => $dados['animais'],
            'bicicletas' => $dados['bicicletas'],
            'guardasol' => $dados['guardasol'],
            'camping' => $dados['camping'],
            'churrasco' => $dados['churrasco'],
            'vistoriadas' => $dados['vistoriadas'],
            'irregulares' => $dados['irregulares'],
            'covid' => $dados['covid']
          ];
        }
        return view('praias.index', compact('praias'))->with('praiasTotal', $praiasTotal);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('praias.add');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $cad=$this->objPraias->create([
            'data'=>$request->data,
            'localidade'=>$request->localidade,
            'cadeiras'=>$request->cadeiras,
            'animais'=>$request->animais,
            'bicicletas'=>$request->bicicletas,
            'guardasol'=>$request->guardasol,
            'camping'=>$request->camping,
            'churrasco'=>$request->churrasco,
            'vistoriadas'=>$request->vistoriadas,
            'irregulares'=>$request->irregulares,
            'covid'=>$request->covid
        ]);
        if($cad){return redirect('praias');}
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
}
